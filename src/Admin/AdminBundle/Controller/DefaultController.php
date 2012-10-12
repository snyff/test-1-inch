<?php

namespace Admin\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Admin\AdminBundle\Security\Auth as Auth;
use Admin\AdminBundle\Extra\Nine as Nine;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('AdminAdminBundle:Default:login.html.twig');
    }

    public function loginRegisterAction() {
        return $this->render('FrontFrontBundle:login_register:login_register.html.twig');
    }

    public function executeLoginAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $login_email = $request->get('user');
        $login_pass = $request->get('password');

        if ($login_pass == '') {
            $this->get('session')->setFlash('error', 'Please provide a password.');
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }

        if ($login_email == '') {
            $this->get('session')->setFlash('error', 'Please provide a nickname.');
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }

        $user_data = $em->getRepository('DauDauBundle:Adm')->checkAdm($login_email, $login_pass);
        
        if (empty($user_data)) {
            $this->get('session')->setFlash('error', 'User or password incorrect.');
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }

        Auth::setAuth();
        Auth::setAuthParam('id', $user_data['id']);
        Auth::setAuthParam('nick', $user_data['nick']);

        return $this->redirect($this->generateUrl('AdminAdminBundle_dau_list'));
    }
    
    public function dauListAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $em = $this->getDoctrine()->getEntityManager();

        $search = array();
        $search['raion'] = $this->get('request')->query->get('sector');
        $search['nr_rooms'] = $this->get('request')->query->get('nr_odai');
        $search['floor'] = $this->get('request')->query->get('etaj');
        $search['price'] = $this->get('request')->query->get('pret');

        $latest_dau = $em->getRepository('DauDauBundle:Dau')->getLatestDau(false, false, $search, false, false);

        $paginator = $this->get('ideato.pager');
        $paginator->setMaxPerPage(20);
        $paginator->setPage($this->get('request')->query->get('page', 1));
        $paginator->setQuery($latest_dau);
        $paginator->init();

        $query_string = $this->get('request')->server->get("QUERY_STRING");
        $query_string = preg_replace('/.*\?page\=\d+.*/', '', $query_string);
        $query_string = preg_replace('/\&page\=\d+/', '', $query_string);
        $query_string = preg_replace('/page\=\d+/', '', $query_string);

        return $this->render('AdminAdminBundle:Default:dauAnnouncements.html.twig', array('paginator' => $paginator, 'query_string' => $query_string));
    }
    
    public function deleteDauAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $id = $this->get('request')->query->get('ann_id');
        if(!is_numeric($id)) {
            die('Incorrect id');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('DauDauBundle:Adm')->deleteDau($id);
        $this->get('session')->setFlash('notice', 'Anuntul a fost sters.');
        return $this->redirect($this->generateUrl('AdminAdminBundle_dau_list'));
    }
    
    public function hideDauAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $id = $this->get('request')->query->get('ann_id');
        $type = $this->get('request')->query->get('type');
        if(!is_numeric($id)) {
            die('Incorrect id');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('DauDauBundle:Adm')->hideDau($id, $type);
        $this->get('session')->setFlash('notice', 'Operatiune efectuata cu succes.');
        return $this->redirect($this->generateUrl('AdminAdminBundle_dau_list'));
    }
    
    public function setCurrentTimeDauAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $id = $this->get('request')->query->get('ann_id');
        if(!is_numeric($id)) {
            die('Incorrect id');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('DauDauBundle:Adm')->setCurrentTimeDau($id);
        $this->get('session')->setFlash('notice', 'Operatiune efectuata cu succes.');
        return $this->redirect($this->generateUrl('AdminAdminBundle_dau_list'));
    }
    public function modifyDauAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em->getRepository('DauDauBundle:Dau')->updateDauData($_POST['ann']);
            return $this->redirect($request->headers->get('referer'));
        }
        $id = $this->get('request')->query->get('ann_id');
        if(!is_numeric($id)) {
            die('Incorrect id');
        }
        $ann_data = $em->getRepository('DauDauBundle:Dau')->getDauSingle($id, false);
        $photos = $this->getDoctrine()->getEntityManager()->getRepository('DauDauBundle:Dau')->getPhotos($id);
        return $this->render('AdminAdminBundle:Default:annDetails.html.twig', array('dau_details' => $ann_data, 'photos' => $photos));
    }
    
    public function deletePhotoAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $photo_id = $this->get('request')->query->get('photo_id');
        if(!is_numeric($photo_id)) {
            die('Incorrect photo_id');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('DauDauBundle:Dau')->deletePhoto($photo_id);
        $request = $this->getRequest();
        $this->get('session')->setFlash('notice', 'Operatiune efectuata cu succes.');
        return $this->redirect($request->headers->get('referer'));
    }
    
    public function annSettingsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em->getRepository('DauDauBundle:Dau')->updateAnnSettings($_POST);
            $this->get('session')->setFlash('notice', 'Operatiune efectuata cu succes.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $settings = $em->getRepository('DauDauBundle:Dau')->getannSettings();
        
        return $this->render('AdminAdminBundle:Default:annSettings.html.twig', array('ann_settings' => $settings));
    }
    
/****************** INCHIRIEZ *************************************************************************************/    
    public function inchiriezListAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $em = $this->getDoctrine()->getEntityManager();

        $inchiriez = $em->getRepository('DauDauBundle:Dau')->getInchiriez(false, false);
        $paginator = $this->get('ideato.pager');
        $paginator->setMaxPerPage(20);
        $paginator->setPage($this->get('request')->query->get('page', 1));
        $paginator->setQuery($inchiriez);
        $paginator->init();


        $query_string = $this->get('request')->server->get("QUERY_STRING");
        $query_string = preg_replace('/.*\?page\=\d+.*/', '', $query_string);
        $query_string = preg_replace('/\&page\=\d+/', '', $query_string);
        $query_string = preg_replace('/page\=\d+/', '', $query_string);

        return $this->render('AdminAdminBundle:Default:inchiriezAnnouncements.html.twig', array('paginator' => $paginator, 'query_string' => $query_string));
    }
    
    public function deleteInchiriezAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $id = $this->get('request')->query->get('ann_id');
        if(!is_numeric($id)) {
            die('Incorrect id');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('DauDauBundle:Adm')->deleteInchiriez($id);
        $this->get('session')->setFlash('notice', 'Anuntul a fost sters.');
        return $this->redirect($this->generateUrl('AdminAdminBundle_inchiriez_list'));
    }
/********************************************************* INCHIRIEZ ***************************************************************************/    
    public function contactsListAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $em = $this->getDoctrine()->getEntityManager();
        $contact_list = $em->getRepository('DauDauBundle:Adm')->getAllContacts();
        
        return $this->render('AdminAdminBundle:Default:contacts.html.twig', array('contact_list' => $contact_list));
    }
    
    public function deleteContactsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $id = $this->get('request')->query->get('contact_id');
        if(!is_numeric($id)) {
            die('Incorrect id');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('DauDauBundle:Adm')->deleteContact($id);
        $this->get('session')->setFlash('notice', 'Operatiune efectuata cu succes.');
        return $this->redirect($this->generateUrl('AdminAdminBundle_contacts_list'));
    }
/********************************************************* 999 ***************************************************************************/    
    
    public function list999Action() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $ids = $em->getRepository('DauDauBundle:Adm')->get999Ids();
        
        $nine = new Nine();
        $ann = $nine->getAnnouncements($ids);
//        echo '<pre>';print_r($ann);die;
        
        return $this->render('AdminAdminBundle:Default:ann_999.html.twig', array('ann' => $ann));
    }
    
    protected function checkBlackList999($username, $phones) {
        
    }
    
    public function addAnn999Action() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('AdminAdminBundle_login'));
        }
        $ann_data = array();
        $nine = new Nine();
        
        $ann_data['ann_id'] = $this->get('request')->request->get('id');
        $ann_data['ann_title'] = $this->get('request')->request->get('title');
        $ann_data['ann_desc'] = $this->get('request')->request->get('desc');
        $ann_data['ann_price'] = $this->get('request')->request->get('price');
        $ann_data['ann_date'] = $this->get('request')->request->get('date');
        $ann_data['additional'] = $nine->getAnnData($ann_data['ann_id']);
        
        $black_list_data = $this->checkBlackList999($ann_data['additional']['username'], $ann_data['additional']['phones']);
        echo '<pre>';print_r($ann_data);die;
        
        return $this->render('AdminAdminBundle:Default:add_ann_999.html.twig', array('ann_data' => $ann_data));
    }
    
    

}
