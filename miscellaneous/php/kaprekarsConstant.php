<?php
/**
 * Kaprekars Constant Challenge
 *
 * This function ingests a 4-digit number with at least 
 * two unqiue values and counts the number of attempts to
 * reach Kaprekars Constant of 6174.
 *
 * Kaprekars Constant can be found by ordering the
 * the collection of numbers in ascending/descending
 * order, subtracting the descending number from the 
 * ascending number, and repeating until 6174 is reached.
 */
function kaprekarsConstant($num) {
	// Confirm the number meets criteria
	if (!(strlen($num) === 4) || !(is_numeric($num))) {
		return;
	}

	// Confirm we have at least two unique numbers
	for ($i = 0; $i < 4; $i++) {
		$numsArray[] = substr($num, $i, 1);
	}
	if (count(array_unique($numsArray)) < 2) {
		return;
	}

	// Initialize variables
	$count = 0;
	$result = $num;

	// Continue to loop until we hit our result of 6174
	for ($i = 0; $i < 8 && $result != 6174; $i++) {
		// Reset our loop variables
		$asc = '';
		$desc = '';
		$ascArray = array();
		$descArray = array();

		// Sort our recent result
		for ($j = 0; $j < strlen($result); $j++) {
			$ascArray[] = substr($result, $j, 1);
			$descArray[] = substr($result, $j, 1);
		}

		// Sort and convert to numbers
		sort($ascArray);
		rsort($descArray);
		for ($j = 0; $j < 4; $j++) {
			$asc .= $ascArray[$j];
			$desc .= $descArray[$j];
		}

		// Find our result and check if leading zeroes should be added
		$result = $desc - $asc;
		$check = 4 - strlen($result);

		// Add zeroes accordingly
		if ($check != 0) {
			$addZero = '';
			for ($check; $check > 0; $check--) {
				$addZero .= '0';
			}
			$result = $addZero . $result;
		}

		// Increment the count
		$count++;
	}

    // Return the count
    return $count;
}