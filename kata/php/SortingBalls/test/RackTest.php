<?php
/**
 * @group rack
 */
require_once 'Rack.php';
require_once 'LotteryBalls.php';
use PHPUnit\Framework\TestCase;

class RackTest extends TestCase {
    function createRack() {
        $lotteryBalls = new LotteryBalls();
        $rack = new Rack($lotteryBalls);
        return $rack;
    }

    function testAddToRack() {
        $rack = $this->createRack();
        $rack->addToRack(20);
        $this->assertEquals(array(20), $rack->getRack());
    }

    function testAddToRackSortsValuesAscending() {
        $rack = $this->createRack();
        $rack->addToRack(30);
        $this->assertEquals(array(30), $rack->getRack());
        $rack->addToRack(20);
        $this->assertEquals(array(20, 30), $rack->getRack());
        $rack->addToRack(10);
        $this->assertEquals(array(10, 20, 30), $rack->getRack());
    }

    function testDrawOneBall() {
        $rack = $this->createRack();
        $result = $rack->drawBalls(1);
        $this->assertEquals(1, count($result));
    }

    function testDrawSixtyBalls() {
        // Generate 0-59 array
        $expected = array();
        for ($i = 0; $i < 60; $i++) {
            $expected[] = $i;
        }

        $rack = $this->createRack();
        $result = $rack->drawBalls(60);
        $this->assertEquals(60, count($result));
        $this->assertEquals($expected, $result);
    }
}
