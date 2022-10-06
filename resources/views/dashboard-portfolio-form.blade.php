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
<h2 class="title-dashboard">Formulaire</h2>
<div class="content-back-link">
    <a href="{{ @route('dashboard/portfolio')}}" class="back-button">Back</a>
</div>
<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul class="form-list-dashboard">
        <li class="form-items-dashboard">
            <label for="title">Title :</label>
            <input class="input-dashboard" type="text" id="title" name="title" value="{{$title}}">
        </li>
        <li class="form-items-dashboard">
            <label for="description">Description :</label>
            <input class="input-dashboard" type="text" id="description" name="description" value="{{$description}}">
        </li>
        <li class="form-items-dashboard">
            <label for="images">Images :</label>
            <ul class="list-dashboard">
                @foreach ($images as $image)
                <li class="form-items-dashboard">
                    <img class="image-update" src="{{asset($image->url)}}" alt="{{$image->alt}}">
                    <div class="inputs-images">
                        <input class="checkbox-image" type="checkbox" name="checkbox[]" value="{{$image->id}}">
                        <input class="radio-image" type="radio" name="main" value="{{$image->id}}">
                    </div>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit-portfolio" value="Add portfolio">
        </li>
    </ul>
</form>
@endsection