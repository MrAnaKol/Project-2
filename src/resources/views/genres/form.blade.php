@extends('layout')

@section('content')

<h1 class="text-white p-2 py-2" style="backdrop-filter: blur(10px);">{{ $title }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">Lūdzu, izlabojiet kļūdas!</div>
@endif

<form 
    method="post" 
    action="{{ $genre->exists ? '/genres/patch/' . $genre->id : '/genres/put' }}">
    @csrf
    
    <div class="mb-3">
        <label for="genre-name" class="form-label">Žanra nosaukums</label>

        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            id="genre-name"
            name="name"
            value="{{ old('name', $genre->name) }}"
            >

        @error('name')
            <p class="invalid-feedback">{{ $errors->first('name') }}</p>
        @enderror

    </div>

    <button type="submit" class="btn btn-secondary">Saglabāt</button>

</form>

@endsection