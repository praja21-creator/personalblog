<?php

session_start();
require '../config/database.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "
    SELECT * FROM users
    WHERE email = '$email'
");

$user = mysqli_fetch_assoc($query);

if($user){

    if($password == $user['password']){

        $_SESSION['login'] = true;
        $_SESSION['user'] = $user;

        header("Location: ../admin/index.php");

    } else {
        echo "Password salah";
    }

} else {
    echo "Email tidak ditemukan";
}