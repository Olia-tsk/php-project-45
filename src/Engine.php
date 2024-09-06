<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function printGameCondition($gameCondition)
{
    return line("%s", $gameCondition);
}

function getUserAnswer()
{
    return prompt("Your answer");
}

function isCorrectAnswer($correctAnswer, $userAnswer, $userName)
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

function finishGame($userName, $counter)
{
    if ($counter == 3) {
        line("Congratulations, %s!", $userName);
    }
}
