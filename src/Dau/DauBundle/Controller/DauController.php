<?php

namespace Dau\DauBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dau\DauBundle\Form\DauType;
use Dau\DauBundle\Form\InchiriezType;
use Dau\DauBundle\Form\ContactsType;
use Dau\DauBundle\Entity\Dau;
use Dau\DauBundle\Entity\Rent;
use Dau\DauBundle\Entity\Contacts;
use Symfony\Bundle\Rollerworks;
use Dau\DauBundle\Extra\SimpleImage;
use Dau\DauBundle\Extra\Mobile_Detect;

class DauController extends Controller {

    protected $sectoare_slug = array(
        'centru' => '1',
        'riscani' => '2',
        'ciocana' => '3',
        'buiucani' => '4',
        'botanica' => '5',
        'posta_veche' => '6',
        'telecentru' => '7',
        'aeroport' => '8',
        'sculeni' => '9',
        'durlesti' => '10',
    );
    
    protected $sectoare = array(
        1 => 'Centru',
        2 => 'Riscani',
        3 => 'Ciocana',
        4 => 'Buiucani',
        5 => 'Botanica',
        6 => 'Posta Veche',
        7 => 'Telecentru',
        8 => 'Aeroport',
        9 => 'Sculeni',
        10 => 'Durlesti',
    );
    
    private function getCurrentRouting() {
        $request = $this->container->get('request');
        $routeName = $request->get('_route');
        return $routeName;
    }

    /**
     * checks if current routing is mobile (contains "mobile" at the end of routing)
     * @return bool
     */
    private function isMobileRouting() {
        $routeName = $this->getCurrentRouting();
        return (substr($routeName, strlen($routeName)-6, strlen($routeName)) == 'mobile');
    }
    
    private function getTemplate($twig, $twig_mobile, $twig_variables = array(), $routing_mobile = false) {
        if(@$_COOKIE['use_normal_site']) { // if the user clicked on "Use normal site"
            return $this->render($twig, $twig_variables);
        }
        $mobile_detector = new Mobile_Detect();
        if($mobile_detector->isMobile()) {
            if($this->isMobileRouting()) { // if is mobile render mobile template
                return $this->render($twig_mobile, $twig_variables);
            } else { // if not redirect to the same mobile routing
                if(!$routing_mobile) {
                    $routing_mobile = $this->getCurrentRouting().'_mobile';
                }
                return $this->redirect($this->generateUrl($routing_mobile));
            }
        } else {
            return $this->render($twig, $twig_variables);
        }
    }
    
    public function homepageAction() {
        $seo = array();
        $em = $this->getDoctrine()->getEntityManager();

        $latest_dau = $em->getRepository('DauDauBundle:Dau')->getLatestDau(10, true);
        if (!(@$_COOKIE['allowed_last_view'] == 'no') && !(@$_COOKIE['active_last_view_id'] || @$_COOKIE['active_last_view_id'] == -1)) {
            $last_id = $latest_dau[0]->getId();
            setcookie('active_last_view_id', @$_COOKIE['last_view_id'] ? $_COOKIE['last_view_id'] : -1, 0, '/');
            setcookie('last_view_id', $last_id, time() + 60 * 60 * 24 * 30 * 2, '/');
        }

        $seo['page_title'] = 'Inchiriere.md - apartamente in chirie Chisinau, gazda chisinau';
        $seo['keywords'] = 'gazda md, gazda chisinau, apartamente in chirie chisinau, cauti gazda chisinau?';
        $seo['description'] = 'Inchiriere.md este un portal care vine in ajutorul celor care cauta gazda in Chisinau sau doresc sa ofere in chirie apartamente in Chisinau.';
        
        return $this->getTemplate('DauDauBundle:Default:index.html.twig', 'DauDauBundle:Mobile:index.html.twig', array('paginator' => $latest_dau, 'seo' => $seo), 'DauDauBundle_dauAnnouncements_mobile');
    }

    public function annDetailsAction($id) {
        $dau_details = $this->getDoctrine()->getEntityManager()->getRepository('DauDauBundle:Dau')->getDauSingle($id);
        $photos = $this->getDoctrine()->getEntityManager()->getRepository('DauDauBundle:Dau')->getPhotos($id);

        if(empty($dau_details)) {
            $this->get('session')->setFlash('notice', 'Anuntul a expirat');
            return $this->redirect($this->generateUrl('DauDauBundle_dauAnnouncements'), 301);
        }
        $aux = array_flip($this->sectoare_slug);
        $sector_slug = $aux[$dau_details->getRaion()];

        $seo['page_title'] = 'gazda cu ' . $dau_details->getNrRooms() . ' camere ' . $this->sectoare[$dau_details->getRaion()] . ', Chisinau, '.$dau_details->getAddress();
        $seo['keywords'] = '';
        $seo['description'] = $dau_details->getContent();
        $seo['breadcrumb'] = '<a href="'.$this->generateUrl('DauDauBundle_homepage').'">Acasa</a> > <a href="'.$this->generateUrl('DauDauBundle_dau_list_SEO_sector', array('sector' => $sector_slug)).'">gazda ' . $this->sectoare[$dau_details->getRaion()] . '</a> > '.$dau_details->getTitle();

        return $this->getTemplate('DauDauBundle:Dau:annDetails.html.twig', 'DauDauBundle:Mobile:annDetails.html.twig', array('dau_details' => $dau_details, 'photos' => $photos, 'seo' => $seo));
    }

    public function inchiriezDetailsAction($id) {
        $inchiriez_details = $this->getDoctrine()->getEntityManager()->getRepository('DauDauBundle:Dau')->getInchiriezSingle($id);
        return $this->render('DauDauBundle:Dau:inchiriezDetails.html.twig', array('inchiriez_details' => $inchiriez_details));
    }

    private function __sendSecretEmail($email, $secret_hash) {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: Inchiriere.md <no-replay@inchiriere.md>' . "\r\n";

        // Mail it
        mail($email, 'inchiriere.md [' . date('Y-m-d H:i:s') . '] - accesul la anuntul Dvs', $this->renderView('DauDauBundle:Dau:secretHash.html.twig', array('secret_hash' => $secret_hash)), $headers);
        return;
        $message = \Swift_Message::newInstance()
                ->setSubject('inchiriere.md [' . date('Y-m-d H:i:s') . '] - accesul la anuntul Dvs')
                ->setFrom('no-reply@inchiriere.md')
                ->setTo($email)
                ->setBody($this->renderView('DauDauBundle:Dau:secretHash.html.twig', array('secret_hash' => $secret_hash)))
        ;
        $this->get('mailer')->send($message);
    }

    private function __sendContactEmail($emails) {
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: Inchiriere.md <contacts@inchiriere.md>' . "\r\n";

        // Mail it
        mail($emails, 'inchiriere.md [' . date('Y-m-d H:i:s') . '] - aveti un nou "Contact"', '', $headers);
        return;
        $message = \Swift_Message::newInstance()
                ->setSubject('inchiriere.md [' . date('Y-m-d H:i:s') . '] - aveti un nou "Contact"')
                ->setFrom('contacts@inchiriere.md')
                ->setTo(explode(',', $emails))
                ->setBody($this->renderView('DauDauBundle:Dau:secretHash.html.twig', array('secret_hash' => $secret_hash)))
        ;
        $this->get('mailer')->send($message);
    }

    private function __notifyAdministrators($emails, $ann_data, $photos) {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: Inchiriere.md <no-replay@inchiriere.md>' . "\r\n";

        // Mail it
        mail($emails, 'inchiriere.md [' . date('Y-m-d H:i:s') . '] - anunt nou', $this->renderView('DauDauBundle:Dau:adminDauNotify.html.twig', array('dau_details' => $ann_data, 'photos' => $photos)), $headers);
        return;
        $message = \Swift_Message::newInstance()
                ->setSubject('inchiriere.md [' . date('Y-m-d H:i:s') . '] - anunt nou')
                ->setFrom('contacts@inchiriere.md')
                ->setTo(explode(',', $emails))
                ->setBody($this->renderView('DauDauBundle:Dau:adminDauNotify.html.twig', array('dau_details' => $ann_data, 'photos' => $photos)))
        ;
        $this->get('mailer')->send($message);
    }

    public function deleteDauAction($secret_hash) {
        $confirm = $this->get('request')->query->get('confirm');
        if ($confirm == 1) {
            $this->getDoctrine()->getEntityManager()->getRepository('DauDauBundle:Dau')->deleteDauByHash($secret_hash);
            return $this->render('DauDauBundle:Default:thankYou.html.twig', array('message' => 'secret_hash_deleted'));
        }
        $ann = $this->getDoctrine()->getEntityManager()->getRepository('DauDauBundle:Dau')->findOneBy(array('secret_hash' => $secret_hash));
        return $this->render('DauDauBundle:Dau:confirmDeleteDau.html.twig', array('ann' => $ann, 'found' => !empty($ann)));
    }

    public function addDauAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->createForm(new DauType(), new Dau());
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();

                $ann_settings = $this->getDoctrine()->getEntityManager()->getRepository('DauDauBundle:Dau')->getAnnSettings();
                $data->setAcceptStatus($ann_settings['default_accept_status'] ? $ann_settings['default_accept_status'] : 'w');

                $em->persist($data);
                $em->flush();
                if ($data->getEmail()) {
                    $this->__sendSecretEmail($data->getEmail(), $data->getSecretHash());
                }
                foreach ($_SESSION['uploaded_photos'] as $key => $value) {
                    $photos = new \Dau\DauBundle\Entity\Photos();
                    $photos->setDauId($data->getId());
                    $photos->setPhotoPath($value);
                    $em->persist($photos);
                    $em->flush();
                }
                if ($ann_settings['notification_emails']) {
                    $photos = $this->getDoctrine()->getEntityManager()->getRepository('DauDauBundle:Dau')->getPhotos($data->getId());
                    $this->__notifyAdministrators($ann_settings['notification_emails'], $data, $photos);
                }
                unset($_SESSION['uploaded_photos']);
                return $this->redirect($this->generateUrl('DauDauBundle_thankyou'));
            }
        }

        $seo['page_title'] = 'Dai gazda in chirie in Chisinau? Posteaza anuntul aici!';
        $seo['keywords'] = 'dau gazda in chirie, dau in chirie, ofer apartament, primesc la gazda, dau camera';
        $seo['description'] = 'Primesc la gazda, dau in chirie apartament in Chisinau, ofer in chirie apartament, ofer spre chirie apartament, Ciocana, Botanica, Riscani, Buiucani, Posta Veche, Telecentru';

        return $this->render('DauDauBundle:Dau:addDau.html.twig', array('form' => $form->createView(), 'id' => 0, 'seo' => $seo));
    }

    public function addInchiriezAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->createForm(new InchiriezType(), new Rent());
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();
                $em->persist($data);
                $em->flush();
                return $this->redirect($this->generateUrl('DauDauBundle_thankyou'));
            }
        }

        return $this->render('DauDauBundle:Dau:addInchiriez.html.twig', array('form' => $form->createView(), 'id' => 0));
    }

    public function contactsAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->createForm(new ContactsType(), new Contacts());
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();
                $em->persist($data);
                $em->flush();
                $ann_settings = $this->getDoctrine()->getEntityManager()->getRepository('DauDauBundle:Dau')->getAnnSettings();
                if ($ann_settings['notification_emails_contacts']) {
                    $this->__sendContactEmail($ann_settings['notification_emails_contacts']);
                }
                return $this->redirect($this->generateUrl('DauDauBundle_thankyou', array('message' => 'contact_message_sent')));
            }
        }

        $seo['page_title'] = 'Ai intrebari? propuneri? Scrie-ne! - Inchiriere.md';
        $seo['keywords'] = '';
        $seo['description'] = 'Propune imbunatatire, contactacte inchiriere.md';

        return $this->render('DauDauBundle:Default:contacts.html.twig', array('form' => $form->createView(), 'id' => 0, 'seo' => $seo));
    }

    public function thankYouAction() {
        return $this->render('DauDauBundle:Default:thankYou.html.twig');
    }

    public function aboutAction() {

        $seo['page_title'] = 'Inchiriere.md - despre. Este destinat celor care cauta sau ofera gazda.';
        $seo['keywords'] = '';
        $seo['description'] = 'Inchiriere.md - despre. Este destinat celor care cauta sau ofera gazda. Cele mai proaspete oferte le gasesti aici';

        return $this->render('DauDauBundle:Default:about_us.html.twig', array('seo' => $seo));
    }

    public function rulesAction() {
        return $this->render('DauDauBundle:Default:rules.html.twig');
    }

    public function addAnnouncementAction() {
        $seo['page_title'] = 'Oferi apartament in chirie in Chisinau? Posteaza anuntul aici';
        $seo['keywords'] = 'ofer apartament, dau gazda in chirie, dau in chirie, dau camera, primesc la gazda';
        $seo['description'] = 'Dau in chirie apartament in Chisinau, primesc la gazda, ofer in chirie, ofer spre chirie';

        return $this->render('DauDauBundle:Default:addAnnouncement.html.twig', array('seo' => $seo));
    }

    public function dauAnnouncementsAction($sector = false, $camere = false) {
        $canonical = '';

        $em = $this->getDoctrine()->getEntityManager();

        $search = array();
        $is_seo = false;
        if ($sector || $camere) {
            $is_seo = true;
        }
        if ($sector) {
            $search['raion'] = $this->sectoare_slug[$sector];
            $this->get('request')->query->set('sector', $this->sectoare_slug[$sector]);
        }

        if ($camere) {
            $search['nr_rooms'] = $camere;
            $this->get('request')->query->set('nr_odai', $camere);
        }
        $search['nr_rooms'] = $this->get('request')->query->get('nr_odai');
        $search['raion'] = $this->get('request')->query->get('sector');
        $search['floor'] = $this->get('request')->query->get('etaj');
        $search['price'] = $this->get('request')->query->get('pret');

        if ($search['raion']) {
            $aux = array_flip($this->sectoare_slug);
            $sector_slug = $aux[$search['raion']];
        }

        if ($search['raion'] && $search['nr_rooms']) { // daca e setat sectorul si numarul de odai
            $canonical = $this->generateUrl('DauDauBundle_dau_list_SEO_camere_sector', array('sector' => $sector_slug, 'camere' => $search['nr_rooms']));
            if ($search['nr_rooms'] == 1) {
                $h1_search_title = 'apartamente cu ' . $search['nr_rooms'] . ' camera ' . $this->sectoare[$search['raion']] . ' Chisinau';
                $page_title = 'gazda 1 camera ' . $this->sectoare[$search['raion']] . ', apartamente cu ' . $search['nr_rooms'] . ' odaie ' . $this->sectoare[$search['raion']];
                $description = 'cauti gazda cu 1 camera la ' . $this->sectoare[$search['raion']] . '? apartament ' . $this->sectoare[$search['raion']] . ' 1 odaie, gazda Chisinau ' . $this->sectoare[$search['raion']] . ' 1 odaie';
                $keywords = 'gazda 1 camera, ' . $this->sectoare[$search['raion']] . ', apartament 1 odaie, apartament ' . $this->sectoare[$search['raion']];
                $breadcrumb = '<a href="'.$this->generateUrl('DauDauBundle_homepage').'">Acasa</a> > <a href="'.$this->generateUrl('DauDauBundle_dau_list_SEO_sector', array('sector' => $sector_slug)).'">gazda ' . $this->sectoare[$search['raion']] . '</a> > ' . $this->sectoare[$search['raion']] . ' 1 camera';
            } else {
                $h1_search_title = 'apartamente cu ' . $search['nr_rooms'] . ' camere ' . $this->sectoare[$search['raion']] . ' Chisinau';
                $page_title = 'gazda ' . $search['nr_rooms'] . ' camere ' . $this->sectoare[$search['raion']] . ', apartamente cu ' . $search['nr_rooms'] . ' odai ' . $this->sectoare[$search['raion']];
                $description = 'cauti gazda cu ' . $search['nr_rooms'] . ' camere la ' . $this->sectoare[$search['raion']] . '? apartament ' . $this->sectoare[$search['raion']] . ' ' . $search['nr_rooms'] . ' odai, gazda Chisinau ' . $this->sectoare[$search['raion']] . ' ' . $search['nr_rooms'] . ' odai';
                $keywords = 'gazda ' . $search['nr_rooms'] . ' camere, ' . $this->sectoare[$search['raion']] . ', apartament ' . $search['nr_rooms'] . ' odai, apartament ' . $this->sectoare[$search['raion']];
                $breadcrumb = '<a href="'.$this->generateUrl('DauDauBundle_homepage').'">Acasa</a> > <a href="'.$this->generateUrl('DauDauBundle_dau_list_SEO_sector', array('sector' => $sector_slug)).'">gazda ' . $this->sectoare[$search['raion']] . '</a> > ' . $this->sectoare[$search['raion']] . ' ' . $search['nr_rooms'] . ' camere';
            }
        } elseif ($search['raion']) { // daca e setat numai sectorul
            $page_title = 'gazda ' . $this->sectoare[$search['raion']] . ', apartament ' . $this->sectoare[$search['raion']] . ', cauti gazda la ' . $this->sectoare[$search['raion']] . '?';
            $h1_search_title = 'Apartamente ' . $this->sectoare[$search['raion']] . ' Chisinau';
            $description = 'cauti apartament la ' . $this->sectoare[$search['raion']] . '? gazda la ' . $this->sectoare[$search['raion']] . ' odai, ' . $search['nr_rooms'] . ' chirie';
            $keywords = 'gazda ' . $this->sectoare[$search['raion']] . ', apartamente ' . $this->sectoare[$search['raion']] . ' chirie, caut gazda ' . $this->sectoare[$search['raion']];
            $breadcrumb = '<a href="'.$this->generateUrl('DauDauBundle_homepage').'">Acasa</a> > gazda ' . $this->sectoare[$search['raion']];
            $canonical = $this->generateUrl('DauDauBundle_dau_list_SEO_sector', array('sector' => $sector_slug));
        } elseif ($search['nr_rooms']) {
            if ($search['nr_rooms'] == 1) {
                $h1_search_title = 'Apartamente cu ' . $search['nr_rooms'] . ' camera Chisinau';
                $page_title = 'gazda cu ' . $search['nr_rooms'] . ' camera, apartamente cu ' . $search['nr_rooms'] . ' camera, chirie ' . $search['nr_rooms'] . ' odaie';
                $description = 'cauti gazda cu ' . $search['nr_rooms'] . ' camera?, apartamente cu ' . $search['nr_rooms'] . ' odaie, gazda chisinau ' . $search['nr_rooms'] . ' camera';
                $keywords = 'gazda 1 camera, apartamente 1 odaie, chirie 1 camera';
                $breadcrumb = '<a href="'.$this->generateUrl('DauDauBundle_homepage').'">Acasa</a> > 1 camera';
            } else {
                $page_title = 'gazda cu ' . $search['nr_rooms'] . ' camere, apartamente cu ' . $search['nr_rooms'] . ' camere, chirie ' . $search['nr_rooms'] . ' odai';
                $h1_search_title = 'Apartamente cu ' . $search['nr_rooms'] . ' camere Chisinau';
                $description = 'cauti gazda cu ' . $search['nr_rooms'] . ' camere?, apartamente cu ' . $search['nr_rooms'] . ' odai, gazda chisinau ' . $search['nr_rooms'] . ' camere';
                $keywords = 'gazda ' . $search['nr_rooms'] . ' camere, apartamente ' . $search['nr_rooms'] . ' odai, chirie ' . $search['nr_rooms'] . ' camere';
                $breadcrumb = '<a href="'.$this->generateUrl('DauDauBundle_homepage').'">Acasa</a> > ' . $search['nr_rooms'] . ' camere';
            }
            $canonical = $this->generateUrl('DauDauBundle_dau_list_SEO_camere', array('camere' => $search['nr_rooms']));
        } else {
            $page_title = 'gazda chisinau, apartamente Chisinau, chirie ' . $search['nr_rooms'] . ' odai';
            $h1_search_title = 'Ultimile anunturi "dau in chirie"';
            $description = 'cauti gazda in Chisinau? Gasesti oferte aici: apartamente in chirie, gazda chisinau, gazda md';
            $keywords = 'gazda md, gazda in chisinau, apartamente in chirie, gazda chisinau, chirie chisinau';
            $breadcrumb = '<a href="'.$this->generateUrl('DauDauBundle_homepage').'">Acasa</a> > gazda chisinau';
            $canonical = $this->generateUrl($this->getCurrentRouting());
        }

        $seo['h1_search_title'] = $h1_search_title;
        $seo['page_title'] = $page_title;
        $seo['keywords'] = $keywords;
        $seo['description'] = $description;
        $seo['breadcrumb'] = $breadcrumb;

        if ($canonical) {
            $seo['canonical'] = '<meta rel="canonical" href="' . $canonical . '">';
        } else {
            $seo['canonical'] = '';
        }

        $latest_dau = $em->getRepository('DauDauBundle:Dau')->getLatestDau(false, false, $search);

        $paginator = $this->get('ideato.pager');
        $paginator->setMaxPerPage(20);
        $paginator->setPage($this->get('request')->query->get('page', 1));
        $paginator->setQuery($latest_dau);
        $paginator->init();


        $query_string = $this->get('request')->server->get("QUERY_STRING");

        if ($is_seo) {
            $query_string = $this->get('request')->server->get("REQUEST_URI");
        }
//        echo '<pre>';
//        print_r($this->get('request')->server);die;
        $query_string = preg_replace('/.*\?page\=\d+.*/', '', $query_string);
        $query_string = preg_replace('/\&page\=\d+/', '', $query_string);
        $query_string = preg_replace('/page\=\d+/', '', $query_string);

        if ($canonical && $is_seo) { // if we have a formed canonical link
            if ($paginator->getNextPage() && $paginator->getNextPage() != $paginator->getPage()) { // if this is not the last page, or is not the only page
                $seo['canonical'] .= '<meta rel="next" href="' . $canonical . '?page=' . $paginator->getNextPage() . '">';
            }
            if ($paginator->getPage() != 1) { // if this is not the first page
                $seo['canonical'] .= '<meta rel="prev" href="' . $canonical . '?page=' . ($paginator->getPage() - 1) . '">';
            }
        } else {
            if ($this->get('request')->query->get('search')) {
                $sign = '&';
            } else {
                if($query_string) {
                    $sign = '?';
                } else {
                    $sign = '';
                }
            }
            if ($paginator->getNextPage() && $paginator->getNextPage() != $paginator->getPage()) { // if this is not the last page, or is not the only page
                $seo['canonical'] .= '<meta rel="next" href="' . $this->generateUrl('DauDauBundle_dauAnnouncements') . '?' . $query_string . $sign . 'page=' . $paginator->getNextPage() . '">';
            }
            if ($paginator->getPage() != 1) { // if this is not the first page
                $seo['canonical'] .= '<meta rel="prev" href="' . $this->generateUrl('DauDauBundle_dauAnnouncements') . '?' . $query_string . $sign . 'page=' . ($paginator->getPage() - 1) . '">';
            }
        }

        return $this->getTemplate('DauDauBundle:Dau:dauAnnouncements.html.twig', 'DauDauBundle:Mobile:index.html.twig', array('paginator' => $paginator, 'query_string' => $query_string, 'seo' => $seo, 'is_seo' => $is_seo), 'DauDauBundle_dauAnnouncements_mobile');
//        return $this->render('DauDauBundle:Dau:dauAnnouncements.html.twig', array('paginator' => $paginator, 'query_string' => $query_string, 'seo' => $seo, 'is_seo' => $is_seo));
    }

    public function inchiriezAnnouncementsAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $seo['page_title'] = 'Inchiriere.md - aici gasesti apartamentul pe placul tau';
        $seo['keywords'] = 'apartamente in chirie chisinau, gazda chisinau';
        $seo['description'] = '';

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

        return $this->render('DauDauBundle:Dau:inchiriezAnnouncements.html.twig', array('paginator' => $paginator, 'query_string' => $query_string, 'seo' => $seo));
    }

    public function addPhotosAction() {
        $allowed_file_types = array(
            'image/gif', // Opera, Moz, MSIE
            'image/jpeg', // Opera, Moz
            'image/png', // Opera, Moz
            'image/pjpeg', // MSIE
            'image/x-png'  // MSIE
        );
        if (is_numeric($this->get('request')->query->get('del_id'))) {
            $del_id = $this->get('request')->query->get('del_id');
            unset($_SESSION['uploaded_photos'][$del_id]);
        }
        if ($this->get('request')->files->get('photo')) {

            if (!in_array($this->get('request')->files->get('photo')->getMimeType(), $allowed_file_types)) {
                return $this->render('DauDauBundle:Dau:addPhoto.html.twig', array('error' => 1));
            }
            $filename = $this->get('request')->files->get('photo')->getClientOriginalName();
            $explode = explode('.', $filename);
            $extension = $explode[count($explode) - 1];
            unset($explode);
            $rand = md5(rand(1, 99) . time());

            $this->get('request')->files->get('photo')->move('uploads', $rand . '.' . $extension);
            $image = new SimpleImage();
            $image->load('uploads/' . $rand . '.' . $extension);
            $image->resize(100, 100, false, false);
            $image->save('uploads/th_' . $rand . '.' . $extension);
            $_SESSION['uploaded_photos'][] = $rand . '.' . $extension;
        }

        $uploaded_photos = empty($_SESSION['uploaded_photos']) ? array() : $_SESSION['uploaded_photos'];

        return $this->render('DauDauBundle:Dau:addPhoto.html.twig', array('error' => 0, 'photos' => $uploaded_photos));
    }

    public function acceptDeleteAnnAdminAction() {
        $type = $this->get('request')->query->get('type');
        $hash = $this->get('request')->query->get('hash');
        $hash = substr($hash, 0, strlen($hash) - 4);

        $em = $this->getDoctrine()->getEntityManager();

        $em->getRepository('DauDauBundle:Dau')->acceptRejectDau($hash, $type);

        echo 'Success.';
        die;
    }

    public function sitemapAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $response = new \Symfony\Component\HttpFoundation\Response();
        
        $xml_list = array();
        $response->headers->set('Content-Type', 'text/xml');
        /**
         * /gazda-ciocana
         */
        foreach ($this->sectoare_slug as $key => $value) {
            $xml_list[] = array(
                'url' => $this->generateUrl('DauDauBundle_dau_list_SEO_sector', array('sector' => $key)),
                'added' => date('Y-m-d')
            );
        }

        /**
         * /gazda-1-camera
         */
        for ($i = 1; $i <= 5; $i++) {
            $xml_list[] = array(
                'url' => $this->generateUrl('DauDauBundle_dau_list_SEO_camere', array('camere' => $i)),
                'added' => date('Y-m-d')
            );
        }

        /**
         * /gazda-ciocana-1-camere
         */
        foreach ($this->sectoare_slug as $key => $value) {
            for ($i = 1; $i <= 5; $i++) {
                $xml_list[] = array(
                    'url' => $this->generateUrl('DauDauBundle_dau_list_SEO_camere_sector', array('sector' => $key, 'camere' => $i)),
                    'added' => date('Y-m-d')
                );
            }
        }

        $all_ann = $em->getRepository('DauDauBundle:Dau')->getLatestDau(false, true, array());

        foreach ($all_ann as $item) {
            $xml_list[] = array(
                'url' => $this->generateUrl('DauDauBundle_ann_details', array('id' => $item->getId(), 'title_slug' => $item->getTitleSlug())),
                'added' => $item->getAdded()
            );
        }
        return $this->render('DauDauBundle:Default:sitemap.html.twig', array('items' => $xml_list), $response);
    }
    
    public function pages410Action() {
//        $response = new \Symfony\Component\HttpFoundation\Response();
//        $response->headers->set('Content-Type', 'text/xml');
        return $this->redirect($this->generateUrl('DauDauBundle_homepage'), 301);
    }
    
    public function useNormalSiteAction() {
        setcookie('use_normal_site', true, time() + 60 * 60 * 24 * 30 * 2, '/');
        return $this->redirect($this->generateUrl('DauDauBundle_homepage'));
    }

}
