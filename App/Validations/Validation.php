<?php

namespace App\Validations;

interface Validation
{
  public function validate(string $propertyName, mixed $value);
}
