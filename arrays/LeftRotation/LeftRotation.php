<?php
/**
 * Left Rotation Problem
 *
 * A left rotation operation on an array of size n
 * shifts each of the array's elements unit to the left.
 *
 * Sample Input
 *               5 4
 *               1 2 3 4 5
 * Sample Output
 *               5 1 2 3 4
 *
 * PHP version 5
 *
 * @package arrays
 * @see array-left-rotation-problem.pdf
 * @see https://www.hackerrank.com/challenges/ctci-array-left-rotation Left Rotation Problem
 */

$handle = fopen("php://stdin", "r");

// Get the number of integers and the number of left rotations
// that must be performed
fscanf($handle, "%d %d", $arraySize, $kLeftOperations);

// Get the integers
$dirtyArrayValues = fgets($handle);
$arrayValues = trim($dirtyArrayValues);
$array = explode(" ", $arrayValues);

// Do left operations
for ($i = 0; $i < $arraySize; $i++) {
    $current = ($kLeftOperations + $i) % $arraySize;
    echo $array[$current] . " ";
}

