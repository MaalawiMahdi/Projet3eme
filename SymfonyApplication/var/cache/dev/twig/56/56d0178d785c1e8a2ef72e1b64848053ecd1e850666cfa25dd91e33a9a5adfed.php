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

/* demande/index.html.twig */
class __TwigTemplate_17d4ca736873d82a0253d1d1911ed62cc8ad93ea9c2369ef8867f13a0b5ae6e5 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "demande/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "demande/index.html.twig"));

        // line 1
        echo "
";
        // line 2
        $this->loadTemplate("temp1.html.twig", "demande/index.html.twig", 2)->display($context);
        // line 3
        echo "
<div class=\"box\">
    <div class=\"box-header\">
        <h3 class=\"box-title\">Gestion des sociétés </h3>
    </div>
    <!-- /.box-header -->
    <div class=\"box-body\">
        <table id=\"example1\" class=\"table table-bordered table-striped\">
            <thead>
            <tr>
                <th>IdSociété</th>
                <th>NumRegistre</th>
                <th>Adresse</th>
                <th>TypeDeSociété</th>
                <th>Etat</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 4.0</td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
            </tr>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 5.0</td>
                <td>Win 95+</td>
                <td>5</td>
                <td>C</td>
            </tr>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 5.5</td>
                <td>Win 95+</td>
                <td>5.5</td>
                <td>A</td>
            </tr>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 6</td>
                <td>Win 98+</td>
                <td>6</td>
                <td>A</td>
            </tr>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 7</td>
                <td>Win XP SP2+</td>
                <td>7</td>
                <td>A</td>
            </tr>

            </tbody>

        </table>
    </div>
    <!-- /.box-body -->
</div>
";
        // line 63
        $this->loadTemplate("temp2.html.twig", "demande/index.html.twig", 63)->display($context);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "demande/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 63,  48 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
{% include 'temp1.html.twig' %}

<div class=\"box\">
    <div class=\"box-header\">
        <h3 class=\"box-title\">Gestion des sociétés </h3>
    </div>
    <!-- /.box-header -->
    <div class=\"box-body\">
        <table id=\"example1\" class=\"table table-bordered table-striped\">
            <thead>
            <tr>
                <th>IdSociété</th>
                <th>NumRegistre</th>
                <th>Adresse</th>
                <th>TypeDeSociété</th>
                <th>Etat</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 4.0</td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
            </tr>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 5.0</td>
                <td>Win 95+</td>
                <td>5</td>
                <td>C</td>
            </tr>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 5.5</td>
                <td>Win 95+</td>
                <td>5.5</td>
                <td>A</td>
            </tr>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 6</td>
                <td>Win 98+</td>
                <td>6</td>
                <td>A</td>
            </tr>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 7</td>
                <td>Win XP SP2+</td>
                <td>7</td>
                <td>A</td>
            </tr>

            </tbody>

        </table>
    </div>
    <!-- /.box-body -->
</div>
{% include 'temp2.html.twig' %}
", "demande/index.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\demande\\index.html.twig");
    }
}
