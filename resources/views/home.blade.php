@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <h1 class="text-center">Best comic shop</h1>


    <div class="container my-3">
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-6 col-md-4 col-lg-3 g-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}">
                        
                        <div class="card-body">
                            <h4 class="card-title">{{ $comic['title'] }}</h4>
                            <p class="card-text">{{ $comic['series'] }}</p>
                            <p class="card-text">{{ $comic['price'] }}</p>
                        </div>
    
                        <div class="card-footer">
                            <div class="details d-flex justify-content-between">
                                <span>{{ $comic['sale_date'] }}</span>
                                <span>{{ $comic['type'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
@endsection