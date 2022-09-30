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
<h2 class="title-service">
    Services
</h2>
<ul>
    @foreach($services as $service)
    <li>
        <p>Id : {{ $service->id }}</p>
        <p>Title : {{ $service->title }}</p>
        <p>Description : {{ $service->description }}</p>
        <p>Url : {{ $service->url }}</p>
        <p>Alt : {{ $service->Alt }}</p>
        <br>
    </li>
    @endforeach
</ul>
<h2>Formulaire : </h2>
<form class="contact-form" action="{{ @route('dashboard/services/add')}}" method="post">
    @csrf
    <ul class="list-services">
        <li>
            <label for="title">Title of your service :</label>
            <input class="input-portfolio" type="text" id="title" name="title" value="">
        </li>
        <li>
            <label for="paragraph-service">Description : </label>
            <input class="input-portfolio" type="text" id="paragraph" name="paragraph" value="">
        </li>
        <li>
            <label for="icon">Icon url : </label>
            <input class="input-portfolio" type="text" id="icon" name="icon" value="">
        </li>
        <li>
            <label for="alt">Alt : </label>
            <input class="input-portfolio" type="text" id="alt" name="alt" value="">
        </li>
        <li>
            <input class="button-portfolio" type="submit" id="submit" name="submit" value="Add service">
        </li>
    </ul>
</form>
@endsection