<?php
require_once __DIR__ . '/../services/usuarioService.php';
session_start();

$usuarioService = new usuarioService();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $result = $usuarioService->autUser($myusername, $mypassword);

    if($result != false) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['login_level'] = $result->getNivel();
        header("location: ../dashboard.php");
     } else {
        echo "ERROR";
     }
}