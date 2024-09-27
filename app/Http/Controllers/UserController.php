<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        Auth::login($user);
        return redirect('books')->with(['info'=>'Login succes']);
    }

    public function loginform(){
        return view('loginform');
    }

    public function login(Request $request){

        $credentails = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentails)) {
            $request->session()->regenerate();
            if(Auth::user() -> isAdmin){
                return redirect()->route('admin.home')->with(['info'=>'Login as admin success']);
            }
            else {
                return redirect()->route('books.index')->with(['info'=>'Login success']);
            }
        }

        return back()->withErrors([
            'email' => 'Entered data incorrect',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('books.index');
    }
}
