<?php

class ConjuredItem extends StandardItem {
    protected function adjust_quality($item) {
        if ($item->quality > 0 && $item->sell_in < 0) {
            $item->quality -= 4;
        } else if ($item->quality > 0) {
            $item->quality -= 2;
        }
    }
}
