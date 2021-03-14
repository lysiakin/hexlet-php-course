<?php

function makeCensored(string $sentence, array $stopList): string
{
    $wordsArray = explode(' ', $sentence);
    $updatedSentence = [];

    foreach ($wordsArray as $word) {
        foreach ($stopList as $stopWord) {
            $word = ($word === $stopWord) ? $word = '$#%!' : $word;
        }
        $updatedSentence[] = $word;
    }

    return implode (' ', $updatedSentence);
}

//function makeCensored(string $sentence, array $stopList): string
//{
//    return str_replace($stopList, '$#%!',$sentence);
//}

$sentence = 'When you play the game of thrones, you win or you die';
echo makeCensored($sentence, ['die', 'play']);
// => When you $#%! the game of thrones, you win or you $#%!

$sentence2 = 'chicken chicken? chicken! chicken';
echo makeCensored($sentence2, ['?', 'chicken']);
// => '$#%! chicken? chicken! $#%!';

//// BEGIN
//function makeCensored(string $text, array $stopWords)
//{
//    $words = explode(' ', $text);
//    $result = [];
//    foreach ($words as $word) {
//        $result[] = in_array($word, $stopWords) ? '$#%!' : $word;
//    }
//
//    return implode(' ', $result);
//}
//// END