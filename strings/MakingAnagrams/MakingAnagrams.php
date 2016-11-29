<?php
/**
 * Making Anagrams Problem
 *
 * Given two strings, A and B, that may or may not be of the same length,
 * determine the minimum number of character deletions required to make A and B
 * anagrams. Any characters can be deleted from either of the strings.
 *
 * Sample Input
 *               cde
 *               abc
 * Sample Output
 *               4
 *
 * PHP version 5
 *
 * @package string
 * @see making-anagrams-problem.pdf
 * @see https://www.hackerrank.com/challenges/making-anagrams
 */

$handle = fopen("php://stdin","r");

fscanf($handle, "%s", $string1);
fscanf($handle, "%s", $string2);

$deletions = 0;
$v1 = getArrayOfFrequency($string1);
$v2 = getArrayOfFrequency($string2);

// Common letters
foreach ($v1 as $letter => $freq) {
    //Common letter
    if (isset($v2[$letter])) {
        $deletions += abs($v1[$letter] - $v2[$letter]);
        unset($v1[$letter]);
        unset($v2[$letter]);
    }
}

$uncommonLetter = array_merge($v1, $v2);

// Uncommon letters
foreach ($uncommonLetter as $letter => $value) {
    $deletions += $value;
}

echo $deletions . "\n";

/**
 * Returns an array in which the keys are letters and the values are
 * integers that represent the frequency of that letter in the given string.
 */
function getArrayOfFrequency($string)
{
    $letters = str_split($string);
    $arrayOfFrequency = array();

    foreach ($letters as $letter) {
        if (!isset($arrayOfFrequency[$letter])) {
            $arrayOfFrequency[$letter] = 0;
        }
        $arrayOfFrequency[$letter]++;
    }

    return $arrayOfFrequency;
}
