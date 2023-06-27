@extends('layouts.app')
@section('title', 'Business Contacts - ' . $contacts->business_name)


@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="card" style="width: 22rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $contacts->business_name }}</h5>
            <p class="card-text">Contact Name. <span class="fw-bold">{{ $contacts->contact_name }}</span></p>
            <p class="card-text">Business Addresses.</p>
                @foreach($addresses as $address)
                        <span class="fw-bold">{{ $address->address }}</span>
                    <br>
                        <span class="">@if($address->billing)
                                Billing Address:
                                <input type="checkbox" checked disabled> @endif</span>
                        <span class="">@if($address->shipping)
                                Shipping Address:
                                <input type="checkbox" checked disabled> @endif</span>
                    <br>
                    <br>
                @endforeach

            <a href="{{route('contacts.edit',$contacts->id)}}" class="btn btn-warning">Edit Business</a>
        </div>
    </div>
@endsection

