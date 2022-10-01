@extends('dashboard')
@section('content')
<div class="title-dashboard">
    Customers
</div>
<ul class="list-dashboard">
    @foreach($customers as $customer)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $customer->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Nom :</span> {{ $customer->name }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Email :</span> {{ $customer->email }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Message :</span> {{ $customer->message }}</p>
        <br>
    </li>
    @endforeach
</ul>
@endsection