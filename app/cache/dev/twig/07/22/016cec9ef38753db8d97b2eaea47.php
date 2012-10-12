<?php

/* DauDauBundle:Dau:inchiriezDetails.html.twig */
class __TwigTemplate_0722016cec9ef38753db8d97b2eaea47 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'homepage_middle' => array($this, 'block_homepage_middle'),
            'homepage_search' => array($this, 'block_homepage_search'),
            'homepage_last_announcements' => array($this, 'block_homepage_last_announcements'),
            'main_block' => array($this, 'block_main_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_homepage_middle($context, array $blocks = array())
    {
    }

    // line 3
    public function block_homepage_search($context, array $blocks = array())
    {
    }

    // line 4
    public function block_homepage_last_announcements($context, array $blocks = array())
    {
    }

    // line 5
    public function block_main_block($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"sep\"></div>
    <a href=\"javascript:;\" onclick=\"history.back();return false;\"><< Inapoi</a>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <h1 class=\"left\">";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->stripslashes($this->getAttribute($this->getContext($context, "inchiriez_details"), "title")), "html", null, true);
        echo "</h1>
    <div class=\"font12 italic right textRight\">
        ";
        // line 12
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "inchiriez_details"), "added"), "Y-m-d H:i:s"), "html", null, true);
        echo "
    </div>
    <div class=\"sep\"></div>
    <div class=\"ann_body\">
        ";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->stripslashes($this->env->getExtension('website_extension')->nl2br($this->getAttribute($this->getContext($context, "inchiriez_details"), "annonce"))), "html", null, true);
        echo "
    </div>
    <div class=\"sep\"></div>
    <span class=\"price_span bold\">contacte:</span> <span class=\"bold black font20\">
        ";
        // line 20
        if ($this->getAttribute($this->getContext($context, "inchiriez_details"), "fix")) {
            // line 21
            echo "            <span style=\"font-size: 15px\">22</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "inchiriez_details"), "fix"), "html", null, true);
            echo "
            &nbsp;
            <span class=\"price_span\">|</span>&nbsp;
        ";
        }
        // line 25
        echo "        ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "inchiriez_details"), "mobil"), "html", null, true);
        echo "
    </span>
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:inchiriezDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
