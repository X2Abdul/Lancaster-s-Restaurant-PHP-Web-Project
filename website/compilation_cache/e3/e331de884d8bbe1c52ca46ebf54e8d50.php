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

/* ./Components/confirmationDialog.html */
class __TwigTemplate_644416fac0e5febf8639613f64f8d36d extends Template
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
        yield "<!-- Booking Confirmation Dialog -->
<div
  id=\"booking-confirmation-dialog\"
  class=\"dialog\"
  role=\"dialog\"
  aria-labelledby=\"booking-confirmation-heading\"
  aria-hidden=\"true\"
>
  <div class=\"dialog-content\">
    <h2 id=\"booking-confirmation-heading\">Reservation Confirmation</h2>

    <div class=\"booking-details\">
      <p>
        Thank you <strong>";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["username"] ?? null), "html", null, true);
        yield "</strong> for booking a reservation at
        Lancasters.
      </p>
      <p id=\"login-message\"></p>
    </div>
    <div class=\"booking-details\">
      <h3>Booking Details:</h3>
      <p><strong>Name:</strong> ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["username"] ?? null), "html", null, true);
        yield "</p>
      <p><strong>Email:</strong> ";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["userEmail"] ?? null), "html", null, true);
        yield "</p>
      <p><strong>Service:</strong> ";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingService"] ?? null), "html", null, true);
        yield "</p>
      <p><strong>Date:</strong> ";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingDate"] ?? null), "html", null, true);
        yield "</p>
      <p><strong>Time:</strong> ";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingTime"] ?? null), "html", null, true);
        yield "</p>
      <p><strong>Party Size:</strong> ";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingPartySize"] ?? null), "html", null, true);
        yield "</p>
      <p><strong>Tables Assigned:</strong> ";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingTablesAssigned"] ?? null), "html", null, true);
        yield "</p>
    </div>
    <div class=\"confirmation-dialog-buttons\">
      <div class=\"dialog-actions confirmation-dialog-actions\">
        <button
          type=\"button\"
          class=\"dashboard-button add-to-calendar-button\"
          aria-label=\"Add to Calendar\"
          onclick=\"addToCalendar('";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["username"] ?? null), "html", null, true);
        yield "', '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingDate"] ?? null), "html", null, true);
        yield "', '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingTime"] ?? null), "html", null, true);
        yield "')\"
        >
          Add to Calendar
        </button>
        <button
          type=\"button\"
          class=\"dashboard-button confirmation-email-button\"
          aria-label=\"Send Confirmation Email\"
          onclick=\"sendConfirmationEmail('";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["username"] ?? null), "html", null, true);
        yield "', '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingDate"] ?? null), "html", null, true);
        yield "', '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingTime"] ?? null), "html", null, true);
        yield "', '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingService"] ?? null), "html", null, true);
        yield "', '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingPartySize"] ?? null), "html", null, true);
        yield "', '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bookingTablesAssigned"] ?? null), "html", null, true);
        yield "', '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["userEmail"] ?? null), "html", null, true);
        yield "')\"
        >
          Confirmation Email
        </button>
      </div>
      <button
        id=\"close-confirmation-dialog\"
        type=\"button\"
        class=\"dashboard-button cancel-button\"
        aria-label=\"close\"
        onclick=\"handleConfirmationClose()\"
      >
        Close
      </button>
    </div>
  </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "./Components/confirmationDialog.html";
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
        return array (  117 => 43,  102 => 35,  91 => 27,  87 => 26,  83 => 25,  79 => 24,  75 => 23,  71 => 22,  67 => 21,  57 => 14,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- Booking Confirmation Dialog -->
<div
  id=\"booking-confirmation-dialog\"
  class=\"dialog\"
  role=\"dialog\"
  aria-labelledby=\"booking-confirmation-heading\"
  aria-hidden=\"true\"
>
  <div class=\"dialog-content\">
    <h2 id=\"booking-confirmation-heading\">Reservation Confirmation</h2>

    <div class=\"booking-details\">
      <p>
        Thank you <strong>{{ username }}</strong> for booking a reservation at
        Lancasters.
      </p>
      <p id=\"login-message\"></p>
    </div>
    <div class=\"booking-details\">
      <h3>Booking Details:</h3>
      <p><strong>Name:</strong> {{ username }}</p>
      <p><strong>Email:</strong> {{ userEmail }}</p>
      <p><strong>Service:</strong> {{ bookingService }}</p>
      <p><strong>Date:</strong> {{ bookingDate }}</p>
      <p><strong>Time:</strong> {{ bookingTime }}</p>
      <p><strong>Party Size:</strong> {{ bookingPartySize }}</p>
      <p><strong>Tables Assigned:</strong> {{ bookingTablesAssigned }}</p>
    </div>
    <div class=\"confirmation-dialog-buttons\">
      <div class=\"dialog-actions confirmation-dialog-actions\">
        <button
          type=\"button\"
          class=\"dashboard-button add-to-calendar-button\"
          aria-label=\"Add to Calendar\"
          onclick=\"addToCalendar('{{ username }}', '{{ bookingDate }}', '{{ bookingTime }}')\"
        >
          Add to Calendar
        </button>
        <button
          type=\"button\"
          class=\"dashboard-button confirmation-email-button\"
          aria-label=\"Send Confirmation Email\"
          onclick=\"sendConfirmationEmail('{{ username }}', '{{ bookingDate }}', '{{ bookingTime }}', '{{ bookingService }}', '{{ bookingPartySize }}', '{{ bookingTablesAssigned }}', '{{ userEmail }}')\"
        >
          Confirmation Email
        </button>
      </div>
      <button
        id=\"close-confirmation-dialog\"
        type=\"button\"
        class=\"dashboard-button cancel-button\"
        aria-label=\"close\"
        onclick=\"handleConfirmationClose()\"
      >
        Close
      </button>
    </div>
  </div>
</div>
", "./Components/confirmationDialog.html", "/var/www/html/webiste/src/Views/Components/confirmationDialog.html");
    }
}
