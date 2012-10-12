<?php

/* DauDauBundle:Dau:addPhoto.html.twig */
class __TwigTemplate_d8f3edd92de995c2c13104f2ef10944e extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" id=\"photo_form\">
    ";
        // line 2
        if (($this->getContext($context, "error") == 1)) {
            // line 3
            echo "        Fisierul nu este imagine.
    ";
        }
        // line 5
        echo "    <span style=\"color:#666666;font-size: 12px;font-family:arial;\">Alegeti imaginea:</span>
    <input type=\"file\" name=\"photo\" onchange=\"document.getElementById('photo_form').submit();\">
    <div style=\"\"></div>
    ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "photos"));
        foreach ($context['_seq'] as $context["id"] => $context["item"]) {
            // line 9
            echo "        <div style=\"float: left;text-align: center;margin-right: 10px;margin-top: 10px;\">
            <img src=\"/uploads/th_";
            // line 10
            echo twig_escape_filter($this->env, $this->getContext($context, "item"), "html", null, true);
            echo "\" />
            <div style=\"height: 5px\"></div>
            <a href=\"?del_id=";
            // line 12
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "\" title=\"Stergeti aceasta imagine\"><img src=\"/images/cross.png\" /></a>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 15
        echo "</form>";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:addPhoto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
