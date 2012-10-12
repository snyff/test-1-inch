<?php

/* DauDauBundle:Dau:inchiriezAnnouncements.html.twig */
class __TwigTemplate_69094a47ed200f5f896dcd3bf42f60c1 extends Twig_Template
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
        echo "    <div class=\"sep\"></div>
    <h1>Ultimile anunturi: Inchiriez</h1>
    <div class=\"sep\"></div>
    <table class=\"ann_table\" cellpadding=\"0\" cellspacing=\"0\">
        ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "paginator"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 17
            echo "            <tr>
                <td>
                    <a href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_inchiriez_details", array("id" => $this->getAttribute($this->getContext($context, "item"), "id"), "title_slug" => $this->getAttribute($this->getContext($context, "item"), "titleslug"))), "html", null, true);
            echo "\" class=\"ann_link\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->stripslashes($this->env->getExtension('website_extension')->no_title($this->env->getExtension('website_extension')->truncate($this->getAttribute($this->getContext($context, "item"), "title"), 0, 60, "..."))), "html", null, true);
            echo "</a>
                </td>
                <td class=\"ann_details\">
                    ";
            // line 22
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "Y-m-d"), "html", null, true);
            echo "
                </td>
                <td class=\"ann_details\">
                    ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "price"), "html", null, true);
            echo " euro
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 29
        echo "    </table>
    
    ";
        // line 31
        if ($this->getAttribute($this->getContext($context, "paginator"), "haveToPaginate")) {
            // line 32
            echo "        <div class=\"sep\"></div>
        <div class=\"pagination\">
            ";
            // line 34
            if (($this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method") != 1)) {
                // line 35
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_inchiriezAnnouncements"), "html", null, true);
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
            // line 37
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "paginator"), "getLinks", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["paginator_page"]) {
                // line 38
                echo "                ";
                if (($this->getContext($context, "paginator_page") == $this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method"))) {
                    // line 39
                    echo "                    <span class=\"active_page\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "paginator_page"), "html", null, true);
                    echo "</span>
                ";
                } else {
                    // line 41
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_inchiriezAnnouncements"), "html", null, true);
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
                // line 43
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paginator_page'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 44
            echo "            ";
            if (($this->getAttribute($this->getContext($context, "paginator"), "getNextPage", array(), "method") != $this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method"))) {
                // line 45
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_inchiriezAnnouncements"), "html", null, true);
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
            // line 47
            echo "        </div>
        <div class=\"sep\"></div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:inchiriezAnnouncements.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
