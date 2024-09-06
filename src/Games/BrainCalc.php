<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Cli\greetUser;
use function BrainGames\Engine\finishGame;
use function BrainGames\Engine\getUserAnswer;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\printGameCondition;
use function cli\line;

function brainCalc()
{
    $userName = greetUser();

    printGameCondition("What is the result of the expression?");

    $operations = ['+', '-', '*'];

    $counter = 0;
    while ($counter < 3) {
        $x = rand(0, 50);
        $y = rand(0, 50);
        $operation = $operations[array_rand($operations, 1)];

        line('Question: %s %s %s', $x, $operation, $y);

        switch ($operation) {
            case "+":
                $correctAnswer = $x + $y;
                break;
            case "-":
                $correctAnswer = $x - $y;
                break;
            case "*":
                $correctAnswer = $x * $y;
        }

        $userAnswer = getUserAnswer();

        if (isCorrectAnswer($correctAnswer, $userAnswer, $userName)) {
            $counter++;
        } else {
            break;
        }

        finishGame($userName, $counter);
    }
}
