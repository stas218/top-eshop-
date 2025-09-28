<!doctype html>
<html>
<head><meta charset="utf-8"><title>Admin dashboard</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-50 p-6">
  <div class="max-w-6xl mx-auto">
    <h1 class="text-2xl font-bold">Admin — top-eshop</h1>
    <p><a href="index.php?logout=1" class="text-red-600">Odhlásit</a></p>
    <section class="mt-4 bg-white p-4 rounded shadow">
      <h2 class="font-semibold">Přidat produkt</h2>
      <form method="post" action="products.php" enctype="multipart/form-data">
        <?=csrf_input()?>
        <div class="mt-2"><input name="sku" placeholder="SKU" class="border rounded px-2 py-1 w-full"></div>
        <div class="mt-2"><input name="title_cs" placeholder="Název (CS)" class="border rounded px-2 py-1 w-full" required></div>
        <div class="mt-2"><input name="title_en" placeholder="Title (EN)" class="border rounded px-2 py-1 w-full"></div>
        <div class="mt-2"><input name="title_ru" placeholder="Название (RU)" class="border rounded px-2 py-1 w-full"></div>
        <div class="mt-2"><input name="price" placeholder="Cena (Kč)" class="border rounded px-2 py-1 w-full" required></div>
        <div class="mt-2"><input type="file" name="image"></div>
        <div class="mt-2"><textarea name="description_cs" placeholder="Popis CS" class="border rounded px-2 py-1 w-full"></textarea></div>
        <div class="mt-2"><input type="number" name="stock" placeholder="Sklad" class="border rounded px-2 py-1 w-full"></div>
        <div class="mt-2"><button class="bg-green-600 text-white px-3 py-1 rounded">Uložit</button></div>
      </form>
    </section>
    <section class="mt-4 bg-white p-4 rounded shadow">
      <h2 class="font-semibold">Seznam produktů</h2>
      <?php $list = $db->query('SELECT * FROM products ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC); if(!$list) echo '<p>Žádné produkty.</p>'; else{ ?>
        <ul><?php foreach($list as $it): ?>
          <li><?=h($it['title_cs'])?> — <?=number_format($it['price'],2,',',' ')?> Kč</li>
        <?php endforeach; ?></ul>
      <?php } ?>
    </section>
  </div>
</body>
</html>
