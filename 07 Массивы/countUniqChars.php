<?php

function countUniqChars(string $string): int
{
    if (strlen($string) < 1) {
        return 0;
    }
    
    return count(array_unique(str_split($string)));
}

//$text1 = 'yyab';
//echo countUniqChars($text1); // 3
//
//$text2 = 'You know nothing Jon Snow';
//echo countUniqChars($text2); // 13
//
$text3 = '';
echo countUniqChars($text3); // 0

$text4 = '0';
echo countUniqChars($text4);

/*// BEGIN
function countUniqChars($text)
{
    $uniqChars = [];
    for ($i = 0; $i < strlen($text); $i++) {
        if (!in_array($text[$i], $uniqChars)) {
            $uniqChars[] = $text[$i];
        }
    }
    return count($uniqChars);
}
// END*/