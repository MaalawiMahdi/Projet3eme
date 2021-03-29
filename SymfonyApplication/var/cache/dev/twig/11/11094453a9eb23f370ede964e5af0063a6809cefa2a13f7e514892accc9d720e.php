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

/* Cart/index.html.twig */
class __TwigTemplate_f71c00fc615433905fbae516f24ff78b741035403ebb8e6f07f112efa2e66127 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Cart/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Cart/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "Cart/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Hello CartController!
";
        
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
        echo "    <div class=\"bg-light p-3\">
        <h1>Votre panier</h1>
    </div>
    ";
        // line 10
        if ((1 === twig_compare(twig_length_filter($this->env, (isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 10, $this->source); })())), 0))) {
            // line 11
            echo "        <table class=\"table\">
            <thead>
            <tr>
                <th>Produit</th>
                <th>prix</th>
                <th>quantite</th>
                <th>total</th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 21, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 22
                echo "                <tr>
                    <td>";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "ProduitService", [], "any", false, false, false, 23), "titre", [], "any", false, false, false, 23), "html", null, true);
                echo "</td>
                    <td>";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "ProduitService", [], "any", false, false, false, 24), "getPrixUnitaire", [], "method", false, false, false, 24), "html", null, true);
                echo "</td>
                    <td>";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 25), "html", null, true);
                echo "</td>
                    <td>";
                // line 26
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "ProduitService", [], "any", false, false, false, 26), "getPrixUnitaire", [], "method", false, false, false, 26) * twig_get_attribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 26)), "html", null, true);
                echo "</td>
                    <td>
                        <a href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cart_remove", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "ProduitService", [], "any", false, false, false, 28), "id", [], "any", false, false, false, 28)]), "html", null, true);
                echo "\" class=\"btn btn-danger btn-sm\">
                            <i class=\"fas fa-trash\"></i>
                        </a>
                    </td>
                </tr>

            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "            </tbody>
            <tfoot>
            <tr>
                <td colpsan=\"3\" class=\"text_right\">Total : </td>
                <td>";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 39, $this->source); })()), "html", null, true);
            echo "</td>
                <td></td>

            </tr>
            </tfoot>
        </table>
    ";
        } else {
            // line 46
            echo "        <p>Surprise, c'est vide !</p>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "Cart/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 46,  151 => 39,  145 => 35,  132 => 28,  127 => 26,  123 => 25,  119 => 24,  115 => 23,  112 => 22,  108 => 21,  96 => 11,  94 => 10,  89 => 7,  79 => 6,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello CartController!
{% endblock %}

{% block body %}
    <div class=\"bg-light p-3\">
        <h1>Votre panier</h1>
    </div>
    {% if items | length >0 %}
        <table class=\"table\">
            <thead>
            <tr>
                <th>Produit</th>
                <th>prix</th>
                <th>quantite</th>
                <th>total</th>
            </tr>
            </thead>
            <tbody>
            {% for item in items %}
                <tr>
                    <td>{{ item.ProduitService.titre }}</td>
                    <td>{{ item.ProduitService.getPrixUnitaire() }}</td>
                    <td>{{ item.quantity }}</td>
                    <td>{{ item.ProduitService.getPrixUnitaire()  * item.quantity }}</td>
                    <td>
                        <a href=\"{{ path('cart_remove',{'id':item.ProduitService.id}) }}\" class=\"btn btn-danger btn-sm\">
                            <i class=\"fas fa-trash\"></i>
                        </a>
                    </td>
                </tr>

            {% endfor %}
            </tbody>
            <tfoot>
            <tr>
                <td colpsan=\"3\" class=\"text_right\">Total : </td>
                <td>{{ total }}</td>
                <td></td>

            </tr>
            </tfoot>
        </table>
    {% else %}
        <p>Surprise, c'est vide !</p>
    {% endif %}
{% endblock %}", "Cart/index.html.twig", "C:\\wamp64\\www\\Projet3eme\\SymfonyApplication\\templates\\Cart\\index.html.twig");
    }
}
