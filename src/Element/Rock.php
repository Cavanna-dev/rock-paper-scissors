<?php

namespace RPS;

class Rock implements Element
{
    /** @var Element[] */
    private $weaknesses;

    private function __construct()
    {
        $this->weaknesses = [
            Game::PAPER,
        ];
    }

    public function getId(): string
    {
        return GAME::ROCK;
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
