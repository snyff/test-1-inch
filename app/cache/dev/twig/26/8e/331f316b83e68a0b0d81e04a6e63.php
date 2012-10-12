<?php

/* ::base_admin.html.twig */
class __TwigTemplate_268e331f316b83e68a0b0d81e04a6e63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'left_menu' => array($this, 'block_left_menu'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
            'inline' => array($this, 'block_inline'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "        <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js\"></script>
        <link rel=\"shortcut icon\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 15
        $context["raioane"] = array("0" => "---", "1" => "Centru", "2" => "Riscani", "3" => "Ciocana", "4" => "Buiucani", "5" => "Botanica", "6" => "Posta Veche", "7" => "Telecentru", "8" => "Aeroport", "9" => "Sculeni", "10" => "Durlesti");
        // line 17
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array("notice", ), "method")) {
            // line 18
            echo "            <div class=\"flash-notice alert alert-success\">
                ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array("notice", ), "method"), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 22
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array("error", ), "method")) {
            // line 23
            echo "            <div class=\"flash-danger alert alert-danger\">
                ";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array("error", ), "method"), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 27
        echo "        <div class=\"container-fluid\">
            <div class=\"row-fluid\">
                <div style=\"\" class=\"span2\">
                    ";
        // line 30
        $this->displayBlock('left_menu', $context, $blocks);
        // line 59
        echo "                </div>
                <div class=\"span10\">
                    ";
        // line 61
        $this->displayBlock('body', $context, $blocks);
        // line 63
        echo "                </div>
            </div>
        </div>
        ";
        // line 66
        $this->displayBlock('javascripts', $context, $blocks);
        // line 69
        echo "        <script>
            ";
        // line 70
        $this->displayBlock('inline', $context, $blocks);
        // line 72
        echo "        </script>
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/admin_style.css"), "html", null, true);
        echo "\" type=\"text/css\" />
            <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        ";
    }

    // line 30
    public function block_left_menu($context, array $blocks = array())
    {
        // line 31
        echo "                        <ul class=\"nav nav-pills nav-stacked\">
                            <li>
                                <a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_ann_settings"), "html", null, true);
        echo "\"><i class=\"icon-wrench\"></i> Setari Anunturi</a> 
                            </li>
                            <li>
                                <a href=\"javascript:;\" onclick=\"\$('#announcements_submenu').toggle();\"><i class=\"icon-align-justify\"></i> Anunturi</a> 
                                <div style=\"display:block;\" id=\"announcements_submenu\">
                                    <ul class=\"nav nav-pills nav-stacked\" style=\"margin-bottom:0\">
                                        <li style=\"padding-left:32px;\">
                                            <a style=\"margin:0\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_dau_list"), "html", null, true);
        echo "\">Dau in chirie</a> 
                                        </li>
                                        <li style=\"padding-left:32px;\">
                                            <a style=\"margin:0\" href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_inchiriez_list"), "html", null, true);
        echo "\">Inchiriez</a> 
                                        </li>
                                        <li style=\"padding-left:32px;\">
                                            <a style=\"margin:0\" href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_999_list"), "html", null, true);
        echo "\">Anunturi externe</a> 
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_contacts_list"), "html", null, true);
        echo "\"><i class=\"icon-bullhorn\"></i> Contacte</a> 
                            </li>
                            <li>
                                <a href=\"?logout=1\"><i class=\"icon-off\"></i> Iesire</a> 
                            </li>
                        </ul>
                    ";
    }

    // line 61
    public function block_body($context, array $blocks = array())
    {
        // line 62
        echo "                    ";
    }

    // line 66
    public function block_javascripts($context, array $blocks = array())
    {
        // line 67
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        ";
    }

    // line 70
    public function block_inline($context, array $blocks = array())
    {
        // line 71
        echo "            ";
    }

    public function getTemplateName()
    {
        return "::base_admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
