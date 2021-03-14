<?php

function buildDefinitionList(array $list): string
{
    if (empty($list)) {
        return '';
    }

    $parts = [];

    foreach ($list as $item) {
        $parts[] = "<dt>{$item[0]}</dt><dd>$item[1]</dd>";
    }

    $innerValue = implode('', $parts);

    return "<dl>{$innerValue}</dl>";
}

$definitions = [
    ['Блямба', 'Выпуклость, утолщения на поверхности чего-либо'],
    ['Бобр', 'Животное из отряда грызунов'],
];

buildDefinitionList($definitions);
// => '<dl><dt>Блямба</dt><dd>Выпуклость, утолщение на поверхности чего-либо</dd><dt>Бобр</dt><dd>Животное из отряда грызунов</dd></dl>';

