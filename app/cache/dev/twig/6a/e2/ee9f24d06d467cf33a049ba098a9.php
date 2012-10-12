<?php

/* AdminAdminBundle:Default:annDetails.html.twig */
class __TwigTemplate_6ae2ee9f24d06d467cf33a049ba098a9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 10
        $context["raioane"] = array("0" => "---", "1" => "Centru", "2" => "Riscani", "3" => "Ciocana", "4" => "Buiucani", "5" => "Botanica", "6" => "Posta Veche", "7" => "Telecentru");
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_javascripts($context, array $blocks = array())
    {
        // line 3
        echo "    <script src=\"/js/jquery.lightbox-0.5.js\" type=\"text/javascript\"></script>
";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"/css/jquery.lightbox.css\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "    <a href=\"javascript:;\" onclick=\"history.back();return false;\"><< Inapoi</a>
    <form method=\"POST\" action=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_modify_dau"), "html", null, true);
        echo "\">
        <label>Titlu:</label> <input type=\"text\" style=\"width:500px;\" name=\"ann[title]\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "title"), "html", null, true);
        echo "\">
        <br />
        <label>Content:</label> <textarea name=\"ann[content]\" style=\"width:500px; height:150px;\">";
        // line 17
        echo $this->env->getExtension('website_extension')->nl2br($this->getAttribute($this->getContext($context, "dau_details"), "content"));
        echo "</textarea>
        <br />
        <label>Price:</label> <input type=\"text\" name=\"ann[price]\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "price"), "html", null, true);
        echo "\">
        <br />
        <label>Adresa:</label> <input type=\"text\" name=\"ann[address]\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "address"), "html", null, true);
        echo "\">
        <br />
        <label>Telefon fix:</label> <input type=\"text\" name=\"ann[fix]\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "fix"), "html", null, true);
        echo "\">
        <br />
        <label>Telefon mobil:</label> <input type=\"text\" name=\"ann[mobil]\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "mobil"), "html", null, true);
        echo "\">
        <input type=\"hidden\" name=\"ann[id]\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "id"), "html", null, true);
        echo "\">
        <br />
        <input type=\"submit\" value=\"Salveaza\" class=\"btn btn-primary\">
    </form>
    <br />
    <br />
    Fotografii:
    <br />
    ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "photos"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 35
            echo "    <div style=\"float:left;text-align: center\">
        <a href=\"/uploads/";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "getPhotoPath"), "html", null, true);
            echo "\" class=\"gallery_photo\"><img src=\"/uploads/th_";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "getPhotoPath"), "html", null, true);
            echo "\"></a>
        <div style=\"height:5px;\"></div>
        <a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_delete_photo"), "html", null, true);
            echo "?photo_id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" class=\"\">
            <img src=\"/images/cross.png\">
        </a>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 43
        echo "    <script>
        \$(document).ready(function(){
            \$('.gallery_photo').lightBox({
                imageLoading: '/images/lightbox-ico-loading.gif',
                imageBtnClose: '/images/lightbox-btn-close.gif',
                imageBtnPrev: '/images/lightbox-btn-prev.gif',
                imageBtnNext: '/images/lightbox-btn-next.gif'
           });
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Default:annDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
