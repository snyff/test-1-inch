<?php

/* ::base.html.twig */
class __TwigTemplate_c2517b9e4c053d7579e8f68279d7dc1d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'canonical' => array($this, 'block_canonical'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'main_menu' => array($this, 'block_main_menu'),
            'homepage_middle' => array($this, 'block_homepage_middle'),
            'homepage_search' => array($this, 'block_homepage_search'),
            'homepage_last_announcements' => array($this, 'block_homepage_last_announcements'),
            'main_block' => array($this, 'block_main_block'),
            'javascripts_after' => array($this, 'block_javascripts_after'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html\" charset=\"utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <meta name=\"keywords\" content=\"";
        // line 6
        $this->displayBlock('keywords', $context, $blocks);
        echo "\" />
        <meta name=\"description\" content=\"";
        // line 7
        $this->displayBlock('description', $context, $blocks);
        echo "\" />
        ";
        // line 8
        $this->displayBlock('canonical', $context, $blocks);
        // line 9
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 15
        echo "    </head>
    <body>
        <div class=\"top_menu_container\">
            <div class=\"top_menu_logo general_width\">
                <a id=\"logo\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_homepage"), "html", null, true);
        echo "\"><img src=\"/images/logo.png\" alt=\"gazda chisinau\" /></a>
                ";
        // line 20
        $this->displayBlock('main_menu', $context, $blocks);
        // line 47
        echo "            </div>
        </div>
        ";
        // line 50
        $context["raioane"] = array("0" => "---", "1" => "Centru", "2" => "Riscani", "3" => "Ciocana", "4" => "Buiucani", "5" => "Botanica", "6" => "Posta Veche", "7" => "Telecentru", "8" => "Aeroport", "9" => "Sculeni", "10" => "Durlesti");
        // line 52
        echo "        <div class=\"container general_width\">
            ";
        // line 53
        $this->displayBlock('homepage_middle', $context, $blocks);
        // line 97
        echo "            ";
        $this->displayBlock('homepage_search', $context, $blocks);
        // line 100
        echo "            ";
        $this->displayBlock('homepage_last_announcements', $context, $blocks);
        // line 101
        echo "            ";
        $this->displayBlock('main_block', $context, $blocks);
        // line 102
        echo "            <div class=\"sep\"></div>
            <div class=\"bottom_line\"></div>
            <div class=\"footer_text\">
                inchiriere.md - Toate drepturile rezervate, <a href=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_rules"), "html", null, true);
        echo "\">Reguli</a>
            </div>
        </div>
    </body>
    ";
        // line 109
        $this->displayBlock('javascripts_after', $context, $blocks);
        // line 110
        echo "    <script type=\"text/javascript\">
      var gaJsHost = ((\"https:\" == document.location.protocol) ? \"https://ssl.\" : \"http://www.\");
      document.write(unescape(\"%3Cscript src=\\'\" + gaJsHost + \"google-analytics.com/ga.js\\' type=\\'text/javascript\\'%3E%3C/script%3E\"));
      </script>
      <script type=\"text/javascript\">
      try {
      var pageTracker = _gat._getTracker(\"UA-10160390-1\");
      pageTracker._trackPageview();
      } catch(err) {}
    </script>
    <script type=\"text/javascript\">
\t    top20_id=\"inchirieremd\";
\t    top20_showimg=0;
    </script>
    <script src=\"http://www.top20.md/client/scripts/stats.js\" type=\"text/javascript\"></script>
    <noscript>
\t    <a href=\"http://www.top20.md/?site=inchirieremd\"><img border=\"0\" alt=\"top20.md\" src=\"http://v1.stream.top20.md/?top20_id=inchirieremd\"/></a> 
    </noscript>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 6
    public function block_keywords($context, array $blocks = array())
    {
    }

    // line 7
    public function block_description($context, array $blocks = array())
    {
    }

    // line 8
    public function block_canonical($context, array $blocks = array())
    {
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
        // line 13
        echo "            <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\" type=\"text/javascript\"></script>
        ";
    }

    // line 20
    public function block_main_menu($context, array $blocks = array())
    {
        // line 21
        echo "                    <div class=\"top_menu\">
                        <ul>
                            <li>
                                <a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_homepage"), "html", null, true);
        echo "\" ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_homepage")) {
            echo "class=\"active_main_menu\"";
        }
        echo ">Acasa</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_addAnnouncement"), "html", null, true);
        echo "\" ";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_addAnnouncement") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_addDau")) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_addInchiriez"))) {
            echo "class=\"active_main_menu\"";
        }
        echo ">Adauga anunt</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_dauAnnouncements"), "html", null, true);
        echo "\" ";
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_dauAnnouncements") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_ann_details"))) {
            echo "class=\"active_main_menu\"";
        }
        echo ">Dau in chirie</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_inchiriezAnnouncements"), "html", null, true);
        echo "\" ";
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_inchiriezAnnouncements") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_inchiriez_details"))) {
            echo "class=\"active_main_menu\"";
        }
        echo ">Inchiriez</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_contacts"), "html", null, true);
        echo "\" ";
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_contacts") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_contacts"))) {
            echo "class=\"active_main_menu\"";
        }
        echo ">Contacte</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_about_us"), "html", null, true);
        echo "\" ";
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_about_us") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array("_route", ), "method") == "DauDauBundle_about_us"))) {
            echo "class=\"active_main_menu\"";
        }
        echo ">Despre noi</a>
                            </li>
                            ";
        // line 44
        echo "                        </ul>
                    </div>
                ";
    }

    // line 53
    public function block_homepage_middle($context, array $blocks = array())
    {
        // line 54
        echo "                <div class=\"homepage_middle\">
                    <div class=\"house\"></div>
                    <div class=\"homepage_big_text\">
                        <span class=\"big_verdana\">Pentru cei care doresc sa inchirieze sau <br /> sa dea in chirie apartamente.</span>
                        <div class=\"sep\"></div>
                        <div class=\"sep\"></div>
                        <span class=\"grey_verdana\">Plasarea anunturilor pe site este <b>GRATIS!</b></span>
                        <div class=\"sep\"></div>
                        <div class=\"sep\"></div>
                        <div class=\"sep\"></div>
                        <div class=\"sep\"></div>
                        <div class=\"sep\"></div>
                        <span class=\"add_new_div_\" id=\"add_new_div_\">
                            <a href=\"javascript:;\" class=\"red_button\" id=\"add_new_button\" onmouseover=\"showAdd();return false;\">Adauga anuntul tau acum!&nbsp;<img src=\"../images/checked.png\"></a>
                            <div class=\"add_new_div\" id=\"add_new_div\">
                                Vreau sa:
                                <br />
                                <a href=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_addDau"), "html", null, true);
        echo "\" class=\"homepage_add\">dau in chirie</a>
                                <br />
                                <a href=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_addInchiriez"), "html", null, true);
        echo "\" class=\"homepage_add\">inchiriez</a>
                            </div>
                        </span>
                    </div>
                </div>
                <script>
                    function showAdd() {
                        \$('#add_new_button').addClass('red_button_hover');
                        \$('#add_new_div').show();
                    }
                    \$(document).ready(function(){
                        \$('#add_new_div_').mouseout(function(e){
                            if (!e) var e = window.event;
                            var reltg = (e.relatedTarget) ? e.relatedTarget : e.toElement;
                            while (reltg.tagName != 'BODY'){
                                if (reltg.id == this.id)return;
                                reltg = reltg.parentNode;
                            }
                            \$('#add_new_div').hide();
                            \$('#add_new_button').removeClass('red_button_hover');
                        }); 
                    });
                </script>
            ";
    }

    // line 97
    public function block_homepage_search($context, array $blocks = array())
    {
        // line 98
        echo "                ";
        $this->env->loadTemplate("DauDauBundle:Default:search_form.html.twig")->display($context);
        // line 99
        echo "            ";
    }

    // line 100
    public function block_homepage_last_announcements($context, array $blocks = array())
    {
    }

    // line 101
    public function block_main_block($context, array $blocks = array())
    {
    }

    // line 109
    public function block_javascripts_after($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
