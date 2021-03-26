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

/* categorie/index.html.twig */
class __TwigTemplate_a5d7f9467ddf3954004d9c8848e43a0d1edcb3919249a03d40f836270e773337 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "categorie/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "categorie/index.html.twig"));

        // line 1
        $this->loadTemplate("temp1.html.twig", "categorie/index.html.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"box\">
    <div class=\"box-header\">
        <h3 style =\"margin-bottom: 2%; text-align: center; color: #d11414 ;\" class=\"box-title\" >Gestion des categories</h3>
    </div>
    <!-- /.box-header -->
    <div class=\"box-body\">
        <table id=\"example1\" class=\"table table-bordered table-striped\">
            <thead>
            <tr>
                <th>IdCategorie</th>
                <th>Nom</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Tasman</td>
                <td>Internet Explorer 5.2</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>NetFront 3.1</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>NetFront 3.4</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>Dillo 0.8</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>Links</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>Lynx</td>

            </tr>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
";
        // line 54
        $this->loadTemplate("temp2.html.twig", "categorie/index.html.twig", 54)->display($context);
        // line 55
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "categorie/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 55,  99 => 54,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% include 'temp1.html.twig' %}

<div class=\"box\">
    <div class=\"box-header\">
        <h3 style =\"margin-bottom: 2%; text-align: center; color: #d11414 ;\" class=\"box-title\" >Gestion des categories</h3>
    </div>
    <!-- /.box-header -->
    <div class=\"box-body\">
        <table id=\"example1\" class=\"table table-bordered table-striped\">
            <thead>
            <tr>
                <th>IdCategorie</th>
                <th>Nom</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Tasman</td>
                <td>Internet Explorer 5.2</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>NetFront 3.1</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>NetFront 3.4</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>Dillo 0.8</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>Links</td>

            </tr>
            <tr>
                <td>Misc</td>
                <td>Lynx</td>

            </tr>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
{% include 'temp2.html.twig' %}

", "categorie/index.html.twig", "C:\\Users\\drwhoo\\Desktop\\projet integrer\\Projet3eme\\SymfonyApplication\\templates\\categorie\\index.html.twig");
    }
}
