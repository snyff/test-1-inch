<?php

/* AdminAdminBundle:Default:dauAnnouncements.html.twig */
class __TwigTemplate_b11d4a42d56a2c2c18610d66a9e7e492 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
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

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"sep\"></div>
    <h1>Anunturile: Dau in chirie</h1>
    <div>
        Legenda:
        <br />
        <span style=\"padding-left:23px; background-color: #D9EDF7\"></span>&nbsp;&nbsp;- anunt in asteptare
        <br />
        <span style=\"padding-left:23px; background-color: #FCF8E3\"></span>&nbsp;&nbsp;- anunt ascuns
    </div>
    <table class=\"table table-hover\" cellpadding=\"0\" cellspacing=\"0\" width=\"\">
        <tr>
            <th>
                Titlul anuntului
            </th>
            <th>
                Data Adaugarii
            </th>
            <th>
                Numar Odai
            </th>
            <th>
                Sector
            </th>
            <th>
                Pret
            </th>
            <th>
                Operatiuni
            </th>
        </tr>
        ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "paginator"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 35
            echo "            <tr ";
            if (($this->getAttribute($this->getContext($context, "item"), "acceptstatus") == "h")) {
                echo "class=\"warning\"";
            } elseif (($this->getAttribute($this->getContext($context, "item"), "acceptstatus") == "w")) {
                echo "class=\"info\"";
            }
            echo ">
                <td>
                    <a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_ann_details", array("id" => $this->getAttribute($this->getContext($context, "item"), "id"), "title_slug" => $this->getAttribute($this->getContext($context, "item"), "titleslug"))), "html", null, true);
            echo "\" class=\"ann_link\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->no_title($this->env->getExtension('website_extension')->truncate($this->getAttribute($this->getContext($context, "item"), "title"), 0, 60, "...")), "html", null, true);
            echo "</a>
                </td>
                <td class=\"ann_details\">
                    ";
            // line 40
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "Y-m-d"), "html", null, true);
            echo "
                </td>
                <td class=\"ann_details\">
                    ";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "nrrooms"), "html", null, true);
            echo " camere
                </td>
                <td class=\"ann_details\">
                    ";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "raioane"), $this->getAttribute($this->getContext($context, "item"), "raion"), array(), "array"), "html", null, true);
            echo "
                </td>
                <td class=\"ann_details\">
                    ";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "price"), "html", null, true);
            echo " euro
                </td>
                <td width=\"155\">
                    <ul class=\"nav nav-pills\" style=\"margin:0\">
                        <li class=\"dropdown\">
                            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"javascript:;\">
                                Options
                                <b class=\"caret\"></b>
                            </a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_modify_dau"), "html", null, true);
            echo "?ann_id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\"><i class=\"icon-edit\"></i>&nbsp;Modifica</a></li>
                                <li>
                                    ";
            // line 61
            if (($this->getAttribute($this->getContext($context, "item"), "acceptstatus") == "a")) {
                // line 62
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_hide_dau"), "html", null, true);
                echo "?ann_id=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
                echo "&type=hide\"><i class=\"icon-screenshot\"></i>&nbsp;Ascunde</a>
                                    ";
            } else {
                // line 64
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_hide_dau"), "html", null, true);
                echo "?ann_id=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
                echo "&type=unhide\"><i class=\"icon-screenshot\"></i>&nbsp;Activeaza</a>
                                    ";
            }
            // line 66
            echo "                                </li>
                                <li><a href=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_current_time_dau"), "html", null, true);
            echo "?ann_id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\"><i class=\"icon-time\"></i>&nbsp; Timp curent</a></li>
                                <li class=\"divider\"></li>
                                <li><a href=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_delete_dau"), "html", null, true);
            echo "?ann_id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" onclick=\"return confirm('Confirmati?')\"><i class=\"icon-trash\"></i>&nbsp;Sterge</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 76
        echo "    </table>
    
    
    ";
        // line 79
        if ($this->getAttribute($this->getContext($context, "paginator"), "haveToPaginate")) {
            // line 80
            echo "        <div class=\"sep\"></div>
        <div class=\"pagination\">
            ";
            // line 82
            if (($this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method") != 1)) {
                // line 83
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_dau_list"), "html", null, true);
                echo "?";
                echo twig_escape_filter($this->env, $this->getContext($context, "query_string"), "html", null, true);
                if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array("search", ), "method") == 1)) {
                    echo "&";
                }
                echo "page=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "paginator"), "getPreviousPage", array(), "method"), "html", null, true);
                echo "\" class=\"pagination_prev\">Prev</a>
            ";
            }
            // line 85
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "paginator"), "getLinks", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["paginator_page"]) {
                // line 86
                echo "                ";
                if (($this->getContext($context, "paginator_page") == $this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method"))) {
                    // line 87
                    echo "                    <span class=\"active_page\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "paginator_page"), "html", null, true);
                    echo "</span>
                ";
                } else {
                    // line 89
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_dau_list"), "html", null, true);
                    echo "?";
                    echo twig_escape_filter($this->env, $this->getContext($context, "query_string"), "html", null, true);
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array("search", ), "method") == 1)) {
                        echo "&";
                    }
                    echo "page=";
                    echo twig_escape_filter($this->env, $this->getContext($context, "paginator_page"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "paginator_page"), "html", null, true);
                    echo "</a>
                ";
                }
                // line 91
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paginator_page'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 92
            echo "            ";
            if (($this->getAttribute($this->getContext($context, "paginator"), "getNextPage", array(), "method") != $this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method"))) {
                // line 93
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_dau_list"), "html", null, true);
                echo "?";
                echo twig_escape_filter($this->env, $this->getContext($context, "query_string"), "html", null, true);
                if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array("search", ), "method") == 1)) {
                    echo "&";
                }
                echo "page=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "paginator"), "getNextPage", array(), "method"), "html", null, true);
                echo "\" class=\"pagination_next\">Next</a>
            ";
            }
            // line 95
            echo "        </div>
        <div class=\"sep\"></div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Default:dauAnnouncements.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
