<?php
require_once __DIR__ . '/../repository/unimedListRepository.php';

class unimedListService {

    public function readAll() {
        $user = unimedListRepository::getInstance()->readAll();
        return $user;
    }
    
    public function readByUrl($id) {
        $user = unimedListRepository::getInstance()->readById($id);
        return $user;
    }

    public function readByPage($number) {
        if (isset($_GET["page"])) { $number  = $_GET["page"]; } else { $number=1; }
        $user = unimedListRepository::getInstance()->readByPage($number);
        if (empty($user)) {
            return 0;
        } else {
            return $user;
        }
    }

    public function totalPage() {
        $user = unimedListRepository::getInstance()->readAll();
        $user = array_chunk($user, 15);
        return count($user);
    }

    public function insert($data) {
        try {
            $unimedList = new Unimedlist();
            $unimedList->setNome($data['nome']);
            $unimedList->setEmail($data['email']);
            
            $response = unimedListRepository::getInstance()->insert($unimedList);
            unimedListRepository::getInstance()->createUnimedBase($response);
        } catch (Exception $e) {
            print($e);
        }
    }

    public function delete($data) {
        try {
            unimedListRepository::getInstance()->delete($data);
            unimedListRepository::getInstance()->deleteUnimedBase($data);
        } catch (Exception $e) {
            print($e);
        }
    }

    public function readTable() {
        $user = unimedListRepository::getInstance()->readTable();
        return $user;
    }
}