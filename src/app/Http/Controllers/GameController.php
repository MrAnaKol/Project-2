<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Developer;
use App\Models\Genre;
use App\Http\Requests\GameRequest;


class GameController extends Controller
{
    public function list()
    {
        $items = Game::orderBy('name', 'asc')->get();

        return view(
            'games.list',
            [
                'title' => 'Spēles',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        $developers = Developer::orderBy('name', 'asc')->get();
        $genres = Genre::orderBy('name', 'asc')->get();

        return view(
            'games.form',
            [
                'title' => 'Pievienot spēli',
                'game' => new Game(),
                'developers' => $developers,
                'genres' => $genres,
            ]
        );
    }

    public function update(Game $game)
    {
        $developers = Developer::orderBy('name', 'asc')->get();
        $genres = Genre::orderBy('name', 'asc')->get();

        return view(
            'games.form',
            [
                'title' => 'Rediģēt spēli',
                'game' => $game,
                'developers' => $developers,
                'genres' => $genres,
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
        $this->saveGameData($game, $request);
        return redirect('/games');
    }

    public function patch(Game $game, GameRequest $request)
    {
        $this->saveGameData($game, $request);
        return redirect('/games');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
