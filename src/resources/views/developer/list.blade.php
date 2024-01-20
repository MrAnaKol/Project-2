@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>

    @if (count($items) > 0)

        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th>ID</td>
                    <th>Name</td>
                    <th>&nbsp;</td>
                </tr>
            </thead>
            <tbody>

            @foreach($items as $developer)
            <tr>
                <td>{{ $developer->id }}</td>
                <td>{{ $developer->name }}</td>
                <td><a href="/developers/update/{{ $developer->id }}" class="btn btn-outline-primary btnsm">Edit</a> / 
                    <form action="/developers/delete/{{ $developer->id }}" method="post" class="deletionform d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        <a href="/developers/create" class="btn btn-primary">Izveidot jaunu</a>

    @else

        <p>No entries found in database</p>

    @endif

@endsection