<?php

class GameUtilities {
    public static function generateGameBoard($size) {
        // Confirm the board is not too small
        if ($size < 5) {
            throw new exception('Board too small');
        }

        // Confirm the board is not too large
        if ($size > 50) {
            throw new exception('Board too large');
        }

        // Generate the game board
        $board = [];
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $board[$i][$j] = rand(0, 1);
            }
        }
        return $board;
    }
}
