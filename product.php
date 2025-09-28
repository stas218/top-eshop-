<!doctype html>
<html lang="cs">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=h($product['title_cs'])?></title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-50">
  <div class="max-w-4xl mx-auto p-6">
    <a href="index.php" class="text-green-600">&larr; Zpět</a>
    <div class="bg-white p-6 rounded shadow mt-4">
      <h1 class="text-2xl font-bold"><?=h($product['title_cs'])?></h1>
      <?php if($product['image']): ?><img src="uploads/<?=h($product['image'])?>" class="w-full h-64 object-cover rounded mt-3"><?php endif;?>
      <p class="mt-3 text-gray-700"><?=nl2br(h($product['description_cs']))?></p>
      <div class="mt-4 flex items-center justify-between">
        <div class="text-xl font-bold"><?=number_format($product['price'],2,',',' ')?> Kč</div>
        <form method="post" action="index.php?action=add_to_cart"><?=csrf_input()?><input type="hidden" name="product_id" value="<?=h($product['id'])?>"><input type="number" name="qty" value="1" min="1" class="w-20 border rounded px-2 py-1"><button class="bg-green-600 text-white px-3 py-1 rounded">Přidat do košíku</button></form>
      </div>
    </div>
  </div>
</body>
</html>
