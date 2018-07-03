<?php

class LotteryBalls {
    const TOTAL_BALLS = 60;
    private $availableLotteryBalls;
    public function __construct() {
        // Generate the lottery balls
        $this->setLotteryBalls();
    }

    public function drawLotteryBall() {
        if (count($this->availableLotteryBalls) > 0) {
            // Draw a random ball
            $rand = rand(0, count($this->availableLotteryBalls) - 1);
            $drawnBall = $this->availableLotteryBalls[$rand];

            // Unset the pulled value and re-index the array
            unset($this->availableLotteryBalls[$rand]);
            $this->availableLotteryBalls = array_values($this->availableLotteryBalls);

            // Return the drawn ball
            return $drawnBall;
        } else {
            throw new exception('No balls remain');
        }
    }

    private function setLotteryBalls() {
        $lotteryBalls = array();
        for ($i = 0; $i < self::TOTAL_BALLS; $i++) {
            $lotteryBalls[] = $i;
        }
        $this->availableLotteryBalls = $lotteryBalls;
    }
}
