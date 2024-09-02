<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function cli\prompt;

function brainPrime()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");

    $i = 0;
    while ($i < 3) {
        $number = rand(1, 100);
        $counter = 0;

        for ($y = 2; $y <= $number; $y++) {
            if ($number % $y == 0) {
                $counter++;
            }
        }

        if ($counter == 1) {
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }

        line('Question: %s', $number);

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
