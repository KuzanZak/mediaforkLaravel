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
    Customers
</h2>
<ul class="list-dashboard">
    @foreach($customers as $customer)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $customer->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Nom :</span> {{ $customer->name }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Email :</span> {{ $customer->email }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Message :</span> {{ $customer->message }}</p>
        @if (Auth::id() === 1)
        <p class="data-dashboard"><span class="span-title-dashboard">Delete :</span>
            <a href="{{ @route('dashboard/customers/delete', $customer->id)}}">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
        </p>
        @endif
        <br>
    </li>
    @endforeach
</ul>
@endsection