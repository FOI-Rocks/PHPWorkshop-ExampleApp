@extends('master.master')

@section('content')
    @if(isset($errors) && count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('login.post') }}">
        {{ csrf_field() }}
        Username: <input type="text" name="username">
        <br>
        Password: <input type="password" name="password">
        <br>
        <input type="submit">
    </form>
@endsection