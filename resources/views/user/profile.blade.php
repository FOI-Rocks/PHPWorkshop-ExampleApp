@extends('master.master')

@section('content')
    <div class="well">
        <b>Username: </b> {{ $user['username'] }}
        <br>
        <b>Email: </b> {{ $user['email'] }}
    </div>
@endsection