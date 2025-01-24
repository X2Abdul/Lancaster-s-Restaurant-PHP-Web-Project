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

/* index.html */
class __TwigTemplate_ae269a722ec3eac0d38c1884df635d57 extends Template
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
  <div class=\"main-content\">
    <section class=\"home-title\" aria-labelledby=\"home-title-heading\">
      <h1 id=\"home-title-heading\">Welcome to Lancaster's</h1>
      <p>
        Experience fine dining with conscious culinary creativity and passion
        for wine
      </p>
    </section>

    <section class=\"story-section\" aria-labelledby=\"story-heading\">
      <div class=\"story-content\">
        <h2 id=\"story-heading\">Our Story</h2>
        <p>
          Lancaster's was founded by chef Ana Lancaster and Sommelier Robert
          Lancaster in May 2005. The essence of this combination makes up much
          of Fallows DNA, where conscious culinary creativity meets hospitality
          experience and passion for wine.
        </p>
        <p>
          What followed from their meeting were a series of sold-out residencies
          to establish Lancaster's as one of the most exciting restaurant
          concepts on the UK restaurant scene. Lancaster's permanent home in St
          James's market was established in November 2010 and has since
          attracted a string of awards including both the Marie Claire and GQ
          'sustainable restaurant of the year' and the Caterer award for 'best
          new restaurant'.
        </p>
      </div>
      <div class=\"story-image\">
        <img
          src=\"../../public/media/images/rerestaurant/restaurant-1.jpeg\"
          alt=\"Interior view of Lancaster's Restaurant\"
        />
        <img
          src=\"../../public/media/images/rerestaurant/restaurant-2.jpeg\"
          alt=\"Dining setup at Lancaster's Restaurant\"
        />
        <img
          src=\"../../public/media/images/rerestaurant/restaurant-3.jpeg\"
          alt=\"Chef preparing dishes at Lancaster's\"
        />
        <img
          src=\"../../public/media/images/rerestaurant/restaurant-4.jpeg\"
          alt=\"Wine selection at Lancaster's Restaurant\"
        />
      </div>
    </section>

    <section class=\"info-section\" aria-labelledby=\"visit-us-heading\">
      <div class=\"info-content\">
        <h2 id=\"visit-us-heading\">Visit Us</h2>
        <p>
          We are happy to accommodate dietary requirements. Please just make a
          note in your reservation or let us know upon arrival.
        </p>
        <p>
          Lancaster's is on ground level, with an accessible bathroom situated
          on the same floor.
        </p>
      </div>
    </section>

    <section class=\"quotes-section\" aria-labelledby=\"quotes-heading\">
      <h2 id=\"quotes-heading\" class=\"visually-hidden\">Customer Quotes</h2>
      <div class=\"quotes-grid\">
        <div class=\"quote-card\">
          <p class=\"quote-text\">
            \"Well-balanced dishes which are packed with flavour\"
          </p>
          <p class=\"quote-source\" aria-label=\"Source: Michelin Guide\">
            Michelin Guide
          </p>
        </div>
        <div class=\"quote-card\">
          <p class=\"quote-text\">
            \"Lancaster's is generous and indulgent, relaxed and innovative, and
            in short, it's everything you want from eating out.\"
          </p>
          <p class=\"quote-source\" aria-label=\"Source: Squaremeal\">Squaremeal</p>
        </div>
        <div class=\"quote-card\">
          <p class=\"quote-text\">
            \"Style and substance in equal - and environmentally conscious –
            measure\"
          </p>
          <p class=\"quote-source\" aria-label=\"Source: CONDÉ NAST TRAVELLER\">
            CONDÉ NAST TRAVELLER
          </p>
        </div>
        <div class=\"quote-card\">
          <p class=\"quote-text\">
            \"Sustainable kitchen offers charm, finesse and an enlightened drinks
            list\"
          </p>
          <p class=\"quote-source\" aria-label=\"Source: Fay Maschler\">
            Fay Maschler
          </p>
        </div>
      </div>
    </section>

    <div class=\"contact-links\">
      <a
        href=\"mailto:marketing@lancasters.com\"
        aria-label=\"Email us for collaborations\"
      >
        For collaborations: marketing@lancasters.com
      </a>
      <a
        href=\"mailto:office@lancasters.com\"
        aria-label=\"Email us for business opportunities\"
      >
        For business opportunities: office@lancasters.com
      </a>
    </div>
  </div>
</main>

";
        // line 122
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
        return "index.html";
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
        return array (  166 => 122,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ include('./Components/header.html') }}

<main>
  <div class=\"main-content\">
    <section class=\"home-title\" aria-labelledby=\"home-title-heading\">
      <h1 id=\"home-title-heading\">Welcome to Lancaster's</h1>
      <p>
        Experience fine dining with conscious culinary creativity and passion
        for wine
      </p>
    </section>

    <section class=\"story-section\" aria-labelledby=\"story-heading\">
      <div class=\"story-content\">
        <h2 id=\"story-heading\">Our Story</h2>
        <p>
          Lancaster's was founded by chef Ana Lancaster and Sommelier Robert
          Lancaster in May 2005. The essence of this combination makes up much
          of Fallows DNA, where conscious culinary creativity meets hospitality
          experience and passion for wine.
        </p>
        <p>
          What followed from their meeting were a series of sold-out residencies
          to establish Lancaster's as one of the most exciting restaurant
          concepts on the UK restaurant scene. Lancaster's permanent home in St
          James's market was established in November 2010 and has since
          attracted a string of awards including both the Marie Claire and GQ
          'sustainable restaurant of the year' and the Caterer award for 'best
          new restaurant'.
        </p>
      </div>
      <div class=\"story-image\">
        <img
          src=\"../../public/media/images/rerestaurant/restaurant-1.jpeg\"
          alt=\"Interior view of Lancaster's Restaurant\"
        />
        <img
          src=\"../../public/media/images/rerestaurant/restaurant-2.jpeg\"
          alt=\"Dining setup at Lancaster's Restaurant\"
        />
        <img
          src=\"../../public/media/images/rerestaurant/restaurant-3.jpeg\"
          alt=\"Chef preparing dishes at Lancaster's\"
        />
        <img
          src=\"../../public/media/images/rerestaurant/restaurant-4.jpeg\"
          alt=\"Wine selection at Lancaster's Restaurant\"
        />
      </div>
    </section>

    <section class=\"info-section\" aria-labelledby=\"visit-us-heading\">
      <div class=\"info-content\">
        <h2 id=\"visit-us-heading\">Visit Us</h2>
        <p>
          We are happy to accommodate dietary requirements. Please just make a
          note in your reservation or let us know upon arrival.
        </p>
        <p>
          Lancaster's is on ground level, with an accessible bathroom situated
          on the same floor.
        </p>
      </div>
    </section>

    <section class=\"quotes-section\" aria-labelledby=\"quotes-heading\">
      <h2 id=\"quotes-heading\" class=\"visually-hidden\">Customer Quotes</h2>
      <div class=\"quotes-grid\">
        <div class=\"quote-card\">
          <p class=\"quote-text\">
            \"Well-balanced dishes which are packed with flavour\"
          </p>
          <p class=\"quote-source\" aria-label=\"Source: Michelin Guide\">
            Michelin Guide
          </p>
        </div>
        <div class=\"quote-card\">
          <p class=\"quote-text\">
            \"Lancaster's is generous and indulgent, relaxed and innovative, and
            in short, it's everything you want from eating out.\"
          </p>
          <p class=\"quote-source\" aria-label=\"Source: Squaremeal\">Squaremeal</p>
        </div>
        <div class=\"quote-card\">
          <p class=\"quote-text\">
            \"Style and substance in equal - and environmentally conscious –
            measure\"
          </p>
          <p class=\"quote-source\" aria-label=\"Source: CONDÉ NAST TRAVELLER\">
            CONDÉ NAST TRAVELLER
          </p>
        </div>
        <div class=\"quote-card\">
          <p class=\"quote-text\">
            \"Sustainable kitchen offers charm, finesse and an enlightened drinks
            list\"
          </p>
          <p class=\"quote-source\" aria-label=\"Source: Fay Maschler\">
            Fay Maschler
          </p>
        </div>
      </div>
    </section>

    <div class=\"contact-links\">
      <a
        href=\"mailto:marketing@lancasters.com\"
        aria-label=\"Email us for collaborations\"
      >
        For collaborations: marketing@lancasters.com
      </a>
      <a
        href=\"mailto:office@lancasters.com\"
        aria-label=\"Email us for business opportunities\"
      >
        For business opportunities: office@lancasters.com
      </a>
    </div>
  </div>
</main>

{{ include('./Components/footer.html') }}
", "index.html", "/var/www/html/php_mvc/src/Views/index.html");
    }
}
