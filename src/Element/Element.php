<?php

namespace RPS;

interface Element
{
    public function isWeakTo(Element $element): bool;
}
