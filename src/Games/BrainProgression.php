<?php

namespace BrainGames\Games\BrainProgression;

use function cli\line;
use function cli\prompt;

function brainProgression()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line("What number is missing in the progression?");

    $i = 0;
    while ($i < 3) {
        $progression = [];

        $size = rand(5, 10);
        $start = rand(0, 100);
        $step = rand(1, 100);
        $hiddenIndex = rand(0, $size - 1);
        $progression[] = $start;

        for ($y = 0; $y < $size - 1; $y++) {
            $progression[] = $progression[$y] + $step;
        }

        $correctAnswer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = "..";
        $progressionString = implode(" ", $progression);

        line('Question: %s', $progressionString);
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
