<?php
require_once 'GameUtilities.php';
use PHPUnit\Framework\TestCase;

/**
 * @group gameUtilities
 */
class GameUtilitiesTest extends TestCase {
    function testGenerateGameBoardReturnsExpectedSize() {
        $board = GameUtilities::generateGameBoard(25);
        $this->assertEquals(25, count($board));
    }

    function testGenerateGameBoardReturnsFive() {
        $board = GameUtilities::generateGameBoard(5);
        $this->assertEquals(5, count($board));
    }

    function testGenerateGameBoardReturnsFifty() {
        $board = GameUtilities::generateGameBoard(50);
        $this->assertEquals(50, count($board));
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Board too small
     */
    function testGenerateGameBardLessThanFiveThrowsException() {
        GameUtilities::generateGameBoard(4);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Board too large
     */
    function testGenerateGameBardGreaterThanFiftyThrowsException() {
        GameUtilities::generateGameBoard(51);
    }
}
