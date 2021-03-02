<?php

use Source\Models\Address;

header("Access-Control-Allow-Origin: *");

require __DIR__ . "/vendor/autoload.php";

$router = new \CoffeeCode\Router\Router(BASE_URL);

$router->namespace("Source\Controllers");

$router->group(null);
$router->get("/", "HomeController:index");
$router->post("/enderecos", "HomeController:getAdrress");

$router->group("ops");
$router->get("/{errcode}", function($data) {
  echo "<h1>Erro {$data['errcode']}";
});

$router->dispatch();

if($router->error()) {
  $router->redirect("/ops/{$router->error()}");
}