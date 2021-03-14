<?php

const FREE_EMAIL_DOMAINS = [
    'gmail.com', 'yandex.ru', 'hotmail.com'
];

function getFreeDomainsCount(array $list)
{
    $filter = array_filter(
        $list,
        function ($email) {
            $cut =  substr($email, strpos($email, '@') + 1);
            return in_array($cut, FREE_EMAIL_DOMAINS, true);
        }
    );

    return array_reduce(
        $filter,
        function ($carry, $email) {
            $cut =  substr($email, strpos($email, '@') + 1);  // Операция дублирована,
            if (!array_key_exists($cut, $carry)) {                         // как её можно вынести в общий знаменатель?
                $carry[$cut] = 1;
            } else {
                $carry[$cut]++;
            }
            return $carry;
        },
        []);
}

$emails = [
    'info@gmail.com',
    'info@yandex.ru',
    'info@hotmail.com',
    'mk@host.com',
    'support@hexlet.io',
    'key@yandex.ru',
    'sergey@gmail.com',
    'vovan@gmail.com',
    'vovan@hotmail.com'
];

print_r(getFreeDomainsCount($emails));
# Array (
#     'gmail.com' => 3
#     'yandex.ru' => 2
#     'hotmail.com' => 2
#  )
