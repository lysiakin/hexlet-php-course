<?php

function getSuperSeriesWinner(array $scores): ?string
{
    $canadaScore = 0;
    $ussrScore = 0;

    foreach ($scores as $game) {
        switch ($game[0] <=> $game[1]) {
            case -1:
                $canadaScore++;
                break;
            case 1:
                $ussrScore++;
                break;
        }
    }

    switch ($canadaScore <=> $ussrScore) {
        case -1:
            return 'canada';
        case 1:
            return 'ussr';
    }
//    $winner = $ussrScore <=> $canadaScore ? 'ussr' : 'canada';
    return null;
}

// Первое число – сколько забила Канада
// Второе число – сколько забила СССР
$scores = [
    [3, 7], // Первая игра
    [4, 1], // Вторая игра
    [4, 4],
    [3, 5],
    [4, 5],
    [3, 2],
    [4, 3],
    [6, 5],
];

getSuperSeriesWinner($scores);

//// BEGIN
//function getSuperSeriesWinner($scores)
//{
//    $result = 0;
//    foreach ($scores as $score) {
//        // $result = $result + ($score[0] <=> $score[1]);
//        $result += $score[0] <=> $score[1];
//    }
//
//    if ($result > 0) {
//        return 'canada';
//    } elseif ($result < 0) {
//        return 'ussr';
//    }
//
//    return null;
//}
//// END