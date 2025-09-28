<?php
// =============================
//  Top-Eshop - CONFIG FILE
// =============================

// Základní URL projektu
define('BASE_URL', 'http://localhost:8000');

// =============================
//  Databáze
// =============================
// Lokální test (SQLite databáze)
define('DB_TYPE', 'sqlite');
define('DB_PATH', __DIR__ . '/data/shop.db');

// =============================
//  Admin účet (demo)
//  -> vytvoří se také v setup_db.php
// =============================
// Email: Gdeto123456@gmail.com
// Heslo: Urechii1996

// =============================
//  SMTP (odesílání e-mailů)
// =============================
// Zatím můžete nechat takto, později doplníme reálné údaje
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'urechiiandrei@gmail.com'); // váš email
define('SMTP_PASS', 'PLACEHOLDER');             // sem dáte app heslo
define('SMTP_FROM', 'urechiiandrei@gmail.com');

// =============================
//  Stripe (platby)
// =============================
// Později nahradíte testovacími klíči z https://dashboard.stripe.com
define('STRIPE_PUBLIC_KEY', 'pk_test_PLACEHOLDER');
define('STRIPE_SECRET_KEY', 'sk_test_PLACEHOLDER');

// =============================
//  Ostatní nastavení
// =============================
// Název e-shopu
define('SHOP_NAME', 'Top-Eshop');

// Jazyk default (cz / en / ru)
define('DEFAULT_LANG', 'cz');

// Měna
define('CURRENCY', 'CZK');
<?php
$servername = "sql206.ezyro.com";  // host
$username   = "ezyro_40043860";    // MySQL uživatel
$password   = "TVÉ_HESLO";         // stejné jako do vPanelu
$dbname     = "ezyro_40043860_topeshop"; // název databáze

// Připojení k databázi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kontrola spojení
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
