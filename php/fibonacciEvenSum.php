<?php
/**
 * Fibonacci Even Sum Challenge
 *
 * This function ingests an integer and sums all
 * of the even fibonacci numbers up to the provided
 * integer.
 */
function fibonacciEvenSum($num) {

    // Initialize variables
    $sum = 0;
    $upper = 1;
    $lower = 0;
    $fibNumber = 0;

    // Loop until we hit the provided number
    for ($upper; $upper < $num;) {

        // Update our variables
        $fibNumber = $upper + $lower;
        $lower = $upper;
        $upper = $fibNumber;

        // Add to the sum if it's an even number
        if ($fibNumber % 2 === 0) {
            $sum += $fibNumber;
        }
    }

    // Return the sum
    return $sum;
}