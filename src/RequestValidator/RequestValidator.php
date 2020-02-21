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

    public function getElement(): string
    {
        if (self::isValidated() === false) {
            throw new \Exception('%s: data is not valid `%s`', __CLASS__, $this->formData);
        }

        return $this->formData['element'];
    }

    public function isValidated(): bool
    {
        if (isset($this->formData['element']) && !Game::isValidElement($this->formData['element'])) {
            return false;
        }

        return true;
    }
}
