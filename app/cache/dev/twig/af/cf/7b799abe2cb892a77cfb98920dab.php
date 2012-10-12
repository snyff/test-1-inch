<?php

/* DauDauBundle:Dau:dauAnnouncements.html.twig */
class __TwigTemplate_afcf7b799abe2cb892a77cfb98920dab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'homepage_middle' => array($this, 'block_homepage_middle'),
            'homepage_search' => array($this, 'block_homepage_search'),
            'homepage_last_announcements' => array($this, 'block_homepage_last_announcements'),
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'canonical' => array($this, 'block_canonical'),
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

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "page_title"), "html", null, true);
    }

    // line 6
    public function block_keywords($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "keywords"), "html", null, true);
    }

    // line 7
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "description"), "html", null, true);
    }

    // line 8
    public function block_canonical($context, array $blocks = array())
    {
        echo $this->getAttribute($this->getContext($context, "seo"), "canonical");
    }

    // line 10
    public function block_main_block($context, array $blocks = array())
    {
        // line 11
        echo "    <div class=\"sep\"></div>
    <div class=\"breadcrumb\" itemscope itemtype=\"http://schema.org/WebPage\">
        <span itemprop=\"breadcrumb\">
            ";
        // line 14
        echo $this->getAttribute($this->getContext($context, "seo"), "breadcrumb");
        echo "
        </span>
    </div>
    <div class=\"sep\"></div>
    <h1>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "h1_search_title"), "html", null, true);
        echo "</h1>
    
    <div class=\"sep\"></div>
    ";
        // line 21
        $this->env->loadTemplate("DauDauBundle:Default:search_form.html.twig")->display($context);
        // line 22
        echo "    <div class=\"sep\"></div>
    ";
        // line 23
        $this->env->loadTemplate("DauDauBundle:Default:dau_list.html.twig")->display($context);
        // line 24
        echo "    
    ";
        // line 25
        if ($this->getAttribute($this->getContext($context, "paginator"), "haveToPaginate")) {
            // line 26
            echo "        <div class=\"sep\"></div>
        <div class=\"pagination\">
            ";
            // line 28
            if ($this->getContext($context, "is_seo")) {
                echo " ";
                // line 29
                echo "                ";
                $context["pagination_path"] = ($this->getContext($context, "query_string") . "?");
                // line 30
                echo "            ";
            } else {
                echo " ";
                // line 31
                echo "                ";
                $context["pagination_path"] = (($this->env->getExtension('routing')->getPath("DauDauBundle_dauAnnouncements") . "?") . $this->getContext($context, "query_string"));
                // line 32
                echo "            ";
            }
            // line 33
            echo "            ";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array("search", ), "method") == 1)) {
                // line 34
                echo "                ";
                $context["pagination_path"] = ($this->getContext($context, "pagination_path") . "&");
                // line 35
                echo "            ";
            }
            // line 36
            echo "            
            ";
            // line 37
            if (($this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method") != 1)) {
                // line 38
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "pagination_path"), "html", null, true);
                echo "page=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "paginator"), "getPreviousPage", array(), "method"), "html", null, true);
                echo "\" class=\"pagination_prev\">Prev</a>
            ";
            }
            // line 40
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "paginator"), "getLinks", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["paginator_page"]) {
                // line 41
                echo "                ";
                if (($this->getContext($context, "paginator_page") == $this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method"))) {
                    // line 42
                    echo "                    <span class=\"active_page\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "paginator_page"), "html", null, true);
                    echo "</span>
                ";
                } else {
                    // line 44
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "pagination_path"), "html", null, true);
                    echo "page=";
                    echo twig_escape_filter($this->env, $this->getContext($context, "paginator_page"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "paginator_page"), "html", null, true);
                    echo "</a>
                ";
                }
                // line 46
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paginator_page'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 47
            echo "            ";
            if (($this->getAttribute($this->getContext($context, "paginator"), "getNextPage", array(), "method") != $this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method"))) {
                // line 48
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "pagination_path"), "html", null, true);
                echo "page=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "paginator"), "getNextPage", array(), "method"), "html", null, true);
                echo "\" class=\"pagination_next\">Next</a>
            ";
            }
            // line 50
            echo "        </div>
        <div class=\"sep\"></div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:dauAnnouncements.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
