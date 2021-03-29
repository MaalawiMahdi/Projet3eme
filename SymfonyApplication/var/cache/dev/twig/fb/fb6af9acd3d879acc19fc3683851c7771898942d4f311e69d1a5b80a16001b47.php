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

/* categorie_aide/index.html.twig */
class __TwigTemplate_6350d90e31fa78e62ece9313d642826f149de7886d6ec05c11f377e4e86a2a3e extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "categorie_aide/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "categorie_aide/index.html.twig"));

        // line 1
        echo "
";
        // line 2
        $this->loadTemplate("temp1.html.twig", "categorie_aide/index.html.twig", 2)->display($context);
        // line 3
        echo "
<div class=\"box\">
    <div class=\"box-header\">
        <h3 class=\"box-title\">Gestion des categories aides</h3>
    </div>
    <!-- /.box-header -->
    <div class=\"box-body\">
        <table id=\"example1\" class=\"table table-bordered table-striped\">
            <thead>
            <tr>
                <th>IdCategorieAide</th>
                <th>Titre</th>
                <th>Icone</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 4.0</td>
                <td>Win 95+</td>

            </tr>



            <tr>
                <td>Gecko</td>
                <td>Mozilla 1.5</td>
                <td>Win 95+ / OSX.1+</td>

            </tr>
            <tr>
                <td>Gecko</td>
                <td>Mozilla 1.6</td>
                <td>Win 95+ / OSX.1+</td>

            </tr>
            <tr>
                <td>Gecko</td>
                <td>Mozilla 1.7</td>
                <td>Win 98+ / OSX.1+</td>

            </tr>

            <tr>
                <td>Webkit</td>
                <td>Safari 2.0</td>
                <td>OSX.4+</td>

            </tr>
            <tr>
                <td>Webkit</td>
                <td>Safari 3.0</td>
                <td>OSX.4+</td>

            </tr>
            <tr>
                <td>Webkit</td>
                <td>OmniWeb 5.5</td>
                <td>OSX.4+</td>

            </tr>
            <tr>
                <td>Webkit</td>
                <td>iPod Touch / iPhone</td>
                <td>iPod</td>

            </tr>


            </tbody>

        </table>
    </div>
    <!-- /.box-body -->
</div>
";
        // line 80
        $this->loadTemplate("temp2.html.twig", "categorie_aide/index.html.twig", 80)->display($context);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "categorie_aide/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 80,  48 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
{% include 'temp1.html.twig' %}

<div class=\"box\">
    <div class=\"box-header\">
        <h3 class=\"box-title\">Gestion des categories aides</h3>
    </div>
    <!-- /.box-header -->
    <div class=\"box-body\">
        <table id=\"example1\" class=\"table table-bordered table-striped\">
            <thead>
            <tr>
                <th>IdCategorieAide</th>
                <th>Titre</th>
                <th>Icone</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Trident</td>
                <td>Internet Explorer 4.0</td>
                <td>Win 95+</td>

            </tr>



            <tr>
                <td>Gecko</td>
                <td>Mozilla 1.5</td>
                <td>Win 95+ / OSX.1+</td>

            </tr>
            <tr>
                <td>Gecko</td>
                <td>Mozilla 1.6</td>
                <td>Win 95+ / OSX.1+</td>

            </tr>
            <tr>
                <td>Gecko</td>
                <td>Mozilla 1.7</td>
                <td>Win 98+ / OSX.1+</td>

            </tr>

            <tr>
                <td>Webkit</td>
                <td>Safari 2.0</td>
                <td>OSX.4+</td>

            </tr>
            <tr>
                <td>Webkit</td>
                <td>Safari 3.0</td>
                <td>OSX.4+</td>

            </tr>
            <tr>
                <td>Webkit</td>
                <td>OmniWeb 5.5</td>
                <td>OSX.4+</td>

            </tr>
            <tr>
                <td>Webkit</td>
                <td>iPod Touch / iPhone</td>
                <td>iPod</td>

            </tr>


            </tbody>

        </table>
    </div>
    <!-- /.box-body -->
</div>
{% include 'temp2.html.twig' %}
", "categorie_aide/index.html.twig", "C:\\wamp64\\www\\Projet3eme\\SymfonyApplication\\templates\\categorie_aide\\index.html.twig");
    }
}
