<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Entities\User;

try {

  $user = new User();
  $user->name = "pessoa teste";
  $user->points = 50;
  $user->cpf = "12345678912";
  $user->birthday = new DateTime('2020-09-01');
  $user->email = "teste@email.com";

  $user->validate();
  echo "Validado";
} catch (Exception $e) {
  echo $e->getMessage() . "<br>";
}
