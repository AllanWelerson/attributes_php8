<?php

namespace App\Entities;

use App\Validations\Email;
use App\Validations\MaxDate;
use App\Validations\MaxLength;
use App\Validations\MaxValue;
use App\Validations\MinDate;
use App\Validations\MinLength;
use App\Validations\MinValue;
use DateTime;

class User extends Entity
{
  #[MaxLength(20)]
  #[MinLength(10)]
  public string $name;

  #[MaxLength(11)]
  public string $cpf;

  #[MaxValue(100), MinValue(10)]
  public float $points;

  #[MaxDate('2020-09-01'), MinDate('2020-08-01')]
  public DateTime $birthday;

  #[Email(["email.com", "email2.com"])]
  public string $email;
}
