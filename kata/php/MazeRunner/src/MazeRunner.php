<?php
require_once 'MazePosition.php';
class MazeRunner {
    public $currentPosition, $nextPosition, $mazeStart, $mazeEnd;

    public function __construct($maze) {
        $this->maze = $maze;
    }

    public function maze_runner($directions) {
        $this->setMazePositions();

        $exit = false;
        try {
            foreach ($directions as $direction) {
                $exit = $this->handleDirection($direction);
                if ($exit) {
                    return 'Finish';
                }
            }

            return 'Lost';
        } catch (exception $e) {
            return 'Dead';
        }

    }

    public function setMazePositions() {
        // Set the current position to be used later

        foreach ($this->maze as $mazeRowKey => $mazeRow) {
            foreach ($mazeRow as $mazePositionKey => $mazePosition) {
                // Set the start and current position
                if ($mazePosition === 2) {
                    $this->mazeStart = new MazePosition($mazePositionKey, $mazeRowKey);
                    $this->currentPosition = new MazePosition($mazePositionKey, $mazeRowKey);
                    $this->nextPosition = new MazePosition($mazePositionKey, $mazeRowKey);
                }

                // Set the end position
                if ($mazePosition === 3) {
                    $this->mazeEnd = new MazePosition($mazePositionKey, $mazeRowKey);
                }
            }
        }
    }

    public function handleDirection($direction) {
        // Determine the next direction position
        if ($direction === 'N') {
            $this->nextPosition->x = $this->currentPosition->x;
            $this->nextPosition->y = $this->currentPosition->y - 1;
        } else if ($direction === 'S') {
            $this->nextPosition->x = $this->currentPosition->x;
            $this->nextPosition->y = $this->currentPosition->y + 1;
        } else if ($direction === 'E') {
            $this->nextPosition->x = $this->currentPosition->x + 1;
            $this->nextPosition->y = $this->currentPosition->y;
        } else if ($direction === 'W') {
            $this->nextPosition->x = $this->currentPosition->x - 1;
            $this->nextPosition->y = $this->currentPosition->y;
        }

        // Confirm the next position is not outside the maze
        if ($this->nextPosition->x > (count($this->maze) - 1) ||
            $this->nextPosition->y > (count($this->maze) - 1)||
            $this->nextPosition->x < 0 ||
            $this->nextPosition->y < 0) {
            throw new exception('dead');
        }

        // Find the next position value
        $nextPositionValue = $this->maze[$this->nextPosition->y][$this->nextPosition->x];
        if ($nextPositionValue === 1) {
            throw new exception('dead');
        } else if ($nextPositionValue === 3) {
            return true;
        } else {
            $this->currentPosition = $this->nextPosition;
            return false;
        }

    }
}
