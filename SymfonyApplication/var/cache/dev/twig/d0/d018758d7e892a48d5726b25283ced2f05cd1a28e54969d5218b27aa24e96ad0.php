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

/* sujet/consultersujetfront.html.twig */
class __TwigTemplate_2867a4fc9efc05950ecd0eb591110e195148241eb55355d59f60a4317d4d45ad extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/consultersujetfront.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sujet/consultersujetfront.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "sujet/consultersujetfront.html.twig", 1);
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
        $this->loadTemplate("Bootstraptemplates/navbartemplate.html.twig", "sujet/consultersujetfront.html.twig", 3)->display($context);
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
        <br>
        <br>
        <section class=\"x\">
        <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("AjouterNoteSujet", ["idsujet" => twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16), "iduser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16), "v" => 1]), "html", null, true);
        echo "\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"0\" ></i></a>
        <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("AjouterNoteSujet", ["idsujet" => twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 17, $this->source); })()), "id", [], "any", false, false, false, 17), "iduser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 17, $this->source); })()), "id", [], "any", false, false, false, 17), "v" => 2]), "html", null, true);
        echo "\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"1\" ></i></a>
        <a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("AjouterNoteSujet", ["idsujet" => twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 18, $this->source); })()), "id", [], "any", false, false, false, 18), "iduser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 18, $this->source); })()), "id", [], "any", false, false, false, 18), "v" => 3]), "html", null, true);
        echo "\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"2\" ></i></a>
        <a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("AjouterNoteSujet", ["idsujet" => twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 19, $this->source); })()), "id", [], "any", false, false, false, 19), "iduser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 19, $this->source); })()), "id", [], "any", false, false, false, 19), "v" => 4]), "html", null, true);
        echo "\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"3\" ></i></a>
        <a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("AjouterNoteSujet", ["idsujet" => twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 20, $this->source); })()), "id", [], "any", false, false, false, 20), "iduser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 20, $this->source); })()), "id", [], "any", false, false, false, 20), "v" => 5]), "html", null, true);
        echo "\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"4\" ></i></a>
        </section>
        <p class=\"vn\" >Votre Note : ";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 22, $this->source); })()), "NotePerso", [0 => (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 22, $this->source); })())], "method", false, false, false, 22), "html", null, true);
        echo "</p>
        <p class=\"nm\">Note Moyenne : ";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 23, $this->source); })()), "NoteSujetMoyenne", [], "method", false, false, false, 23), "html", null, true);
        echo "</p>

        <script
                src=\"https://code.jquery.com/jquery-3.6.0.min.js\"
                integrity=\"sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=\"
                crossorigin=\"anonymous\">
        </script>
        <script>
            \$(document).ready(function ()
            {
                \$('.fa-star').css('color','grey')
                for(u = 0; u <= ";
        // line 34
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 34, $this->source); })()), "NotePerso", [0 => (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 34, $this->source); })())], "method", false, false, false, 34) - 1), "html", null, true);
        echo "; u++)
                {
                    \$('.fa-star:eq('+u+')').css('color','gold');
                }

                \$('.fa-star').mousemove(function ()
                {
                    \$('.fa-star').css('color','grey');
                    var curr = \$(this).data('index');
                    for (i = 0 ; i <= curr; i++)
                       \$('.fa-star:eq('+i+')').css('color','gold');
                });

                \$('.fa-star').mouseleave(function ()
                    {
                        \$('.fa-star').css('color','grey')
                        for( f = 0; f <= ";
        // line 50
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 50, $this->source); })()), "NotePerso", [0 => (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 50, $this->source); })())], "method", false, false, false, 50) - 1), "html", null, true);
        echo "; f++)
                        {
                            \$('.fa-star:eq('+f+')').css('color','gold');
                        }
                    });
            });

            document.querySelectorAll('.xy').forEach(function (link)
            {
                link.addEventListener('click',onClickStar);
            })

            function onClickStar(event){
                event.preventDefault();
                const notemoyenne = document.querySelector('p.nm')
                const notep = document.querySelector('p.vn')
                axios.get(this.href).then(function (reponse) {
                    \$('.fa-star').mouseleave(function ()
                        {
                            \$('.fa-star').css('color','grey')
                            for( z = 0; z <= reponse.data.note -1; z++)
                            {
                                \$('.fa-star:eq('+z+')').css('color','gold');
                            }
                        });
                    notemoyenne.textContent = 'Note Moyenne : ' + reponse.data.moyenne;
                    notep.textContent = 'Votre Note : ' + reponse.data.note;
                    })
            }
        </script>

    </center>
    <br>
    <h3>Les Commentaires du sujet</h3>
    <table class=\"table\">
        <thead>
        </thead>
        <tbody>
        ";
        // line 88
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listc"]) || array_key_exists("listc", $context) ? $context["listc"] : (function () { throw new RuntimeError('Variable "listc" does not exist.', 88, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 89
            echo "            ";
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "Sujet", [], "any", false, false, false, 89), "id", [], "any", false, false, false, 89), twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 89, $this->source); })()), "id", [], "any", false, false, false, 89)))) {
                // line 90
                echo "                <tr>
                    <td>
                        <div style=\"color:red\">";
                // line 92
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "User", [], "any", false, false, false, 92), "mail", [], "any", false, false, false, 92), "html", null, true);
                echo " </div> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "com", [], "any", false, false, false, 92), "html", null, true);
                echo "
                    </td>
                    <td>

                        <a href=\"";
                // line 96
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("Like", ["idcom" => twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 96), "iduser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 96, $this->source); })()), "id", [], "any", false, false, false, 96)]), "html", null, true);
                echo "\" class=\"btn btn-link js-like";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 96), "html", null, true);
                echo "\">
                            ";
                // line 97
                if (twig_get_attribute($this->env, $this->source, $context["i"], "isLikedBy", [0 => (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 97, $this->source); })())], "method", false, false, false, 97)) {
                    // line 98
                    echo "                            <i class=\"fas fa-thumbs-up\" style=\"color: #ee5057\"></i>
                            ";
                } else {
                    // line 100
                    echo "                            <i class=\"far fa-thumbs-up\" style=\"color: #ee5057\"></i>
                            ";
                }
                // line 102
                echo "                            <span class=\"js-likes\" style=\"color: #ee5057\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "nbLiked", [], "method", false, false, false, 102), "html", null, true);
                echo "</span>
                        </a>

                        <a href=\"";
                // line 105
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("Dislike", ["idcom" => twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 105), "iduser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 105, $this->source); })()), "id", [], "any", false, false, false, 105)]), "html", null, true);
                echo "\" class=\"btn btn-link js-dl";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 105), "html", null, true);
                echo "\">
                            ";
                // line 106
                if (twig_get_attribute($this->env, $this->source, $context["i"], "isDisLikedBy", [0 => (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 106, $this->source); })())], "method", false, false, false, 106)) {
                    // line 107
                    echo "                            <i class=\"fas fa-thumbs-down\" style=\"color: #ee5057\"></i>
                            ";
                } else {
                    // line 109
                    echo "                            <i class=\"far fa-thumbs-down\" style=\"color: #ee5057\"></i>
                            ";
                }
                // line 111
                echo "                            <span class=\"js-dislikes\" style=\"color: #ee5057\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "nbDisliked", [], "method", false, false, false, 111), "html", null, true);
                echo "</span>
                        </a>

                        <script src=\"https://unpkg.com/axios/dist/axios.min.js\"></script>
                        <script>
                            document.querySelectorAll('a.js-like";
                // line 116
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 116), "html", null, true);
                echo "').forEach(function (link){
                                link.addEventListener('click',onClickBtnLike);
                            })

                            function onClickBtnLike(event){
                                event.preventDefault();
                                const spanLikes = this.querySelector('span.js-likes');
                                const iconeLike = this.querySelector('i');
                                const spanDis = document.querySelector('a.js-dl";
                // line 124
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 124), "html", null, true);
                echo " span.js-dislikes')
                                const iconeDis = document.querySelector('a.js-dl";
                // line 125
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 125), "html", null, true);
                echo " i')
                                axios.get(this.href).then(function (response) {
                                        spanLikes.textContent = response.data.likes;
                                        if(iconeLike.classList.contains('fas')){
                                            iconeLike.classList.replace('fas','far')
                                        }
                                        else {
                                            iconeLike.classList.replace('far','fas')
                                            if (iconeDis.classList.contains('fas'))
                                            {
                                                spanDis.textContent = response.data.dislikes
                                                iconeDis.classList.replace('fas','far')
                                            }
                                        }

                                    }
                                )
                            }

                            document.querySelectorAll('a.js-dl";
                // line 144
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 144), "html", null, true);
                echo "').forEach(function (link){
                                link.addEventListener('click',onClickBtnDislike);
                            })
                            function onClickBtnDislike(event){
                                event.preventDefault();
                                const spanDislikes = this.querySelector('span.js-dislikes');
                                const iconeDislike = this.querySelector('i');
                                const spanLi = document.querySelector('a.js-like";
                // line 151
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 151), "html", null, true);
                echo " span.js-likes')
                                const iconeLi = document.querySelector('a.js-like";
                // line 152
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 152), "html", null, true);
                echo " i')
                                axios.get(this.href).then(function (response) {
                                        spanDislikes.textContent = response.data.dislikes;
                                        if(iconeDislike.classList.contains('fas')){
                                            iconeDislike.classList.replace('fas','far')
                                        }
                                        else {
                                            iconeDislike.classList.replace('far','fas')
                                            if (iconeLi.classList.contains('fas'))
                                            {
                                                spanLi.textContent = response.data.likes
                                                iconeLi.classList.replace('fas','far')
                                            }
                                        }

                                    }
                                )
                            }
                        </script>
                    </td>
                        ";
                // line 172
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["i"], "User", [], "any", false, false, false, 172), "id", [], "any", false, false, false, 172), twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 172, $this->source); })()), "id", [], "any", false, false, false, 172)))) {
                    // line 173
                    echo "                            <td>
                            <td><form action=\" ";
                    // line 174
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("ModifierCommentaire", ["idboard" => (isset($context["board_id"]) || array_key_exists("board_id", $context) ? $context["board_id"] : (function () { throw new RuntimeError('Variable "board_id" does not exist.', 174, $this->source); })()), "id" => twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 174, $this->source); })()), "id", [], "any", false, false, false, 174), "idcom" => twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 174)]), "html", null, true);
                    echo " \"><button>Modifier</button></form></td>
                            <td><form action=\" ";
                    // line 175
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("SupprimerCommentaire", ["idboard" => (isset($context["board_id"]) || array_key_exists("board_id", $context) ? $context["board_id"] : (function () { throw new RuntimeError('Variable "board_id" does not exist.', 175, $this->source); })()), "id" => twig_get_attribute($this->env, $this->source, (isset($context["sujet"]) || array_key_exists("sujet", $context) ? $context["sujet"] : (function () { throw new RuntimeError('Variable "sujet" does not exist.', 175, $this->source); })()), "id", [], "any", false, false, false, 175), "idcom" => twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 175)]), "html", null, true);
                    echo " \"><button>Supprimer</button></form></td>
                            </td>
                        ";
                }
                // line 178
                echo "                </tr>
                ";
            }
            // line 180
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 181
        echo "        </tbody>
    </table>
    ";
        // line 183
        if ((0 === twig_compare((isset($context["e"]) || array_key_exists("e", $context) ? $context["e"] : (function () { throw new RuntimeError('Variable "e" does not exist.', 183, $this->source); })()), "1"))) {
            // line 184
            echo "        <div class=\"alert\">
            <span class=\"closebtn\"></span>
            Vous utilisez un mot indésirable, merci de le changer
        </div>
    ";
        }
        // line 189
        echo "    ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["f"]) || array_key_exists("f", $context) ? $context["f"] : (function () { throw new RuntimeError('Variable "f" does not exist.', 189, $this->source); })()), 'form_start');
        echo "
    ";
        // line 190
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["f"]) || array_key_exists("f", $context) ? $context["f"] : (function () { throw new RuntimeError('Variable "f" does not exist.', 190, $this->source); })()), 'widget');
        echo "
    ";
        // line 191
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["f"]) || array_key_exists("f", $context) ? $context["f"] : (function () { throw new RuntimeError('Variable "f" does not exist.', 191, $this->source); })()), 'form_end');
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "sujet/consultersujetfront.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  382 => 191,  378 => 190,  373 => 189,  366 => 184,  364 => 183,  360 => 181,  354 => 180,  350 => 178,  344 => 175,  340 => 174,  337 => 173,  335 => 172,  312 => 152,  308 => 151,  298 => 144,  276 => 125,  272 => 124,  261 => 116,  252 => 111,  248 => 109,  244 => 107,  242 => 106,  236 => 105,  229 => 102,  225 => 100,  221 => 98,  219 => 97,  213 => 96,  204 => 92,  200 => 90,  197 => 89,  193 => 88,  152 => 50,  133 => 34,  119 => 23,  115 => 22,  110 => 20,  106 => 19,  102 => 18,  98 => 17,  94 => 16,  87 => 12,  81 => 9,  77 => 8,  71 => 4,  68 => 3,  58 => 2,  35 => 1,);
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
        <br>
        <br>
        <section class=\"x\">
        <a href=\"{{path('AjouterNoteSujet',{idsujet:sujet.id,iduser:user.id,v:1})}}\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"0\" ></i></a>
        <a href=\"{{path('AjouterNoteSujet',{idsujet:sujet.id,iduser:user.id,v:2})}}\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"1\" ></i></a>
        <a href=\"{{path('AjouterNoteSujet',{idsujet:sujet.id,iduser:user.id,v:3})}}\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"2\" ></i></a>
        <a href=\"{{path('AjouterNoteSujet',{idsujet:sujet.id,iduser:user.id,v:4})}}\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"3\" ></i></a>
        <a href=\"{{path('AjouterNoteSujet',{idsujet:sujet.id,iduser:user.id,v:5})}}\" class=\"xy\"><i class=\"fa fa-star\"  data-index=\"4\" ></i></a>
        </section>
        <p class=\"vn\" >Votre Note : {{ sujet.NotePerso(user) }}</p>
        <p class=\"nm\">Note Moyenne : {{ sujet.NoteSujetMoyenne() }}</p>

        <script
                src=\"https://code.jquery.com/jquery-3.6.0.min.js\"
                integrity=\"sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=\"
                crossorigin=\"anonymous\">
        </script>
        <script>
            \$(document).ready(function ()
            {
                \$('.fa-star').css('color','grey')
                for(u = 0; u <= {{ sujet.NotePerso(user) -1 }}; u++)
                {
                    \$('.fa-star:eq('+u+')').css('color','gold');
                }

                \$('.fa-star').mousemove(function ()
                {
                    \$('.fa-star').css('color','grey');
                    var curr = \$(this).data('index');
                    for (i = 0 ; i <= curr; i++)
                       \$('.fa-star:eq('+i+')').css('color','gold');
                });

                \$('.fa-star').mouseleave(function ()
                    {
                        \$('.fa-star').css('color','grey')
                        for( f = 0; f <= {{ sujet.NotePerso(user) -1 }}; f++)
                        {
                            \$('.fa-star:eq('+f+')').css('color','gold');
                        }
                    });
            });

            document.querySelectorAll('.xy').forEach(function (link)
            {
                link.addEventListener('click',onClickStar);
            })

            function onClickStar(event){
                event.preventDefault();
                const notemoyenne = document.querySelector('p.nm')
                const notep = document.querySelector('p.vn')
                axios.get(this.href).then(function (reponse) {
                    \$('.fa-star').mouseleave(function ()
                        {
                            \$('.fa-star').css('color','grey')
                            for( z = 0; z <= reponse.data.note -1; z++)
                            {
                                \$('.fa-star:eq('+z+')').css('color','gold');
                            }
                        });
                    notemoyenne.textContent = 'Note Moyenne : ' + reponse.data.moyenne;
                    notep.textContent = 'Votre Note : ' + reponse.data.note;
                    })
            }
        </script>

    </center>
    <br>
    <h3>Les Commentaires du sujet</h3>
    <table class=\"table\">
        <thead>
        </thead>
        <tbody>
        {% for i in listc %}
            {% if i.Sujet.id == sujet.id %}
                <tr>
                    <td>
                        <div style=\"color:red\">{{ i.User.mail }} </div> {{ i.com }}
                    </td>
                    <td>

                        <a href=\"{{path('Like',{idcom:i.id,iduser:user.id})}}\" class=\"btn btn-link js-like{{ i.id }}\">
                            {% if i.isLikedBy(user) %}
                            <i class=\"fas fa-thumbs-up\" style=\"color: #ee5057\"></i>
                            {% else %}
                            <i class=\"far fa-thumbs-up\" style=\"color: #ee5057\"></i>
                            {% endif %}
                            <span class=\"js-likes\" style=\"color: #ee5057\">{{ i.nbLiked() }}</span>
                        </a>

                        <a href=\"{{path('Dislike',{idcom:i.id,iduser:user.id})}}\" class=\"btn btn-link js-dl{{ i.id }}\">
                            {% if i.isDisLikedBy(user) %}
                            <i class=\"fas fa-thumbs-down\" style=\"color: #ee5057\"></i>
                            {% else %}
                            <i class=\"far fa-thumbs-down\" style=\"color: #ee5057\"></i>
                            {% endif %}
                            <span class=\"js-dislikes\" style=\"color: #ee5057\">{{ i.nbDisliked() }}</span>
                        </a>

                        <script src=\"https://unpkg.com/axios/dist/axios.min.js\"></script>
                        <script>
                            document.querySelectorAll('a.js-like{{ i.id }}').forEach(function (link){
                                link.addEventListener('click',onClickBtnLike);
                            })

                            function onClickBtnLike(event){
                                event.preventDefault();
                                const spanLikes = this.querySelector('span.js-likes');
                                const iconeLike = this.querySelector('i');
                                const spanDis = document.querySelector('a.js-dl{{ i.id}} span.js-dislikes')
                                const iconeDis = document.querySelector('a.js-dl{{ i.id}} i')
                                axios.get(this.href).then(function (response) {
                                        spanLikes.textContent = response.data.likes;
                                        if(iconeLike.classList.contains('fas')){
                                            iconeLike.classList.replace('fas','far')
                                        }
                                        else {
                                            iconeLike.classList.replace('far','fas')
                                            if (iconeDis.classList.contains('fas'))
                                            {
                                                spanDis.textContent = response.data.dislikes
                                                iconeDis.classList.replace('fas','far')
                                            }
                                        }

                                    }
                                )
                            }

                            document.querySelectorAll('a.js-dl{{ i.id }}').forEach(function (link){
                                link.addEventListener('click',onClickBtnDislike);
                            })
                            function onClickBtnDislike(event){
                                event.preventDefault();
                                const spanDislikes = this.querySelector('span.js-dislikes');
                                const iconeDislike = this.querySelector('i');
                                const spanLi = document.querySelector('a.js-like{{ i.id}} span.js-likes')
                                const iconeLi = document.querySelector('a.js-like{{ i.id}} i')
                                axios.get(this.href).then(function (response) {
                                        spanDislikes.textContent = response.data.dislikes;
                                        if(iconeDislike.classList.contains('fas')){
                                            iconeDislike.classList.replace('fas','far')
                                        }
                                        else {
                                            iconeDislike.classList.replace('far','fas')
                                            if (iconeLi.classList.contains('fas'))
                                            {
                                                spanLi.textContent = response.data.likes
                                                iconeLi.classList.replace('fas','far')
                                            }
                                        }

                                    }
                                )
                            }
                        </script>
                    </td>
                        {% if i.User.id == user.id %}
                            <td>
                            <td><form action=\" {{path('ModifierCommentaire',{idboard:board_id,id:sujet.id,idcom:i.id})}} \"><button>Modifier</button></form></td>
                            <td><form action=\" {{path('SupprimerCommentaire',{idboard:board_id,id:sujet.id,idcom:i.id})}} \"><button>Supprimer</button></form></td>
                            </td>
                        {% endif %}
                </tr>
                {% endif %}
            {% endfor %}
        </tbody>
    </table>
    {% if e == '1' %}
        <div class=\"alert\">
            <span class=\"closebtn\"></span>
            Vous utilisez un mot indésirable, merci de le changer
        </div>
    {% endif %}
    {{ form_start(f) }}
    {{ form_widget(f) }}
    {{ form_end(f) }}

{% endblock %}", "sujet/consultersujetfront.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\sujet\\consultersujetfront.html.twig");
    }
}
