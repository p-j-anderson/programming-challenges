<?php
require_once 'GildedRose.php';
use PHPUnit\Framework\TestCase;
class GildedRoseTest extends TestCase {
    function testFoo() {
        $items = array(new Item("foo", 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals("foo", $items[0]->name);
    }

    /**
     * @group standardItem
     */
    function testStandardItemQualityDoesNotDropBelowZero() {
        $items = array(new Item('Standard Item', 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }

    /**
     * @group standardItem
     */
    function testStandardItemQualityReducesByTwoAfterSellDate() {
        $items = array(new Item('Standard Item', 0, 10));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(8, $items[0]->quality);
    }

    /**
     * @group agedBrie
     */
    function testAgedBrieQualityIncreasesByOneBeforeSellDate() {
        $items = array(new Item('Aged Brie', 1, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(1, $items[0]->quality);
    }

    /**
     * @group agedBrie
     */
    function testAgedBrieQualityIncreasesByTwoAfterSellDate() {
        $items = array(new Item('Aged Brie', 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(2, $items[0]->quality);
    }

    /**
     * @group agedBrie
     */
    function testAgedBrieQualityMaxFifty() {
        $items = array(new Item('Aged Brie', 0, 49));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(50, $items[0]->quality);
    }

    /**
     * @group handOfRag
     */
    function testHandOfRagDoesNotDegradeBeforeSellDate() {
        $items = array(new Item('Sulfuras, Hand of Ragnaros', 0, 80));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(80, $items[0]->quality);
    }

    /**
     * @group handOfRag
     */
    function testHandOfRagDoesNotDegradeAfterSellDate() {
        $items = array(new Item('Sulfuras, Hand of Ragnaros', -1, 80));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(80, $items[0]->quality);
    }

    /**
     * @group backstagePasses
     */
    function testBackstagePassesIncreasesNormally() {
        $items = array(new Item('Backstage passes', 15, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(14, $items[0]->sell_in);
        $this->assertEquals(1, $items[0]->quality);
    }

    /**
     * @group backstagePasses
     */
    function testBackstagePassesIncreasesDoubleWithinTenDays() {
        $items = array(new Item('Backstage passes', 9, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(8, $items[0]->sell_in);
        $this->assertEquals(2, $items[0]->quality);
    }

    /**
     * @group backstagePasses
     */
    function testBackstagePassesIncreasesTripleWithinFiveDays() {
        $items = array(new Item('Backstage passes', 4, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(3, $items[0]->sell_in);
        $this->assertEquals(3, $items[0]->quality);
    }

    /**
     * @group backstagePasses
     */
    function testBackstagePassesNeverIncreasePasedFifty() {
        $items = array(new Item('Backstage passes', 4, 50));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(3, $items[0]->sell_in);
        $this->assertEquals(50, $items[0]->quality);
    }

    /**
     * @group backstagePasses
     */
    function testBackstagePassesQualityZeroAfterConcert() {
        $items = array(new Item('Backstage passes', 0, 50));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }

    /**
     * @group conjuredItem
     */
    function testConjuredManaCakeDecreasesByTwo() {
        $items = array(new Item('Conjured Mana Cake', 1, 2));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }

    /**
     * @group conjuredItem
     */
    function testConjuredManaCakeDecreasesByFourAfterSellIn() {
        $items = array(new Item('Conjured Mana Cake', 0, 4));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }
}
