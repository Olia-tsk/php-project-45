<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\processData;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

function playGame()
{
    $gameCondition = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $data = [];
    $counter = 0;

    while ($counter < NUMBER_OF_ROUNDS) {
        $number = rand(1, 100);
        $question = "Question: $number";
        $correctAnswer = findPrimeNumber($number);

        $data[$counter] = [
            "question" => $question,
            "correctAnswer" => $correctAnswer
        ];

        $counter++;
    }

    processData($data, $gameCondition);
}

function findPrimeNumber(int $number)
{
    $divisorsCount = 0;

    for ($i = 2; $i <= $number; $i++) {
        if ($number % $i == 0) {
            $divisorsCount++;
        }
    }

    if ($divisorsCount == 1) {
        $correctAnswer = "yes";
    } else {
        $correctAnswer = "no";
    }

    return $correctAnswer;
}
