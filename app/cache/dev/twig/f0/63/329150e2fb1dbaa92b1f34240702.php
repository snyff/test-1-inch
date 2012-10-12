<?php

/* DauDauBundle:Default:contacts.html.twig */
class __TwigTemplate_f063329150e2fb1dbaa92b1f34240702 extends Twig_Template
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
        echo "<div class=\"sep\"></div>
<h1>Contactati-ne</h1>
<div class=\"sep\"></div>
<form method=\"post\" action=\"\" id=\"add_new_form\">
    ";
        // line 16
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
    <table width=\"100%\">
        <tr>
            <td width=\"115\">
                <label for=\"contacts_form_subject\" class=\"search_label\">Subject:</label><br />
                ";
        // line 21
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "subject"));
        echo "
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <label for=\"contacts_form_content\" class=\"search_label\">Continut:</label><br />
                ";
        // line 28
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "content"));
        echo "
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <label for=\"contacts_form_email\" class=\"search_label\">Email:</label><br />
                ";
        // line 35
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "email"));
        echo "
                <span class=\"font11 italic email_hint\">
                    pe acest email va vom raspunde daca este cazul (nu va fi publicat pe site)
                </span>
                <div class=\"sep\"></div>
            </td>
        </tr>
        
    </table>
    ";
        // line 44
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "
    <input type=\"submit\" class=\"red_button_small\" value=\"Trimite\" />
</form>

";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Default:contacts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
