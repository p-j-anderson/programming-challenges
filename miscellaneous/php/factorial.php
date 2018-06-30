<?php

/**
 * Factorial Challenge
 *
 * This function ingests a positive integer and returns 
 * the factorial of the given number.
 */

function factorial($num) {
    // Confirm we have a positive number greater than zero
    if (!is_numeric($num) || $num <= 0) {
        return;
    }

    // Loop through n and multiply our number
    $number = 1;
    for ($num; $num > 1; $num--) {
        $number = $number * $num;
    }

    // Return the number
    return $number;
}