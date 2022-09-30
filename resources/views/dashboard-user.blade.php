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
            @if ($user->admin !== 1)
            <a href="{{ @route('dashboard/updateAdmin', $user->id)}}">
                <i class=" fa fa-check-square" aria-hidden="true"></i>
            </a>
            @endif
            @if ($user->admin === 1)
            <a href="{{ @route('dashboard/updateUser', $user->id)}}">
                <i class="fa fa-minus" aria-hidden="true"></i>
            </a>
            @endif
        </p>
        <br>
    </li>
    @endforeach
</ul>
@endsection