<!doctype html>
<html>
<head><meta charset="utf-8"><title>Admin login</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-50">
  <div class="max-w-sm mx-auto p-6">
    <h2 class="text-xl font-bold">Admin přihlášení</h2>
    <?php if(!empty($error)) echo '<div class="text-red-600">'.h($error).'</div>'; ?>
    <form method="post">
      <div class="mt-3"><input name="password" type="password" placeholder="heslo" class="border rounded px-2 py-1 w-full"></div>
      <div class="mt-3"><button class="bg-green-600 text-white px-3 py-1 rounded" name="login">Přihlásit</button></div>
    </form>
  </div>
</body>
</html>
