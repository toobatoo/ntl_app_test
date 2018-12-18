<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_b4e77d9208d51942ba6e1bcd7b96a0eb34436bf068958e7c7776328a06d851b2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Security:login.html.twig", 1);
        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3cdf6a1f0514a58fa6c8333cfa1922809749891660a0123d9f99b94791146818 = $this->env->getExtension("native_profiler");
        $__internal_3cdf6a1f0514a58fa6c8333cfa1922809749891660a0123d9f99b94791146818->enter($__internal_3cdf6a1f0514a58fa6c8333cfa1922809749891660a0123d9f99b94791146818_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Security:login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3cdf6a1f0514a58fa6c8333cfa1922809749891660a0123d9f99b94791146818->leave($__internal_3cdf6a1f0514a58fa6c8333cfa1922809749891660a0123d9f99b94791146818_prof);

    }

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_1568f0ba30efa511145f2d6bc619eb66b2124e742ee8ed51d0a98854654103e4 = $this->env->getExtension("native_profiler");
        $__internal_1568f0ba30efa511145f2d6bc619eb66b2124e742ee8ed51d0a98854654103e4->enter($__internal_1568f0ba30efa511145f2d6bc619eb66b2124e742ee8ed51d0a98854654103e4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 6
        echo "    ";
        echo twig_include($this->env, $context, "FOSUserBundle:Security:login_content.html.twig");
        echo "
";
        
        $__internal_1568f0ba30efa511145f2d6bc619eb66b2124e742ee8ed51d0a98854654103e4->leave($__internal_1568f0ba30efa511145f2d6bc619eb66b2124e742ee8ed51d0a98854654103e4_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  34 => 5,  11 => 1,);
    }
}
/* {% extends "FOSUserBundle::layout.html.twig" %}*/
/* */
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* */
/* {% block fos_user_content %}*/
/*     {{ include('FOSUserBundle:Security:login_content.html.twig') }}*/
/* {% endblock fos_user_content %}*/
/* */
