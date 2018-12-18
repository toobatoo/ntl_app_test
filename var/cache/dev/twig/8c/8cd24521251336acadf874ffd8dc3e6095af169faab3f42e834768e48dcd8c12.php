<?php

/* Pa/questionnaire/all.html.twig */
class __TwigTemplate_8f97ca208c0a45176c04daab506675076d35734cb5c9a23027d7a906f08a2dd3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base_pa.html.twig", "Pa/questionnaire/all.html.twig", 1);
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
        $__internal_f0194d8b8ff52865908d0fbffa8c85a39b85d39bcec9941402a93ebc2d2f3e84 = $this->env->getExtension("native_profiler");
        $__internal_f0194d8b8ff52865908d0fbffa8c85a39b85d39bcec9941402a93ebc2d2f3e84->enter($__internal_f0194d8b8ff52865908d0fbffa8c85a39b85d39bcec9941402a93ebc2d2f3e84_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Pa/questionnaire/all.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f0194d8b8ff52865908d0fbffa8c85a39b85d39bcec9941402a93ebc2d2f3e84->leave($__internal_f0194d8b8ff52865908d0fbffa8c85a39b85d39bcec9941402a93ebc2d2f3e84_prof);

    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        $__internal_407705a0145c9a4d0428c4c5d23b5231db9b01f51c7c5572ffaeac85a5ff124b = $this->env->getExtension("native_profiler");
        $__internal_407705a0145c9a4d0428c4c5d23b5231db9b01f51c7c5572ffaeac85a5ff124b->enter($__internal_407705a0145c9a4d0428c4c5d23b5231db9b01f51c7c5572ffaeac85a5ff124b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "
";
        // line 6
        $this->displayBlock('menu', $context, $blocks);
        // line 9
        echo "
<span class=\"mois_info\">";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["mois"]) ? $context["mois"] : $this->getContext($context, "mois")), "html", null, true);
        echo "</span>
<span class=\"table_info\">";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["table"]) ? $context["table"] : $this->getContext($context, "table")), "html", null, true);
        echo "</span>
    
    <div class=\"container content\">

        ";
        // line 15
        if (((isset($context["mois"]) ? $context["mois"] : $this->getContext($context, "mois")) < 1)) {
            // line 16
            echo "            <h3>Consultation de l'ensemble des fiches saisies</h3>
        ";
        } else {
            // line 18
            echo "            <h3>Historique de ";
            echo twig_escape_filter($this->env, twig_replace_filter((isset($context["table"]) ? $context["table"] : $this->getContext($context, "table")), array("_" => "/")), "html", null, true);
            echo "</h3>
        ";
        }
        // line 20
        echo "
            
            <div class=\"row col-xs-3 col-lg-3\">
                <div class=\"panel panel-success\">
                    <div class=\"panel-heading\">
                        Filtre de recherche
                    </div>
                    <div class=\"panel-body\">
                        <table style=\"width:100%;height:100%;\">
                            <tr>
                                <td>
                                    <select class=\"enq_select\" style=\"width:100%!important;height:100%!important;\">
                                        <option value=\"-\">Enquêteur</option>
                                        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list_enqueteurs"]) ? $context["list_enqueteurs"] : $this->getContext($context, "list_enqueteurs")));
        foreach ($context['_seq'] as $context["_key"] => $context["enqueteur"]) {
            // line 34
            echo "                                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["enqueteur"], "enqueteur", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["enqueteur"], "enqueteur", array(), "array"), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['enqueteur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class=\"ligne_select\" style=\"width:100%!important;height:100%!important;margin-top:7px;\">
                                        <option value=\"-\">Ligne</option>
                                        ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list_lignes"]) ? $context["list_lignes"] : $this->getContext($context, "list_lignes")));
        foreach ($context['_seq'] as $context["_key"] => $context["ligne"]) {
            // line 44
            echo "                                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["ligne"], "ligne", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["ligne"], "ligne", array(), "array"), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ligne'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class=\"zone_select\" style=\"width:100%!important;height:100%!important;margin-top:7px;\">
                                        <option value=\"-\">Zone</option>
                                        ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list_zones"]) ? $context["list_zones"] : $this->getContext($context, "list_zones")));
        foreach ($context['_seq'] as $context["_key"] => $context["zone"]) {
            // line 54
            echo "                                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["zone"], "zone", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["zone"], "zone", array(), "array"), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['zone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class=\"date_select\" style=\"width:100%!important;height:100%!important;margin-top:7px;\">
                                        <option value=\"-\">Date</option>
                                        ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list_dates"]) ? $context["list_dates"] : $this->getContext($context, "list_dates")));
        foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
            // line 64
            echo "                                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "date", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "date", array(), "array"), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <div id=\"custom-search-input\" style=\"width:100%!important;height:100%!important;margin-top:7px;\">
                                        <div class=\"input-group col-xs-12 \">
                                            <input class=\"form-control input-xs input-gipa\" placeholder=\"N°GIPA\" type=\"text\">
                                                <span class=\"input-group-btn\">
                                                    <button class=\"btn btn-primary btn-xs btn-gipa\" type=\"button\">
                                                    <i class=\"glyphicon glyphicon-search\"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div> 

                <div class=\"panel panel-success\">
                    <div class=\"panel-heading\">Situation fiches</div>
                    <div class=\"panel-body\">
                        
                        <div id=\"container\" style=\"min-width: 210px; max-height:260px; heigth:230px;max-width: 300px;margin:0 auto;\"></div>
                    </div>
                </div>

            </div>

            <div class=\"row col-xs-9 col-lg-9\" style=\"margin-left:5px;\">
                <div class=\"panel panel-success\">
                    <div class=\"panel-heading\">
                        Liste des questionnaires
                        <select style=\"margin-left:20px;\" class=\"history\">
                            <option>Historique</option>
                            <option value=\"1\">M -1</option>
                            <option value=\"2\">M -2</option>
                            <option value=\"3\">M -3</option>
                            <option disabled>--------------</option>
                            <option value=\"0\">M</option>
                        </select>
                        ";
        // line 109
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_ADMIN"), "method")) {
            // line 110
            echo "                            <span> | </span>
                                <sapn class=\"btn btn-xs btn-success export\" >Exporter</span>
                        ";
        }
        // line 113
        echo "                    </div>

                <div class=\"panel-body\">
                    
                        ";
        // line 123
        echo "                    
                    <div style=\"width: 100% !important; overflow: scroll; height: 57vh;\"/>
                        <table class=\"table table-bordered table-condensed\" style=\"margin-top:4px;font-size:0.9em;\" >

                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Validée</th>
                                <th>Json</th>
                                <th>Date JSON</th>
                                <th>ID</th>
                                <th>Enquêteur</th>
                                <th>Zone</th>
                                <th>Ligne</th>
                                <th>GIPA</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Heure validation</th>
                                <th>Q 1.1</th>
                                <th>Q 1.2</th>
                                <th>Q 1.3</th>
                                <th>Q 1.4</th>
                                <th>Q 2.1</th>
                                <th>Q 2.2</th>
                                <th>Q 2.3</th>
                                <th>Q 2.4</th>
                                <th>Q 2.5</th>
                                <th>Q 3.1</th>
                                <th>Q 3.2</th>
                                <th>Q 3.3</th>
                                <th>Q 3.4</th>
                                <th>Q 3.5</th>
                                <th>Q 4.1</th>
                                <th>Q 4.1 obs</th>
                                <th>Q 4.2</th>
                                <th>Q 4.2 obs</th>
                                <th>Q 4.3</th>
                                <th>Q 4.3 obs</th>
                                <th>Q 4.4</th>
                                <th>Q 4.4 obs</th>
                                <th>Q 4.5</th>
                                <th>Q 4.5 obs</th>
                                <th>Q 4.6</th>
                                <th>Q 4.6 obs</th>
                                <th>Q 4.7</th>
                                <th>Q 4.7 obs</th>
                                <th>Q 4.8</th>
                                <th>Q 4.8 obs</th>
                                <th>Q 4.9</th>
                                <th>Q 4.9 obs</th>
                                <th>Observations</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
        // line 177
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["questionnaires"]) ? $context["questionnaires"] : $this->getContext($context, "questionnaires")));
        foreach ($context['_seq'] as $context["_key"] => $context["questionnaire"]) {
            // line 178
            echo "                                <tr class=\"valid_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getvalid", array(), "method"), "html", null, true);
            echo "\">
                
                                    <td class=\"text-center\" nowrap>
                                    ";
            // line 181
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_ADMIN"), "method")) {
                // line 182
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pa_questionnaire_remove_id", array("id" => $this->getAttribute($context["questionnaire"], "getIdGlobal", array(), "method"), "mois" => (isset($context["mois"]) ? $context["mois"] : $this->getContext($context, "mois")))), "html", null, true);
                echo "\" >
                                            <span class=\"glyphicon glyphicon-trash text-warning cursor\"></span> 
                                        </a>
                                        <span style=\"color:white;\"> . . </span>
                                    ";
            }
            // line 187
            echo "                                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pa_questionnaire_one", array("id" => $this->getAttribute($context["questionnaire"], "getIdGlobal", array(), "method"), "table" => (isset($context["table"]) ? $context["table"] : $this->getContext($context, "table")), "mois" => (isset($context["mois"]) ? $context["mois"] : $this->getContext($context, "mois")))), "html", null, true);
            echo "\" >
                                            <span class=\"glyphicon glyphicon-pencil text-primary cursor\">
                                        </a>
                                         <span style=\"color:white;\"> . . </span>
                                         <a href=\"";
            // line 191
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pa_photo_import", array("id" => $this->getAttribute($context["questionnaire"], "getIdGlobal", array(), "method"), "table" => (isset($context["table"]) ? $context["table"] : $this->getContext($context, "table")), "mois" => (isset($context["mois"]) ? $context["mois"] : $this->getContext($context, "mois")))), "html", null, true);
            echo "\">
                                            <span class=\"glyphicon glyphicon-camera text-warning cursor\">
                                        </a>
                                    </td>
                                    

                                    <td class=\"text-center\">
                                        ";
            // line 198
            if (($this->getAttribute($context["questionnaire"], "valid", array(), "method") == "2")) {
                // line 199
                echo "                                            <span class=\"glyphicon glyphicon-ok text-success\"></span>
                                        ";
            } else {
                // line 201
                echo "                                            <span style=\"color:silver;\" class=\"glyphicon glyphicon-minus\"></span>
                                        ";
            }
            // line 203
            echo "                                    </td>
                                    <td class=\"text-center\">
                                        ";
            // line 205
            if (($this->getAttribute($context["questionnaire"], "getJson", array(), "method") == 0)) {
                // line 206
                echo "                                            <span class=\"glyphicon glyphicon-remove text-danger\"></span>
                                        ";
            } else {
                // line 208
                echo "                                            <span class=\"glyphicon glyphicon-ok text-success\"></span>
                                        ";
            }
            // line 210
            echo "                                    </td>
                                    <td>
                                    ";
            // line 212
            if (($this->getAttribute($context["questionnaire"], "getGeneratedDate", array(), "method") != "")) {
                // line 213
                echo "                                    ";
                if (($this->getAttribute($context["questionnaire"], "getGeneratedDate", array(), "method") != 0)) {
                    // line 214
                    echo "                                        ";
                    $context["whole_date_time"] = twig_split_filter($this->env, $this->getAttribute($context["questionnaire"], "getGeneratedDate", array(), "method"), " ");
                    // line 215
                    echo "                                        ";
                    $context["whole_date_split"] = twig_split_filter($this->env, $this->getAttribute((isset($context["whole_date_time"]) ? $context["whole_date_time"] : $this->getContext($context, "whole_date_time")), 0, array(), "array"), "-");
                    // line 216
                    echo "                                        ";
                    $context["time"] = $this->getAttribute((isset($context["whole_date_time"]) ? $context["whole_date_time"] : $this->getContext($context, "whole_date_time")), 1, array(), "array");
                    // line 217
                    echo "                                        ";
                    $context["date"] = (((($this->getAttribute((isset($context["whole_date_split"]) ? $context["whole_date_split"] : $this->getContext($context, "whole_date_split")), 2, array(), "array") . "/") . $this->getAttribute((isset($context["whole_date_split"]) ? $context["whole_date_split"] : $this->getContext($context, "whole_date_split")), 1, array(), "array")) . "/") . $this->getAttribute((isset($context["whole_date_split"]) ? $context["whole_date_split"] : $this->getContext($context, "whole_date_split")), 0, array(), "array"));
                    // line 218
                    echo "                                            ";
                    echo twig_escape_filter($this->env, (((isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")) . " ") . (isset($context["time"]) ? $context["time"] : $this->getContext($context, "time"))), "html", null, true);
                    echo "
                                    ";
                }
                // line 220
                echo "                                    ";
            }
            // line 221
            echo "                                    </td>
                                    <td>";
            // line 222
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getIdGlobal", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 223
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getEnqueteur", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 224
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getZone", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 225
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getLigne", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 226
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getGipa", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 227
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getDate", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 228
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getHeure", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 229
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getHeureValid", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 230
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ11", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 231
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ12", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 232
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ13", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 233
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ14", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 234
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ21", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 235
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ22", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 236
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ23", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 237
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ24", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 238
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ25", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 239
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ31", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 240
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ32", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 241
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ33", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 242
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ34", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 243
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ35", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 244
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ41", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 245
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ41Obs", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 246
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ42", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 247
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ42Obs", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 248
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ43", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 249
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ43Obs", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 250
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ44", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 251
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ44Obs", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 252
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ45", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 253
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ45Obs", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 254
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ46", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 255
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ46Obs", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 256
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ47", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 257
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ47Obs", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 258
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ48", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 259
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ48Obs", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 260
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ49", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 261
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getQ49Obs", array(), "method"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 262
            echo twig_escape_filter($this->env, $this->getAttribute($context["questionnaire"], "getObs", array(), "method"), "html", null, true);
            echo "</td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['questionnaire'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 265
        echo "                        </tbody>
                        </table>
                    </div>
                </div>

            <div style=\"margin-left:15px;\">
                <input type=\"checkbox\" value=\"Save\" checked class=\"saisies_saved\"/> Saisies enregistrées
                <input type=\"checkbox\" value=\"toUpdate\" checked class=\"saisies_to_pdate\"/> Saisies à valider
            </div>

        </div><!-- row navigation-->
        
    </div><!-- container navigation-->

";
        
        $__internal_407705a0145c9a4d0428c4c5d23b5231db9b01f51c7c5572ffaeac85a5ff124b->leave($__internal_407705a0145c9a4d0428c4c5d23b5231db9b01f51c7c5572ffaeac85a5ff124b_prof);

    }

    // line 6
    public function block_menu($context, array $blocks = array())
    {
        $__internal_adffdb914ff3b1009027ae62b136f14344a4da3f4f6803efff600bb445ad52df = $this->env->getExtension("native_profiler");
        $__internal_adffdb914ff3b1009027ae62b136f14344a4da3f4f6803efff600bb445ad52df->enter($__internal_adffdb914ff3b1009027ae62b136f14344a4da3f4f6803efff600bb445ad52df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 7
        echo "    ";
        $this->displayParentBlock("menu", $context, $blocks);
        echo "
";
        
        $__internal_adffdb914ff3b1009027ae62b136f14344a4da3f4f6803efff600bb445ad52df->leave($__internal_adffdb914ff3b1009027ae62b136f14344a4da3f4f6803efff600bb445ad52df_prof);

    }

    // line 281
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_16122421d16b12478cc35140c180c083365e78bd962baeba406857f9cceac514 = $this->env->getExtension("native_profiler");
        $__internal_16122421d16b12478cc35140c180c083365e78bd962baeba406857f9cceac514->enter($__internal_16122421d16b12478cc35140c180c083365e78bd962baeba406857f9cceac514_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 282
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 283
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("highcharts/highcharts.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 284
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("highcharts/modules/exporting.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 285
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/pa/fiches/all.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_16122421d16b12478cc35140c180c083365e78bd962baeba406857f9cceac514->leave($__internal_16122421d16b12478cc35140c180c083365e78bd962baeba406857f9cceac514_prof);

    }

    public function getTemplateName()
    {
        return "Pa/questionnaire/all.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  611 => 285,  607 => 284,  603 => 283,  598 => 282,  592 => 281,  582 => 7,  576 => 6,  555 => 265,  546 => 262,  542 => 261,  538 => 260,  534 => 259,  530 => 258,  526 => 257,  522 => 256,  518 => 255,  514 => 254,  510 => 253,  506 => 252,  502 => 251,  498 => 250,  494 => 249,  490 => 248,  486 => 247,  482 => 246,  478 => 245,  474 => 244,  470 => 243,  466 => 242,  462 => 241,  458 => 240,  454 => 239,  450 => 238,  446 => 237,  442 => 236,  438 => 235,  434 => 234,  430 => 233,  426 => 232,  422 => 231,  418 => 230,  414 => 229,  410 => 228,  406 => 227,  402 => 226,  398 => 225,  394 => 224,  390 => 223,  386 => 222,  383 => 221,  380 => 220,  374 => 218,  371 => 217,  368 => 216,  365 => 215,  362 => 214,  359 => 213,  357 => 212,  353 => 210,  349 => 208,  345 => 206,  343 => 205,  339 => 203,  335 => 201,  331 => 199,  329 => 198,  319 => 191,  311 => 187,  302 => 182,  300 => 181,  293 => 178,  289 => 177,  233 => 123,  227 => 113,  222 => 110,  220 => 109,  175 => 66,  164 => 64,  160 => 63,  151 => 56,  140 => 54,  136 => 53,  127 => 46,  116 => 44,  112 => 43,  103 => 36,  92 => 34,  88 => 33,  73 => 20,  67 => 18,  63 => 16,  61 => 15,  54 => 11,  50 => 10,  47 => 9,  45 => 6,  42 => 5,  36 => 4,  11 => 1,);
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
/* */
/* <span class="mois_info">{{mois}}</span>*/
/* <span class="table_info">{{table}}</span>*/
/*     */
/*     <div class="container content">*/
/* */
/*         {% if( mois < 1 ) %}*/
/*             <h3>Consultation de l'ensemble des fiches saisies</h3>*/
/*         {% else %}*/
/*             <h3>Historique de {{ table|replace({ ("_"): "/" }) }}</h3>*/
/*         {% endif %}*/
/* */
/*             */
/*             <div class="row col-xs-3 col-lg-3">*/
/*                 <div class="panel panel-success">*/
/*                     <div class="panel-heading">*/
/*                         Filtre de recherche*/
/*                     </div>*/
/*                     <div class="panel-body">*/
/*                         <table style="width:100%;height:100%;">*/
/*                             <tr>*/
/*                                 <td>*/
/*                                     <select class="enq_select" style="width:100%!important;height:100%!important;">*/
/*                                         <option value="-">Enquêteur</option>*/
/*                                         {% for enqueteur in list_enqueteurs %}*/
/*                                             <option value="{{ enqueteur['enqueteur'] }}">{{ enqueteur['enqueteur'] }}</option>*/
/*                                         {% endfor %}*/
/*                                     </select>*/
/*                                 </td>*/
/*                             </tr>*/
/*                             <tr>*/
/*                                 <td>*/
/*                                     <select class="ligne_select" style="width:100%!important;height:100%!important;margin-top:7px;">*/
/*                                         <option value="-">Ligne</option>*/
/*                                         {% for ligne in list_lignes %}*/
/*                                             <option value="{{ ligne['ligne'] }}">{{ ligne['ligne'] }}</option>*/
/*                                         {% endfor %}*/
/*                                     </select>*/
/*                                 </td>*/
/*                             </tr>*/
/*                             <tr>*/
/*                                 <td>*/
/*                                     <select class="zone_select" style="width:100%!important;height:100%!important;margin-top:7px;">*/
/*                                         <option value="-">Zone</option>*/
/*                                         {% for zone in list_zones %}*/
/*                                             <option value="{{ zone['zone'] }}">{{ zone['zone'] }}</option>*/
/*                                         {% endfor %}*/
/*                                     </select>*/
/*                                 </td>*/
/*                             </tr>*/
/*                             <tr>*/
/*                                 <td>*/
/*                                     <select class="date_select" style="width:100%!important;height:100%!important;margin-top:7px;">*/
/*                                         <option value="-">Date</option>*/
/*                                         {% for date in list_dates %}*/
/*                                             <option value="{{ date['date'] }}">{{ date['date'] }}</option>*/
/*                                         {% endfor %}*/
/*                                     </select>*/
/*                                 </td>*/
/*                             </tr>*/
/*                             <tr>*/
/*                                 <td>*/
/*                                    <div id="custom-search-input" style="width:100%!important;height:100%!important;margin-top:7px;">*/
/*                                         <div class="input-group col-xs-12 ">*/
/*                                             <input class="form-control input-xs input-gipa" placeholder="N°GIPA" type="text">*/
/*                                                 <span class="input-group-btn">*/
/*                                                     <button class="btn btn-primary btn-xs btn-gipa" type="button">*/
/*                                                     <i class="glyphicon glyphicon-search"></i>*/
/*                                                 </button>*/
/*                                             </span>*/
/*                                         </div>*/
/*                                     </div>*/
/*                                 </td>*/
/*                             </tr>*/
/*                         </table>*/
/*                     </div>*/
/*                 </div> */
/* */
/*                 <div class="panel panel-success">*/
/*                     <div class="panel-heading">Situation fiches</div>*/
/*                     <div class="panel-body">*/
/*                         */
/*                         <div id="container" style="min-width: 210px; max-height:260px; heigth:230px;max-width: 300px;margin:0 auto;"></div>*/
/*                     </div>*/
/*                 </div>*/
/* */
/*             </div>*/
/* */
/*             <div class="row col-xs-9 col-lg-9" style="margin-left:5px;">*/
/*                 <div class="panel panel-success">*/
/*                     <div class="panel-heading">*/
/*                         Liste des questionnaires*/
/*                         <select style="margin-left:20px;" class="history">*/
/*                             <option>Historique</option>*/
/*                             <option value="1">M -1</option>*/
/*                             <option value="2">M -2</option>*/
/*                             <option value="3">M -3</option>*/
/*                             <option disabled>--------------</option>*/
/*                             <option value="0">M</option>*/
/*                         </select>*/
/*                         {% if app.user.hasRole('ROLE_ADMIN') %}*/
/*                             <span> | </span>*/
/*                                 <sapn class="btn btn-xs btn-success export" >Exporter</span>*/
/*                         {% endif %}*/
/*                     </div>*/
/* */
/*                 <div class="panel-body">*/
/*                     */
/*                         {#<select  class="PA_select" style="margin-bottom:3px;">*/
/*                             <option value="-">Filtrer par points d'arrêts</option>*/
/*                             {% for pa in list_points_arrets %}*/
/*                                 <option value="{{ pa['arret_montee'] }}">{{ pa['arret_montee'] }}</option>*/
/*                             {% endfor %}*/
/*                         </select>#}*/
/*                     */
/*                     <div style="width: 100% !important; overflow: scroll; height: 57vh;"/>*/
/*                         <table class="table table-bordered table-condensed" style="margin-top:4px;font-size:0.9em;" >*/
/* */
/*                         <thead>*/
/*                             <tr>*/
/*                                 <th>Actions</th>*/
/*                                 <th>Validée</th>*/
/*                                 <th>Json</th>*/
/*                                 <th>Date JSON</th>*/
/*                                 <th>ID</th>*/
/*                                 <th>Enquêteur</th>*/
/*                                 <th>Zone</th>*/
/*                                 <th>Ligne</th>*/
/*                                 <th>GIPA</th>*/
/*                                 <th>Date</th>*/
/*                                 <th>Heure</th>*/
/*                                 <th>Heure validation</th>*/
/*                                 <th>Q 1.1</th>*/
/*                                 <th>Q 1.2</th>*/
/*                                 <th>Q 1.3</th>*/
/*                                 <th>Q 1.4</th>*/
/*                                 <th>Q 2.1</th>*/
/*                                 <th>Q 2.2</th>*/
/*                                 <th>Q 2.3</th>*/
/*                                 <th>Q 2.4</th>*/
/*                                 <th>Q 2.5</th>*/
/*                                 <th>Q 3.1</th>*/
/*                                 <th>Q 3.2</th>*/
/*                                 <th>Q 3.3</th>*/
/*                                 <th>Q 3.4</th>*/
/*                                 <th>Q 3.5</th>*/
/*                                 <th>Q 4.1</th>*/
/*                                 <th>Q 4.1 obs</th>*/
/*                                 <th>Q 4.2</th>*/
/*                                 <th>Q 4.2 obs</th>*/
/*                                 <th>Q 4.3</th>*/
/*                                 <th>Q 4.3 obs</th>*/
/*                                 <th>Q 4.4</th>*/
/*                                 <th>Q 4.4 obs</th>*/
/*                                 <th>Q 4.5</th>*/
/*                                 <th>Q 4.5 obs</th>*/
/*                                 <th>Q 4.6</th>*/
/*                                 <th>Q 4.6 obs</th>*/
/*                                 <th>Q 4.7</th>*/
/*                                 <th>Q 4.7 obs</th>*/
/*                                 <th>Q 4.8</th>*/
/*                                 <th>Q 4.8 obs</th>*/
/*                                 <th>Q 4.9</th>*/
/*                                 <th>Q 4.9 obs</th>*/
/*                                 <th>Observations</th>*/
/*                             </tr>*/
/*                         </thead>*/
/*                         <tbody>*/
/*                             {% for questionnaire in questionnaires %}*/
/*                                 <tr class="valid_{{ questionnaire.getvalid() }}">*/
/*                 */
/*                                     <td class="text-center" nowrap>*/
/*                                     {% if app.user.hasRole('ROLE_ADMIN') %}*/
/*                                         <a href="{{ path('pa_questionnaire_remove_id', {id: questionnaire.getIdGlobal(), mois: mois}) }}" >*/
/*                                             <span class="glyphicon glyphicon-trash text-warning cursor"></span> */
/*                                         </a>*/
/*                                         <span style="color:white;"> . . </span>*/
/*                                     {% endif %}*/
/*                                         <a href="{{ path('pa_questionnaire_one', {id: questionnaire.getIdGlobal(), table: table, mois: mois}) }}" >*/
/*                                             <span class="glyphicon glyphicon-pencil text-primary cursor">*/
/*                                         </a>*/
/*                                          <span style="color:white;"> . . </span>*/
/*                                          <a href="{{ path('pa_photo_import', {id: questionnaire.getIdGlobal(), table: table, mois: mois})}}">*/
/*                                             <span class="glyphicon glyphicon-camera text-warning cursor">*/
/*                                         </a>*/
/*                                     </td>*/
/*                                     */
/* */
/*                                     <td class="text-center">*/
/*                                         {% if questionnaire.valid() == "2" %}*/
/*                                             <span class="glyphicon glyphicon-ok text-success"></span>*/
/*                                         {% else %}*/
/*                                             <span style="color:silver;" class="glyphicon glyphicon-minus"></span>*/
/*                                         {% endif %}*/
/*                                     </td>*/
/*                                     <td class="text-center">*/
/*                                         {% if questionnaire.getJson() == 0 %}*/
/*                                             <span class="glyphicon glyphicon-remove text-danger"></span>*/
/*                                         {% else %}*/
/*                                             <span class="glyphicon glyphicon-ok text-success"></span>*/
/*                                         {% endif %}*/
/*                                     </td>*/
/*                                     <td>*/
/*                                     {% if questionnaire.getGeneratedDate() != '' %}*/
/*                                     {% if questionnaire.getGeneratedDate() != 0 %}*/
/*                                         {% set whole_date_time = questionnaire.getGeneratedDate()|split(' ') %}*/
/*                                         {% set whole_date_split = whole_date_time[0]|split('-') %}*/
/*                                         {% set time = whole_date_time[1] %}*/
/*                                         {% set date = whole_date_split[2]~'/'~whole_date_split[1]~'/'~whole_date_split[0] %}*/
/*                                             {{ date~' '~time }}*/
/*                                     {% endif %}*/
/*                                     {% endif %}*/
/*                                     </td>*/
/*                                     <td>{{ questionnaire.getIdGlobal() }}</td>*/
/*                                     <td>{{ questionnaire.getEnqueteur() }}</td>*/
/*                                     <td>{{ questionnaire.getZone() }}</td>*/
/*                                     <td>{{ questionnaire.getLigne() }}</td>*/
/*                                     <td>{{ questionnaire.getGipa() }}</td>*/
/*                                     <td>{{ questionnaire.getDate() }}</td>*/
/*                                     <td>{{ questionnaire.getHeure() }}</td>*/
/*                                     <td>{{ questionnaire.getHeureValid() }}</td>*/
/*                                     <td>{{ questionnaire.getQ11() }}</td>*/
/*                                     <td>{{ questionnaire.getQ12() }}</td>*/
/*                                     <td>{{ questionnaire.getQ13() }}</td>*/
/*                                     <td>{{ questionnaire.getQ14() }}</td>*/
/*                                     <td>{{ questionnaire.getQ21() }}</td>*/
/*                                     <td>{{ questionnaire.getQ22() }}</td>*/
/*                                     <td>{{ questionnaire.getQ23() }}</td>*/
/*                                     <td>{{ questionnaire.getQ24() }}</td>*/
/*                                     <td>{{ questionnaire.getQ25() }}</td>*/
/*                                     <td>{{ questionnaire.getQ31() }}</td>*/
/*                                     <td>{{ questionnaire.getQ32() }}</td>*/
/*                                     <td>{{ questionnaire.getQ33() }}</td>*/
/*                                     <td>{{ questionnaire.getQ34() }}</td>*/
/*                                     <td>{{ questionnaire.getQ35() }}</td>*/
/*                                     <td>{{ questionnaire.getQ41() }}</td>*/
/*                                     <td>{{ questionnaire.getQ41Obs() }}</td>*/
/*                                     <td>{{ questionnaire.getQ42() }}</td>*/
/*                                     <td>{{ questionnaire.getQ42Obs() }}</td>*/
/*                                     <td>{{ questionnaire.getQ43() }}</td>*/
/*                                     <td>{{ questionnaire.getQ43Obs() }}</td>*/
/*                                     <td>{{ questionnaire.getQ44() }}</td>*/
/*                                     <td>{{ questionnaire.getQ44Obs() }}</td>*/
/*                                     <td>{{ questionnaire.getQ45() }}</td>*/
/*                                     <td>{{ questionnaire.getQ45Obs() }}</td>*/
/*                                     <td>{{ questionnaire.getQ46() }}</td>*/
/*                                     <td>{{ questionnaire.getQ46Obs() }}</td>*/
/*                                     <td>{{ questionnaire.getQ47() }}</td>*/
/*                                     <td>{{ questionnaire.getQ47Obs() }}</td>*/
/*                                     <td>{{ questionnaire.getQ48() }}</td>*/
/*                                     <td>{{ questionnaire.getQ48Obs() }}</td>*/
/*                                     <td>{{ questionnaire.getQ49() }}</td>*/
/*                                     <td>{{ questionnaire.getQ49Obs() }}</td>*/
/*                                     <td>{{ questionnaire.getObs() }}</td>*/
/*                                 </tr>*/
/*                             {% endfor %}*/
/*                         </tbody>*/
/*                         </table>*/
/*                     </div>*/
/*                 </div>*/
/* */
/*             <div style="margin-left:15px;">*/
/*                 <input type="checkbox" value="Save" checked class="saisies_saved"/> Saisies enregistrées*/
/*                 <input type="checkbox" value="toUpdate" checked class="saisies_to_pdate"/> Saisies à valider*/
/*             </div>*/
/* */
/*         </div><!-- row navigation-->*/
/*         */
/*     </div><!-- container navigation-->*/
/* */
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/*     <script src="{{ asset('highcharts/highcharts.js') }}"></script>*/
/*     <script src="{{ asset('highcharts/modules/exporting.js') }}"></script>*/
/*     <script src="{{ asset('js/pa/fiches/all.js') }}"></script>*/
/* {% endblock %}*/
