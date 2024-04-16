extends('layouts.app')

@section('content')
    <h1>Admin Panel - Comments</h1>
    <div class="row">
        @foreach ($comments as $comment)
            @include('comments._comment', ['comment' => $comment])
            <!-- Add approval form for each comment -->
            <form action="{{ route('admin.comments.approve', $comment) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Approve</button>
            </form>
        @endforeach
    </div>
@endsection