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

/* base.html.twig */
class __TwigTemplate_d81d5ec5f298644c4e5676bd644c848d762a40c2e4e3b7ed0798ad634b3257a2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "
<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700\">"), "html", null, true);
        echo "  <!-- Google web font \"Open Sans\" -->
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("font-awesome-4.7.0/css/font-awesome.min.css"), "html", null, true);
        echo "\">                <!-- Font Awesome -->
    <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\">                                      <!-- Bootstrap style -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("slick/slick.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("slick/slick-theme.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/datepicker.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/tooplate-style.css"), "html", null, true);
        echo "\">

    ";
        // line 17
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 18
        echo "
</head>
<body>

";
        // line 22
        $this->displayBlock('body', $context, $blocks);
        // line 23
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery-1.11.3.min.js"), "html", null, true);
        echo "\"></script>             <!-- jQuery (https://jquery.com/download/) -->
<script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/popper.min.js"), "html", null, true);
        echo "\"></script>                    <!-- https://popper.js.org/ -->
<script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>                 <!-- https://getbootstrap.com/ -->
<script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/datepicker.min.js"), "html", null, true);
        echo "\"></script>                <!-- https://github.com/qodesmith/datepicker -->
<script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery.singlePageNav.min.js"), "html", null, true);
        echo "\"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
<script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("slick/slick.min.js"), "html", null, true);
        echo "\"></script>
<script>

    /* Google map
    ------------------------------------------------*/
    var map = '';
    var center;

    function initialize() {
        var mapOptions = {
            zoom: 16,
            center: new google.maps.LatLng(13.7567928,100.5653741),
            scrollwheel: false
        };

        map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

        google.maps.event.addDomListener(map, 'idle', function() {
            calculateCenter();
        });

        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(center);
        });
    }

    function calculateCenter() {
        center = map.getCenter();
    }

    function loadGoogleMap(){
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
        document.body.appendChild(script);
    }

    function setCarousel() {

        if (\$('.tm-article-carousel').hasClass('slick-initialized')) {
            \$('.tm-article-carousel').slick('destroy');
        }

        if(\$(window).width() < 438){
            // Slick carousel
            \$('.tm-article-carousel').slick({
                infinite: false,
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        }
        else {
            \$('.tm-article-carousel').slick({
                infinite: false,
                dots: true,
                slidesToShow: 2,
                slidesToScroll: 1
            });
        }
    }

    function setPageNav(){
        if(\$(window).width() > 991) {
            \$('#tm-top-bar').singlePageNav({
                currentClass:'active',
                offset: 79
            });
        }
        else {
            \$('#tm-top-bar').singlePageNav({
                currentClass:'active',
                offset: 65
            });
        }
    }

    function togglePlayPause() {
        vid = \$('.tmVideo').get(0);

        if(vid.paused) {
            vid.play();
            \$('.tm-btn-play').hide();
            \$('.tm-btn-pause').show();
        }
        else {
            vid.pause();
            \$('.tm-btn-play').show();
            \$('.tm-btn-pause').hide();
        }
    }

    \$(document).ready(function(){

        \$(window).on(\"scroll\", function() {
            if(\$(window).scrollTop() > 100) {
                \$(\".tm-top-bar\").addClass(\"active\");
            } else {
                //remove the background property so it comes transparent again (defined in your css)
                \$(\".tm-top-bar\").removeClass(\"active\");
            }
        });

        // Google Map
        loadGoogleMap();

        // Date Picker
        const pickerCheckIn = datepicker('#inputCheckIn');
        const pickerCheckOut = datepicker('#inputCheckOut');

        // Slick carousel
        setCarousel();
        setPageNav();

        \$(window).resize(function() {
            setCarousel();
            setPageNav();
        });

        // Close navbar after clicked
        \$('.nav-link').click(function(){
            \$('#mainNav').removeClass('show');
        });

        // Control video
        \$('.tm-btn-play').click(function() {
            togglePlayPause();
        });

        \$('.tm-btn-pause').click(function() {
            togglePlayPause();
        });

        // Update the current year in copyright
        \$('.tm-current-year').text(new Date().getFullYear());
    });

</script>
";
        // line 166
        $this->displayBlock('javascripts', $context, $blocks);
        // line 167
        echo "</body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 8
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 17
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 22
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        echo " ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 166
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  330 => 166,  311 => 22,  293 => 17,  274 => 8,  263 => 167,  261 => 166,  120 => 28,  116 => 27,  112 => 26,  108 => 25,  104 => 24,  99 => 23,  97 => 22,  91 => 18,  89 => 17,  84 => 15,  80 => 14,  76 => 13,  72 => 12,  68 => 11,  64 => 10,  60 => 9,  56 => 8,  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>{% block title %}Welcome!{% endblock %}</title>
    <link rel=\"stylesheet\" href=\"{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700\">') }}  <!-- Google web font \"Open Sans\" -->
    <link rel=\"stylesheet\" href=\"{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}\">                <!-- Font Awesome -->
    <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap.min.css') }}\">                                      <!-- Bootstrap style -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset('slick/slick.css') }}\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset('slick/slick-theme.css') }}\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset('css/datepicker.css') }}\"/>
    <link rel=\"stylesheet\" href=\"{{ asset('css/tooplate-style.css') }}\">

    {% block stylesheets %}{% endblock %}

</head>
<body>

{% block body %} {% endblock %}
<script src=\"{{ asset('js/jquery-1.11.3.min.js') }}\"></script>             <!-- jQuery (https://jquery.com/download/) -->
<script src=\"{{ asset('js/popper.min.js') }}\"></script>                    <!-- https://popper.js.org/ -->
<script src=\"{{ asset('js/bootstrap.min.js') }}\"></script>                 <!-- https://getbootstrap.com/ -->
<script src=\"{{ asset('js/datepicker.min.js') }}\"></script>                <!-- https://github.com/qodesmith/datepicker -->
<script src=\"{{ asset('js/jquery.singlePageNav.min.js') }}\"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
<script src=\"{{ asset('slick/slick.min.js') }}\"></script>
<script>

    /* Google map
    ------------------------------------------------*/
    var map = '';
    var center;

    function initialize() {
        var mapOptions = {
            zoom: 16,
            center: new google.maps.LatLng(13.7567928,100.5653741),
            scrollwheel: false
        };

        map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

        google.maps.event.addDomListener(map, 'idle', function() {
            calculateCenter();
        });

        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(center);
        });
    }

    function calculateCenter() {
        center = map.getCenter();
    }

    function loadGoogleMap(){
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
        document.body.appendChild(script);
    }

    function setCarousel() {

        if (\$('.tm-article-carousel').hasClass('slick-initialized')) {
            \$('.tm-article-carousel').slick('destroy');
        }

        if(\$(window).width() < 438){
            // Slick carousel
            \$('.tm-article-carousel').slick({
                infinite: false,
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        }
        else {
            \$('.tm-article-carousel').slick({
                infinite: false,
                dots: true,
                slidesToShow: 2,
                slidesToScroll: 1
            });
        }
    }

    function setPageNav(){
        if(\$(window).width() > 991) {
            \$('#tm-top-bar').singlePageNav({
                currentClass:'active',
                offset: 79
            });
        }
        else {
            \$('#tm-top-bar').singlePageNav({
                currentClass:'active',
                offset: 65
            });
        }
    }

    function togglePlayPause() {
        vid = \$('.tmVideo').get(0);

        if(vid.paused) {
            vid.play();
            \$('.tm-btn-play').hide();
            \$('.tm-btn-pause').show();
        }
        else {
            vid.pause();
            \$('.tm-btn-play').show();
            \$('.tm-btn-pause').hide();
        }
    }

    \$(document).ready(function(){

        \$(window).on(\"scroll\", function() {
            if(\$(window).scrollTop() > 100) {
                \$(\".tm-top-bar\").addClass(\"active\");
            } else {
                //remove the background property so it comes transparent again (defined in your css)
                \$(\".tm-top-bar\").removeClass(\"active\");
            }
        });

        // Google Map
        loadGoogleMap();

        // Date Picker
        const pickerCheckIn = datepicker('#inputCheckIn');
        const pickerCheckOut = datepicker('#inputCheckOut');

        // Slick carousel
        setCarousel();
        setPageNav();

        \$(window).resize(function() {
            setCarousel();
            setPageNav();
        });

        // Close navbar after clicked
        \$('.nav-link').click(function(){
            \$('#mainNav').removeClass('show');
        });

        // Control video
        \$('.tm-btn-play').click(function() {
            togglePlayPause();
        });

        \$('.tm-btn-pause').click(function() {
            togglePlayPause();
        });

        // Update the current year in copyright
        \$('.tm-current-year').text(new Date().getFullYear());
    });

</script>
{% block javascripts %}{% endblock %}
</body>
</html>", "base.html.twig", "C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\templates\\base.html.twig");
    }
}
