<?php

/* AdminAdminBundle:Default:inchiriezAnnouncements.html.twig */
class __TwigTemplate_16df8fb9f5590cc45f5dedb398ab1f86 extends Twig_Template
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
        // line 4
        $context["raioane"] = array("0" => "---", "1" => "Centru", "2" => "Riscani", "3" => "Ciocana", "4" => "Buiucani", "5" => "Botanica", "6" => "Posta Veche", "7" => "Telecentru");
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    <div class=\"sep\"></div>
    <h1>Ultimile anunturi: Inchiriez</h1>
    <div class=\"sep\"></div>
    <table class=\"table table-hover\" cellpadding=\"0\" cellspacing=\"0\">
        <tr>
            <th>
                Titlu
            </th>
            <th>
                Data Adaugarii
            </th>
            <th>
                Pret
            </th>
            <th>
                Operatiuni
            </th>
        </tr>
        ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "paginator"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 27
            echo "            <tr>
                <td>
                    <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_inchiriez_details", array("id" => $this->getAttribute($this->getContext($context, "item"), "id"), "title_slug" => $this->getAttribute($this->getContext($context, "item"), "titleslug"))), "html", null, true);
            echo "\" class=\"ann_link\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->no_title($this->env->getExtension('website_extension')->truncate($this->getAttribute($this->getContext($context, "item"), "title"), 0, 60, "...")), "html", null, true);
            echo "</a>
                </td>
                <td class=\"ann_details\">
                    ";
            // line 32
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "Y-m-d"), "html", null, true);
            echo "
                </td>
                <td class=\"ann_details\">
                    ";
            // line 35
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
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_delete_inchiriez"), "html", null, true);
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
        // line 52
        echo "    </table>
    
    ";
        // line 54
        if ($this->getAttribute($this->getContext($context, "paginator"), "haveToPaginate")) {
            // line 55
            echo "        <div class=\"sep\"></div>
        <div class=\"pagination\">
            ";
            // line 57
            if (($this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method") != 1)) {
                // line 58
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_inchiriez_list"), "html", null, true);
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
            // line 60
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "paginator"), "getLinks", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["paginator_page"]) {
                // line 61
                echo "                ";
                if (($this->getContext($context, "paginator_page") == $this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method"))) {
                    // line 62
                    echo "                    <span class=\"active_page\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "paginator_page"), "html", null, true);
                    echo "</span>
                ";
                } else {
                    // line 64
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_inchiriez_list"), "html", null, true);
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
                // line 66
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paginator_page'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 67
            echo "            ";
            if (($this->getAttribute($this->getContext($context, "paginator"), "getNextPage", array(), "method") != $this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method"))) {
                // line 68
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_inchiriez_list"), "html", null, true);
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
            // line 70
            echo "        </div>
        <div class=\"sep\"></div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Default:inchiriezAnnouncements.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
