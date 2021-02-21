<?php

namespace App\Validations;

use Attribute;
use DateTime;
use Exception;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Email implements Validation
{
  public function __construct(
    protected array $value = [],
  ) {
  }

  public function validate(string $propertyName, mixed $value): mixed
  {
    if (filter_var($value, FILTER_VALIDATE_EMAIL) == false) {
      throw new \Exception("Formato invalido do E-mail para {$propertyName}");
    }

    [$username, $domain] = explode("@", $value);


    if (count($this->value) && !in_array($domain, $this->value)) {
      throw new \Exception("Dominio invalido do E-mail {$value} para {$propertyName}");
    }

    return $value;
  }
}
