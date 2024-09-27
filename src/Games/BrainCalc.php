<?php

namespace BrainGames\Games\BrainCalc;

use Error;

use function BrainGames\Engine\processData;

function playGame()
{
    $gameCondition = "What is the result of the expression?";
    $operations = ['+', '-', '*'];
    $data = [];
    $counter = 0;

    while ($counter < NUMBER_OF_ROUNDS) {
        $x = rand(0, 50);
        $y = rand(0, 50);
        $operation = $operations[array_rand($operations, 1)];

        $correctAnswer = 0;
        $question = "Question: $x $operation $y";

        switch ($operation) {
            case "+":
                $correctAnswer = $x + $y;
                break;
            case "-":
                $correctAnswer = $x - $y;
                break;
            case "*":
                $correctAnswer = $x * $y;
                break;
            default:
                throw new Error("Неизвестная операция");
        }

        $data[$counter] = [
            "question" => $question,
            "correctAnswer" => $correctAnswer
        ];

        $counter++;
    }

    processData($data, $gameCondition);
}
