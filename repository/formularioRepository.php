<?php
require_once __DIR__ . '/../domain/Formulario.php';
require_once __DIR__ . '/../config/connection.php';

class formularioRepository {

    public static $instance;
 
    private function __construct() {
        //
    }
    
    //Creates a self instance of the class checking if it hasn't be already create
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new formularioRepository();
 
        return self::$instance;
    }
    
    //Read all registers from database
    public function readAll() {
        try {
            $result = array();
            $sql = "SELECT * FROM db_form;";
            $p_sql = Connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            if ($p_sql->execute()) {
                foreach ($p_sql->fetchAll(PDO::FETCH_ASSOC) as $data) {
                    $result[] = $this->setObject($data);
                }
                return $result;
            } else {
                return 'No match found!';
            }
        } catch (Exception $e) {
            print($e);
        }
    }

    private function setObject($row) {
        $pojo = new Formulario();
        $pojo->setCorretor($row['corretor']);
        $pojo->setSegurado($row['segurado']);
        $pojo->setEmail($row['email']);
        return $pojo;
    }

    public function insert(Formulario $customer) {
        try {
            $sql = "INSERT INTO db_form (      
                corretor,
                segurado,
                email)
                VALUES (
                :corretor,
                :segurado,
                :email)";

            $p_sql = connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->bindValue(':corretor', $customer->getCorretor());
            $p_sql->bindValue(':segurado', $customer->getSegurado());
            $p_sql->bindValue(':email', $customer->getEmail());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print($e);
        }
    }

    public function readTable() {
        try {
            $sql = "SHOW COLUMNS FROM unimed_list";
            $p_sql = Connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->execute();
            if ($p_sql->execute()) {
                foreach ($p_sql->fetchAll(PDO::FETCH_ASSOC) as $data) {
                    $result[] = $data['Field'];
                }
                return $result;
            } else {
                return 'ERROR 404';
            }
        } catch (Exception $e) {
            return 'ERROR 404';
        }
    }
}