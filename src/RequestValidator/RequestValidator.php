<?php

namespace RPS;

require_once './Game/Game.php';

class RequestValidator
{
    /** @var array */
    private $formData;

    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }

    public function isValidated(): bool
    {
        foreach ($this->formData as $key => $value) {
            if ($key === 'element' && Game::isValidElement($value)) {
                return true;
            }
        }

        return false;
    }
}
