@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">Welcome to Our Website</h1>
      <p class="col-md-8 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum maxime nemo, minus animi, necessitatibus ad laborum repellat aut eligendi exercitationem quos minima unde laudantium, aliquam natus a eos velit nisi!</p>
      <a href="{{ route('comics') }}" class="btn btn-primary btn-lg" type="button">Discover our comics!</a>
    </div>
  </div>

 @endsection