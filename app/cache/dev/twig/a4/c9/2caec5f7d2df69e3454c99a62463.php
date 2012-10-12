<?php

/* DauDauBundle:Default:index.html.twig */
class __TwigTemplate_a4c92caec5f7d2df69e3454c99a62463 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'homepage_last_announcements' => array($this, 'block_homepage_last_announcements'),
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
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "page_title"), "html", null, true);
    }

    // line 3
    public function block_keywords($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "keywords"), "html", null, true);
    }

    // line 4
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "description"), "html", null, true);
    }

    // line 6
    public function block_homepage_last_announcements($context, array $blocks = array())
    {
        // line 7
        echo "    <div class=\"sep\"></div>
    <div>
        <h1 class=\"left\">Dau in chirie - ultimele adaugate:</h1>
        <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_dauAnnouncements"), "html", null, true);
        echo "\" class=\"right\">Toate anunturile >></a>
        <div class=\"sep\"></div>
        ";
        // line 12
        $this->env->loadTemplate("DauDauBundle:Default:dau_list.html.twig")->display($context);
        // line 13
        echo "        <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_dauAnnouncements"), "html", null, true);
        echo "\" class=\"right\">Toate anunturile >></a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
