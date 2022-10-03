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
        @if (Auth::id() === 1)
        <p class="data-dashboard"><span class="span-title-dashboard">Delete :</span>
            <a href="{{ @route('dashboard/service/delete', $service->id)}}">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
        </p>
        <p class="data-dashboard"><span class="span-title-dashboard">Modify :</span>
            <a href="{{ @route('dashboard/service/edit', $service->id)}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
        </p>
        @endif
        <hr>
    </li>
    @endforeach
</ul>
<h2 class="title-dashboard">Formulaire</h2>
<form action="{{$action}}" method="post">
    @csrf
    <ul class="form-list-dashboard">
        <li class="form-items-dashboard">
            <label for="title">Title Service :</label>
            <input class="input-dashboard" type="text" id="title" name="title" value="{{$title}}">
        </li>
        <li class="form-items-dashboard">
            <label for="paragraph-service">Description Service : </label>
            <input class="input-dashboard" type="text" id="paragraph" name="paragraph" value="{{$paragraph}}">
        </li>
        <li class="form-items-dashboard">
            <label for="icon">Image service : </label>
            <input class="input-dashboard" type="text" id="icon" name="icon" value="{{$icon}}">
        </li>
        <li class="form-items-dashboard">
            <label for="alt">Text Error Service : </label>
            <input class="input-dashboard" type="text" id="alt" name="alt" value="{{$alt}}">
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit" value="Add service">
        </li>
    </ul>
</form>
@endsection