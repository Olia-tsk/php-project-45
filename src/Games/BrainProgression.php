<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\processData;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

function playGame()
{
    $gameCondition = "What number is missing in the progression?";
    $data = [];
    $counter = 0;

    while ($counter < NUMBER_OF_ROUNDS) {
        $progression = [];

        $size = rand(5, 10) - 1;
        $start = rand(0, 100);
        $step = rand(1, 100);
        $hiddenIndex = rand(0, $size);
        $progression[] = $start;

        for ($i = 0; $i < $size; $i++) {
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
