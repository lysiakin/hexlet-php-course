<?php

//
function toStd(array $data): object
{
    $stdObj = new \stdClass();
    foreach ($data as $key => $value) {
        $stdObj->$key = $value;
    }
    return $stdObj;
}
//

$data = [
    'key' => 'value',
    'key2' => 'value2',
];

$config = toStd($data);
print_r($config);
$config->key; // value
$config->key2; // value2