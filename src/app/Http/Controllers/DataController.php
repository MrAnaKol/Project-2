<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class DataController extends Controller
{
    public function getTopGames()
    {
        $games = Game::where('display', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return $games;
    }

    // Returns the selected Game object, if it’s published
    public function getGame(Game $game)
    {
        $selectedGame = Game::where([
            'id' => $game->id,
            'display' => true,
        ])
        ->firstOrFail();

        return $selectedGame;
    }

    // Returns 3 published Game objects in random order- except the selected one
    public function getRelatedGames(Game $game)
    {
        $games = Game::where('display', true)
            ->where('id', '<>', $game->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
            
        return $games;
    }
}
