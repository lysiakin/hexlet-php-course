<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('Деление на ноль.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
} catch (Exception $e) {
    echo 'Поймано исключение: ',  $e->getMessage(), "\n";
} finally {
    echo "Первый блок finally.\n";
}

try {
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Поймано исключение: ',  $e->getMessage(), "\n";
} finally {
    echo "Второй блок finally.\n";
}

// Продолжение нормального выполнения
echo "Привет, мир\n";