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
<div class="p-6 bg-white border-b border-gray-200">
    Portfolios
</div>
<ul>
    @foreach($portfolios as $portfolio)
    <li>
        <p>Id : {{ $portfolio->id }}</p>
        <p>Title : {{ $portfolio->title }}</p>
        <p>Url : {{ $portfolio->url }}</p>
        <br>
    </li>
    @endforeach
</ul>
<h2>Formulaire : </h2>
<form class="contact-form" action="{{ @route('dashboard/portfolio/add')}}" method="post">
    @csrf
    <ul class="list-portfolio">
        <li>
            <label for="title">Title of your project :</label>
            <input class="input-portfolio" type="text" id="title" name="title" value="">
        </li>
        <li>
            <label for="url">URL of your project : </label>
            <input class="input-portfolio" type="text" id="url" name="url" value="">
        </li>
        <li>
            <input class="button-portfolio" type="submit" id="submit" name="submit-portfolio" value="Add portfolio">
        </li>
    </ul>
</form>
@endsection