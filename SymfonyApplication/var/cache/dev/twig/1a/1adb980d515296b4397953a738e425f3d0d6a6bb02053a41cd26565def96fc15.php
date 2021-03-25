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

/* sujet/modifiercommentairefront.html.twig */
class __TwigTemplate_39b1efb63a71a5af203c2ac1fffc05b9c39761584a82397e0293f8f022789d7e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/modifiercommentairefront.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/modifiercommentairefront.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "sujet/modifiercommentairefront.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    ";
        $this->loadTemplate("Bootstraptemplates/navbartemplate.html.twig", "sujet/modifiercommentairefront.html.twig", 3)->display($context);
        // line 4
        echo "
    <br>
    <br>
    <br>
    <h4><p class=\"text-center\">";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 8, $this->source); })()), "titre", [], "any", false, false, false, 8), "html", null, true);
        echo "</p></h4>
    <h4><p class=\"text\">";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 9, $this->source); })()), "description", [], "any", false, false, false, 9), "html", null, true);
        echo "</p></h4>
    <center>

        <img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("im/" . twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 12, $this->source); })()), "lienimage", [], "any", false, false, false, 12))), "html", null, true);
        echo "\">

    </center>
    <h3>Les Commentaires du sujet</h3>
    <table class=\"table\">
        <thead>
        </thead>
        <tbody>
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listc"]) || array_key_exists("listc", $context) ? $context["listc"] : (function () { throw new RuntimeError('Variable "listc" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 21
            echo "
            <tr>
                ";
            // line 23
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "Sujet", [], "any", false, false, false, 23), "id", [], "any", false, false, false, 23), twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 23, $this->source); })()), "id", [], "any", false, false, false, 23)))) {
                // line 24
                echo "
                ";
                // line 25
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 25), (isset($context["idcom"]) || array_key_exists("idcom", $context) ? $context["idcom"] : (function () { throw new RuntimeError('Variable "idcom" does not exist.', 25, $this->source); })())))) {
                    // line 26
                    echo "                <td>

                    ";
                    // line 28
                    if ((0 === twig_compare((isset($context["e"]) || array_key_exists("e", $context) ? $context["e"] : (function () { throw new RuntimeError('Variable "e" does not exist.', 28, $this->source); })()), "1"))) {
                        // line 29
                        echo "                        <div class=\"alert\">
                            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                            Vous utilisez un mot indésirable, merci de le changer
                        </div>
                    ";
                    }
                    // line 34
                    echo "                    ";
                    echo                     $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["f"]) || array_key_exists("f", $context) ? $context["f"] : (function () { throw new RuntimeError('Variable "f" does not exist.', 34, $this->source); })()), 'form');
                    echo "
                </td>
                ";
                } else {
                    // line 37
                    echo "                    <td>
                        <div style=\"color:red\">";
                    // line 38
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "User", [], "any", false, false, false, 38), "mail", [], "any", false, false, false, 38), "html", null, true);
                    echo " </div> ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "com", [], "any", false, false, false, 38), "html", null, true);
                    echo "
                    </td>
                ";
                }
                // line 41
                echo "                ";
            }
            // line 42
            echo "            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "        </tbody>

    </table>


";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "sujet/modifiercommentairefront.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 44,  147 => 42,  144 => 41,  136 => 38,  133 => 37,  126 => 34,  119 => 29,  117 => 28,  113 => 26,  111 => 25,  108 => 24,  106 => 23,  102 => 21,  98 => 20,  87 => 12,  81 => 9,  77 => 8,  71 => 4,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    {% include 'Bootstraptemplates/navbartemplate.html.twig' %}

    <br>
    <br>
    <br>
    <h4><p class=\"text-center\">{{ sujet.titre }}</p></h4>
    <h4><p class=\"text\">{{ sujet.description }}</p></h4>
    <center>

        <img src=\"{{ asset('im/' ~sujet.lienimage) }}\">

    </center>
    <h3>Les Commentaires du sujet</h3>
    <table class=\"table\">
        <thead>
        </thead>
        <tbody>
        {% for i in listc %}

            <tr>
                {% if i.Sujet.id == sujet.id %}

                {% if i.id == idcom %}
                <td>

                    {% if e == '1' %}
                        <div class=\"alert\">
                            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                            Vous utilisez un mot indésirable, merci de le changer
                        </div>
                    {% endif %}
                    {{ form(f) }}
                </td>
                {% else %}
                    <td>
                        <div style=\"color:red\">{{ i.User.mail }} </div> {{ i.com }}
                    </td>
                {% endif %}
                {% endif %}
            </tr>
        {% endfor %}
        </tbody>

    </table>


{% endblock %}", "sujet/modifiercommentairefront.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\sujet\\modifiercommentairefront.html.twig");
    }
}
