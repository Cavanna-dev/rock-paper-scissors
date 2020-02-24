<?php

namespace RPS;

interface Element
{
    public function getId(): string;
    public function isWeakTo(Element $element): bool;
}
