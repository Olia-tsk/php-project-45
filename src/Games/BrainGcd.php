<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Cli\greetUser;
use function BrainGames\Engine\finishGame;
use function BrainGames\Engine\getUserAnswer;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\printGameCondition;
use function BrainGames\Engine\printQuestion;

function brainGcd()
{
    $userName = greetUser();

    printGameCondition("Find the greatest common divisor of given numbers.");

    $counter = 0;
    while ($counter < 3) {
        $x = rand(1, 100);
        $y = rand(1, 100);

        $r = $x % $y;

        while ($r > 0) {
            $temp = $r;
            $r = $y % $r;
            $y = $temp;
        }

        $correctAnswer = $y;

        $question = "Question: $x $y";
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
