<?php

namespace BrainGames\Games\BrainCalc;

use function cli\line;
use function cli\prompt;

function brainCalc()
{

    $operations = ['+', '-', '*'];

    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line("What is the result of the expression?");

    $i = 0;
    while ($i < 3) {
        $x = rand(0, 50);
        $y = rand(0, 50);
        $operation = $operations[array_rand($operations, 1)];

        line('Question: %s %s %s', $x, $operation, $y);

        switch ($operation) {
            case "+":
                $correctAnswer = $x + $y;
                break;
            case "-":
                $correctAnswer = $x - $y;
                break;
            case "*":
                $correctAnswer = $x * $y;
        }

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
