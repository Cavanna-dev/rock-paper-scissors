<?php

namespace RPS;

class Game
{
    private const ROCK = 'rock';

    private const PAPER = 'paper';

    private const SCISSORS = 'scissors';

    private const VALID_ELEMENTS = [
        self::ROCK,
        self::PAPER,
        self::SCISSORS,
    ];

    /** @var array */
    private $players;

    public static function isValidElement(string $element): bool
    {
        if (!in_array($element, self::VALID_ELEMENTS)) {
            return false;
        }

        return true;
    }
}
