<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'AdminAdminBundle_login' => true,
       'AdminAdminBundle_excute_login' => true,
       'AdminAdminBundle_dau_list' => true,
       'AdminAdminBundle_delete_dau' => true,
       'AdminAdminBundle_hide_dau' => true,
       'AdminAdminBundle_current_time_dau' => true,
       'AdminAdminBundle_modify_dau' => true,
       'AdminAdminBundle_delete_photo' => true,
       'AdminAdminBundle_ann_settings' => true,
       'AdminAdminBundle_inchiriez_list' => true,
       'AdminAdminBundle_delete_inchiriez' => true,
       'AdminAdminBundle_contacts_list' => true,
       'AdminAdminBundle_delete_contacts' => true,
       'AdminAdminBundle_999_list' => true,
       'AdminAdminBundle_makler_list' => true,
       'DauDauBundle_homepage' => true,
       'DauDauBundle_ann_details' => true,
       'DauDauBundle_ann_details_ru' => true,
       'DauDauBundle_inchiriez_details' => true,
       'DauDauBundle_addDau' => true,
       'DauDauBundle_addInchiriez' => true,
       'DauDauBundle_addAnnouncement' => true,
       'DauDauBundle_thankyou' => true,
       'DauDauBundle_dauAnnouncements' => true,
       'DauDauBundle_inchiriezAnnouncements' => true,
       'DauDauBundle_add_photos' => true,
       'DauDauBundle_delete_dau' => true,
       'DauDauBundle_contacts' => true,
       'DauDauBundle_about_us' => true,
       'DauDauBundle_rules' => true,
       'DauDauBundle_accept_ann_admin' => true,
       'DauDauBundle_dau_list_SEO_sector' => true,
       'DauDauBundle_dau_list_SEO_camere' => true,
       'DauDauBundle_dau_list_SEO_camere_sector' => true,
       'sitemap' => true,
       'DauDauBundle_use_normal_site' => true,
       'page1' => true,
       'page2' => true,
       'page3' => true,
       'page4' => true,
       'DauDauBundle_dauAnnouncements_mobile' => true,
       'DauDauBundle_ann_details_mobile' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getAdminAdminBundle_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator',  ),));
    }

    private function getAdminAdminBundle_excute_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::executeLoginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/login',  ),));
    }

    private function getAdminAdminBundle_dau_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::dauListAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/dau-list',  ),));
    }

    private function getAdminAdminBundle_delete_dauRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::deleteDauAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/delete-dau',  ),));
    }

    private function getAdminAdminBundle_hide_dauRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::hideDauAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/hide-dau',  ),));
    }

    private function getAdminAdminBundle_current_time_dauRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::setCurrentTimeDauAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/set-current-time-dau',  ),));
    }

    private function getAdminAdminBundle_modify_dauRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::modifyDauAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/modify-dau',  ),));
    }

    private function getAdminAdminBundle_delete_photoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::deletePhotoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/delete-photo',  ),));
    }

    private function getAdminAdminBundle_ann_settingsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::annSettingsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/announcements-settings',  ),));
    }

    private function getAdminAdminBundle_inchiriez_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::inchiriezListAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/inchiriez-list',  ),));
    }

    private function getAdminAdminBundle_delete_inchiriezRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::deleteInchiriezAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/delete-inchiriez',  ),));
    }

    private function getAdminAdminBundle_contacts_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::contactsListAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/contacts-list',  ),));
    }

    private function getAdminAdminBundle_delete_contactsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::deleteContactsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/delete-contacts',  ),));
    }

    private function getAdminAdminBundle_999_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::list999Action',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/999-list',  ),));
    }

    private function getAdminAdminBundle_makler_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::listMaklerAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/administrator/makler-list',  ),));
    }

    private function getDauDauBundle_homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::homepageAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getDauDauBundle_ann_detailsRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'title_slug',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::annDetailsAction',), array (  '_method' => 'GET',  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'title_slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/gazda-md-chirie-in-chisinau',  ),));
    }

    private function getDauDauBundle_ann_details_ruRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'title_slug',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::annDetailsAction',), array (  '_method' => 'GET',  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'title_slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/сниму',  ),));
    }

    private function getDauDauBundle_inchiriez_detailsRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'title_slug',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::inchiriezDetailsAction',), array (  '_method' => 'GET',  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'title_slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/inchiriez-details',  ),));
    }

    private function getDauDauBundle_addDauRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::addDauAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dau-gazda-in-chirie',  ),));
    }

    private function getDauDauBundle_addInchiriezRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::addInchiriezAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add-inchiriez',  ),));
    }

    private function getDauDauBundle_addAnnouncementRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::addAnnouncementAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add-announcement',  ),));
    }

    private function getDauDauBundle_thankyouRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::thankYouAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/thankyou',  ),));
    }

    private function getDauDauBundle_dauAnnouncementsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/gazda-md-chirie-chisinau',  ),));
    }

    private function getDauDauBundle_inchiriezAnnouncementsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::inchiriezAnnouncementsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/anunturi-inchiriez',  ),));
    }

    private function getDauDauBundle_add_photosRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::addPhotosAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add-photos',  ),));
    }

    private function getDauDauBundle_delete_dauRouteInfo()
    {
        return array(array (  0 => 'secret_hash',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::deleteDauAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'secret_hash',  ),  1 =>   array (    0 => 'text',    1 => '/sterge-anunt',  ),));
    }

    private function getDauDauBundle_contactsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::contactsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/contacts',  ),));
    }

    private function getDauDauBundle_about_usRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::aboutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/about-us',  ),));
    }

    private function getDauDauBundle_rulesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::rulesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/rules',  ),));
    }

    private function getDauDauBundle_accept_ann_adminRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::acceptDeleteAnnAdminAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/accept-ann-admin',  ),));
    }

    private function getDauDauBundle_dau_list_SEO_sectorRouteInfo()
    {
        return array(array (  0 => 'sector',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',), array (  '_method' => 'GET',  'sector' => '\\w+',), array (  0 =>   array (    0 => 'variable',    1 => '-',    2 => '\\w+',    3 => 'sector',  ),  1 =>   array (    0 => 'text',    1 => '/gazda',  ),));
    }

    private function getDauDauBundle_dau_list_SEO_camereRouteInfo()
    {
        return array(array (  0 => 'camere',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',), array (  '_method' => 'GET',  'camere' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '-camere',  ),  1 =>   array (    0 => 'variable',    1 => '-',    2 => '\\d+',    3 => 'camere',  ),  2 =>   array (    0 => 'text',    1 => '/gazda',  ),));
    }

    private function getDauDauBundle_dau_list_SEO_camere_sectorRouteInfo()
    {
        return array(array (  0 => 'sector',  1 => 'camere',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',), array (  '_method' => 'GET',  'camere' => '\\d+',  'sector' => '\\w+',), array (  0 =>   array (    0 => 'text',    1 => '-camere',  ),  1 =>   array (    0 => 'variable',    1 => '-',    2 => '\\d+',    3 => 'camere',  ),  2 =>   array (    0 => 'variable',    1 => '-',    2 => '\\w+',    3 => 'sector',  ),  3 =>   array (    0 => 'text',    1 => '/gazda',  ),));
    }

    private function getsitemapRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::sitemapAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/sitemap.xml',  ),));
    }

    private function getDauDauBundle_use_normal_siteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::useNormalSiteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/use-normal',  ),));
    }

    private function getpage1RouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::pages410Action',), array (  'name' => '.+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '.+',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/rom',  ),));
    }

    private function getpage2RouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::pages410Action',), array (  'name' => '.+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '.+',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/rus',  ),));
    }

    private function getpage3RouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::pages410Action',), array (  'name' => '.+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '.+',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/eng',  ),));
    }

    private function getpage4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::pages410Action',), array (), array (  0 =>   array (    0 => 'text',    1 => '/compare.swf',  ),));
    }

    private function getDauDauBundle_dauAnnouncements_mobileRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::dauAnnouncementsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobile/',  ),));
    }

    private function getDauDauBundle_ann_details_mobileRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'title_slug',), array (  '_controller' => 'Dau\\DauBundle\\Controller\\DauController::annDetailsAction',), array (  '_method' => 'GET',  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'title_slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/mobile/gazda-md-chirie-in-chisinau',  ),));
    }
}
