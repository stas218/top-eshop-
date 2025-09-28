<?php
return [
  'shop_name' => 'top-eshop',
  'domain' => 'PLACEHOLDER_DOMAIN',
  'contact_email' => 'urechiiandrei@gmail.com',
  'contact_phone' => '+420773885743',
  'business_info' => 'Kukelská 925, Praha 14',
  'ic' => '08983500',
  'bank_account' => '2701398233/2010',
  'db_file' => __DIR__ . '/data/shop.db',
  'uploads_dir' => __DIR__ . '/public/uploads',
  'languages' => ['cs','en','ru'],
  // Admin (dočasně uložené jako plain -> změňte v produkci)
  'admin' => [
    'email' => 'Gdeto123456@gmail.com',
    'password_plain' => 'Urechii1996'
  ],
  // SMTP placeholder
  'smtp' => [
    'host' => 'PLACEHOLDER_SMTP_HOST',
    'port' => 587,
    'username' => 'PLACEHOLDER_SMTP_USER',
    'password' => 'PLACEHOLDER_SMTP_PASS',
    'from_email' => 'urechiiandrei@gmail.com',
    'from_name' => 'top-eshop'
  ],
  // Payments
  'payments' => [
    'methods' => ['bank_transfer','stripe'],
    'bank_transfer' => ['account' => '2701398233/2010', 'company_name' => 'top-eshop'],
    'stripe' => ['secret_key' => 'PLACEHOLDER_STRIPE_SECRET', 'publishable_key' => 'PLACEHOLDER_STRIPE_PUBLISHABLE', 'webhook_secret' => 'PLACEHOLDER_STRIPE_WEBHOOK']
  ],
  'ads' => [
    'facebook_pixel_id' => 'PLACEHOLDER_FB_PIXEL',
    'facebook_access_token' => 'PLACEHOLDER_FB_TOKEN'
  ],
  'security' => [
    'csrf_salt' => 'REPLACE_WITH_RANDOM'
  ]
];
