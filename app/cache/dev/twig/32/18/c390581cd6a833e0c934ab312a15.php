<?php

/* ::base_mobile.html.twig */
class __TwigTemplate_3218c390581cd6a833e0c934ab312a15 extends Twig_Template
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
        echo "        <meta content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;\" name=\"viewport\" />
        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 14
        echo "    </head>
    <body>
        <div class=\"main\">
            <a id=\"logo\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_dauAnnouncements_mobile"), "html", null, true);
        echo "\"><img src=\"/images/logo.png\" alt=\"gazda chisinau\" /></a>
        </div>
        <div class=\"sep\"></div>
        <div class=\"sep\"></div>
        <div class=\"main\">
            ";
        // line 22
        $this->displayBlock('main_block', $context, $blocks);
        // line 28
        echo "        </div>
    </body>
    ";
        // line 30
        $this->displayBlock('javascripts_after', $context, $blocks);
        // line 31
        echo "</html>";
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

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style_mobile.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 22
    public function block_main_block($context, array $blocks = array())
    {
        // line 23
        echo "                <div class=\"sep\"></div>
                <div class=\"c\">
                    <a href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_use_normal_site"), "html", null, true);
        echo "\">Versiunea normala a site-ului</a>
                </div>
            ";
    }

    // line 30
    public function block_javascripts_after($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base_mobile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
