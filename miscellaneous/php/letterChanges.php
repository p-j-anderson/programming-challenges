<?php

/**
 * Letter Changes Challenge
 *
 * This function adjusts characters a-z to the following
 * character in the alphabet, with z becoming a. Any 
 * characters outside a-z are ignored.
 *
 * If the adjusted character is a vowel, it becomes capitalized.
 */

function letterChanges($str) {

    // Initialize variables
    $length = strlen($str);
    $vowels = array('a', 'e', 'i', 'o', 'u');
    $changes = '';

    // Loop the provided string
    for ($i = 0; $i < $length; $i++) {

        // Grab the character code
        $charCode = ord(substr($str, $i, 1));

        // Adjust the character code if needed
        if ($charCode >= 97 && $charCode < 122) {
            $newLetter = chr(ord(substr($str, $i, 1)) + 1);
        } else if ($charCode == 122) {
            $newLetter = chr(97);
        } else {
            $newLetter = chr($charCode);
        }

        // Check for vowels
        if (in_array($newLetter, $vowels)) {
            $newLetter = strtoupper($newLetter);
        }

        // Add the adjusted letter to our string
        $changes .= $newLetter;
    }

    // Return the changed string
    return $changes;
}
