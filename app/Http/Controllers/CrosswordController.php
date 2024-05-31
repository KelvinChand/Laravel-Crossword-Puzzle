<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CrosswordSolver;
use Illuminate\Support\Facades\Storage;

class CrosswordController extends Controller
{
    public function index()
    {
        // Misalkan ukuran papan adalah 15x15 dan berisi '-' sebagai tempat kosong
        $board = array_fill(0, 15, array_fill(0, 15, '-'));

        // Membaca dataset dari core.txt
        $words = explode("\n", Storage::get('core.txt'));

        // Membersihkan kata-kata dari spasi kosong
        $words = array_map('trim', $words);

        $solver = new CrosswordSolver($board, $words);
        $solver->solve();

        $steps = $solver->getSteps();

        return view('crossword.index', ['board' => $solver->getBoard(), 'steps' => $steps]);
    }
}
