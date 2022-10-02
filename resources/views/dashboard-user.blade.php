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
<div class="list-title-dashboard-users">
    <h3 class="subtitle-dashboard">List of Admins</h3>
    <h3 class="subtitle-dashboard">List of Users</h3>
</div>
<section class="list-dashboard-users">
    <ul class="list-dashboard-admin">
        @foreach($users as $user)
        @if ($user->admin === 1)
        <li class="list-items-dashboard">
            <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $user->id }}</p>
            <p class="data-dashboard"><span class="span-title-dashboard">Name :</span> {{ $user->name }}</p>
            <p class="data-dashboard"><span class="span-title-dashboard">Email :</span> {{ $user->email }}</p>
            <p class="data-dashboard"><span class="span-title-dashboard">Admin :</span> {{ $user->admin }}
                @if ($user->id !== Auth::id())
                <a href="{{ @route('dashboard/updateUser', $user->id)}}">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </a>
                @endif
            </p>
            @if ($user->id !== Auth::id())
            <p class="data-dashboard"><span class="span-title-dashboard">Delete :</span>
                <a href="{{ @route('dashboard/deleteUser', $user->id)}}">
                    <i class="fa fa-ban" aria-hidden="true"></i>
                </a>
            </p>
            @endif
            <br>
        </li>
        @endif
        @endforeach
    </ul>
    <ul class="list-dashboard">
        @foreach($users as $user)
        @if ($user->admin !== 1)
        <li class="list-items-dashboard">
            <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $user->id }}</p>
            <p class="data-dashboard"><span class="span-title-dashboard">Nom :</span> {{ $user->name }}</p>
            <p class="data-dashboard"><span class="span-title-dashboard">Email :</span> {{ $user->email }}</p>
            <p class="data-dashboard"><span class="span-title-dashboard">Admin :</span> {{ $user->admin }}
                @if ($user->id !== Auth::id())
                <a href="{{ @route('dashboard/updateAdmin', $user->id)}}">
                    <i class=" fa fa-check-square" aria-hidden="true"></i>
                </a>
                @endif
            </p>
            <p class="data-dashboard"><span class="span-title-dashboard">Delete :</span>
                @if ($user->id !== Auth::id())
                <a href="{{ @route('dashboard/deleteUser', $user->id)}}">
                    <i class="fa fa-ban" aria-hidden="true"></i>
                </a>
                @endif
            </p>
            <br>
        </li>
        @endif
        @endforeach
    </ul>
</section>

@endsection