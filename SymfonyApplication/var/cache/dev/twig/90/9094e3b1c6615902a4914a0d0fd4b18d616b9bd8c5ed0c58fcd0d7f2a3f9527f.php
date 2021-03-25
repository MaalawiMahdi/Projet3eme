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

/* Bootstraptemplates/navbartemplate.html.twig */
class __TwigTemplate_62ebda838d647726251bb928dbe57b4e1625fe8858d39495814e935b32644902 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Bootstraptemplates/navbartemplate.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Bootstraptemplates/navbartemplate.html.twig"));

        // line 1
        echo "<div class=\"tm-top-bar-bg\"></div>
<div class=\"tm-top-bar\" id=\"tm-top-bar\">
    <!-- Top Navbar -->
    <div class=\"container\">
        <div class=\"row\">

            <nav class=\"navbar navbar-expand-lg narbar-light\">
                <a class=\"navbar-brand mr-auto\" href=\"#\">
                    <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("logo.png"), "html", null, true);
        echo "\" alt=\"Site logo\">

                </a>
                <button type=\"button\" id=\"nav-toggle\" class=\"navbar-toggler collapsed\" data-toggle=\"collapse\" data-target=\"#mainNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div id=\"mainNav\" class=\"collapse navbar-collapse tm-bg-white\">
                    <ul class=\"navbar-nav ml-auto\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"#top\">Boards <span class=\"sr-only\">(current)</span></a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"#tm-section-4\">Demarrer avec un compte business
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<style> .btn-primary {
        background-color: #ee5057 !important;
        border-color: #ee5057 !important;
        border-radius: 6px !important;

    }
    .btn-primary:hover {
        opacity: 0.8!important;
        background-color: #ee5057!important;
        border-color: #ee5057!important;
        border-radius: 6px!important;
    }
    .btn-primary:active {
        background-color: #ee5057 !important;
        border-color: #ee5057!important;
        border-radius: 6px!important;
    }
</style>
<style>
    button {
        color: #FFFFFF;
        background-color: #ee5057;
        border-color: #ee5057;
        border-radius: 6px;
        padding: 8px;
        font-size:10px;
    }
    button:hover {
        color: #FFFFFF;
        opacity: 0.8;
        background-color: #ee5057;
        border-color: #ee5057;
        border-radius: 6px;
    }
    button:active {
        color: #FFFFFF;
        background-color: #ee5057;
        border-color: #ee5057;
        border-radius: 6px;
    }
</style>
<style>
    .alert {
        padding: 7px;
        background-color: #f44336; /* Red */
        color: white;
        margin-bottom: 15px;
    }
</style>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "Bootstraptemplates/navbartemplate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 9,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"tm-top-bar-bg\"></div>
<div class=\"tm-top-bar\" id=\"tm-top-bar\">
    <!-- Top Navbar -->
    <div class=\"container\">
        <div class=\"row\">

            <nav class=\"navbar navbar-expand-lg narbar-light\">
                <a class=\"navbar-brand mr-auto\" href=\"#\">
                    <img src=\"{{ asset('logo.png') }}\" alt=\"Site logo\">

                </a>
                <button type=\"button\" id=\"nav-toggle\" class=\"navbar-toggler collapsed\" data-toggle=\"collapse\" data-target=\"#mainNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div id=\"mainNav\" class=\"collapse navbar-collapse tm-bg-white\">
                    <ul class=\"navbar-nav ml-auto\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"#top\">Boards <span class=\"sr-only\">(current)</span></a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"#tm-section-4\">Demarrer avec un compte business
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<style> .btn-primary {
        background-color: #ee5057 !important;
        border-color: #ee5057 !important;
        border-radius: 6px !important;

    }
    .btn-primary:hover {
        opacity: 0.8!important;
        background-color: #ee5057!important;
        border-color: #ee5057!important;
        border-radius: 6px!important;
    }
    .btn-primary:active {
        background-color: #ee5057 !important;
        border-color: #ee5057!important;
        border-radius: 6px!important;
    }
</style>
<style>
    button {
        color: #FFFFFF;
        background-color: #ee5057;
        border-color: #ee5057;
        border-radius: 6px;
        padding: 8px;
        font-size:10px;
    }
    button:hover {
        color: #FFFFFF;
        opacity: 0.8;
        background-color: #ee5057;
        border-color: #ee5057;
        border-radius: 6px;
    }
    button:active {
        color: #FFFFFF;
        background-color: #ee5057;
        border-color: #ee5057;
        border-radius: 6px;
    }
</style>
<style>
    .alert {
        padding: 7px;
        background-color: #f44336; /* Red */
        color: white;
        margin-bottom: 15px;
    }
</style>
", "Bootstraptemplates/navbartemplate.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\Bootstraptemplates\\navbartemplate.html.twig");
    }
}
