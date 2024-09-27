<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\findPrimeNumber;
use function BrainGames\Engine\processData;

function playGame()
{
    $gameCondition = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
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
