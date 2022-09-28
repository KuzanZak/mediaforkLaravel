@extends('dashboard')
@section('content')
<div class="p-6 bg-white border-b border-gray-200">
    Users
</div>
<ul>
    @foreach($users as $user)
    <li>
        <p>Id : {{ $user->id }}</p>
        <p>Nom : {{ $user->name }}
        <p>
        <p>Email : {{ $user->email }}
        <p>
        <p>Admin : {{ $user->admin }}
        <p>
            <!-- <p>Message : {{ $user->message }}
        <p> -->
            <br>
    </li>
    @endforeach
</ul>
@endsection