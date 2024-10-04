<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\greetUser;
use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function processData(array $data, string $gameCondition)
{
    $userName = greetUser();

    line($gameCondition);

    foreach ($data as $gameRound) {
        line($gameRound['question']);

        $userAnswer = prompt('Your answer');
        $correctAnswer = $gameRound['correctAnswer'];

        if ($userAnswer != $correctAnswer) {
            line('"%s" is wrong answer ;( Correct answer was "%s".', $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $userName);
}
