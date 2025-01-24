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

/* ./Components/header.html */
class __TwigTemplate_d2a3d4396638223df441837895287693 extends Template
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
        yield "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"UTF-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <!-- Favicon -->
    <link
      rel=\"icon\"
      type=\"image/png\"
      href=\"../../../public/media/images/logos/Lancaster's-logos_transparent1.png\"
    />
    <title>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["pagetitle"] ?? null), "html", null, true);
        yield "</title>

    <!-- Css -->
    <link rel=\"stylesheet\" href=\"../../../public/css/styles.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/global.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/fonts.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/menu.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/reviews.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/contact.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/dashboard.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/staff.css\" />

    <!-- Js -->
    <script src=\"../../../public/js/loginDashboard.js\"></script>
    <script src=\"../../../public/js/staffDashboard.js\"></script>
    <script src=\"../../../public/js/dinerDashboard.js\"></script>
    <script src=\"../../../public/js/guestDashboard.js\"></script>
  </head>
  <body>
    <header class=\"header\" role=\"banner\">
      <div class=\"nav-container\">
        <div class=\"logo\">
          <a href=\"/\">
            <img
              src=\"../../../public/media/images/logos/Lancaster's-logos_white1.png\"
              alt=\"Lancaster's Restaurant Logo\"
              height=\"100px\"
              width=\"220px\"
            />
          </a>
        </div>

        <nav class=\"nav\" role=\"navigation\" aria-label=\"Main Navigation\">
          <a class=\"nav-options\" href=\"/\">Home</a>
          <a class=\"nav-options\" href=\"/menu\">Menu</a>
          <a class=\"nav-options\" href=\"/reviews\">Reviews</a>
          <a class=\"nav-options\" href=\"/contact\">Contact</a>
        </nav>
        <button
          onclick=\"location.href='/dashboard'\"
          class=\"book-reservation-button\"
          aria-label=\"Book Reservation\"
        >
          Booking Dashboard
        </button>
      </div>
    </header>
  </body>
</html>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "./Components/header.html";
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
        return array (  55 => 12,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"UTF-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <!-- Favicon -->
    <link
      rel=\"icon\"
      type=\"image/png\"
      href=\"../../../public/media/images/logos/Lancaster's-logos_transparent1.png\"
    />
    <title>{{pagetitle}}</title>

    <!-- Css -->
    <link rel=\"stylesheet\" href=\"../../../public/css/styles.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/global.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/fonts.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/menu.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/reviews.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/contact.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/dashboard.css\" />
    <link rel=\"stylesheet\" href=\"../../../public/css/staff.css\" />

    <!-- Js -->
    <script src=\"../../../public/js/loginDashboard.js\"></script>
    <script src=\"../../../public/js/staffDashboard.js\"></script>
    <script src=\"../../../public/js/dinerDashboard.js\"></script>
    <script src=\"../../../public/js/guestDashboard.js\"></script>
  </head>
  <body>
    <header class=\"header\" role=\"banner\">
      <div class=\"nav-container\">
        <div class=\"logo\">
          <a href=\"/\">
            <img
              src=\"../../../public/media/images/logos/Lancaster's-logos_white1.png\"
              alt=\"Lancaster's Restaurant Logo\"
              height=\"100px\"
              width=\"220px\"
            />
          </a>
        </div>

        <nav class=\"nav\" role=\"navigation\" aria-label=\"Main Navigation\">
          <a class=\"nav-options\" href=\"/\">Home</a>
          <a class=\"nav-options\" href=\"/menu\">Menu</a>
          <a class=\"nav-options\" href=\"/reviews\">Reviews</a>
          <a class=\"nav-options\" href=\"/contact\">Contact</a>
        </nav>
        <button
          onclick=\"location.href='/dashboard'\"
          class=\"book-reservation-button\"
          aria-label=\"Book Reservation\"
        >
          Booking Dashboard
        </button>
      </div>
    </header>
  </body>
</html>
", "./Components/header.html", "/var/www/html/php_mvc/src/Views/Components/header.html");
    }
}
