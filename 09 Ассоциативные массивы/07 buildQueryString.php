<?php

function buildQueryString(array $params)
{
    ksort($params);
    $query = [];

    foreach ($params as $param => $value) {
        $query[] = "{$param}={$value}";
    }
    return implode("&", $query);
}

print_r(buildQueryString(['per' => 10, 'page' => 1 ]));
// → page=1&per=10