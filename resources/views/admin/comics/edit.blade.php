@extends('layouts.admin')

@section('title', 'create')

@section('content')

    <div class="container py-5">
        <h3 class="mb-4 text-center">You can edit comics here!</h3>
        <div class="row">
            <div class="col-md-8 offset-md-2"> 
                <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    @method('PUT')


                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $comic->title }}" 
                               placeholder="Insert title" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" name="price" id="price" 
                               value="{{ $comic->price }}" placeholder="Insert price" required> 
                    </div>

                    <div class="mb-3">
                        <label for="thumb" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="thumb" id="thumb">
                        <div id="fileHelpImg" class="form-text">Select an image for the comic.</div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Update Comic</button> 
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
