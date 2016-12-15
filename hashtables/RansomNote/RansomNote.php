<?php
/**
 * Ransom Note Problem
 *
 * A kidnapper wrote a ransom note but is worried it will be traced back to him.
 * He found a magazine and wants to know if he can cut out whole words from it
 * and use them to create an untraceable replica of his ransom note.
 * The words in his note are case-sensitive and he must use whole words available
 * in the magazine, meaning he cannot use substrings or concatenation to create
 * the words he needs.
 *
 * Given the words in the magazine and the words in the ransom note, print Yes if
 * he can replicate his ransom note exactly using whole words from the magazine;
 * otherwise, print No.
 *
 * PHP version 5
 *
 * @package hashtables
 * @see ctci-ransom-note-English.pdf
 * @see https://www.hackerrank.com/challenges/ctci-ransom-note Ransom Note Problem
 */

$handle = fopen("php://stdin", "r");

// I opted to not use these vars to solve the problem.
// However, I still need to get them as they are required by the problem.
fscanf($handle, "%d %d", $m, $n);

$magazineText = trim(fgets($handle));
$ransomText = trim(fgets($handle));

$magazineHash = stringToHashTable($magazineText);
$ransomHash = stringToHashTable($ransomText);

foreach ($ransomHash as $word => $freq) {
    while ($freq-- > 0) {
        if (@$magazineHash[$word]-- < 1) {
            echo "No\n";
            return ;
        }
    }
}
echo "Yes\n";

function stringToHashTable($string)
{
    $hashTable = array();
    $words = explode(" ", $string);

    foreach ($words as $word) {
        if (!isset($hashTable[$word])) {
            $hashTable[$word] = 0;
        }

        $hashTable[$word]++;
    }

    return $hashTable;
}

