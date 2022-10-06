@extends('dashboard')
@section('pageJs', $pageJs)
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
            <label for="file">Image : </label>
            <input class="input-dashboard {{$hidden}}" type="file" id="file" name="file" value="">
            @if ($edit === 'update')
            <img id="image-update" class="image-update" src="{{$image}}" alt="image">
            <button class="change-button" type="button" id="change-button">change</button>
            @endif
        </li>
        <li class="form-items-dashboard form-update" id="form-item-upload">
            <label for="alt">Alt : </label>
            <input class="input-dashboard" type="text" id="alt" name="alt" value="{{$alt}}">
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit-image" value="{{$value}}">
        </li>
    </ul>
</form>
@endsection