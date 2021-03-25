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

/* main.html.twig */
class __TwigTemplate_28a551b6e74f9362b7e4f7fe75ab7b92aab987f790f2859e782d2b8a0ba242cd extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>Gestion Des Board | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <!-- Bootstrap 3.3.7 -->
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bower_components/bootstrap/dist/css/bootstrap.min.css"), "html", null, true);
        echo "\">
    <!-- Font Awesome -->
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bower_components/font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\">
    <!-- Ionicons -->
    <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bower_components/Ionicons/css/ionicons.min.css"), "html", null, true);
        echo "\">
    <!-- jvectormap -->
    <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bower_components/jvectormap/jquery-jvectormap.css"), "html", null, true);
        echo "\">
    <!-- Theme style -->
    <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("dist/css/AdminLTE.min.css"), "html", null, true);
        echo "\">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("dist/css/skins/_all-skins.min.css"), "html", null, true);
        echo "\">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("https://oss.maxcdn.com/respond/1.4.2/respond.min.js"), "html", null, true);
        echo "\"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel=\"stylesheet\"
          href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"), "html", null, true);
        echo "\">
</head>
<body class=\"hold-transition skin-blue sidebar-mini\">
<div class=\"wrapper\">

    <header class=\"main-header\">

        <!-- Logo -->
        <a href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("index2.html"), "html", null, true);
        echo "\" class=\"logo\" style=\"background-color: #c60000\">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class=\"logo-mini\"><b>H</b>H</span>
            <!-- logo for regular state and mobile devices -->
            <span><b >Holiday Hiatus</b></span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class=\"navbar navbar-static-top\" style=\"background-color: #c60000; height:60px\">
            <!-- Sidebar toggle button-->
            <a href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("#"), "html", null, true);
        echo "\" class=\"sidebar-toggle\" data-toggle=\"push-menu\" role=\"button\">
                <span class=\"sr-only\">Toggle navigation</span>
            </a><img src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("HH.png"), "html", null, true);
        echo "\" style=\"width:230px;height: 60px; margin-left: 300px \">
            <!-- Navbar Right Menu -->
            
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class=\"main-sidebar\" style=\"background-color:#c60000\">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class=\"sidebar\">
            <!-- Sidebar user panel -->
            <div class=\"user-panel\" >


            </div>
            <div class=\"user-panel\">
                <div class=\"pull-left image\">
                    <img src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("amine.jpg"), "html", null, true);
        echo "\" class=\"img-circle\" alt=\"User Image\">
                </div>
                <div class=\"pull-left info\">
                    <p>Amine Saidi</p>
                    <a href=\"#\"><i class=\"fa fa-circle text-success\"></i> Online</a>
                </div>
            </div>

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class=\"sidebar-menu\" data-widget=\"tree\" style=\"background-color: white\">
                <li class=\"active treeview menu-open\"style=\"background-color: white\">
                    <a href=\"#\" style=\"background-color: white\" >
                        <i  style=\"background-color: white\"></i> <span style=\"color: red\">Gestion Board</span>
                        <span class=\"pull-right-container\" style=\"background-color: white\">
              <i class=\"fa fa-angle-left pull-right \"style=\"color: red\"></i>
            </span>
                    </a>
                    <ul class=\"treeview-menu\">
                        <li ><a href=\"#\" style=\"background-color: #ffa9a9;color: red\" ><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion Des Sujet</a></li>
                        <li  style=\"background-color: white;\" ><a href=\"#\" style=\"color: red\"><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion de Boutique</a></li>
                        <li  style=\"background-color: white;\" ><a href=\"#\" style=\"color: red\"><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion de Moderateur</a></li>

                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->

    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class=\"content-wrapper\">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class=\"content\">
            ";
        // line 106
        $this->displayBlock('content', $context, $blocks);
        // line 107
        echo "        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class=\"main-footer\">
        <div class=\"pull-right hidden-xs\">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href=\"https://adminlte.io\">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class=\"control-sidebar control-sidebar-dark\">
        <!-- Create the tabs -->
        <ul class=\"nav nav-tabs nav-justified control-sidebar-tabs\">
            <li><a href=\"#control-sidebar-home-tab\" data-toggle=\"tab\"><i class=\"fa fa-home\"></i></a></li>
            <li><a href=\"#control-sidebar-settings-tab\" data-toggle=\"tab\"><i class=\"fa fa-gears\"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class=\"tab-content\">
            <!-- Home tab content -->
            <div class=\"tab-pane\" id=\"control-sidebar-home-tab\">
                <h3 class=\"control-sidebar-heading\">Recent Activity</h3>
                <ul class=\"control-sidebar-menu\">
                    <li>
                        <a href=\"javascript:void(0)\">
                            <i class=\"menu-icon fa fa-birthday-cake bg-red\"></i>

                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <i class=\"menu-icon fa fa-user bg-yellow\"></i>

                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <i class=\"menu-icon fa fa-envelope-o bg-light-blue\"></i>

                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <i class=\"menu-icon fa fa-file-code-o bg-green\"></i>

                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class=\"control-sidebar-heading\">Tasks Progress</h3>
                <ul class=\"control-sidebar-menu\">
                    <li>
                        <a href=\"javascript:void(0)\">
                            <h4 class=\"control-sidebar-subheading\">
                                Custom Template Design
                                <span class=\"label label-danger pull-right\">70%</span>
                            </h4>

                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-danger\" style=\"width: 70%\"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <h4 class=\"control-sidebar-subheading\">
                                Update Resume
                                <span class=\"label label-success pull-right\">95%</span>
                            </h4>

                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-success\" style=\"width: 95%\"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <h4 class=\"control-sidebar-subheading\">
                                Laravel Integration
                                <span class=\"label label-warning pull-right\">50%</span>
                            </h4>

                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-warning\" style=\"width: 50%\"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <h4 class=\"control-sidebar-subheading\">
                                Back End Framework
                                <span class=\"label label-primary pull-right\">68%</span>
                            </h4>

                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-primary\" style=\"width: 68%\"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class=\"tab-pane\" id=\"control-sidebar-settings-tab\">
                <form method=\"post\">
                    <h3 class=\"control-sidebar-heading\">General Settings</h3>

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Report panel usage
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Allow mail redirect
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Expose author name in posts
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class=\"control-sidebar-heading\">Chat Settings</h3>

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Show me as online
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Turn off notifications
                            <input type=\"checkbox\" class=\"pull-right\">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Delete chat history
                            <a href=\"javascript:void(0)\" class=\"text-red pull-right\"><i class=\"fa fa-trash-o\"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class=\"control-sidebar-bg\"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src=\"bower_components/jquery/dist/jquery.min.js\"></script>
<!-- Bootstrap 3.3.7 -->
<script src=\"bower_components/bootstrap/dist/js/bootstrap.min.js\"></script>
<!-- FastClick -->
<script src=\"bower_components/fastclick/lib/fastclick.js\"></script>
<!-- AdminLTE App -->
<script src=\"dist/js/adminlte.min.js\"></script>
<!-- Sparkline -->
<script src=\"bower_components/jquery-sparkline/dist/jquery.sparkline.min.js\"></script>
<!-- jvectormap  -->
<script src=\"plugins/jvectormap/jquery-jvectormap-1.2.2.min.js\"></script>
<script src=\"plugins/jvectormap/jquery-jvectormap-world-mill-en.js\"></script>
<!-- SlimScroll -->
<script src=\"bower_components/jquery-slimscroll/jquery.slimscroll.min.js\"></script>
<!-- ChartJS -->
<script src=\"bower_components/chart.js/Chart.js\"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=\"dist/js/pages/dashboard2.js\"></script>
<!-- AdminLTE for demo purposes -->
<script src=\"dist/js/demo.js\"></script>
</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 106
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  433 => 106,  192 => 107,  190 => 106,  150 => 69,  131 => 53,  126 => 51,  112 => 40,  101 => 32,  93 => 27,  89 => 26,  81 => 21,  75 => 18,  70 => 16,  65 => 14,  60 => 12,  55 => 10,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>Gestion Des Board | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <!-- Bootstrap 3.3.7 -->
    <link rel=\"stylesheet\" href=\"{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}\">
    <!-- Font Awesome -->
    <link rel=\"stylesheet\" href=\"{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}\">
    <!-- Ionicons -->
    <link rel=\"stylesheet\" href=\"{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}\">
    <!-- jvectormap -->
    <link rel=\"stylesheet\" href=\"{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}\">
    <!-- Theme style -->
    <link rel=\"stylesheet\" href=\"{{ asset('dist/css/AdminLTE.min.css') }}\">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel=\"stylesheet\" href=\"{{ asset('dist/css/skins/_all-skins.min.css') }}\">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"{{ asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}\"></script>
    <script src=\"{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}\"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel=\"stylesheet\"
          href=\"{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') }}\">
</head>
<body class=\"hold-transition skin-blue sidebar-mini\">
<div class=\"wrapper\">

    <header class=\"main-header\">

        <!-- Logo -->
        <a href=\"{{ asset('index2.html') }}\" class=\"logo\" style=\"background-color: #c60000\">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class=\"logo-mini\"><b>H</b>H</span>
            <!-- logo for regular state and mobile devices -->
            <span><b >Holiday Hiatus</b></span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class=\"navbar navbar-static-top\" style=\"background-color: #c60000; height:60px\">
            <!-- Sidebar toggle button-->
            <a href=\"{{ asset('#') }}\" class=\"sidebar-toggle\" data-toggle=\"push-menu\" role=\"button\">
                <span class=\"sr-only\">Toggle navigation</span>
            </a><img src=\"{{ asset('HH.png') }}\" style=\"width:230px;height: 60px; margin-left: 300px \">
            <!-- Navbar Right Menu -->
            
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class=\"main-sidebar\" style=\"background-color:#c60000\">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class=\"sidebar\">
            <!-- Sidebar user panel -->
            <div class=\"user-panel\" >


            </div>
            <div class=\"user-panel\">
                <div class=\"pull-left image\">
                    <img src=\"{{ asset('amine.jpg') }}\" class=\"img-circle\" alt=\"User Image\">
                </div>
                <div class=\"pull-left info\">
                    <p>Amine Saidi</p>
                    <a href=\"#\"><i class=\"fa fa-circle text-success\"></i> Online</a>
                </div>
            </div>

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class=\"sidebar-menu\" data-widget=\"tree\" style=\"background-color: white\">
                <li class=\"active treeview menu-open\"style=\"background-color: white\">
                    <a href=\"#\" style=\"background-color: white\" >
                        <i  style=\"background-color: white\"></i> <span style=\"color: red\">Gestion Board</span>
                        <span class=\"pull-right-container\" style=\"background-color: white\">
              <i class=\"fa fa-angle-left pull-right \"style=\"color: red\"></i>
            </span>
                    </a>
                    <ul class=\"treeview-menu\">
                        <li ><a href=\"#\" style=\"background-color: #ffa9a9;color: red\" ><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion Des Sujet</a></li>
                        <li  style=\"background-color: white;\" ><a href=\"#\" style=\"color: red\"><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion de Boutique</a></li>
                        <li  style=\"background-color: white;\" ><a href=\"#\" style=\"color: red\"><i class=\"fa fa-circle-o\" style=\"color: red\"></i> Gestion de Moderateur</a></li>

                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->

    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class=\"content-wrapper\">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class=\"content\">
            {% block content %}{% endblock %}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class=\"main-footer\">
        <div class=\"pull-right hidden-xs\">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href=\"https://adminlte.io\">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class=\"control-sidebar control-sidebar-dark\">
        <!-- Create the tabs -->
        <ul class=\"nav nav-tabs nav-justified control-sidebar-tabs\">
            <li><a href=\"#control-sidebar-home-tab\" data-toggle=\"tab\"><i class=\"fa fa-home\"></i></a></li>
            <li><a href=\"#control-sidebar-settings-tab\" data-toggle=\"tab\"><i class=\"fa fa-gears\"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class=\"tab-content\">
            <!-- Home tab content -->
            <div class=\"tab-pane\" id=\"control-sidebar-home-tab\">
                <h3 class=\"control-sidebar-heading\">Recent Activity</h3>
                <ul class=\"control-sidebar-menu\">
                    <li>
                        <a href=\"javascript:void(0)\">
                            <i class=\"menu-icon fa fa-birthday-cake bg-red\"></i>

                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <i class=\"menu-icon fa fa-user bg-yellow\"></i>

                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <i class=\"menu-icon fa fa-envelope-o bg-light-blue\"></i>

                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <i class=\"menu-icon fa fa-file-code-o bg-green\"></i>

                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class=\"control-sidebar-heading\">Tasks Progress</h3>
                <ul class=\"control-sidebar-menu\">
                    <li>
                        <a href=\"javascript:void(0)\">
                            <h4 class=\"control-sidebar-subheading\">
                                Custom Template Design
                                <span class=\"label label-danger pull-right\">70%</span>
                            </h4>

                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-danger\" style=\"width: 70%\"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <h4 class=\"control-sidebar-subheading\">
                                Update Resume
                                <span class=\"label label-success pull-right\">95%</span>
                            </h4>

                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-success\" style=\"width: 95%\"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <h4 class=\"control-sidebar-subheading\">
                                Laravel Integration
                                <span class=\"label label-warning pull-right\">50%</span>
                            </h4>

                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-warning\" style=\"width: 50%\"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0)\">
                            <h4 class=\"control-sidebar-subheading\">
                                Back End Framework
                                <span class=\"label label-primary pull-right\">68%</span>
                            </h4>

                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-primary\" style=\"width: 68%\"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class=\"tab-pane\" id=\"control-sidebar-settings-tab\">
                <form method=\"post\">
                    <h3 class=\"control-sidebar-heading\">General Settings</h3>

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Report panel usage
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Allow mail redirect
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Expose author name in posts
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class=\"control-sidebar-heading\">Chat Settings</h3>

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Show me as online
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Turn off notifications
                            <input type=\"checkbox\" class=\"pull-right\">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Delete chat history
                            <a href=\"javascript:void(0)\" class=\"text-red pull-right\"><i class=\"fa fa-trash-o\"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class=\"control-sidebar-bg\"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src=\"bower_components/jquery/dist/jquery.min.js\"></script>
<!-- Bootstrap 3.3.7 -->
<script src=\"bower_components/bootstrap/dist/js/bootstrap.min.js\"></script>
<!-- FastClick -->
<script src=\"bower_components/fastclick/lib/fastclick.js\"></script>
<!-- AdminLTE App -->
<script src=\"dist/js/adminlte.min.js\"></script>
<!-- Sparkline -->
<script src=\"bower_components/jquery-sparkline/dist/jquery.sparkline.min.js\"></script>
<!-- jvectormap  -->
<script src=\"plugins/jvectormap/jquery-jvectormap-1.2.2.min.js\"></script>
<script src=\"plugins/jvectormap/jquery-jvectormap-world-mill-en.js\"></script>
<!-- SlimScroll -->
<script src=\"bower_components/jquery-slimscroll/jquery.slimscroll.min.js\"></script>
<!-- ChartJS -->
<script src=\"bower_components/chart.js/Chart.js\"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=\"dist/js/pages/dashboard2.js\"></script>
<!-- AdminLTE for demo purposes -->
<script src=\"dist/js/demo.js\"></script>
</body>
</html>
", "main.html.twig", "C:\\Users\\ASUS\\Desktop\\Projet3eme\\SymfonyApplication\\templates\\main.html.twig");
    }
}
