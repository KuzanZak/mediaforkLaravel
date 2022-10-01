@extends('dashboard')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h2 class="title-dashboard">
    Users
</h2>
<ul class="list-dashboard">
    @foreach($users as $user)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $user->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Nom :</span> {{ $user->name }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Email :</span> {{ $user->email }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Admin :</span> {{ $user->admin }}
            @if ($user->admin !== 1 && $user->id !== Auth::id())
            <a href="{{ @route('dashboard/updateAdmin', $user->id)}}">
                <i class=" fa fa-check-square" aria-hidden="true"></i>
            </a>
            @endif
            @if ($user->admin === 1 && $user->id !== Auth::id())
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