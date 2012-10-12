<?php

/* AdminAdminBundle:Default:ann_999.html.twig */
class __TwigTemplate_b48af746f060ed463190c7657753c470 extends Twig_Template
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
    ";
        // line 5
        $this->env->loadTemplate("AdminAdminBundle:Default:_extern_ann.html.twig")->display($context);
        // line 6
        echo "    <h1>Anunturi 999</h1>
    <div class=\"sep\"></div>
    <table class=\"table table-hover\" cellpadding=\"0\" cellspacing=\"0\">
        <tr>
            <th>
                ID
            </th>
            <th>
                Title
            </th>
            <th>
                Description
            </th>
            <th>
                Pret
            </th>
            <th>
                Adaugat
            </th>
            <th>
                Operatiuni
            </th>
        </tr>
        ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "ann"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 30
            echo "            <tr>
                <td>
                    <span style=\"font-size: 11px;\" class=\"ann_id\">";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "</span>
                </td>
                <td>
                    <span style=\"font-size: 11px;\" class=\"ann_title\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "title"), "html", null, true);
            echo "</span>
                </td>
                <td>
                    <span style=\"font-size: 11px;\" class=\"ann_desc\">";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "description"), "html", null, true);
            echo "</span>
                </td>
                <td>
                    <span style=\"font-size: 11px;\"><span class=\"ann_price\">";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "price"), "html", null, true);
            echo "</span>&euro;</span>
                </td>
                <td>
                    <span style=\"font-size: 11px;\" class=\"ann_date\">";
            // line 44
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "date"), "Y-m-d"), "html", null, true);
            echo "</span>
                </td>
                <td width=\"155\">
                    <ul class=\"nav nav-pills\" style=\"margin:0\">
                        <li class=\"dropdown\">
                            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"javascript:;\">
                                Options
                                <b class=\"caret\"></b>
                            </a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"\" onclick=\"return confirm('Confirmati?')\"><i class=\"icon-plus\"></i>&nbsp;Add</a></li>
                                <li><a href=\"\" onclick=\"return confirm('Confirmati?')\"><i class=\"icon-zoom-in\"></i>&nbsp;Check user/phone</a></li>
                                <li class=\"divider\"></li>
                                <li><a href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_delete_contacts"), "html", null, true);
            echo "?contact_id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" onclick=\"return confirm('Confirmati?')\"><i class=\"icon-trash\"></i>&nbsp;Delete</a></li>
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
        // line 64
        echo "    </table>
";
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Default:ann_999.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
