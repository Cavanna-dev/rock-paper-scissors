<?php

namespace RPS;

class Game
{
    public const ROCK = 'rock';

    public const PAPER = 'paper';

    public const SCISSORS = 'scissors';

    private const VALID_ELEMENTS = [
        self::ROCK,
        self::PAPER,
        self::SCISSORS,
    ];

    /** @var array */
    private $players;

    public static function isValidElement(string $element): bool
    {
        if (!in_array($element, self::VALID_ELEMENTS, true)) {die('ko');
            return false;
        }

        return true;
    }
}
