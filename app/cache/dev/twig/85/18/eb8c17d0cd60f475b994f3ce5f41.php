<?php

/* DauDauBundle:Mobile:index.html.twig */
class __TwigTemplate_8518eb8c17d0cd60f475b994f3ce5f41 extends Twig_Template
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
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "page_title"), "html", null, true);
    }

    // line 3
    public function block_keywords($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "keywords"), "html", null, true);
    }

    // line 4
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "description"), "html", null, true);
    }

    // line 6
    public function block_main_block($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        $context["raioane"] = array("0" => "---", "1" => "Centru", "2" => "Riscani", "3" => "Ciocana", "4" => "Buiucani", "5" => "Botanica", "6" => "Posta Veche", "7" => "Telecentru");
        // line 8
        echo "    ";
        $this->env->loadTemplate("DauDauBundle:Mobile:dau_list.html.twig")->display($context);
        // line 9
        echo "    ";
        if ($this->getAttribute($this->getContext($context, "paginator"), "haveToPaginate")) {
            // line 10
            echo "        <div class=\"pagination\">
            ";
            // line 11
            if ($this->getContext($context, "is_seo")) {
                echo " ";
                // line 12
                echo "                ";
                $context["pagination_path"] = ($this->getContext($context, "query_string") . "?");
                // line 13
                echo "            ";
            } else {
                echo " ";
                // line 14
                echo "                ";
                $context["pagination_path"] = (($this->env->getExtension('routing')->getPath("DauDauBundle_dauAnnouncements_mobile") . "?") . $this->getContext($context, "query_string"));
                // line 15
                echo "            ";
            }
            // line 16
            echo "            ";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array("search", ), "method") == 1)) {
                // line 17
                echo "                ";
                $context["pagination_path"] = ($this->getContext($context, "pagination_path") . "&");
                // line 18
                echo "            ";
            }
            // line 19
            echo "            <div class=\"sep\"></div>
            <div class=\"sep\"></div>
            ";
            // line 21
            if (($this->getAttribute($this->getContext($context, "paginator"), "getNextPage", array(), "method") != $this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method"))) {
                // line 22
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "pagination_path"), "html", null, true);
                echo "page=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "paginator"), "getNextPage", array(), "method"), "html", null, true);
                echo "\" class=\"more w125 r\">Next<img src=\"/images/arrow.png\" class=\"r mt3\" /></a>
            ";
            }
            // line 24
            echo "
            ";
            // line 25
            if (($this->getAttribute($this->getContext($context, "paginator"), "getPage", array(), "method") != 1)) {
                // line 26
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "pagination_path"), "html", null, true);
                echo "page=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "paginator"), "getPreviousPage", array(), "method"), "html", null, true);
                echo "\" class=\"more w125\"><img src=\"/images/arrow_left.png\" class=\"l mt3\" />Prev</a>
            ";
            }
            // line 28
            echo "        </div>
        <div class=\"sep\"></div>
    ";
        }
        // line 31
        echo "    ";
        $this->displayParentBlock("main_block", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Mobile:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
