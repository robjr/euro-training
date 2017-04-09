<?php
/**
 * Balanced Brackets Problem
 *
 * PHP version 5
 *
 * @package stacks
 * @see problem.pdf
 * @see https://www.hackerrank.com/challenges/ctci-balanced-brackets Balanced Brackets Problem
 */

$handle = fopen("testcases/input/input18.txt", "r");
fscanf($handle,"%d",$t);

for ($a0 = 0; $a0 < $t; $a0++){
    fscanf($handle,"%s",$expression);

    if (isBalanced($expression)) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }
}

function isBalanced($expression)
{
    $brackets = str_split($expression);

    $stack = array();

    foreach ($brackets as $bracket) {

        if (preg_match('/{|\[|\(/', $bracket)) {
            array_push($stack, $bracket);
            continue;
        }

        $stackBracket = array_pop($stack);

        if (!isBracketOpenClosed($stackBracket, $bracket)) {
            return false;
        }
    }

    if (empty($stack)) {
        return true;
    }

    return false;
}

function isBracketOpenClosed($openBracket, $closeBracket)
{
    if ($openBracket == '(' && $closeBracket == ')') {
        return true;
    }

    if ($openBracket == '[' && $closeBracket == ']') {
        return true;
    }

    if ($openBracket == '{' && $closeBracket == '}') {
        return true;
    }
    return false;
}