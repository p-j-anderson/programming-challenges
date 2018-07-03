<?php

class SulfurasHandOfRagnaros extends StandardItem {
    protected function adjust_sell_in($item) {
        $item->sell_in = $item->sell_in;
    }

    protected function adjust_quality($item) {
        $item->quality = $item->quality;
    }
}
