fetch("/dashboard/getUserRole", {
  method: "POST",
})
  .then((response) => {
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    return response.json();
  })
  .then(async (data) => {
    if (data && data.role === "staff") {
      await getStaff(data.email);
      initializeStaffDashboard();
    }

    if (data && data.role === "customer") {
      await getDiner(data.email);
      initializeDinerDashboard(data.email);
    }

    if (data && data.role === "guest") {
      initializeGuestDashboard();
    }
  })
  .catch((error) => console.error("Error:", error));

async function getStaff(email) {
  const welcome = document.getElementById("welcome-username");
  welcome.innerHTML = "";

  try {
    // Get Staff Name
    const response = await fetch("/dashboard/staff/getStaff", {
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
        welcome.innerHTML = `Welcome Staff, ${data.fullname}`;
      } else {
        welcome.innerHTML = `Welcome Staff,`;
      }
    } else {
      alert(`Server error: ${data.message}`);
    }
  } catch (error) {
    console.error("Network error:", error);
    alert("Network error occurred. Please try again later.");
  }
}

function initializeStaffDashboard() {
  fetchCurrentBookings();

  // Set up table switching, hiding and displaying
  setupTabNavigation();

  // Hide all panels except current bookings by default
  const nonActiveTabPanels = document.querySelectorAll(
    '[role="tabpanel"]:not(#current-bookings)'
  );
  nonActiveTabPanels.forEach((panel) => {
    panel.style.display = "none";
  });

  // Print Bookings for Next Service
  const printButton = document.getElementById("print-bookings");
  printButton.addEventListener("click", async () => {
    const bookingsForNextServiceTab = document.getElementById(
      "bookings-for-next-service"
    );

    // Display Bookings for Next Service table
    bookingsForNextServiceTab.style.display = "block";

    // Hide all panels except Bookings for Next Service
    const nonActiveTabPanels = document.querySelectorAll(
      '[role="tabpanel"]:not(#bookings-for-next-service)'
    );
    nonActiveTabPanels.forEach((panel) => {
      panel.style.display = "none";
    });

    // fetch bookings then print
    await fetchBookingsForNextService();

    // Print the bookings for next service
    print(
      "bookings-for-next-service",
      "current-bookings",
      "Bookings for Next Service"
    );
  });

  // Setup setServiceDialog
  setServiceDialog();
}

function setupTabNavigation() {
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
        case "Current Bookings":
          fetchCurrentBookings();
          break;
        case "Upcoming Bookings":
          fetchUpcomingBookings();
          break;
        case "Upcoming Services":
          fetchUpcomingServices();
          break;
        case "Bookings for Next Service":
          fetchBookingsForNextService();
          break;
      }
    });
  });
}

async function fetchCurrentBookings() {
  try {
    const response = await fetch("/dashboard/staff/getCurrentBookings", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
    });

    const data = await response.json();

    if (data.error) {
      console.error("Error fetching bookings:", data.error);
      return;
    }

    const bookings = data.bookings;
    const tbody = document.querySelector(".reservations-table tbody");

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
          <td class="empty-data" >Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
        `;

      tbody.appendChild(row);
      return;
    }

    // Populate table with bookings
    bookings.forEach((booking) => {
      const row = document.createElement("tr");

      // Creating table rows with bookings from getCurrentBookings
      row.innerHTML = `
          <td>${booking.booking_time.slice(0, 5)}</td>
          <td>${booking.customer_name}</td>
          <td>${booking.party_size}</td>
          <td>${booking.tables_needed}</td>
          <td>${booking.customer_email}</td>
          <td>${
            booking.service_type === null ? "TBA" : booking.service_type
          }</td>
          <td>
            <span class="service-status ${
              booking.status ? "status-active" : "status-closed"
            }">
              ${booking.status ? "Confirmed" : "Cancelled"}
            </span>
          </td>
        `;

      tbody.appendChild(row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

// Date formatter. It will return Tomorrow for bookingDate = Date + 1 else format Date to DD/MM/YYYY
function formatDate(bookingDate) {
  const today = new Date();
  const tomorrow = new Date();
  tomorrow.setDate(today.getDate() + 1);

  // Convert bookingDate string into a Date object
  const bookingDateObj = new Date(bookingDate);

  // Check if bookingDate is tomorrow
  if (
    bookingDateObj.getDate() === today.getDate() &&
    bookingDateObj.getMonth() === today.getMonth() &&
    bookingDateObj.getFullYear() === today.getFullYear()
  ) {
    return "Today";
  } else if (
    bookingDateObj.getDate() === tomorrow.getDate() &&
    bookingDateObj.getMonth() === tomorrow.getMonth() &&
    bookingDateObj.getFullYear() === tomorrow.getFullYear()
  ) {
    return "Tomorrow";
  } else {
    // Format as DD/MM/YYYY
    const day = bookingDateObj.getDate().toString().padStart(2, "0");
    const month = (bookingDateObj.getMonth() + 1).toString().padStart(2, "0");
    const year = bookingDateObj.getFullYear();
    return `${day}/${month}/${year}`;
  }
}

async function fetchUpcomingBookings() {
  try {
    const response = await fetch("/dashboard/staff/getUpcomingBookings", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
    });

    const data = await response.json();

    if (data.error) {
      console.error("Error fetching bookings:", data.error);
      return;
    }

    const bookings = data.bookings;
    const tbody = document.querySelector(
      "#upcoming-bookings .reservations-table tbody"
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
          <td class="empty-data" >Empty</td>
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
            <td>${booking.customer_name}</td>
            <td>${booking.party_size}</td>
            <td>${booking.tables_needed}</td>
            <td>${booking.customer_email}</td>
            <td>${
              booking.service_type === null ? "TBA" : booking.service_type
            }</td>
            <td>
              <span class="service-status ${
                booking.status ? "status-active" : "status-closed"
              }">
                ${booking.status ? "Confirmed" : "Cancelled"}
              </span>
            </td>
          `;

      tbody.appendChild(row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

async function fetchUpcomingServices() {
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

    if (Array.isArray(services) && services.length === 0) {
      const row = document.createElement("tr");

      // Creating table rows with services from getUpcomingServices
      row.innerHTML = `
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data">Empty</td>
          <td class="empty-data" >Empty</td>
          <td class="empty-data">
            <button class="dialog-button save-button" aria-label="Edit" disabled>
              Edit
            </button>
          </td>
        `;

      tbody.appendChild(row);
      return;
    }

    // Populate table with services
    services.forEach((service) => {
      const row = document.createElement("tr");

      // Creating table rows with services from getUpcomingServices
      row.innerHTML = `
          <td>${service.id}</td>
          <td>${formatDate(service.service_date)}</td>
          <td>${service.service_type ? service.service_type : "TBA"}</td>
          <td>${service.start_time.slice(0, 5)}</td>
          <td>${service.end_time.slice(0, 5)}</td>
          <td>${service.tables_available}</td>
          <td>
            <button class="dialog-button save-button" aria-label="Edit">
              Edit
            </button>
          </td>
        `;
      // Add event listener for the "Edit" button
      const editButton = row.querySelector('button[aria-label="Edit"]');
      editButton.addEventListener("click", () => {
        const serviceId = row.querySelector("td:first-child").textContent;
        // Edit dialog logic
        openEditDialog(serviceId);
      });

      tbody.appendChild(row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

async function fetchBookingsForNextService() {
  try {
    const response = await fetch(
      "/dashboard/staff/getBookingsForUpcomingService",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
      }
    );

    const data = await response.json();

    if (data.error) {
      console.error("Error fetching bookings:", data.error);
      return;
    }

    const bookings = data.bookings;
    const tbody = document.querySelector(
      "#bookings-for-next-service .reservations-table tbody"
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
        `;

      tbody.appendChild(row);
      return;
    }

    // Populate table with bookings
    bookings.forEach((booking) => {
      const row = document.createElement("tr");

      // Creating table rows with bookings from getCurrentBookings
      row.innerHTML = `
          <td>${booking.booking_time.slice(0, 5)}</td>
          <td>${booking.party_size}</td>
          <td>${booking.customer_name}</td>          
        `;

      tbody.appendChild(row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

async function createService({
  serviceDate,
  startTime,
  endTime,
  tablesAvailable,
  serviceType = null,
}) {
  try {
    const response = await fetch("/dashboard/staff/createService", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        service_date: serviceDate,
        start_time: startTime,
        end_time: endTime,
        tables_available: tablesAvailable,
        service_type: serviceType,
      }),
    });

    const data = await response.json();

    if (response.ok) {
      return data;
    } else {
      console.error("Server error:", data.message);
      alert(`Server error: ${data.message}`);
    }
  } catch (error) {
    console.error("Network error:", error);
    alert("Network error occurred. Please try again later.");
  }
}

// Set Service Dialog
function setServiceDialog() {
  // Get dialog and input elements
  const setServiceDialog = document.getElementById("set-service-dialog");
  const serviceTypeSelect = document.getElementById("service-type");
  const startTimeInput = document.getElementById("start-time");
  const endTimeInput = document.getElementById("end-time");
  const errorBox = document.getElementById("error-box");
  // Time range for services
  const serviceTimeRanges = {
    Breakfast: { start: "07:30", end: "10:30" },
    Lunch: { start: "12:00", end: "14:30" },
    Dinner: { start: "17:00", end: "22:30" },
  };

  // Open the dialog
  const openButton = document.querySelector('[aria-label="Set new service"]');
  if (openButton) {
    openButton.addEventListener("click", () => {
      setServiceDialog.setAttribute("aria-hidden", "false");
    });
  } else {
    console.error("Set new service button not found.");
  }

  // Close the dialog
  const cancelButton = document.querySelector(".cancel-button");
  if (cancelButton) {
    cancelButton.addEventListener("click", () => {
      errorBox.classList.remove("visible");
      errorBox.textContent = "";
      resetFormById("set-service-form");
      setServiceDialog.setAttribute("aria-hidden", "true");
    });
  } else {
    console.error("Cancel button not found.");
  }

  // Handle time selection depending on service type
  serviceTypeSelect.addEventListener("change", (event) => {
    const serviceType = event.target.value;
    if (serviceType && serviceTimeRanges[serviceType]) {
      const { start, end } = serviceTimeRanges[serviceType];
      startTimeInput.min = start;
      startTimeInput.max = end;
      endTimeInput.min = start;
      endTimeInput.max = end;
    } else {
      // Reset time constraints if no service type is selected
      startTimeInput.min = "07:30";
      startTimeInput.max = "22:30";
      endTimeInput.min = "07:30";
      endTimeInput.max = "22:30";
    }
    // Reset values
    startTimeInput.value = "";
    endTimeInput.value = "";
  });

  // Adjust end time based on selected start time
  startTimeInput.addEventListener("input", () => {
    const serviceType = serviceTypeSelect.value;
    const { start, end } = serviceTimeRanges[serviceType] || {
      start: "07:30",
      end: "22:30",
    };

    const selectedStartTime = startTimeInput.value;
    if (selectedStartTime) {
      const [hours, minutes] = selectedStartTime.split(":").map(Number);
      const adjustedMinutes =
        minutes + 15 >= 60 ? (minutes + 15) % 60 : minutes + 15;
      const adjustedHours = minutes + 15 >= 60 ? hours + 1 : hours;

      const adjustedStartTime = `${adjustedHours
        .toString()
        .padStart(2, "0")}:${adjustedMinutes.toString().padStart(2, "0")}`;
      endTimeInput.min = adjustedStartTime;
      endTimeInput.max = end;

      // Reset end time if it doesn't meet the new minimum
      if (endTimeInput.value < adjustedStartTime || endTimeInput.value > end) {
        endTimeInput.value = "";
      }
    } else {
      endTimeInput.min = start;
      endTimeInput.max = end;
    }
  });

  // Form validation on submission
  const form = document.getElementById("set-service-form");
  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    const errorBox = document.getElementById("error-box");
    const serviceType = serviceTypeSelect.value || null;
    const serviceDate = document.getElementById("service-date").value;
    const startTime = startTimeInput.value;
    const endTime = endTimeInput.value;
    const tablesAvailable = parseInt(
      document.getElementById("tables-available").value,
      10
    );

    // Clearing previous error message and hiding the error box
    errorBox.classList.remove("visible");
    errorBox.textContent = "";

    const { start, end } = serviceTimeRanges[serviceType] || {
      start: "07:30",
      end: "22:30",
    };

    // Check if time is invalid
    if (
      startTime < start ||
      startTime > end ||
      endTime < start ||
      endTime > end ||
      (!serviceType && startTime >= endTime) ||
      (serviceType && startTime >= endTime)
    ) {
      errorBox.textContent = `Invalid times selected. Start time must be between ${start} and ${end}, and end time must be at least 15 minutes after the start time.`;
      errorBox.classList.add("visible");
      return;
    }

    // Call createService before form submission
    try {
      const createServiceResponse = await createService({
        serviceDate,
        startTime,
        endTime,
        tablesAvailable,
        serviceType,
      });

      if (createServiceResponse.success) {
        // Submit form and fetch updated list of upcoming services after successful creation
        // form.submit();
        resetFormById('set-service-form')
        setServiceDialog.setAttribute("aria-hidden", "true");
        fetchUpcomingServices();
      } else {
        errorBox.textContent = `Error creating service: ${createServiceResponse.message}`;
        errorBox.classList.add("visible");
      }
    } catch (error) {
      errorBox.textContent = `Error creating service: ${createServiceResponse.message}`;
      errorBox.classList.add("visible");
    }
  });
}

async function openEditDialog(serviceID) {
  // Open the edit dialog and load service details
  const editServiceDialog = document.getElementById("edit-service-dialog");
  const editServiceForm = document.getElementById("edit-service-form");
  const errorBox = document.getElementById("edit-error-box");
  // Time range for services
  const serviceTimeRanges = {
    Breakfast: { start: "07:30", end: "10:30" },
    Lunch: { start: "12:00", end: "14:30" },
    Dinner: { start: "17:00", end: "22:30" },
  };

  const cancelButton = document.getElementById("cancel-edit-dialog");
  const deleteButton = document.getElementById("delete-edit-dialog");

  if (deleteButton._currentHandler) {
    deleteButton.removeEventListener("click", deleteButton._currentHandler);
  }

  if (cancelButton._currentHandler) {
    cancelButton.removeEventListener("click", cancelButton._currentHandler);
  }

  const handleDelete = () => {
    deleteService(serviceID);
    editServiceDialog.setAttribute("aria-hidden", "true"); 
    fetchUpcomingServices();
  };

  const handleCancel = () => {
    errorBox.classList.remove("visible");
    errorBox.textContent = "";
    resetFormById("edit-service-form");
    editServiceDialog.setAttribute("aria-hidden", "true");
  };

  try {
    const response = await fetch(`/dashboard/staff/getService`, {
      method: "POST",
      body: JSON.stringify({ serviceID: serviceID }),
      headers: {
        "Content-Type": "application/json",
      },
    });
    const data = await response.json();

    if (data.service) {
      const service = data.service[0];
      
      // Open dialog
      editServiceDialog.setAttribute("aria-hidden", "false");

      setTimeout(() => {
        const elements = {
            id: document.getElementById("edit-service-id"),
            date: document.getElementById("edit-service-date"),
            type: document.getElementById("edit-service-type"),
            startTime: document.getElementById("edit-start-time"),
            endTime: document.getElementById("edit-end-time"),
            tables: document.getElementById("edit-tables-available"),
        };
        
        // Set the values
        elements.id.value = service.id;
        elements.date.value = service.service_date;
        elements.type.value = service.service_type || "";
        elements.startTime.value = service.start_time.slice(0, 5);
        elements.endTime.value = service.end_time.slice(0, 5);
        elements.tables.value = service.tables_available;
    }, 100);

      
    } else {
      console.error("Failed to fetch service details.");
    }
  } catch (error) {
    console.error("Error fetching service details:", error);
  }
  
  if (cancelButton) {
    cancelButton._currentHandler = handleCancel;
    cancelButton.addEventListener("click", handleCancel);
  } else {
    console.error("Cancel button not found.");
  }

  if (deleteButton) {
    deleteButton._currentHandler = handleDelete;
    deleteButton.addEventListener("click", handleDelete);
  } else {
    console.error("Delete button not found.");
  }

  // Handle editing and form submission
  editServiceForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const errorBox = document.getElementById("edit-error-box");
    const serviceId = parseInt(
      document.getElementById("edit-service-id").value,
      10
    );
    const serviceDate = document.getElementById("edit-service-date").value;
    const serviceType =
      document.getElementById("edit-service-type").value || null;
    const startTime = document.getElementById("edit-start-time").value;
    const endTime = document.getElementById("edit-end-time").value;
    const tablesAvailable = parseInt(
      document.getElementById("edit-tables-available").value,
      10
    );

    // Clearing previous error message and hiding the error box
    errorBox.classList.remove("visible");
    errorBox.textContent = "";

    // Validate times and inputs
    const { start, end } = serviceTimeRanges[serviceType] || {
      start: "07:30",
      end: "22:30",
    };

    if (
      startTime < start ||
      startTime > end ||
      endTime < start ||
      endTime > end ||
      (!serviceType && startTime >= endTime) ||
      (serviceType && startTime >= endTime)
    ) {
      errorBox.textContent = `Invalid times selected. For service ${serviceType} start time must be between ${start} and ${end}, and end time must be at least 15 minutes after the start time.`;
      errorBox.classList.add("visible");
      return;
    }

    try {
      const response = await fetch(`/dashboard/staff/editService`, {
        method: "POST",
        body: JSON.stringify({
          serviceID: serviceId,
          service_date: serviceDate,
          service_type: serviceType,
          start_time: startTime,
          end_time: endTime,
          tables_available: tablesAvailable,
        }),
        headers: {
          "Content-Type": "application/json",
        },
      });

      const data = await response.json();
      if (data.success) {
        // Submit form and refresh services list
        // editServiceForm.submit();
        serviceID = null;
        resetFormById("edit-service-form");
        editServiceDialog.setAttribute("aria-hidden", "true");
        fetchUpcomingServices();
      } else {
        errorBox.textContent = `Error updating service: ${data.message}`;
        errorBox.classList.add("visible");
      }
    } catch (error) {
      errorBox.textContent =
        "An unexpected error occurred while updating the service.";
      errorBox.classList.add("visible");
    }
  });
}

async function deleteService(serviceID) {
  try {
    const response = await fetch(`/dashboard/staff/deleteService`, {
      method: "POST",
      body: JSON.stringify({
        serviceID,
      }),
      headers: {
        "Content-Type": "application/json",
      },
    });

    const data = await response.json();
    if (data.success) {
      // Refresh services list after deleting
      fetchUpcomingServices();
    } else {
      errorBox.textContent = `Error deleting service: ${data.message}`;
      errorBox.classList.add("visible");
    }
  } catch (error) {
    errorBox.textContent =
      "An unexpected error occurred while deleting the service.";
    errorBox.classList.add("visible");
  }
}

function resetFormById(formId) {
  const form = document.getElementById(formId);

  if (!form) {
    console.error(`Form with ID "${formId}" not found`);
    return;
  }

  // Get all inputs and selects in the form
  const formElements = form.querySelectorAll("input, select");

  formElements.forEach((element) => {
    switch (element.type) {
      case "text":
      case "date":
      case "time":
      case "email":
      case "number":
      case "password":
      case "search":
      case "url":
      case "textarea":
        element.value = "";
        break;

      case "select-one":
        element.selectedIndex = 0;
        break;
    }
  });
}
