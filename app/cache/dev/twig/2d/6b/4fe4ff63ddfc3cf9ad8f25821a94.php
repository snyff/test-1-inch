<?php

/* DauDauBundle:Dau:confirmDeleteDau.html.twig */
class __TwigTemplate_2d6b4fe4ff63ddfc3cf9ad8f25821a94 extends Twig_Template
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

    // line 6
    public function block_main_block($context, array $blocks = array())
    {
        // line 7
        echo "    <div class=\"sep\"></div>
    ";
        // line 8
        if ($this->getContext($context, "found")) {
            // line 9
            echo "        Va rugam sa confirmati ca doriti sa stergeti anuntul cu titlul: \"";
            echo $this->getAttribute($this->getContext($context, "ann"), "title");
            echo "\" postat pe data ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "ann"), "added"), "Y-m-d H:i:s"), "html", null, true);
            echo "
        <br />
        <a href=\"?confirm=1\">Confirm</a>&nbsp;&nbsp;<a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_homepage"), "html", null, true);
            echo "\">Renunt</a>
    ";
        } else {
            // line 13
            echo "        Anuntul cu asemenea id a fost sters sa nu exista in baza noastra de date.
    ";
        }
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:confirmDeleteDau.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
