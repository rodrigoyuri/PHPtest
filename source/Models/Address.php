<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Address extends DataLayer
{
  public function __construct()
  {
    parent::__construct("address", [], "id", false);
  }

  public function saveAddress()
  {
    $result = $this->save();
    if(!$result) {
      return $result;
    }
    return null;
  }
}