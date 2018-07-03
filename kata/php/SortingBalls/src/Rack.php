<?php
require_once 'LotteryBalls.php';

class Rack {
    public $rack = array();
    public $lotteryBalls;

    public function __construct($lotteryBalls) {
        $this->lotteryBalls = $lotteryBalls;
    }

    public function drawBalls($count) {
        // Loop through the count
        for ($i = 0; $i < $count; $i++) {
            $drawnBall = $this->lotteryBalls->drawLotteryBall();
            $this->addToRack($drawnBall);
        }
        // Pull the rack
        $result = $this->getRack();
        return $result;
    }

    public function getRack() {
        return $this->rack;
    }

    public function addToRack($ball) {
        $this->rack[] = $ball;
        // Sort the array and re-index the array
        asort($this->rack);
        $this->rack = array_values($this->rack);
    }
}
