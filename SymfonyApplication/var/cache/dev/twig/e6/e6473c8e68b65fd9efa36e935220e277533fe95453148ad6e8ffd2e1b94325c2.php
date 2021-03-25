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

/* sujet/affichersujet.html.twig */
class __TwigTemplate_846bc6b8f389b3f8e250c863ae1ca6e23e344c2ba5d194fe2e54bbff1289900b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'lienspages' => [$this, 'block_lienspages'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "main.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/affichersujet.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/affichersujet.html.twig"));

        $this->parent = $this->loadTemplate("main.html.twig", "sujet/affichersujet.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_lienspages($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "lienspages"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "lienspages"));

        // line 3
        echo "<li ><a href=\"/AfficherSujet/";
        echo twig_escape_filter($this->env, (isset($context["board_id"]) || array_key_exists("board_id", $context) ? $context["board_id"] : (function () { throw new RuntimeError('Variable "board_id" does not exist.', 3, $this->source); })()), "html", null, true);
        echo "\" style=\"background-color: #ffa9a9;color: red\" ><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion Des Sujet</a></li>
<li  style=\"background-color: white;\" ><a href=\"#\" style=\"color: red\"><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion de Boutique</a></li>
<li  style=\"background-color: white;\" ><a href=\"#\" style=\"color: red\"><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion de Moderateur</a></li>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 8
        echo "
    <table id=\"tableac\" class=\"table\">
        <input id=\"search\" class=\"form-control mr-sm-2\" type=\"text\" name=\"search\" placeholder=\"Search ...\" aria-label=\"Search\"  >
        <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <thead>
    <tr>
        <th scope=\"col\">Les sujets</th>
        <td></td>
        <td>    <form action=\" ";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("ImprimerSujets", ["idboard" => (isset($context["board_id"]) || array_key_exists("board_id", $context) ? $context["board_id"] : (function () { throw new RuntimeError('Variable "board_id" does not exist.', 16, $this->source); })())]), "html", null, true);
        echo " \"><button>Imprimer</button></form>
        </td>
    </tr>
    </thead>
    <tbody>
    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) || array_key_exists("list", $context) ? $context["list"] : (function () { throw new RuntimeError('Variable "list" does not exist.', 21, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 22
            echo "
        <tr>
            <td><a href=\"/ConsulterSujet/";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "board", [], "any", false, false, false, 24), "id", [], "any", false, false, false, 24), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 24), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "titre", [], "any", false, false, false, 24), "html", null, true);
            echo "</a></td>
            <td><form action=\" ";
            // line 25
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("ModifierSujet", ["idboard" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "board", [], "any", false, false, false, 25), "id", [], "any", false, false, false, 25), "id" => twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 25)]), "html", null, true);
            echo " \"><button>Modifier</button></form></td>
            <td><form action=\" ";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("SupprimerSujet", ["idboard" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "board", [], "any", false, false, false, 26), "id", [], "any", false, false, false, 26), "id" => twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 26)]), "html", null, true);
            echo " \"><button>Supprimer</button></form></td>

        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "
    <script>
        \$(document).ready(function(){
            \$('#search').keyup(function(){
                search_table(\$(this).val());
            });
            function search_table(value){
                \$('#tableac tbody tr').each(function(){
                    var found = 'false';
                    \$(this).each(function(){
                        if(\$(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                        {
                            found = 'true';
                        }
                    });
                    if(found == 'true')
                    {
                        \$(this).show();

                    }
                    else
                    {
                        \$(this).hide();

                    }
                });
            }
        });
    </script>
    </tbody>
</table>
    <link rel=\"stylesheet\" href=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("https://pro.fontawesome.com/releases/v5.10.0/css/all.css"), "html", null, true);
        echo "\" integrity=\"sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p\" crossorigin=\"anonymous\"/>

    <form action=\" ";
        // line 63
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("AjouterSujet", ["idboard" => (isset($context["board_id"]) || array_key_exists("board_id", $context) ? $context["board_id"] : (function () { throw new RuntimeError('Variable "board_id" does not exist.', 63, $this->source); })())]), "html", null, true);
        echo " \"><button>Ajouter un sujet</button></form>


";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "sujet/affichersujet.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 63,  178 => 61,  145 => 30,  135 => 26,  131 => 25,  123 => 24,  119 => 22,  115 => 21,  107 => 16,  99 => 11,  94 => 8,  84 => 7,  69 => 3,  59 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'main.html.twig' %}
{% block lienspages %}
<li ><a href=\"/AfficherSujet/{{ board_id }}\" style=\"background-color: #ffa9a9;color: red\" ><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion Des Sujet</a></li>
<li  style=\"background-color: white;\" ><a href=\"#\" style=\"color: red\"><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion de Boutique</a></li>
<li  style=\"background-color: white;\" ><a href=\"#\" style=\"color: red\"><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion de Moderateur</a></li>
{% endblock %}
{% block content %}

    <table id=\"tableac\" class=\"table\">
        <input id=\"search\" class=\"form-control mr-sm-2\" type=\"text\" name=\"search\" placeholder=\"Search ...\" aria-label=\"Search\"  >
        <script src=\"{{ asset('/js/jquery.min.js') }}\"></script>
    <thead>
    <tr>
        <th scope=\"col\">Les sujets</th>
        <td></td>
        <td>    <form action=\" {{ path('ImprimerSujets',{idboard:board_id}) }} \"><button>Imprimer</button></form>
        </td>
    </tr>
    </thead>
    <tbody>
    {% for i in list %}

        <tr>
            <td><a href=\"/ConsulterSujet/{{ i.board.id }}/{{ i.id }}\" >{{ i.titre  }}</a></td>
            <td><form action=\" {{path('ModifierSujet',{idboard:i.board.id,id:i.id})}} \"><button>Modifier</button></form></td>
            <td><form action=\" {{path('SupprimerSujet',{idboard:i.board.id,id:i.id})}} \"><button>Supprimer</button></form></td>

        </tr>
    {% endfor %}

    <script>
        \$(document).ready(function(){
            \$('#search').keyup(function(){
                search_table(\$(this).val());
            });
            function search_table(value){
                \$('#tableac tbody tr').each(function(){
                    var found = 'false';
                    \$(this).each(function(){
                        if(\$(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                        {
                            found = 'true';
                        }
                    });
                    if(found == 'true')
                    {
                        \$(this).show();

                    }
                    else
                    {
                        \$(this).hide();

                    }
                });
            }
        });
    </script>
    </tbody>
</table>
    <link rel=\"stylesheet\" href=\"{{ asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css') }}\" integrity=\"sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p\" crossorigin=\"anonymous\"/>

    <form action=\" {{path('AjouterSujet',{idboard:board_id})}} \"><button>Ajouter un sujet</button></form>


{% endblock %}", "sujet/affichersujet.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\sujet\\affichersujet.html.twig");
    }
}
