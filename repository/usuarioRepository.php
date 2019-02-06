<?php
require_once __DIR__ . '/../domain/Usuario.php';
require_once __DIR__ . '/../config/connection.php';

class usuarioRepository {

    public static $instance;
 
    private function __construct() {
        //
    }
    
    //Creates a self instance of the class checking if it hasn't be already create
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new usuarioRepository();
 
        return self::$instance;
    }
    
    //Read all registers from database
    public function readAll() {
        try {
            $result = array();
            $sql = "SELECT * FROM user_table;";
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

    public function autUser($nome, $senha) {
        try {
            $result = array();
            $sql = "SELECT * FROM user_table WHERE nome = '$nome' and senha = '$senha'";
            $p_sql = Connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->execute();
            return $this->setObject($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print($e);
        }
    }

    public function validUser($nome) {
        try {
            $result = array();
            $sql = "SELECT * FROM user_table WHERE nome = '$nome'";
            $p_sql = Connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->execute();
            return $this->setObject($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print($e);
        }
    }

    private function setObject($usuario) {
        $object = new Usuario();
        $object->setNome($usuario['nome']);
        $object->setSenha($usuario['senha']);
        $object->setNivel($usuario['nivel']);
        return $object;
    }

    public function insert(Usuario $usuario) {
        try {
            $sql = "INSERT INTO user_table (      
                nome,
                senha,
                nivel)
                VALUES (
                :nome,
                :senha,
                :nivel)";

            $p_sql = connection::getInstance(__DIR__ . '/../config/configdb.ini')->prepare($sql);
            $p_sql->bindValue(':nome', $customer->getNome());
            $p_sql->bindValue(':senha', $customer->getSenha());
            $p_sql->bindValue(':nivel', $customer->getNivel());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print($e);
        }
    }

    public function readTable() {
        try {
            $sql = "SHOW COLUMNS FROM user_table";
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