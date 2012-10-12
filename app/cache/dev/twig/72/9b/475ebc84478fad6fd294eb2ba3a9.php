<?php

/* DauDauBundle:Default:sitemap.html.twig */
class __TwigTemplate_729b475ebc84478fad6fd294eb2ba3a9 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?xml version='1.0' encoding='UTF-8'?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "items"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 4
            echo "    <url>
        <loc>http://www.inchiriere.md";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "url"), "html", null, true);
            echo "</loc>
        <lastmod>";
            // line 6
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "Y-m-d"), "html", null, true);
            echo "</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 11
        echo "    <url>
        <loc>http://www.inchiriere.md/</loc>
        <lastmod>";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "items"), 0, array(), "array"), "added"), "Y-m-d"), "html", null, true);
        echo "</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
</urlset>
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Default:sitemap.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
