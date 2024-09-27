<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHome()
    {
        // $books = Book::withAvg('comments', 'rating')
        //             ->orderBy('created_at', 'desc')
        //             ->withCount('comments')
        //             ->get();

        $books = Comment::get();
        return view('admin.main', ['books' => $books]);
    }

    // public function show(Book $book)
    // {
    //     $comments = $book->comments()
    //             ->orderBy('rating', 'desc')
    //             ->get();
    //     $avg_rating = $comments->avg('rating');
    //     $comments_count = $comments->count();
    //     return view('bookshow', ['book'=>$book, 'comments'=>$comments, 'avg_rating' => $avg_rating, 'comments_count' => $comments_count]);
    // }
}
