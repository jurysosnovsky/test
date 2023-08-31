<?php

require_once 'config.php';
require_once 'common.php';

try {
    $redis = getRedis();

    $data = [];

    foreach (COUNTRIES_LIST as $countryCode) {
        $key = sprintf(COUNTRY_VISITS_KEY_TEMPLATE, $countryCode);
        $data[$countryCode] = (int) $redis->get($key);
    }

    $redis->set(ALL_VISITS_KEY, json_encode($data));

} catch (Throwable $exception) {
    halt($exception->getMessage());
}