<?php

/* DauDauBundle:Dau:addDau.html.twig */
class __TwigTemplate_1d1780c1441ad06ceb1479fb45e2d467 extends Twig_Template
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
<h1>Adauga anunt: Dau in chirie</h1>
<div class=\"sep\"></div>
<form method=\"post\" action=\"\" id=\"add_new_form\">
    ";
        // line 16
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
    <table width=\"100%\">
        <tr>
            <td width=\"115\">
                <label for=\"dau_form_title\" class=\"search_label\">Title:</label><span class=\"red\">*</span><br />
                ";
        // line 21
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "title"));
        echo "
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <label for=\"dau_form_content\" class=\"search_label\">Continut:</label><br />
                ";
        // line 28
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "content"));
        echo "
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <div style=\"float:left;\">
                    <label for=\"dau_form_nr_rooms\" class=\"search_label\">Numarul de odai:</label><span class=\"red\">*</span><br />
                    ";
        // line 36
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "nr_rooms"));
        echo "
                </div>
                <div style=\"float:left; margin-left: 25px;\">
                    <label for=\"dau_form_floor\" class=\"search_label\">Etaj:</label><span class=\"red\">*</span><br />
                    ";
        // line 40
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "floor"));
        echo "
                </div>
                <div style=\"float:left; margin-left: 15px;\">
                    <label for=\"dau_form_nr_floors\" class=\"search_label\">nr. etaje:</label><br />
                    ";
        // line 44
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "nr_floors"));
        echo "
                </div>
                <div style=\"float:left; margin-left: 25px;\">
                    <label for=\"dau_form_raion\" class=\"search_label\">Sector:</label><span class=\"red\">*</span><br />
                    ";
        // line 48
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "raion"));
        echo "
                </div>
                <div style=\"float:left; margin-left: 15px;\">
                    <label for=\"dau_form_price\" class=\"search_label\">Suprafata:</label><br />
                    ";
        // line 52
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "m2"));
        echo " <span style=\"font-size: 13px\">m<sup>2</sup></span>
                </div>
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <div style=\"float:left;\">
                    <label for=\"dau_form_address\" class=\"search_label\">Adresa:</label><span class=\"red\">*</span><br />
                    ";
        // line 61
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "address"));
        echo "
                </div>
                <div style=\"float:left; margin-left: 15px;\">
                    <label for=\"dau_form_price\" class=\"search_label\">Pret:</label><span class=\"red\">*</span><br />
                    ";
        // line 65
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "price"));
        echo " <span style=\"font-size: 13px\">euro</span>
                </div>
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <div style=\"float:left;\">
                    <label for=\"dau_form_fix\" class=\"search_label\">Telefon Fix:</label><br />
                    ";
        // line 74
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "fix"));
        echo "
                </div>
                <div style=\"float:left; margin-left: 15px;\">
                    <label for=\"dau_form_mobil\" class=\"search_label\">Telefon Mobil:</label><span class=\"red\">*</span><br />
                    ";
        // line 78
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "mobil"));
        echo "
                </div>
                <div style=\"float:left;margin-left: 15px; width: 461px;\">
                    <label for=\"dau_form_email\" class=\"search_label\">Email:</label><br />
                    ";
        // line 82
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "email"));
        echo " <span class=\"font11 italic right email_hint\">Daca specificati un email, veti primi un link care <br />va va permite sa stergeti anuntul; <br />(acest email nu va fi publicat pe site)</span>
                </div>
                <div class=\"sep\"></div>
            </td>
        </tr>
        <tr>
            <td>
                <label class=\"search_label\">Fotografii:</label><br />
                <iframe src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_add_photos"), "html", null, true);
        echo "\" class=\"add_photo_iframe\"></iframe>
                <div class=\"sep\"></div>
            </td>
        </tr>
    </table>
    ";
        // line 95
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "
    <input type=\"submit\" class=\"red_button_small\" value=\"Salveaza\" />
</form>

";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:addDau.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
