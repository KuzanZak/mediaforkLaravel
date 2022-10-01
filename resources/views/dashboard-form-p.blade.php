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
        <p class="data-dashboard"><span class="span-title-dashboard">Image Portfolio :</span> {{ $portfolio->url }}</p>
        <hr>
    </li>
    @endforeach
</ul>
<h2 class="title-dashboard">Formulaire</h2>
<form action="{{ @route('dashboard/portfolio/add')}}" method="post">
    @csrf
    <ul class="form-list-dashboard">
        <li class="form-items-dashboard">
            <label for="title">Title of your project :</label>
            <input class="input-dashboard" type="text" id="title" name="title" value="">
        </li>
        <li class="form-items-dashboard">
            <label for="url">URL of your project : </label>
            <input class="input-dashboard" type="text" id="url" name="url" value="">
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit-portfolio" value="Add portfolio">
        </li>
    </ul>
</form>
@endsection