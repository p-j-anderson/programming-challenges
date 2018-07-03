<?php
/**
 * @group lotteryBalls
 */
require_once 'LotteryBalls.php';
use PHPUnit\Framework\TestCase;

class LotteryBallsTest extends TestCase {
    function testDrawLotteryBallRetrievesIntegerBall() {
        $lottery = new LotteryBalls();
        $result = $lottery->drawLotteryBall();
        $this->assertInternalType('int', $result);
    }

    function testDrawLotteryBallReturnsSixtyBalls() {
        $lottery = new LotteryBalls();
        $resultArray = array();
        for ($i = 0; $i < 60; $i++) {
            $resultArray[] = $lottery->drawLotteryBall();
        }

        $this->assertEquals(60, count($resultArray));
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage No balls remain
     */
    function testDrawLotteryBallThrowsNoBallsRemain() {
        $lottery = new LotteryBalls();
        for ($i = 0; $i < 61; $i++) {
            $lottery->drawLotteryBall();
        }
    }

    
}
