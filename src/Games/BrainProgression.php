<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Cli\greetUser;
use function BrainGames\Engine\finishGame;
use function BrainGames\Engine\getUserAnswer;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\printGameCondition;
use function BrainGames\Engine\printQuestion;

function brainProgression()
{
    $userName = greetUser();

    printGameCondition("What number is missing in the progression?");

    $counter = 0;
    while ($counter < 3) {
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
        printQuestion($question);

        $userAnswer = getUserAnswer();

        if (isCorrectAnswer($correctAnswer, $userAnswer, $userName)) {
            $counter++;
        } else {
            break;
        }

        finishGame($userName, $counter);
    }
}
