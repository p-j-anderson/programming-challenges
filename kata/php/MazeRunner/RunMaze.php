<?php
require_once 'src/MazeUtilities.php';
//require_once 'MazeRunner.php';

$maze = MazeUtilities::generateDynamicMaze(10);
echo "\nHere is your maze\n";
foreach ($maze as $row) {
    echo implode(' ', $row) . "\n";
}
