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
<h2 class="title-dashboard">Ajout images</h2>
<div class="content-back-link">
    <a href="{{ @route('dashboard/image')}}" class="back-button">Back</a>
</div>
<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul class="form-list-dashboard">
        <li class="form-items-dashboard">
            <label for="file">image : </label>
            <input class="input-dashboard" type="file" id="file" name="file" value="">
        </li>
        <li class="form-items-dashboard form-update" id="form-item-upload">
            <label for="alt">Alt : </label>
            <input class="input-dashboard" type="text" id="alt" name="alt" value="">
        </li>
        <li class="form-items-dashboard">
            <legend>Is it a main image?</legend>
            <input type="checkbox" id="main" name="main" value="1">
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit-image" value="Add image">
        </li>
    </ul>
</form>
@endsection