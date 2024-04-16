@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ $product->image_url }}" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
