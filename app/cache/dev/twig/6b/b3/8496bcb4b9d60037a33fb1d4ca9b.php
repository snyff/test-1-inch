<?php

/* DauDauBundle:Mobile:dau_list.html.twig */
class __TwigTemplate_6bb38496bcb4b9d60037a33fb1d4ca9b extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ul class=\"listings\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "paginator"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            echo "        <li itemscope itemtype=\"http://schema.org/ApartmentComplex\">
            <a href=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_ann_details_mobile", array("id" => $this->getAttribute($this->getContext($context, "item"), "id"), "title_slug" => $this->getAttribute($this->getContext($context, "item"), "titleslug"))), "html", null, true);
            echo "\" class=\"\" itemprop=\"url\"><span itemprop=\"name\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->stripslashes($this->env->getExtension('website_extension')->no_title($this->env->getExtension('website_extension')->truncate($this->getAttribute($this->getContext($context, "item"), "title"), 0, 40, "..."))), "html", null, true);
            echo "</span></a>
            <br />
            ";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "raioane"), $this->getAttribute($this->getContext($context, "item"), "raion"), array(), "array"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "address"), "html", null, true);
            echo "
            <br />
            <span class=\"title\">Pret:</span> ";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "price"), "html", null, true);
            echo " &euro;
            <br />
            <span class=\"title\">Camere:</span> ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "nrrooms"), "html", null, true);
            echo "
            <br />
            ";
            // line 12
            if ($this->getAttribute($this->getContext($context, "item"), "fix")) {
                // line 13
                echo "                <span class=\"title\">Fix:</span> <a href=\"tel:";
                echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->filter_fix($this->getAttribute($this->getContext($context, "item"), "fix")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->filter_fix($this->getAttribute($this->getContext($context, "item"), "fix")), "html", null, true);
                echo "</a>
                <br />
            ";
            }
            // line 16
            echo "            <span class=\"title\">Mobil:</span> <a href=\"tel:";
            echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->filter_mobil($this->getAttribute($this->getContext($context, "item"), "mobil")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->filter_mobil($this->getAttribute($this->getContext($context, "item"), "mobil")), "html", null, true);
            echo "</a>
            <br />
            <span class=\"title\">Adaugat:</span> ";
            // line 18
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "Y-m-d"), "html", null, true);
            echo "
            <div class=\"sep\"></div>
            <a href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_ann_details_mobile", array("id" => $this->getAttribute($this->getContext($context, "item"), "id"), "title_slug" => $this->getAttribute($this->getContext($context, "item"), "titleslug"))), "html", null, true);
            echo "\" class=\"more\">Mai multe detalii&nbsp;&nbsp;<img src=\"/images/arrow.png\" class=\"r mt3\" /></a>
        </li>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 23
            echo "        <li>
            La moment nu avem nici un rezultat pentru aceasta cautare.
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 27
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Mobile:dau_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
