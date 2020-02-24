<?php

namespace RPS;

class Paper implements Element
{
    /** @var Element[] */
    private $weaknesses;

    private function __construct()
    {
        $this->weaknesses = [
            Game::SCISSORS,
        ];
    }

    public function getId(): string
    {
        return GAME::PAPER;
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
