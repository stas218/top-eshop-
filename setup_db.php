<?php
require __DIR__ . '/lib/init.php';

// create default admin if not exists
$stmt = $db->prepare('SELECT COUNT(*) FROM users');
$stmt->execute();
if($stmt->fetchColumn()==0){
  $hash = password_hash($config['admin']['password_plain'], PASSWORD_DEFAULT);
  $ins = $db->prepare('INSERT INTO users (email,password,is_admin,created_at) VALUES (?,?,1,?)');
  $ins->execute([$config['admin']['email'],$hash,date('c')]);
  echo "Admin user created: {$config['admin']['email']}\n";
}

// demo product
$stmt = $db->query('SELECT COUNT(*) FROM products');
if($stmt->fetchColumn()==0){
  $p = $db->prepare('INSERT INTO products (sku,title_cs,title_en,title_ru,slug,price,description_cs,description_en,description_ru,stock,image,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
  $p->execute(['GAME-001','Ukázková hra','Demo Game','Демо игра','demo-game',299.00,'Popis český','Sample description','Пример описания',10,'',date('c')]);
  echo "Demo product added\n";
}
