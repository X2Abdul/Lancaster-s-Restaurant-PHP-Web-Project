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

/* ./Components/footer.html */
class __TwigTemplate_f5222bb2f145fe55111afec58330b92d extends Template
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
        yield "<footer class=\"footer\" role=\"contentinfo\">
    <div class=\"footer-content\">
      <section class=\"footer-section\">
        <div class=\"address\">
          <h3>Address</h3>
          <p>1234 Lancaster Street</p>
          <p>Lancaster</p>
          <p>PA 12345</p>
        </div>
        <div class=\"opening-times\">
          <h3>Opening Times</h3>
          <p>Monday - Friday: 07:30 - 21:00</p>
          <p>Saturday: 09:00 - 23:00</p>
          <p>Sunday: 11:30 - 22:00</p>
        </div>
      </section>

      <section class=\"footer-section\">
        <div class=\"social-media\">
          <h3>Follow Us</h3>
          <div class=\"social-media-icons\">
            <a
              href=\"https://www.youtube.com/channel/UCJ901NqoRaXMnIm7aOjLyuA\"
              target=\"_blank\"
              rel=\"noopener noreferrer\"
              aria-label=\"Visit our YouTube channel\"
            >
              <img
                src=\"../../../public/media/images/social-media-icons/youtube-icon.svg\"
                alt=\"YouTube icon\"
                class=\"social-icon\"
              />
              <p>YouTube</p>
              <p>600k</p>
            </a>
            <a
              href=\"https://www.instagram.com/fallowrestaurant\"
              target=\"_blank\"
              rel=\"noopener noreferrer\"
              aria-label=\"Follow us on Instagram\"
            >
              <img
                src=\"../../../public/media/images/social-media-icons/instagram-icon.svg\"
                alt=\"Instagram icon\"
                class=\"social-icon\"
              />
              <p>Instagram</p>
              <p>300k</p>
            </a>
            <a
              href=\"https://www.tiktok.com/@fallow_restaurant?lang=en\"
              target=\"_blank\"
              rel=\"noopener noreferrer\"
              aria-label=\"Follow us on TikTok\"
            >
              <img
                src=\"../../../public/media/images/social-media-icons/tiktok-icon.svg\"
                alt=\"TikTok icon\"
                class=\"social-icon\"
              />
              <p>TikTok</p>
              <p>200k</p>
            </a>
          </div>
        </div>
      </section>

      <section class=\"footer-section\">
        <div class=\"awards\">
          <h3>Awards</h3>
          <div class=\"awards-grid\" aria-label=\"Award Icons\">
            <img
              src=\"../../../public/media/images/awards/B-Corp-Logo-White-RGB.png\"
              alt=\"B Corporation Certification logo\"
              class=\"award-icon\"
            />
            <img
              src=\"../../../public/media/images/awards/code-1.svg\"
              alt=\"CODE 30 under 30 Award logo\"
              class=\"award-icon\"
            />
            <img
              src=\"../../../public/media/images/awards/hotdinners.svg\"
              alt=\"Hot Dinners Best New Restaurant Award logo\"
              class=\"award-icon\"
            />
            <img
              src=\"../../../../public/media/images/awards/National-Restaurant-Awards.svg\"
              alt=\"National Restaurant Award Winner logo\"
              class=\"award-icon\"
            />
            <img
              src=\"../../../../public/media/images/awards/Squaremeal.svg\"
              alt=\"Squaremeal Gold Award logo\"
              class=\"award-icon\"
            />
          </div>
        </div>
      </section>
    </div>
  </footer>
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
        return "./Components/footer.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer class=\"footer\" role=\"contentinfo\">
    <div class=\"footer-content\">
      <section class=\"footer-section\">
        <div class=\"address\">
          <h3>Address</h3>
          <p>1234 Lancaster Street</p>
          <p>Lancaster</p>
          <p>PA 12345</p>
        </div>
        <div class=\"opening-times\">
          <h3>Opening Times</h3>
          <p>Monday - Friday: 07:30 - 21:00</p>
          <p>Saturday: 09:00 - 23:00</p>
          <p>Sunday: 11:30 - 22:00</p>
        </div>
      </section>

      <section class=\"footer-section\">
        <div class=\"social-media\">
          <h3>Follow Us</h3>
          <div class=\"social-media-icons\">
            <a
              href=\"https://www.youtube.com/channel/UCJ901NqoRaXMnIm7aOjLyuA\"
              target=\"_blank\"
              rel=\"noopener noreferrer\"
              aria-label=\"Visit our YouTube channel\"
            >
              <img
                src=\"../../../public/media/images/social-media-icons/youtube-icon.svg\"
                alt=\"YouTube icon\"
                class=\"social-icon\"
              />
              <p>YouTube</p>
              <p>600k</p>
            </a>
            <a
              href=\"https://www.instagram.com/fallowrestaurant\"
              target=\"_blank\"
              rel=\"noopener noreferrer\"
              aria-label=\"Follow us on Instagram\"
            >
              <img
                src=\"../../../public/media/images/social-media-icons/instagram-icon.svg\"
                alt=\"Instagram icon\"
                class=\"social-icon\"
              />
              <p>Instagram</p>
              <p>300k</p>
            </a>
            <a
              href=\"https://www.tiktok.com/@fallow_restaurant?lang=en\"
              target=\"_blank\"
              rel=\"noopener noreferrer\"
              aria-label=\"Follow us on TikTok\"
            >
              <img
                src=\"../../../public/media/images/social-media-icons/tiktok-icon.svg\"
                alt=\"TikTok icon\"
                class=\"social-icon\"
              />
              <p>TikTok</p>
              <p>200k</p>
            </a>
          </div>
        </div>
      </section>

      <section class=\"footer-section\">
        <div class=\"awards\">
          <h3>Awards</h3>
          <div class=\"awards-grid\" aria-label=\"Award Icons\">
            <img
              src=\"../../../public/media/images/awards/B-Corp-Logo-White-RGB.png\"
              alt=\"B Corporation Certification logo\"
              class=\"award-icon\"
            />
            <img
              src=\"../../../public/media/images/awards/code-1.svg\"
              alt=\"CODE 30 under 30 Award logo\"
              class=\"award-icon\"
            />
            <img
              src=\"../../../public/media/images/awards/hotdinners.svg\"
              alt=\"Hot Dinners Best New Restaurant Award logo\"
              class=\"award-icon\"
            />
            <img
              src=\"../../../../public/media/images/awards/National-Restaurant-Awards.svg\"
              alt=\"National Restaurant Award Winner logo\"
              class=\"award-icon\"
            />
            <img
              src=\"../../../../public/media/images/awards/Squaremeal.svg\"
              alt=\"Squaremeal Gold Award logo\"
              class=\"award-icon\"
            />
          </div>
        </div>
      </section>
    </div>
  </footer>
</body>
</html>
", "./Components/footer.html", "/var/www/html/php_mvc/src/Views/Components/footer.html");
    }
}
