<?php

/* DauDauBundle:Default:dau_list.html.twig */
class __TwigTemplate_860f83edbd19ed2022ff714af2d7c1ec extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<table class=\"ann_table\" cellpadding=\"0\" cellspacing=\"0\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "paginator"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["i"] => $context["item"]) {
            // line 3
            echo "        ";
            if (($this->getContext($context, "i") == 5)) {
                // line 4
                echo "            <tr>
                <td colspan=\"5\">
                    <script type=\"text/javascript\"><!--
                        google_ad_client = \"ca-pub-5949181121748532\";
                        /* Leaderboard */
                        google_ad_slot = \"2380791311\";
                        google_ad_width = 728;
                        google_ad_height = 90;
                        //-->
                        </script>
                        <script type=\"text/javascript\"
                        src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">
                    </script>
                </td>
            </tr>
        ";
            }
            // line 20
            echo "        <tr itemscope itemtype=\"http://schema.org/ApartmentComplex\">
            <td>
                <a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_ann_details", array("id" => $this->getAttribute($this->getContext($context, "item"), "id"), "title_slug" => $this->getAttribute($this->getContext($context, "item"), "titleslug"))), "html", null, true);
            echo "\" class=\"ann_link\" itemprop=\"url\"><span itemprop=\"name\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->stripslashes($this->env->getExtension('website_extension')->no_title($this->env->getExtension('website_extension')->truncate($this->getAttribute($this->getContext($context, "item"), "title"), 0, 60, "..."))), "html", null, true);
            echo "</span></a>
            </td>
            <td class=\"ann_details\">
                ";
            // line 25
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "Y-m-d"), "html", null, true);
            echo "
                <br />
                <span class=\"italic font10\">";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->days_ago(twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "Y-m-d H:i:s")), "html", null, true);
            echo "</span>
            </td>
            <td class=\"ann_details\">
                ";
            // line 30
            if (($this->getAttribute($this->getContext($context, "item"), "nrrooms") == 0)) {
                echo "1";
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "nrrooms"), "html", null, true);
            }
            echo " camere
            </td>
            <td class=\"ann_details\">
                ";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "raioane"), $this->getAttribute($this->getContext($context, "item"), "raion"), array(), "array"), "html", null, true);
            echo "
            </td>
            <td class=\"ann_details\">
                ";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "price"), "html", null, true);
            echo " euro
            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 40
            echo "        <tr>
            <td>
                La moment nu avem nici un rezultat pentru aceasta cautare.
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 46
        echo "</table>";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Default:dau_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
