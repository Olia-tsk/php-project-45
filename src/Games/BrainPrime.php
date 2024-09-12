<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Cli\greetUser;
use function BrainGames\Engine\finishGame;
use function BrainGames\Engine\getUserAnswer;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\printGameCondition;
use function BrainGames\Engine\printQuestion;

function playGame()
{
    $userName = greetUser();

    printGameCondition("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");

    $counter = 0;
    while ($counter < 3) {
        $number = rand(1, 100);
        $divisionCount = 0;

        for ($i = 2; $i <= $number; $i++) {
            if ($number % $i == 0) {
                $divisionCount++;
            }
        }

        if ($divisionCount == 1) {
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }

        $question = "Question: $number";
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
