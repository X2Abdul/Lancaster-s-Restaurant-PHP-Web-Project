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

/* header.html */
class __TwigTemplate_e31997f1b2d296a301ffa4a37edf0af0 extends Template
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
<html lang=\"en-GB\">
    <head>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
\t\t<title>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["pagetitle"] ?? null), "html", null, true);
        yield "</title>
        <link rel=\"stylesheet\" href=\"https://www.w3schools.com/w3css/4/w3.css\" />
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css\" />
    </head>
    <body>
        <div class=\"w3-bar w3-dark-grey\">
            <a href=\"index.php\" class=\"w3-bar-item w3-button w3-deep-purple\">Home</a>
            <div class=\"w3-dropdown-hover w3-hide-small\">
            <button class=\"w3-button\">
                Recipes <i class=\"fa fa-caret-down\"></i>
            </button>
            <div class=\"w3-dropdown-content w3-bar-block w3-white w3-card-4\">
                <a href=\"recipes.php?type=az\" class=\"w3-bar-item w3-button w3-text-deep-purple\">All recipes (A-Z)</a>
                <a href=\"recipes.php?type=type\" class=\"w3-bar-item w3-button w3-text-deep-purple\">Recipes by type</a>
                <a href=\"recipes.php?type=latest\" class=\"w3-bar-item w3-button w3-text-deep-purple\">Latest recipes</a>
            </div>
            </div>
            ";
        // line 23
        if (($context["LOGGED_IN"] ?? null)) {
            // line 24
            yield "                <a href=\"#\" class=\"w3-bar-item w3-button w3-right w3-mid-grey w3-text-deep-purple\"><i class=\"fa fa-sign-out\"></i></a>
            ";
        } else {
            // line 26
            yield "                <a href=\"#\" class=\"w3-bar-item w3-button w3-right w3-mid-grey w3-text-deep-purple\"><i class=\"fa fa-sign-in\"></i></a>
            ";
        }
        // line 28
        yield "        </div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "header.html";
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
        return array (  79 => 28,  75 => 26,  71 => 24,  69 => 23,  49 => 6,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en-GB\">
    <head>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
\t\t<title>{{pagetitle}}</title>
        <link rel=\"stylesheet\" href=\"https://www.w3schools.com/w3css/4/w3.css\" />
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css\" />
    </head>
    <body>
        <div class=\"w3-bar w3-dark-grey\">
            <a href=\"index.php\" class=\"w3-bar-item w3-button w3-deep-purple\">Home</a>
            <div class=\"w3-dropdown-hover w3-hide-small\">
            <button class=\"w3-button\">
                Recipes <i class=\"fa fa-caret-down\"></i>
            </button>
            <div class=\"w3-dropdown-content w3-bar-block w3-white w3-card-4\">
                <a href=\"recipes.php?type=az\" class=\"w3-bar-item w3-button w3-text-deep-purple\">All recipes (A-Z)</a>
                <a href=\"recipes.php?type=type\" class=\"w3-bar-item w3-button w3-text-deep-purple\">Recipes by type</a>
                <a href=\"recipes.php?type=latest\" class=\"w3-bar-item w3-button w3-text-deep-purple\">Latest recipes</a>
            </div>
            </div>
            {% if LOGGED_IN  %}
                <a href=\"#\" class=\"w3-bar-item w3-button w3-right w3-mid-grey w3-text-deep-purple\"><i class=\"fa fa-sign-out\"></i></a>
            {% else %}
                <a href=\"#\" class=\"w3-bar-item w3-button w3-right w3-mid-grey w3-text-deep-purple\"><i class=\"fa fa-sign-in\"></i></a>
            {% endif %}
        </div>", "header.html", "/var/www/html/php_mvc/src/Views/header.html");
    }
}
