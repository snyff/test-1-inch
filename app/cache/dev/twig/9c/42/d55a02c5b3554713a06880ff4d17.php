<?php

/* DauDauBundle:Default:thankYou.html.twig */
class __TwigTemplate_9c42d55a02c5b3554713a06880ff4d17 extends Twig_Template
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
        $context["message"] = ((array_key_exists("message", $context)) ? (_twig_default_filter($this->getContext($context, "message"), "")) : (""));
        // line 8
        echo "<div class=\"sep\"></div>
";
        // line 9
        if (($this->getContext($context, "message") == "secret_hash_deleted")) {
            // line 10
            echo "    <h1>Anuntul Dvs a fost sters.</h1>
    <div class=\"sep\"></div>
    <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_addAnnouncement"), "html", null, true);
            echo "\">Adauga alt anunt</a>
";
        } elseif ((($this->getContext($context, "message") == "") && ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array("message", ), "method") == "contact_message_sent"))) {
            // line 14
            echo "    <h1>Va multumim pentru mesaj!</h1>
";
        } else {
            // line 16
            echo "    <h1>Va multumim! Anuntul Dvs va aparea online indata dupa ce va fi validat.</h1>
";
        }
        // line 18
        echo "
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Default:thankYou.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
