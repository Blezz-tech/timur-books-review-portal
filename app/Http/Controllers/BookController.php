<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search??'';

        switch($request->option) {
            case NULL:
            case 'latest':
                $books = Book::where('title', 'like', "%$search%")
                    ->withAvg('comments', 'rating')
                    ->orderBy('created_at', 'desc')
                    ->withCount('comments')
                    ->get();
            break;
            case 'popularLastMonth':
                $books = Book::where('title', 'like', "%$search%")
                    ->withAvg('comments', 'rating')
                    ->where('created_at', '>' ,now()->subMonths(1))
                    ->orderBy('comments_avg_rating', 'desc')
                    ->withCount('comments')
                    ->get();
            break;
            case 'popular6Months':
                $books = Book::where('title', 'like', "%$search%")
                    ->withAvg('comments', 'rating')
                    ->where('created_at', '>' ,now()->subMonths(6))
                    ->orderBy('comments_avg_rating', 'desc')
                    ->withCount('comments')
                    ->get();
            break;
        }
        return view('main', ['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(Book $book)
    {
        $comments = $book->comments()
                ->orderBy('rating', 'desc')
                ->get();
        $avg_rating = $comments->avg('rating');
        $comments_count = $comments->count();
        return view('bookshow', ['book'=>$book, 'comments'=>$comments, 'avg_rating' => $avg_rating, 'comments_count' => $comments_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
