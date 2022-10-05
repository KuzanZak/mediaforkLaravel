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
<div class="content-add-link">
    <a href="{{ @route('dashboard/service/create')}}" class="add-button">Add</a>
</div>
<ul class="list-dashboard">
    @foreach($services as $service)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id Service :</span> {{ $service->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Title Service :</span> {{ $service->title }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Description Service :</span> {{ $service->description }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Image service :</span> {{ asset($service->url) }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Text Error Service :</span> {{ $service->Alt }}</p>
        @if($admin === 1)
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
@endsection