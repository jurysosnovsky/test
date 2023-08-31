<?php

namespace App\Service\Statistic\Country\Builder;

use App\Service\Statistic\Country\DTO\CountryValue;
use App\Service\Statistic\Country\DTO\CountryValueInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class FromRequest implements BaseInterface
{
    public function __construct(
        private readonly RequestStack $requestStack,
    )
    {
    }

    public function build(): CountryValueInterface
    {
        return new CountryValue($this->requestStack->getCurrentRequest()->request->get('country'));
    }

}