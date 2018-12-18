<?php

/* base.html.twig */
class __TwigTemplate_e0101c1f9faf7a3103b87785d0afadb1e2de49cbde1eafe5e0a3718c68be68e5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'metas' => array($this, 'block_metas'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3e62d0b002cf0f79aaf3f3656cdd5616fefcabfc9c7f36ee27dbb8ae336a90d0 = $this->env->getExtension("native_profiler");
        $__internal_3e62d0b002cf0f79aaf3f3656cdd5616fefcabfc9c7f36ee27dbb8ae336a90d0->enter($__internal_3e62d0b002cf0f79aaf3f3656cdd5616fefcabfc9c7f36ee27dbb8ae336a90d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('metas', $context, $blocks);
        // line 7
        echo "       
        ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "       
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div class=\"text-center loader\"></div>
        ";
        // line 17
        $this->displayBlock('body', $context, $blocks);
        // line 18
        echo "       
        ";
        // line 19
        $this->displayBlock('javascripts', $context, $blocks);
        // line 26
        echo " 
    </body>
</html>
";
        
        $__internal_3e62d0b002cf0f79aaf3f3656cdd5616fefcabfc9c7f36ee27dbb8ae336a90d0->leave($__internal_3e62d0b002cf0f79aaf3f3656cdd5616fefcabfc9c7f36ee27dbb8ae336a90d0_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_f4bef3ca061bfe3368d7882e3dc502704616cda81cdc49039df36d8c2712423c = $this->env->getExtension("native_profiler");
        $__internal_f4bef3ca061bfe3368d7882e3dc502704616cda81cdc49039df36d8c2712423c->enter($__internal_f4bef3ca061bfe3368d7882e3dc502704616cda81cdc49039df36d8c2712423c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "RATP - Noctilien";
        
        $__internal_f4bef3ca061bfe3368d7882e3dc502704616cda81cdc49039df36d8c2712423c->leave($__internal_f4bef3ca061bfe3368d7882e3dc502704616cda81cdc49039df36d8c2712423c_prof);

    }

    // line 6
    public function block_metas($context, array $blocks = array())
    {
        $__internal_a8a3a8ff38273cd04d7be371c258ed3b95395320cbed34810e1897d3c39a3158 = $this->env->getExtension("native_profiler");
        $__internal_a8a3a8ff38273cd04d7be371c258ed3b95395320cbed34810e1897d3c39a3158->enter($__internal_a8a3a8ff38273cd04d7be371c258ed3b95395320cbed34810e1897d3c39a3158_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "metas"));

        
        $__internal_a8a3a8ff38273cd04d7be371c258ed3b95395320cbed34810e1897d3c39a3158->leave($__internal_a8a3a8ff38273cd04d7be371c258ed3b95395320cbed34810e1897d3c39a3158_prof);

    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_4ffda17b4494c4f19f5c63490f359dd1b90c7b68b9a7bfa5176f11d31b02472f = $this->env->getExtension("native_profiler");
        $__internal_4ffda17b4494c4f19f5c63490f359dd1b90c7b68b9a7bfa5176f11d31b02472f->enter($__internal_4ffda17b4494c4f19f5c63490f359dd1b90c7b68b9a7bfa5176f11d31b02472f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 9
        echo "            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap/dist/css/bootstrap.min.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/general.css"), "html", null, true);
        echo "\">
        ";
        
        $__internal_4ffda17b4494c4f19f5c63490f359dd1b90c7b68b9a7bfa5176f11d31b02472f->leave($__internal_4ffda17b4494c4f19f5c63490f359dd1b90c7b68b9a7bfa5176f11d31b02472f_prof);

    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        $__internal_9eee7529f11384c12ea6e80fd886cfce6a8bfbf1b8013fdbf052755fc6db8dd7 = $this->env->getExtension("native_profiler");
        $__internal_9eee7529f11384c12ea6e80fd886cfce6a8bfbf1b8013fdbf052755fc6db8dd7->enter($__internal_9eee7529f11384c12ea6e80fd886cfce6a8bfbf1b8013fdbf052755fc6db8dd7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_9eee7529f11384c12ea6e80fd886cfce6a8bfbf1b8013fdbf052755fc6db8dd7->leave($__internal_9eee7529f11384c12ea6e80fd886cfce6a8bfbf1b8013fdbf052755fc6db8dd7_prof);

    }

    // line 19
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_bdc1e8448a8ad5c0d86e287039b47ad21794ed5732ca9854f1a89f2ab6312812 = $this->env->getExtension("native_profiler");
        $__internal_bdc1e8448a8ad5c0d86e287039b47ad21794ed5732ca9854f1a89f2ab6312812->enter($__internal_bdc1e8448a8ad5c0d86e287039b47ad21794ed5732ca9854f1a89f2ab6312812_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 20
        echo "            <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/general.js"), "html", null, true);
        echo "\"></script>
        ";
        
        $__internal_bdc1e8448a8ad5c0d86e287039b47ad21794ed5732ca9854f1a89f2ab6312812->leave($__internal_bdc1e8448a8ad5c0d86e287039b47ad21794ed5732ca9854f1a89f2ab6312812_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 24,  144 => 23,  140 => 22,  136 => 21,  131 => 20,  125 => 19,  114 => 17,  105 => 10,  100 => 9,  94 => 8,  83 => 6,  71 => 5,  61 => 26,  59 => 19,  56 => 18,  54 => 17,  47 => 13,  44 => 12,  42 => 8,  39 => 7,  37 => 6,  33 => 5,  27 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}RATP - Noctilien{% endblock %}</title>*/
/*         {% block metas %}{% endblock %}*/
/*        */
/*         {% block stylesheets %}*/
/*             <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">*/
/*             <link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">*/
/*         {% endblock %}*/
/*        */
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         <div class="text-center loader"></div>*/
/*         {% block body %}{% endblock %}*/
/*        */
/*         {% block javascripts %}*/
/*             <script type="text/javascript" src="{{ asset('jquery/dist/jquery.min.js') }}"></script>*/
/*             <script type="text/javascript" src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>*/
/*             <script src="{{ asset('bundles/fosjsrouting/js/router.js') }}"></script>*/
/*             <script src="{{ path('fos_js_routing_js', { callback: 'fos.Router.setData' }) }}"></script>*/
/*             <script type="text/javascript" src="{{ asset('js/general.js') }}"></script>*/
/*         {% endblock %}*/
/*  */
/*     </body>*/
/* </html>*/
/* */
