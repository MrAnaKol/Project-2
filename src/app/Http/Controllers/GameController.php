<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Developer;
use App\Http\Requests\GameRequest;


class GameController extends Controller
{
    public function list()
    {
        $items = Game::orderBy('name', 'asc')->get();

        return view(
            'games.list',
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
            'games.form',
            [
                'title' => 'Add game',
                'game' => new Game(),
                'developers' => $developers,
            ]
        );
    }

    public function update(Game $game)
    {
        $developers = Developer::orderBy('name', 'asc')->get();

        return view(
            'games.form',
            [
                'title' => 'Edit game',
                'game' => $game,
                'developers' => $developers,
            ]
        );
    }

    public function delete(Game $game)
    {
        $game->delete();
        return redirect('/games');
    }

    private function saveGameData(Game $game, GameRequest $request)
    {
        $validatedData = $request->validated();
        $game->fill($validatedData);
        $game->display = (bool) ($validatedData['display'] ?? false);

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $extension = $uploadedFile->clientExtension();
            $name = uniqid();
            $game->image = $uploadedFile->storePubliclyAs(
                '/',
                $name . '.' . $extension,
                'uploads'
            );
        }

        $game->save();
    }

    public function put(GameRequest $request)
    {
        $game = new Game();
        $this->saveBookData($game, $request);
        return redirect('/games');
    }

    public function patch(Game $game, GameRequest $request)
    {
        $this->saveGameData($game, $request);
        return redirect('/games');
    }
}
