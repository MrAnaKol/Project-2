@extends('layout')

@section('content')

<h1 class="text-white p-2 py-2" style="backdrop-filter: blur(10px);">{{ $title }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">Lūdzu, izlabojiet kļūdas!</div>
@endif

<form 
    method="post" 
    action="{{ $developer->exists ? '/developers/patch/' . $developer->id : '/developers/put' }}">
    @csrf
    
    <div class="mb-3">
        <label for="developer-name" class="form-label">Izstrādātāja nosaukums</label>

        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            id="developer-name"
            name="name"
            value="{{ old('name', $developer->name) }}"
            >

        @error('name')
            <p class="invalid-feedback">{{ $errors->first('name') }}</p>
        @enderror

    </div>

    <button type="submit" class="btn btn-secondary">Saglabāt</button>

</form>

@endsection