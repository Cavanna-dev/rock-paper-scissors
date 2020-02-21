<?php

namespace RPS;

require_once './Game/Game.php';
require_once './RequestValidator/RequestValidator.php';
require_once './Element/Element.php';
require_once './Element/ElementFactory.php';
require_once './Element/Rock.php';
require_once './Element/Scissors.php';
require_once './Element/Paper.php';

$validator = new RequestValidator($_POST);

if (!$validator->isValidated()) {
    ob_start();
    header('Location: http://dev.rps:8080/error.html', true, 404);
    exit;
}

$element = ElementFactory::create($validator->getElement())->build();
$playerOne = new Player($element);
