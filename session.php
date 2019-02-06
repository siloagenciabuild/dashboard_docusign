<?php
    require_once __DIR__ . '/services/usuarioService.php';

    $usuarioService = new usuarioService();
    session_start();
   
    $user_check = $_SESSION['login_user'];
    $user_check = $usuarioService->validUser($user_check);
    
    if($user_check == false) {
        header("location:login.php");
    }