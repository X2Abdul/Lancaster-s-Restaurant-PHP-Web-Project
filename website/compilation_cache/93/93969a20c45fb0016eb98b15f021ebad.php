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

/* pages/staff/staff.html */
class __TwigTemplate_c14f9b6c9ae95d039994ef0a5c1fbc39 extends Template
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
        <h1 class=\"dashboard-title\">Staff Dashboard</h1>
        <form action=\"/logout\" method=\"post\">
          <button
            class=\"dashboard-button logout-button\"
            type=\"submit\"
            aria-label=\"Logout\"
          >
            Logout
          </button>
        </form>
      </div>
      <div class=\"dashboard-actions\">
        <button
          class=\"dashboard-button\"
          type=\"button\"
          aria-label=\"Print upcoming reservations\"
          id=\"print-bookings\"
        >
          Print Bookings
        </button>
        <button
          class=\"dashboard-button\"
          type=\"button\"
          aria-label=\"Set new service\"
        >
          Set Service
        </button>
      </div>
    </header>
    <p id=\"welcome-username\" aria-label=\"welcome-username\"></p>
    <nav class=\"dashboard-tabs\" role=\"tablist\">
      <button
        class=\"dashboard-tab active\"
        role=\"tab\"
        aria-selected=\"true\"
        aria-controls=\"current-bookings\"
      >
        Today's  Bookings
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"upcoming-bookings\"
      >
        Upcoming Bookings
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"upcoming-services\"
      >
        Upcoming Services
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"bookings-for-next-service\"
      >
        Bookings for Next Service
      </button>
    </nav>

    <div
      id=\"set-service-dialog\"
      class=\"dialog\"
      role=\"dialog\"
      aria-labelledby=\"set-service-heading\"
      aria-hidden=\"true\"
    >
      <div class=\"dialog-content\">
        <h2 id=\"set-service-heading\">Set Service</h2>
        <form class=\"dialog-form\" id=\"set-service-form\">
          <label for=\"service-date\">Date</label>
          <input type=\"date\" id=\"service-date\" name=\"service-date\" required />

          <label for=\"service-type\">Service Type</label>
          <select id=\"service-type\" name=\"service-type\">
            <option value=\"\" disabled selected>Select Service</option>
            <option value=\"Breakfast\">Breakfast</option>
            <option value=\"Lunch\">Lunch</option>
            <option value=\"Dinner\">Dinner</option>
          </select>
          <label for=\"start-time\">Start Time</label>
          <input type=\"time\" id=\"start-time\" name=\"start-time\" required />

          <label for=\"end-time\">End Time</label>
          <input type=\"time\" id=\"end-time\" name=\"end-time\" required />

          <label for=\"tables-available\">Tables Available</label>
          <input
            type=\"number\"
            id=\"tables-available\"
            name=\"tables-available\"
            min=\"1\"
            required
          />
          <div
            id=\"error-box\"
            class=\"error-box\"
            role=\"alert\"
            aria-live=\"polite\"
          ></div>

          <div class=\"dialog-actions\">
            <button
              type=\"button\"
              class=\"dialog-button cancel-button\"
              aria-label=\"Cancel\"
            >
              Cancel
            </button>
            <button
              type=\"submit\"
              class=\"dialog-button save-button\"
              aria-label=\"Save\"
            >
              Save
            </button>
          </div>
        </form>
      </div>
    </div>

    <div
      id=\"edit-service-dialog\"
      class=\"dialog\"
      role=\"dialog\"
      aria-labelledby=\"edit-service-heading\"
      aria-hidden=\"true\"
    >
      <div class=\"dialog-content\">
        <h2 id=\"edit-service-heading\">Edit Service</h2>
        <form class=\"dialog-form\" id=\"edit-service-form\">
          <label for=\"edit-service-id\">ID</label>
          <input
            type=\"number\"
            id=\"edit-service-id\"
            name=\"edit-service-id\"
            required
            readonly
          />
          <label for=\"edit-service-date\">Date</label>
          <input
            type=\"date\"
            id=\"edit-service-date\"
            name=\"edit-service-date\"
            required
          />
          <label for=\"edit-service-type\">Service Type</label>
          <select id=\"edit-service-type\" name=\"edit-service-type\" required>
            <option value=\"\" disabled selected>Select Service</option>
            <option value=\"Breakfast\">Breakfast</option>
            <option value=\"Lunch\">Lunch</option>
            <option value=\"Dinner\">Dinner</option>
          </select>

          <label for=\"edit-start-time\">Start Time</label>
          <input
            type=\"time\"
            id=\"edit-start-time\"
            name=\"edit-start-time\"
            required
          />

          <label for=\"edit-end-time\">End Time</label>
          <input type=\"time\" id=\"edit-end-time\" name=\"edit-end-time\" required />

          <label for=\"edit-tables-available\">Tables Available</label>
          <input
            type=\"number\"
            id=\"edit-tables-available\"
            name=\"edit-tables-available\"
            min=\"1\"
            required
          />
          <div
            id=\"edit-error-box\"
            class=\"error-box\"
            role=\"alert\"
            aria-live=\"polite\"
          ></div>

          <div class=\"dialog-actions\">
            <button
              type=\"button\"
              class=\"dialog-button cancel-button\"
              aria-label=\"Cancel\"
              id=\"cancel-edit-dialog\"
            >
              Cancel
            </button>
            <button
              type=\"button\"
              class=\"dialog-button delete-button\"
              aria-label=\"Delete\"
              id=\"delete-edit-dialog\"
            >
              Delete
            </button>
            <button
              type=\"submit\"
              class=\"dialog-button save-button\"
              aria-label=\"Save\"
            >
              Save
            </button>            
          </div>
        </form>
      </div>
    </div>

    <!-- Today's bookings -->
    <section
      id=\"current-bookings\"
      role=\"tabpanel\"
      aria-labelledby=\"current-bookings-tab\"
    >
      <table class=\"reservations-table\" aria-label=\"Current Reservations\">
        <thead>
          <tr>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Name</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Tables Needed</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Status</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Upcoming bookings -->
    <section
      id=\"upcoming-bookings\"
      role=\"tabpanel\"
      aria-labelledby=\"upcoming-bookings-tab\"
      style=\"display: none\"
    >
      <table class=\"reservations-table\" aria-label=\"Upcoming Bookings\">
        <thead>
          <tr>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Name</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Tables Needed</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Status</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Upcoming Services -->
    <section
      id=\"upcoming-services\"
      role=\"tabpanel\"
      aria-labelledby=\"upcoming-services-tab\"
      style=\"display: none\"
    >
      <table class=\"reservations-table\" aria-label=\"Upcoming Services\">
        <thead>
          <tr>
            <th scope=\"col\">ID</th>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Start Time</th>
            <th scope=\"col\">End Time</th>
            <th scope=\"col\">Tables Avaliable</th>
            <th scope=\"col\">Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Bookings for Next Service -->
    <section
      id=\"bookings-for-next-service\"
      role=\"tabpanel\"
      aria-labelledby=\"bookings-for-next-service-tab\"
      style=\"display: none\"
    >
      <table class=\"reservations-table\" aria-label=\"Bookings for Next Service\">
        <thead>
          <tr>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Name</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>
  </div>
</main>

";
        // line 311
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
        return "pages/staff/staff.html";
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
        return array (  355 => 311,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ include('./Components/header.html') }}

<main>
  <div class=\"dashboard-container\">
    <header class=\"dashboard-header\">
      <div class=\"dashboard-header-title\">
        <h1 class=\"dashboard-title\">Staff Dashboard</h1>
        <form action=\"/logout\" method=\"post\">
          <button
            class=\"dashboard-button logout-button\"
            type=\"submit\"
            aria-label=\"Logout\"
          >
            Logout
          </button>
        </form>
      </div>
      <div class=\"dashboard-actions\">
        <button
          class=\"dashboard-button\"
          type=\"button\"
          aria-label=\"Print upcoming reservations\"
          id=\"print-bookings\"
        >
          Print Bookings
        </button>
        <button
          class=\"dashboard-button\"
          type=\"button\"
          aria-label=\"Set new service\"
        >
          Set Service
        </button>
      </div>
    </header>
    <p id=\"welcome-username\" aria-label=\"welcome-username\"></p>
    <nav class=\"dashboard-tabs\" role=\"tablist\">
      <button
        class=\"dashboard-tab active\"
        role=\"tab\"
        aria-selected=\"true\"
        aria-controls=\"current-bookings\"
      >
        Today's  Bookings
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"upcoming-bookings\"
      >
        Upcoming Bookings
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"upcoming-services\"
      >
        Upcoming Services
      </button>
      <button
        class=\"dashboard-tab\"
        role=\"tab\"
        aria-selected=\"false\"
        aria-controls=\"bookings-for-next-service\"
      >
        Bookings for Next Service
      </button>
    </nav>

    <div
      id=\"set-service-dialog\"
      class=\"dialog\"
      role=\"dialog\"
      aria-labelledby=\"set-service-heading\"
      aria-hidden=\"true\"
    >
      <div class=\"dialog-content\">
        <h2 id=\"set-service-heading\">Set Service</h2>
        <form class=\"dialog-form\" id=\"set-service-form\">
          <label for=\"service-date\">Date</label>
          <input type=\"date\" id=\"service-date\" name=\"service-date\" required />

          <label for=\"service-type\">Service Type</label>
          <select id=\"service-type\" name=\"service-type\">
            <option value=\"\" disabled selected>Select Service</option>
            <option value=\"Breakfast\">Breakfast</option>
            <option value=\"Lunch\">Lunch</option>
            <option value=\"Dinner\">Dinner</option>
          </select>
          <label for=\"start-time\">Start Time</label>
          <input type=\"time\" id=\"start-time\" name=\"start-time\" required />

          <label for=\"end-time\">End Time</label>
          <input type=\"time\" id=\"end-time\" name=\"end-time\" required />

          <label for=\"tables-available\">Tables Available</label>
          <input
            type=\"number\"
            id=\"tables-available\"
            name=\"tables-available\"
            min=\"1\"
            required
          />
          <div
            id=\"error-box\"
            class=\"error-box\"
            role=\"alert\"
            aria-live=\"polite\"
          ></div>

          <div class=\"dialog-actions\">
            <button
              type=\"button\"
              class=\"dialog-button cancel-button\"
              aria-label=\"Cancel\"
            >
              Cancel
            </button>
            <button
              type=\"submit\"
              class=\"dialog-button save-button\"
              aria-label=\"Save\"
            >
              Save
            </button>
          </div>
        </form>
      </div>
    </div>

    <div
      id=\"edit-service-dialog\"
      class=\"dialog\"
      role=\"dialog\"
      aria-labelledby=\"edit-service-heading\"
      aria-hidden=\"true\"
    >
      <div class=\"dialog-content\">
        <h2 id=\"edit-service-heading\">Edit Service</h2>
        <form class=\"dialog-form\" id=\"edit-service-form\">
          <label for=\"edit-service-id\">ID</label>
          <input
            type=\"number\"
            id=\"edit-service-id\"
            name=\"edit-service-id\"
            required
            readonly
          />
          <label for=\"edit-service-date\">Date</label>
          <input
            type=\"date\"
            id=\"edit-service-date\"
            name=\"edit-service-date\"
            required
          />
          <label for=\"edit-service-type\">Service Type</label>
          <select id=\"edit-service-type\" name=\"edit-service-type\" required>
            <option value=\"\" disabled selected>Select Service</option>
            <option value=\"Breakfast\">Breakfast</option>
            <option value=\"Lunch\">Lunch</option>
            <option value=\"Dinner\">Dinner</option>
          </select>

          <label for=\"edit-start-time\">Start Time</label>
          <input
            type=\"time\"
            id=\"edit-start-time\"
            name=\"edit-start-time\"
            required
          />

          <label for=\"edit-end-time\">End Time</label>
          <input type=\"time\" id=\"edit-end-time\" name=\"edit-end-time\" required />

          <label for=\"edit-tables-available\">Tables Available</label>
          <input
            type=\"number\"
            id=\"edit-tables-available\"
            name=\"edit-tables-available\"
            min=\"1\"
            required
          />
          <div
            id=\"edit-error-box\"
            class=\"error-box\"
            role=\"alert\"
            aria-live=\"polite\"
          ></div>

          <div class=\"dialog-actions\">
            <button
              type=\"button\"
              class=\"dialog-button cancel-button\"
              aria-label=\"Cancel\"
              id=\"cancel-edit-dialog\"
            >
              Cancel
            </button>
            <button
              type=\"button\"
              class=\"dialog-button delete-button\"
              aria-label=\"Delete\"
              id=\"delete-edit-dialog\"
            >
              Delete
            </button>
            <button
              type=\"submit\"
              class=\"dialog-button save-button\"
              aria-label=\"Save\"
            >
              Save
            </button>            
          </div>
        </form>
      </div>
    </div>

    <!-- Today's bookings -->
    <section
      id=\"current-bookings\"
      role=\"tabpanel\"
      aria-labelledby=\"current-bookings-tab\"
    >
      <table class=\"reservations-table\" aria-label=\"Current Reservations\">
        <thead>
          <tr>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Name</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Tables Needed</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Status</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Upcoming bookings -->
    <section
      id=\"upcoming-bookings\"
      role=\"tabpanel\"
      aria-labelledby=\"upcoming-bookings-tab\"
      style=\"display: none\"
    >
      <table class=\"reservations-table\" aria-label=\"Upcoming Bookings\">
        <thead>
          <tr>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Name</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Tables Needed</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Status</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Upcoming Services -->
    <section
      id=\"upcoming-services\"
      role=\"tabpanel\"
      aria-labelledby=\"upcoming-services-tab\"
      style=\"display: none\"
    >
      <table class=\"reservations-table\" aria-label=\"Upcoming Services\">
        <thead>
          <tr>
            <th scope=\"col\">ID</th>
            <th scope=\"col\">Date</th>
            <th scope=\"col\">Service</th>
            <th scope=\"col\">Start Time</th>
            <th scope=\"col\">End Time</th>
            <th scope=\"col\">Tables Avaliable</th>
            <th scope=\"col\">Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>

    <!-- Bookings for Next Service -->
    <section
      id=\"bookings-for-next-service\"
      role=\"tabpanel\"
      aria-labelledby=\"bookings-for-next-service-tab\"
      style=\"display: none\"
    >
      <table class=\"reservations-table\" aria-label=\"Bookings for Next Service\">
        <thead>
          <tr>
            <th scope=\"col\">Time</th>
            <th scope=\"col\">Party Size</th>
            <th scope=\"col\">Name</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>
  </div>
</main>

{{ include('./Components/footer.html') }}
", "pages/staff/staff.html", "/var/www/html/php_mvc/src/Views/pages/staff/staff.html");
    }
}
