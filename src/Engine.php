<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\greetUser;
use function cli\line;
use function cli\prompt;

define("NUMBER_OF_ROUNDS", 3);

function isCorrectAnswer(mixed $correctAnswer, mixed $userAnswer, string $userName)
{
    if ($userAnswer == $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line('"%s" is wrong answer ;( Correct answer was "%s".', $userAnswer, $correctAnswer);
        line("Let's try again, %s!", $userName);
        return false;
    }
}

function findPrimeNumber(int $number)
{
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

    return $correctAnswer;
}

function findGcdNumber(int $x, int $y)
{
    $r = $x % $y;

    while ($r > 0) {
        $temp = $r;
        $r = $y % $r;
        $y = $temp;
    }

    $correctAnswer = $y;

    return $correctAnswer;
}

function processData(array $data, string $gameCondition)
{
    $userName = greetUser();

    line("%s", $gameCondition);

    foreach ($data as $gameRound) {
        line($gameRound['question']);

        $userAnswer = prompt("Your answer");
        $correctAnswer = $gameRound['correctAnswer'];

        if (!isCorrectAnswer($correctAnswer, $userAnswer, $userName)) {
            return;
        }
    }

    line("Congratulations, %s!", $userName);
}
