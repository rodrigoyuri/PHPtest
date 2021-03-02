<?php

define("BASE_URL", "http://localhost/PHPtest");

define("DATA_LAYER_CONFIG", [
  "driver" => "mysql",
  "host" => "localhost",
  "port" => "3306",
  "dbname" => "phptest",
  "username" => "root",
  "passwd" => "",
  "options" => [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_CASE => PDO::CASE_NATURAL
  ]
]);



/**
 * Helper
 */
function url(string $uri = null)
{
  if($uri) {
    return BASE_URL . "/{$uri}";
  }

  return BASE_URL;
}