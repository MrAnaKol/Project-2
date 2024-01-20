<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function list()
    {
        $items = Game::orderBy('name', 'asc')->get();

        return view(
            'game.list',
            [
                'title' => 'Games',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        $developers = Developer::orderBy('name', 'asc')->get();

        return view(
            'game.form',
            [
                'title' => 'Add game',
                'game' => new Game(),
                'developers' => $developers,
            ]
        );
    }

    public function put(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'developer_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'
        ]);

        $game = new Game();
        $game->name = $validatedData['name'];
        $game->developer_id = $validatedData['developer_id'];
        $game->description = $validatedData['description'];
        $game->price = $validatedData['price'];
        $game->year = $validatedData['year'];
        $game->display = (bool) ($validatedData['display'] ?? false);
        $game->save();

        return redirect('/games');
    }

    public function update(Game $game)
    {
        $developers = Developer::orderBy('name', 'asc')->get();

        return view(
            'game.form',
            [
                'title' => 'Edit game',
                'game' => $game,
                'developers' => $developers,
            ]
        );
    }

    public function patch(Game $game, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'developer_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'
        ]);

        $game->name = $validatedData['name'];
        $game->developer_id = $validatedData['developer_id'];
        $game->description = $validatedData['description'];
        $game->price = $validatedData['price'];
        $game->year = $validatedData['year'];
        $game->display = (bool) ($validatedData['display'] ?? false);
        $game->save();

        return redirect('/games/update/' . $game->id);
    }

    public function delete(Game $game)
    {
        $game->delete();
        return redirect('/games');
    }
}
