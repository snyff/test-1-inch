<?php

/* DauDauBundle:Dau:addInchiriez.html.twig */
class __TwigTemplate_1a657202097bba065f8d1abb0ac43537 extends Twig_Template
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
        echo "<div class=\"sep\"></div>
<h1>Adauga anunt: Inchiriez</h1>
<div class=\"sep\"></div>
<form method=\"post\" action=\"\" id=\"add_new_form\">
    ";
        // line 11
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
    <table width=\"100%\">
        <tr>
            <td width=\"115\">
                <label for=\"dau_form_title\" class=\"search_label\">Title:</label><br />
                ";
        // line 16
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "title"));
        echo "
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <label for=\"dau_form_content\" class=\"search_label\">Continut:</label><br />
                ";
        // line 23
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "annonce"));
        echo "
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <label for=\"dau_form_price\" class=\"search_label\">Pret:</label><br />
                ";
        // line 30
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "price"));
        echo " <span style=\"font-size: 13px\">euro</span>
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <div style=\"float:left;\">
                    <label for=\"dau_form_fix\" class=\"search_label\">Telefon Fix:</label><br />
                    ";
        // line 38
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "fix"));
        echo "
                </div>
                <div style=\"float:left; margin-left: 10px;\">
                    <label for=\"dau_form_mobil\" class=\"search_label\">Telefon Mobil:</label><br />
                    ";
        // line 42
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "mobil"));
        echo "
                </div>
                <div style=\"float:left; margin-left: 10px;\">
                    <label for=\"dau_form_email\" class=\"search_label\">Email:</label><br />
                    ";
        // line 46
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "email"));
        echo "
                </div>
                <div class=\"sep\"></div>
            </td>
        </tr>
    </table>
    ";
        // line 52
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "
    <input type=\"submit\" class=\"red_button_small\" value=\"Salveaza\" />
</form>

";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:addInchiriez.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
