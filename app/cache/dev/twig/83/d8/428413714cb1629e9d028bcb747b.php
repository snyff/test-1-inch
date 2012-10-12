<?php

/* DauDauBundle:Default:about_us.html.twig */
class __TwigTemplate_83d8428413714cb1629e9d028bcb747b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "page_title"), "html", null, true);
    }

    // line 4
    public function block_keywords($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "keywords"), "html", null, true);
    }

    // line 5
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "description"), "html", null, true);
    }

    // line 7
    public function block_homepage_middle($context, array $blocks = array())
    {
    }

    // line 8
    public function block_homepage_search($context, array $blocks = array())
    {
    }

    // line 9
    public function block_homepage_last_announcements($context, array $blocks = array())
    {
    }

    // line 11
    public function block_main_block($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"sep\"></div>
    <h1>Despre inchiriere.md</h1>
    <div class=\"sep\"></div>
    Inchiriere.md este un site de imobiliare. Este destinat celor care cauta sau ofera gazda in Chisinau.
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Default:about_us.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
