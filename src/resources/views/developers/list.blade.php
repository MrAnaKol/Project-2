@extends('layout')

@section('content')

    <h1 class="text-white p-2 py-2" style="backdrop-filter: blur(10px);">{{ $title }}</h1>

    @if (count($items) > 0)

        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th>ID</td>
                    <th>Nosaukums</td>
                    <th>&nbsp;</td>
                </tr>
            </thead>
            <tbody>

            @foreach($items as $developer)
            <tr>
                <td>{{ $developer->id }}</td>
                <td>{{ $developer->name }}</td>
                <td><a href="/developers/update/{{ $developer->id }}" class="btn btn1 btn-sm">Rediģēt</a> / 
                    <form action="/developers/delete/{{ $developer->id }}" method="post" class="d-inline deletion-form">
                        @csrf
                        <button type="submit" class="btn btn2 btn-sm">Izdzēst</button>
                    </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>

    @else

        <p>Datubāzē nav atrasts neviens ieraksts</p>

    @endif

    <a href="/developers/create" class="btn btn-secondary">Izveidot jaunu</a>

@endsection