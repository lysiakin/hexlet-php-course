<?php

require __DIR__.'/../../vendor/autoload.php';

use OODesign\Collect\DeckOfCards;

$deck = new DeckOfCards([2, 3]);
$fd = $deck->getShuffled();
sort($fd); // [2, 3, 3, 3, 2, 3, 2, 2]
print_r($fd);
$deck->getShuffled(); // [3, 3, 2, 2, 2, 3, 3, 2]
