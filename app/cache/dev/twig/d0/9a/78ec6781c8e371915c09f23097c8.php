<?php

/* DauDauBundle:Dau:adminDauNotify.html.twig */
class __TwigTemplate_d09a78ec6781c8e371915c09f23097c8 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["raioane"] = array("0" => "---", "1" => "Centru", "2" => "Riscani", "3" => "Ciocana", "4" => "Buiucani", "5" => "Botanica", "6" => "Posta Veche", "7" => "Telecentru");
        // line 4
        echo "A fost postat un nou anunt pe inchiriere.md. Detalii:
<br />
<br />
<table>
    <tr>
        <td>
            Titlu:
        </td>
        <td>
            ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "title"), "html", null, true);
        echo "
        </td>
    </tr>
    <tr>
        <td>
            Continut:
        </td>
        <td>
            ";
        // line 21
        echo $this->env->getExtension('website_extension')->nl2br($this->getAttribute($this->getContext($context, "dau_details"), "content"));
        echo "
        </td>
    </tr>
    <tr>
        <td>
            Pret:
        </td>
        <td>
            ";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "price"), "html", null, true);
        echo "
        </td>
    </tr>
    <tr>
        <td>
            Adresa:
        </td>
        <td>
            Chisinau (";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "raioane"), $this->getAttribute($this->getContext($context, "dau_details"), "raion"), array(), "array"), "html", null, true);
        echo "), ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "address"), "html", null, true);
        echo "
        </td>
    </tr>
    <tr>
        <td>
            Contacte:
        </td>
        <td>
            ";
        // line 45
        if ($this->getAttribute($this->getContext($context, "dau_details"), "fix")) {
            // line 46
            echo "                <span style=\"font-size: 15px\">22</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "fix"), "html", null, true);
            echo "
                &nbsp;
                <span class=\"price_span\">|</span>&nbsp;
            ";
        }
        // line 50
        echo "            ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "mobil"), "html", null, true);
        echo "
        </td>
    </tr>
    <tr>
        <td>
            Fotografii:
        </td>
        <td>
            ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "photos"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 59
            echo "                <img src=\"http://inchiriere.md/uploads/th_";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "getPhotoPath"), "html", null, true);
            echo "\">
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 61
        echo "        </td>
    </tr>
    <tr>
        <td>
            Operatii:
        </td>
        <td>
            <a href=\"http://inchiriere.md";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_accept_ann_admin"), "html", null, true);
        echo "?hash=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "getSecretHash"), "html", null, true);
        echo "ahtr&type=accept\">Accepta</a>
            <br />
            <a href=\"http://inchiriere.md";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("DauDauBundle_accept_ann_admin"), "html", null, true);
        echo "?hash=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "getSecretHash"), "html", null, true);
        echo "ahtr&type=delete\">Sterge</a>
        </td>
    </tr>
</table>

    
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:adminDauNotify.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
