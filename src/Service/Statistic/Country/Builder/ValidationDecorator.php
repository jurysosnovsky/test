<?php

namespace App\Service\Statistic\Country\Builder;

use App\Service\Statistic\Country\DTO\CountryValueInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ValidationDecorator implements BaseInterface
{

    public function __construct(
        private readonly BaseInterface $decorated,
        private readonly ValidatorInterface $validator,
    )
    {
    }

    public function build(): CountryValueInterface
    {
        $country = $this->decorated->build();
        $errors = $this->validator->validate($country);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            throw new \InvalidArgumentException($errorsString);
        }

        return $country;
    }

}