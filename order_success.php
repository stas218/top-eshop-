<!doctype html>
<html lang="cs">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Objednávka přijata</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-50">
  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold">Objednávka přijata</h1>
    <?php if(!$order): echo '<p>Objednávka nenalezena.</p>'; else: ?>
      <p>Děkujeme, Vaše objednávka ID <strong><?=h($order['id'])?></strong> byla přijata.</p>
      <p>Celkem: <strong><?=number_format($order['total'],2,',',' ')?> Kč</strong></p>
      <p>Na email: <strong><?=h($order['email'])?></strong></p>
    <?php endif; ?>
  </div>
</body>
</html>
