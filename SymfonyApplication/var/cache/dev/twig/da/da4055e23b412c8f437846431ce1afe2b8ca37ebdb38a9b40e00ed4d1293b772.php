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
class __TwigTemplate_7f331e40ac8806f3af21e07cd05cb199a2ba92dde028762bffb04eefb9fd3b37 extends Template
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
        echo "<table class=\"table\">
    <thead>
    <tr>
        <th scope=\"col\">Les sujets</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) || array_key_exists("list", $context) ? $context["list"] : (function () { throw new RuntimeError('Variable "list" does not exist.', 15, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 16
            echo "
        <tr>
            <td><a href=\"/ConsulterSujet/";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "board", [], "any", false, false, false, 18), "id", [], "any", false, false, false, 18), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 18), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "titre", [], "any", false, false, false, 18), "html", null, true);
            echo "</a></td>

            <td>
                <a  href=\"/ModifierSujet/";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "board", [], "any", false, false, false, 21), "id", [], "any", false, false, false, 21), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 21), "html", null, true);
            echo "\"> Modifier</a>
            </td>
            <td>
                <a  href=\"/SupprimerSujet/";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "board", [], "any", false, false, false, 24), "id", [], "any", false, false, false, 24), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 24), "html", null, true);
            echo "\"> Supprimer</a>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "    </tbody>
</table>
    <a href=\"/AjouterSujet/";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["board_id"]) || array_key_exists("board_id", $context) ? $context["board_id"] : (function () { throw new RuntimeError('Variable "board_id" does not exist.', 30, $this->source); })()), "html", null, true);
        echo "\" >Ajouter un sujet</a>

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
        return array (  145 => 30,  141 => 28,  129 => 24,  121 => 21,  111 => 18,  107 => 16,  103 => 15,  94 => 8,  84 => 7,  69 => 3,  59 => 2,  36 => 1,);
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
<table class=\"table\">
    <thead>
    <tr>
        <th scope=\"col\">Les sujets</th>
    </tr>
    </thead>
    <tbody>
    {% for i in list %}

        <tr>
            <td><a href=\"/ConsulterSujet/{{ i.board.id }}/{{ i.id }}\">{{ i.titre  }}</a></td>

            <td>
                <a  href=\"/ModifierSujet/{{ i.board.id }}/{{ i.id }}\"> Modifier</a>
            </td>
            <td>
                <a  href=\"/SupprimerSujet/{{ i.board.id }}/{{ i.id }}\"> Supprimer</a>
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
    <a href=\"/AjouterSujet/{{ board_id }}\" >Ajouter un sujet</a>

{% endblock %}", "sujet/affichersujet.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\sujet\\affichersujet.html.twig");
    }
}
