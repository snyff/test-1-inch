<?php

/* AdminAdminBundle:Default:external_ann.html.twig */
class __TwigTemplate_89758012de91c40eee60bbefc1092fec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_javascripts($context, array $blocks = array())
    {
        // line 3
        echo "    <script src=\"/js/jquery.lightbox-0.5.js\" type=\"text/javascript\"></script>
";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"/css/jquery.lightbox.css\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        $this->env->loadTemplate("AdminAdminBundle:Default:_extern_ann.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Default:external_ann.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
