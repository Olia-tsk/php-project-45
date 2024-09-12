<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function printGameCondition(string $gameCondition)
{
    return line("%s", $gameCondition);
}

function printQuestion(string $question)
{
    line($question);
}

function getUserAnswer()
{
    return prompt("Your answer");
}

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

function findPrimeNumber($number)
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

function finishGame(string $userName, int $counter)
{
    if ($counter == 3) {
        line("Congratulations, %s!", $userName);
    }
}
