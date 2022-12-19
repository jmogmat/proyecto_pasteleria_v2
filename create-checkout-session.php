<?php

require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51MCnQkApDnz1Nvr0WahIeJr3cN0yMX9XNL8stNoUGQIrtI8Ol0kthGP7wQyCJTILUEnr9VxhKjHhXjNaV8xM6pW800eq1XalJV');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:3000/public';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    'price' => "price_1MEu7NApDnz1Nvr0Pnsz4oPV",
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
