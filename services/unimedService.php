<?php
require_once __DIR__ . '/../repository/unimedRepository.php';

class unimedService {

    public function readTable($id) {
        $user = unimedRepository::getInstance()->readTable($id);
        return $user;
    }

    public function insert($data) {
        try {
            $user = unimedRepository::getInstance()->insert($data);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function createColumn($unimedForm) {
        $unimed = $this->readTable($unimedForm['id']);
        $verify = true;
        for ($i = 0; $i < count($unimed); $i++) {
            if ($unimed[$i] == $unimedForm['nome']) {
                $verify = false;
            }
        }
        if ($verify == true) {
            $user = unimedRepository::getInstance()->createColumn($unimedForm);
        } else {
            return 'BAD_REQUEST';
        }
    }

    public function delete($unimedForm) {
        $user = unimedRepository::getInstance()->delete($unimedForm);
    }
}