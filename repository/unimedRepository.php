<?php
require_once __DIR__ . '/../config/connection.php';

class unimedRepository {

    public static $instance;
 
    private function __construct() {}

    //Creates a self instance of the class checking if it hasn't be already create
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new unimedRepository();

            return self::$instance;
    }

    public function readTable($id) {
        try {
            $sql = "SHOW COLUMNS FROM unimed_" . $id;
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

    public function insert($unimed) {
        try {
            $query = '';
            for ($i = 0; $i < count($unimed)-1; $i++) {
                if ($i != count($unimed)-2) {
                    $query = $query . "'" . $unimed[$i] . "', ";
                } else {
                    $query = $query . "'" . $unimed[$i] . "'";
                }
            }
            $sql = "INSERT INTO unimed_" . $unimed['id'] . " VALUES (" . $query . ");";
            $p_sql = connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->execute();
        } catch (Exception $e) {
            print($e);
        }
    }

    public function createColumn($formData) {
        try {
            $sql = "ALTER TABLE unimed_" . $formData['id'] . " ADD " . $formData['nome'] . " VARCHAR(30) NOT NULL";
            $p_sql = connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->execute();
        } catch (Exception $e) {
            print($e);
        }
    }

    public function delete($formData) {
        try {
            $sql = "ALTER TABLE unimed_" . $formData['id'] . " DROP " . $formData['nome'];
            $p_sql = connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            return $p_sql->execute();
        } catch (Exception $e) {
            print($e);
        }
    }
}