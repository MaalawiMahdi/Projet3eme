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

/* sujet/recherchesujet.html.twig */
class __TwigTemplate_0a66d6005f1f72da61c081e352bf07d1a42ecde695384c1362b05b315bd23264 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/recherchesujet.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/recherchesujet.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "sujet/recherchesujet.html.twig", 1);
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
        $this->loadTemplate("Bootstraptemplates/navbartemplate.html.twig", "sujet/recherchesujet.html.twig", 3)->display($context);
        // line 4
        echo "
    <div class=\"tm-section tm-position-relative\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\" class=\"tm-section-down-arrow\">
            <polygon fill=\"#ee5057\" points=\"0,0  100,0  50,60\"></polygon>
        </svg>
        <br>
        <br>
        <br>
        ";
        // line 12
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["fr"]) || array_key_exists("fr", $context) ? $context["fr"] : (function () { throw new RuntimeError('Variable "fr" does not exist.', 12, $this->source); })()), 'form');
        echo "

        <div class=\"container tm-pt-5 tm-pb-4\">
            <div class=\"row text-center\">
                ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lsu"]) || array_key_exists("lsu", $context) ? $context["lsu"] : (function () { throw new RuntimeError('Variable "lsu" does not exist.', 16, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["A"]) {
            // line 17
            echo "                    <article class=\"col-sm-16 col-md-6 col-lg-6 col-xl-6 tm-article\">
                        <i class=\"fa tm-fa-6x tm-color-primary tm-margin-b-20\"><img style=\" padding-right: 2px; padding-left: 2px; width:100px ; height: 100px ; \" src=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("im/" . twig_get_attribute($this->env, $this->source, $context["A"], "lienimage", [], "any", false, false, false, 18))), "html", null, true);
            echo "\"></i>
                        <!--<i class=\"fa tm-fa-6x tm-color-primary tm-margin-b-20\"><img style=\" padding-right: 2px; padding-left: 2px; width:100px ; height: 100px ; \" src=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . twig_get_attribute($this->env, $this->source, $context["A"], "getLienImage", [], "method", false, false, false, 19))), "html", null, true);
            echo "\"></i>-->
                        <h3 class=\"tm-color-primary tm-article-title-1\">";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["A"], "titre", [], "any", false, false, false, 20), "html", null, true);
            echo "</h3>
                        <p>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["A"], "description", [], "any", false, false, false, 21), "html", null, true);
            echo "</p>
                        <td><form action=\" ";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("ConsulterSujetFront", ["idboard" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["A"], "board", [], "any", false, false, false, 22), "id", [], "any", false, false, false, 22), "id" => twig_get_attribute($this->env, $this->source, $context["A"], "id", [], "any", false, false, false, 22)]), "html", null, true);
            echo " \"><button>Consulter</button></form></td>

                    </article>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['A'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "sujet/recherchesujet.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 26,  111 => 22,  107 => 21,  103 => 20,  99 => 19,  95 => 18,  92 => 17,  88 => 16,  81 => 12,  71 => 4,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    {% include 'Bootstraptemplates/navbartemplate.html.twig' %}

    <div class=\"tm-section tm-position-relative\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\" class=\"tm-section-down-arrow\">
            <polygon fill=\"#ee5057\" points=\"0,0  100,0  50,60\"></polygon>
        </svg>
        <br>
        <br>
        <br>
        {{ form(fr) }}

        <div class=\"container tm-pt-5 tm-pb-4\">
            <div class=\"row text-center\">
                {% for A in lsu %}
                    <article class=\"col-sm-16 col-md-6 col-lg-6 col-xl-6 tm-article\">
                        <i class=\"fa tm-fa-6x tm-color-primary tm-margin-b-20\"><img style=\" padding-right: 2px; padding-left: 2px; width:100px ; height: 100px ; \" src=\"{{ asset('im/' ~A.lienimage)}}\"></i>
                        <!--<i class=\"fa tm-fa-6x tm-color-primary tm-margin-b-20\"><img style=\" padding-right: 2px; padding-left: 2px; width:100px ; height: 100px ; \" src=\"{{ asset('uploads/' ~ A.getLienImage())}}\"></i>-->
                        <h3 class=\"tm-color-primary tm-article-title-1\">{{ A.titre }}</h3>
                        <p>{{ A.description}}</p>
                        <td><form action=\" {{path('ConsulterSujetFront',{idboard:A.board.id,id:A.id})}} \"><button>Consulter</button></form></td>

                    </article>
                {% endfor %}

            </div>
        </div>
    </div>

{% endblock %}
", "sujet/recherchesujet.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\sujet\\recherchesujet.html.twig");
    }
}
