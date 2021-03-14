<?php

$start_time = microtime(true);

// BEGIN
function getMenCountByYear(array $users)
{
    $menfolk = array_filter($users, fn($user) => $user['gender'] === 'male');

    $years = array_map(fn($user) => date('Y', strtotime($user['birthday'])), $menfolk);

    return array_reduce($years, function ($acc, $year) {
        if (!array_key_exists($year, $acc)) {
            $acc[$year] = 1;
        } else {
            $acc[$year] += 1;
        }

        return $acc;
    }, []);
}
// END

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03'],
    ['name' => 'Jon', 'gender' => 'male', 'birthday' => '1980-11-03'],
    ['name' => 'Robb','gender' => 'male', 'birthday' => '1980-05-14'],
    ['name' => 'Tisha', 'gender' => 'female', 'birthday' => '2012-11-03'],
    ['name' => 'Rick', 'gender' => 'male', 'birthday' => '2012-11-03'],
    ['name' => 'Joffrey', 'gender' => 'male', 'birthday' => '1999-11-03'],
    ['name' => 'Edd', 'gender' => 'male', 'birthday' => '1973-11-03']
];

for($i = 1; $i <=10000; $i++)
{
    getMenCountByYear($users);
}

# Array (
#     1973 => 3,
#     1963 => 1,
#     1980 => 2,
#     2012 => 1,
#     1999 => 1
# );

$end_time = microtime(true);

// Calculate script execution time
$execution_time = ($end_time - $start_time);

echo " Execution time of script = ".$execution_time." sec";

