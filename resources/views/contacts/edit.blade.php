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
                     <textarea type="text" cols="40" rows="4" name="contacts.address">
                        {{ $address->address }}
                    </textarea>
                            <span class="fw-bold">{{ $address->address }}</span>
                        <br>
                            <span class="">
                                    Billing Address:
                                    <input name="contacts.billing" type="checkbox" @if($address->billing) checked @endif></span>
                            </span>
                            <span class="">
                                    Shipping Address:
                                    <input name="contacts.shipping" type="checkbox" @if($address->shipping) checked @endif>
                            </span>
                        <br>
                        <br>
                    @endforeach

                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </div>
    </form>
@endsection

