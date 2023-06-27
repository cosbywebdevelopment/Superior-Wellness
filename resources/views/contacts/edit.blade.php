@extends('layouts.app')
@section('title', 'Business Contacts - ' . $contacts->business_name)


@section('content')

    <form action="{{route('contacts.update',$contacts->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="card" style="width: 22rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $contacts->business_name }}</h5>
                <p class="card-text">Contact Name.
                    <input name="contact_name" type="text" class="" value="{{ $contacts->contact_name }}">
                </p>
                <p class="card-text">Business Addresses.</p>
                    @foreach($addresses as $address)
                     <textarea type="text" cols="40" rows="4" name="address[{{ $address->id }}]">
                        {{ $address->address }}
                    </textarea>
                        <br>
                            <span class="">
                                    Billing Address:
                                @if($address->billing)
                                    <input type="hidden" name="billing[{{ $address->id }}]" value="0">
                                    <input name="billing[{{ $address->id }}]" type="checkbox" checked value="1">

                                @else
                                    <input type="hidden" name="billing[{{ $address->id }}]" value="0">
                                    <input name="billing[{{ $address->id }}]" type="checkbox" value="1">

                                @endif
                            </span>
                            <span class="">
                                    Shipping Address:
                                    @if($address->shipping)
                                    <input type="hidden" name="shipping[{{ $address->id }}]" value="0">
                                    <input name="shipping[{{ $address->id }}]" type="checkbox" checked value="1">
                                @else
                                    <input type="hidden" name="shipping[{{ $address->id }}]" value="0">
                                    <input name="shipping[{{ $address->id }}]" type="checkbox" value="1">
                                @endif
                            </span>
                        <br>
                        <br>
                    @endforeach
                @error('contact_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if (session('addresses'))
                    <div class="alert alert-danger">
                        {{ session('addresses') }}
                    </div>
                @endif
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </div>
    </form>
@endsection

