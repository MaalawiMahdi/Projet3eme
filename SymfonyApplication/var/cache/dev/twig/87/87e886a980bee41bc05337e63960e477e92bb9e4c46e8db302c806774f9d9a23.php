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

/* sujet/consultersujet.html.twig */
class __TwigTemplate_089a148f2cc9d963517f920b025d089ddde44303a874a873e91499260c633656 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/consultersujet.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/consultersujet.html.twig"));

        $this->parent = $this->loadTemplate("main.html.twig", "sujet/consultersujet.html.twig", 1);
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
        echo "    <li ><a href=\"/AfficherSujet/";
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
        echo "<center>
    <h3>";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 9, $this->source); })()), "titre", [], "any", false, false, false, 9), "html", null, true);
        echo "</h3>
</center>
    <h4>";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 11, $this->source); })()), "description", [], "any", false, false, false, 11), "html", null, true);
        echo "</h4>
    <img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("im/" . twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 12, $this->source); })()), "lienimage", [], "any", false, false, false, 12))), "html", null, true);
        echo "\">
    <br>
    <h3>Les Commentaires du sujet</h3>
    <table class=\"table\">
        <thead>

        </thead>
        <tbody>
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["x"]) {
            // line 21
            echo "            ";
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["x"], "Sujet", [], "any", false, false, false, 21), "id", [], "any", false, false, false, 21), twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 21, $this->source); })()), "id", [], "any", false, false, false, 21)))) {
                // line 22
                echo "            <tr>
                <td>
                    <div style=\"color:red\">";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["x"], "User", [], "any", false, false, false, 24), "mail", [], "any", false, false, false, 24), "html", null, true);
                echo " </div> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["x"], "com", [], "any", false, false, false, 24), "html", null, true);
                echo "
                </td>
            </tr>
            ";
            }
            // line 28
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['x'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "
        </tbody>
        <tfoot>

        </tfoot>

    </table>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "sujet/consultersujet.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 29,  137 => 28,  128 => 24,  124 => 22,  121 => 21,  117 => 20,  106 => 12,  102 => 11,  97 => 9,  94 => 8,  84 => 7,  69 => 3,  59 => 2,  36 => 1,);
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
<center>
    <h3>{{ sujet.titre }}</h3>
</center>
    <h4>{{ sujet.description }}</h4>
    <img src=\"{{ asset('im/' ~sujet.lienimage) }}\">
    <br>
    <h3>Les Commentaires du sujet</h3>
    <table class=\"table\">
        <thead>

        </thead>
        <tbody>
        {% for x in commentaires %}
            {% if x.Sujet.id == sujet.id %}
            <tr>
                <td>
                    <div style=\"color:red\">{{ x.User.mail }} </div> {{ x.com }}
                </td>
            </tr>
            {% endif %}
        {% endfor %}

        </tbody>
        <tfoot>

        </tfoot>

    </table>



{% endblock %}", "sujet/consultersujet.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\sujet\\consultersujet.html.twig");
    }
}
