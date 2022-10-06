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
<h2 class="title-dashboard">Portfolios</h2>
<div class="content-add-link">
    <a href="{{ @route('dashboard/portfolio/create')}}" class="add-button">Add</a>
</div>
<ul class="list-dashboard">
    @foreach($portfolios as $portfolio)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $portfolio->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Title :</span> {{ $portfolio->title }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Description :</span> {{ ($portfolio->description) }}</p>
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
@endsection