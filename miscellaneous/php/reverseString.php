<?php

/**
 * Reverse String Challenge
 *
 * This function returns an inverse of the provided string.
 */

function reverseString($str) {

    // Initialize variables
    $reverseString = '';
    $length = strlen($str);

    // Loop through length to append string values
    for ($length; $length > 0; $length--) {
        $reverseString .= substr($str, $length -1, 1);
    }

    // Return the reverse string
    return $reverseString;
}