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

/* pages/menu/menu.html */
class __TwigTemplate_74ab0769c7c0924d3fcb2c365c1ab231 extends Template
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

<main class=\"menu-main\" role=\"main\" aria-labelledby=\"menu-heading\">
  <!-- Title Section -->
  <section class=\"menu-title\" aria-labelledby=\"title-heading\">
    <div class=\"title-content\">
      <h1 id=\"intro-heading\">Our Menu</h1>
      <p class=\"menu-date\">17 June 2024</p>
    </div>
  </section>

  <!-- Menu Introduction -->
  <section class=\"menu-intro\">
    <div class=\"intro-grid\">
      <div class=\"intro-text\">
        <h2>A Culinary Journey</h2>
        <p>
          Experience the finest seasonal ingredients crafted with passion and
          precision. Our menu changes regularly to reflect the best produce
          available.
        </p>
        <a
          href=\"../../../../public/media/menu/Lancaster's Dinner Menu 17 Jun 2024.pdf\"
          target=\"_blank\"
          rel=\"noopener noreferrer\"
          class=\"download-menu\"
          aria-label=\"Download Lancaster's Dinner Menu for 17 June 2024\"
          >Download the full menu</a
        >
      </div>
      <div class=\"intro-image\">
        <img
          src=\"../../../../public/media/images/food/food-service-1.jpeg\"
          alt=\"Chef plating a dish\"
          class=\"service-image\"
        />
      </div>
    </div>
  </section>

  <!-- Menu Sections -->
  <section class=\"menu-content\" aria-labelledby=\"menu-content-heading\">
    <div id=\"menu-content-heading\" class=\"menu-grid\">
      <!-- First Course -->
      <div class=\"menu-section\" aria-labelledby=\"first-course\">
        <h2 id=\"first-course-heading\">First Course</h2>
        <div class=\"course-grid\" role=\"list\">
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/warm-onion-tart.jpg\"
              alt=\"Warm Onion Tart\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Warm Onion Tart\">Warm Onion Tart</h3>
              <p>Quickes Goats Cheese, Worcestershire and Shallots</p>
              <span class=\"price\" aria-label=\"Price £12\">£12</span>
            </div>
          </div>
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Venison-Pâté-en-Croûte.jpg\"
              alt=\"Venison Pâté\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Venison Pâté en Croûte\">
                Venison Pâté en Croûte
              </h3>
              <p>Hedgerow Jelly, Mustard Fruit and Pistachio</p>
              <span class=\"price\" aria-label=\"Price £13\">£13</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Second Course -->
      <div class=\"menu-section\" aria-labelledby=\"second-course\">
        <h2 id=\"second-course-heading\">Second Course</h2>
        <div class=\"course-grid\" role=\"list\">
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Roast-Cornish-Monkfish.jpg\"
              alt=\"Roast Cornish Monkfish\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Roast Cornish Monkfish\">
                Roast Cornish Monkfish
              </h3>
              <p>Cheek, Butternut Squash and Sage</p>
              <span class=\"price\" aria-label=\"Price £28\">£28</span>
            </div>
          </div>
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Our-Iberian-Pork.webp\"
              alt=\"Iberian Pork\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Our Iberian Pork\">Our Iberian Pork</h3>
              <p>Jerusalem Artichoke and Pickled Walnuts</p>
              <span class=\"price\" aria-label=\"Price £32\">£32</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Third Course -->
      <div class=\"menu-section\" aria-labelledby=\"third-course\">
        <h2 id=\"third-course-heading\">Third Course</h2>
        <div class=\"course-grid\" role=\"list\">
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Apple-Parfait.jpg\"
              alt=\"Apple Parfait\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Apple Parfait\">Apple Parfait</h3>
              <p>Shortbread, Hazelnuts and Sherry</p>
              <span class=\"price\" aria-label=\"Price £8\">£8</span>
            </div>
          </div>
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Plum-Ripple-Ice-Cream.jpg\"
              alt=\"Plum Ripple Ice Cream\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Plum Ripple Ice Cream\">Plum Ripple Ice Cream</h3>
              <p>Caramelised Pastry, Almond Cream and Camomile</p>
              <span class=\"price\" aria-label=\"Price £7\">£7</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tasting Menus -->
    <section class=\"tasting-menus\" id=\"tasting-menus-content-heading\">
      <h2 aria-label=\"Tasting Experiences\">Tasting Experiences</h2>
      <div class=\"tasting-grid\" role=\"list\">
        <div class=\"tasting-menu\" role=\"listitem\">
          <div class=\"story-image\">
            <img
              src=\"../../../../public/media/images/food/warm-onion-tart.jpg\"
              alt=\"Warm Onion Tart\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Lasagne-of-Rabbit-Shoulder.webp\"
              alt=\"Lasagne of Rabbit Shoulder\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Roast-Cornish-Monkfish.jpg\"
              alt=\"Roast Cornish Monkfish\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Wareham-Dorset-Sika-Deer.jpg\"
              alt=\"Wareham Dorset Sika Deer\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Apple-Parfait.jpg\"
              alt=\"Apple Parfait\"
              class=\"tasting-image\"
            />
          </div>

          <div class=\"tasting-content\">
            <h3 aria-label=\"Tasting Menu A\">Tasting Menu A</h3>
            <ul>
              <li>Warm Onion Tart</li>
              <li>Lasagne of Rabbit Shoulder</li>
              <li>Roast Cornish Monkfish</li>
              <li>Wareham Dorset Sika Deer</li>
              <li>Apple Parfait</li>
            </ul>
            <span class=\"price\" aria-label=\"Price £60\">£60 per person</span>
          </div>
        </div>
        <div class=\"tasting-menu\" role=\"listitem\">
          <div class=\"story-image\">
            <img
              src=\"../../../../public/media/images/food/warm-onion-tart.jpg\"
              alt=\"Warm Onion Tart\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Lasagne-of-Rabbit-Shoulder.webp\"
              alt=\"Lasagne of Rabbit Shoulder\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Grilled-Beef-Tongue.jpg\"
              alt=\"Grilled Beef Tongue\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Roast-Cornish-Monkfish.jpg\"
              alt=\"Roast Cornish Monkfish\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Wareham-Dorset-Sika-Deer.jpg\"
              alt=\"Wareham Dorset Sika Deer\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Our-Iberian-Pork.webp\"
              alt=\"Our Iberian Pork\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Apple-Parfait.jpg\"
              alt=\"Apple Parfait\"
              class=\"tasting-image\"
            />
          </div>
          <div class=\"tasting-content\">
            <h3 aria-label=\"Tasting Menu B\">Tasting Menu B</h3>
            <ul>
              <li>Warm Onion Tart</li>
              <li>Lasagne of Rabbit Shoulder</li>
              <li>Grilled Beef Tongue</li>
              <li>Roast Cornish Monkfish</li>
              <li>Wareham Dorset Sika Deer</li>
              <li>Our Iberian Pork</li>
              <li>Apple Parfait</li>
            </ul>
            <span class=\"price\" aria-label=\"Price £85\">£85 per person</span>
          </div>
        </div>
      </div>
    </section>
  </section>

  <!-- Team Section -->
  <section class=\"team-section\" aria-labelledby=\"team-heading\">
    <h2 id=\"team-heading\">Our Team</h2>
    <div class=\"team-grid\" role=\"list\">
      <img
        src=\"../../../../public/media/images/people/ana-cooking.jpeg\"
        alt=\"Our chef preparing a dish\"
        class=\"team-image\"
        role=\"listitem\"
      />
      <img
        src=\"../../../../public/media/images/people/robert-glasses.jpeg\"
        alt=\"Our chef pouring wine\"
        class=\"team-image\"
        role=\"listitem\"
      />
      <img
        src=\"../../../../public/media/images/people/robert-pour.jpeg\"
        alt=\"Our chef pouring wine\"
        class=\"team-image\"
        role=\"listitem\"
      />
      <img
        src=\"../../../../public/media//images/people/ana-plating.jpeg\"
        alt=\"Our chef plating\"
        class=\"team-image\"
        role=\"listitem\"
      />
    </div>
  </section>
</main>

";
        // line 275
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
        return "pages/menu/menu.html";
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
        return array (  319 => 275,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ include('./Components/header.html') }}

<main class=\"menu-main\" role=\"main\" aria-labelledby=\"menu-heading\">
  <!-- Title Section -->
  <section class=\"menu-title\" aria-labelledby=\"title-heading\">
    <div class=\"title-content\">
      <h1 id=\"intro-heading\">Our Menu</h1>
      <p class=\"menu-date\">17 June 2024</p>
    </div>
  </section>

  <!-- Menu Introduction -->
  <section class=\"menu-intro\">
    <div class=\"intro-grid\">
      <div class=\"intro-text\">
        <h2>A Culinary Journey</h2>
        <p>
          Experience the finest seasonal ingredients crafted with passion and
          precision. Our menu changes regularly to reflect the best produce
          available.
        </p>
        <a
          href=\"../../../../public/media/menu/Lancaster's Dinner Menu 17 Jun 2024.pdf\"
          target=\"_blank\"
          rel=\"noopener noreferrer\"
          class=\"download-menu\"
          aria-label=\"Download Lancaster's Dinner Menu for 17 June 2024\"
          >Download the full menu</a
        >
      </div>
      <div class=\"intro-image\">
        <img
          src=\"../../../../public/media/images/food/food-service-1.jpeg\"
          alt=\"Chef plating a dish\"
          class=\"service-image\"
        />
      </div>
    </div>
  </section>

  <!-- Menu Sections -->
  <section class=\"menu-content\" aria-labelledby=\"menu-content-heading\">
    <div id=\"menu-content-heading\" class=\"menu-grid\">
      <!-- First Course -->
      <div class=\"menu-section\" aria-labelledby=\"first-course\">
        <h2 id=\"first-course-heading\">First Course</h2>
        <div class=\"course-grid\" role=\"list\">
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/warm-onion-tart.jpg\"
              alt=\"Warm Onion Tart\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Warm Onion Tart\">Warm Onion Tart</h3>
              <p>Quickes Goats Cheese, Worcestershire and Shallots</p>
              <span class=\"price\" aria-label=\"Price £12\">£12</span>
            </div>
          </div>
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Venison-Pâté-en-Croûte.jpg\"
              alt=\"Venison Pâté\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Venison Pâté en Croûte\">
                Venison Pâté en Croûte
              </h3>
              <p>Hedgerow Jelly, Mustard Fruit and Pistachio</p>
              <span class=\"price\" aria-label=\"Price £13\">£13</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Second Course -->
      <div class=\"menu-section\" aria-labelledby=\"second-course\">
        <h2 id=\"second-course-heading\">Second Course</h2>
        <div class=\"course-grid\" role=\"list\">
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Roast-Cornish-Monkfish.jpg\"
              alt=\"Roast Cornish Monkfish\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Roast Cornish Monkfish\">
                Roast Cornish Monkfish
              </h3>
              <p>Cheek, Butternut Squash and Sage</p>
              <span class=\"price\" aria-label=\"Price £28\">£28</span>
            </div>
          </div>
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Our-Iberian-Pork.webp\"
              alt=\"Iberian Pork\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Our Iberian Pork\">Our Iberian Pork</h3>
              <p>Jerusalem Artichoke and Pickled Walnuts</p>
              <span class=\"price\" aria-label=\"Price £32\">£32</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Third Course -->
      <div class=\"menu-section\" aria-labelledby=\"third-course\">
        <h2 id=\"third-course-heading\">Third Course</h2>
        <div class=\"course-grid\" role=\"list\">
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Apple-Parfait.jpg\"
              alt=\"Apple Parfait\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Apple Parfait\">Apple Parfait</h3>
              <p>Shortbread, Hazelnuts and Sherry</p>
              <span class=\"price\" aria-label=\"Price £8\">£8</span>
            </div>
          </div>
          <div class=\"menu-item\" role=\"listitem\">
            <img
              src=\"../../../../public/media/images/food/Plum-Ripple-Ice-Cream.jpg\"
              alt=\"Plum Ripple Ice Cream\"
              class=\"food-image\"
            />
            <div class=\"item-details\">
              <h3 aria-label=\"Plum Ripple Ice Cream\">Plum Ripple Ice Cream</h3>
              <p>Caramelised Pastry, Almond Cream and Camomile</p>
              <span class=\"price\" aria-label=\"Price £7\">£7</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tasting Menus -->
    <section class=\"tasting-menus\" id=\"tasting-menus-content-heading\">
      <h2 aria-label=\"Tasting Experiences\">Tasting Experiences</h2>
      <div class=\"tasting-grid\" role=\"list\">
        <div class=\"tasting-menu\" role=\"listitem\">
          <div class=\"story-image\">
            <img
              src=\"../../../../public/media/images/food/warm-onion-tart.jpg\"
              alt=\"Warm Onion Tart\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Lasagne-of-Rabbit-Shoulder.webp\"
              alt=\"Lasagne of Rabbit Shoulder\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Roast-Cornish-Monkfish.jpg\"
              alt=\"Roast Cornish Monkfish\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Wareham-Dorset-Sika-Deer.jpg\"
              alt=\"Wareham Dorset Sika Deer\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Apple-Parfait.jpg\"
              alt=\"Apple Parfait\"
              class=\"tasting-image\"
            />
          </div>

          <div class=\"tasting-content\">
            <h3 aria-label=\"Tasting Menu A\">Tasting Menu A</h3>
            <ul>
              <li>Warm Onion Tart</li>
              <li>Lasagne of Rabbit Shoulder</li>
              <li>Roast Cornish Monkfish</li>
              <li>Wareham Dorset Sika Deer</li>
              <li>Apple Parfait</li>
            </ul>
            <span class=\"price\" aria-label=\"Price £60\">£60 per person</span>
          </div>
        </div>
        <div class=\"tasting-menu\" role=\"listitem\">
          <div class=\"story-image\">
            <img
              src=\"../../../../public/media/images/food/warm-onion-tart.jpg\"
              alt=\"Warm Onion Tart\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Lasagne-of-Rabbit-Shoulder.webp\"
              alt=\"Lasagne of Rabbit Shoulder\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Grilled-Beef-Tongue.jpg\"
              alt=\"Grilled Beef Tongue\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Roast-Cornish-Monkfish.jpg\"
              alt=\"Roast Cornish Monkfish\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Wareham-Dorset-Sika-Deer.jpg\"
              alt=\"Wareham Dorset Sika Deer\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Our-Iberian-Pork.webp\"
              alt=\"Our Iberian Pork\"
              class=\"tasting-image\"
            />
            <img
              src=\"../../../../public/media/images/food/Apple-Parfait.jpg\"
              alt=\"Apple Parfait\"
              class=\"tasting-image\"
            />
          </div>
          <div class=\"tasting-content\">
            <h3 aria-label=\"Tasting Menu B\">Tasting Menu B</h3>
            <ul>
              <li>Warm Onion Tart</li>
              <li>Lasagne of Rabbit Shoulder</li>
              <li>Grilled Beef Tongue</li>
              <li>Roast Cornish Monkfish</li>
              <li>Wareham Dorset Sika Deer</li>
              <li>Our Iberian Pork</li>
              <li>Apple Parfait</li>
            </ul>
            <span class=\"price\" aria-label=\"Price £85\">£85 per person</span>
          </div>
        </div>
      </div>
    </section>
  </section>

  <!-- Team Section -->
  <section class=\"team-section\" aria-labelledby=\"team-heading\">
    <h2 id=\"team-heading\">Our Team</h2>
    <div class=\"team-grid\" role=\"list\">
      <img
        src=\"../../../../public/media/images/people/ana-cooking.jpeg\"
        alt=\"Our chef preparing a dish\"
        class=\"team-image\"
        role=\"listitem\"
      />
      <img
        src=\"../../../../public/media/images/people/robert-glasses.jpeg\"
        alt=\"Our chef pouring wine\"
        class=\"team-image\"
        role=\"listitem\"
      />
      <img
        src=\"../../../../public/media/images/people/robert-pour.jpeg\"
        alt=\"Our chef pouring wine\"
        class=\"team-image\"
        role=\"listitem\"
      />
      <img
        src=\"../../../../public/media//images/people/ana-plating.jpeg\"
        alt=\"Our chef plating\"
        class=\"team-image\"
        role=\"listitem\"
      />
    </div>
  </section>
</main>

{{ include('./Components/footer.html') }}
", "pages/menu/menu.html", "/var/www/html/php_mvc/src/Views/pages/menu/menu.html");
    }
}
