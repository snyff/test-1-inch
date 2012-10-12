<?php

/* AdminAdminBundle:Default:annSettings.html.twig */
class __TwigTemplate_fdf0895cdd0357969feb463c9c5bcec8 extends Twig_Template
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

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "    <h1>Setari anunturi</h1>
    <form method=\"POST\" action=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AdminAdminBundle_ann_settings"), "html", null, true);
        echo "\">
        <b>La adaugarea toate anunturile sunt:</b>
        <br/>
        <input type=\"radio\" name=\"accept_status\" value=\"a\" ";
        // line 7
        if (($this->getAttribute($this->getContext($context, "ann_settings"), "default_accept_status") == "a")) {
            echo "checked=\"checked\"";
        }
        echo "> automat vizibile pe site
        <br/>
        <input type=\"radio\" name=\"accept_status\" value=\"w\" ";
        // line 9
        if (($this->getAttribute($this->getContext($context, "ann_settings"), "default_accept_status") == "w")) {
            echo "checked=\"checked\"";
        }
        echo "> puse in asteptare, se asteapta validarea moderatorului
        <br/>
        <br/>
        <hr />
        Cind se adauga un anunt urmatoarele adrese sa primeasca email de instiintare:
        <br/>
        <input type=\"text\" name=\"emails\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ann_settings"), "notification_emails"), "html", null, true);
        echo "\" style=\"width:500px;\">
        <br/>
        <span style=\"font-style: italic;font-size: 11px\">(Introduceti adresele de email prin virgula. Daca nu doriti sa fie trimis email lasati acest cimp gol)</span>
        <br/>
        <br/>
        <hr />
        Cind se completeaza pagina \"Contacte\" urmatoarele adrese sa primeasca email de instiintare:
        <br/>
        <input type=\"text\" name=\"contacts_emails\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ann_settings"), "notification_emails_contacts"), "html", null, true);
        echo "\" style=\"width:500px;\">
        <br/>
        <span style=\"font-style: italic;font-size: 11px\">(Introduceti adresele de email prin virgula. Daca nu doriti sa fie trimis email lasati acest cimp gol)</span>
        
        <br/>
        <br/>
        
        <input type=\"submit\" value=\"Salveaza\" class=\"btn btn-primary\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Default:annSettings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
