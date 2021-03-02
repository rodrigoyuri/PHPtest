<?php

namespace Source\Controllers;

use Source\Models\Address;

class HomeController 
{
  
  private $view;

  public function __construct()
  {
    $this->view = new \League\Plates\Engine(__DIR__ . "/../../templates", "php");
  }

  public function index()
  {
    echo $this->view->render("home");
  }

  public function getAdrress($data)
  {
    $address = (new Address)->find("cep = :cep", "cep={$data['cep']}")->fetch();
    if($address) {
      echo json_encode(array("address" => $address->data()));
      return;
    }  
    $response = $this->getAddressApi($data["cep"]);
    echo json_encode($response);
  }

  private function getAddressApi(string $cep)
  {
    $address = get_object_vars(simplexml_load_file("https://viacep.com.br/ws/{$cep}/xml"));
    return $this->response($address);
  }

  private function response(array $address)
  {
    $resultSave = $this->saveAddressDataBase($address);
    if($resultSave) return array("error" => $resultSave);
    return array("address" => $address);
  }

  private function saveAddressDataBase(array $address)
  {
    $addressSave = new Address();
    $addressSave->cep = str_replace("-", "", $address["cep"]);
    $addressSave->localidade = $address["localidade"];
    $addressSave->bairro = $address["bairro"];
    $addressSave->uf = $address["uf"];
    $addressSave->ibge = $address["ibge"];
    $addressSave->logradouro = $address["logradouro"];
    return $addressSave->saveAddress();
  }
}