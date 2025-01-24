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

/* pages/contact/contact.html */
class __TwigTemplate_86cb705bb22bc0afe5e41fbb9e5479f6 extends Template
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

<main class=\"contact-main\" aria-labelledby=\"contact-heading\" role=\"main\">
  <!-- Get in Touch Section -->
  <div class=\"contact-get-in-touch\" aria-labelledby=\"get-in-touch-heading\">
    <div class=\"get-in-touch-content\">
      <h1 id=\"get-in-touch-heading\">Get in Touch</h1>
      <div class=\"contact-links\">
        <a
          href=\"mailto:marketing@lancasters.com\"
          aria-label=\"Email for collaborations\"
        >
          For collaborations: marketing@lancasters.com
        </a>
        <a
          href=\"mailto:office@lancasters.com\"
          aria-label=\"Email for business opportunities\"
        >
          For business opportunities: office@lancasters.com
        </a>
      </div>
    </div>
  </div>

  <!-- Contact and Reservation Forms -->
  <div class=\"contact-container\">
    <section class=\"contact-forms\" aria-labelledby=\"contact-forms-heading\">
      <!-- Contact Form -->
      <div
        class=\"form-wrapper contact-form\"
        aria-labelledby=\"contact-form-heading\"
        role=\"form\"
      >
        <h2 id=\"contact-form-heading\">Contact Us</h2>
        <form id=\"contactForm\" aria-describedby=\"contact-form-description\">
          <p id=\"contact-form-description\" class=\"visually-hidden\">
            Use this form to send a message to our team.
          </p>
          <div class=\"form-group\">
            <label for=\"name\">Full Name</label>
            <input
              type=\"text\"
              id=\"name\"
              name=\"name\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"email\">Email</label>
            <input
              type=\"email\"
              id=\"email\"
              name=\"email\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"subject\">Subject</label>
            <input
              type=\"text\"
              id=\"subject\"
              name=\"subject\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"message\">Message</label>
            <textarea
              id=\"message\"
              name=\"message\"
              rows=\"5\"
              required
              aria-required=\"true\"
            ></textarea>
          </div>

          <button type=\"submit\" class=\"submit-btn\" aria-label=\"Send Message\">
            Send Message
          </button>
        </form>
      </div>
    </section>
  </div>
</main>

";
        // line 92
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
        return "pages/contact/contact.html";
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
        return array (  136 => 92,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ include('./Components/header.html') }}

<main class=\"contact-main\" aria-labelledby=\"contact-heading\" role=\"main\">
  <!-- Get in Touch Section -->
  <div class=\"contact-get-in-touch\" aria-labelledby=\"get-in-touch-heading\">
    <div class=\"get-in-touch-content\">
      <h1 id=\"get-in-touch-heading\">Get in Touch</h1>
      <div class=\"contact-links\">
        <a
          href=\"mailto:marketing@lancasters.com\"
          aria-label=\"Email for collaborations\"
        >
          For collaborations: marketing@lancasters.com
        </a>
        <a
          href=\"mailto:office@lancasters.com\"
          aria-label=\"Email for business opportunities\"
        >
          For business opportunities: office@lancasters.com
        </a>
      </div>
    </div>
  </div>

  <!-- Contact and Reservation Forms -->
  <div class=\"contact-container\">
    <section class=\"contact-forms\" aria-labelledby=\"contact-forms-heading\">
      <!-- Contact Form -->
      <div
        class=\"form-wrapper contact-form\"
        aria-labelledby=\"contact-form-heading\"
        role=\"form\"
      >
        <h2 id=\"contact-form-heading\">Contact Us</h2>
        <form id=\"contactForm\" aria-describedby=\"contact-form-description\">
          <p id=\"contact-form-description\" class=\"visually-hidden\">
            Use this form to send a message to our team.
          </p>
          <div class=\"form-group\">
            <label for=\"name\">Full Name</label>
            <input
              type=\"text\"
              id=\"name\"
              name=\"name\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"email\">Email</label>
            <input
              type=\"email\"
              id=\"email\"
              name=\"email\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"subject\">Subject</label>
            <input
              type=\"text\"
              id=\"subject\"
              name=\"subject\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"message\">Message</label>
            <textarea
              id=\"message\"
              name=\"message\"
              rows=\"5\"
              required
              aria-required=\"true\"
            ></textarea>
          </div>

          <button type=\"submit\" class=\"submit-btn\" aria-label=\"Send Message\">
            Send Message
          </button>
        </form>
      </div>
    </section>
  </div>
</main>

{{ include('./Components/footer.html') }}
", "pages/contact/contact.html", "/var/www/html/php_mvc/src/Views/pages/contact/contact.html");
    }
}
