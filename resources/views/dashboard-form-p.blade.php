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
<div class="title-dashboard">
    Portfolios
</div>
<ul class="list-dashboard">
    @foreach($portfolios as $portfolio)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id Portfolio :</span> {{ $portfolio->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Title Portfolio :</span> {{ $portfolio->title }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Image Portfolio :</span> {{ asset($portfolio->url) }}</p>
        @if ($admin === 1)
        <p class="data-dashboard"><span class="span-title-dashboard">Delete :</span>
            <a href="{{ @route('dashboard/portfolio/delete', $portfolio->id)}}">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
        </p>
        <p class="data-dashboard"><span class="span-title-dashboard">Modify :</span>
            <a href="{{ @route('dashboard/portfolio/edit', $portfolio->id)}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
        </p>
        @endif
        <hr>
    </li>
    @endforeach
</ul>
<h2 class="title-dashboard">Formulaire</h2>
<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul class="form-list-dashboard">
        <li class="form-items-dashboard">
            <label for="title">Title :</label>
            <input class="input-dashboard" type="text" id="title" name="title" value="{{$title}}">
        </li>
        @if($edit === 'add')
        <li class="form-items-dashboard">
            <label for="file">File : </label>
            <input class="input-dashboard" type="file" id="file" name="file" value="">
        </li>
        @endif
        @if ($edit === 'update')
        <li class="form-items-dashboard">
            <label for="image">Image : </label>
            <img class="image-update" src="{{$image}}" alt="image">
            <button type="button">change</button>
        </li>
        @endif
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit-portfolio" value="Add portfolio">
        </li>
    </ul>
</form>
@endsection