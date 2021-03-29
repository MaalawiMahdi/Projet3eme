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

/* produit_service/index1.html.twig */
class __TwigTemplate_d7a1c70ae1c671e2743bd5d118142e797b27e69f8cd0b7a6f2cff061661efb11 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'inscription' => [$this, 'block_inscription'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit_service/index1.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit_service/index1.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "produit_service/index1.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "
";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        // line 6
        $this->displayBlock('body', $context, $blocks);
        // line 295
        echo "  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo " Liste des Produits";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "    <div class=\"tm-main-content\" id=\"top\">
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
                                    <a class=\"nav-link\" href=\"#tm-section-4\">Product
                                    </a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"#tm-section-5\">Panier</a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"#tm-section-6\">Se connecter</a>
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

            ";
        // line 178
        if ((isset($context["ProduitService"]) || array_key_exists("ProduitService", $context) ? $context["ProduitService"] : (function () { throw new RuntimeError('Variable "ProduitService" does not exist.', 178, $this->source); })())) {
            // line 179
            echo "            <table id=\"ProduitService\" class=\"table table-striped\">

                <tbody>
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col-sm-12 col-md-12 col-lg-8 col-xl-8\">
                                <div class=\"tm-article-carousel\">
                                    ";
            // line 186
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["ProduitService"]) || array_key_exists("ProduitService", $context) ? $context["ProduitService"] : (function () { throw new RuntimeError('Variable "ProduitService" does not exist.', 186, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 187
                echo "


                                        <article class=\"tm-bg-white tm-carousel-item\">
                                            <img src =\"";
                // line 191
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("img/" . twig_get_attribute($this->env, $this->source, $context["c"], "lien_image", [], "any", false, false, false, 191))), "html", null, true);
                echo "\" alt=\"Image\" class=\"img-fluid\">
                                            <div class=\"tm-article-pad\">
                                                <header><h3 class=\"text-uppercase tm-article-title-2\">";
                // line 193
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "titre", [], "any", false, false, false, 193), "html", null, true);
                echo "</h3></header>

                                                <p>";
                // line 195
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "description", [], "any", false, false, false, 195), "html", null, true);
                echo "</p>
                                                <p>";
                // line 196
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "prix_unitaire", [], "any", false, false, false, 196), "html", null, true);
                echo "</p>
                                                <p>categorie ";
                // line 197
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "nom", [], "any", false, false, false, 197), "html", null, true);
                echo "</p>
                                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">More Details</a>
                                                <hr>
                                                <a href=\"";
                // line 200
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cart_add", ["id" => twig_get_attribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 200)]), "html", null, true);
                echo "\" class=\"btn btn-success float-right\">
                                                    <i class=\"fas fa-shopping-cart nr-i\"></i>
                                                    Ajouter au Panier
                                                </a>
                                            </div>
                                        </article>



                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 210
            echo "                                </div>
                            </div>

                        </div>
                    </div>


        </tbody>
        </table>
        ";
        } else {
            // line 220
            echo "            <p>Aucun produits</p>
        ";
        }
        // line 222
        echo "













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
                <p>Panier vide</p>
            </div>
        </div>

        <div class=\"tm-section tm-section-pad tm-bg-img tm-position-relative\" id=\"tm-section-6\">
            <div class=\"container ie-h-align-center-fix\">
                <div class=\"row\">
                    <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7\">
                        ";
        // line 257
        $this->displayBlock('inscription', $context, $blocks);
        // line 258
        echo "                    </div>
                    <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0\">
                        <div class=\"tm-bg-white tm-p-4\">
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
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 257
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

    public function getTemplateName()
    {
        return "produit_service/index1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  452 => 257,  406 => 258,  404 => 257,  367 => 222,  363 => 220,  351 => 210,  335 => 200,  329 => 197,  325 => 196,  321 => 195,  316 => 193,  311 => 191,  305 => 187,  301 => 186,  292 => 179,  290 => 178,  117 => 7,  107 => 6,  88 => 5,  78 => 295,  76 => 6,  74 => 5,  71 => 4,  61 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

  {% block content %}

{% block title%} Liste des Produits{% endblock %}
{% block body %}
    <div class=\"tm-main-content\" id=\"top\">
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
                                    <a class=\"nav-link\" href=\"#tm-section-4\">Product
                                    </a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"#tm-section-5\">Panier</a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"#tm-section-6\">Se connecter</a>
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

            {% if ProduitService %}
            <table id=\"ProduitService\" class=\"table table-striped\">

                <tbody>
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col-sm-12 col-md-12 col-lg-8 col-xl-8\">
                                <div class=\"tm-article-carousel\">
                                    {% for c in ProduitService %}



                                        <article class=\"tm-bg-white tm-carousel-item\">
                                            <img src =\"{{ asset('img/' ~ c.lien_image) }}\" alt=\"Image\" class=\"img-fluid\">
                                            <div class=\"tm-article-pad\">
                                                <header><h3 class=\"text-uppercase tm-article-title-2\">{{ c.titre }}</h3></header>

                                                <p>{{ c.description }}</p>
                                                <p>{{ c.prix_unitaire }}</p>
                                                <p>categorie {{ c.nom }}</p>
                                                <a href=\"#\" class=\"text-uppercase btn-primary tm-btn-primary\">More Details</a>
                                                <hr>
                                                <a href=\"{{ path('cart_add', {'id':c.id}) }}\" class=\"btn btn-success float-right\">
                                                    <i class=\"fas fa-shopping-cart nr-i\"></i>
                                                    Ajouter au Panier
                                                </a>
                                            </div>
                                        </article>



                                    {% endfor %}
                                </div>
                            </div>

                        </div>
                    </div>


        </tbody>
        </table>
        {% else %}
            <p>Aucun produits</p>
        {% endif %}














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
                <p>Panier vide</p>
            </div>
        </div>

        <div class=\"tm-section tm-section-pad tm-bg-img tm-position-relative\" id=\"tm-section-6\">
            <div class=\"container ie-h-align-center-fix\">
                <div class=\"row\">
                    <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7\">
                        {% block inscription %}<div id=\"google-map\"></div> {% endblock %}
                    </div>
                    <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0\">
                        <div class=\"tm-bg-white tm-p-4\">
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
    </div>

{% endblock %}
  {% endblock %}

", "produit_service/index1.html.twig", "C:\\wamp64\\www\\Projet3eme\\SymfonyApplication\\templates\\produit_service\\index1.html.twig");
    }
}
