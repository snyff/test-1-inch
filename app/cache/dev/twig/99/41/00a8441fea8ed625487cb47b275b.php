<?php

/* DauDauBundle:Mobile:annDetails.html.twig */
class __TwigTemplate_994100a8441fea8ed625487cb47b275b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'main_block' => array($this, 'block_main_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base_mobile.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 8
        $context["raioane"] = array("0" => "---", "1" => "Centru", "2" => "Riscani", "3" => "Ciocana", "4" => "Buiucani", "5" => "Botanica", "6" => "Posta Veche", "7" => "Telecentru");
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

    // line 10
    public function block_main_block($context, array $blocks = array())
    {
        // line 11
        echo "    <div class=\"main\">
        <div class=\"sep\"></div>
        <a href=\"javascript:;\" onclick=\"history.back();return false;\"><< Inapoi</a>
        <div class=\"sep\"></div>
        <div itemscope itemtype=\"http://schema.org/ApartmentComplex\">
            <b>";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->stripslashes($this->getAttribute($this->getContext($context, "dau_details"), "title")), "html", null, true);
        echo "</b>
            <sup>";
        // line 17
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "added"), "Y-m-d H:i:s"), "html", null, true);
        echo "</sup>
            <div class=\"sep\"></div>
            ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "photos"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 20
            echo "                <a href=\"/uploads/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "getPhotoPath"), "html", null, true);
            echo "\" class=\"gallery_photo\"><img itemprop=\"photo\" src=\"/uploads/th_";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "getPhotoPath"), "html", null, true);
            echo "\"></a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 22
        echo "            <div class=\"sep\"></div>
            <div class=\"ann_body\" itemprop=\"description\">
                ";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->stripslashes($this->env->getExtension('website_extension')->nl2br($this->getAttribute($this->getContext($context, "dau_details"), "content"))), "html", null, true);
        echo "
            </div>
            <div class=\"sep\"></div>
            <div class=\"sep\"></div>
            <span class=\"price_span bold\">pret:</span> <span class=\"bold black font20\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "price"), "html", null, true);
        echo " &euro;</span>
            <div class=\"sep\"></div>
            <span itemscope itemtype=\"http://schema.org/PostalAddress\">
                <span class=\"price_span bold\">adresa:</span> <span itemprop=\"streetAddress\" class=\"bold black font20\">Chisinau (";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "raioane"), $this->getAttribute($this->getContext($context, "dau_details"), "raion"), array(), "array"), "html", null, true);
        echo "), ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "address"), "html", null, true);
        echo "</span>
            </span>
            <div class=\"sep\"></div>
            <span class=\"price_span bold\">contacte:</span> 
            <span class=\"bold black font20\">
                ";
        // line 36
        if ($this->getAttribute($this->getContext($context, "dau_details"), "fix")) {
            // line 37
            echo "                    <span itemprop=\"telephone\">
                        <a href=\"tel:";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->filter_fix($this->getAttribute($this->getContext($context, "dau_details"), "fix")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "fix"), "html", null, true);
            echo "</a>
                    </span>
                    &nbsp;
                    <span class=\"price_span\">|</span>&nbsp;
                ";
        }
        // line 43
        echo "                <span itemprop=\"telephone\">
                    <a href=\"tel:";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->filter_mobil($this->getAttribute($this->getContext($context, "dau_details"), "mobil")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "mobil"), "html", null, true);
        echo "</a>
                </span>
            </span>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Mobile:annDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
