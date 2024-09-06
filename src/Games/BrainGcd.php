<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Cli\greetUser;
use function BrainGames\Engine\finishGame;
use function BrainGames\Engine\getUserAnswer;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\printGameCondition;
use function cli\line;

function brainGcd()
{
    $userName = greetUser();

    printGameCondition("Find the greatest common divisor of given numbers.");

    $counter = 0;
    while ($counter < 3) {
        $x = rand(0, 100);
        $y = rand(0, 100);

        $r = $x % $y;

        while ($r > 0) {
            $temp = $r;
            $r = $y % $r;
            $y = $temp;
        }

        $correctAnswer = $y;

        line('Question: %s %s', $x, $y);

        $userAnswer = getUserAnswer();

        if (isCorrectAnswer($correctAnswer, $userAnswer, $userName)) {
            $counter++;
        } else {
            break;
        }

        finishGame($userName, $counter);
    }
}
