<?php

namespace RPS;

class Scissors implements Element
{
    /** @var Element[] */
    private $weaknesses;

    private function __construct()
    {
        $this->weaknesses = [
            Rock::create(),
        ];
    }

    public static function create(): self
    {
        return new self();
    }

    public function isWeakTo(Element $element): bool
    {
        if (in_array($element, $this->weaknesses)) {
            return true;
        }

        return false;
    }
}
