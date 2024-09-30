<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\processData;

function playGame()
{
    $gameCondition = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $data = [];
    $counter = 0;

    while ($counter < NUMBER_OF_ROUNDS) {
        $randNumber = rand(0, 100);

        $question = "Question: $randNumber";

        ($randNumber % 2 == 0) ? $correctAnswer = "yes" : $correctAnswer = "no";

        $data[$counter] = [
            "question" => $question,
            "correctAnswer" => $correctAnswer
        ];

        $counter++;
    }

    processData($data, $gameCondition);
}
