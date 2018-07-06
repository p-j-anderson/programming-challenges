<?php

class MazeUtilities {
    /**
     * Generates a standard, static maze
     * as defined by the kata description
     */
    static public function generateStandardMaze() {
        $maze = [[1,1,1,1,1,1,1],
                 [1,0,0,0,0,0,3],
                 [1,0,1,0,1,0,1],
                 [0,0,1,0,0,0,1],
                 [1,0,1,0,1,0,1],
                 [1,0,0,0,0,0,1],
                 [1,2,1,0,1,0,1]];
        return $maze;
    }

    /**
     * Generates a dynamic maze with
     * a random path.
     */
    static public function generateDynamicMaze($size) {
        $maze = array();
        // Generate a random maze
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $maze[$i][$j] = rand(0, 1);
            }
        }

        // Generate a random start/end point
        $startX = rand(0, ($size - 1));
        $startY = rand(0, ($size - 1));
        $endX = rand(0, ($size - 1));
        $endY = rand(0, ($size - 1));

        // Confirm the points are not equal
        while ($startX === $endX && $startY === $endY) {
            $endX = rand(0, ($size - 1));
            $endY = rand(0, ($size - 1));
        }

        // Set the start/end points
        $maze[$startX][$startY] = 2;
        $maze[$endX][$endY] = 3;

        // Return the maze
        return $maze;
    }

    /**
     * Generates random directions to be used
     * for navigating a maze
     */
    static public function generateRandomDirections($count) {
        $directions = array();
        $mapping = array(
            0 => 'N',
            1 => 'E',
            2 => 'S',
            3 => 'W'
        );

        // Generate the directions
        for ($i = 0; $i < $count; $i++) {
            $rand = rand(0, 3);
            $directions[] = $mapping[$rand];
        }

        // Return the directions
        return $directions;
    }
}
