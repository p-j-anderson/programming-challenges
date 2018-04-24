<?php
/**
 * Multiples of Three and Five Challenge
 *
 * This function ingests an integer and sums all
 * numbers divisible by three (3) or five (5) which
 * are less than the provided integer. 
 */
function multiplesOfThreeAndFive($num) {

    // Subtract one as we require less than the provided number
    $num = $num - 1;

    // Adjust our numbers based on remainders
    $remainderThree = $num % 3;
    $adjustedThree = $num - $remainderThree;
    $remainderFive = $num % 5;
    $adjustedFive = $num - $remainderFive;

    // Find all numbers divisible by three
    $threeArray = array();
    for ($i = $adjustedThree; $i > 0; $i -= 3) {
        $threeArray[] = $i;
    }

    // Find all numbers divisible by five
    $fiveArray = array();
    for ($i = $adjustedFive; $i > 0; $i -= 5) {
        $fiveArray[] = $i;
    }

    // Sum all the found numbers
    $sum = 0;
    $sumArray = array($threeArray, $fiveArray);
    for ($i = 0; $i < count($sumArray); $i++) {
        for ($j = 0; $j < count($sumArray[$i]); $j++) {
            $sum += $sumArray[$i][$j];
        }
    }

    // Return the sum
    return $sum;
}