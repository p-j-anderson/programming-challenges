<?php
/**
 * Letter Capitalize Challenge
 *
 * This function adjusts the first letter of every word
 * in the provided string to a capital letter and sets
 * the remainder of each word to lower case.
 */
function letterCapitalize($str) {
    // Initialize variables
    $sArray = explode(' ', $str);
    $newString = '';

    // Loop through our array pieces
    for ($i = 0; $i < count($sArray); $i++) {

        // Capitalize the first letter of the string
        $newString .= strtoupper(substr($sArray[$i], 0, 1));

        // Lower the rest of the string
        $newString .= strtolower(substr($sArray[$i], 1, strlen($sArray[$i])));

        // Include a space
        $newString .= ' ';
    }

    // Return the adjusted string
    return $newString;
}