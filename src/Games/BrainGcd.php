<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Engine\processData;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

function playGame()
{
    $gameCondition = 'Find the greatest common divisor of given numbers.';
    $data = [];
    $counter = 0;

    while ($counter < NUMBER_OF_ROUNDS) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);

        $question = "Question: $firstNumber $secondNumber";

        $correctAnswer = findGcdNumber($firstNumber, $secondNumber);

        $data[$counter] = [
            "question" => $question,
            "correctAnswer" => $correctAnswer
        ];

        $counter++;
    }

    processData($data, $gameCondition);
}

function findGcdNumber(int $firstNumber, int $secondNumber)
{
    $modulo = $firstNumber % $secondNumber;

    while ($modulo > 0) {
        $temp = $modulo;
        $modulo = $secondNumber % $modulo;
        $secondNumber = $temp;
    }

    $correctAnswer = $secondNumber;

    return $correctAnswer;
}
