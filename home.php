<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?=h($config['shop_name'])?> — <?=t('home')?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">
  <header class="bg-green-600 text-white p-4">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold"><?=h($config['shop_name'])?></h1>
      <nav>
        <a class="px-3" href="index.php"><?=t('home')?></a>
        <a class="px-3" href="index.php?action=cart"><?=t('cart')?></a>
        <a class="px-3" href="../admin/index.php">Admin</a>
      </nav>
    </div>
  </header>
  <main class="max-w-6xl mx-auto p-6">
    <h2 class="text-xl mb-4">Nejnovější hry</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php foreach($prods as $p): ?>
        <div class="bg-white p-4 rounded shadow">
          <?php if(!empty($p['image'])): ?>
            <img src="uploads/<?=h($p['image'])?>" alt="<?=h($p['title_cs'])?>" class="w-full h-40 object-cover rounded mb-3">
          <?php else: ?>
            <div class="w-full h-40 bg-gray-200 rounded mb-3 flex items-center justify-center">Obrázek</div>
          <?php endif;?>
          <h3 class="font-semibold"><?=h($p['title_cs'])?></h3>
          <p class="text-sm text-gray-600"><?=h(mb_strimwidth($p['description_cs'],0,120,'...'))?></p>
          <div class="mt-3 flex items-center justify-between">
            <div class="font-bold"><?=number_format($p['price'],2,',',' ')?> Kč</div>
            <form method="post" action="index.php?action=add_to_cart" class="inline">
              <?=csrf_input()?>
              <input type="hidden" name="product_id" value="<?=h($p['id'])?>">
              <input type="number" name="qty" value="1" min="1" class="w-16 border rounded px-2 py-1">
              <button class="bg-green-600 text-white px-3 py-1 rounded">Koupit</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
  <footer class="text-center text-sm text-gray-600 p-6">© <?=date('Y')?> <?=h($config['shop_name'])?></footer>
</body>
</html>
