<?php

namespace App\Entities;

use ReflectionClass;
use App\Validations\Validation;

abstract class Entity
{
  public function validate()
  {
    $reflectionClass = new ReflectionClass($this);
    $properties = $reflectionClass->getProperties();

    foreach ($properties as $property) {

      $attributes = $property->getAttributes();
      $propertyName = $property->name;
      $reflectionProperty = $reflectionClass->getProperty($propertyName);
      $reflectionProperty->setAccessible(true);

      foreach ($attributes as $attribute) {

        $instantiatedAttribute = $attribute->newInstance();

        if ($instantiatedAttribute instanceof Validation) {

          if ($reflectionProperty->isInitialized($this)) {
            $value = $reflectionProperty->getValue($this);
            $instantiatedAttribute->validate($propertyName, $value);
          }
        }
      }
    }
  }
}
