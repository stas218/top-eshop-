<!doctype html>
<html lang="cs">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Košík</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-50">
  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold">Košík</h1>
    <?php $cart = $_SESSION['cart'] ?? []; if(empty($cart)): ?>
      <p>Košík je prázdný.</p>
    <?php else:
      $ids = array_keys($cart); $placeholders = rtrim(str_repeat('?,',count($ids)),','); $stmt = $db->prepare('SELECT * FROM products WHERE id IN ('.$placeholders.')'); $stmt->execute($ids); $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); $total=0;
    ?>
      <table class="w-full bg-white rounded shadow p-4">
        <?php foreach($rows as $r): $qty=$cart[$r['id']]; $line=$r['price']*$qty; $total += $line; ?>
          <tr class="border-b"><td class="p-3"><?=h($r['title_cs'])?></td><td class="p-3">x <?=intval($qty)?></td><td class="p-3"><?=number_format($line,2,',',' ')?> Kč</td></tr>
        <?php endforeach; ?>
      </table>
      <div class="mt-4">
        <div class="font-bold">Celkem: <?=number_format($total,2,',',' ')?> Kč</div>
        <form method="post" action="index.php?action=checkout" class="mt-3 bg-white p-4 rounded shadow">
          <?=csrf_input()?>
          <div>Email: <input name="email" required class="border rounded px-2 py-1 w-full" value="<?=h($_SESSION['user_email'] ?? '')?>"></div>
          <div class="mt-3"><button class="bg-green-600 text-white px-4 py-2 rounded">Odeslat objednávku</button></div>
        </form>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
