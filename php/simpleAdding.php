<?php

/**
 * Simeple Adding Challenge
 *
 * This function ingests a positive integer and returns 
 * the sum of 1 to the given number.
 */

function simpleAdding($num) {
    // Confirm we have a positive number greater than zero
    if (!is_numeric($num) || $num <= 0) {
        return;
    }

    // Loop through n and multiply our number
    $number = 0;
    for ($num; $num > 0; $num--) {
        $number = $number + $num;
    }

    // Return the number
    return $number;
}