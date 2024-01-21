@extends('layout')

@section('content')

<h1>{{ $title }}</h1>

@if (count($items) > 0)

    <table class="table table-sm table-hover table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Developer</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Price</th>
                <th>Published</th>
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
                        class="btn btn-outline-primary btn-sm"
                    >Edit</a> /
                    <form
                        method="post"
                        action="/games/delete/{{ $game->id }}"
                        class="d-inline deletion-form"
                    >
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-outline-danger btn-sm"
                        >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@else
    <p>No entries found in database </p>
@endif

<a href="/games/create" class="btn btn-primary">Add new game</a>

@endsection