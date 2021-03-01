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

/* Bootstraptemplates/rendez_vous.html.twig */
class __TwigTemplate_d615bbe4f3f4633e03bc30f4b62676b70909892fed2c11961df83d678c3475f1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Bootstraptemplates/rendez_vous.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Bootstraptemplates/rendez_vous.html.twig"));

        // line 1
        echo "<div class=\"tm-section tm-bg-img\" id=\"tm-section-1\">
    <div class=\"tm-bg-white ie-container-width-fix-2\">
        <div class=\"container ie-h-align-center-fix\">
            <div class=\"row\">
                <div class=\"col-xs-12 ml-auto mr-auto ie-container-width-fix\">
                    <form action=\"index.html\" method=\"get\" class=\"tm-search-form tm-section-pad-2\">
                        <div class=\"form-row tm-search-form-row\">
                            <div class=\"form-group tm-form-element tm-form-element-100\">
                                <i class=\"fa fa-map-marker fa-2x tm-form-element-icon\"></i>
                                <input name=\"city\" type=\"text\" class=\"form-control\" id=\"inputCity\" placeholder=\"Type your destination...\">
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-50\">
                                <i class=\"fa fa-calendar fa-2x tm-form-element-icon\"></i>
                                <input name=\"check-in\" type=\"text\" class=\"form-control\" id=\"inputCheckIn\" placeholder=\"Check In\">
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-50\">
                                <i class=\"fa fa-calendar fa-2x tm-form-element-icon\"></i>
                                <input name=\"check-out\" type=\"text\" class=\"form-control\" id=\"inputCheckOut\" placeholder=\"Check Out\">
                            </div>
                        </div>
                        <div class=\"form-row tm-search-form-row\">
                            <div class=\"form-group tm-form-element tm-form-element-2\">
                                <select name=\"adult\" class=\"form-control tm-select\" id=\"adult\">
                                    <option value=\"\">Adult</option>
                                    <option value=\"1\">1</option>
                                    <option value=\"2\">2</option>
                                    <option value=\"3\">3</option>
                                    <option value=\"4\">4</option>
                                    <option value=\"5\">5</option>
                                    <option value=\"6\">6</option>
                                    <option value=\"7\">7</option>
                                    <option value=\"8\">8</option>
                                    <option value=\"9\">9</option>
                                    <option value=\"10\">10</option>
                                </select>
                                <i class=\"fa fa-2x fa-user tm-form-element-icon\"></i>
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-2\">
                                <select name=\"children\" class=\"form-control tm-select\" id=\"children\">
                                    <option value=\"\">Children</option>
                                    <option value=\"0\">0</option>
                                    <option value=\"1\">1</option>
                                    <option value=\"2\">2</option>
                                    <option value=\"3\">3</option>
                                    <option value=\"4\">4</option>
                                    <option value=\"5\">5</option>
                                    <option value=\"6\">6</option>
                                    <option value=\"7\">7</option>
                                    <option value=\"8\">8</option>
                                    <option value=\"9\">9</option>
                                    <option value=\"10\">10</option>
                                </select>
                                <i class=\"fa fa-user tm-form-element-icon tm-form-element-icon-small\"></i>
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-2\">
                                <select name=\"room\" class=\"form-control tm-select\" id=\"room\">
                                    <option value=\"\">Room</option>
                                    <option value=\"1\">1</option>
                                    <option value=\"2\">2</option>
                                    <option value=\"3\">3</option>
                                    <option value=\"4\">4</option>
                                    <option value=\"5\">5</option>
                                    <option value=\"6\">6</option>
                                    <option value=\"7\">7</option>
                                    <option value=\"8\">8</option>
                                    <option value=\"9\">9</option>
                                    <option value=\"10\">10</option>
                                </select>
                                <i class=\"fa fa-2x fa-bed tm-form-element-icon\"></i>
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-2\">
                                <button type=\"submit\" class=\"btn btn-primary tm-btn-search\">Check Availability</button>
                            </div>
                        </div>
                        <div class=\"form-row clearfix pl-2 pr-2 tm-fx-col-xs\">
                            <p class=\"tm-margin-b-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href=\"#\" class=\"ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary\">Need Help?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "Bootstraptemplates/rendez_vous.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"tm-section tm-bg-img\" id=\"tm-section-1\">
    <div class=\"tm-bg-white ie-container-width-fix-2\">
        <div class=\"container ie-h-align-center-fix\">
            <div class=\"row\">
                <div class=\"col-xs-12 ml-auto mr-auto ie-container-width-fix\">
                    <form action=\"index.html\" method=\"get\" class=\"tm-search-form tm-section-pad-2\">
                        <div class=\"form-row tm-search-form-row\">
                            <div class=\"form-group tm-form-element tm-form-element-100\">
                                <i class=\"fa fa-map-marker fa-2x tm-form-element-icon\"></i>
                                <input name=\"city\" type=\"text\" class=\"form-control\" id=\"inputCity\" placeholder=\"Type your destination...\">
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-50\">
                                <i class=\"fa fa-calendar fa-2x tm-form-element-icon\"></i>
                                <input name=\"check-in\" type=\"text\" class=\"form-control\" id=\"inputCheckIn\" placeholder=\"Check In\">
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-50\">
                                <i class=\"fa fa-calendar fa-2x tm-form-element-icon\"></i>
                                <input name=\"check-out\" type=\"text\" class=\"form-control\" id=\"inputCheckOut\" placeholder=\"Check Out\">
                            </div>
                        </div>
                        <div class=\"form-row tm-search-form-row\">
                            <div class=\"form-group tm-form-element tm-form-element-2\">
                                <select name=\"adult\" class=\"form-control tm-select\" id=\"adult\">
                                    <option value=\"\">Adult</option>
                                    <option value=\"1\">1</option>
                                    <option value=\"2\">2</option>
                                    <option value=\"3\">3</option>
                                    <option value=\"4\">4</option>
                                    <option value=\"5\">5</option>
                                    <option value=\"6\">6</option>
                                    <option value=\"7\">7</option>
                                    <option value=\"8\">8</option>
                                    <option value=\"9\">9</option>
                                    <option value=\"10\">10</option>
                                </select>
                                <i class=\"fa fa-2x fa-user tm-form-element-icon\"></i>
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-2\">
                                <select name=\"children\" class=\"form-control tm-select\" id=\"children\">
                                    <option value=\"\">Children</option>
                                    <option value=\"0\">0</option>
                                    <option value=\"1\">1</option>
                                    <option value=\"2\">2</option>
                                    <option value=\"3\">3</option>
                                    <option value=\"4\">4</option>
                                    <option value=\"5\">5</option>
                                    <option value=\"6\">6</option>
                                    <option value=\"7\">7</option>
                                    <option value=\"8\">8</option>
                                    <option value=\"9\">9</option>
                                    <option value=\"10\">10</option>
                                </select>
                                <i class=\"fa fa-user tm-form-element-icon tm-form-element-icon-small\"></i>
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-2\">
                                <select name=\"room\" class=\"form-control tm-select\" id=\"room\">
                                    <option value=\"\">Room</option>
                                    <option value=\"1\">1</option>
                                    <option value=\"2\">2</option>
                                    <option value=\"3\">3</option>
                                    <option value=\"4\">4</option>
                                    <option value=\"5\">5</option>
                                    <option value=\"6\">6</option>
                                    <option value=\"7\">7</option>
                                    <option value=\"8\">8</option>
                                    <option value=\"9\">9</option>
                                    <option value=\"10\">10</option>
                                </select>
                                <i class=\"fa fa-2x fa-bed tm-form-element-icon\"></i>
                            </div>
                            <div class=\"form-group tm-form-element tm-form-element-2\">
                                <button type=\"submit\" class=\"btn btn-primary tm-btn-search\">Check Availability</button>
                            </div>
                        </div>
                        <div class=\"form-row clearfix pl-2 pr-2 tm-fx-col-xs\">
                            <p class=\"tm-margin-b-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href=\"#\" class=\"ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary\">Need Help?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>", "Bootstraptemplates/rendez_vous.html.twig", "D:\\Projet3eme\\SymfonyApplication\\templates\\Bootstraptemplates\\rendez_vous.html.twig");
    }
}
