<?php

/**
 * Factorial Challenge
 *
 * This function ingests a positive integer and returns 
 * the factorial of the given number.
 */

function factorial($n) {
	// Confirm we have a positive number greater than zero
	if (!is_numeric($n) || $n <= 0) {
		return;
	}

	// Loop through n and multiply our number
	$number = 1;
	for ($n; $n > 1; $n--) {
		$number = $number * $n;
	}

	// Return the number
	return $number;
}