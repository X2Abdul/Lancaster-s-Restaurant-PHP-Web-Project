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

/* pages/guest/guest.html */
class __TwigTemplate_d4b77e349e7dee65e5a4346cc12ecb9c extends Template
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
        <h1 class=\"dashboard-title\">Guest Dashboard</h1>
        <form action=\"/dashboard\" method=\"get\">
          <button
            class=\"dashboard-button logout-button\"
            type=\"submit\"
            aria-label=\"Logout\"
          >
            Login/Sign Up
          </button>
        </form>
      </div>
      <div class=\"dashboard-actions\">
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
    <p id=\"welcome-username\" aria-label=\"welcome-username\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["welcome"] ?? null), "html", null, true);
        yield "</p>
    <nav class=\"dashboard-tabs\" role=\"tablist\">
      <button
        class=\"dashboard-tab active\"
        role=\"tab\"
        aria-selected=\"true\"
        aria-controls=\"upcoming-services\"
      >
        Upcoming Services
      </button>
    </nav>

    <!-- Upcoming services -->
    <section
      id=\"upcoming-services\"
      role=\"tabpanel\"
      aria-labelledby=\"upcoming-services-tab\"
      style=\"display: block\"
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

    ";
        // line 62
        yield Twig\Extension\CoreExtension::include($this->env, $context, "./Components/bookReservationDialog.html");
        yield "
    ";
        // line 63
        yield Twig\Extension\CoreExtension::include($this->env, $context, "./Components/confirmationDialog.html");
        yield "
  </div>
</main>

";
        // line 67
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
        return "pages/guest/guest.html";
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
        return array (  120 => 67,  113 => 63,  109 => 62,  73 => 29,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ include('./Components/header.html') }}

<main>
  <div class=\"dashboard-container\">
    <header class=\"dashboard-header\">
      <div class=\"dashboard-header-title\">
        <h1 class=\"dashboard-title\">Guest Dashboard</h1>
        <form action=\"/dashboard\" method=\"get\">
          <button
            class=\"dashboard-button logout-button\"
            type=\"submit\"
            aria-label=\"Logout\"
          >
            Login/Sign Up
          </button>
        </form>
      </div>
      <div class=\"dashboard-actions\">
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
    <p id=\"welcome-username\" aria-label=\"welcome-username\">{{ welcome }}</p>
    <nav class=\"dashboard-tabs\" role=\"tablist\">
      <button
        class=\"dashboard-tab active\"
        role=\"tab\"
        aria-selected=\"true\"
        aria-controls=\"upcoming-services\"
      >
        Upcoming Services
      </button>
    </nav>

    <!-- Upcoming services -->
    <section
      id=\"upcoming-services\"
      role=\"tabpanel\"
      aria-labelledby=\"upcoming-services-tab\"
      style=\"display: block\"
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

    {{ include('./Components/bookReservationDialog.html') }}
    {{ include('./Components/confirmationDialog.html') }}
  </div>
</main>

{{ include('./Components/footer.html') }}
", "pages/guest/guest.html", "/var/www/html/php_mvc/src/Views/pages/guest/guest.html");
    }
}
