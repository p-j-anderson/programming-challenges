<?php

class Game {
    private $board, $boardSize;
    private $gameTurns = 0;
    public function __construct($board) {
        $this->board = $board;
        $this->boardSize = count($board);
    }

    public function play() {
        $this->findFood();
        return $this->gameTurns;
    }

    private function findFood() {
        for ($rowKey = 0; $rowKey < $this->boardSize; $rowKey++) {
            for ($colKey = 0; $colKey < $this->boardSize; $colKey++) {
                // Only continue if food is found
                $colValue = $this->board[$rowKey][$colKey];
                if ($colValue === 1) {

                    // Search the position neighbors for food
                    $this->searchNeighbors($rowKey, $colKey);

                    // Adjust the position value
                    $this->board[$rowKey][$colKey] = 0;

                    // Increment the turn counter since we searched for food
                    $this->gameTurns++;
                }
            }
        }
    }

    private function searchNeighbors($rowKey, $colKey) {
        // Neighbors can be north, south, east, or west
        $this->showBoard();
        $neighbors = array(
            'n' => array(
                'row' => $rowKey - 1,
                'col' => $colKey,
                'value' => $this->board[$rowKey - 1][$colKey]
            ),
            's' => array(
                'row' => $rowKey + 1,
                'col' => $colKey,
                'value' => $this->board[$rowKey + 1][$colKey]
            ),
            'e' => array(
                'row' => $rowKey,
                'col' => $colKey + 1,
                'value' => $this->board[$rowKey][$colKey + 1]
            ),
            'w' => array(
                'row' => $rowKey,
                'col' => $colKey - 1,
                'value' => $this->board[$rowKey][$colKey - 1]
            )
        );

        // If any neighbor has food, continue searching
        foreach ($neighbors as $dir => $data) {
            if ($data['value'] === 1) {
                $this->board[$data['row']][$data['col']] = 0;
                $this->searchNeighbors($data['row'], $data['col']);
            }
        }
    }

    private function showBoard() {
        echo "\n\n";
        foreach ($this->board as $row) {
            echo implode(' ', $row) . "\n";
        }
    }
}
