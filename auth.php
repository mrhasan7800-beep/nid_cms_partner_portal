<?php
session_start();
$users = json_decode(file_get_contents('users.json'), true);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

foreach($users as $user){
    if($user['email']===$email && $user['password']===$password){
        $_SESSION['user']=$user;
        header("Location: dashboard.php");
        exit;
    }
}

header("Location: login.php?error=1");