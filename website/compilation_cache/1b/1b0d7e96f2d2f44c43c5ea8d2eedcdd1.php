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

/* pages/contacts/contact.html */
class __TwigTemplate_5f001f70c98b5e6b7a2e9c96c46b7f61 extends Template
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

      <!-- Reservation Form -->
      <div
        class=\"form-wrapper reservation-form\"
        aria-labelledby=\"reservation-form-heading\"
        role=\"form\"
      >
        <h2 id=\"reservation-form-heading\">Book Reservation</h2>
        <form
          id=\"reservationForm\"
          aria-describedby=\"reservation-form-description\"
        >
          <p id=\"reservation-form-description\" class=\"visually-hidden\">
            Use this form to book a reservation with us.
          </p>
          <div class=\"form-group\">
            <label for=\"bookingName\">Full Name</label>
            <input
              type=\"text\"
              id=\"bookingName\"
              name=\"bookingName\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"bookingEmail\">Email</label>
            <input
              type=\"email\"
              id=\"bookingEmail\"
              name=\"bookingEmail\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"phone\">Phone Number</label>
            <input
              type=\"tel\"
              id=\"phone\"
              name=\"phone\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-row\">
            <div class=\"form-group\">
              <label for=\"date\">Date</label>
              <input
                type=\"date\"
                id=\"date\"
                name=\"date\"
                required
                aria-required=\"true\"
              />
            </div>

            <div class=\"form-group\">
              <label for=\"time\">Time</label>
              <input
                type=\"time\"
                id=\"time\"
                name=\"time\"
                required
                aria-required=\"true\"
              />
            </div>
          </div>

          <div class=\"form-group\">
            <label for=\"guests\">Number of Guests</label>
            <select
              id=\"guests\"
              name=\"guests\"
              required
              aria-required=\"true\"
              aria-label=\"Select number of guests\"
            >
              <option value=\"\">Select number of guests</option>
              <option value=\"1\">1 Person</option>
              <option value=\"2\">2 People</option>
              <option value=\"3\">3 People</option>
              <option value=\"4\">4 People</option>
              <option value=\"5\">5 People</option>
              <option value=\"6\">6 People</option>
              <option value=\"7+\">7+ People</option>
            </select>
          </div>

          <button type=\"submit\" class=\"submit-btn\" aria-label=\"Book Now\">
            Book Now
          </button>
        </form>
      </div>
    </section>
  </div>
</main>

";
        // line 189
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
        return "pages/contacts/contact.html";
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
        return array (  233 => 189,  42 => 1,);
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

      <!-- Reservation Form -->
      <div
        class=\"form-wrapper reservation-form\"
        aria-labelledby=\"reservation-form-heading\"
        role=\"form\"
      >
        <h2 id=\"reservation-form-heading\">Book Reservation</h2>
        <form
          id=\"reservationForm\"
          aria-describedby=\"reservation-form-description\"
        >
          <p id=\"reservation-form-description\" class=\"visually-hidden\">
            Use this form to book a reservation with us.
          </p>
          <div class=\"form-group\">
            <label for=\"bookingName\">Full Name</label>
            <input
              type=\"text\"
              id=\"bookingName\"
              name=\"bookingName\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"bookingEmail\">Email</label>
            <input
              type=\"email\"
              id=\"bookingEmail\"
              name=\"bookingEmail\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"phone\">Phone Number</label>
            <input
              type=\"tel\"
              id=\"phone\"
              name=\"phone\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-row\">
            <div class=\"form-group\">
              <label for=\"date\">Date</label>
              <input
                type=\"date\"
                id=\"date\"
                name=\"date\"
                required
                aria-required=\"true\"
              />
            </div>

            <div class=\"form-group\">
              <label for=\"time\">Time</label>
              <input
                type=\"time\"
                id=\"time\"
                name=\"time\"
                required
                aria-required=\"true\"
              />
            </div>
          </div>

          <div class=\"form-group\">
            <label for=\"guests\">Number of Guests</label>
            <select
              id=\"guests\"
              name=\"guests\"
              required
              aria-required=\"true\"
              aria-label=\"Select number of guests\"
            >
              <option value=\"\">Select number of guests</option>
              <option value=\"1\">1 Person</option>
              <option value=\"2\">2 People</option>
              <option value=\"3\">3 People</option>
              <option value=\"4\">4 People</option>
              <option value=\"5\">5 People</option>
              <option value=\"6\">6 People</option>
              <option value=\"7+\">7+ People</option>
            </select>
          </div>

          <button type=\"submit\" class=\"submit-btn\" aria-label=\"Book Now\">
            Book Now
          </button>
        </form>
      </div>
    </section>
  </div>
</main>

{{ include('./Components/footer.html') }}
", "pages/contacts/contact.html", "/var/www/html/php_mvc/src/Views/pages/contacts/contact.html");
    }
}
