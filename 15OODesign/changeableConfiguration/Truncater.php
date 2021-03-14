<?php

namespace OODesign\changeableConfiguration;


class Truncater
{
    public const OPTIONS = [
        'separator' => '...',
        'length' => 200,
    ];

    private array $options;

    // BEGIN (write your solution here)
    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function truncate(string $string, array $options = []): string
    {
            $currentOptions = array_merge($this->getOptions(), $options);

            if (mb_strlen($string) <= $currentOptions['length']) {
                return $string;
            }
            $substr = substr($string, 0, $currentOptions['length']);

            return "{$substr}{$currentOptions['separator']}";
    }
    // END
}