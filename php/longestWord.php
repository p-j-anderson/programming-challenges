<?php

/**
 * Longest Word Challenge
 *
 * This function returns the longest word from the
 * provided sentence, ingoring everything except
 * alpha characters.
 */

function longestWord($s) {
    // Remove any non-alpha characters excluding spaces
    $s = preg_replace('/[^A-z ]/', '', $s);

    // Convert the sentence into an array
    $sArray = explode(' ', $s);
    echo "\n" . print_r($sArray) . "\n\n";

    // Find the longest word
    $longestWord = '';
    for ($i = 0; $i < count($sArray); $i++) {
        if (strlen($sArray[$i]) > strlen($longestWord)) {
            $longestWord = $sArray[$i];
        }
    }

    // Return the longest word
    return $longestWord;
}