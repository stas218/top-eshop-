<?php
session_start();
require __DIR__ . '/../lib/init.php';
$config = require __DIR__ . '/../config.php';
// simple auth
if(isset($_POST['login'])){
  $pw = $_POST['password'] ?? '';
  if(isset($config['admin']['password_plain']) && $pw === $config['admin']['password_plain']){
    $_SESSION['is_admin'] = true; header('Location: index.php'); exit;
  } else {
    $error = 'Špatné heslo';
  }
}
if(isset($_GET['logout'])){ unset($_SESSION['is_admin']); header('Location: index.php'); exit; }
if(empty($_SESSION['is_admin'])){ include __DIR__.'/templates/login.php'; exit; }
include __DIR__.'/templates/dashboard.php';
