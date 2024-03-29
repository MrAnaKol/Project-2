<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    // display all developers
    public function list()
    {
        $items = Developer::orderBy('name', 'asc')->get();

        return view(
            'developers.list',
            [
                'title' => 'Izstrādātāji',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        return view(
            'developers.form',
            [
                'title' => 'Pievienojiet jaunu izstrādātāju',
                'developer' => new Developer()
            ]
        );
    }

    public function put(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $developer = new Developer();
        $developer->name = $validatedData['name'];
        $developer->save();

        return redirect('/developers');
    }

    public function update(Developer $developer)
    {
        return view(
            'developers.form',
            [
                'title' => 'Rediģēt izstrādātāju',
                'developer' => $developer
            ]
        );
    }

    public function patch(Developer $developer, Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        ]);

        $developer->name = $validatedData['name'];
        $developer->save();

        return redirect('/developers');
    }

    public function delete(Developer $developer)
    {
        $developer->delete();
        return redirect('/developers');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
