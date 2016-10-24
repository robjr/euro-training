<?php
/**
 * Maximum Element Problem
 *
 * PHP version 5
 *
 * @package strings
 * @see making-anagrams-problem.pdf
 * @see https://www.hackerrank.com/challenges/maximum-element Maximum Element Problem
 */

$_fp = fopen("testcases/input/input00.txt", "r");

$nEntries = (int)fgets($_fp);

$stack = array();
$stackOfMax = array();

while ($nEntries--) {
    $entry = fgets($_fp);

    list($type, $number) = sscanf($entry, "%d %d");

    switch ($type) {
        case 1:
            array_push($stack, $number);
            end($stackOfMax) <= $number ? array_push($stackOfMax, $number) : "";
            break;
        case 2:
            $number = array_pop($stack);
            $number == end($stackOfMax) ? array_pop($stackOfMax) : "";
            break;
        case 3:
            print(end($stackOfMax) . "\n");
            break;
    }
}
