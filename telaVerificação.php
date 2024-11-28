<?php
session_start(); 

$valid_username = "ds-etim-2";
$valid_password_hash = md5("etec-2224"); 

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($username === $valid_username && md5($password) === $valid_password_hash) {
    $_SESSION['loggedin'] = true; 
    $_SESSION['username'] = $username; 
    header("Location: telaLojinha.php"); 
    exit(); 
} else {
    echo "Login inválido. <a href='telaLogin.php'>Tente novamente</a>."; 
}
?>