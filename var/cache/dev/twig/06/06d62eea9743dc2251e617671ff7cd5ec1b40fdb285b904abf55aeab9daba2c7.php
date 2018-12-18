<?php

/* App/home/index.html.twig */
class __TwigTemplate_a5c1fc3e28d0d0b617ec9086b228274bdf72fa56b46e60e2f3618270057566e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "App/home/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_702659508cdbabe101c4e529073fd5fda7b761f4b0fc00df1189841f91fd5f50 = $this->env->getExtension("native_profiler");
        $__internal_702659508cdbabe101c4e529073fd5fda7b761f4b0fc00df1189841f91fd5f50->enter($__internal_702659508cdbabe101c4e529073fd5fda7b761f4b0fc00df1189841f91fd5f50_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "App/home/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_702659508cdbabe101c4e529073fd5fda7b761f4b0fc00df1189841f91fd5f50->leave($__internal_702659508cdbabe101c4e529073fd5fda7b761f4b0fc00df1189841f91fd5f50_prof);

    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        $__internal_11d857de91703dd40c3b960256b7725ae2ee24207ab6cb84d33ca03427fbd852 = $this->env->getExtension("native_profiler");
        $__internal_11d857de91703dd40c3b960256b7725ae2ee24207ab6cb84d33ca03427fbd852->enter($__internal_11d857de91703dd40c3b960256b7725ae2ee24207ab6cb84d33ca03427fbd852_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "    
    <div class=\"container navigation\">
        <div class=\"row navigation\">
            <nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
                <div class=\"navabar-header\">
                    <a class=\"navbar-brand\" href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\"><span class=\"glyphicon glyphicon-home\"></span> Noctilien</a>
                </div>
                <div class=\"navbar-collapse collapse navbar-right\">
                    
                </div>
            </nav>
        </div><!-- row navigation-->
    </div><!-- container navigation-->

    <div class=\"container content\">
        <div class=\"row content\">
            <div class=\"jumbotron\">
                <h1>Noctilien <small>Relevés bus et points d'arrêts</small></h1>

                <p>
                    Espace de gestion des relevés d'enquêtes sur le terrain. <br />
                    Suivant vos droits d'accès, vous pourrez consulter et mettre à jour les données. Vous accèderez également aux tableaux de rapports des résultats et les quotas de réalisations d'enquêtes.
                </p>
               <!-- <button class=\"btn btn-success\" onclick=\"document.location.href='";
        // line 28
        echo $this->env->getExtension('routing')->getPath("client_homepage");
        echo "';\">Espace client</button>-->
                <button class=\"btn btn-success\" onclick=\"document.location.href='";
        // line 29
        echo $this->env->getExtension('routing')->getPath("pa_homepage");
        echo "';\">Points d'arrêts</button>
                <button class=\"btn btn-success\" onclick=\"document.location.href='";
        // line 30
        echo $this->env->getExtension('routing')->getPath("bus_homepage");
        echo "';\">Bus</button>
            </div>
        </div><!-- row navigation-->
    </div><!-- container navigation-->

";
        
        $__internal_11d857de91703dd40c3b960256b7725ae2ee24207ab6cb84d33ca03427fbd852->leave($__internal_11d857de91703dd40c3b960256b7725ae2ee24207ab6cb84d33ca03427fbd852_prof);

    }

    public function getTemplateName()
    {
        return "App/home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 30,  72 => 29,  68 => 28,  47 => 10,  40 => 5,  34 => 4,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* */
/* {% block body %}*/
/*     */
/*     <div class="container navigation">*/
/*         <div class="row navigation">*/
/*             <nav class="navbar navbar-default navbar-fixed-top" role="navigation">*/
/*                 <div class="navabar-header">*/
/*                     <a class="navbar-brand" href="{{ path('homepage') }}"><span class="glyphicon glyphicon-home"></span> Noctilien</a>*/
/*                 </div>*/
/*                 <div class="navbar-collapse collapse navbar-right">*/
/*                     */
/*                 </div>*/
/*             </nav>*/
/*         </div><!-- row navigation-->*/
/*     </div><!-- container navigation-->*/
/* */
/*     <div class="container content">*/
/*         <div class="row content">*/
/*             <div class="jumbotron">*/
/*                 <h1>Noctilien <small>Relevés bus et points d'arrêts</small></h1>*/
/* */
/*                 <p>*/
/*                     Espace de gestion des relevés d'enquêtes sur le terrain. <br />*/
/*                     Suivant vos droits d'accès, vous pourrez consulter et mettre à jour les données. Vous accèderez également aux tableaux de rapports des résultats et les quotas de réalisations d'enquêtes.*/
/*                 </p>*/
/*                <!-- <button class="btn btn-success" onclick="document.location.href='{{path('client_homepage')}}';">Espace client</button>-->*/
/*                 <button class="btn btn-success" onclick="document.location.href='{{path('pa_homepage')}}';">Points d'arrêts</button>*/
/*                 <button class="btn btn-success" onclick="document.location.href='{{path('bus_homepage')}}';">Bus</button>*/
/*             </div>*/
/*         </div><!-- row navigation-->*/
/*     </div><!-- container navigation-->*/
/* */
/* {% endblock %}*/
/* */
/* */
/* */
