@extends('layout')

@section('content')
<div class="container">
        <p class="h1 ">{{ $book->title }}<br>
            <small class="h2 text-body-secondary">by {{ $book->author }}</small>
        </p>

        <p class="h4">Rating: {{$avg_rating}}*</p>
        <p class="h4">Reviews: {{$comments_count}}</p>
        {{-- <p class="h3">rating: {{$book->comments_avg_rating}} comments: {{$book->comments_count}}</p> --}}

        <a href="#">Add a review!</a>

        <p class="h2 my-4 bold"><b>Reviews</b></p>

        @forelse ($comments as $comment)
        <div class="card my-2">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-body-secondary">{{$comment->rating}}*</h6>
                {{$comment->review}}
                <h6 class="card-subtitle my-2 text-body-secondary">{{$comment->created_at}}</h6>

            </div>
          </div>
        @empty
            <p>No comments yet! Write first one!</p>
        @endforelse
</div>
@endsection
