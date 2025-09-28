<?php
require __DIR__.'/../lib/init.php'; $cfg=require __DIR__.'/../config.php';
$payload = @file_get_contents('php://input'); file_put_contents(__DIR__.'/../data/stripe_events.log', date('c')." - ". $payload ."\n", FILE_APPEND);
?>