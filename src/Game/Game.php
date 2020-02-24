<?php

namespace RPS;

class Game
{
    public const ROCK = 'rock';

    public const PAPER = 'paper';

    public const SCISSORS = 'scissors';

    public const VICTORY = 1;
    public const DRAW = 0;
    public const LOSE = -1;

    private const VALID_ELEMENTS = [
        self::ROCK,
        self::PAPER,
        self::SCISSORS,
    ];

    /** @var Player */
    private $playerOne;

    /** @var Player */
    private $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public static function isValidElement(string $element): bool
    {
        if (!in_array($element, self::VALID_ELEMENTS, true)) {
            return false;
        }

        return true;
    }

    /**
     * -1 represents 'LOSE'
     * 0  represents 'DRAW'
     * 1  represents 'WIN'
     */
    public function resultFight(): int
    {
        if ($this->playerOne->getElement()->getId() === $this->playerTwo->getElement()->getId()) {
            return self::DRAW;
        }

        if ($this->playerOne->getElement()->isWeakTo($this->playerTwo->getElement())) {
            return self::LOSE;
        }

        return self::VICTORY;
    }
}
