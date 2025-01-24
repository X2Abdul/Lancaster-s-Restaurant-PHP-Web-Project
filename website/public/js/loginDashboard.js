function toggleCustomerForm() {
  const form = document.getElementById("customerLoginForm");
  const heading = document.getElementById("customer-form-heading");
  const isLogin = heading.textContent === "Customer Login";

  if (isLogin) {
    // Switch to signup
    heading.textContent = "Customer Registration";
    form.action = "/dashboard/register";
    form.innerHTML = `
            <input type="hidden" name="role" value="customer">
            
            <div class="form-group">
                <label for="customerName">Full Name</label>
                <input type="text" id="customerName" name="name" required aria-required="true">
            </div>

            <div class="form-group">
                <label for="customerEmail">Email</label>
                <input type="email" id="customerEmail" name="email" required aria-required="true">
            </div>

            <div class="form-group">
                <label for="customerPassword">Password</label>
                <input type="password" id="customerPassword" name="password" required aria-required="true">
            </div>

            <div class="form-group">
                <label for="customerConfirmPassword">Confirm Password</label>
                <input type="password" id="customerConfirmPassword" name="confirm_password" required aria-required="true">
            </div>

            <div id="customerErrorBox" class="error-box"></div>

            <button type="submit" class="submit-btn">Register</button>
            <button type="button" class="toggle-btn" onclick="toggleCustomerForm()">Back to Login</button>
        `;
    form.addEventListener("submit", (e) => validateSignupForm(e, "customer"));
  } else {
    // Switch back to login
    heading.textContent = "Customer Login";
    form.action = "/dashboard/authenticate";
    form.innerHTML = `
            <input type="hidden" name="role" value="customer">
            
            <div class="form-group">
                <label for="customerEmail">Email</label>
                <input type="email" id="customerEmail" name="email" required aria-required="true">
            </div>

            <div class="form-group">
                <label for="customerPassword">Password</label>
                <input type="password" id="customerPassword" name="password" required aria-required="true">
            </div>

            <div id="customerErrorBox" class="error-box"></div>

            <button type="submit" class="submit-btn">Login</button>
            <button type="button" class="toggle-btn" onclick="toggleCustomerForm()">Sign Up</button>
        `;
    form.addEventListener("submit", (e) => validateSignupForm(e, "customer"));
  }
}

function validateSignupForm(event, formType) {
  event.preventDefault();

  // Get the form that triggered the event
  const form = event.target;
  const errorBox = document.getElementById(`${formType}ErrorBox`);

  // Clear previous errors
  errorBox.innerHTML = "";
  errorBox.style.display = "none";

  // Determine if this is a registration form by checking for confirm password field
  const isRegistration =
    form.querySelector('input[name="confirm_password"]') !== null;

  if (isRegistration) {
    const name = document.getElementById(`${formType}Email`).value;
    const email = document.getElementById(`${formType}Email`).value;
    const password = document.getElementById(`${formType}Password`).value;
    const confirmPassword = document.getElementById(
      `${formType}ConfirmPassword`
    ).value;

    let errors = [];

    // Email validation
    if (!email.includes("@")) {
      errors.push('Email must contain "@".');
    }

    // Password validation
    const passwordRegex =
      /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password)) {
      errors.push(
        "Password must be at least 8 characters long and include a letter, a number, and a special symbol."
      );
    }

    // Confirm password validation
    if (password !== confirmPassword) {
      errors.push("Passwords do not match.");
    }

    if (errors.length > 0) {
      errorBox.innerHTML = errors.map((err) => `<p>${err}</p>`).join("");
      errorBox.style.display = "block";
      return;
    }
  }

  // Create FormData from the form
  const formData = new FormData(form);

  const endpoint = isRegistration
    ? "/dashboard/register"
    : "/dashboard/authenticate";

  console.log(endpoint);
  // Send AJAX request
  fetch(endpoint, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.errors) {
        errorBox.innerHTML = data.errors.map((err) => `<p>${err}</p>`).join("");
        errorBox.style.display = "block";
      } else if (data.success) {
        // If registration was successful, show message and switch to login
        if (isRegistration) {
          if (formType === "staff") {
          } else {
            // Toggle customer to login form
            toggleCustomerForm();

            if (data.accountDetails) {
              // Open confirmation dialog
              const accountConfirmationDialog = document.getElementById(
                "account-confirmation-dialog"
              );
              const confirmationButton = document.getElementById('account-confirmation-email-button')
              accountConfirmationDialog.setAttribute("aria-hidden", "false");
              // Set name and email in the dialog
              const name = document.getElementById("account-confirmation-name");
              const email = document.getElementById(
                "account-confirmation-email"
              );

              name.textContent = "";
              email.textContent = "";

              name.textContent = `Name: ${data.accountDetails.fullname}`;
              email.textContent = `Email: ${data.accountDetails.email}`;

              confirmationButton.addEventListener('click', async () => {
                sendAccountConfirmationEmail(data.accountDetails.fullname, data.accountDetails.email);
              })
            }
          }
        }
      } else if (data.loginSuccess) {
        if (formType === "staff") {
          window.location.href = "/dashboard/staff";
          fetchCurrentBookings();
        } else {
          window.location.href = "/dashboard/diner";
        }
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      errorBox.innerHTML =
        "<p>An error occurred while processing your request.</p>";
      errorBox.style.display = "block";
    });
}

// Add event listeners when the document loads
document.addEventListener("DOMContentLoaded", function () {
  const staffForm = document.getElementById("staffLoginForm");
  const customerForm = document.getElementById("customerLoginForm");

  if (staffForm) {
    staffForm.addEventListener("submit", (e) => validateSignupForm(e, "staff"));
  }

  if (customerForm) {
    customerForm.addEventListener("submit", (e) =>
      validateSignupForm(e, "customer")
    );
  }
});

function handleAccountConfirmationClose() {
  const bookingConfirmationDialog = document.getElementById(
    "account-confirmation-dialog"
  );
  bookingConfirmationDialog.setAttribute("aria-hidden", "true");
}

function sendAccountConfirmationEmail(customerName, userEmail) {
  fetch("/dashboard/emailConfirmation", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      customerName: customerName,
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
      link.download = "account_confirmation.eml";
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      URL.revokeObjectURL(link.href);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
