@extends('layout')

@section('content')
    <div class="container">
        <form action="{{route('user.store')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
