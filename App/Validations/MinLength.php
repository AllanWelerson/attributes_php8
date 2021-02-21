<?php

namespace App\Validations;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MinLength implements Validation
{
  public function __construct(
    protected float $value,
  ) {
  }

  public function validate(string $propertyName, mixed $value): mixed
  {
    if (strlen($value) < $this->value) {
      throw new \Exception("Não permitido valores abaixo de {$this->value} para {$propertyName}");
    }

    return $value;
  }
}
