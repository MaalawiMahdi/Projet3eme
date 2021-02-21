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

/* navbar.html.twig */
class __TwigTemplate_6ed679b8061c4f964fb0f28d9ccc58b216c99dad998ade8826a71b0ef28d8d39 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "navbar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "navbar.html.twig"));

        // line 1
        echo "<nav class=\"navbar navbar-expand-xl navbar-dark\" style=\"background-color: #d11414; color:white;\" >
    <a class=\"navbar-brand\" href=\"";
        // line 2
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("welcome");
        echo "\">
        HolidayHiatus
    </a>
    <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarsExample06\" aria-controls=\"navbarsExample06\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>

    <div class=\"collapse navbar-collapse\" id=\"navbarsExample06\">
        <ul class=\"navbar-nav mr-auto\">
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Acceuil <span class=\"sr-only\"></span></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">culturel</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Loisir</a>
            </li>
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    Dropdown link
                </a>
                <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                    <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                    <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-xl navbar-dark\" style=\"background-color: #d11414; color:white;\" >
    <a class=\"navbar-brand\" href=\"{{ path('welcome') }}\">
        HolidayHiatus
    </a>
    <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarsExample06\" aria-controls=\"navbarsExample06\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>

    <div class=\"collapse navbar-collapse\" id=\"navbarsExample06\">
        <ul class=\"navbar-nav mr-auto\">
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Acceuil <span class=\"sr-only\"></span></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">culturel</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Loisir</a>
            </li>
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    Dropdown link
                </a>
                <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                    <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                    <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>", "navbar.html.twig", "C:\\Users\\ASUS\\Desktop\\Projet3eme\\SymfonyApplication\\templates\\navbar.html.twig");
    }
}
