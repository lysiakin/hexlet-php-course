<?php

function stdin_stream()
{
    while ($line = fgets(STDIN)) {
        yield $line;
    }
}

function isCharacterRepeats($text, $numberOfRepeats)
{
    $array = str_split($text);
    $numberOfCharacters = array_count_values($array);

    return in_array($numberOfRepeats, $numberOfCharacters);
}

foreach (stdin_stream() as $line) {
    if (isCharacterRepeats($line, 2)) {
        echo "repeated string: $line";
    }
}
