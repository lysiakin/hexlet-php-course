<?php

namespace App\exceptions;

function json_decode($json, $assoc = false)
{
    // BEGIN (write your solution here)
    $json_array = \json_decode($json, $assoc);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new \Exception(json_last_error_msg());
    }

    return $json_array;
    // END
}

//try {
//    json_decode('{ key": "value" }', true);
//} catch (\Exception $e) {
//    echo 'Поймано исключение: ', $e->getMessage(), "\n";
//}

// Второй параметр соответствует второму параметру во встроенной функции json_decode.
// Его нужно передать как есть во внутренний вызов встроенной функции json_decode.
// ['key' => 'value']
$data = json_decode('{ key": "value" }', true);
