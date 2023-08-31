<?php

require_once 'config.php';
require_once 'common.php';

try {
    $redis = getRedis();
    $data = $redis->get(ALL_VISITS_KEY);
    if (empty($data)) {
        $data = getNullStat();
    }
    echo $data;
} catch (Throwable $exception) {
    halt($exception->getMessage());
}