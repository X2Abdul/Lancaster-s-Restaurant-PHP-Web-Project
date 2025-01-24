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

/* ./Components/bookReservationDialog.html */
class __TwigTemplate_3b0c47a8ea793a46f4815b0583ad93f6 extends Template
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
        yield "<!-- Book Reservations Dialog -->
<div
id=\"book-reservations-dialog\"
class=\"dialog\"
role=\"dialog\"
aria-labelledby=\"book-reservations-heading\"
aria-hidden=\"true\"
>
<div class=\"dialog-content\">
  <h2 id=\"book-reservations-heading\">Book Reservation</h2>
  <form class=\"dialog-form\" id=\"book-reservations-form\">
    <label for=\"reservation-date\">Date</label>
    <input
      type=\"date\"
      id=\"reservation-date\"
      name=\"reservation-date\"
      required
    />

    <label for=\"reservation-service\">Service</label>
    <select id=\"reservation-service\" name=\"reservation-service\" required>
      <option value=\"\" disabled selected>Select Service</option>
    </select>

    <label for=\"party-size\">Party Size</label>
    <select
      id=\"reservation-party-size\"
      name=\"reservation-party-size\"
      required
    >
      <option value=\"\" disabled selected>Select Party Size</option>
    </select>

    <label for=\"reservation-time\">Time</label>
    <select
      id=\"reservation-time\"
      name=\"reservation-time\"
      required
    >
      <option value=\"\" disabled selected>Select Start Time</option>
    </select>

    <label for=\"lead-name\">Name</label>
    <input
      type=\"text\"
      id=\"reservation-lead-name\"
      name=\"reservation-lead-name\"
      required
    />

    <label for=\"email\">Email</label>
    <input
      type=\"email\"
      id=\"reservation-email\"
      name=\"reservation-email\"
      required
    />

    <div
      id=\"reservation-error-box\"
      class=\"error-box\"
      role=\"alert\"
      aria-live=\"polite\"
    ></div>

    <div class=\"dialog-actions\">
      <button
        type=\"button\"
        class=\"dialog-button cancel-button\"
        aria-label=\"Cancel\"
        onclick=\"handleClose()\"
      >
        Cancel
      </button>
      <button
        type=\"submit\"
        class=\"dialog-button save-button\"
        aria-label=\"Save\"
      >
        Book
      </button>
    </div>
  </form>
</div>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "./Components/bookReservationDialog.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- Book Reservations Dialog -->
<div
id=\"book-reservations-dialog\"
class=\"dialog\"
role=\"dialog\"
aria-labelledby=\"book-reservations-heading\"
aria-hidden=\"true\"
>
<div class=\"dialog-content\">
  <h2 id=\"book-reservations-heading\">Book Reservation</h2>
  <form class=\"dialog-form\" id=\"book-reservations-form\">
    <label for=\"reservation-date\">Date</label>
    <input
      type=\"date\"
      id=\"reservation-date\"
      name=\"reservation-date\"
      required
    />

    <label for=\"reservation-service\">Service</label>
    <select id=\"reservation-service\" name=\"reservation-service\" required>
      <option value=\"\" disabled selected>Select Service</option>
    </select>

    <label for=\"party-size\">Party Size</label>
    <select
      id=\"reservation-party-size\"
      name=\"reservation-party-size\"
      required
    >
      <option value=\"\" disabled selected>Select Party Size</option>
    </select>

    <label for=\"reservation-time\">Time</label>
    <select
      id=\"reservation-time\"
      name=\"reservation-time\"
      required
    >
      <option value=\"\" disabled selected>Select Start Time</option>
    </select>

    <label for=\"lead-name\">Name</label>
    <input
      type=\"text\"
      id=\"reservation-lead-name\"
      name=\"reservation-lead-name\"
      required
    />

    <label for=\"email\">Email</label>
    <input
      type=\"email\"
      id=\"reservation-email\"
      name=\"reservation-email\"
      required
    />

    <div
      id=\"reservation-error-box\"
      class=\"error-box\"
      role=\"alert\"
      aria-live=\"polite\"
    ></div>

    <div class=\"dialog-actions\">
      <button
        type=\"button\"
        class=\"dialog-button cancel-button\"
        aria-label=\"Cancel\"
        onclick=\"handleClose()\"
      >
        Cancel
      </button>
      <button
        type=\"submit\"
        class=\"dialog-button save-button\"
        aria-label=\"Save\"
      >
        Book
      </button>
    </div>
  </form>
</div>
</div>", "./Components/bookReservationDialog.html", "/var/www/html/php_mvc/src/Views/Components/bookReservationDialog.html");
    }
}
