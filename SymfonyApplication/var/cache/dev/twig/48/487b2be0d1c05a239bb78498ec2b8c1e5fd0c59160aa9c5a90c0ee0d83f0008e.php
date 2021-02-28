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

/* navigation_contrller/index.html.twig */
class __TwigTemplate_f1d1b9c93926f8cf7302408b99a140eda2da8431088f98512ae752f8ea5dadf6 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "navigation_contrller/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "navigation_contrller/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "navigation_contrller/index.html.twig", 1);
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

        echo "HolidayHiatus";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "    <center><img src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("logo.png"), "html", null, true);
        echo "\"></center>
    <div class=\"container\" style=\"margin-top: 15px; \" >

        <div class=\"row\">
    ";
        // line 12
        $this->loadTemplate("inc/card.html.twig", "navigation_contrller/index.html.twig", 12)->display(twig_array_merge($context, ["title" => "El Theatro Studio", "image" => "/El-Teatro-30-ans-déjà.jpg"]));
        // line 13
        echo "    </div>
        <div class=\"row\">
            ";
        // line 15
        $this->loadTemplate("inc/card.html.twig", "navigation_contrller/index.html.twig", 15)->display(twig_array_merge($context, ["title" => "Cinéma ABC", "image" => "/elharba.jpg"]));
        // line 16
        echo "        </div> <div class=\"row\">
            ";
        // line 17
        $this->loadTemplate("inc/card.html.twig", "navigation_contrller/index.html.twig", 17)->display(twig_array_merge($context, ["title" => "Iberostar Selection Royal El Mansour", "image" => "/Elmansour.jpg"]));
        // line 18
        echo "        </div> <div class=\"row\">
            ";
        // line 19
        $this->loadTemplate("inc/card.html.twig", "navigation_contrller/index.html.twig", 19)->display(twig_array_merge($context, ["title" => "Cinéma pathé", "image" => "/Pathé_Logo.svg.png"]));
        // line 20
        echo "        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "navigation_contrller/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 20,  112 => 19,  109 => 18,  107 => 17,  104 => 16,  102 => 15,  98 => 13,  96 => 12,  88 => 8,  78 => 7,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}HolidayHiatus{% endblock %}



{% block body %}
    <center><img src=\"{{ asset('logo.png') }}\"></center>
    <div class=\"container\" style=\"margin-top: 15px; \" >

        <div class=\"row\">
    {%  include('inc/card.html.twig')with {'title': 'El Theatro Studio','image': '/El-Teatro-30-ans-déjà.jpg'} %}
    </div>
        <div class=\"row\">
            {%  include('inc/card.html.twig')with {'title': 'Cinéma ABC' , 'image': '/elharba.jpg'} %}
        </div> <div class=\"row\">
            {%  include('inc/card.html.twig')with {'title': 'Iberostar Selection Royal El Mansour' ,'image': '/Elmansour.jpg'} %}
        </div> <div class=\"row\">
            {%  include('inc/card.html.twig')with {'title': 'Cinéma pathé','image': '/Pathé_Logo.svg.png'} %}
        </div>
    </div>
{% endblock %}
", "navigation_contrller/index.html.twig", "C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\templates\\navigation_contrller\\index.html.twig");
    }
}
