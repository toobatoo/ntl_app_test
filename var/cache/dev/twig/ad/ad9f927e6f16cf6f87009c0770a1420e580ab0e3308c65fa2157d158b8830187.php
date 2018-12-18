<?php

/* FOSUserBundle:Security:login_content.html.twig */
class __TwigTemplate_e3f66a986dc094e0a039390c1c6c0e368cb3bd86de36732c2e970e5cb438a502 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_acc29dfe684c07363ef37b71676a90dee310ed9fe549c9661fab59ceb8d1a8eb = $this->env->getExtension("native_profiler");
        $__internal_acc29dfe684c07363ef37b71676a90dee310ed9fe549c9661fab59ceb8d1a8eb->enter($__internal_acc29dfe684c07363ef37b71676a90dee310ed9fe549c9661fab59ceb8d1a8eb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Security:login_content.html.twig"));

        // line 1
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 2
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
            echo "</div>
";
        }
        // line 4
        echo "
<form action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

    <label for=\"username\">";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username"), "html", null, true);
        echo "</label>
    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" />

    <label for=\"password\">";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password"), "html", null, true);
        echo "</label>
    <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" />

    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
    <label for=\"remember_me\">";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me"), "html", null, true);
        echo "</label>

    <input type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit"), "html", null, true);
        echo "\" />
</form>
";
        
        $__internal_acc29dfe684c07363ef37b71676a90dee310ed9fe549c9661fab59ceb8d1a8eb->leave($__internal_acc29dfe684c07363ef37b71676a90dee310ed9fe549c9661fab59ceb8d1a8eb_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 17,  58 => 15,  51 => 11,  46 => 9,  42 => 8,  37 => 6,  33 => 5,  30 => 4,  24 => 2,  22 => 1,);
    }
}
/* {% if error %}*/
/*     <div>{{ error.messageKey|trans(error.messageData, 'security') }}</div>*/
/* {% endif %}*/
/* */
/* <form action="{{ path("fos_user_security_check") }}" method="post">*/
/*     <input type="hidden" name="_csrf_token" value="{{ csrf_token }}" />*/
/* */
/*     <label for="username">{{ 'security.login.username'|trans }}</label>*/
/*     <input type="text" id="username" name="_username" value="{{ last_username }}" required="required" />*/
/* */
/*     <label for="password">{{ 'security.login.password'|trans }}</label>*/
/*     <input type="password" id="password" name="_password" required="required" />*/
/* */
/*     <input type="checkbox" id="remember_me" name="_remember_me" value="on" />*/
/*     <label for="remember_me">{{ 'security.login.remember_me'|trans }}</label>*/
/* */
/*     <input type="submit" id="_submit" name="_submit" value="{{ 'security.login.submit'|trans }}" />*/
/* </form>*/
/* */
