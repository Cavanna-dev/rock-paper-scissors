<?php

namespace RPS;

class Scissors implements Element
{
    /** @var Element[] */
    private $weaknesses;

    private function __construct()
    {
        $this->weaknesses = [
            Game::ROCK,
        ];
    }

    public function getId(): string
    {
        return GAME::SCISSORS;
    }

    public static function create(): self
    {
        return new self();
    }

    public function isWeakTo(Element $element): bool
    {
        if (in_array($element->getId(), $this->weaknesses)) {
            return true;
        }

        return false;
    }
}
