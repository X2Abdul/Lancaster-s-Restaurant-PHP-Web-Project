async function getDiner(email) {
  const welcome = document.getElementById("welcome-username");
  welcome.innerHTML = "";

  try {
    // Get Diner Name
    const response = await fetch("/dashboard/diner/getDiner", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        email,
      }),
    });

    const data = await response.json();

    if (response.ok) {
      if (data.fullname) {
        welcome.innerHTML = `Welcome Diner, ${data.fullname}`;
      } else {
        welcome.innerHTML = `Welcome Diner,`;
      }
    } else {
      alert(`Server error: ${data.message}`);
    }
  } catch (error) {
    console.error("Network error:", error);
    alert("Network error occurred. Please try again later.");
  }
}

function initializeDinerDashboard(email) {
  fetchBookings(email);

  // Set up table switching, hiding and displaying
  setupTabNavigationForDiner(email);

  // Book Reservation Dialog
  handleBookReservationDialog('diner', email);

  // Change Password Dialog
  changePasswordDialog(email);

  // Hide all panels except current bookings by default
  const nonActiveTabPanels = document.querySelectorAll(
    '[role="tabpanel"]:not(#reservations)'
  );
  nonActiveTabPanels.forEach((panel) => {
    panel.style.display = "none";
  });

  // Print Bookings for Next Booking
  const printButton = document.getElementById("print-bookings");
  printButton.addEventListener("click", async () => {
    const latestBookingTab = document.getElementById("latest-booking");

    // Display Latest Booking
    latestBookingTab.style.display = "block";

    // Hide all panels except Latest Booking
    const nonActiveTabPanels = document.querySelectorAll(
      '[role="tabpanel"]:not(#latest-booking)'
    );
    nonActiveTabPanels.forEach((panel) => {
      panel.style.display = "none";
    });

    // fetch booking then print
    await fetchLatestBookings(email);

    // Print the latest booking
    print("latest-booking", "reservations", "Latest Booking");
  });
}

function setupTabNavigationForDiner(email) {
  const tabButtons = document.querySelectorAll(".dashboard-tab");
  const tabPanels = document.querySelectorAll('[role="tabpanel"]');

  tabButtons.forEach((button) => {
    button.addEventListener("click", () => {
      // Remove active state from all tabs
      tabButtons.forEach((tab) => {
        tab.classList.remove("active");
        tab.setAttribute("aria-selected", "false");
      });

      // Add active state to clicked tab
      button.classList.add("active");
      button.setAttribute("aria-selected", "true");

      // Hide all tab panels
      tabPanels.forEach((panel) => {
        panel.style.display = "none";
      });

      // Show the selected tab panel
      const targetPanelId = button.getAttribute("aria-controls");
      const targetPanel = document.getElementById(targetPanelId);
      if (targetPanel) {
        targetPanel.style.display = "block";
      }

      // Call appropriate fetch method based on button text
      const buttonText = button.textContent.trim();
      switch (buttonText) {
        case "Bookings":
          fetchBookings(email);
          break;
        case "Upcoming Services":
          fetchUpcomingServicesForDiner();
          break;
        case "Latest Booking":
          fetchLatestBookings(email);
          break;
      }
    });
  });
}

async function fetchBookings(email) {
  try {
    const response = await fetch("/dashboard/diner/getBookings", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        email,
      }),
    });

    const data = await response.json();

    if (data.error) {
      console.error("Error fetching bookings:", data.error);
      return;
    }

    const bookings = data.bookings;
    const tbody = document.querySelector(
      "#reservations .reservations-table tbody"
    );

    // Clear existing rows
    tbody.innerHTML = "";

    if (Array.isArray(bookings) && bookings.length === 0) {
      const row = document.createElement("tr");

      // Creating table rows with services from getUpcomingServices
      row.innerHTML = `
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
        `;

      tbody.appendChild(row);
      return;
    }

    // Populate table with bookings
    bookings.forEach((booking) => {
      const row = document.createElement("tr");

      // Creating table rows with bookings from getUpcomingBookings
      row.innerHTML = `
              <td>${formatDate(booking.date)}</td>
              <td>${booking.booking_time.slice(0, 5)}</td>
              <td>${booking.service_type}</td>
              <td>${booking.customer_name}</td>
              <td>${booking.party_size}</td>
              <td>${booking.tables_needed}</td>
              <td>${booking.customer_email}</td>
              <td>
                <span class="service-status ${
                  booking.status ? "status-active" : "status-closed"
                }">
                  ${booking.status ? "Confirmed" : "Cancelled"}
                </span>
              </td>
              <td>
                <button class="dashboard-button add-to-calendar-button" aria-label="Add to Calender">
                  Add to Calender
                </button>
              </td>
            `;
      const addToCalendarButton = row.querySelector(
        'button[aria-label="Add to Calender"]'
      );
      addToCalendarButton.addEventListener("click", () => {
        addToCalendar(
          booking.customer_name,
          booking.date,
          booking.booking_time
        );
      });
      tbody.appendChild(row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

async function fetchLatestBookings(email) {
  try {
    const response = await fetch("/dashboard/diner/getLatestBooking", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        email,
      }),
    });

    const data = await response.json();

    if (data.error) {
      console.error("Error fetching Latest booking:", data.error);
      return;
    }

    const booking = data.booking;
    const tbody = document.querySelector(
      "#latest-booking .reservations-table tbody"
    );

    // Clear existing rows
    tbody.innerHTML = "";

    if (booking === null) {
      const row = document.createElement("tr");

      // Creating table rows with services from getUpcomingServices
      row.innerHTML = `
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
        `;

      tbody.appendChild(row);
      return;
    }

    // Populate table with bookings

    const row = document.createElement("tr");

    // Creating table rows with bookings from getUpcomingBookings
    row.innerHTML = `
                <td>${formatDate(booking.date)}</td>
                <td>${booking.booking_time.slice(0, 5)}</td>
                <td>${booking.service_type}</td>
                <td>${booking.customer_name}</td>
                <td>${booking.party_size}</td>
                <td>${booking.tables_needed}</td>
                <td>${booking.customer_email}</td>
            </td>
              `;

    tbody.appendChild(row);
  } catch (error) {
    console.error("Error:", error);
  }
}

async function fetchUpcomingServicesForDiner() {
  try {
    const response = await fetch("/dashboard/staff/getUpcomingServices", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
    });

    const data = await response.json();

    if (data.error) {
      console.error("Error fetching services:", data.error);
      return;
    }

    const services = data.services;
    const tbody = document.querySelector(
      "#upcoming-services .reservations-table tbody"
    );

    // Clear existing rows
    tbody.innerHTML = "";

    if(Array.isArray(services) && services.length === 0) {
      const row = document.createElement("tr");

      // Creating table rows with services from getUpcomingServices
      row.innerHTML = `
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
        `;

      tbody.appendChild(row);
      return;
    }

    // Populate table with services
    services.forEach((service) => {
      const row = document.createElement("tr");
      if (service.service_type) {
        // Creating table rows with services from getUpcomingServices
        row.innerHTML = `
            <td>${formatDate(service.service_date)}</td>
            <td>${service.service_type}</td>
            <td>${service.start_time.slice(0, 5)}</td>
            <td>${service.end_time.slice(0, 5)}</td>
            <td>${service.tables_available}</td>
          `;
      }

      tbody.appendChild(row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

function print(tableName, mainTableName, pageTitle) {
  // Create a new window for printing
  const printWindow = window.open("", "_blank");

  // Get the table content
  const tableContent = document.querySelector(
    `#${tableName} .reservations-table`
  ).outerHTML;

  // Add some basic styling for the table
  const printContent = `
            <html>
            <head>
                <title>Bookings for Next Service</title>
                <style>
                    h1 {
                      color: #4c1a1a;
                      font-size: 2rem;
                      margin-bottom: 2rem;
                      font-family: Arial, sans-serif;
                    }
                    .reservations-table {
                        width: 100%;
                        border-collapse: collapse;
                        background-color: white;
                        border-radius: 12px;
                        overflow: hidden;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                    }
    
                    .reservations-table th,
                    .reservations-table td {
                        padding: 1rem;
                        text-align: left;
                        border-bottom: 1px solid #eee;
                    }
    
                    .reservations-table th {
                        background-color: #4c1a1a;
                        color: white;
                        font-weight: 600;
                    }
    
                    .reservations-table tr:last-child td {
                        border-bottom: none;
                    }
    
                    @media print {
                        @page {
                            margin: 2cm;
                        }
                        .reservations-table {
                            box-shadow: none;
                        }
                       
                        .reservations-table th {
                            -webkit-print-color-adjust: exact;
                            print-color-adjust: exact;
                        }
                    }
                </style>
            </head>
            <body>
              <h1>${pageTitle}</h1>
                ${tableContent}
            </body>
            </html>
        `;

  printWindow.document.write(printContent);
  printWindow.document.close();
  printWindow.focus();

  // Wait for content to load before printing
  printWindow.onload = () => {
    printWindow.print();
    printWindow.close();

    // Reset display states after printing
    document.getElementById(tableName).style.display = "none";
    document.getElementById(mainTableName).style.display = "block";

    // Reset tab states
    document.querySelectorAll(".dashboard-tab").forEach((tab) => {
      tab.classList.remove("active");
      tab.setAttribute("aria-selected", "false");
    });

    // Set current main table tab as active
    const mainTable = document.querySelector(
      `[aria-controls=${mainTableName}]`
    );
    mainTable.classList.add("active");
    mainTable.setAttribute("aria-selected", "true");
  };
}

function handleClose(){
  const bookingDialog = document.getElementById('book-reservations-dialog');
  bookingDialog.setAttribute("aria-hidden", "true");
  resetFormById("book-reservations-form");
}

async function handleBookReservationDialog(role, email) {
  // Get dialog/errorBox/form
  const bookReservationDialog = document.getElementById(
    "book-reservations-dialog"
  );
  const form = document.getElementById("book-reservations-form");
  const errorBox = document.getElementById("reservation-error-box");

  if(errorBox){
    // Clear the error box and hiding it
    errorBox.classList.remove("visible");
    errorBox.textContent = "";
  }
  

  // Open the dialog
  const openButton = document.getElementById("book-reservations");
  if (openButton) {
    openButton.addEventListener("click", () => {
      bookReservationDialog.setAttribute("aria-hidden", "false");
    });
  } else {
    console.error("Set new service button not found.");
  }

  // Close the dialog
  const cancelButton = document.querySelector(".cancel-button");
 
  if (cancelButton) {
    cancelButton.addEventListener("click", () => {
      console.log(cancelButton)
      resetFormById("book-reservations-form");
      bookReservationDialog.setAttribute("aria-hidden", "true");
    });
  } else {
    console.error("Cancel button not found.");
  }

  // Get inputs
  const dateInput = document.getElementById("reservation-date");
  const partySizeDropdown = document.getElementById("reservation-party-size");
  const serviceDropdown = document.getElementById("reservation-service");
  const timeDropdown = document.getElementById("reservation-time");
  const emailInput = document.getElementById("reservation-email");
  let serviceId = null;

  // Prefill the email
  emailInput.value = email ?? "";

  let services = [];

  // Get valid upcoming services - only services that have all valid fields
  try {
    const response = await fetch("/dashboard/staff/getUpcomingServices", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
    });

    const data = await response.json();

    if (data.error) {
      errorBox.textContent = `Error fetching services: ${data.error}`;
      errorBox.classList.add("visible");
      return;
    }

    // Filter all services for valid one i.e service_type must be assigned
    services = data.services.filter((service) => service.service_type);
  } catch (error) {
    errorBox.textContent = `Error fetching avaliable services: ${error}`;
    errorBox.classList.add("visible");
  }

  // Set services based on date selected
  dateInput.addEventListener("change", (event) => {
    const selectedDate = event.target.value;

    // Get services for the selected date
    const availableServices = services.filter(
      (service) => service.service_date === selectedDate
    );

    // Clear service dropdown
    Array.from(serviceDropdown.children)
      .slice(1)
      .forEach((child) => child.remove());

    // Add the avaliable services to service dropdown
    availableServices.forEach((service) => {
      const option = document.createElement("option");
      option.value = service.service_type;
      option.textContent = service.service_type;
      serviceDropdown.appendChild(option);
    });

    // Update min and max of party size based on selected service
    serviceDropdown.addEventListener("change", async (event) => {
      const selectedService = event.target.value;
      const service = availableServices.find(
        (service) => service.service_type === selectedService
      );
      const tablesAvailable = selectedService ? service.tables_available : 0;
      const startTime = selectedService ? service.start_time : null;
      const endTime = selectedService ? service.end_time : null;
      serviceId = selectedService ? service.id : null;

      // Clear existing options except the first one
      while (partySizeDropdown.children.length > 1) {
        partySizeDropdown.removeChild(partySizeDropdown.lastChild);
      }

      if (tablesAvailable === 0) {
        // If no tables available, update the default option text
        partySizeDropdown.firstChild.textContent =
          "Bookings full for this service";
      } else {
        // Calculate maximum party size (2 people per table, max 6 people total)
        const maxPartySize = Math.min(tablesAvailable * 2, 6);

        // Add options from 1 to maxPartySize
        for (let i = 1; i <= maxPartySize; i++) {
          const option = document.createElement("option");
          option.value = i;
          option.textContent = `${i}`;
          partySizeDropdown.appendChild(option);
        }
      }

      let bookingForSelectedService = [];
      // Get all bookings for this the selected service
      try {
        const response = await fetch(
          "/dashboard/diner/getBookingsByServiceId",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              serviceId,
              date: selectedDate,
            }),
          }
        );

        const data = await response.json();

        if (data.error) {
          errorBox.textContent = `Error fetching bookings: ${data.error}`;
          errorBox.classList.add("visible");
          return;
        }

        bookingForSelectedService = data.bookings;
      } catch (error) {
        errorBox.textContent = `Error fetching avaliable bookings: ${error}`;
        errorBox.classList.add("visible");
      }

      const timeIntervals = generateTimeIntevals(startTime, endTime);

      const availableTimeSlots = timeIntervals.filter(
        (time) =>
          !bookingForSelectedService.some(
            (booking) => booking.booking_time.slice(0, 5) === time
          )
      );

      // Clear existing options except the first one
      while (timeDropdown.children.length > 1) {
        timeDropdown.removeChild(timeDropdown.lastChild);
      }

      // Add avaliable timeslots to start time
      availableTimeSlots.forEach((timeslot) => {
        const option = document.createElement("option");
        option.value = timeslot;
        option.textContent = timeslot;
        timeDropdown.appendChild(option);
      });
    });
  });

  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(form);
    const reservationData = {
      date: formData.get("reservation-date"),
      party_size: parseInt(formData.get("reservation-party-size"), 10),
      service_type: formData.get("reservation-service"),
      booking_time: formData.get("reservation-time"),
      customer_name: formData.get("reservation-lead-name"),
      customer_email: formData.get("reservation-email"),
      service_id: serviceId,
      tables_needed: parseInt(
        Math.ceil(formData.get("reservation-party-size") / 2),
        10
      ),
    };

    // Call the bookReservation to book reservation
    const response = await fetch("/dashboard/diner/bookReservation", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(reservationData),
    });

    const result = await response.text();

    const parser = new DOMParser();
    const doc = parser.parseFromString(result, "text/html");

    resetFormById('book-reservations-form');
    bookReservationDialog.setAttribute("aria-hidden", "true");

    // Show the confirmation dialog
    const bookingConfirmationDialog = document.getElementById(
      "booking-confirmation-dialog"
    );
    bookingConfirmationDialog.setAttribute("aria-hidden", "false");
    

    // Optionally, you can populate the confirmation dialog with the result data from the backend
    const confirmationData = doc.querySelector("#booking-confirmation-dialog");
    document.querySelector("#booking-confirmation-dialog").innerHTML =
      confirmationData.innerHTML;
console.log('out',role);
    if(role === 'guest'){
      console.log(role);
      const loginMessage = document.getElementById('login-message');
      loginMessage.innerHTML = 'Please <strong>Login or Sign Up</strong> to manage bookings';
    }
    // Check if bookings exist on page
    const tbody = document.querySelector(
      "#reservations .reservations-table tbody"
    );

    if (tbody) {
      fetchBookings(email);
    }
  });
}

function generateTimeIntevals(startTime, endTime) {
  const intervals = [];

  // Convert times to Date objects for easier manipulation
  const currentTime = new Date(`1970-01-01T${startTime}`);
  const end = new Date(`1970-01-01T${endTime}`);

  // Generate intervals until we reach end time
  while (currentTime < end) {
    // Format time as HH:mm
    const timeString = currentTime.toTimeString().slice(0, 5);
    intervals.push(timeString);

    // Add 15 minutes
    currentTime.setMinutes(currentTime.getMinutes() + 15);
  }

  return intervals;
}

function addToCalendar(customerName, bookingDate, bookingTime) {
  fetch("/dashboard/diner/addToCalendar", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      customerName: customerName,
      bookingDate: bookingDate,
      bookingTime: bookingTime,
    }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Failed to generate calendar file");
      }
      return response.text();
    })
    .then((calendarContent) => {
      // Create a blob and trigger download - AI helped
      const blob = new Blob([calendarContent], { type: "text/calendar" });
      const link = document.createElement("a");
      link.href = URL.createObjectURL(blob);
      link.download = "booking.ics";
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      URL.revokeObjectURL(link.href);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function sendConfirmationEmail(
  customerName,
  bookingDate,
  bookingTime,
  bookingService,
  bookingPartySize,
  bookingTablesAssigned,
  userEmail
) {
  fetch("/dashboard/diner/emailConfirmation", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      customerName: customerName,
      bookingDate: bookingDate,
      bookingTime: bookingTime,
      bookingService: bookingService,
      bookingPartySize: bookingPartySize,
      bookingTablesAssigned: bookingTablesAssigned,
      userEmail: userEmail,
    }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Failed to generate email file");
      }
      return response.text();
    })
    .then((emailContent) => {
      // Create a blob and trigger download - AI helped 
      const blob = new Blob([emailContent], { type: "message/rfc822" });
      const link = document.createElement("a");
      link.href = URL.createObjectURL(blob);
      link.download = "reservation_confirmation.eml";
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      URL.revokeObjectURL(link.href);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function closeChangePasswordDialog() {
  const dialog = document.getElementById("change-password-dialog");
  dialog.setAttribute("aria-hidden", "true");
}

function changePasswordDialog(email){
    const dialog = document.getElementById("change-password-dialog");
    const changePasswordButton = document.querySelector('[aria-label="Change Password"]');
    const emailInput = document.getElementById('change-password-email');
    const errorBox = document.getElementById('change-password-error-box');
    const form = document.getElementById('change-password-form');
    const oldPasswordInput = document.getElementById('old-password');
    const newPasswordInput = document.getElementById('new-password');
    const confirmPasswordInput = document.getElementById('confirm-password');

    // Unhide the dialog
    changePasswordButton.addEventListener('click', () => {
        dialog.setAttribute("aria-hidden", "false");
    })

    // Clear and hide the error box
    errorBox.classList.remove('visible');
    errorBox.textContent = '';

    // Add Email
    emailInput.value = email;

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Get the values from the form inputs
        const oldPassword = oldPasswordInput.value;
        const newPassword = newPasswordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        // Password validation
        const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!passwordRegex.test(newPassword)) {
            errorBox.textContent = 'Password must be at least 8 characters long and include a letter, a number, and a special symbol.';
            errorBox.classList.add('visible');
            return;
        }

        // Check if the new password and confirm password match
        if (newPassword !== confirmPassword) {
            errorBox.textContent = "New password and Confirm New Password do not match.";
            errorBox.classList.add('visible');
            return;
        }

        const requestData = {
            email: email,
            oldPassword: oldPassword,
            newPassword: newPassword
        };

        try {
            // Send the request to the server to change the password
            const response = await fetch('/dashboard/diner/changePassword', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(requestData)
            });

            const data = await response.json();

            if (data.message) {
                switch (data.message){
                    case 'Old Password is Wrong!':
                        errorBox.textContent = 'Old Password is Wrong!';
                        errorBox.classList.add('visible');
                        break;
                    case 'User not found':
                        errorBox.textContent = 'User not found';
                        errorBox.classList.add('visible');
                        break;
                    case 'Password has changed Successfully':
                        form.submit();
                        dialog.setAttribute("aria-hidden", "true");
                        break;
                }
            }
        }  catch (error) {
            // Handle any network or server errors
            errorBox.textContent = "An error occurred while changing the password. Please try again.";
            errorBox.classList.add('visible');
        }
    })
}
