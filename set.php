<?php

require_once 'config.php';
require_once 'common.php';

try {
    $redis = getRedis();
    $countryCode = strtolower(filter_input(INPUT_POST, 'country'));

    if (!in_array($countryCode, COUNTRIES_LIST)) {
        halt('Country not in list');
    }

    $key = sprintf(COUNTRY_VISITS_KEY_TEMPLATE, $countryCode);
    $redis->incr($key);
    echo '{}';

} catch (Throwable $exception) {
    halt($exception->getMessage());
}