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
    Images
</h2>
<div class="content-add-link">
    <a href="{{ @route('dashboard/image/create')}}" class="add-button">Add</a>
</div>
<ul class="list-dashboard">
    @foreach($images as $image)
    <li class="list-items-dashboard">
        <p class="data-dashboard-img"><img class="image-update" src="{{ asset($image->url) }}"></p>
        <p class="data-dashboard-img"><span class="span-title-dashboard-img">Id :</span> {{ $image->id }}</p>
        <!-- <p class="data-dashboard"><span class="span-title-dashboard">Main :</span> {{ $image->main }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Portofolio id :</span> {{ $image->portfolio_id }}</p> -->
        <hr>
    </li>
    @endforeach
</ul>
@endsection