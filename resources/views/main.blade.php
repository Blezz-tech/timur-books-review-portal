@extends('layout')

@section('content')
    <div class="container">

        <div class="my-4">
            <form action="{{ route('books.index') }}" method="get">
                <input type="text" class="form-control w-50" id="search" placeholder="Search" name="search"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary my-2">Search</button>
                <a class="btn btn-primary" href="{{ route('books.index') }}">Cancel</a>
            </form>
        </div>

        <div class="">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link @if (request('option') == 'latest') active @endif" aria-current="page"
                        href="{{ route('books.index', ['option' => 'latest']) }}">Latest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request('option') == 'popularLastMonth') active @endif"
                        href="{{ route('books.index', ['option' => 'popularLastMonth']) }}">Popular Last Month</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request('option') == 'popular6Months') active @endif" href="{{route('books.index', ['option' => 'popular6Months'])}}">Popular Last Six Months</a>
                </li>
            </ul>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date added</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Rating</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td><a href="{{route('books.show', $book)}}">{{ $book->title }}</a></td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->comments_count }}</td>
                        <td>{{ $book->comments_avg_rating }}</td>
                    @empty
                        <td>The are no such books...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
