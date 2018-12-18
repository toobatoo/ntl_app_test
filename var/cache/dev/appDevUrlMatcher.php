<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // mobile_pa_feuilles_routes_get_all
        if ($pathinfo === '/MobilePA/Feuille_route/getAll') {
            return array (  '_controller' => 'MobilePaBundle\\Controller\\FeuilleRouteController::getAllAction',  '_route' => 'mobile_pa_feuilles_routes_get_all',);
        }

        // client_homepage
        if (rtrim($pathinfo, '/') === '/Client') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'client_homepage');
            }

            return array (  '_controller' => 'ClientBundle\\Controller\\HomeController::indexAction',  '_route' => 'client_homepage',);
        }

        if (0 === strpos($pathinfo, '/pa')) {
            if (0 === strpos($pathinfo, '/pa/feuille_route')) {
                // pa_feuille_route_home
                if ($pathinfo === '/pa/feuille_route/home') {
                    return array (  '_controller' => 'PaBundle\\Controller\\FeuilleRouteController::homeAction',  '_route' => 'pa_feuille_route_home',);
                }

                if (0 === strpos($pathinfo, '/pa/feuille_route/s')) {
                    // pa_feuille_route_select_zones
                    if ($pathinfo === '/pa/feuille_route/select_zones') {
                        return array (  '_controller' => 'PaBundle\\Controller\\FeuilleRouteController::selectZonesAction',  '_route' => 'pa_feuille_route_select_zones',);
                    }

                    // pa_feuille_route_save
                    if ($pathinfo === '/pa/feuille_route/save') {
                        return array (  '_controller' => 'PaBundle\\Controller\\FeuilleRouteController::saveAction',  '_route' => 'pa_feuille_route_save',);
                    }

                }

                // pa_feuille_route_export
                if ($pathinfo === '/pa/feuille_route/export') {
                    return array (  '_controller' => 'PaBundle\\Controller\\FeuilleRouteController::exportAction',  '_route' => 'pa_feuille_route_export',);
                }

                // pa_feuille_route_import_by_list
                if ($pathinfo === '/pa/feuille_route/import_by_list') {
                    return array (  '_controller' => 'PaBundle\\Controller\\FeuilleRouteController::saveByUploadAction',  '_route' => 'pa_feuille_route_import_by_list',);
                }

            }

            // pa_homepage
            if ($pathinfo === '/pa/homepage') {
                return array (  '_controller' => 'PaBundle\\Controller\\HomeController::indexAction',  '_route' => 'pa_homepage',);
            }

            if (0 === strpos($pathinfo, '/pa/json')) {
                // pa_json_home
                if ($pathinfo === '/pa/json/home') {
                    return array (  '_controller' => 'PaBundle\\Controller\\JsonController::indexAction',  '_route' => 'pa_json_home',);
                }

                // pa_json_generate_by_line_date
                if ($pathinfo === '/pa/json/generate_by_line_date') {
                    return array (  '_controller' => 'PaBundle\\Controller\\JsonController::generateAction',  '_route' => 'pa_json_generate_by_line_date',);
                }

                // pa_json_by_line_date_set_statut_one
                if ($pathinfo === '/pa/json/by_line_date/set_statut_one') {
                    return array (  '_controller' => 'PaBundle\\Controller\\JsonController::setStatutOneAction',  '_route' => 'pa_json_by_line_date_set_statut_one',);
                }

                if (0 === strpos($pathinfo, '/pa/json/list')) {
                    // pa_json_list
                    if ($pathinfo === '/pa/json/list') {
                        return array (  '_controller' => 'PaBundle\\Controller\\JsonController::listDayAction',  '_route' => 'pa_json_list',);
                    }

                    // pa_json_list_remove
                    if ($pathinfo === '/pa/json/list_remove') {
                        return array (  '_controller' => 'PaBundle\\Controller\\JsonController::listRemoveAction',  '_route' => 'pa_json_list_remove',);
                    }

                }

                if (0 === strpos($pathinfo, '/pa/json/re_export')) {
                    // pa_json_re_export_home
                    if ($pathinfo === '/pa/json/re_export/home') {
                        return array (  '_controller' => 'PaBundle\\Controller\\JsonController::reExportHomeAction',  '_route' => 'pa_json_re_export_home',);
                    }

                    // pa_json_re_export_update
                    if ($pathinfo === '/pa/json/re_export/update') {
                        return array (  '_controller' => 'PaBundle\\Controller\\JsonController::reExportUpdateAction',  '_route' => 'pa_json_re_export_update',);
                    }

                }

                // pa_json_generate_one
                if ($pathinfo === '/pa/json/generate/one') {
                    return array (  '_controller' => 'PaBundle\\Controller\\JsonViewController::generateOneAction',  '_route' => 'pa_json_generate_one',);
                }

                // pa_json_set_statut_one
                if ($pathinfo === '/pa/json/setTtatut/one') {
                    return array (  '_controller' => 'PaBundle\\Controller\\JsonViewController::setStatutOneAction',  '_route' => 'pa_json_set_statut_one',);
                }

            }

            if (0 === strpos($pathinfo, '/pa/mesure_')) {
                // pa_mesure_reset
                if ($pathinfo === '/pa/mesure_reset') {
                    return array (  '_controller' => 'PaBundle\\Controller\\MesureResetController::indexAction',  '_route' => 'pa_mesure_reset',);
                }

                // pa_mesure_copy_files
                if ($pathinfo === '/pa/mesure_copy_files') {
                    return array (  '_controller' => 'PaBundle\\Controller\\MesureResetController::copyFilesAction',  '_route' => 'pa_mesure_copy_files',);
                }

                if (0 === strpos($pathinfo, '/pa/mesure_re')) {
                    // pa_mesure_reset_bdd
                    if ($pathinfo === '/pa/mesure_reset_bdd') {
                        return array (  '_controller' => 'PaBundle\\Controller\\MesureResetController::resetBDDAction',  '_route' => 'pa_mesure_reset_bdd',);
                    }

                    // pa_mesure_remove_files
                    if ($pathinfo === '/pa/mesure_remove_files') {
                        return array (  '_controller' => 'PaBundle\\Controller\\MesureResetController::removeFilesAction',  '_route' => 'pa_mesure_remove_files',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/pa/p')) {
                if (0 === strpos($pathinfo, '/pa/photo')) {
                    // pa_photo_upload
                    if ($pathinfo === '/pa/photo/upload') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PhotoController::uploadAction',  '_route' => 'pa_photo_upload',);
                    }

                    // pa_photo_import
                    if ($pathinfo === '/pa/photo/import') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PhotoController::importAction',  '_route' => 'pa_photo_import',);
                    }

                    // pa_photo_getname
                    if ($pathinfo === '/pa/photo/getname') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PhotoController::getnameAction',  '_route' => 'pa_photo_getname',);
                    }

                    // pa_photo_save
                    if ($pathinfo === '/pa/photo/save') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PhotoController::saveAction',  '_route' => 'pa_photo_save',);
                    }

                    // pa_photo_remove_one
                    if ($pathinfo === '/pa/photo/remove/one') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PhotoController::removeAction',  '_route' => 'pa_photo_remove_one',);
                    }

                }

                if (0 === strpos($pathinfo, '/pa/plan_sondage')) {
                    // pa_plan_sondage_import
                    if ($pathinfo === '/pa/plan_sondage/import') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PlanSondageController::importAction',  '_route' => 'pa_plan_sondage_import',);
                    }

                    // pa_plan_sondage_remove_zone_enq
                    if ($pathinfo === '/pa/plan_sondage/removeZoneEnq') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PlanSondageController::removeAction',  '_route' => 'pa_plan_sondage_remove_zone_enq',);
                    }

                    // pa_plan_sondage_upload
                    if ($pathinfo === '/pa/plan_sondage/upload') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PlanSondageController::uploadAction',  '_route' => 'pa_plan_sondage_upload',);
                    }

                }

            }

            // pa_fichier_global_view
            if ($pathinfo === '/pa/fichier_global/view') {
                return array (  '_controller' => 'PaBundle\\Controller\\PlanSondageController::viewFichierGlobalAction',  '_route' => 'pa_fichier_global_view',);
            }

            // pa_zone_enqueteur_view
            if ($pathinfo === '/pa/zone_enqueteur/view') {
                return array (  '_controller' => 'PaBundle\\Controller\\PlanSondageController::viewZoneEnqueteurAction',  '_route' => 'pa_zone_enqueteur_view',);
            }

            if (0 === strpos($pathinfo, '/pa/p')) {
                // pa_plan_sondage_export
                if ($pathinfo === '/pa/plan_sondage/export') {
                    return array (  '_controller' => 'PaBundle\\Controller\\PlanSondageController::ExportAction',  '_route' => 'pa_plan_sondage_export',);
                }

                if (0 === strpos($pathinfo, '/pa/prevu_realise')) {
                    // pa_prevu_realise
                    if ($pathinfo === '/pa/prevu_realise') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PrevuRealiseController::indexAction',  '_route' => 'pa_prevu_realise',);
                    }

                    // pa_prevu_realise_add
                    if ($pathinfo === '/pa/prevu_realise/add') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PrevuRealiseController::addAction',  '_route' => 'pa_prevu_realise_add',);
                    }

                    // pa_prevu_realise_add_import
                    if ($pathinfo === '/pa/prevu_realise/import') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PrevuRealiseController::addImportAction',  '_route' => 'pa_prevu_realise_add_import',);
                    }

                    // pa_prevu_realise_remove
                    if (0 === strpos($pathinfo, '/pa/prevu_realise/remove') && preg_match('#^/pa/prevu_realise/remove/(?P<id>[^/]++)/(?P<file_name>[^/]++)/(?P<file_extension>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'pa_prevu_realise_remove')), array (  '_controller' => 'PaBundle\\Controller\\PrevuRealiseController::removeAction',));
                    }

                    // pa_prevu_realise_file_view
                    if ($pathinfo === '/pa/prevu_realise/file_view') {
                        return array (  '_controller' => 'PaBundle\\Controller\\PrevuRealiseController::fileViewAction',  '_route' => 'pa_prevu_realise_file_view',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/pa/questionnaire')) {
                // pa_questionnaire_all
                if (0 === strpos($pathinfo, '/pa/questionnaire/all') && preg_match('#^/pa/questionnaire/all/(?P<mois>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pa_questionnaire_all')), array (  '_controller' => 'PaBundle\\Controller\\QuestionnaireController::allAction',));
                }

                // pa_questionnaire_remove_id
                if (0 === strpos($pathinfo, '/pa/questionnaire/remove') && preg_match('#^/pa/questionnaire/remove/(?P<id>[^/]++)/(?P<mois>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pa_questionnaire_remove_id')), array (  '_controller' => 'PaBundle\\Controller\\QuestionnaireController::removeAction',));
                }

                // pa_questionnaire_all_by_filter
                if (0 === strpos($pathinfo, '/pa/questionnaire/all_by_filter') && preg_match('#^/pa/questionnaire/all_by_filter/(?P<typeFilter>[^/]++)/(?P<dataFilter>.+)/(?P<table>[^/]++)/(?P<mois>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pa_questionnaire_all_by_filter')), array (  'table' => NULL,  '_controller' => 'PaBundle\\Controller\\QuestionnaireController::allByFilterAction',));
                }

                // pa_questionnaire_one
                if (0 === strpos($pathinfo, '/pa/questionnaire/one') && preg_match('#^/pa/questionnaire/one/(?P<id>[^/]++)/(?P<table>[^/]++)/(?P<mois>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pa_questionnaire_one')), array (  '_controller' => 'PaBundle\\Controller\\QuestionnaireController::oneAction',));
                }

                if (0 === strpos($pathinfo, '/pa/questionnaire/import')) {
                    // pa_questionnaire_import_home
                    if ($pathinfo === '/pa/questionnaire/import/home') {
                        return array (  '_controller' => 'PaBundle\\Controller\\QuestionnaireController::importHomeAction',  '_route' => 'pa_questionnaire_import_home',);
                    }

                    // pa_questionnaire_import
                    if ($pathinfo === '/pa/questionnaire/import') {
                        return array (  '_controller' => 'PaBundle\\Controller\\QuestionnaireController::importAction',  '_route' => 'pa_questionnaire_import',);
                    }

                }

                // pa_questionnaire_quotas_mesures_valides
                if ($pathinfo === '/pa/questionnaire/quotas_mesures_valides') {
                    return array (  '_controller' => 'PaBundle\\Controller\\QuestionnaireController::mesuresValidesAction',  '_route' => 'pa_questionnaire_quotas_mesures_valides',);
                }

                // pa_questionnaire_all_export
                if ($pathinfo === '/pa/questionnaire/all_export') {
                    return array (  '_controller' => 'PaBundle\\Controller\\QuestionnaireController::exportAction',  '_route' => 'pa_questionnaire_all_export',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        if (0 === strpos($pathinfo, '/bus')) {
            if (0 === strpos($pathinfo, '/bus/database')) {
                // bus_database
                if ($pathinfo === '/bus/database') {
                    return array (  '_controller' => 'BusBundle\\Controller\\DataBaseController::indexAction',  '_route' => 'bus_database',);
                }

                // bus_database_save
                if ($pathinfo === '/bus/database/save') {
                    return array (  '_controller' => 'BusBundle\\Controller\\DataBaseController::saveAction',  '_route' => 'bus_database_save',);
                }

            }

            // bus_homepage
            if ($pathinfo === '/bus/homepage') {
                return array (  '_controller' => 'BusBundle\\Controller\\HomeController::indexAction',  '_route' => 'bus_homepage',);
            }

            if (0 === strpos($pathinfo, '/bus/json')) {
                // bus_json_home
                if ($pathinfo === '/bus/json/home') {
                    return array (  '_controller' => 'BusBundle\\Controller\\JsonController::indexAction',  '_route' => 'bus_json_home',);
                }

                if (0 === strpos($pathinfo, '/bus/json/ge')) {
                    // bus_json_generate_by_line_date
                    if ($pathinfo === '/bus/json/generate_by_line_date') {
                        return array (  '_controller' => 'BusBundle\\Controller\\JsonController::generateAction',  '_route' => 'bus_json_generate_by_line_date',);
                    }

                    // bus_json_get_error_log
                    if ($pathinfo === '/bus/json/get_error_log') {
                        return array (  '_controller' => 'BusBundle\\Controller\\JsonController::errorLogAction',  '_route' => 'bus_json_get_error_log',);
                    }

                }

                if (0 === strpos($pathinfo, '/bus/json/list')) {
                    // bus_json_list
                    if ($pathinfo === '/bus/json/list') {
                        return array (  '_controller' => 'BusBundle\\Controller\\JsonController::listDayAction',  '_route' => 'bus_json_list',);
                    }

                    // bus_json_list_remove
                    if ($pathinfo === '/bus/json/list_remove') {
                        return array (  '_controller' => 'BusBundle\\Controller\\JsonController::listRemoveAction',  '_route' => 'bus_json_list_remove',);
                    }

                }

                if (0 === strpos($pathinfo, '/bus/json/re_export')) {
                    // bus_json_re_export_home
                    if ($pathinfo === '/bus/json/re_export/home') {
                        return array (  '_controller' => 'BusBundle\\Controller\\JsonController::reExportHomeAction',  '_route' => 'bus_json_re_export_home',);
                    }

                    // bus_json_re_export_update
                    if ($pathinfo === '/bus/json/re_export/update') {
                        return array (  '_controller' => 'BusBundle\\Controller\\JsonController::reExportUpdateAction',  '_route' => 'bus_json_re_export_update',);
                    }

                }

                // bus_json
                if ($pathinfo === '/bus/json') {
                    return array (  '_controller' => 'BusBundle\\Controller\\JsonViewController::indexAction',  '_route' => 'bus_json',);
                }

                if (0 === strpos($pathinfo, '/bus/json/generate')) {
                    // bus_json_generate
                    if ($pathinfo === '/bus/json/generate') {
                        return array (  '_controller' => 'BusBundle\\Controller\\JsonViewController::generateAction',  '_route' => 'bus_json_generate',);
                    }

                    // bus_json_generate_one
                    if ($pathinfo === '/bus/json/generate/one') {
                        return array (  '_controller' => 'BusBundle\\Controller\\JsonViewController::generateOneAction',  '_route' => 'bus_json_generate_one',);
                    }

                }

                // bus_json_set_statut_one
                if ($pathinfo === '/bus/json/setTtatut/one') {
                    return array (  '_controller' => 'BusBundle\\Controller\\JsonViewController::setStatutOneAction',  '_route' => 'bus_json_set_statut_one',);
                }

            }

            if (0 === strpos($pathinfo, '/bus/mesure_')) {
                // bus_mesure_reset
                if ($pathinfo === '/bus/mesure_reset') {
                    return array (  '_controller' => 'BusBundle\\Controller\\MesureResetController::indexAction',  '_route' => 'bus_mesure_reset',);
                }

                // bus_mesure_copy_files
                if ($pathinfo === '/bus/mesure_copy_files') {
                    return array (  '_controller' => 'BusBundle\\Controller\\MesureResetController::copyFilesAction',  '_route' => 'bus_mesure_copy_files',);
                }

                if (0 === strpos($pathinfo, '/bus/mesure_re')) {
                    // bus_mesure_reset_bdd
                    if ($pathinfo === '/bus/mesure_reset_bdd') {
                        return array (  '_controller' => 'BusBundle\\Controller\\MesureResetController::resetBDDAction',  '_route' => 'bus_mesure_reset_bdd',);
                    }

                    // bus_mesure_remove_files
                    if ($pathinfo === '/bus/mesure_remove_files') {
                        return array (  '_controller' => 'BusBundle\\Controller\\MesureResetController::removeFilesAction',  '_route' => 'bus_mesure_remove_files',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/bus/p')) {
                if (0 === strpos($pathinfo, '/bus/photo')) {
                    // bus_photo_upload
                    if ($pathinfo === '/bus/photo/uplaod') {
                        return array (  '_controller' => 'BusBundle\\Controller\\PhotoController::uploadAction',  '_route' => 'bus_photo_upload',);
                    }

                    // bus_photo_remove_one
                    if (0 === strpos($pathinfo, '/bus/photo/remove/one') && preg_match('#^/bus/photo/remove/one/(?P<id>[^/]++)/(?P<table>[^/]++)/(?P<mois>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bus_photo_remove_one')), array (  '_controller' => 'BusBundle\\Controller\\PhotoController::removeAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/bus/plan_sondage')) {
                    // bus_plan_sondage_home
                    if ($pathinfo === '/bus/plan_sondage/home') {
                        return array (  '_controller' => 'BusBundle\\Controller\\PlanSondageController::indexAction',  '_route' => 'bus_plan_sondage_home',);
                    }

                    if (0 === strpos($pathinfo, '/bus/plan_sondage/import')) {
                        // bus_plan_sondage_import_home
                        if ($pathinfo === '/bus/plan_sondage/import/home') {
                            return array (  '_controller' => 'BusBundle\\Controller\\PlanSondageController::importHomeAction',  '_route' => 'bus_plan_sondage_import_home',);
                        }

                        // bus_plan_sondage_import
                        if ($pathinfo === '/bus/plan_sondage/import') {
                            return array (  '_controller' => 'BusBundle\\Controller\\PlanSondageController::importAction',  '_route' => 'bus_plan_sondage_import',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/bus/prevu_realise')) {
                    // bus_prevu_realise
                    if ($pathinfo === '/bus/prevu_realise') {
                        return array (  '_controller' => 'BusBundle\\Controller\\PrevuRealiseController::indexAction',  '_route' => 'bus_prevu_realise',);
                    }

                    // bus_prevu_realise_add
                    if ($pathinfo === '/bus/prevu_realise/add') {
                        return array (  '_controller' => 'BusBundle\\Controller\\PrevuRealiseController::addAction',  '_route' => 'bus_prevu_realise_add',);
                    }

                    // bus_prevu_realise_add_import
                    if ($pathinfo === '/bus/prevu_realise/import') {
                        return array (  '_controller' => 'BusBundle\\Controller\\PrevuRealiseController::addImportAction',  '_route' => 'bus_prevu_realise_add_import',);
                    }

                    // bus_prevu_realise_remove
                    if (0 === strpos($pathinfo, '/bus/prevu_realise/remove') && preg_match('#^/bus/prevu_realise/remove/(?P<id>[^/]++)/(?P<file_name>[^/]++)/(?P<file_extension>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bus_prevu_realise_remove')), array (  '_controller' => 'BusBundle\\Controller\\PrevuRealiseController::removeAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/bus/questionnaire')) {
                // bus_questionnaire_all
                if (0 === strpos($pathinfo, '/bus/questionnaire/all') && preg_match('#^/bus/questionnaire/all/(?P<mois>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bus_questionnaire_all')), array (  '_controller' => 'BusBundle\\Controller\\QuestionnaireController::allAction',));
                }

                // bus_questionnaire_one
                if (0 === strpos($pathinfo, '/bus/questionnaire/one') && preg_match('#^/bus/questionnaire/one/(?P<id>[^/]++)/(?P<table>[^/]++)/(?P<mois>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bus_questionnaire_one')), array (  '_controller' => 'BusBundle\\Controller\\QuestionnaireController::oneAction',));
                }

                // bus_questionnaire_remove_id
                if (0 === strpos($pathinfo, '/bus/questionnaire/remove') && preg_match('#^/bus/questionnaire/remove/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bus_questionnaire_remove_id')), array (  '_controller' => 'BusBundle\\Controller\\QuestionnaireController::removeAction',));
                }

                // bus_questionnaire_all_by_filter
                if (0 === strpos($pathinfo, '/bus/questionnaire/all_by_filter') && preg_match('#^/bus/questionnaire/all_by_filter/(?P<typeFilter>[^/]++)/(?P<dataFilter>.+)/(?P<table>[^/]++)/(?P<mois>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bus_questionnaire_all_by_filter')), array (  '_controller' => 'BusBundle\\Controller\\QuestionnaireController::allByFilterAction',));
                }

                // bus_questionnaire_quotas_mesures_valides
                if ($pathinfo === '/bus/questionnaire/quotas_mesures_valides') {
                    return array (  '_controller' => 'BusBundle\\Controller\\QuestionnaireController::mesuresValidesAction',  '_route' => 'bus_questionnaire_quotas_mesures_valides',);
                }

                // bus_questionnaire_import
                if ($pathinfo === '/bus/questionnaire/import') {
                    return array (  '_controller' => 'BusBundle\\Controller\\QuestionnaireController::importAction',  '_route' => 'bus_questionnaire_import',);
                }

                // bus_questionnaire_all_export
                if ($pathinfo === '/bus/questionnaire/all_export') {
                    return array (  '_controller' => 'BusBundle\\Controller\\QuestionnaireController::exportAction',  '_route' => 'bus_questionnaire_all_export',);
                }

            }

        }

        // referentiel_client_export
        if ($pathinfo === '/ntl/referentiel/client/export') {
            return array (  '_controller' => 'BusBundle\\Controller\\ReferentielController::exportAction',  '_route' => 'referentiel_client_export',);
        }

        if (0 === strpos($pathinfo, '/bus/reporting')) {
            if (0 === strpos($pathinfo, '/bus/reporting/compare_month')) {
                // bus_reporting_compare_month
                if ($pathinfo === '/bus/reporting/compare_month') {
                    return array (  '_controller' => 'BusBundle\\Controller\\ReportingCompareMonthController::indexAction',  '_route' => 'bus_reporting_compare_month',);
                }

                // bus_reporting_compare_month_init_graph
                if ($pathinfo === '/bus/reporting/compare_month_init_graph') {
                    return array (  '_controller' => 'BusBundle\\Controller\\ReportingCompareMonthController::initConformesAction',  '_route' => 'bus_reporting_compare_month_init_graph',);
                }

            }

            if (0 === strpos($pathinfo, '/bus/reporting/now')) {
                // bus_reporting_now
                if ($pathinfo === '/bus/reporting/now') {
                    return array (  '_controller' => 'BusBundle\\Controller\\ReportingNowController::indexAction',  '_route' => 'bus_reporting_now',);
                }

                if (0 === strpos($pathinfo, '/bus/reporting/now/init')) {
                    // bus_reporting_now_initconformes
                    if ($pathinfo === '/bus/reporting/now/initconformes') {
                        return array (  '_controller' => 'BusBundle\\Controller\\ReportingNowController::initConformesAction',  '_route' => 'bus_reporting_now_initconformes',);
                    }

                    if (0 === strpos($pathinfo, '/bus/reporting/now/initn')) {
                        // bus_reporting_now_initnc
                        if ($pathinfo === '/bus/reporting/now/initnc') {
                            return array (  '_controller' => 'BusBundle\\Controller\\ReportingNowController::initNcAction',  '_route' => 'bus_reporting_now_initnc',);
                        }

                        // bus_reporting_now_initno
                        if ($pathinfo === '/bus/reporting/now/initno') {
                            return array (  '_controller' => 'BusBundle\\Controller\\ReportingNowController::initNoAction',  '_route' => 'bus_reporting_now_initno',);
                        }

                    }

                    // bus_reporting_now_initabconformite
                    if ($pathinfo === '/bus/reporting/now/initabconformite') {
                        return array (  '_controller' => 'BusBundle\\Controller\\ReportingNowController::iniTabConformite',  '_route' => 'bus_reporting_now_initabconformite',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/bus/reporting/year')) {
                // bus_reporting_year
                if ($pathinfo === '/bus/reporting/year') {
                    return array (  '_controller' => 'BusBundle\\Controller\\ReportingYearController::indexAction',  '_route' => 'bus_reporting_year',);
                }

                if (0 === strpos($pathinfo, '/bus/reporting/year/init')) {
                    // bus_reporting_year_initconformes
                    if ($pathinfo === '/bus/reporting/year/initconformes') {
                        return array (  '_controller' => 'BusBundle\\Controller\\ReportingYearController::initConformesAction',  '_route' => 'bus_reporting_year_initconformes',);
                    }

                    // bus_reporting_year_initnc
                    if ($pathinfo === '/bus/reporting/year/initnc') {
                        return array (  '_controller' => 'BusBundle\\Controller\\ReportingYearController::initncAction',  '_route' => 'bus_reporting_year_initnc',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/client/compte_rendu')) {
            // client_compte_rendu
            if ($pathinfo === '/client/compte_rendu/home') {
                return array (  '_controller' => 'AppBundle\\Controller\\CompteRenduController::indexAction',  '_route' => 'client_compte_rendu',);
            }

            // client_compte_rendu_add
            if ($pathinfo === '/client/compte_rendu/add') {
                return array (  '_controller' => 'AppBundle\\Controller\\CompteRenduController::addAction',  '_route' => 'client_compte_rendu_add',);
            }

            // client_compte_rendu_add_import
            if ($pathinfo === '/client/compte_rendu/import') {
                return array (  '_controller' => 'AppBundle\\Controller\\CompteRenduController::addImportAction',  '_route' => 'client_compte_rendu_add_import',);
            }

            // client_compte_rendu_remove
            if (0 === strpos($pathinfo, '/client/compte_rendu/remove') && preg_match('#^/client/compte_rendu/remove/(?P<id>[^/]++)/(?P<bilan_name>[^/]++)/(?P<bilan_extension>[^/]++)/(?P<cr_name>[^/]++)/(?P<cr_extension>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_compte_rendu_remove')), array (  '_controller' => 'AppBundle\\Controller\\CompteRenduController::removeAction',));
            }

            // client_compte_rendu_update
            if (0 === strpos($pathinfo, '/client/compte_rendu/update') && preg_match('#^/client/compte_rendu/update/(?P<id>[^/]++)/(?P<date>.+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_compte_rendu_update')), array (  '_controller' => 'AppBundle\\Controller\\CompteRenduController::updateAction',));
            }

            // client_compte_rendu_add_import_update
            if ($pathinfo === '/client/compte_rendu/import_update') {
                return array (  '_controller' => 'AppBundle\\Controller\\CompteRenduController::addUpdatetAction',  '_route' => 'client_compte_rendu_add_import_update',);
            }

        }

        if (0 === strpos($pathinfo, '/Client/dysfonctionnement')) {
            // app_dysfonctionnement
            if ($pathinfo === '/Client/dysfonctionnement') {
                return array (  '_controller' => 'AppBundle\\Controller\\DysfonctionnementController::indexAction',  '_route' => 'app_dysfonctionnement',);
            }

            // app_dysfonctionnement_one
            if ($pathinfo === '/Client/dysfonctionnement/one') {
                return array (  '_controller' => 'AppBundle\\Controller\\DysfonctionnementController::oneAction',  '_route' => 'app_dysfonctionnement_one',);
            }

            if (0 === strpos($pathinfo, '/Client/dysfonctionnement/add')) {
                // app_dysfonctionnement_add_page
                if ($pathinfo === '/Client/dysfonctionnement/add/page') {
                    return array (  '_controller' => 'AppBundle\\Controller\\DysfonctionnementController::addPageAction',  '_route' => 'app_dysfonctionnement_add_page',);
                }

                // app_dysfonctionnement_add
                if ($pathinfo === '/Client/dysfonctionnement/add') {
                    return array (  '_controller' => 'AppBundle\\Controller\\DysfonctionnementController::addAction',  '_route' => 'app_dysfonctionnement_add',);
                }

            }

            // app_dysfonctionnement_remove
            if ($pathinfo === '/Client/dysfonctionnement/remove') {
                return array (  '_controller' => 'AppBundle\\Controller\\DysfonctionnementController::removeAction',  '_route' => 'app_dysfonctionnement_remove',);
            }

            if (0 === strpos($pathinfo, '/Client/dysfonctionnement/update')) {
                // client_dysfonctionnement_update_admin_one
                if ($pathinfo === '/Client/dysfonctionnement/update/admin/one') {
                    return array (  '_controller' => 'AppBundle\\Controller\\DysfonctionnementController::updateAdminAction',  '_route' => 'client_dysfonctionnement_update_admin_one',);
                }

                // client_dysfonctionnement_update_client_one
                if ($pathinfo === '/Client/dysfonctionnement/update/client/one') {
                    return array (  '_controller' => 'AppBundle\\Controller\\DysfonctionnementController::updateAClientAction',  '_route' => 'client_dysfonctionnement_update_client_one',);
                }

            }

            if (0 === strpos($pathinfo, '/Client/dysfonctionnement/Export')) {
                // app_dysfonctionnement_export
                if ($pathinfo === '/Client/dysfonctionnement/Export') {
                    return array (  '_controller' => 'AppBundle\\Controller\\DysfonctionnementController::exportAction',  '_route' => 'app_dysfonctionnement_export',);
                }

                // app_dysfonctionnement_export_year
                if ($pathinfo === '/Client/dysfonctionnement/Export/Year') {
                    return array (  '_controller' => 'AppBundle\\Controller\\DysfonctionnementController::exportYearAction',  '_route' => 'app_dysfonctionnement_export_year',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/app/echange')) {
            // app_echange
            if ($pathinfo === '/app/echange') {
                return array (  '_controller' => 'AppBundle\\Controller\\EchangeController::indexAction',  '_route' => 'app_echange',);
            }

            // app_echange_insert
            if ($pathinfo === '/app/echange/insert') {
                return array (  '_controller' => 'AppBundle\\Controller\\EchangeController::insertAction',  '_route' => 'app_echange_insert',);
            }

            // app_echange_remove
            if ($pathinfo === '/app/echange/remove') {
                return array (  '_controller' => 'AppBundle\\Controller\\EchangeController::removeAction',  '_route' => 'app_echange_remove',);
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\HomeController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/client/matricule')) {
            // client_matricule
            if ($pathinfo === '/client/matricule/home') {
                return array (  '_controller' => 'AppBundle\\Controller\\MatriculeController::indexAction',  '_route' => 'client_matricule',);
            }

            // client_matricule_remove
            if (0 === strpos($pathinfo, '/client/matricule/remove') && preg_match('#^/client/matricule/remove/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_matricule_remove')), array (  '_controller' => 'AppBundle\\Controller\\MatriculeController::removeAction',));
            }

            if (0 === strpos($pathinfo, '/client/matricule/update')) {
                // client_matricule_update
                if ($pathinfo === '/client/matricule/update') {
                    return array (  '_controller' => 'AppBundle\\Controller\\MatriculeController::updateAction',  '_route' => 'client_matricule_update',);
                }

                // client_matricule_update_data
                if ($pathinfo === '/client/matricule/update_data') {
                    return array (  '_controller' => 'AppBundle\\Controller\\MatriculeController::updateDataAction',  '_route' => 'client_matricule_update_data',);
                }

            }

            if (0 === strpos($pathinfo, '/client/matricule/add')) {
                // client_matricule_add
                if ($pathinfo === '/client/matricule/add') {
                    return array (  '_controller' => 'AppBundle\\Controller\\MatriculeController::addAction',  '_route' => 'client_matricule_add',);
                }

                // client_matricule_add_new
                if ($pathinfo === '/client/matricule/add_new') {
                    return array (  '_controller' => 'AppBundle\\Controller\\MatriculeController::addNewAction',  '_route' => 'client_matricule_add_new',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/Client/Plan_action')) {
            // client_plan_action
            if ($pathinfo === '/Client/Plan_action/home') {
                return array (  '_controller' => 'AppBundle\\Controller\\PlanActionController::indexAction',  '_route' => 'client_plan_action',);
            }

            // client_plan_action_import
            if ($pathinfo === '/Client/Plan_action/import') {
                return array (  '_controller' => 'AppBundle\\Controller\\PlanActionController::importAction',  '_route' => 'client_plan_action_import',);
            }

        }

        if (0 === strpos($pathinfo, '/referentiel')) {
            // referentiel_changes
            if ($pathinfo === '/referentiel/changes') {
                return array (  '_controller' => 'AppBundle\\Controller\\ReferentielController::referentielChangesAction',  '_route' => 'referentiel_changes',);
            }

            // referentiel_update
            if ($pathinfo === '/referentiel/update') {
                return array (  '_controller' => 'AppBundle\\Controller\\ReferentielController::updateAction',  '_route' => 'referentiel_update',);
            }

            // export_referentiel_today
            if ($pathinfo === '/referentiel/export/today') {
                return array (  '_controller' => 'AppBundle\\Controller\\ReferentielController::copyExportReferentielToDay',  '_route' => 'export_referentiel_today',);
            }

        }

        if (0 === strpos($pathinfo, '/Client/ticket')) {
            // app_ticket
            if ($pathinfo === '/Client/ticket') {
                return array (  '_controller' => 'AppBundle\\Controller\\TicketController::indexAction',  '_route' => 'app_ticket',);
            }

            if (0 === strpos($pathinfo, '/Client/ticket/add')) {
                // app_ticket_add_page
                if ($pathinfo === '/Client/ticket/add') {
                    return array (  '_controller' => 'AppBundle\\Controller\\TicketController::addAction',  '_route' => 'app_ticket_add_page',);
                }

                // app_ticket_add_form
                if ($pathinfo === '/Client/ticket/add_form') {
                    return array (  '_controller' => 'AppBundle\\Controller\\TicketController::addFormAction',  '_route' => 'app_ticket_add_form',);
                }

            }

            // app_ticket_remove
            if ($pathinfo === '/Client/ticket/remove') {
                return array (  '_controller' => 'AppBundle\\Controller\\TicketController::removeAction',  '_route' => 'app_ticket_remove',);
            }

        }

        if (0 === strpos($pathinfo, '/api')) {
            // api_entrypoint
            if (preg_match('#^/api(?:/(?P<index>index)(?:\\.(?P<_format>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_entrypoint')), array (  '_controller' => 'api_platform.action.entrypoint',  '_format' => '',  '_api_respond' => '1',  'index' => 'index',));
            }

            // api_doc
            if (0 === strpos($pathinfo, '/api/docs') && preg_match('#^/api/docs(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_doc')), array (  '_controller' => 'api_platform.action.documentation',  '_api_respond' => '1',  '_format' => '',));
            }

            // api_jsonld_context
            if (0 === strpos($pathinfo, '/api/contexts') && preg_match('#^/api/contexts/(?P<shortName>.+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_jsonld_context')), array (  '_controller' => 'api_platform.jsonld.action.context',  '_api_respond' => '1',  '_format' => 'jsonld',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
