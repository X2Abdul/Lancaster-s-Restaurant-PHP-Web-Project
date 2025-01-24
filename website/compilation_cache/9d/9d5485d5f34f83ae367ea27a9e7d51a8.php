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

/* pages/login/login.html */
class __TwigTemplate_54b35ee43c2a315ca10303dd915c7329 extends Template
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

<main class=\"dashboard-main\" aria-labelledby=\"dashboard-heading\" role=\"main\">
  <div class=\"dashboard-header\" aria-labelledby=\"dashboard-header-heading\">
    <div class=\"dashboard-header-content\">
      <h1 id=\"dashboard-header-heading\">Booking Dashboard</h1>
      <p>Please login or create an account to manage your reservations</p>
    </div>
  </div>

  <!-- Login Forms -->
  <div class=\"dashboard-container\">
    <section class=\"dashboard-forms\" aria-labelledby=\"dashboard-forms-heading\">
      <!-- Staff Login Form -->
      <div
        class=\"form-wrapper staff-form\"
        aria-labelledby=\"staff-form-heading\"
        role=\"form\"
      >
        <h2 id=\"staff-form-heading\">Staff Login</h2>
        <form
          id=\"staffLoginForm\"
          method=\"post\"
          action=\"/dashboard/authenticate\"
        >
          <input type=\"hidden\" name=\"role\" value=\"staff\" />

          <div class=\"form-group\">
            <label for=\"staffEmail\">Email</label>
            <input
              type=\"email\"
              id=\"staffEmail\"
              name=\"email\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"staffPassword\">Password</label>
            <input
              type=\"password\"
              id=\"staffPassword\"
              name=\"password\"
              required
              aria-required=\"true\"
            />
          </div>

          <div id=\"staffErrorBox\" class=\"error-box\"></div>

          <button type=\"submit\" class=\"submit-btn\">Login</button>
        </form>
      </div>

      <!-- Customer Login Form -->
      <div
        class=\"form-wrapper customer-form\"
        aria-labelledby=\"customer-form-heading\"
        role=\"form\"
      >
        <h2 id=\"customer-form-heading\">Customer Login</h2>
        <form
          id=\"customerLoginForm\"
          method=\"post\"
          action=\"/dashboard/authenticate\"
        >
          <input type=\"hidden\" name=\"role\" value=\"customer\" />

          <div class=\"form-group\">
            <label for=\"customerEmail\">Email</label>
            <input
              type=\"email\"
              id=\"customerEmail\"
              name=\"email\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"customerPassword\">Password</label>
            <input
              type=\"password\"
              id=\"customerPassword\"
              name=\"password\"
              required
              aria-required=\"true\"
            />
          </div>

          <div id=\"customerErrorBox\" class=\"error-box\"></div>

          <button type=\"submit\" class=\"submit-btn\">Login</button>
          <button
            type=\"button\"
            class=\"toggle-btn\"
            onclick=\"toggleCustomerForm()\"
          >
            Sign Up
          </button>
        </form>
      </div>
    </section>

    <!-- Account Confirmation Dialog -->
    <div
      id=\"account-confirmation-dialog\"
      class=\"dialog\"
      role=\"dialog\"
      aria-labelledby=\"account-confirmation-heading\"
      aria-hidden=\"true\"
    >
      <div class=\"dialog-content\">
        <h2 id=\"account-confirmation-heading\">Account Confirmation</h2>

        <div class=\"booking-details\">
          <p>
            Thank you <strong>";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["username"] ?? null), "html", null, true);
        yield "</strong> for creating an account
            with Lancaster's Diner.
          </p>
          <p>Please <strong>Login</strong> to manage bookings</p>
        </div>
        <div class=\"booking-details\">
          <h3>Account Details:</h3>
          <p id=\"account-confirmation-name\"></p>
          <p id=\"account-confirmation-email\"></p>
        </div>
        <div class=\"confirmation-dialog-buttons\">
          <div class=\"dialog-actions confirmation-dialog-actions\">
            <button
            id=\"close-confirmation-dialog\"
            type=\"button\"
            class=\"dashboard-button cancel-button\"
            aria-label=\"close\"
            onclick=\"handleAccountConfirmationClose()\"
          >
            Close
          </button>
            <button
              type=\"button\"
              class=\"dashboard-button confirmation-email-button\"
              aria-label=\"Send Confirmation Email\"
              id=\"account-confirmation-email-button\"
            >
              Confirmation Email
            </button>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Guest Booking Button -->
    <div class=\"guest-booking\">
      <button onclick=\"location.href='/dashboard/guest'\" class=\"guest-btn\">
        Continue as Guest
      </button>
    </div>
  </div>
</main>

";
        // line 163
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
        return "pages/login/login.html";
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
        return array (  210 => 163,  163 => 119,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ include('./Components/header.html') }}

<main class=\"dashboard-main\" aria-labelledby=\"dashboard-heading\" role=\"main\">
  <div class=\"dashboard-header\" aria-labelledby=\"dashboard-header-heading\">
    <div class=\"dashboard-header-content\">
      <h1 id=\"dashboard-header-heading\">Booking Dashboard</h1>
      <p>Please login or create an account to manage your reservations</p>
    </div>
  </div>

  <!-- Login Forms -->
  <div class=\"dashboard-container\">
    <section class=\"dashboard-forms\" aria-labelledby=\"dashboard-forms-heading\">
      <!-- Staff Login Form -->
      <div
        class=\"form-wrapper staff-form\"
        aria-labelledby=\"staff-form-heading\"
        role=\"form\"
      >
        <h2 id=\"staff-form-heading\">Staff Login</h2>
        <form
          id=\"staffLoginForm\"
          method=\"post\"
          action=\"/dashboard/authenticate\"
        >
          <input type=\"hidden\" name=\"role\" value=\"staff\" />

          <div class=\"form-group\">
            <label for=\"staffEmail\">Email</label>
            <input
              type=\"email\"
              id=\"staffEmail\"
              name=\"email\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"staffPassword\">Password</label>
            <input
              type=\"password\"
              id=\"staffPassword\"
              name=\"password\"
              required
              aria-required=\"true\"
            />
          </div>

          <div id=\"staffErrorBox\" class=\"error-box\"></div>

          <button type=\"submit\" class=\"submit-btn\">Login</button>
        </form>
      </div>

      <!-- Customer Login Form -->
      <div
        class=\"form-wrapper customer-form\"
        aria-labelledby=\"customer-form-heading\"
        role=\"form\"
      >
        <h2 id=\"customer-form-heading\">Customer Login</h2>
        <form
          id=\"customerLoginForm\"
          method=\"post\"
          action=\"/dashboard/authenticate\"
        >
          <input type=\"hidden\" name=\"role\" value=\"customer\" />

          <div class=\"form-group\">
            <label for=\"customerEmail\">Email</label>
            <input
              type=\"email\"
              id=\"customerEmail\"
              name=\"email\"
              required
              aria-required=\"true\"
            />
          </div>

          <div class=\"form-group\">
            <label for=\"customerPassword\">Password</label>
            <input
              type=\"password\"
              id=\"customerPassword\"
              name=\"password\"
              required
              aria-required=\"true\"
            />
          </div>

          <div id=\"customerErrorBox\" class=\"error-box\"></div>

          <button type=\"submit\" class=\"submit-btn\">Login</button>
          <button
            type=\"button\"
            class=\"toggle-btn\"
            onclick=\"toggleCustomerForm()\"
          >
            Sign Up
          </button>
        </form>
      </div>
    </section>

    <!-- Account Confirmation Dialog -->
    <div
      id=\"account-confirmation-dialog\"
      class=\"dialog\"
      role=\"dialog\"
      aria-labelledby=\"account-confirmation-heading\"
      aria-hidden=\"true\"
    >
      <div class=\"dialog-content\">
        <h2 id=\"account-confirmation-heading\">Account Confirmation</h2>

        <div class=\"booking-details\">
          <p>
            Thank you <strong>{{ username }}</strong> for creating an account
            with Lancaster's Diner.
          </p>
          <p>Please <strong>Login</strong> to manage bookings</p>
        </div>
        <div class=\"booking-details\">
          <h3>Account Details:</h3>
          <p id=\"account-confirmation-name\"></p>
          <p id=\"account-confirmation-email\"></p>
        </div>
        <div class=\"confirmation-dialog-buttons\">
          <div class=\"dialog-actions confirmation-dialog-actions\">
            <button
            id=\"close-confirmation-dialog\"
            type=\"button\"
            class=\"dashboard-button cancel-button\"
            aria-label=\"close\"
            onclick=\"handleAccountConfirmationClose()\"
          >
            Close
          </button>
            <button
              type=\"button\"
              class=\"dashboard-button confirmation-email-button\"
              aria-label=\"Send Confirmation Email\"
              id=\"account-confirmation-email-button\"
            >
              Confirmation Email
            </button>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Guest Booking Button -->
    <div class=\"guest-booking\">
      <button onclick=\"location.href='/dashboard/guest'\" class=\"guest-btn\">
        Continue as Guest
      </button>
    </div>
  </div>
</main>

{{ include('./Components/footer.html') }}
", "pages/login/login.html", "/var/www/html/webiste/src/Views/pages/login/login.html");
    }
}
