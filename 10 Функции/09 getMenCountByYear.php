<?php

$start_time = microtime(true);

function getMenCountByYear(array $users)
{
    $compare = function (array $carry, array $item)
    {
        ['gender' => $gender, 'birthday' => $birthday] = $item;
        $birthday = substr($birthday, 0, 4);

        if ($gender === 'male'){
            if (!array_key_exists($birthday, $carry)) {
                $carry[$birthday] = 1;
            } else {
                $carry[$birthday]++;
            }
        }
        return $carry;
    };
//    print_r(array_reduce($users, $compare, []));
    return array_reduce($users, $compare, []);
}

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
?>