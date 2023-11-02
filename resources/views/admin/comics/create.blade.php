@extends('layouts.app')

@section('title', 'HomePage')

@section('content')

    <h1>create</h1>


    <div class="container py-5">
        <h3>Add new comics</h3>
        <div class="row">
            <form action="{{ route('comics.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                        placeholder="inserti title">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId"
                        placeholder="insert price">
                </div>

                <div class="mb-3">
                    <label for="thumb" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="thumb" id="thumb" placeholder="select a file"
                        aria-describedby="fileHelpImg">
                   
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>

@endsection


