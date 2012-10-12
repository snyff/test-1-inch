<?php

namespace Dau\DauBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AdmRepository extends EntityRepository {

    public function checkAdm($nick, $pass) {
        $query = "
            SELECT *
            FROM adm
            WHERE nick=:nick
            AND pass=:pass";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':nick' => $nick, ':pass' => $pass));
        $result = $q->fetch(2);
        return $result;
    }
    
    public function deleteDau($id) {
        $query = "DELETE FROM dau WHERE id=:id";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':id' => $id));
    }
    
    public function hideDau($id, $type) {
        if($type == 'hide') {
            $hide_unhide = 'h';
        } elseif($type == 'unhide') {
            $hide_unhide = 'a';
        }
        $query = "UPDATE dau SET accept_status='".$hide_unhide."' WHERE id=:id";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':id' => $id));
    }
    
    public function setCurrentTimeDau($id) {
        $query = "UPDATE dau SET added=NOW() WHERE id=:id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':id' => $id));
    }
    
    public function deleteInchiriez($id) {
        $query = "DELETE FROM rent WHERE id=:id";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':id' => $id));
    }

    public function getAllContacts() {
        $query = "
            SELECT *
            FROM contacts
        ";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query);
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function deleteContact($id) {
        $query = "DELETE FROM contacts WHERE id=:id";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':id' => $id));
    }

    public function get999Ids() {
        $query = "
            SELECT DISTINCT(id_999) as id_999
            FROM dau
            WHERE id_999 IS NOT NULL
        ";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query);
        $result = $q->fetchAll(2);
        return $result;
    }
}
