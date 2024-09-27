<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\processData;

function playGame()
{
    $gameCondition = "What number is missing in the progression?";
    $data = [];
    $counter = 0;

    while ($counter < NUMBER_OF_ROUNDS) {
        $progression = [];

        $size = rand(5, 10);
        $start = rand(0, 100);
        $step = rand(1, 100);
        $hiddenIndex = rand(0, $size - 1);
        $progression[] = $start;

        for ($i = 0; $i < $size - 1; $i++) {
            $progression[] = $progression[$i] + $step;
        }

        $correctAnswer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = "..";
        $progressionString = implode(" ", $progression);

        $question = "Question: $progressionString";

        $data[$counter] = [
            "question" => $question,
            "correctAnswer" => $correctAnswer
        ];

        $counter++;
    }

    processData($data, $gameCondition);
}
