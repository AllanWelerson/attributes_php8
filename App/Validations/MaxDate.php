<?php

namespace App\Validations;

use Attribute;
use DateTime;
use Exception;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MaxDate implements Validation
{
  public function __construct(
    protected string $value,
  ) {
  }

  public function validate(string $propertyName, mixed $value): mixed
  {
    try {
      $dateValue = new DateTime($this->value);
    } catch (Exception $e) {
      throw new Exception("Formato invalido de data de validação para {$propertyName}");
    }

    if ($value > $dateValue) {
      throw new \Exception("Não permitido data após {$dateValue->format('d/m/Y')} para {$propertyName}");
    }

    return $value;
  }
}
