<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Engine\findGcdNumber;
use function BrainGames\Engine\processData;

function playGame()
{
    $gameCondition = "Find the greatest common divisor of given numbers.";
    $data = [];
    $counter = 0;

    while ($counter < NUMBER_OF_ROUNDS) {
        $x = rand(1, 100);
        $y = rand(1, 100);

        $question = "Question: $x $y";

        $correctAnswer = findGcdNumber($x, $y);

        $data[$counter] = [
            "question" => $question,
            "correctAnswer" => $correctAnswer
        ];

        $counter++;
    }

    processData($data, $gameCondition);
}
