<?php

/* DauDauBundle:Default:search_form.html.twig */
class __TwigTemplate_df376ee1ecb80d7ec90d410dadaed67e extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"app_search\">
    ";
        // line 3
        $context["rooms"] = array("0" => "---", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5");
        // line 5
        echo "    ";
        // line 6
        $context["floor"] = array("0" => "---", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5");
        // line 8
        echo "    <form method=\"get\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_dauAnnouncements"), "html", null, true);
        echo "\" id=\"app_search\">
        <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
            <tr>
                <td style=\"padding-bottom:6px\">
                    <span class=\"big_verdana padding_search_big\">Cautare</span>
                </td>
                <td valign=\"middle\" class=\"search_label\">
                    Sector:&nbsp;
                </td>
                <td>
                    <select name=\"sector\" class=\"width140\">
                        ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "raioane"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 20
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "\" ";
            if (($this->getContext($context, "key") == $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array("sector", ), "method"))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 22
        echo "                    </select>
                </td>
                <td valign=\"middle\" class=\"search_label\">
                    &nbsp;&nbsp;&nbsp;&nbsp;Numar odai:&nbsp;
                </td>
                <td>
                    <select name=\"nr_odai\" class=\"width70\">
                        ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "rooms"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 30
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "\" ";
            if (($this->getContext($context, "key") == $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array("nr_odai", ), "method"))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 32
        echo "                    </select>
                </td>
                <td valign=\"middle\" class=\"search_label\">
                    &nbsp;&nbsp;&nbsp;&nbsp;Etaj:&nbsp;
                </td>
                <td>
                    <select name=\"etaj\" class=\"width60\">
                        <option value=\"\">---</option>
                        ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 18));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 41
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
            echo "\" ";
            if (($this->getContext($context, "i") == $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array("etaj", ), "method"))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 43
        echo "                    </select>
                </td>
                <td valign=\"middle\" class=\"search_label\">
                    &nbsp;&nbsp;&nbsp;&nbsp;Pret:&nbsp;
                </td>
                <td>
                    <input type=\"text\" id=\"price\" style=\"width:50px\" name=\"pret\"> <span class=\"search_label\">EURO</span>
                </td>
                <td>
                    &nbsp;<a href=\"javascript:;\" onclick=\"\$('#app_search').submit();\" class=\"red_button_small margin_button\">Cauta acum&nbsp;<img src=\"../images/search.png\">&nbsp;</a>
                </td>
            </tr>
        </table>
        <input type=\"hidden\" name=\"search\" value=\"1\">
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Default:search_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
