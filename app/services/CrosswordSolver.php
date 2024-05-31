<?php

namespace App\Services;

class CrosswordSolver
{

    protected $words;
    protected $steps;

    public function __construct($board, $words)
    {
        $this->board = $board;
        $this->words = $words;
        $this->steps = [];
    }

    public function solve()
    {
        return $this->solvePuzzle(0);
    }

    protected function solvePuzzle($index)
    {
        if ($index >= count($this->words)) {
            return true;
        }

        $word = $this->words[$index];

        for ($row = 0; $row < count($this->board); $row++) {
            for ($col = 0; $col < count($this->board[$row]); $col++) {
                if (
                    $this->canPlaceHorizontally($row, $col, $word) ||
                    $this->canPlaceVertically($row, $col, $word)
                ) {
                    if ($this->placeWord($row, $col, $word, true)) {
                        $this->steps[] = "Placed $word at ($row, $col)";
                        if ($this->solvePuzzle($index + 1)) {
                            return true;
                        }
                        $this->placeWord($row, $col, $word, false);
                        $this->steps[] = "Removed $word from ($row, $col)";
                    }
                }
            }
        }

        return false;
    }

    protected function canPlaceHorizontally($row, $col, $word)
    {
        if ($col + strlen($word) > count($this->board[0])) {
            return false;
        }

        for ($i = 0; $i < strlen($word); $i++) {
            if ($this->board[$row][$col + $i] != '-' && $this->board[$row][$col + $i] != $word[$i]) {
                return false;
            }
        }

        return true;
    }

    protected function canPlaceVertically($row, $col, $word)
    {
        if ($row + strlen($word) > count($this->board)) {
            return false;
        }

        for ($i = 0; $i < strlen($word); $i++) {
            if ($this->board[$row + $i][$col] != '-' && $this->board[$row + $i][$col] != $word[$i]) {
                return false;
            }
        }

        return true;
    }

    protected function placeWord($row, $col, $word, $place)
    {
        if ($this->canPlaceHorizontally($row, $col, $word)) {
            for ($i = 0; $i < strlen($word); $i++) {
                $this->board[$row][$col + $i] = $place ? $word[$i] : '-';
            }
            return true;
        }

        if ($this->canPlaceVertically($row, $col, $word)) {
            for ($i = 0; $i < strlen($word); $i++) {
                $this->board[$row + $i][$col] = $place ? $word[$i] : '-';
            }
            return true;
        }
        return false;
    }

    public function getBoard()
    {
        return $this->board;
    }
    public function getSteps()
    {
        return $this->steps;
    }
}
