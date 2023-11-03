@extends('layouts.app')

@section('title', 'show page Admin')

@section('content')

<div class="container my-5">

    {{-- @if(session('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success!</strong> {{session('message')}}
        </div>

        @endif
         --}}

         
    <!-- Titolo -->
    <h1 class="mb-4">{{ $comic->title }}</h1>

    <!-- Immagine -->
    @if (str_contains($comic['thumb'], 'http'))
        <img class="img-fluid rounded mb-4" src="{{ $comic['thumb'] }}" alt="{{ $comic->title }}">
    @else
        <img class="img-fluid rounded mb-4" src="{{ asset('storage/' . $comic->thumb) }}" alt="{{ $comic->title }}">
    @endif

    <!-- Prezzo -->
    <p class="mb-3"><strong>Price:</strong> {{ $comic->price }}</p>

    <!-- Pulsante Modifica -->
    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-primary">Edit</a>

</div>

@endsection
