<?php

function getTotalAmount(array $wallet, string $currency): int
{
    $sum = 0;

    foreach ($wallet as $item) {
        if (strpos($item, $currency) !== false) {
            $value = substr($item, 4);
            $sum += $value;
        }
    }
    return $sum;
}

$money1 = ['eur 10', 'usd 1', 'usd 10', 'rub 50', 'usd 5'];
echo getTotalAmount($money1, 'usd'); // 16

$money2 = ['eur 10', 'usd 1', 'eur 5', 'rub 100', 'eur 20', 'eur 100', 'rub 200'];
echo getTotalAmount($money2, 'eur'); // 135

$money3 = ['eur 10', 'rub 50', 'eur 5', 'rub 10', 'rub 10', 'eur 100', 'rub 200'];
echo getTotalAmount($money3, 'rub'); // 270


//// BEGIN
//function getTotalAmount(array $money, string $currency): int
//{
//    $sum = 0;
//
//    foreach ($money as $bill) {
//        $currentCurrency = substr($bill, 0, 3);
//        if ($currentCurrency !== $currency) {
//            continue;
//        }
//        $denomination = (int) substr($bill, 4);
//        $sum += $denomination;
//    }
//
//    return $sum;
//}
//// END