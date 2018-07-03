<?php

require_once 'StandardItem.php';
require_once 'AgedBrie.php';
require_once 'SulfurasHandOfRagnaros.php';
require_once 'BackstagePass.php';
require_once 'ConjuredItem.php';

class GildedRose {
    private $items;
    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {
        foreach ($this->items as $item) {
            $itemHandler = $this->get_item_handler($item);
            $itemHandler->process_item($item);
        }
    }

    function get_item_handler($item) {
        if ($item->name === 'Aged Brie') {
            $itemHandler = new AgedBrie();
        } else if ($item->name === 'Sulfuras, Hand of Ragnaros') {
            $itemHandler = new SulfurasHandOfRagnaros();
        } else if ($item->name === 'Backstage pass') {
            $itemHandler = new BackstagePass();
        } else if ($item->name === 'Conjured Mana Cake') {
            $itemHandler = new ConjuredItem();
        } else {
            $itemHandler = new StandardItem();
        }

        return $itemHandler;
    }
}

class Item {
    public $name;
    public $sell_in;
    public $quality;
    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }
    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
