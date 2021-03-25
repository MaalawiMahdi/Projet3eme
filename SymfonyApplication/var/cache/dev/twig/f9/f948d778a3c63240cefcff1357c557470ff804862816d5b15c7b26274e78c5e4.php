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

/* inc/card.html.twig */
class __TwigTemplate_0a5d1d45cf4461e1cf826ef465ad274f2a80e0df0404e40f8c421312e9bff915 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "inc/card.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "inc/card.html.twig"));

        // line 1
        echo "<div class=\"card mb-3\">
        <div class=\"card-header\" style=\"background-color: #d11414; color:white;\">
            <h5 class=\"card-title\">";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 3, $this->source); })()), "html", null, true);
        echo "</h5>
        </div>
        <div class=\"card-body\">
        <h6 class=\"card-subtitle mb-2 text-muted\">Le 16/02/2020</h6>

        <p class=\"card-text\">Pellentesque facilisis lobortis lacinia. Ut quis urna blandit,
            gravida sapien sit amet, scelerisque sapien. Duis porta, magna id auctor consectetur,
            ex turpis consequat sem, vel dapibus risus felis vel dui. Cras id turpis accumsan sapien porttitor semper euismod non elit. In semper, orci eget gravida iaculis, turpis nulla maximus velit, id imperdiet leo sapien et orci. Suspendisse potenti. Fusce sed quam ac nibh tempus luctus. Praesent iaculis blandit eros sit amet volutpat. Phasellus consectetur lacus odio, rhoncus hendrerit massa blandit vitae.</p>
            </div>
         <p class=\"card-image\" >
             <img style=\"width: 100%\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["image"]) || array_key_exists("image", $context) ? $context["image"] : (function () { throw new RuntimeError('Variable "image" does not exist.', 13, $this->source); })())), "html", null, true);
        echo "\">
         </p>
    <div class=\"card-footer\">
        <table style=\"width: 300px; float: right;\">
            <tr>
            <td><a class=\"text-link\" href=\"#\">45 commentaires</a></td>
            <td> <a class=\"text-link\" href=\"#\">voir plus ...</a></td>
            <td><a href=\"#\" class=\"btn btn-primary\">Join</a></td>
            </tr>
        </table>
        </div>
</div>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "inc/card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 13,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"card mb-3\">
        <div class=\"card-header\" style=\"background-color: #d11414; color:white;\">
            <h5 class=\"card-title\">{{ title }}</h5>
        </div>
        <div class=\"card-body\">
        <h6 class=\"card-subtitle mb-2 text-muted\">Le 16/02/2020</h6>

        <p class=\"card-text\">Pellentesque facilisis lobortis lacinia. Ut quis urna blandit,
            gravida sapien sit amet, scelerisque sapien. Duis porta, magna id auctor consectetur,
            ex turpis consequat sem, vel dapibus risus felis vel dui. Cras id turpis accumsan sapien porttitor semper euismod non elit. In semper, orci eget gravida iaculis, turpis nulla maximus velit, id imperdiet leo sapien et orci. Suspendisse potenti. Fusce sed quam ac nibh tempus luctus. Praesent iaculis blandit eros sit amet volutpat. Phasellus consectetur lacus odio, rhoncus hendrerit massa blandit vitae.</p>
            </div>
         <p class=\"card-image\" >
             <img style=\"width: 100%\" src=\"{{ asset(image) }}\">
         </p>
    <div class=\"card-footer\">
        <table style=\"width: 300px; float: right;\">
            <tr>
            <td><a class=\"text-link\" href=\"#\">45 commentaires</a></td>
            <td> <a class=\"text-link\" href=\"#\">voir plus ...</a></td>
            <td><a href=\"#\" class=\"btn btn-primary\">Join</a></td>
            </tr>
        </table>
        </div>
</div>", "inc/card.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\inc\\card.html.twig");
    }
}
