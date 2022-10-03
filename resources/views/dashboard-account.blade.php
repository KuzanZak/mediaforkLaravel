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
    Account
</h2>
<form action="{{ @route('dashboard/account/add', Auth::id())}}" method="post">
    @csrf
    <ul class="form-list-dashboard">
        <li class="form-items-dashboard">
            <label for="name">Name :</label>
            <input class="input-dashboard" type="text" id="name" name="name" value="{{Auth::user()->name}}">
        </li>
        <li class="form-items-dashboard">
            <label for="email">Email : </label>
            <input class="input-dashboard" type="email" id="email" name="email" value="{{Auth::user()->email}}">
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit" value="Accept changes">
        </li>
    </ul>
</form>

@endsection