<?php

namespace BrainGames\Games\BrainGcd;

use function cli\line;
use function cli\prompt;

function brainGcd()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line("Find the greatest common divisor of given numbers.");

    $i = 0;
    while ($i < 3) {
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
