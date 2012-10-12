<?php

/* AdminAdminBundle:Default:_extern_ann.html.twig */
class __TwigTemplate_3edfc4b34ad549f6486dcad863a13ab3 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>Anunturi externe</h1>
<input type=\"button\" value=\"999\" class=\"btn btn-primary\" onclick=\"window.location='";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_999_list"), "html", null, true);
        echo "'\">
<input type=\"button\" value=\"Makler\" class=\"btn btn-primary\" onclick=\"window.location='";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_makler_list"), "html", null, true);
        echo "'\">";
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Default:_extern_ann.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
