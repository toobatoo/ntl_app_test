<?php

/* base_pa.html.twig */
class __TwigTemplate_1d58da7381ee750ddcae1358648d2f50901c69d9c0e6c1e2f1bdc26eb68dbc64 extends Twig_Template
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
            'menu' => array($this, 'block_menu'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4066b486d0ac440a8d8281a96222441f391a90d4c4d19c1841c882c01104ad19 = $this->env->getExtension("native_profiler");
        $__internal_4066b486d0ac440a8d8281a96222441f391a90d4c4d19c1841c882c01104ad19->enter($__internal_4066b486d0ac440a8d8281a96222441f391a90d4c4d19c1841c882c01104ad19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base_pa.html.twig"));

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
        // line 13
        echo "        
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div class=\"text-center loader\"></div>
        ";
        // line 18
        $this->displayBlock('body', $context, $blocks);
        // line 159
        echo "        
        ";
        // line 160
        $this->displayBlock('javascripts', $context, $blocks);
        // line 168
        echo "
    </body>
</html>
";
        
        $__internal_4066b486d0ac440a8d8281a96222441f391a90d4c4d19c1841c882c01104ad19->leave($__internal_4066b486d0ac440a8d8281a96222441f391a90d4c4d19c1841c882c01104ad19_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_421efa59e61cc56f2a3058c10b3a8acf53fad47e60869ed82ff78bb29a4818b5 = $this->env->getExtension("native_profiler");
        $__internal_421efa59e61cc56f2a3058c10b3a8acf53fad47e60869ed82ff78bb29a4818b5->enter($__internal_421efa59e61cc56f2a3058c10b3a8acf53fad47e60869ed82ff78bb29a4818b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "RATP - Noctilien";
        
        $__internal_421efa59e61cc56f2a3058c10b3a8acf53fad47e60869ed82ff78bb29a4818b5->leave($__internal_421efa59e61cc56f2a3058c10b3a8acf53fad47e60869ed82ff78bb29a4818b5_prof);

    }

    // line 6
    public function block_metas($context, array $blocks = array())
    {
        $__internal_cf0722db33ed61c55f175e724d2a29be7dca3f6ef0a03a1751d516020a8d43c9 = $this->env->getExtension("native_profiler");
        $__internal_cf0722db33ed61c55f175e724d2a29be7dca3f6ef0a03a1751d516020a8d43c9->enter($__internal_cf0722db33ed61c55f175e724d2a29be7dca3f6ef0a03a1751d516020a8d43c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "metas"));

        
        $__internal_cf0722db33ed61c55f175e724d2a29be7dca3f6ef0a03a1751d516020a8d43c9->leave($__internal_cf0722db33ed61c55f175e724d2a29be7dca3f6ef0a03a1751d516020a8d43c9_prof);

    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_8b220f1934f86eae2e731fd113a7f74b2a6c9719eedce1ed1ae7a668c6733c62 = $this->env->getExtension("native_profiler");
        $__internal_8b220f1934f86eae2e731fd113a7f74b2a6c9719eedce1ed1ae7a668c6733c62->enter($__internal_8b220f1934f86eae2e731fd113a7f74b2a6c9719eedce1ed1ae7a668c6733c62_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 9
        echo "            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap/dist/css/bootstrap.min.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap-submenu/dist/css/bootstrap-submenu.min.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/general.css"), "html", null, true);
        echo "\">
        ";
        
        $__internal_8b220f1934f86eae2e731fd113a7f74b2a6c9719eedce1ed1ae7a668c6733c62->leave($__internal_8b220f1934f86eae2e731fd113a7f74b2a6c9719eedce1ed1ae7a668c6733c62_prof);

    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        $__internal_5f0c8b856bdcb0b28678afe2d832775de671da2e95347e0a2166aa1feb05b574 = $this->env->getExtension("native_profiler");
        $__internal_5f0c8b856bdcb0b28678afe2d832775de671da2e95347e0a2166aa1feb05b574->enter($__internal_5f0c8b856bdcb0b28678afe2d832775de671da2e95347e0a2166aa1feb05b574_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 19
        echo "
            ";
        // line 20
        $this->displayBlock('menu', $context, $blocks);
        // line 157
        echo "
        ";
        
        $__internal_5f0c8b856bdcb0b28678afe2d832775de671da2e95347e0a2166aa1feb05b574->leave($__internal_5f0c8b856bdcb0b28678afe2d832775de671da2e95347e0a2166aa1feb05b574_prof);

    }

    // line 20
    public function block_menu($context, array $blocks = array())
    {
        $__internal_0ac6a36b867a55e82d41de8380b38867ceb5a3d40fc6ae2d9c846aa13e65d1d4 = $this->env->getExtension("native_profiler");
        $__internal_0ac6a36b867a55e82d41de8380b38867ceb5a3d40fc6ae2d9c846aa13e65d1d4->enter($__internal_0ac6a36b867a55e82d41de8380b38867ceb5a3d40fc6ae2d9c846aa13e65d1d4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 21
        echo "            
                <div class=\"container navigation\">
                    <div class=\"row navigation\">
                        <nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
                            <div class=\"navabar-header\">
                                <a class=\"navbar-brand\" href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\"><span class=\"glyphicon glyphicon-home\"></span> Noctilien</a>
                            </div>

                            <div class=\"navbar-collapse collapse navbar-left\">
                                <ul class=\"nav navbar-nav\">
                                    <li class=\"dropdown\">
                                        <a href=\"\" tabindex=\"0\" data-toggle=\"dropdown\" data-submenu=\"\" aria-expanded=\"false\">
                                            <span class=\"text-primary\">Suivi indicateurs</span> <span class=\"caret\"></span>
                                        </a>
                                        <ul class=\"dropdown-menu\">
                                            <li class=\"dropdown-submenu\">
                                                <a tabindex=\"0\" href=\"\">Enquêtes prévues/réalisées</a>
                                                <ul class=\"dropdown-menu\">
                                                    <li><a tabindex=\"0\" href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("pa_prevu_realise");
        echo "\">PA</a></li>
                                                    <li><a tabindex=\"0\" href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("bus_prevu_realise");
        echo "\">BUS</a></li>
                                                </ul>
                                            </li>
                                            <li><a href=\"\">Pénalités</a></li>
                                            <li><a href=\"\">Ratio Dysfonctionnements</a></li>
                                            <li class=\"divider\"></li>
                                            <li class=\"dropdown-submenu\">
                                                <a tabindex=\"0\" href=\"\">Typologie dysfonctionnements</a>
                                                <ul class=\"dropdown-menu\">
                                                    <li><a tabindex=\"0\" href=\"\">Moyenne annuelle N-1 et N</a></li>
                                                    <li><a tabindex=\"0\" href=\"\">Quantités mensuelles</a></li>
                                                </ul>
                                            </li>
                                            <li class=\"divider\"></li>
                                            <li><a href=\"\">Formation continue</a></li>
                                            <li><a href=\"\">Restitution</a></li>
                                            <li><a href=\"\">QSE</a></li>
                                        </ul>
                                    </li>

                                    <li class=\"dropdown\">
                                        <a href=\"\" tabindex=\"0\" data-toggle=\"dropdown\" data-submenu=\"\" aria-expanded=\"false\"><span class=\"text-primary\">Suivi mesures</span> <span class=\"caret\"></span></a>
                                        <ul class=\"dropdown-menu\">
                                            <li><a href=\"";
        // line 63
        echo $this->env->getExtension('routing')->getPath("bus_questionnaire_all", array("mois" => 0));
        echo "\">Mesures</a></li>
                                            <li><a href=\"";
        // line 64
        echo $this->env->getExtension('routing')->getPath("app_ticket");
        echo "\">Tickets</a></li>
                                            <li><a href=\"";
        // line 65
        echo $this->env->getExtension('routing')->getPath("app_dysfonctionnement");
        echo "\">Dysfonctionnements</a></li>
                                            <li><a href=\"\">Main courante/retard</a></li>
                                            <li><a href=\"\">RHA</a></li>
                                            <li><a href=\"\">Accompagnement formation</a></li>
                                            <li class=\"dropdown-submenu\">
                                                <a tabindex=\"0\" href=\"\">Plan de sondage</a>
                                                <ul class=\"dropdown-menu\">
                                                    <li class=\"planSondage-export cursor\"><a tabindex=\"0\">PA</a></li>
                                                    <li class=\"bus_plan_sondage_export cursor\"><a tabindex=\"0\" href=\"\">BUS</a></li>
                                                </ul>
                                            </li>
                                            <li><a href=\"\">PAO/PAS</a></li>
                                        </ul>
                                    </li>

                                    <li class=\"dropdown\">
                                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"><span class=\"text-primary\">Suivi marché</span> <span class=\"caret\"></span></a>
                                        <ul class=\"dropdown-menu\">
                                            <li><a href=\"";
        // line 83
        echo $this->env->getExtension('routing')->getPath("client_compte_rendu");
        echo "\">Compte rendu</a></li>
                                            <li><a href=\"\">Carte d'accès</a></li>
                                            <li><a href=\"";
        // line 85
        echo $this->env->getExtension('routing')->getPath("app_echange");
        echo "\">Echange</a></li>
                                            <li><a href=\"";
        // line 86
        echo $this->env->getExtension('routing')->getPath("client_matricule");
        echo "\">Matricules</a></li>
                                            <li><a href=\"";
        // line 87
        echo $this->env->getExtension('routing')->getPath("client_plan_action");
        echo "\">Plan d'action</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class=\"navbar-collapse collapse navbar-right\">
                                    <ul class=\"nav navbar-nav\">
                                        <li class=\"dropdown\">
                                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Plan de sondage <span class=\"caret\"></span></a>
                                            <ul class=\"dropdown-menu\">
                                            ";
        // line 98
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_ADMIN"), "method")) {
            // line 99
            echo "                                                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("pa_plan_sondage_import");
            echo "\">Importer</a></li>
                                                ";
        }
        // line 101
        echo "                                            <li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("pa_zone_enqueteur_view");
        echo "\">Zones attribuées</a></li>
                                            <li class=\"planSondage-export cursor\"><a>Exporter</a></li>
                                            </ul>
                                        </li>
                                    
                                    <li class=\"dropdown\">
                                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Feuilles de routes <span class=\"caret\"></span></a>
                                            <ul class=\"dropdown-menu\">
                                            <li><a href=\"";
        // line 109
        echo $this->env->getExtension('routing')->getPath("pa_feuille_route_home");
        echo "\">Attribution de zones</a></li>
                                            </ul>
                                        </li>

                                            <li class=\"dropdown\">
                                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Fiches <span class=\"caret\"></span></a>
                                                <ul class=\"dropdown-menu\">
                                                    <li><a href=\"";
        // line 116
        echo $this->env->getExtension('routing')->getPath("pa_questionnaire_all", array("mois" => 0));
        echo "\">Consultation des mesures</a></li>
                                                    ";
        // line 117
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_ADMIN"), "method")) {
            // line 118
            echo "                                                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("pa_questionnaire_import_home");
            echo "\">Importation des mesures</a></li>
                                                        <li><a href=\"";
            // line 119
            echo $this->env->getExtension('routing')->getPath("pa_json_home");
            echo "\">Exports JSON</a></li>
                                                        <li><a href=\"";
            // line 120
            echo $this->env->getExtension('routing')->getPath("pa_json_re_export_home");
            echo "\">Re-exporter un JSON</a></li>
                                                    ";
        }
        // line 122
        echo "                                                    <li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("pa_json_list");
        echo "\">Liste des JSON récemment transmis</a></li>
                                                </ul>
                                            </li>

                                            ";
        // line 126
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_ADMIN"), "method")) {
            // line 127
            echo "                                                <li class=\"dropdown\">
                                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Maintenance <span class=\"caret\"></span></a>
                                                    <ul class=\"dropdown-menu\">
                                                        ";
            // line 130
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_ADMIN"), "method")) {
                // line 131
                echo "                                                            <li class=\"update-referentiel cursor\"><a>Mise à jour du Référentiel client</a></li>
                                                            <li class=\"reset-mesures cursor\"><a href=\"";
                // line 132
                echo $this->env->getExtension('routing')->getPath("pa_mesure_reset");
                echo "\">Re-initialiser les mesures</a></li>
                                                        ";
            }
            // line 134
            echo "                                                        <li class=\"export-referentiel cursor\"><a>Télécharger le Référentiel client mis à jour</a></li>
                                                        <li class=\"divider\"></li>
                                                        <li class=\"export-referentiel_today cursor\"><a>Télécharger le Référentiel client de ce jour (.json)</a></li>
                                                        <li><a href=\"http://objectif-terrain.com/ntl-front/\" target=\"_blank\">Consulter le Référentiel de ce jour</a></li>
                                                    </ul>
                                                </li>
                                            ";
        }
        // line 141
        echo "                                    
                                       <!-- <li class=\"dropdown\">
                                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Reporting <span class=\"caret\"></span></a>
                                            <ul class=\"dropdown-menu\">
                                                <li><a href=\"\">Non conformités</a></li>
                                                <li><a href=\"\">Quotas lignes</a></li>
                                            </ul>
                                        </li>-->
                                    </ul>
                                </div>
                        </nav>
                    </div><!-- row navigation-->
                    <div class=\"text-right\">";
        // line 153
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo " | <a href=\"";
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\" >Déconnexion</a></div>
    </div><!-- container navigation-->
            
            ";
        
        $__internal_0ac6a36b867a55e82d41de8380b38867ceb5a3d40fc6ae2d9c846aa13e65d1d4->leave($__internal_0ac6a36b867a55e82d41de8380b38867ceb5a3d40fc6ae2d9c846aa13e65d1d4_prof);

    }

    // line 160
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_79666464f8eed4af56b27262f4262f8b876906f6cf5e9a3ff59dd0c612611979 = $this->env->getExtension("native_profiler");
        $__internal_79666464f8eed4af56b27262f4262f8b876906f6cf5e9a3ff59dd0c612611979->enter($__internal_79666464f8eed4af56b27262f4262f8b876906f6cf5e9a3ff59dd0c612611979_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 161
        echo "            <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 162
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap-submenu/dist/js/bootstrap-submenu.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 165
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 166
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/general.js"), "html", null, true);
        echo "\"></script>
        ";
        
        $__internal_79666464f8eed4af56b27262f4262f8b876906f6cf5e9a3ff59dd0c612611979->leave($__internal_79666464f8eed4af56b27262f4262f8b876906f6cf5e9a3ff59dd0c612611979_prof);

    }

    public function getTemplateName()
    {
        return "base_pa.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  391 => 166,  387 => 165,  383 => 164,  379 => 163,  375 => 162,  370 => 161,  364 => 160,  351 => 153,  337 => 141,  328 => 134,  323 => 132,  320 => 131,  318 => 130,  313 => 127,  311 => 126,  303 => 122,  298 => 120,  294 => 119,  289 => 118,  287 => 117,  283 => 116,  273 => 109,  261 => 101,  255 => 99,  253 => 98,  239 => 87,  235 => 86,  231 => 85,  226 => 83,  205 => 65,  201 => 64,  197 => 63,  171 => 40,  167 => 39,  151 => 26,  144 => 21,  138 => 20,  130 => 157,  128 => 20,  125 => 19,  119 => 18,  110 => 11,  106 => 10,  101 => 9,  95 => 8,  84 => 6,  72 => 5,  62 => 168,  60 => 160,  57 => 159,  55 => 18,  48 => 14,  45 => 13,  43 => 8,  40 => 7,  38 => 6,  34 => 5,  28 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}RATP - Noctilien{% endblock %}</title>*/
/*         {% block metas %}{% endblock %}*/
/*         */
/*         {% block stylesheets %}*/
/*             <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">*/
/*             <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-submenu/dist/css/bootstrap-submenu.min.css') }}">*/
/*             <link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">*/
/*         {% endblock %}*/
/*         */
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         <div class="text-center loader"></div>*/
/*         {% block body %}*/
/* */
/*             {% block menu %}*/
/*             */
/*                 <div class="container navigation">*/
/*                     <div class="row navigation">*/
/*                         <nav class="navbar navbar-default navbar-fixed-top" role="navigation">*/
/*                             <div class="navabar-header">*/
/*                                 <a class="navbar-brand" href="{{ path('homepage') }}"><span class="glyphicon glyphicon-home"></span> Noctilien</a>*/
/*                             </div>*/
/* */
/*                             <div class="navbar-collapse collapse navbar-left">*/
/*                                 <ul class="nav navbar-nav">*/
/*                                     <li class="dropdown">*/
/*                                         <a href="" tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">*/
/*                                             <span class="text-primary">Suivi indicateurs</span> <span class="caret"></span>*/
/*                                         </a>*/
/*                                         <ul class="dropdown-menu">*/
/*                                             <li class="dropdown-submenu">*/
/*                                                 <a tabindex="0" href="">Enquêtes prévues/réalisées</a>*/
/*                                                 <ul class="dropdown-menu">*/
/*                                                     <li><a tabindex="0" href="{{ path('pa_prevu_realise') }}">PA</a></li>*/
/*                                                     <li><a tabindex="0" href="{{ path('bus_prevu_realise') }}">BUS</a></li>*/
/*                                                 </ul>*/
/*                                             </li>*/
/*                                             <li><a href="">Pénalités</a></li>*/
/*                                             <li><a href="">Ratio Dysfonctionnements</a></li>*/
/*                                             <li class="divider"></li>*/
/*                                             <li class="dropdown-submenu">*/
/*                                                 <a tabindex="0" href="">Typologie dysfonctionnements</a>*/
/*                                                 <ul class="dropdown-menu">*/
/*                                                     <li><a tabindex="0" href="">Moyenne annuelle N-1 et N</a></li>*/
/*                                                     <li><a tabindex="0" href="">Quantités mensuelles</a></li>*/
/*                                                 </ul>*/
/*                                             </li>*/
/*                                             <li class="divider"></li>*/
/*                                             <li><a href="">Formation continue</a></li>*/
/*                                             <li><a href="">Restitution</a></li>*/
/*                                             <li><a href="">QSE</a></li>*/
/*                                         </ul>*/
/*                                     </li>*/
/* */
/*                                     <li class="dropdown">*/
/*                                         <a href="" tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false"><span class="text-primary">Suivi mesures</span> <span class="caret"></span></a>*/
/*                                         <ul class="dropdown-menu">*/
/*                                             <li><a href="{{ path('bus_questionnaire_all', { 'mois': 0 }) }}">Mesures</a></li>*/
/*                                             <li><a href="{{path('app_ticket')}}">Tickets</a></li>*/
/*                                             <li><a href="{{path('app_dysfonctionnement')}}">Dysfonctionnements</a></li>*/
/*                                             <li><a href="">Main courante/retard</a></li>*/
/*                                             <li><a href="">RHA</a></li>*/
/*                                             <li><a href="">Accompagnement formation</a></li>*/
/*                                             <li class="dropdown-submenu">*/
/*                                                 <a tabindex="0" href="">Plan de sondage</a>*/
/*                                                 <ul class="dropdown-menu">*/
/*                                                     <li class="planSondage-export cursor"><a tabindex="0">PA</a></li>*/
/*                                                     <li class="bus_plan_sondage_export cursor"><a tabindex="0" href="">BUS</a></li>*/
/*                                                 </ul>*/
/*                                             </li>*/
/*                                             <li><a href="">PAO/PAS</a></li>*/
/*                                         </ul>*/
/*                                     </li>*/
/* */
/*                                     <li class="dropdown">*/
/*                                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="text-primary">Suivi marché</span> <span class="caret"></span></a>*/
/*                                         <ul class="dropdown-menu">*/
/*                                             <li><a href="{{ path('client_compte_rendu') }}">Compte rendu</a></li>*/
/*                                             <li><a href="">Carte d'accès</a></li>*/
/*                                             <li><a href="{{ path('app_echange') }}">Echange</a></li>*/
/*                                             <li><a href="{{path('client_matricule')}}">Matricules</a></li>*/
/*                                             <li><a href="{{path('client_plan_action')}}">Plan d'action</a></li>*/
/*                                         </ul>*/
/*                                     </li>*/
/*                                 </ul>*/
/*                             </div>*/
/* */
/*                             <div class="navbar-collapse collapse navbar-right">*/
/*                                     <ul class="nav navbar-nav">*/
/*                                         <li class="dropdown">*/
/*                                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Plan de sondage <span class="caret"></span></a>*/
/*                                             <ul class="dropdown-menu">*/
/*                                             {% if app.user.hasRole('ROLE_ADMIN') %}*/
/*                                                     <li><a href="{{path('pa_plan_sondage_import')}}">Importer</a></li>*/
/*                                                 {% endif %}*/
/*                                             <li><a href="{{path('pa_zone_enqueteur_view')}}">Zones attribuées</a></li>*/
/*                                             <li class="planSondage-export cursor"><a>Exporter</a></li>*/
/*                                             </ul>*/
/*                                         </li>*/
/*                                     */
/*                                     <li class="dropdown">*/
/*                                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Feuilles de routes <span class="caret"></span></a>*/
/*                                             <ul class="dropdown-menu">*/
/*                                             <li><a href="{{path('pa_feuille_route_home')}}">Attribution de zones</a></li>*/
/*                                             </ul>*/
/*                                         </li>*/
/* */
/*                                             <li class="dropdown">*/
/*                                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fiches <span class="caret"></span></a>*/
/*                                                 <ul class="dropdown-menu">*/
/*                                                     <li><a href="{{path('pa_questionnaire_all',{ mois: 0} )}}">Consultation des mesures</a></li>*/
/*                                                     {% if app.user.hasRole('ROLE_ADMIN') %}*/
/*                                                         <li><a href="{{path('pa_questionnaire_import_home')}}">Importation des mesures</a></li>*/
/*                                                         <li><a href="{{path('pa_json_home')}}">Exports JSON</a></li>*/
/*                                                         <li><a href="{{path('pa_json_re_export_home')}}">Re-exporter un JSON</a></li>*/
/*                                                     {% endif %}*/
/*                                                     <li><a href="{{path('pa_json_list')}}">Liste des JSON récemment transmis</a></li>*/
/*                                                 </ul>*/
/*                                             </li>*/
/* */
/*                                             {% if app.user.hasRole('ROLE_ADMIN') %}*/
/*                                                 <li class="dropdown">*/
/*                                                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maintenance <span class="caret"></span></a>*/
/*                                                     <ul class="dropdown-menu">*/
/*                                                         {% if app.user.hasRole('ROLE_ADMIN') %}*/
/*                                                             <li class="update-referentiel cursor"><a>Mise à jour du Référentiel client</a></li>*/
/*                                                             <li class="reset-mesures cursor"><a href="{{path('pa_mesure_reset')}}">Re-initialiser les mesures</a></li>*/
/*                                                         {% endif %}*/
/*                                                         <li class="export-referentiel cursor"><a>Télécharger le Référentiel client mis à jour</a></li>*/
/*                                                         <li class="divider"></li>*/
/*                                                         <li class="export-referentiel_today cursor"><a>Télécharger le Référentiel client de ce jour (.json)</a></li>*/
/*                                                         <li><a href="http://objectif-terrain.com/ntl-front/" target="_blank">Consulter le Référentiel de ce jour</a></li>*/
/*                                                     </ul>*/
/*                                                 </li>*/
/*                                             {% endif %}*/
/*                                     */
/*                                        <!-- <li class="dropdown">*/
/*                                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reporting <span class="caret"></span></a>*/
/*                                             <ul class="dropdown-menu">*/
/*                                                 <li><a href="">Non conformités</a></li>*/
/*                                                 <li><a href="">Quotas lignes</a></li>*/
/*                                             </ul>*/
/*                                         </li>-->*/
/*                                     </ul>*/
/*                                 </div>*/
/*                         </nav>*/
/*                     </div><!-- row navigation-->*/
/*                     <div class="text-right">{{ app.user.username }} | <a href="{{ path('fos_user_security_logout') }}" >Déconnexion</a></div>*/
/*     </div><!-- container navigation-->*/
/*             */
/*             {% endblock %}*/
/* */
/*         {% endblock %}*/
/*         */
/*         {% block javascripts %}*/
/*             <script type="text/javascript" src="{{ asset('jquery/dist/jquery.min.js') }}"></script>*/
/*             <script type="text/javascript" src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>*/
/*             <script type="text/javascript" src="{{ asset('bootstrap-submenu/dist/js/bootstrap-submenu.min.js') }}"></script>*/
/*             <script src="{{ asset('bundles/fosjsrouting/js/router.js') }}"></script>*/
/*             <script src="{{ path('fos_js_routing_js', { callback: 'fos.Router.setData' }) }}"></script>*/
/*             <script type="text/javascript" src="{{ asset('js/general.js') }}"></script>*/
/*         {% endblock %}*/
/* */
/*     </body>*/
/* </html>*/
/* */
