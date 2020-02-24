<?php

namespace RPS;

require_once './Game/Game.php';
require_once './Player/Player.php';
require_once './RequestValidator/RequestValidator.php';
require_once './Element/ElementFactory.php';

$validator = new RequestValidator($_POST);

if (!$validator->isValidated()) {
    ob_start();
    header('Location: http://dev.rps:8080/error.html', true, 404);
    exit;
}

$elementOne = ElementFactory::create($validator->getElement())->build();
$playerOne = new Player($elementOne);

$elementTwo = ElementFactory::create()->build();
$playerTwo = new Player($elementTwo);

$game = new Game($playerOne, $playerTwo);

switch ($game->resultFight()) {
    case Game::DRAW:
        $message = 'It\'s a draaaaw :(';
        $logMessage = sprintf(
            'Player 1 with element `%s` : DRAW against Player 2 with element `%s`',
            $playerOne->getElement()->getId(),
            $playerTwo->getElement()->getId()
        );
        break;
    case Game::VICTORY:
        $message = 'You win !';
        $logMessage = sprintf(
            'Player 1 with element `%s` : WIN against Player 2 with element `%s`',
            $playerOne->getElement()->getId(),
            $playerTwo->getElement()->getId()
        );
        break;
    case Game::LOSE:
        $message = 'You lost. Learn from your mistakes and get better';
        $logMessage = sprintf(
            'Player 1 with element `%s` : LOSE against Player 2 with element `%s`',
            $playerOne->getElement()->getId(),
            $playerTwo->getElement()->getId()
        );
        break;
    default:
        throw new \Exception('Internal problem happened. Contact your element administrator or play later.');
}

http_response_code(200);
echo json_encode([
    'message' => $message,
    'log' => $logMessage,
]);
