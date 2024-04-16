@extends('layouts.app')

@section('content')
    <h1>{{ $product->title }}</h1>
    <p>{{ $product->description }}</p>
    <!-- Display comments for this product -->
    @include('comments._comment_form')
    @foreach ($product->comments as $comment)
        @include('comments._comment', ['comment' => $comment])
    @endforeach
@endsection
