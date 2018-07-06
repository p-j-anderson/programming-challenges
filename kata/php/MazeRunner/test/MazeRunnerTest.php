<?php
require_once 'MazeUtilities.php';
require_once 'MazeRunner.php';
require_once 'MazePosition.php';
use PHPUnit\Framework\TestCase;

/**
 * @group mazeRunner
 */
class MazeRunnerTest extends TestCase {

    function testProvidedKataStandardMazeResultsSucceed() {
        $standardMaze = MazeUtilities::generateStandardMaze();
        $mazeRunner = new MazeRunner($standardMaze);

        $this->assertEquals("Finish", $mazeRunner->maze_runner(["N","N","N","N","N","E","E","E","E","E"]));
        $this->assertEquals("Finish", $mazeRunner->maze_runner(["N","N","N","N","N","E","E","S","S","E","E","N","N","E"]));
        $this->assertEquals("Finish", $mazeRunner->maze_runner(["N","N","N","N","N","E","E","E","E","E","W","W"]));
        $this->assertEquals("Dead", $mazeRunner->maze_runner(["N","N","N","W","W"]));
        $this->assertEquals("Dead", $mazeRunner->maze_runner(["N","N","N","N","N","E","E","S","S","S","S","S","S"]));
        $this->assertEquals("Lost", $mazeRunner->maze_runner(["N","E","E","E","E"]));
    }

    public function testSetMazePositionsGeneratesStartAndEndPosition() {
        $standardMaze = MazeUtilities::generateStandardMaze();
        $runner = new MazeRunner($standardMaze);
        $runner->setMazePositions();

        $expectedStart = new MazePosition(1, 6);
        $expectedEnd = new MazePosition(6, 1);

        $this->assertEquals($expectedStart->x, $runner->mazeStart->x);
        $this->assertEquals($expectedStart->y, $runner->mazeStart->y);
        $this->assertEquals($expectedEnd->x, $runner->mazeEnd->x);
        $this->assertEquals($expectedEnd->y, $runner->mazeEnd->y);
    }
}
