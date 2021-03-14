<?php

const FREE_EMAIL_DOMAINS = [
    'gmail.com', 'yandex.ru', 'hotmail.com'
];

// BEGIN
function getFreeDomainsCount(array $emails)
{
    $domains = array_map(fn($email) => explode('@', $email)[1], $emails);
    $freeDomains = array_filter($domains, fn($domain) => in_array($domain, FREE_EMAIL_DOMAINS));

    return array_reduce($freeDomains, function ($acc, $domain) {
        if (!array_key_exists($domain, $acc)) {
            $acc[$domain] = 1;
        } else {
            $acc[$domain] += 1;
        }

        return $acc;
    }, []);
}
// END

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

getFreeDomainsCount($emails);
# Array (
#     'gmail.com' => 3
#     'yandex.ru' => 2
#     'hotmail.com' => 2
#  )
