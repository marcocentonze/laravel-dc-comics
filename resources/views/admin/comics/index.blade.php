@extends('layouts.admin')

@section('title', 'HomePage')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Comics Admin Index</h1>
         
         {{-- alert quando è vuota  --}}
        @if($comics->isEmpty())
            <div class="alert alert-warning" role="alert">
                No comics here!
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Price</th>
                            <th scope="col">Series</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comics as $comic)
                            <tr>
                                <td>{{ $comic['id'] }}</td>
                                <td>{{ $comic['title'] }}</td>
                                <td>
                                    @if (str_contains($comic['thumb'], 'http'))
                                        <img style="width:50px" class="img-fluid rounded-circle" src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}">
                                    @else
                                        <img style="width:50px" class="img-fluid rounded-circle" src="{{ asset('storage/' . $comic->thumb) }}" alt="{{ $comic['title'] }}">
                                    @endif
                                </td>
                                <td>{{ $comic['price'] }}</td>
                                <td>{{ $comic['series'] }}</td>
                                <td>
                                    <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-sm btn-secondary">More</a>
                                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
