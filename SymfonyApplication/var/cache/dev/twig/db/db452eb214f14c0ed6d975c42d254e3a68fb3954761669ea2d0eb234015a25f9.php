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

/* produit_service/index.html.twig */
class __TwigTemplate_87fff02b233eec58aa2523601b6cb21b2f42fb722029076664d272905cf5c0ab extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit_service/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit_service/index.html.twig"));

        $this->parent = $this->loadTemplate("main.html.twig", "produit_service/index.html.twig", 1);
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
        // line 45
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
        echo "    ";
        if ((isset($context["ProduitService"]) || array_key_exists("ProduitService", $context) ? $context["ProduitService"] : (function () { throw new RuntimeError('Variable "ProduitService" does not exist.', 7, $this->source); })())) {
            // line 8
            echo "        <table id=\"ProduitService\" class=\"table table-striped\">
            <thead>
            <tr>
                <th>titre</th>
                <th>description</th>
               <th>lien_image</th>
                <th>type</th>
                <th>prix_unitaire</th>

                <th>Delete</th>
                <th>Update</th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["ProduitService"]) || array_key_exists("ProduitService", $context) ? $context["ProduitService"] : (function () { throw new RuntimeError('Variable "ProduitService" does not exist.', 22, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 23
                echo "                <tr>
                    <td>";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "titre", [], "any", false, false, false, 24), "html", null, true);
                echo "</td>
                    <td>";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "description", [], "any", false, false, false, 25), "html", null, true);
                echo "</td>
                    <td><img src =\"";
                // line 26
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("img/" . twig_get_attribute($this->env, $this->source, $context["c"], "getLienImage", [], "method", false, false, false, 26))), "html", null, true);
                echo "\"
                    alt = \"\" style = \"width:50px; height: 50px\">
                    </td>
                    <td>";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "type", [], "any", false, false, false, 29), "html", null, true);
                echo "</td>
                    <td>";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "prixunitaire", [], "any", false, false, false, 30), "html", null, true);
                echo "</td>

                    <td><a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("produit_service_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 32)]), "html", null, true);
                echo "\" >Supprimer</a> </td>
                    <td><a href=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("produit_service_update", ["id" => twig_get_attribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 33)]), "html", null, true);
                echo "\" >Modifier</a> </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "            </tbody>
        </table>
    ";
        } else {
            // line 39
            echo "        <p>Aucun produits</p>
    ";
        }
        // line 41
        echo "    <div class=\"navigation\">
    </div>
    <a href=\"";
        // line 43
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("produit_service_liste");
        echo "\">Imprimer</a>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "produit_service/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 43,  187 => 41,  183 => 39,  178 => 36,  169 => 33,  165 => 32,  160 => 30,  156 => 29,  150 => 26,  146 => 25,  142 => 24,  139 => 23,  135 => 22,  119 => 8,  116 => 7,  106 => 6,  87 => 5,  77 => 45,  75 => 6,  73 => 5,  70 => 4,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'main.html.twig' %}

  {% block content %}

{% block title%} Liste des Produits{% endblock %}
{% block body %}
    {% if ProduitService %}
        <table id=\"ProduitService\" class=\"table table-striped\">
            <thead>
            <tr>
                <th>titre</th>
                <th>description</th>
               <th>lien_image</th>
                <th>type</th>
                <th>prix_unitaire</th>

                <th>Delete</th>
                <th>Update</th>
            </tr>
            </thead>
            <tbody>
            {% for c in ProduitService %}
                <tr>
                    <td>{{ c.titre }}</td>
                    <td>{{ c.description }}</td>
                    <td><img src =\"{{ asset('img/' ~ c.getLienImage()) }}\"
                    alt = \"\" style = \"width:50px; height: 50px\">
                    </td>
                    <td>{{ c.type }}</td>
                    <td>{{ c.prixunitaire }}</td>

                    <td><a href=\"{{ path(\"produit_service_delete\", {'id' : c.id}) }}\" >Supprimer</a> </td>
                    <td><a href=\"{{ path(\"produit_service_update\", {'id' : c.id}) }}\" >Modifier</a> </td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    {% else %}
        <p>Aucun produits</p>
    {% endif %}
    <div class=\"navigation\">
    </div>
    <a href=\"{{ path('produit_service_liste') }}\">Imprimer</a>
{% endblock %}
  {% endblock %}", "produit_service/index.html.twig", "C:\\wamp64\\www\\Projet3eme\\SymfonyApplication\\templates\\produit_service\\index.html.twig");
    }
}
