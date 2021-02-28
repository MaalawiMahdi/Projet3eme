<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* Bootstraptemplates/index.html.twig */
class __TwigTemplate_1ace333db3703e9f38991f8da4ea91bb1bee6b9eb1707804796089f2f303efaa extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'inscription' => [$this, 'block_inscription'],
            'connexion' => [$this, 'block_connexion'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Bootstraptemplates/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Bootstraptemplates/index.html.twig"));

        // line 1
        echo "<div class=\"tm-main-content\" id=\"top\">
    <div class=\"tm-top-bar-bg\"></div>
    <div class=\"tm-top-bar\" id=\"tm-top-bar\">
        <!-- Top Navbar -->
        <div class=\"container\">
            <div class=\"row\">

                <nav class=\"navbar navbar-expand-lg narbar-light\">
                    <a class=\"navbar-brand mr-auto\" href=\"#\">
                        <img src=\"logo.png\" alt=\"Site logo\">

                    </a>
                    <button type=\"button\" id=\"nav-toggle\" class=\"navbar-toggler collapsed\" data-toggle=\"collapse\" data-target=\"#mainNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                        <span class=\"navbar-toggler-icon\"></span>
                    </button>
                    <div id=\"mainNav\" class=\"collapse navbar-collapse tm-bg-white\">
                        <ul class=\"navbar-nav ml-auto\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"#top\">Accueil <span class=\"sr-only\">(current)</span></a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"#tm-section-4\">Tendance
                                </a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"#tm-section-5\">best-seller</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"#tm-section-6 \"> Se connecter</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class=\"tm-section tm-bg-img\" id=\"tm-section-1\">
        <div class=\"tm-bg-white ie-container-width-fix-2\">
            <div class=\"container ie-h-align-center-fix\">
                <div class=\"row\">
                    <div class=\"col-xs-12 ml-auto mr-auto ie-container-width-fix\">
                        <form action=\"index.html\" method=\"get\" class=\"tm-search-form tm-section-pad-2\">
                            <div class=\"form-row tm-search-form-row\">
                                <div class=\"form-group tm-form-element tm-form-element-100\">
                                    <i class=\"fa fa-map-marker fa-2x tm-form-element-icon\"></i>
                                    <input name=\"city\" type=\"text\" class=\"form-control\" id=\"inputCity\" placeholder=\"Type your destination...\">
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-50\">
                                    <i class=\"fa fa-calendar fa-2x tm-form-element-icon\"></i>
                                    <input name=\"check-in\" type=\"text\" class=\"form-control\" id=\"inputCheckIn\" placeholder=\"Check In\">
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-50\">
                                    <i class=\"fa fa-calendar fa-2x tm-form-element-icon\"></i>
                                    <input name=\"check-out\" type=\"text\" class=\"form-control\" id=\"inputCheckOut\" placeholder=\"Check Out\">
                                </div>
                            </div>
                            <div class=\"form-row tm-search-form-row\">
                                <div class=\"form-group tm-form-element tm-form-element-2\">
                                    <select name=\"adult\" class=\"form-control tm-select\" id=\"adult\">
                                        <option value=\"\">Adult</option>
                                        <option value=\"1\">1</option>
                                        <option value=\"2\">2</option>
                                        <option value=\"3\">3</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"6\">6</option>
                                        <option value=\"7\">7</option>
                                        <option value=\"8\">8</option>
                                        <option value=\"9\">9</option>
                                        <option value=\"10\">10</option>
                                    </select>
                                    <i class=\"fa fa-2x fa-user tm-form-element-icon\"></i>
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-2\">
                                    <select name=\"children\" class=\"form-control tm-select\" id=\"children\">
                                        <option value=\"\">Children</option>
                                        <option value=\"0\">0</option>
                                        <option value=\"1\">1</option>
                                        <option value=\"2\">2</option>
                                        <option value=\"3\">3</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"6\">6</option>
                                        <option value=\"7\">7</option>
                                        <option value=\"8\">8</option>
                                        <option value=\"9\">9</option>
                                        <option value=\"10\">10</option>
                                    </select>
                                    <i class=\"fa fa-user tm-form-element-icon tm-form-element-icon-small\"></i>
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-2\">
                                    <select name=\"room\" class=\"form-control tm-select\" id=\"room\">
                                        <option value=\"\">Room</option>
                                        <option value=\"1\">1</option>
                                        <option value=\"2\">2</option>
                                        <option value=\"3\">3</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"6\">6</option>
                                        <option value=\"7\">7</option>
                                        <option value=\"8\">8</option>
                                        <option value=\"9\">9</option>
                                        <option value=\"10\">10</option>
                                    </select>
                                    <i class=\"fa fa-2x fa-bed tm-form-element-icon\"></i>
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-2\">
                                    <button type=\"submit\" class=\"btn btn-primary tm-btn-search\">Check Availability</button>
                                </div>
                            </div>
                            <div class=\"form-row clearfix pl-2 pr-2 tm-fx-col-xs\">
                                <p class=\"tm-margin-b-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href=\"#\" class=\"ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary\">Need Help?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"tm-section-2\" >
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col text-center\">
                    <h2 class=\"tm-section-title\">We are here to help you?</h2>
                    <p class=\"tm-color-white tm-section-subtitle\">Subscribe to get our newsletters</p>
                    <a href=\"#\" class=\"tm-color-white tm-btn-white-bordered\">Subscribe Newletters</a>
                </div>
            </div>
        </div>
    </div>

    <div class=\"tm-section tm-position-relative\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\" class=\"tm-section-down-arrow\">
            <polygon fill=\"#ee5057\" points=\"0,0  100,0  50,60\"></polygon>
        </svg>
        <div class=\"container tm-pt-5 tm-pb-4\">
            <div class=\"row text-center\">
                <article class=\"col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article\">
                    <i class=\"fa tm-fa-6x fa-legal tm-color-primary tm-margin-b-20\"></i>
                    <h3 class=\"tm-color-primary tm-article-title-1\">Pellentesque accumsan arcu nec dolor tempus</h3>
                    <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                </article>
                <article class=\"col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article\">
                    <i class=\"fa tm-fa-6x fa-plane tm-color-primary tm-margin-b-20\"></i>
                    <h3 class=\"tm-color-primary tm-article-title-1\">Duis scelerisque metus vel felis porttitor</h3>
                    <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                </article>
                <article class=\"col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article\">
                    <i class=\"fa tm-fa-6x fa-life-saver tm-color-primary tm-margin-b-20\"></i>
                    <h3 class=\"tm-color-primary tm-article-title-1\">Etiam aliquam arcu at mauris consectetur</h3>
                    <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                </article>
            </div>
        </div>
    </div>
    <div class=\"tm-section tm-section-pad tm-bg-gray\" id=\"tm-section-4\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-12 col-md-12 col-lg-8 col-xl-8\">
                    <div class=\"tm-article-carousel\">
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-01.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Nunc in felis aliquet metus luctus iaculis</h3></header>
                                <p>Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla. Nullam sollicitudin at augue venenatis eleifend. Nulla ligula ligula, egestas sit amet viverra id, iaculis sit amet ligula.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">Get More Info.</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-02.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Sed cursus dictum nunc quis molestie</h3></header>
                                <p>Pellentesque quis dui sit amet purus scelerisque eleifend sed ut eros. Morbi viverra blandit massa in varius. Sed nec ex eu ex tincidunt iaculis. Curabitur eget turpis gravida.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">View Detail</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-01.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Eget diam pellentesque interdum ut porta</h3></header>
                                <p>Aenean finibus tempor nulla, et maximus nibh dapibus ac. Duis consequat sed sapien venenatis consequat. Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">More Info.</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-02.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Lorem ipsum dolor sit amet, consectetur</h3></header>
                                <p>Suspendisse molestie sed dui eget faucibus. Duis accumsan sagittis tortor in ultrices. Praesent tortor ante, fringilla ac nibh porttitor, fermentum commodo nulla.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">Detail Info.</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-01.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Orci varius natoque penatibus et</h3></header>
                                <p>Pellentesque quis dui sit amet purus scelerisque eleifend sed ut eros. Morbi viverra blandit massa in varius. Sed nec ex eu ex tincidunt iaculis. Curabitur eget turpis gravida.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">Read More</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white tm-carousel-item\">
                            <img src=\"img/img-02.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Nullam sollicitudin at augue venenatis eleifend</h3></header>
                                <p>Aenean finibus tempor nulla, et maximus nibh dapibus ac. Duis consequat sed sapien venenatis consequat. Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">More Details</a>
                            </div>
                        </article>
                    </div>
                </div>

                <div class=\"col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-recommended-container\">
                    <div class=\"tm-bg-white\">
                        <div class=\"tm-bg-primary tm-sidebar-pad\">
                            <h3 class=\"tm-color-white tm-sidebar-title\">Recommended Places</h3>
                            <p class=\"tm-color-white tm-margin-b-0 tm-font-light\">Enamel pin cliche tilde, kitsch and VHS thundercats</p>
                        </div>
                        <div class=\"tm-sidebar-pad-2\">
                            <a href=\"#\" class=\"media tm-media tm-recommended-item\">
                                <img src=\"img/tn-img-01.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body tm-bg-gray\">
                                    <h4 class=\"text-uppercase tm-font-semibold tm-sidebar-item-title\">Europe</h4>
                                </div>
                            </a>
                            <a href=\"#\" class=\"media tm-media tm-recommended-item\">
                                <img src=\"img/tn-img-02.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body tm-bg-gray\">
                                    <h4 class=\"text-uppercase tm-font-semibold tm-sidebar-item-title\">Asia</h4>
                                </div>
                            </a>
                            <a href=\"#\" class=\"media tm-media tm-recommended-item\">
                                <img src=\"img/tn-img-03.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body tm-bg-gray\">
                                    <h4 class=\"text-uppercase tm-font-semibold tm-sidebar-item-title\">Africa</h4>
                                </div>
                            </a>
                            <a href=\"#\" class=\"media tm-media tm-recommended-item\">
                                <img src=\"img/tn-img-04.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body tm-bg-gray\">
                                    <h4 class=\"text-uppercase tm-font-semibold tm-sidebar-item-title\">South America</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"tm-bg-video\">
        <div class=\"overlay\">
            <i class=\"fa fa-5x fa-play-circle tm-btn-play\"></i>
            <i class=\"fa fa-5x fa-pause-circle tm-btn-pause\"></i>
        </div>
        <video controls loop class=\"tmVideo\">
            <source src=\"videos/video.mp4\" type=\"video/mp4\">
            <source src=\"videos/video.ogg\" type=\"video/ogg\">
            Your browser does not support the video tag.
        </video>
        <div class=\"tm-section tm-section-pad tm-bg-img\" id=\"tm-section-5\">
            <div class=\"container ie-h-align-center-fix\">
                <div class=\"row tm-flex-align-center\">
                    <div class=\"col-xs-12 col-md-12 col-lg-3 col-xl-3 tm-media-title-container\">
                        <h2 class=\"text-uppercase tm-section-title-2\">ASIA</h2>
                        <h3 class=\"tm-color-primary tm-font-semibold tm-section-subtitle-2\">Singapore</h3>
                    </div>
                    <div class=\"col-xs-12 col-md-12 col-lg-9 col-xl-9 mt-0 mt-sm-3\">
                        <div class=\"ml-auto tm-bg-white-shadow tm-pad tm-media-container\">
                            <article class=\"media tm-margin-b-20 tm-media-1\">
                                <img src=\"img/img-03.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body-1 tm-media-body-v-center\">
                                    <h3 class=\"tm-font-semibold tm-color-primary tm-article-title-3\">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                    <p>Integer libero purus, consectetur vitae posuere quis, maximus id diam. Vivamus eget tellus ornare, sollicitudin quam id, dictum nulla. Phasellus finibus rhoncus justo, tempus eleifend neque dictum ac. Aenean metus leo, consectetur non.
                                        <br><br>
                                        Etiam aliquam arcu at mauris consectetur scelerisque. Integer elementum justo in orci facilisis ultricies. Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida.</p>
                                </div>
                            </article>
                            <article class=\"media tm-margin-b-20 tm-media-1\">
                                <img src=\"img/img-04.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body-1 tm-media-body-v-center\">
                                    <h3 class=\"tm-font-semibold tm-article-title-3\">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                    <p>Duis accumsan sagittis tortor in ultrices. Praesent tortor ante, fringilla ac nibh porttitor, fermentum commodo nulla.</p>
                                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                                </div>
                            </article>
                            <article class=\"media tm-margin-b-20 tm-media-1\">
                                <img src=\"img/img-05.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body-1 tm-media-body-v-center\">
                                    <h3 class=\"tm-font-semibold tm-article-title-3\">Faucibus dolor ligula nisl metus auctor aliquet</h3>
                                    <p>Nunc in felis aliquet metus luctus iaculis vel et nisi. Nulla venenatis nisl orci, laoreet ultricies massa tristique id.</p>
                                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"tm-section tm-section-pad tm-bg-img tm-position-relative\" id=\"tm-section-6\">
        <div class=\"container ie-h-align-center-fix\">
            <div class=\"row\">
                <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7\">
                    <div class=\"tm-bg-white tm-p-4\">
                    ";
        // line 311
        $this->displayBlock('inscription', $context, $blocks);
        // line 312
        echo "                    </div>

                </div>
                <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0\">
                    <div class=\"tm-bg-white tm-p-4\">
                        ";
        // line 317
        $this->displayBlock('connexion', $context, $blocks);
        // line 334
        echo "                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class=\"tm-bg-dark-blue\">
        <div class=\"container\">
            <div class=\"row\">
                <p class=\"col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0\">
                    Copyright &copy; <span class=\"tm-current-year\">2018</span> Your Company

                    - Design: Tooplate</p>
            </div>
        </div>
    </footer>
</div>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 311
    public function block_inscription($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "inscription"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "inscription"));

        echo "<div id=\"google-map\"></div> ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 317
    public function block_connexion($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "connexion"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "connexion"));

        // line 318
        echo "                        <form action=\"index.html\" method=\"post\" class=\"contact-form\">
                            <div class=\"form-group\">
                                <input type=\"text\" id=\"contact_name\" name=\"contact_name\" class=\"form-control\" placeholder=\"Name\"  required/>
                            </div>
                            <div class=\"form-group\">
                                <input type=\"email\" id=\"contact_email\" name=\"contact_email\" class=\"form-control\" placeholder=\"Email\"  required/>
                            </div>
                            <div class=\"form-group\">
                                <input type=\"text\" id=\"contact_subject\" name=\"contact_subject\" class=\"form-control\" placeholder=\"Subject\"  required/>
                            </div>
                            <div class=\"form-group\">
                                <textarea id=\"contact_message\" name=\"contact_message\" class=\"form-control\" rows=\"9\" placeholder=\"Message\" required></textarea>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary tm-btn-primary\">Send Message Now</button>
                        </form>
                        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "Bootstraptemplates/index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  423 => 318,  413 => 317,  394 => 311,  368 => 334,  366 => 317,  359 => 312,  357 => 311,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"tm-main-content\" id=\"top\">
    <div class=\"tm-top-bar-bg\"></div>
    <div class=\"tm-top-bar\" id=\"tm-top-bar\">
        <!-- Top Navbar -->
        <div class=\"container\">
            <div class=\"row\">

                <nav class=\"navbar navbar-expand-lg narbar-light\">
                    <a class=\"navbar-brand mr-auto\" href=\"#\">
                        <img src=\"logo.png\" alt=\"Site logo\">

                    </a>
                    <button type=\"button\" id=\"nav-toggle\" class=\"navbar-toggler collapsed\" data-toggle=\"collapse\" data-target=\"#mainNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                        <span class=\"navbar-toggler-icon\"></span>
                    </button>
                    <div id=\"mainNav\" class=\"collapse navbar-collapse tm-bg-white\">
                        <ul class=\"navbar-nav ml-auto\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"#top\">Accueil <span class=\"sr-only\">(current)</span></a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"#tm-section-4\">Tendance
                                </a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"#tm-section-5\">best-seller</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"#tm-section-6 \"> Se connecter</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class=\"tm-section tm-bg-img\" id=\"tm-section-1\">
        <div class=\"tm-bg-white ie-container-width-fix-2\">
            <div class=\"container ie-h-align-center-fix\">
                <div class=\"row\">
                    <div class=\"col-xs-12 ml-auto mr-auto ie-container-width-fix\">
                        <form action=\"index.html\" method=\"get\" class=\"tm-search-form tm-section-pad-2\">
                            <div class=\"form-row tm-search-form-row\">
                                <div class=\"form-group tm-form-element tm-form-element-100\">
                                    <i class=\"fa fa-map-marker fa-2x tm-form-element-icon\"></i>
                                    <input name=\"city\" type=\"text\" class=\"form-control\" id=\"inputCity\" placeholder=\"Type your destination...\">
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-50\">
                                    <i class=\"fa fa-calendar fa-2x tm-form-element-icon\"></i>
                                    <input name=\"check-in\" type=\"text\" class=\"form-control\" id=\"inputCheckIn\" placeholder=\"Check In\">
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-50\">
                                    <i class=\"fa fa-calendar fa-2x tm-form-element-icon\"></i>
                                    <input name=\"check-out\" type=\"text\" class=\"form-control\" id=\"inputCheckOut\" placeholder=\"Check Out\">
                                </div>
                            </div>
                            <div class=\"form-row tm-search-form-row\">
                                <div class=\"form-group tm-form-element tm-form-element-2\">
                                    <select name=\"adult\" class=\"form-control tm-select\" id=\"adult\">
                                        <option value=\"\">Adult</option>
                                        <option value=\"1\">1</option>
                                        <option value=\"2\">2</option>
                                        <option value=\"3\">3</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"6\">6</option>
                                        <option value=\"7\">7</option>
                                        <option value=\"8\">8</option>
                                        <option value=\"9\">9</option>
                                        <option value=\"10\">10</option>
                                    </select>
                                    <i class=\"fa fa-2x fa-user tm-form-element-icon\"></i>
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-2\">
                                    <select name=\"children\" class=\"form-control tm-select\" id=\"children\">
                                        <option value=\"\">Children</option>
                                        <option value=\"0\">0</option>
                                        <option value=\"1\">1</option>
                                        <option value=\"2\">2</option>
                                        <option value=\"3\">3</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"6\">6</option>
                                        <option value=\"7\">7</option>
                                        <option value=\"8\">8</option>
                                        <option value=\"9\">9</option>
                                        <option value=\"10\">10</option>
                                    </select>
                                    <i class=\"fa fa-user tm-form-element-icon tm-form-element-icon-small\"></i>
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-2\">
                                    <select name=\"room\" class=\"form-control tm-select\" id=\"room\">
                                        <option value=\"\">Room</option>
                                        <option value=\"1\">1</option>
                                        <option value=\"2\">2</option>
                                        <option value=\"3\">3</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"6\">6</option>
                                        <option value=\"7\">7</option>
                                        <option value=\"8\">8</option>
                                        <option value=\"9\">9</option>
                                        <option value=\"10\">10</option>
                                    </select>
                                    <i class=\"fa fa-2x fa-bed tm-form-element-icon\"></i>
                                </div>
                                <div class=\"form-group tm-form-element tm-form-element-2\">
                                    <button type=\"submit\" class=\"btn btn-primary tm-btn-search\">Check Availability</button>
                                </div>
                            </div>
                            <div class=\"form-row clearfix pl-2 pr-2 tm-fx-col-xs\">
                                <p class=\"tm-margin-b-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href=\"#\" class=\"ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary\">Need Help?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"tm-section-2\" >
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col text-center\">
                    <h2 class=\"tm-section-title\">We are here to help you?</h2>
                    <p class=\"tm-color-white tm-section-subtitle\">Subscribe to get our newsletters</p>
                    <a href=\"#\" class=\"tm-color-white tm-btn-white-bordered\">Subscribe Newletters</a>
                </div>
            </div>
        </div>
    </div>

    <div class=\"tm-section tm-position-relative\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\" class=\"tm-section-down-arrow\">
            <polygon fill=\"#ee5057\" points=\"0,0  100,0  50,60\"></polygon>
        </svg>
        <div class=\"container tm-pt-5 tm-pb-4\">
            <div class=\"row text-center\">
                <article class=\"col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article\">
                    <i class=\"fa tm-fa-6x fa-legal tm-color-primary tm-margin-b-20\"></i>
                    <h3 class=\"tm-color-primary tm-article-title-1\">Pellentesque accumsan arcu nec dolor tempus</h3>
                    <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                </article>
                <article class=\"col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article\">
                    <i class=\"fa tm-fa-6x fa-plane tm-color-primary tm-margin-b-20\"></i>
                    <h3 class=\"tm-color-primary tm-article-title-1\">Duis scelerisque metus vel felis porttitor</h3>
                    <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                </article>
                <article class=\"col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article\">
                    <i class=\"fa tm-fa-6x fa-life-saver tm-color-primary tm-margin-b-20\"></i>
                    <h3 class=\"tm-color-primary tm-article-title-1\">Etiam aliquam arcu at mauris consectetur</h3>
                    <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                </article>
            </div>
        </div>
    </div>
    <div class=\"tm-section tm-section-pad tm-bg-gray\" id=\"tm-section-4\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-12 col-md-12 col-lg-8 col-xl-8\">
                    <div class=\"tm-article-carousel\">
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-01.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Nunc in felis aliquet metus luctus iaculis</h3></header>
                                <p>Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla. Nullam sollicitudin at augue venenatis eleifend. Nulla ligula ligula, egestas sit amet viverra id, iaculis sit amet ligula.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">Get More Info.</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-02.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Sed cursus dictum nunc quis molestie</h3></header>
                                <p>Pellentesque quis dui sit amet purus scelerisque eleifend sed ut eros. Morbi viverra blandit massa in varius. Sed nec ex eu ex tincidunt iaculis. Curabitur eget turpis gravida.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">View Detail</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-01.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Eget diam pellentesque interdum ut porta</h3></header>
                                <p>Aenean finibus tempor nulla, et maximus nibh dapibus ac. Duis consequat sed sapien venenatis consequat. Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">More Info.</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-02.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Lorem ipsum dolor sit amet, consectetur</h3></header>
                                <p>Suspendisse molestie sed dui eget faucibus. Duis accumsan sagittis tortor in ultrices. Praesent tortor ante, fringilla ac nibh porttitor, fermentum commodo nulla.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">Detail Info.</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white mr-2 tm-carousel-item\">
                            <img src=\"img/img-01.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Orci varius natoque penatibus et</h3></header>
                                <p>Pellentesque quis dui sit amet purus scelerisque eleifend sed ut eros. Morbi viverra blandit massa in varius. Sed nec ex eu ex tincidunt iaculis. Curabitur eget turpis gravida.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">Read More</a>
                            </div>
                        </article>
                        <article class=\"tm-bg-white tm-carousel-item\">
                            <img src=\"img/img-02.jpg\" alt=\"Image\" class=\"img-fluid\">
                            <div class=\"tm-article-pad\">
                                <header><h3 class=\"text-uppercase tm-article-title-2\">Nullam sollicitudin at augue venenatis eleifend</h3></header>
                                <p>Aenean finibus tempor nulla, et maximus nibh dapibus ac. Duis consequat sed sapien venenatis consequat. Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla.</p>
                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">More Details</a>
                            </div>
                        </article>
                    </div>
                </div>

                <div class=\"col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-recommended-container\">
                    <div class=\"tm-bg-white\">
                        <div class=\"tm-bg-primary tm-sidebar-pad\">
                            <h3 class=\"tm-color-white tm-sidebar-title\">Recommended Places</h3>
                            <p class=\"tm-color-white tm-margin-b-0 tm-font-light\">Enamel pin cliche tilde, kitsch and VHS thundercats</p>
                        </div>
                        <div class=\"tm-sidebar-pad-2\">
                            <a href=\"#\" class=\"media tm-media tm-recommended-item\">
                                <img src=\"img/tn-img-01.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body tm-bg-gray\">
                                    <h4 class=\"text-uppercase tm-font-semibold tm-sidebar-item-title\">Europe</h4>
                                </div>
                            </a>
                            <a href=\"#\" class=\"media tm-media tm-recommended-item\">
                                <img src=\"img/tn-img-02.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body tm-bg-gray\">
                                    <h4 class=\"text-uppercase tm-font-semibold tm-sidebar-item-title\">Asia</h4>
                                </div>
                            </a>
                            <a href=\"#\" class=\"media tm-media tm-recommended-item\">
                                <img src=\"img/tn-img-03.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body tm-bg-gray\">
                                    <h4 class=\"text-uppercase tm-font-semibold tm-sidebar-item-title\">Africa</h4>
                                </div>
                            </a>
                            <a href=\"#\" class=\"media tm-media tm-recommended-item\">
                                <img src=\"img/tn-img-04.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body tm-bg-gray\">
                                    <h4 class=\"text-uppercase tm-font-semibold tm-sidebar-item-title\">South America</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"tm-bg-video\">
        <div class=\"overlay\">
            <i class=\"fa fa-5x fa-play-circle tm-btn-play\"></i>
            <i class=\"fa fa-5x fa-pause-circle tm-btn-pause\"></i>
        </div>
        <video controls loop class=\"tmVideo\">
            <source src=\"videos/video.mp4\" type=\"video/mp4\">
            <source src=\"videos/video.ogg\" type=\"video/ogg\">
            Your browser does not support the video tag.
        </video>
        <div class=\"tm-section tm-section-pad tm-bg-img\" id=\"tm-section-5\">
            <div class=\"container ie-h-align-center-fix\">
                <div class=\"row tm-flex-align-center\">
                    <div class=\"col-xs-12 col-md-12 col-lg-3 col-xl-3 tm-media-title-container\">
                        <h2 class=\"text-uppercase tm-section-title-2\">ASIA</h2>
                        <h3 class=\"tm-color-primary tm-font-semibold tm-section-subtitle-2\">Singapore</h3>
                    </div>
                    <div class=\"col-xs-12 col-md-12 col-lg-9 col-xl-9 mt-0 mt-sm-3\">
                        <div class=\"ml-auto tm-bg-white-shadow tm-pad tm-media-container\">
                            <article class=\"media tm-margin-b-20 tm-media-1\">
                                <img src=\"img/img-03.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body-1 tm-media-body-v-center\">
                                    <h3 class=\"tm-font-semibold tm-color-primary tm-article-title-3\">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                    <p>Integer libero purus, consectetur vitae posuere quis, maximus id diam. Vivamus eget tellus ornare, sollicitudin quam id, dictum nulla. Phasellus finibus rhoncus justo, tempus eleifend neque dictum ac. Aenean metus leo, consectetur non.
                                        <br><br>
                                        Etiam aliquam arcu at mauris consectetur scelerisque. Integer elementum justo in orci facilisis ultricies. Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida.</p>
                                </div>
                            </article>
                            <article class=\"media tm-margin-b-20 tm-media-1\">
                                <img src=\"img/img-04.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body-1 tm-media-body-v-center\">
                                    <h3 class=\"tm-font-semibold tm-article-title-3\">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                    <p>Duis accumsan sagittis tortor in ultrices. Praesent tortor ante, fringilla ac nibh porttitor, fermentum commodo nulla.</p>
                                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                                </div>
                            </article>
                            <article class=\"media tm-margin-b-20 tm-media-1\">
                                <img src=\"img/img-05.jpg\" alt=\"Image\">
                                <div class=\"media-body tm-media-body-1 tm-media-body-v-center\">
                                    <h3 class=\"tm-font-semibold tm-article-title-3\">Faucibus dolor ligula nisl metus auctor aliquet</h3>
                                    <p>Nunc in felis aliquet metus luctus iaculis vel et nisi. Nulla venenatis nisl orci, laoreet ultricies massa tristique id.</p>
                                    <a href=\"#\" class=\"text-uppercase tm-color-primary tm-font-semibold\">Continue reading...</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"tm-section tm-section-pad tm-bg-img tm-position-relative\" id=\"tm-section-6\">
        <div class=\"container ie-h-align-center-fix\">
            <div class=\"row\">
                <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7\">
                    <div class=\"tm-bg-white tm-p-4\">
                    {% block inscription %}<div id=\"google-map\"></div> {% endblock %}
                    </div>

                </div>
                <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0\">
                    <div class=\"tm-bg-white tm-p-4\">
                        {% block connexion %}
                        <form action=\"index.html\" method=\"post\" class=\"contact-form\">
                            <div class=\"form-group\">
                                <input type=\"text\" id=\"contact_name\" name=\"contact_name\" class=\"form-control\" placeholder=\"Name\"  required/>
                            </div>
                            <div class=\"form-group\">
                                <input type=\"email\" id=\"contact_email\" name=\"contact_email\" class=\"form-control\" placeholder=\"Email\"  required/>
                            </div>
                            <div class=\"form-group\">
                                <input type=\"text\" id=\"contact_subject\" name=\"contact_subject\" class=\"form-control\" placeholder=\"Subject\"  required/>
                            </div>
                            <div class=\"form-group\">
                                <textarea id=\"contact_message\" name=\"contact_message\" class=\"form-control\" rows=\"9\" placeholder=\"Message\" required></textarea>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary tm-btn-primary\">Send Message Now</button>
                        </form>
                        {% endblock %}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class=\"tm-bg-dark-blue\">
        <div class=\"container\">
            <div class=\"row\">
                <p class=\"col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0\">
                    Copyright &copy; <span class=\"tm-current-year\">2018</span> Your Company

                    - Design: Tooplate</p>
            </div>
        </div>
    </footer>
</div>", "Bootstraptemplates/index.html.twig", "C:\\Users\\ASUS\\Desktop\\Projet3eme\\SymfonyApplication\\templates\\Bootstraptemplates\\index.html.twig");
    }
}
