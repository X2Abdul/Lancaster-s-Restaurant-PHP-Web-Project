<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* pages/diner/diner.html */
class __TwigTemplate_ae3975a128613761457700c76bd60168 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield Twig\Extension\CoreExtension::include($this->env, $context, "./Components/header.html");
        yield "

<main>
  <div class=\"dashboard-container\">
    <header class=\"dashboard-header\">
      <div class=\"dashboard-header-title\">
        <h1 class=\"dashboard-title\">Diner Dashboard</h1>
        <form action=\"/logout\" method=\"post\">
          <button
            class=\"dashboard-button logout-button\"
            type=\"submit\"
            aria-label=\"Logout\"
          >
            Logout
          </button>
        </form>
        <button
          class=\"dashboard-button change-password-button\"
          type=\"button\"
          aria-label=\"Change Password\"
        >
          Change Password
        </button>
      </div>
      <div class=\"dashboard-actions\">
        <button
          class=\"dashboard-button\"
          type=\"button\"
          aria-label=\"Print Latest Booking\"
          id=\"print-bookings\"
        >
          Print Latest Booking
        </button>
        <button
          class=\"dashboard-button\"
          type=\"button\"
          aria-label=\"Book Reservations\"
          id=\"book-reservations\"
        >
          Book Reservations
        </button>
      </div>
    </header>
    <p id=\"welcome-username\" aria-label=\"welcome-username\"></p>
    <nav class=\"dashboard-tabs\" role=\"tablist\">
      <button
        class=\"dashboard-tab active\"
        role=\"tab\"
        aria-selected=\"true\"
        aria-controls=\"reservations\"
      >
        Bookings
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"latest-booking\"
      >
        Latest Booking
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"upcoming-services\"
      >
        Upcoming Services
      </button>
    </nav>

    <!-- Bookings -->
    <section
      id=\"reservations\"
      role=\"tabpanel\"
      aria-labelledby=\"reservations-tab\"
    >
      <table class=\"reservations-table\" aria-label=\"Reservations\">
        <thead>
          <tr>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Name</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Tables Assigned</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Status</th>
            <th scope=\"col\">Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Latest Bookings -->
    <section
      id=\"latest-booking\"
      role=\"tabpanel\"
      aria-labelledby=\"latest-booking-tab\"
    >
      <table class=\"reservations-table\" aria-label=\"Latest Booking\">
        <thead>
          <tr>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Name</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Tables Assigned</th>
            <th scope=\"col\">Email</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Upcoming services -->
    <section
      id=\"upcoming-services\"
      role=\"tabpanel\"
      aria-labelledby=\"upcoming-services-tab\"
      style=\"display: none\"
    >
      <table class=\"reservations-table\" aria-label=\"Upcoming Services\">
        <thead>
          <tr>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Start Time</th>
            <th scope=\"col\">End Time</th>
            <th scope=\"col\">Tables Avaliable</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Change Password Dialog -->
    <div
      id=\"change-password-dialog\"
      class=\"dialog\"
      role=\"dialog\"
      aria-labelledby=\"change-password-heading\"
      aria-hidden=\"true\"
    >
      <div class=\"dialog-content\">
        <h2 id=\"change-password-heading\">Change Password</h2>
        <form class=\"dialog-form\" id=\"change-password-form\">
          <label for=\"email\">Email</label>
          <input type=\"email\" id=\"change-password-email\" readonly />

          <label for=\"old-password\">Old Password</label>
          <input
            type=\"password\"
            id=\"old-password\"
            name=\"old-password\"
            required
          />

          <label for=\"new-password\">New Password</label>
          <input
            type=\"password\"
            id=\"new-password\"
            name=\"new-password\"
            required
          />

          <label for=\"confirm-password\">Confirm New Password</label>
          <input
            type=\"password\"
            id=\"confirm-password\"
            name=\"confirm-password\"
            required
          />

          <div
            id=\"change-password-error-box\"
            class=\"error-box\"
            role=\"alert\"
            aria-live=\"polite\"
          ></div>

          <div class=\"dialog-actions\">
            <button
              type=\"button\"
              class=\"dialog-button cancel-button\"
              aria-label=\"Cancel\"
              onclick=\"closeChangePasswordDialog()\"
            >
              Cancel
            </button>
            <button
              type=\"submit\"
              class=\"dialog-button save-button\"
              aria-label=\"Save\"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
    ";
        // line 204
        yield Twig\Extension\CoreExtension::include($this->env, $context, "./Components/bookReservationDialog.html");
        yield " ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "./Components/confirmationDialog.html");
        // line 205
        yield "
  </div>
</main>

";
        // line 209
        yield Twig\Extension\CoreExtension::include($this->env, $context, "./Components/footer.html");
        yield "
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/diner/diner.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  258 => 209,  252 => 205,  248 => 204,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ include('./Components/header.html') }}

<main>
  <div class=\"dashboard-container\">
    <header class=\"dashboard-header\">
      <div class=\"dashboard-header-title\">
        <h1 class=\"dashboard-title\">Diner Dashboard</h1>
        <form action=\"/logout\" method=\"post\">
          <button
            class=\"dashboard-button logout-button\"
            type=\"submit\"
            aria-label=\"Logout\"
          >
            Logout
          </button>
        </form>
        <button
          class=\"dashboard-button change-password-button\"
          type=\"button\"
          aria-label=\"Change Password\"
        >
          Change Password
        </button>
      </div>
      <div class=\"dashboard-actions\">
        <button
          class=\"dashboard-button\"
          type=\"button\"
          aria-label=\"Print Latest Booking\"
          id=\"print-bookings\"
        >
          Print Latest Booking
        </button>
        <button
          class=\"dashboard-button\"
          type=\"button\"
          aria-label=\"Book Reservations\"
          id=\"book-reservations\"
        >
          Book Reservations
        </button>
      </div>
    </header>
    <p id=\"welcome-username\" aria-label=\"welcome-username\"></p>
    <nav class=\"dashboard-tabs\" role=\"tablist\">
      <button
        class=\"dashboard-tab active\"
        role=\"tab\"
        aria-selected=\"true\"
        aria-controls=\"reservations\"
      >
        Bookings
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"latest-booking\"
      >
        Latest Booking
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"upcoming-services\"
      >
        Upcoming Services
      </button>
    </nav>

    <!-- Bookings -->
    <section
      id=\"reservations\"
      role=\"tabpanel\"
      aria-labelledby=\"reservations-tab\"
    >
      <table class=\"reservations-table\" aria-label=\"Reservations\">
        <thead>
          <tr>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Name</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Tables Assigned</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Status</th>
            <th scope=\"col\">Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Latest Bookings -->
    <section
      id=\"latest-booking\"
      role=\"tabpanel\"
      aria-labelledby=\"latest-booking-tab\"
    >
      <table class=\"reservations-table\" aria-label=\"Latest Booking\">
        <thead>
          <tr>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Name</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Tables Assigned</th>
            <th scope=\"col\">Email</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Upcoming services -->
    <section
      id=\"upcoming-services\"
      role=\"tabpanel\"
      aria-labelledby=\"upcoming-services-tab\"
      style=\"display: none\"
    >
      <table class=\"reservations-table\" aria-label=\"Upcoming Services\">
        <thead>
          <tr>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Start Time</th>
            <th scope=\"col\">End Time</th>
            <th scope=\"col\">Tables Avaliable</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Change Password Dialog -->
    <div
      id=\"change-password-dialog\"
      class=\"dialog\"
      role=\"dialog\"
      aria-labelledby=\"change-password-heading\"
      aria-hidden=\"true\"
    >
      <div class=\"dialog-content\">
        <h2 id=\"change-password-heading\">Change Password</h2>
        <form class=\"dialog-form\" id=\"change-password-form\">
          <label for=\"email\">Email</label>
          <input type=\"email\" id=\"change-password-email\" readonly />

          <label for=\"old-password\">Old Password</label>
          <input
            type=\"password\"
            id=\"old-password\"
            name=\"old-password\"
            required
          />

          <label for=\"new-password\">New Password</label>
          <input
            type=\"password\"
            id=\"new-password\"
            name=\"new-password\"
            required
          />

          <label for=\"confirm-password\">Confirm New Password</label>
          <input
            type=\"password\"
            id=\"confirm-password\"
            name=\"confirm-password\"
            required
          />

          <div
            id=\"change-password-error-box\"
            class=\"error-box\"
            role=\"alert\"
            aria-live=\"polite\"
          ></div>

          <div class=\"dialog-actions\">
            <button
              type=\"button\"
              class=\"dialog-button cancel-button\"
              aria-label=\"Cancel\"
              onclick=\"closeChangePasswordDialog()\"
            >
              Cancel
            </button>
            <button
              type=\"submit\"
              class=\"dialog-button save-button\"
              aria-label=\"Save\"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
    {{ include('./Components/bookReservationDialog.html') }} {{
    include('./Components/confirmationDialog.html') }}
  </div>
</main>

{{ include('./Components/footer.html') }}
", "pages/diner/diner.html", "/var/www/html/php_mvc/src/Views/pages/diner/diner.html");
    }
}
