<?php
require_once 'Game.php';
use PHPUnit\Framework\TestCase;
/**
 * @group gameTest
 */
class GameTest extends TestCase {
    function testPlayExampleBoard1() {
        $board = [[1,1,0,0,0],
                  [1,1,0,0,0],
                  [1,0,0,0,0],
                  [1,0,0,1,1],
                  [0,0,0,1,1]];
        $game = new Game($board);
        $this->assertEquals(2, $game->play());
    }

    function testPlayExampleBoard2() {
        $board = [[1,0,1,0,1],
                  [1,0,1,0,1],
                  [1,1,1,0,0],
                  [0,0,0,1,1],
                  [0,0,0,1,1]];

        $game = new Game($board);
        $this->assertEquals(3, $game->play());
    }

    function testPlayExampleBoard3() {
        $board = [[1,0,0,0,0],
                  [0,0,1,1,0],
                  [1,0,1,0,1],
                  [1,1,1,1,0],
                  [1,1,1,0,1]];

        $game = new Game($board);
        $this->assertEquals(4, $game->play());
    }

    function testPlayLargeBoardOneTurn() {
        $board = [[1,1,1,1,1,1,1,1,1,1],
                  [0,1,0,1,0,1,0,1,0,1],
                  [0,1,0,1,0,1,0,1,0,1],
                  [0,0,0,0,0,0,0,0,0,1],
                  [1,1,1,1,1,1,1,1,1,1],
                  [1,0,0,0,0,0,0,0,0,0],
                  [1,0,1,0,1,0,0,1,1,1],
                  [1,0,1,0,1,0,0,1,0,1],
                  [1,0,1,0,1,0,0,1,0,1],
                  [1,1,1,1,1,1,1,1,0,1]];

        $game = new Game($board);
        $this->assertEquals(1, $game->play());
    }

}
