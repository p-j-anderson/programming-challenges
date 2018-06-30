<?php
/**
 * Vowel Square Challenge
 *
 * This function ingests a string, converts the values
 * into an array, and attempts to find the first instance
 * of a 2x2 vowelSquare. If found, the coordinates of the
 * top left corner will be returned.
 *
 * For example, an input of '"bqstr", "ymoep", "fxuak"'
 * would return (1, 2).
 *
 * If a square is not found, 'not found' will be returned.
 */
function vowelSquare($strArray) {
    // Remove quotes/spaces and convert to array
    $strArray = preg_replace('/[^a-z,]/', '', $strArray);
    $vowelSquare = explode(',', $strArray);

    // Initialize variables
    $vowels = array('a', 'e', 'i', 'o', 'u');
    $squareFound = false;
    $squarePosition = '';

    // Loop through each row
    for ($i = 0; $i < count($vowelSquare) && $squareFound == false; $i++) {
        $row = $vowelSquare[$i];
        echo "\nrow " . $i;

        // Loop through the characters of each row
        for ($j = 0; $j < strlen($row) && $squareFound == false; $j++) {

            // Check for double vowels
            if ((in_array(substr($row, $j, 1), $vowels)) && (in_array(substr($row, $j + 1, 1), $vowels))) {

                // Check for double vowels in the row below if it exists
                if ($i + 1 < count($vowelSquare)) {
                    $rowBelow = $vowelSquare[$i + 1];

                    // Check for double vowels
                    if ((in_array(substr($rowBelow, $j, 1), $vowels)) && (in_array(substr($rowBelow, $j + 1, 1), $vowels))) {
                        $squareFound = true;
                        $squarePosition = $i . '-' . $j;
                    }
                }
            }
        }
    }

    // Confirm we found a result
    if ($squarePosition == '') {
        $squarePosition = 'not found';
    }
    
    // Return the found coordinates
    return $squarePosition;
}