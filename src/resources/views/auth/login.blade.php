@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>

    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            Neizdevās autentificēt. Lūdzu mēģiniet vēlreiz!
        </div>
    @endif

    <form method="post" action="/auth">
        @csrf

        <div class="mb-3">
            <label for="login-name" class="form-label">Lietotājvārds</label>
            <input
                type="text"
                id="login-name"
                name="name"
                class="form-control"
                autocomplete="off"
                autofocus
            >
        </div>
        
        <div class="mb-3">
            <label for="login-password" class="form-label">Parole</label>
            <input
                type="password"
                id="login-password"
                name="password"
                class="form-control"
            >
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-secondary">Ieiet</button>
        </div>

    </form>

@endsection
