<?php
/**
 * Alphabet Soup Challenge
 *
 * This function ingests an alphabetic string and returns
 * the letters in alphabetical order.
 */
function alphabetSoup($str) {
    // Initialize variables
    $strArray = array();
    $newString = '';

    // Remove any non-alphabetic characters
    $str = preg_replace('/[^A-z]/', '', $str);

    // Add each letter to the array
    for ($i = 0; $i < strlen($str); $i++) {
        $strArray[] = substr($str, $i, 1);
    }

    // Sort the array contents
    sort($strArray);

    // Convert to a string
    for ($i = 0; $i < count($strArray); $i++) {
        $newString .= $strArray[$i];
    }

    // Return the adjusted string
    return $newString;
}