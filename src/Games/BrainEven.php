<?php

namespace BrainGames\Games\BrainEven;

use function cli\line;
use function cli\prompt;

function brainEven()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $i = 0;
    while ($i < 3) {
        $randNumber = rand(0, 100);
        if ($randNumber % 2 == 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }

        line('Question: %s', $randNumber);
        $answer = prompt("Your answer");

        if ($answer == $correctAnswer) {
            line("Correct!");
            $i++;
        } else {
            line('"%s" is wrong answer ;( Correct answer was "%s".', $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }

        if ($i == 3) {
            line("Congratulations, %s!", $name);
        }
    }
}
