<?php

namespace App\Validations;

use Attribute;
use DateTime;
use Exception;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MinDate implements Validation
{
  public function __construct(
    protected string $date,
  ) {
  }

  public function validate(string $propertyName, mixed $value): mixed
  {
    try {
      $dateValue = new DateTime($this->date);
    } catch (Exception $e) {
      throw new Exception("Formato invalido de data de validação para {$propertyName}");
    }

    if ($value < $dateValue) {
      throw new \Exception("Não permitido data antes de {$dateValue->format('d/m/Y')} para {$propertyName}");
    }

    return $value;
  }
}
