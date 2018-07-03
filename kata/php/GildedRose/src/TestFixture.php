<?php
require_once 'GildedRose.php';
$items = array(
    new Item('+5 Dexterity Vest', 10, 20),
    new Item('Aged Brie', 2, 11),
    new Item('Elixir of the Mongoose', 5, 7),
    new Item('Sulfuras, Hand of Ragnaros', 0, 80),
    new Item('Sulfuras, Hand of Ragnaros', -1, 80),
    new Item('Backstage pass', 15, 20),
    new Item('Backstage pass', 10, 49),
    new Item('Backstage pass', 5, 49),
    new Item('Conjured Mana Cake', 3, 16)
);
$app = new GildedRose($items);
$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}
for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------\n");
    echo("name, sellIn, quality\n");
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->update_quality();
}
