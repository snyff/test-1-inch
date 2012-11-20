<?php

namespace Dau\DauBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DauRepository extends EntityRepository {

    /**
     * get latest dau announcements for homepage or any other page...
     * @param <int> $limit
     * @return <type>
     */
    public function getLatestDau($limit = 10, $return_result = false, $search=array(), $accept_status='a', $apply_date_filter=true) {
        $parameter_arr = array();
        $latest_dau = $this->createQueryBuilder('d')
                        ->select('d')
                        ->addOrderBy('d.added', 'DESC')
                ;
        if($accept_status) {
            $latest_dau->andWhere('d.acceptStatus=:accept_status');
            $parameter_arr['accept_status'] = $accept_status;
        }
        if($apply_date_filter) {
            $latest_dau->andWhere('d.added > :valid_period');
            $parameter_arr['valid_period'] = date('Y-m-d', strtotime("-3 week"));
//            $parameter_arr['valid_period'] = strtotime("-3 week");
        }
        if ($limit) {
            $latest_dau->setMaxResults($limit);
        }
        
        if(@$search['raion']) {
            $latest_dau->andWhere('d.raion=:raion');
            $parameter_arr['raion'] = $search['raion'];
        }
        if(@$search['nr_rooms']) {
            $latest_dau->andWhere('d.nrRooms=:nr_rooms');
            $parameter_arr['nr_rooms'] = $search['nr_rooms'];
        }
        if(@$search['floor']) {
            $latest_dau->andWhere('d.floor=:floor');
            $parameter_arr['floor'] = $search['floor'];
        }
        if(@$search['price']) {
            $latest_dau->andWhere('d.price=:price');
            $parameter_arr['price'] = $search['price'];
        }
        
        $latest_dau->setParameters($parameter_arr);
        
        if($return_result) {
            $return = $latest_dau->getQuery()->getResult();
        } else {
            $return = $latest_dau->getQuery();
            
        }
        return $return;
    }
    
    public function deleteDauByHash($secret_hash) {
        $this->createQueryBuilder('d')
                ->delete()
                ->where('d.secretHash=:secret_hash')
                ->setParameters(array('secret_hash'=>$secret_hash))
                ->getQuery()->execute();
    }
    
    public function getInchiriez($limit = 10, $return_result = false) {
        $inchiriez = $this->getEntityManager()->createQueryBuilder()
                        ->from('DauDauBundle:Rent', 'r')
                        ->select('r')
                        ->addOrderBy('r.added', 'DESC')
                        ->where('r.acceptStatus=:accept_status')
                        ->andWhere('r.added > :valid_period')
                ;
        $parameter_arr = array('accept_status'=>'a', 'valid_period' => strtotime("-5 week"));
        if ($limit) {
            $inchiriez->setMaxResults($limit);
        }
        
        $inchiriez->setParameters($parameter_arr);
        
        if($return_result) {
            $return = $inchiriez->getQuery()->getResult();
        } else {
            $return = $inchiriez->getQuery();
            
        }
        return $return;
    }
    
    public function getCntDau($accept_status = 'a') {
        $cnt_dau = $this->createQueryBuilder('d')
                        ->select('COUNT(d.id) AS cnt')
                        ->where('d.acceptStatus=:accept_status')
                        ->andWhere('d.added > :valid_period')
                        ->setParameters(array('accept_status'=>$accept_status, 'valid_period' => strtotime("-5 week")))
                ;
        return $cnt_dau->getQuery()->getSingleResult();
    }

    public function getDauSingle($id, $check_status=true) {
        $params = array();
        $single_dau = $this->createQueryBuilder('d')
                        ->select('d')
                        ->where('d.id=:id')
                ;
        $params['id'] = $id;
        if($check_status) {
            $single_dau->andWhere('d.acceptStatus=:accept_status');
            $params['accept_status'] = 'a';
        }
        $single_dau->setParameters($params);
        
        $return = $single_dau->getQuery()->getResult();
        
        return @$return[0];
    }

    public function getInchiriezSingle($id) {
        $single_inchiriez = $this->getEntityManager()->createQueryBuilder()
                        ->from('DauDauBundle:Rent', 'i')
                        ->select('i')
                        ->where('i.acceptStatus=:accept_status')
                        ->andWhere('i.id=:id')
                        ->setParameters(array('accept_status'=>'a', 'id' => $id))
                ;
        return $single_inchiriez->getQuery()->getSingleResult();
    }

    public function getPhotos($id) {
        $photos = $this->createQueryBuilder('d')
                        ->from('DauDauBundle:Photos', 'p')
                        ->select('p')
                        ->where('p.dauId=:id')
                        ->setParameters(array('id' => $id))
                ;
        return $photos->getQuery()->getResult();
    }
    
    public function updateDauData($data) {
        $params = array();
        $query = "
            UPDATE dau SET
            title=:title,
            content=:content,
            price=:price,
            address=:address,
            fix=:fix,
            mobil=:mobil
            WHERE id=:id
        ";
        $params[':title'] = $data['title'];
        $params[':content'] = $data['content'];
        $params[':price'] = $data['price'];
        $params[':address'] = $data['address'];
        $params[':fix'] = $data['fix'];
        $params[':mobil'] = $data['mobil'];
        $params[':id'] = $data['id'];
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
    }
    
    public function deletePhoto($photo_id) {
        $params = array();
        $query = "
            DELETE FROM photos
            WHERE id=:id
        ";
        $params[':id'] = $photo_id;
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
    }
    
    public function updateAnnSettings($data) {
        $query = "UPDATE ann_settings SET default_accept_status=:accept_status, notification_emails=:emails, notification_emails_contacts=:notification_emails_contacts";
        $params[':accept_status'] = $data['accept_status'];
        $params[':emails'] = $data['emails'];
        $params[':emails'] = $data['emails'];
        $params[':notification_emails_contacts'] = $data['contacts_emails'];
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
    }
    
    public function getAnnSettings() {
        $query = "SELECT * FROM ann_settings LIMIT 1";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query);
        return $q->fetch(2);
    }
    
    public function acceptRejectDau($hash, $type) {
        $params = array();
        if($type == 'delete') {
            $query = "DELETE FROM dau WHERE secret_hash=:secret_hash";
            $params[':secret_hash'] = $hash;
        } elseif ($type == 'accept') {
            $query = "UPDATE dau SET accept_status='a' WHERE secret_hash=:secret_hash";
            $params[':secret_hash'] = $hash;
        } else {
            return;
        }

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
    }
    

}
