<?php

/* Pa/json/index.html.twig */
class __TwigTemplate_07a742539f0e07fab96d077df95398f2c2fe317eb0c5b20dfad2e337de4067be extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base_pa.html.twig", "Pa/json/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'menu' => array($this, 'block_menu'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base_pa.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e51ddda1a8d8b0d8a1348314963cba517c3605a5e69229ae7404cfa478d21bcf = $this->env->getExtension("native_profiler");
        $__internal_e51ddda1a8d8b0d8a1348314963cba517c3605a5e69229ae7404cfa478d21bcf->enter($__internal_e51ddda1a8d8b0d8a1348314963cba517c3605a5e69229ae7404cfa478d21bcf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Pa/json/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e51ddda1a8d8b0d8a1348314963cba517c3605a5e69229ae7404cfa478d21bcf->leave($__internal_e51ddda1a8d8b0d8a1348314963cba517c3605a5e69229ae7404cfa478d21bcf_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_3023c7d36cc6352556f5409101432f4e196a2668f01041dee99e9ec9f5438b1a = $this->env->getExtension("native_profiler");
        $__internal_3023c7d36cc6352556f5409101432f4e196a2668f01041dee99e9ec9f5438b1a->enter($__internal_3023c7d36cc6352556f5409101432f4e196a2668f01041dee99e9ec9f5438b1a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "
";
        // line 5
        $this->displayBlock('menu', $context, $blocks);
        // line 8
        echo "
<span class=\"url_photos_api\">";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["url_photos_api"]) ? $context["url_photos_api"] : $this->getContext($context, "url_photos_api")), "html", null, true);
        echo "</span>

    <div class=\"container content\">

        <h3>Liste des lignes à exporter en JSON</h3>
            
         <div class=\"row col-xs-12 col-lg-12\" style=\"margin-left:5px;\">
                <div class=\"panel panel-success\">
                    <div class=\"panel-heading\">Liste des lignes
                        <!--<select  class=\"date_select\" style=\"margin-bottom:3px;\">
                            <option value=\"-\">Choisir une date</option>
                            ";
        // line 20
        if (array_key_exists("listDates", $context)) {
            // line 21
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listDates"]) ? $context["listDates"] : $this->getContext($context, "listDates")));
            foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
                // line 22
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "date", array(), "array"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "date", array(), "array"), "html", null, true);
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "                            ";
        }
        // line 25
        echo "                        </select>-->
                    </div>

                <div class=\"panel-body\">
                    <div style=\"width: 100% !important; overflow: scroll; height: 57vh;\"/>
                        <table class=\"table table-bordered table-condensed\" style=\"margin-top:4px;font-size:0.9em;\" >

                            <thead>
                                <tr>
                                    <th>Actions</th>
                                    <th>Ligne</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 40
        if (array_key_exists("listLignes", $context)) {
            // line 41
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listLignes"]) ? $context["listLignes"] : $this->getContext($context, "listLignes")));
            foreach ($context['_seq'] as $context["_key"] => $context["ligne"]) {
                // line 42
                echo "                                    <tr>
                                        <td class=\"text-center\">
                                            <button class=\"btn btn-xs btn-success generate-zip-file\">Zipper photos</button>
                                            <button class=\"btn btn-xs btn-success generate-json\">Générer JSON</button>
                                        </td>
                                        <td><span class=\"ligne\">";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute($context["ligne"], "ligne", array(), "array"), "html", null, true);
                echo "</span></td>
                                        <td><span class=\"date\">";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute($context["ligne"], "date", array(), "array"), "html", null, true);
                echo "</span></td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ligne'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "                                ";
        }
        // line 52
        echo "                            </tbody>
                        </table>

        </div>
    </div><!-- container navigation-->

";
        
        $__internal_3023c7d36cc6352556f5409101432f4e196a2668f01041dee99e9ec9f5438b1a->leave($__internal_3023c7d36cc6352556f5409101432f4e196a2668f01041dee99e9ec9f5438b1a_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_72c13cc5803e0da6e7aa2fdd975ebe0fbd9b65b99bdb5d70dfe5aca714e582c1 = $this->env->getExtension("native_profiler");
        $__internal_72c13cc5803e0da6e7aa2fdd975ebe0fbd9b65b99bdb5d70dfe5aca714e582c1->enter($__internal_72c13cc5803e0da6e7aa2fdd975ebe0fbd9b65b99bdb5d70dfe5aca714e582c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "    ";
        $this->displayParentBlock("menu", $context, $blocks);
        echo "
";
        
        $__internal_72c13cc5803e0da6e7aa2fdd975ebe0fbd9b65b99bdb5d70dfe5aca714e582c1->leave($__internal_72c13cc5803e0da6e7aa2fdd975ebe0fbd9b65b99bdb5d70dfe5aca714e582c1_prof);

    }

    // line 60
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_7bb970ad06cfdb9d3dd332b91dfa82dbc664785edc800602d2393f9c09be20ae = $this->env->getExtension("native_profiler");
        $__internal_7bb970ad06cfdb9d3dd332b91dfa82dbc664785edc800602d2393f9c09be20ae->enter($__internal_7bb970ad06cfdb9d3dd332b91dfa82dbc664785edc800602d2393f9c09be20ae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 61
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/pa/fiches/json.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_7bb970ad06cfdb9d3dd332b91dfa82dbc664785edc800602d2393f9c09be20ae->leave($__internal_7bb970ad06cfdb9d3dd332b91dfa82dbc664785edc800602d2393f9c09be20ae_prof);

    }

    public function getTemplateName()
    {
        return "Pa/json/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 62,  167 => 61,  161 => 60,  151 => 6,  145 => 5,  132 => 52,  129 => 51,  120 => 48,  116 => 47,  109 => 42,  104 => 41,  102 => 40,  85 => 25,  82 => 24,  71 => 22,  66 => 21,  64 => 20,  50 => 9,  47 => 8,  45 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'base_pa.html.twig' %}*/
/* */
/* {% block body %}*/
/* */
/* {% block menu %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* <span class="url_photos_api">{{url_photos_api}}</span>*/
/* */
/*     <div class="container content">*/
/* */
/*         <h3>Liste des lignes à exporter en JSON</h3>*/
/*             */
/*          <div class="row col-xs-12 col-lg-12" style="margin-left:5px;">*/
/*                 <div class="panel panel-success">*/
/*                     <div class="panel-heading">Liste des lignes*/
/*                         <!--<select  class="date_select" style="margin-bottom:3px;">*/
/*                             <option value="-">Choisir une date</option>*/
/*                             {% if listDates is defined %}*/
/*                                 {% for date in listDates %}*/
/*                                     <option value="{{ date['date'] }}">{{ date['date'] }}</option>*/
/*                                 {% endfor %}*/
/*                             {% endif %}*/
/*                         </select>-->*/
/*                     </div>*/
/* */
/*                 <div class="panel-body">*/
/*                     <div style="width: 100% !important; overflow: scroll; height: 57vh;"/>*/
/*                         <table class="table table-bordered table-condensed" style="margin-top:4px;font-size:0.9em;" >*/
/* */
/*                             <thead>*/
/*                                 <tr>*/
/*                                     <th>Actions</th>*/
/*                                     <th>Ligne</th>*/
/*                                     <th>Date</th>*/
/*                                 </tr>*/
/*                             </thead>*/
/*                             <tbody>*/
/*                                 {% if listLignes is defined %}*/
/*                                 {% for ligne in listLignes %}*/
/*                                     <tr>*/
/*                                         <td class="text-center">*/
/*                                             <button class="btn btn-xs btn-success generate-zip-file">Zipper photos</button>*/
/*                                             <button class="btn btn-xs btn-success generate-json">Générer JSON</button>*/
/*                                         </td>*/
/*                                         <td><span class="ligne">{{ligne['ligne']}}</span></td>*/
/*                                         <td><span class="date">{{ligne['date']}}</span></td>*/
/*                                     </tr>*/
/*                                 {% endfor %}*/
/*                                 {% endif %}*/
/*                             </tbody>*/
/*                         </table>*/
/* */
/*         </div>*/
/*     </div><!-- container navigation-->*/
/* */
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/*     <script src="{{ asset('js/pa/fiches/json.js') }}"></script>*/
/* {% endblock %}*/
/* */
/* */
/* */
