<?php

class BackstagePass extends StandardItem {
    protected function adjust_quality($item) {
        if ($item->sell_in > 0) {
            if ($item->quality < 50) {
                // Increment regular quality
                $item->quality += 1;

                // Increment quality for being within 10 days
                if ($item->sell_in < 11 && $item->quality < 50) {
                    $item->quality += 1;
                }

                // Increment quality for being within 5 days
                if ($item->sell_in < 6 && $item->quality < 50) {
                    $item->quality += 1;
                }
            }
        } else {
            $item->quality = 0;
        }
    }
}
