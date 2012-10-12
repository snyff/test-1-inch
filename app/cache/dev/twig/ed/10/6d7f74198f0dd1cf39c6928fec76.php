<?php

/* AdminAdminBundle:Default:contacts.html.twig */
class __TwigTemplate_ed106d7f74198f0dd1cf39c6928fec76 extends Twig_Template
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
    <h1>Contacte</h1>
    <div class=\"sep\"></div>
    <table class=\"table table-hover\" cellpadding=\"0\" cellspacing=\"0\">
        <tr>
            <th>
                Email
            </th>
            <th>
                Subject
            </th>
            <th>
                Content
            </th>
            <th>
                Data Adaugarii
            </th>
            <th>
                Operatiuni
            </th>
        </tr>
        ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "contact_list"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 26
            echo "            <tr>
                <td>
                    ";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "email"), "html", null, true);
            echo "
                </td>
                <td>
                    ";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "subject"), "html", null, true);
            echo "
                </td>
                <td>
                    <span style=\"font-size: 11px;\">";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "content"), "html", null, true);
            echo "</span>
                </td>
                <td>
                    ";
            // line 37
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "Y-m-d"), "html", null, true);
            echo "
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
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_delete_contacts"), "html", null, true);
            echo "?contact_id=";
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
        // line 54
        echo "    </table>
";
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Default:contacts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
