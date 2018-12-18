<?php

/* Pa/json/re_export_home.html.twig */
class __TwigTemplate_360c3cec8f1e11b65064fc70f846b29bff1ac39f8dfb617bc212e39c0047d2cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base_pa.html.twig", "Pa/json/re_export_home.html.twig", 1);
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
        $__internal_e456f96c0fdc7dfa4c9196d4b0582e019aee2f4446459ff8a009cb8eff53d907 = $this->env->getExtension("native_profiler");
        $__internal_e456f96c0fdc7dfa4c9196d4b0582e019aee2f4446459ff8a009cb8eff53d907->enter($__internal_e456f96c0fdc7dfa4c9196d4b0582e019aee2f4446459ff8a009cb8eff53d907_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Pa/json/re_export_home.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e456f96c0fdc7dfa4c9196d4b0582e019aee2f4446459ff8a009cb8eff53d907->leave($__internal_e456f96c0fdc7dfa4c9196d4b0582e019aee2f4446459ff8a009cb8eff53d907_prof);

    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        $__internal_9e82a3783c48210f49eea2aecdd7333c618a58b2cd55d76ef745e8178f73f2c2 = $this->env->getExtension("native_profiler");
        $__internal_9e82a3783c48210f49eea2aecdd7333c618a58b2cd55d76ef745e8178f73f2c2->enter($__internal_9e82a3783c48210f49eea2aecdd7333c618a58b2cd55d76ef745e8178f73f2c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "    
";
        // line 6
        $this->displayBlock('menu', $context, $blocks);
        // line 9
        echo "
    <div class=\"container content\">

        <h3>Re-exporter un JSON</h3>
            
         <div class=\"row col-xs-12 col-lg-12\" style=\"margin-left:5px;\">
                <div class=\"panel panel-success\">
                    <div class=\"panel-heading\">
                        
                            <div class=\"input-group col-xs-6\">
                                <input type=\"text\" class=\"form-control ligne\" placeholder=\"Entrez la ligne...\">
                                <span class=\"input-group-btn\">
                                    <button class=\"btn btn-default submit\" type=\"button\">
                                        Go!
                                    </button>
                                </span>
                            </div>
                    </div>

                <div class=\"panel-body\">
                    <div style=\"width: 100% !important; overflow: scroll; height: 57vh;\"/>
                        <table class=\"table table-bordered table-condensed\" style=\"margin-top:4px;font-size:0.9em;\" >

                            <thead>
                                <tr>
                                    <th>Statut du JSON</th>
                                    <th>Date</th>
                                    <th>Ligne</th>
                                    <th>Zone</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 41
        if (array_key_exists("infos_ligne", $context)) {
            // line 42
            echo "                                ";
            if ( !twig_test_empty((isset($context["infos_ligne"]) ? $context["infos_ligne"] : $this->getContext($context, "infos_ligne")))) {
                // line 43
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["infos_ligne"]) ? $context["infos_ligne"] : $this->getContext($context, "infos_ligne")));
                foreach ($context['_seq'] as $context["_key"] => $context["infos"]) {
                    // line 44
                    echo "                                    <tr>
                                        <td>
                                            ";
                    // line 46
                    $context["date"] = twig_replace_filter($this->getAttribute($context["infos"], "date", array(), "array"), array("/" => "_"));
                    // line 47
                    echo "                                            Désactivé <input type=\"radio\" name=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "zone", array(), "array"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "html", null, true);
                    echo "\" value=\"1\"
                                                ";
                    // line 48
                    if (($this->getAttribute($context["infos"], "json", array(), "array") == 1)) {
                        // line 49
                        echo "                                                    checked
                                                ";
                    }
                    // line 51
                    echo "                                            />
                                             | 
                                            <input type=\"radio\" name=\"";
                    // line 53
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "zone", array(), "array"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "html", null, true);
                    echo "\" value=\"0\"
                                            ";
                    // line 54
                    if (($this->getAttribute($context["infos"], "json", array(), "array") == 0)) {
                        // line 55
                        echo "                                                    checked
                                                ";
                    }
                    // line 57
                    echo "                                            /> Activé
                                            <button class=\"btn btn-success btn-xs ok\" id=\"";
                    // line 58
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "zone", array(), "array"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "html", null, true);
                    echo "\" style=\"margin-left:20px;\">OK</button>
                                        </td>
                                        <td>";
                    // line 60
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "date", array(), "array"), "html", null, true);
                    echo "</td>
                                        <td>";
                    // line 61
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "ligne", array(), "array"), "html", null, true);
                    echo "</td>
                                        <td>";
                    // line 62
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "zone", array(), "array"), "html", null, true);
                    echo "</td>
                                    </tr>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['infos'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 65
                echo "                                ";
            }
            // line 66
            echo "                                ";
        }
        // line 67
        echo "                            </tbody>
                        </table>

        </div>
    </div><!-- container navigation-->

";
        
        $__internal_9e82a3783c48210f49eea2aecdd7333c618a58b2cd55d76ef745e8178f73f2c2->leave($__internal_9e82a3783c48210f49eea2aecdd7333c618a58b2cd55d76ef745e8178f73f2c2_prof);

    }

    // line 6
    public function block_menu($context, array $blocks = array())
    {
        $__internal_c5e02adaa94461c43d7830af8bf29766a50365029dd8adf99e5a3eb1a93ecf57 = $this->env->getExtension("native_profiler");
        $__internal_c5e02adaa94461c43d7830af8bf29766a50365029dd8adf99e5a3eb1a93ecf57->enter($__internal_c5e02adaa94461c43d7830af8bf29766a50365029dd8adf99e5a3eb1a93ecf57_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 7
        echo "    ";
        $this->displayParentBlock("menu", $context, $blocks);
        echo "
";
        
        $__internal_c5e02adaa94461c43d7830af8bf29766a50365029dd8adf99e5a3eb1a93ecf57->leave($__internal_c5e02adaa94461c43d7830af8bf29766a50365029dd8adf99e5a3eb1a93ecf57_prof);

    }

    // line 75
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_cc9327d49cc69c4963b5acf0b7f2d15b121d6929db2c9cdb9fbb70092b016dec = $this->env->getExtension("native_profiler");
        $__internal_cc9327d49cc69c4963b5acf0b7f2d15b121d6929db2c9cdb9fbb70092b016dec->enter($__internal_cc9327d49cc69c4963b5acf0b7f2d15b121d6929db2c9cdb9fbb70092b016dec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 76
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/pa/fiches/json.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_cc9327d49cc69c4963b5acf0b7f2d15b121d6929db2c9cdb9fbb70092b016dec->leave($__internal_cc9327d49cc69c4963b5acf0b7f2d15b121d6929db2c9cdb9fbb70092b016dec_prof);

    }

    public function getTemplateName()
    {
        return "Pa/json/re_export_home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 77,  194 => 76,  188 => 75,  178 => 7,  172 => 6,  159 => 67,  156 => 66,  153 => 65,  144 => 62,  140 => 61,  136 => 60,  129 => 58,  126 => 57,  122 => 55,  120 => 54,  114 => 53,  110 => 51,  106 => 49,  104 => 48,  97 => 47,  95 => 46,  91 => 44,  86 => 43,  83 => 42,  81 => 41,  47 => 9,  45 => 6,  42 => 5,  36 => 4,  11 => 1,);
    }
}
/* {% extends 'base_pa.html.twig' %}*/
/* */
/* */
/* {% block body %}*/
/*     */
/* {% block menu %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/*     <div class="container content">*/
/* */
/*         <h3>Re-exporter un JSON</h3>*/
/*             */
/*          <div class="row col-xs-12 col-lg-12" style="margin-left:5px;">*/
/*                 <div class="panel panel-success">*/
/*                     <div class="panel-heading">*/
/*                         */
/*                             <div class="input-group col-xs-6">*/
/*                                 <input type="text" class="form-control ligne" placeholder="Entrez la ligne...">*/
/*                                 <span class="input-group-btn">*/
/*                                     <button class="btn btn-default submit" type="button">*/
/*                                         Go!*/
/*                                     </button>*/
/*                                 </span>*/
/*                             </div>*/
/*                     </div>*/
/* */
/*                 <div class="panel-body">*/
/*                     <div style="width: 100% !important; overflow: scroll; height: 57vh;"/>*/
/*                         <table class="table table-bordered table-condensed" style="margin-top:4px;font-size:0.9em;" >*/
/* */
/*                             <thead>*/
/*                                 <tr>*/
/*                                     <th>Statut du JSON</th>*/
/*                                     <th>Date</th>*/
/*                                     <th>Ligne</th>*/
/*                                     <th>Zone</th>*/
/*                                 </tr>*/
/*                             </thead>*/
/*                             <tbody>*/
/*                                 {% if  infos_ligne is defined %}*/
/*                                 {% if infos_ligne is not empty  %}*/
/*                                 {% for infos in infos_ligne %}*/
/*                                     <tr>*/
/*                                         <td>*/
/*                                             {% set date = infos['date']|replace({'/': '_'}) %}*/
/*                                             Désactivé <input type="radio" name="{{infos['zone']}}-{{date}}" value="1"*/
/*                                                 {% if infos['json'] == 1 %}*/
/*                                                     checked*/
/*                                                 {% endif %}*/
/*                                             />*/
/*                                              | */
/*                                             <input type="radio" name="{{infos['zone']}}-{{date}}" value="0"*/
/*                                             {% if infos['json'] == 0 %}*/
/*                                                     checked*/
/*                                                 {% endif %}*/
/*                                             /> Activé*/
/*                                             <button class="btn btn-success btn-xs ok" id="{{infos['zone']}}-{{date}}" style="margin-left:20px;">OK</button>*/
/*                                         </td>*/
/*                                         <td>{{ infos['date'] }}</td>*/
/*                                         <td>{{ infos['ligne'] }}</td>*/
/*                                         <td>{{ infos['zone'] }}</td>*/
/*                                     </tr>*/
/*                                 {% endfor %}*/
/*                                 {% endif %}*/
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
