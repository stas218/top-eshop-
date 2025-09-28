<?php
if(session_status()===PHP_SESSION_NONE) session_start();
$config = require __DIR__ . '/../config.php';
// create folders
if(!file_exists(dirname($config['db_file']))) mkdir(dirname($config['db_file']),0755,true);
if(!file_exists($config['uploads_dir'])) mkdir($config['uploads_dir'],0755,true);

$db = new PDO('sqlite:'.$config['db_file']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create tables
$db->exec("CREATE TABLE IF NOT EXISTS products (id INTEGER PRIMARY KEY, sku TEXT, title_cs TEXT, title_en TEXT, title_ru TEXT, slug TEXT, price REAL, description_cs TEXT, description_en TEXT, description_ru TEXT, stock INTEGER DEFAULT 0, digital_keys TEXT, image TEXT, created_at TEXT);");
$db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, email TEXT UNIQUE, password TEXT, is_admin INTEGER DEFAULT 0, created_at TEXT);");
$db->exec("CREATE TABLE IF NOT EXISTS orders (id INTEGER PRIMARY KEY, user_id INTEGER, email TEXT, items TEXT, total REAL, shipping TEXT, payment_method TEXT, status TEXT DEFAULT 'new', created_at TEXT);");
function h($s){ return htmlspecialchars($s,ENT_QUOTES,'UTF-8'); }
function csrf_input(){ if(empty($_SESSION['csrf_token'])) $_SESSION['csrf_token']=bin2hex(random_bytes(16)); return '<input type="hidden" name="csrf" value="'.h($_SESSION['csrf_token']).'">'; }
function check_csrf($token){ if(empty($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) die('CSRF token missing or invalid'); }
function t($key){ global $config; $lang = $_GET['lang'] ?? ($_SESSION['lang'] ?? 'cs'); $lang = in_array($lang, $config['languages']) ? $lang : 'cs'; $file = __DIR__.'/../lang/'.$lang.'.php'; if(file_exists($file)){ $strings = include $file; return $strings[$key] ?? $key; } return $key; }
