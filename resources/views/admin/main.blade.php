@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="">
            <p class="h3">You're admin</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">Edit book</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date added</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Rating</th> --}}
                    <th scope="col">Review</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        {{-- <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->comments_count }}</td>
                        <td>{{ $book->comments_avg_rating }}</td> --}}
                        <td>{{ $book->review }}</td>
                        <td>{{ $book->rating }}</td>
                        <td>accepted</td>
                    @empty
                        <td>The are no such books...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
