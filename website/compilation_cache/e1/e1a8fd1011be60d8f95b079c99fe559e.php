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

/* pages/reviews/reviews.html */
class __TwigTemplate_eb4bee8e4190a11dd2ec10de925e0ed8 extends Template
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

<main class=\"reviews-main\" aria-labelledby=\"reviews-heading\" role=\"main\">
  <!-- Title Section -->
  <section class=\"reviews-title\" aria-labelledby=\"reviews-heading\">
    <div class=\"title-content\">
      <h1 id=\"reviews-heading\">Customer Reviews</h1>
      <div class=\"rating-summary\">
        <div class=\"stars\" aria-label=\"4 out of 5 stars\">★★★★</div>
        <p aria-label=\"Average rating: 4.0 out of 5 based on 438 reviews\">
          4.0 average out of 438 Reviews
        </p>
        <a
          href=\"https://www.tripadvisor.co.uk/Restaurant_Review-g186338-d21270387-Reviews-Fallow_St_James_s-London_England.html\"
          target=\"_blank\"
          rel=\"noopener noreferrer\"
          aria-label=\"Read more reviews on TripAdvisor\"
          >Read more reviews on TripAdvisor</a
        >
      </div>
    </div>
  </section>

  <!-- Reviews Grid -->
  <section class=\"reviews-content\" aria-labelledby=\"reviews-content-heading\">
    <div class=\"reviews-grid\">
      <!-- Review 1 -->
      <div class=\"review-card\" aria-labelledby=\"review1-heading\" role=\"region\">
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review1-heading\">Mandy A</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Fantastic vibe, service, staff, and food.</h4>
          <p>
            My brother and I have been following Lancaster's on social media for
            some time and finally decided to take a visit with our partners. The
            restaurant has a great vibe and watching the chefs (or should I say
            artists) at work is just something else.
          </p>
          <p>
            What makes for amazing service: Offering drinks when they can see
            our drinks were running low. All without being asked. Table wiped
            between courses. Friendly, happy staff. Just great.
          </p>
          <p>
            The food was 10/10, and my husband says it's the best burger he's
            ever had!
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-4.jpeg\"
            alt=\"Signature dish at Lancaster's\"
          />
        </div>
      </div>

      <!-- Review 2 -->
      <div
        class=\"review-card reverse\"
        aria-labelledby=\"review2-heading\"
        role=\"region\"
      >
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review2-heading\">BJM</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Stunning food</h4>
          <p>
            I was slightly worried that it wouldn't live up to expectations but
            it was genuinely one of the best meals I've had all year. Some of
            the most flavoursome, lip-smacking, finger-licking food I've ever
            eaten.
          </p>
          <p>
            I could eat those corn ribs every day for the rest of my life and
            never get bored. Absolutely adored this place and will definitely
            return when I'm next in London.
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-3.jpeg\"
            alt=\"Delicious dish at Lancaster's\"
          />
        </div>
      </div>

      <!-- Review 3 -->
      <div class=\"review-card\" aria-labelledby=\"review3-heading\" role=\"region\">
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review3-heading\">Elizabeth S</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Yum!</h4>
          <p>
            Had a great dinner here during our trip to London from the States.
            Highly recommend the mushroom parfait, ribs, and strawberry custard
            cream. The mussels and burger were also very good. Server was
            attentive and had great knowledge of the menu.
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-1.jpeg\"
            alt=\"Exquisite dining at Lancaster's\"
          />
        </div>
      </div>

      <!-- Review 4 -->
      <div
        class=\"review-card reverse\"
        aria-labelledby=\"review4-heading\"
        role=\"region\"
      >
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review4-heading\">Christopher A</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Excellent food and great atmosphere</h4>
          <p>
            Exceptional food combined with wonderful service - the mushroom
            parfait and the beef ribs were sensational. Can't wait to return!
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-2.jpeg\"
            alt=\"Amazing food at Lancaster's\"
          />
        </div>
      </div>

      <div class=\"review-card\" aria-labelledby=\"review5-heading\" role=\"region\">
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review5-heading\">Handyspanner</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Nice food but cramped and erratic dining experience</h4>
          <p>
            Came for lunch, enjoyed the corn ribs and mushroom parfait to start,
            then we had pork roast. The vegetables, roasties and meat could not
            be faulted. The negative bit was the service, we had to chase our
            drinks(3 times) and our server was a little erratic and rushed.
          </p>
          <p>
            A very busy place, luckily we were three and were given a table for
            four. It was a little tight for couples who appeared “crammed “ on
            small tables for two that were close together.
          </p>
          <p>
            Nice food but a hectic and confined eating experience. Also question
            people being allowed to bring dogs into the restaurant, also
            allowing it to feed there.
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-4.jpeg\"
            alt=\"Signature dish at Lancaster's\"
          />
        </div>
      </div>
    </div>
  </section>
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
        return "pages/reviews/reviews.html";
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

<main class=\"reviews-main\" aria-labelledby=\"reviews-heading\" role=\"main\">
  <!-- Title Section -->
  <section class=\"reviews-title\" aria-labelledby=\"reviews-heading\">
    <div class=\"title-content\">
      <h1 id=\"reviews-heading\">Customer Reviews</h1>
      <div class=\"rating-summary\">
        <div class=\"stars\" aria-label=\"4 out of 5 stars\">★★★★</div>
        <p aria-label=\"Average rating: 4.0 out of 5 based on 438 reviews\">
          4.0 average out of 438 Reviews
        </p>
        <a
          href=\"https://www.tripadvisor.co.uk/Restaurant_Review-g186338-d21270387-Reviews-Fallow_St_James_s-London_England.html\"
          target=\"_blank\"
          rel=\"noopener noreferrer\"
          aria-label=\"Read more reviews on TripAdvisor\"
          >Read more reviews on TripAdvisor</a
        >
      </div>
    </div>
  </section>

  <!-- Reviews Grid -->
  <section class=\"reviews-content\" aria-labelledby=\"reviews-content-heading\">
    <div class=\"reviews-grid\">
      <!-- Review 1 -->
      <div class=\"review-card\" aria-labelledby=\"review1-heading\" role=\"region\">
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review1-heading\">Mandy A</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Fantastic vibe, service, staff, and food.</h4>
          <p>
            My brother and I have been following Lancaster's on social media for
            some time and finally decided to take a visit with our partners. The
            restaurant has a great vibe and watching the chefs (or should I say
            artists) at work is just something else.
          </p>
          <p>
            What makes for amazing service: Offering drinks when they can see
            our drinks were running low. All without being asked. Table wiped
            between courses. Friendly, happy staff. Just great.
          </p>
          <p>
            The food was 10/10, and my husband says it's the best burger he's
            ever had!
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-4.jpeg\"
            alt=\"Signature dish at Lancaster's\"
          />
        </div>
      </div>

      <!-- Review 2 -->
      <div
        class=\"review-card reverse\"
        aria-labelledby=\"review2-heading\"
        role=\"region\"
      >
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review2-heading\">BJM</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Stunning food</h4>
          <p>
            I was slightly worried that it wouldn't live up to expectations but
            it was genuinely one of the best meals I've had all year. Some of
            the most flavoursome, lip-smacking, finger-licking food I've ever
            eaten.
          </p>
          <p>
            I could eat those corn ribs every day for the rest of my life and
            never get bored. Absolutely adored this place and will definitely
            return when I'm next in London.
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-3.jpeg\"
            alt=\"Delicious dish at Lancaster's\"
          />
        </div>
      </div>

      <!-- Review 3 -->
      <div class=\"review-card\" aria-labelledby=\"review3-heading\" role=\"region\">
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review3-heading\">Elizabeth S</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Yum!</h4>
          <p>
            Had a great dinner here during our trip to London from the States.
            Highly recommend the mushroom parfait, ribs, and strawberry custard
            cream. The mussels and burger were also very good. Server was
            attentive and had great knowledge of the menu.
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-1.jpeg\"
            alt=\"Exquisite dining at Lancaster's\"
          />
        </div>
      </div>

      <!-- Review 4 -->
      <div
        class=\"review-card reverse\"
        aria-labelledby=\"review4-heading\"
        role=\"region\"
      >
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review4-heading\">Christopher A</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Excellent food and great atmosphere</h4>
          <p>
            Exceptional food combined with wonderful service - the mushroom
            parfait and the beef ribs were sensational. Can't wait to return!
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-2.jpeg\"
            alt=\"Amazing food at Lancaster's\"
          />
        </div>
      </div>

      <div class=\"review-card\" aria-labelledby=\"review5-heading\" role=\"region\">
        <div class=\"review-content\">
          <div class=\"review-header\">
            <h3 id=\"review5-heading\">Handyspanner</h3>
            <div class=\"review-meta\">
              <div class=\"stars\" aria-label=\"5 out of 5 stars\">★★★</div>
              <span class=\"date\">August 2024</span>
            </div>
          </div>
          <h4>Nice food but cramped and erratic dining experience</h4>
          <p>
            Came for lunch, enjoyed the corn ribs and mushroom parfait to start,
            then we had pork roast. The vegetables, roasties and meat could not
            be faulted. The negative bit was the service, we had to chase our
            drinks(3 times) and our server was a little erratic and rushed.
          </p>
          <p>
            A very busy place, luckily we were three and were given a table for
            four. It was a little tight for couples who appeared “crammed “ on
            small tables for two that were close together.
          </p>
          <p>
            Nice food but a hectic and confined eating experience. Also question
            people being allowed to bring dogs into the restaurant, also
            allowing it to feed there.
          </p>
        </div>
        <div class=\"review-image\">
          <img
            src=\"../../../../public/media/images/food/food-4.jpeg\"
            alt=\"Signature dish at Lancaster's\"
          />
        </div>
      </div>
    </div>
  </section>
</main>

{{ include('./Components/footer.html') }}
", "pages/reviews/reviews.html", "/var/www/html/php_mvc/src/Views/pages/reviews/reviews.html");
    }
}
