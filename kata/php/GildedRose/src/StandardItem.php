<?php

class StandardItem {
    public function process_item(Item $item) {
        $this->adjust_sell_in($item);
        $this->adjust_quality($item);
    }

    protected function adjust_sell_in($item) {
        $item->sell_in -= 1;
    }

    protected function adjust_quality($item) {
        if ($item->quality > 0 && $item->sell_in < 0) {
            $item->quality -= 2;
        } else if ($item->quality > 0) {
            $item->quality -= 1;
        }
    }
}
