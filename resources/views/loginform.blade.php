@extends('layout')

@section('content')
<div class="container">
    <form action="{{route('user.login')}}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
