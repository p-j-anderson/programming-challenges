<?php

class AgedBrie extends StandardItem {
    protected function adjust_quality($item) {
        if ($item->quality < 50 && $item->sell_in >= 0) {
            $item->quality += 1;
        } else if ($item->quality < 50 && $item->sell_in < 0) {
            $item->quality += 2;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }
}
