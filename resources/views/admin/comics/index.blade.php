@extends('layouts.admin')

@section('title', 'HomePage')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Comics Admin Index</h1>

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif

        {{-- alert quando è vuota  --}}
        @if ($comics->isEmpty())
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
                                        <img style="width:50px" class="img-fluid rounded-circle" src="{{ $comic['thumb'] }}"
                                            alt="{{ $comic['title'] }}">
                                    @else
                                        <img style="width:50px" class="img-fluid rounded-circle"
                                            src="{{ asset('storage/' . $comic->thumb) }}" alt="{{ $comic['title'] }}">
                                    @endif
                                </td>
                                <td>{{ $comic['price'] }}</td>
                                <td>{{ $comic['series'] }}</td>
                                <td>
                                    <a href="{{ route('comics.show', $comic->id) }}"
                                        class="btn btn-sm btn-secondary">More</a>
                                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-sm btn-info">Edit</a>

                                    {{-- modal for delete button --}}
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $comic->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $comic->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitle-{{ $comic->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle-{{ $comic->id }}">Modal id:
                                                        {{ $comic->id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Attention! This is a destructive operation that cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                    <!-- Delete form -->
                                                    <form action="{{ route('comics.destroy', $comic->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
