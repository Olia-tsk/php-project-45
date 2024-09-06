<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Cli\greetUser;
use function BrainGames\Engine\finishGame;
use function BrainGames\Engine\getUserAnswer;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\printGameCondition;
use function cli\line;

function brainEven()
{
    $userName = greetUser();

    printGameCondition("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    $counter = 0;
    while ($counter < 3) {
        $randNumber = rand(0, 100);
        if ($randNumber % 2 == 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }

        line('Question: %s', $randNumber);

        $userAnswer = getUserAnswer();

        if (isCorrectAnswer($correctAnswer, $userAnswer, $userName)) {
            $counter++;
        } else {
            break;
        }

        finishGame($userName, $counter);
    }
}
