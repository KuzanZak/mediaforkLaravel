@extends('dashboard')
@section('content')
<div class="p-6 bg-white border-b border-gray-200">
    Customers
</div>
<ul>
    @foreach($customers as $customer)
    <li>
        <p>Id : {{ $customer->id }}</p>
        <p>Nom : {{ $customer->name }}
        <p>
        <p>Email : {{ $customer->email }}
        <p>
        <p>Message : {{ $customer->message }}
        <p>
            <br>
    </li>
    @endforeach
</ul>
@endsection