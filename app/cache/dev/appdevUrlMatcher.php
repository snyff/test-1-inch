<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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
        $pathinfo = urldecode($pathinfo);

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // AdminAdminBundle_login
        if ($pathinfo === '/administrator') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'AdminAdminBundle_login',);
        }

        // AdminAdminBundle_excute_login
        if ($pathinfo === '/administrator/login') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::executeLoginAction',  '_route' => 'AdminAdminBundle_excute_login',);
        }

        // AdminAdminBundle_dau_list
        if ($pathinfo === '/administrator/dau-list') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::dauListAction',  '_route' => 'AdminAdminBundle_dau_list',);
        }

        // AdminAdminBundle_delete_dau
        if ($pathinfo === '/administrator/delete-dau') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::deleteDauAction',  '_route' => 'AdminAdminBundle_delete_dau',);
        }

        // AdminAdminBundle_hide_dau
        if ($pathinfo === '/administrator/hide-dau') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::hideDauAction',  '_route' => 'AdminAdminBundle_hide_dau',);
        }

        // AdminAdminBundle_current_time_dau
        if ($pathinfo === '/administrator/set-current-time-dau') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::setCurrentTimeDauAction',  '_route' => 'AdminAdminBundle_current_time_dau',);
        }

        // AdminAdminBundle_modify_dau
        if ($pathinfo === '/administrator/modify-dau') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::modifyDauAction',  '_route' => 'AdminAdminBundle_modify_dau',);
        }

        // AdminAdminBundle_delete_photo
        if ($pathinfo === '/administrator/delete-photo') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::deletePhotoAction',  '_route' => 'AdminAdminBundle_delete_photo',);
        }

        // AdminAdminBundle_ann_settings
        if ($pathinfo === '/administrator/announcements-settings') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::annSettingsAction',  '_route' => 'AdminAdminBundle_ann_settings',);
        }

        // AdminAdminBundle_inchiriez_list
        if ($pathinfo === '/administrator/inchiriez-list') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::inchiriezListAction',  '_route' => 'AdminAdminBundle_inchiriez_list',);
        }

        // AdminAdminBundle_delete_inchiriez
        if ($pathinfo === '/administrator/delete-inchiriez') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::deleteInchiriezAction',  '_route' => 'AdminAdminBundle_delete_inchiriez',);
        }

        // AdminAdminBundle_contacts_list
        if ($pathinfo === '/administrator/contacts-list') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::contactsListAction',  '_route' => 'AdminAdminBundle_contacts_list',);
        }

        // AdminAdminBundle_delete_contacts
        if ($pathinfo === '/administrator/delete-contacts') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::deleteContactsAction',  '_route' => 'AdminAdminBundle_delete_contacts',);
        }

        // AdminAdminBundle_999_list
        if ($pathinfo === '/administrator/999-list') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::list999Action',  '_route' => 'AdminAdminBundle_999_list',);
        }

        // AdminAdminBundle_makler_list
        if ($pathinfo === '/administrator/makler-list') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::listMaklerAction',  '_route' => 'AdminAdminBundle_makler_list',);
        }

        // DauDauBundle_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'DauDauBundle_homepage');
            }
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::homepageAction',  '_route' => 'DauDauBundle_homepage',);
        }

        // DauDauBundle_ann_details
        if (0 === strpos($pathinfo, '/gazda-md-chirie-in-chisinau') && preg_match('#^/gazda\\-md\\-chirie\\-in\\-chisinau/(?P<id>\\d+)/(?P<title_slug>[^/]+?)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_DauDauBundle_ann_details;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::annDetailsAction',)), array('_route' => 'DauDauBundle_ann_details'));
        }
        not_DauDauBundle_ann_details:

        // DauDauBundle_ann_details_ru
        if (0 === strpos($pathinfo, '/сниму') && preg_match('#^/сниму/(?P<id>\\d+)/(?P<title_slug>[^/]+?)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_DauDauBundle_ann_details_ru;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::annDetailsAction',)), array('_route' => 'DauDauBundle_ann_details_ru'));
        }
        not_DauDauBundle_ann_details_ru:

        // DauDauBundle_inchiriez_details
        if (0 === strpos($pathinfo, '/inchiriez-details') && preg_match('#^/inchiriez\\-details/(?P<id>\\d+)/(?P<title_slug>[^/]+?)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_DauDauBundle_inchiriez_details;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::inchiriezDetailsAction',)), array('_route' => 'DauDauBundle_inchiriez_details'));
        }
        not_DauDauBundle_inchiriez_details:

        // DauDauBundle_addDau
        if ($pathinfo === '/dau-gazda-in-chirie') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::addDauAction',  '_route' => 'DauDauBundle_addDau',);
        }

        // DauDauBundle_addInchiriez
        if ($pathinfo === '/add-inchiriez') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::addInchiriezAction',  '_route' => 'DauDauBundle_addInchiriez',);
        }

        // DauDauBundle_addAnnouncement
        if ($pathinfo === '/add-announcement') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::addAnnouncementAction',  '_route' => 'DauDauBundle_addAnnouncement',);
        }

        // DauDauBundle_thankyou
        if ($pathinfo === '/thankyou') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::thankYouAction',  '_route' => 'DauDauBundle_thankyou',);
        }

        // DauDauBundle_dauAnnouncements
        if ($pathinfo === '/gazda-md-chirie-chisinau') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',  '_route' => 'DauDauBundle_dauAnnouncements',);
        }

        // DauDauBundle_inchiriezAnnouncements
        if ($pathinfo === '/anunturi-inchiriez') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::inchiriezAnnouncementsAction',  '_route' => 'DauDauBundle_inchiriezAnnouncements',);
        }

        // DauDauBundle_add_photos
        if ($pathinfo === '/add-photos') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::addPhotosAction',  '_route' => 'DauDauBundle_add_photos',);
        }

        // DauDauBundle_delete_dau
        if (0 === strpos($pathinfo, '/sterge-anunt') && preg_match('#^/sterge\\-anunt/(?P<secret_hash>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::deleteDauAction',)), array('_route' => 'DauDauBundle_delete_dau'));
        }

        // DauDauBundle_contacts
        if ($pathinfo === '/contacts') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::contactsAction',  '_route' => 'DauDauBundle_contacts',);
        }

        // DauDauBundle_about_us
        if ($pathinfo === '/about-us') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::aboutAction',  '_route' => 'DauDauBundle_about_us',);
        }

        // DauDauBundle_rules
        if ($pathinfo === '/rules') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::rulesAction',  '_route' => 'DauDauBundle_rules',);
        }

        // DauDauBundle_accept_ann_admin
        if ($pathinfo === '/accept-ann-admin') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::acceptDeleteAnnAdminAction',  '_route' => 'DauDauBundle_accept_ann_admin',);
        }

        // DauDauBundle_dau_list_SEO_sector
        if (0 === strpos($pathinfo, '/gazda') && preg_match('#^/gazda\\-(?P<sector>\\w+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_DauDauBundle_dau_list_SEO_sector;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',)), array('_route' => 'DauDauBundle_dau_list_SEO_sector'));
        }
        not_DauDauBundle_dau_list_SEO_sector:

        // DauDauBundle_dau_list_SEO_camere
        if (0 === strpos($pathinfo, '/gazda') && preg_match('#^/gazda\\-(?P<camere>\\d+)\\-camere$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_DauDauBundle_dau_list_SEO_camere;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',)), array('_route' => 'DauDauBundle_dau_list_SEO_camere'));
        }
        not_DauDauBundle_dau_list_SEO_camere:

        // DauDauBundle_dau_list_SEO_camere_sector
        if (0 === strpos($pathinfo, '/gazda') && preg_match('#^/gazda\\-(?P<sector>\\w+)\\-(?P<camere>\\d+)\\-camere$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_DauDauBundle_dau_list_SEO_camere_sector;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',)), array('_route' => 'DauDauBundle_dau_list_SEO_camere_sector'));
        }
        not_DauDauBundle_dau_list_SEO_camere_sector:

        // sitemap
        if ($pathinfo === '/sitemap.xml') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::sitemapAction',  '_route' => 'sitemap',);
        }

        // DauDauBundle_use_normal_site
        if ($pathinfo === '/use-normal') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::useNormalSiteAction',  '_route' => 'DauDauBundle_use_normal_site',);
        }

        // page1
        if (0 === strpos($pathinfo, '/rom') && preg_match('#^/rom/(?P<name>.+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::pages410Action',)), array('_route' => 'page1'));
        }

        // page2
        if (0 === strpos($pathinfo, '/rus') && preg_match('#^/rus/(?P<name>.+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::pages410Action',)), array('_route' => 'page2'));
        }

        // page3
        if (0 === strpos($pathinfo, '/eng') && preg_match('#^/eng/(?P<name>.+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::pages410Action',)), array('_route' => 'page3'));
        }

        // page4
        if ($pathinfo === '/compare.swf') {
            return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::pages410Action',  '_route' => 'page4',);
        }

        if (0 === strpos($pathinfo, '/mobile')) {
            // DauDauBundle_dauAnnouncements_mobile
            if (rtrim($pathinfo, '/') === '/mobile') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'DauDauBundle_dauAnnouncements_mobile');
                }
                return array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',  '_route' => 'DauDauBundle_dauAnnouncements_mobile',);
            }

            // DauDauBundle_ann_details_mobile
            if (0 === strpos($pathinfo, '/mobile/gazda-md-chirie-in-chisinau') && preg_match('#^/mobile/gazda\\-md\\-chirie\\-in\\-chisinau/(?P<id>\\d+)/(?P<title_slug>[^/]+?)$#xs', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_DauDauBundle_ann_details_mobile;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::annDetailsAction',)), array('_route' => 'DauDauBundle_ann_details_mobile'));
            }
            not_DauDauBundle_ann_details_mobile:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
