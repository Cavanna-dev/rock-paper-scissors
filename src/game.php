<?php

namespace RPS;

require_once 'RequestValidator/RequestValidator.php';
require_once 'Game/Game.php';

$validator = new RequestValidator($_POST);

if (!$validator->isValidated()) {
    ob_start();
    header('Location: http://dev.rps:8080/error.html', true, 404);
    exit;
}

$game = new Game()
