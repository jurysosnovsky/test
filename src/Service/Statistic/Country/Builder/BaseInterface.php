<?php

namespace App\Service\Statistic\Country\Builder;

use App\Service\Statistic\Country\DTO\CountryValueInterface;

interface BaseInterface
{
    public function build(): CountryValueInterface;
}