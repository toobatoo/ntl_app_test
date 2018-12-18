<?php

/* Pa/home/index.html.twig */
class __TwigTemplate_3209734ecc8cfe3c700f9b66867373c6b3cdda40a030547e7635b06b2838624f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base_pa.html.twig", "Pa/home/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'menu' => array($this, 'block_menu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base_pa.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f6a68c46edbb17e9b7267002a6f16f507b45480882bcf7b74b2f37ecf72ce871 = $this->env->getExtension("native_profiler");
        $__internal_f6a68c46edbb17e9b7267002a6f16f507b45480882bcf7b74b2f37ecf72ce871->enter($__internal_f6a68c46edbb17e9b7267002a6f16f507b45480882bcf7b74b2f37ecf72ce871_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Pa/home/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f6a68c46edbb17e9b7267002a6f16f507b45480882bcf7b74b2f37ecf72ce871->leave($__internal_f6a68c46edbb17e9b7267002a6f16f507b45480882bcf7b74b2f37ecf72ce871_prof);

    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        $__internal_05e83d1d645ce5c69e0ba50231d3d1dd3d41faf3138420a385b1f35ab759a337 = $this->env->getExtension("native_profiler");
        $__internal_05e83d1d645ce5c69e0ba50231d3d1dd3d41faf3138420a385b1f35ab759a337->enter($__internal_05e83d1d645ce5c69e0ba50231d3d1dd3d41faf3138420a385b1f35ab759a337_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "
";
        // line 6
        $this->displayBlock('menu', $context, $blocks);
        // line 9
        echo "    

    <div class=\"container content\">
        <div class=\"row content\">
            <div class=\"jumbotron\">
                <h1>Noctiliens <small>Relevés points d'arrêts</small></h1>

                <p>
                    Bienvenue dans l'espace de gestion des relevés d'enquêtes.
                </p>

                    <button class=\"btn btn-success\" onclick=\"window.location.href='";
        // line 20
        echo $this->env->getExtension('routing')->getPath("bus_reporting_now");
        echo "'\"><span class=\"glyphicon glyphicon-pencil\"></span> Suivi relevés</button>
                    <button class=\"btn btn-success\"><span class=\"glyphicon glyphicon-user\"></span> Suivi enquêteurs</button>
            </div>
        </div><!-- row navigation-->
    </div><!-- container navigation-->

";
        
        $__internal_05e83d1d645ce5c69e0ba50231d3d1dd3d41faf3138420a385b1f35ab759a337->leave($__internal_05e83d1d645ce5c69e0ba50231d3d1dd3d41faf3138420a385b1f35ab759a337_prof);

    }

    // line 6
    public function block_menu($context, array $blocks = array())
    {
        $__internal_3d9d04bda3c02953990cc4087c7cbd266eaccfab604c8834c43892203ba595ad = $this->env->getExtension("native_profiler");
        $__internal_3d9d04bda3c02953990cc4087c7cbd266eaccfab604c8834c43892203ba595ad->enter($__internal_3d9d04bda3c02953990cc4087c7cbd266eaccfab604c8834c43892203ba595ad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 7
        echo "    ";
        $this->displayParentBlock("menu", $context, $blocks);
        echo "
";
        
        $__internal_3d9d04bda3c02953990cc4087c7cbd266eaccfab604c8834c43892203ba595ad->leave($__internal_3d9d04bda3c02953990cc4087c7cbd266eaccfab604c8834c43892203ba595ad_prof);

    }

    public function getTemplateName()
    {
        return "Pa/home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 7,  73 => 6,  59 => 20,  46 => 9,  44 => 6,  41 => 5,  35 => 4,  11 => 1,);
    }
}
/* {% extends 'base_pa.html.twig' %}*/
/* */
/* */
/* {% block body %}*/
/* */
/* {% block menu %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/*     */
/* */
/*     <div class="container content">*/
/*         <div class="row content">*/
/*             <div class="jumbotron">*/
/*                 <h1>Noctiliens <small>Relevés points d'arrêts</small></h1>*/
/* */
/*                 <p>*/
/*                     Bienvenue dans l'espace de gestion des relevés d'enquêtes.*/
/*                 </p>*/
/* */
/*                     <button class="btn btn-success" onclick="window.location.href='{{ path('bus_reporting_now') }}'"><span class="glyphicon glyphicon-pencil"></span> Suivi relevés</button>*/
/*                     <button class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Suivi enquêteurs</button>*/
/*             </div>*/
/*         </div><!-- row navigation-->*/
/*     </div><!-- container navigation-->*/
/* */
/* {% endblock %}*/
/* */
/* */
/* */
