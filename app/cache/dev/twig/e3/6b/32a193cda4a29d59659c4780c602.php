<?php

/* AdminAdminBundle:Default:login.html.twig */
class __TwigTemplate_e36b32a193cda4a29d59659c4780c602 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'left_menu' => array($this, 'block_left_menu'),
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

    // line 2
    public function block_left_menu($context, array $blocks = array())
    {
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"\">
        <form method=\"post\" action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_excute_login"), "html", null, true);
        echo "\">
            <table align=\"center\">
                <tr>
                    <td>
                        <label for=\"\">User</label>
                        <input type=\"text\" name=\"user\" required=\"required\">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for=\"\">Password</label>
                        <input type=\"password\" name=\"password\" required=\"required\">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type=\"submit\" class=\"btn btn-primary\" value=\"Enter\">
                    </td>
                </tr>
            </table>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Default:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
