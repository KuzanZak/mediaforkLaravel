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
    Services
</h2>
<ul class="list-dashboard">
    @foreach($services as $service)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id Service :</span> {{ $service->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Title Service :</span> {{ $service->title }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Description Service :</span> {{ $service->description }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Image service :</span> {{ $service->url }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Text Error Service :</span> {{ $service->Alt }}</p>
        <hr>
    </li>
    @endforeach
</ul>
<h2 class="title-dashboard">Formulaire</h2>
<form action="{{ @route('dashboard/services/add')}}" method="post">
    @csrf
    <ul class="form-list-dashboard">
        <li class="form-items-dashboard">
            <label for="title">Title Service :</label>
            <input class="input-dashboard" type="text" id="title" name="title" value="">
        </li>
        <li class="form-items-dashboard">
            <label for="paragraph-service">Description Service : </label>
            <input class="input-dashboard" type="text" id="paragraph" name="paragraph" value="">
        </li>
        <li class="form-items-dashboard">
            <label for="icon">Image service : </label>
            <input class="input-dashboard" type="text" id="icon" name="icon" value="">
        </li>
        <li class="form-items-dashboard">
            <label for="alt">Text Error Service : </label>
            <input class="input-dashboard" type="text" id="alt" name="alt" value="">
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit" value="Add service">
        </li>
    </ul>
</form>
@endsection