<?php
require __DIR__ . '/../lib/init.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if(!empty($_FILES['image']['name'])){
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $name = uniqid('img_').'.'.$ext;
    move_uploaded_file($_FILES['image']['tmp_name'], __DIR__.'/../public/uploads/'.$name);
  } else { $name = ''; }
  $stmt = $db->prepare('INSERT INTO products (sku,title_cs,title_en,title_ru,slug,price,description_cs,description_en,description_ru,stock,image,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
  $slug = strtolower(preg_replace('/[^a-z0-9\-]/i','-', $_POST['title_cs']));
  $stmt->execute([$_POST['sku'], $_POST['title_cs'], $_POST['title_en'], $_POST['title_ru'], $slug, floatval($_POST['price']), $_POST['description_cs'], '', '', intval($_POST['stock']), $name, date('c')]);
  header('Location: index.php'); exit;
}
