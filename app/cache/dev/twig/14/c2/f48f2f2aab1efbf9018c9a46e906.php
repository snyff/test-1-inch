<?php

/* DauDauBundle:Default:rules.html.twig */
class __TwigTemplate_14c2f48f2f2aab1efbf9018c9a46e906 extends Twig_Template
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
    <h1>Regulile site-ului</h1>
    <div class=\"sep\"></div>
    1) Administratia inchiriere.md nu poarta responsabilitate pentru anunturile si fotografiile publicate si isi asuma dreptul de a sterge anunturile care nu corespund tematicii site-ului. 
    Administratia site-ului de asemenea isi asuma dreptul de a refuza sau modifica anunturile publicate. 
    <br />
    <br /> 
    2) Anunturile plasate de <b>agentii</b> vor fi expuse in categoria <b>\"Anunturile agentiilor\"</b>. La plasarea anuntului selectati optiunea <b>\"Agentie\"</b>, in caz contrar administratia site-ului <a href=\"http://www.inchiriere.md\">www.inchiriere.md</a> isi asuma dreptul de a modifica, sterge sau refuza anuntul.
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Default:rules.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
