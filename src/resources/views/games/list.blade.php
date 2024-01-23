@extends('layout')

@section('content')

<h1 class="text-white p-2 py-2" style="backdrop-filter: blur(10px);">{{ $title }}</h1>

@if (count($items) > 0)

    <table class="table table-sm table-hover table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nosaukums</th>
                <th>Izstrādātājs</th>
                <th>Žanrs</th>
                <th>Gads</th>
                <th>Cena</th>
                <th>Publicēta</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>

        @foreach($items as $game)
            <tr>
                <td>{{ $game->id }}</td>
                <td>{{ $game->name }}</td>
                <td>{{ $game->developer->name }}</td>
                <td>{{ $game->genre->name }}</td>
                <td>{{ $game->year }}</td>
                <td>&euro; {{ number_format($game->price, 2, '.') }}</td>
                <td>{!! $game->display ? '&#x2714;' : '&#x274C;' !!}</td>
                <td>
                    <a
                        href="/games/update/{{ $game->id }}"
                        class="btn btn1 btn-sm"
                    >Rediģēt</a> /
                    <form
                        method="post"
                        action="/games/delete/{{ $game->id }}"
                        class="d-inline deletion-form"
                    >
                        @csrf
                        <button
                            type="submit"
                            class="btn btn2 btn-sm"
                        >Dzēst</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@else
    <p>Datubāzē nav atrasts neviens ieraksts</p>
@endif

<a href="/games/create" class="btn btn-secondary">Pievienot jauno spēli</a>

@endsection