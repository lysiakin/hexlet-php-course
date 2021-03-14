<?php


namespace OODesign\Collect;


class DeckOfCards
{
    private $cards;

    public function __construct(array $variety)
    {
        $this->cards = collect($variety)
            ->map(fn($card) => array_fill(0, 4, $card))
            ->flatten();
    }
    
    public function getCards()
    {
        return $this->cards;
    }

    public function getShuffled(): array
    {
        return $this->getCards()->shuffle()->all();
    }
}