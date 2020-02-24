<?php

namespace RPS;

require_once './Game/Game.php';
require_once './Element/Element.php';
require_once './Element/Paper.php';
require_once './Element/Rock.php';
require_once './Element/Scissors.php';

class ElementFactory
{
    /** @var string */
    private $element;

    private function __construct(string $element)
    {
        $this->element = $element;
    }

    public static function create(?string $element = null): self
    {
        if (null === $element) {
            $elements = [
                Game::PAPER,
                Game::ROCK,
                Game::SCISSORS,
            ];

            $element = $elements[array_rand($elements, 1)];
        }

        if (!Game::isValidElement($element)) {
            throw new \Exception(sprintf('%s: invalid element `%s`', __CLASS__, $element));
        }

        return new self($element);
    }

    public function build(): Element
    {
        switch ($this->element) {
            case Game::ROCK:
                return Rock::create();
            case Game::PAPER:
                return Paper::create();
            case Game::SCISSORS:
                return Scissors::create();
            default:
                throw new \Exception(sprintf('%s: invalid element `%s`', __CLASS__, $this->element));
        }
    }
}
