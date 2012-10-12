<?php

/* DauDauBundle:Dau:secretHash.html.twig */
class __TwigTemplate_93b3bbac7bd520d57b4f40ea5b4792b6 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Buna ziua,

pentru a sterge anuntul postat de Dvs va rugam sa accesati link-ul de mai jos:
<a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("DauDauBundle_delete_dau", array("secret_hash" => $this->getContext($context, "secret_hash"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("DauDauBundle_delete_dau", array("secret_hash" => $this->getContext($context, "secret_hash"))), "html", null, true);
        echo "</a>";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:secretHash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
