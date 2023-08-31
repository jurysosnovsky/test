<?php

require_once 'config.php';

/**
 * @throws RedisException
 */
function getRedis(): \Redis
{
    $redis = new \Redis();
    $redis->pconnect(REDIS_HOST, REDIS_PORT);
    return $redis;
}

function halt(string $errorMessage = ''): void
{
    http_response_code(400);
    echo '{"error":"' . $errorMessage. '"}';
    exit(0);
}

function getNullStat(): string
{
    $data = [];
    foreach (COUNTRIES_LIST as $countryCode) {
        $data[$countryCode] = 0;
    }
    return json_encode($data);
}