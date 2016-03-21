<?php
session_start();

if(isset($_SESSION)){
$_SESSION = array();
session_destroy();
setcookie('login', '');
setcookie('password', '');
}
header('location: connexion.php');

?>