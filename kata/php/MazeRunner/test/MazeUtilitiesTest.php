<?php
require_once 'MazeUtilities.php';
use PHPUnit\Framework\TestCase;

/**
 * @group mazeUtilities
 */
class MazeUtilitiesTest extends TestCase {
    function testGenerateStandardMazeReturnsMaze() {
        $result = MazeUtilities::generateStandardMaze();
        $expected = [[1,1,1,1,1,1,1],
                 [1,0,0,0,0,0,3],
                 [1,0,1,0,1,0,1],
                 [0,0,1,0,0,0,1],
                 [1,0,1,0,1,0,1],
                 [1,0,0,0,0,0,1],
                 [1,2,1,0,1,0,1]];
        $this->assertEquals($expected, $result);
    }

    function testGenerateRandomMazeTenByTen() {
        $result = MazeUtilities::generateDynamicMaze(10);
        $this->assertEquals(10, count($result));
    }

    function testGenerateRandomMazeHasOneStartAndEndPoint() {
        $result = MazeUtilities::generateDynamicMaze(5);
        $startCount = 0;
        $endCount = 0;
        for ($i = 0; $i < 5; $i++) {
            foreach ($result[$i] as $value) {
                if ($value === 2) {
                    $startCount++;
                }
                if ($value === 3) {
                    $endCount++;
                }
            }
        }
        $this->assertEquals(1, $startCount);
        $this->assertEquals(1, $endCount);
    }

    function testGenerateRandomDirectionsReturnsRequestedAmount() {
        $result = MazeUtilities::generateRandomDirections(10);
        $this->assertEquals(10, count($result));
    }
}
