<?php

function stdin_stream()
{
    while ($line = fgets(STDIN)) {
        yield $line;
    }
}

function makeObject ()
{
    return [
        'index' => [ ],
        'value' => [ ]
    ];
}

function getIndex ($object)
{
    return $object['index'];
}

function getValue ($object)
{
    return $object['value'];
}

function stringToArray (string $string)
{
    $arrayOfString = explode('=', $string);
    $array['index'] = $arrayOfString[0];
    $array['value'] = $arrayOfString[1];
    print_r($array);

    if (strpos($array['index'], '.') !== false) {
        $array['index'] = explode('.', $arrayOfString[0]);
//            print_r($array);
    }

//    $object = array_flip($array['index']);
//           print_r("VALUE");
//           print_r($array);
//    $object = array_reduce(
//        $array['index'],
//        function ($acc, $child){
//            print_r('CHILD');
//            print_r($child);
//            return $acc[$child] = ;
//        },
//        []);

//    print_r('OBJECT');
//    print_r($object);
}

foreach (stdin_stream() as $line) {
    stringToArray($line);
}
