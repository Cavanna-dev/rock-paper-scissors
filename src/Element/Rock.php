<?php

namespace RPS;

final class Rock implements Element
{
    /** @var Element[] */
    private $weaknesses;

    private function __construct()
    {
        $this->weaknesses = [
            Paper::create(),
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
