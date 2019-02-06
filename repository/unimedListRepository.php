<?php
require_once __DIR__ . '/../domain/unimedList.php';
require_once __DIR__ . '/../config/connection.php';

class unimedListRepository {

    public static $instance;
 
    private function __construct() {}

    //Creates a self instance of the class checking if it hasn't be already create
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new unimedListRepository();

            return self::$instance;
    }

    public function readAll() {
        try {
            $result = array();
            $sql = "SELECT * FROM unimed_list ORDER BY nome ASC";
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
        $object = new unimedList();
        $object->setNome($row['nome']);
        $object->setEmail($row['email']);
        $object->setUrl($row['url']);
        return $object;
    }

    public function readById($id) {
        try {
            $sql = "SELECT * FROM unimed_list WHERE url = :url";
            $p_sql = Connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->bindValue(":url", $id);
            $p_sql->execute();
            return $this->setObject($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print($e);
        }
    }

    public function readByPage($number) {
        try {
            $number = ($number - 1) * 15;
            $sql = "SELECT * FROM unimed_list ORDER BY nome ASC LIMIT $number, 15;";
            $p_sql = Connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->execute();
            if ($p_sql->execute()) {
                foreach ($p_sql->fetchAll(PDO::FETCH_ASSOC) as $data) {
                    $result[] = $this->setObject($data);
                }
                if (!empty($result)) {return $result;};
            } else {
                return 'No match found!';
            }
        } catch (Exception $e) {
            print($e);
        }
    }

    public function insert(UnimedList $unimedList) {
        try {
            $sql = "INSERT INTO unimed_list (
                nome,
                email)
                VALUES (
                :nome,
                :email)";

            $p_sql = connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->bindValue(':nome', $unimedList->getNome());
            $p_sql->bindValue(':email', $unimedList->getEmail());
            $p_sql->execute();
            $lastId =  connection::getInstance(__DIR__ . '/../config/configdb.ini')->lastInsertId();
            return $lastId;
        } catch (Exception $e) {
            print($e);
        }
    }

    public function createUnimedBase($id) {
        try {
            $sql = 'CREATE TABLE unimed_' . $id . '( nome VARCHAR(30) NOT NULL ) ENGINE = InnoDB;';

            $p_sql = connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            return $p_sql->execute();
        } catch (Exception $e) {
            print($e);
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM unimed_list WHERE url = :url";
            $p_sql = connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->bindValue(':url', $id, PDO::PARAM_INT);

            return $p_sql->execute();
        } catch (Exception $e) {
            print($e);
        }
    }

    public function deleteUnimedBase($id) {
        try {
            $sql = "DROP TABLE IF EXISTS unimed_:url";
            $p_sql = connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->bindValue(':url', $id, PDO::PARAM_INT);
            $p_sql->execute();
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