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
                    @foreach($addresses as $index => $address)
                     <input id="validate{{ $index }}" value="{{ $address->address }}" class="validate_address"
                            size="35" name="address[{{ $address->id }}]">


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
@push('foot')
    <script>
        // google api places
        function initAutocomplete() {
            let input = document.getElementsByClassName('validate_address');
            let i;
            for (i = 0; i < input.length; i++) {
                autocomplete = new google.maps.places.Autocomplete(
                    input[i],
                    {
                        types: ['address'],
                        componentRestrictions: {'country': ['uk']},
                        fields: ['place_id', 'geometry', 'address_components']
                    });
            }
        }
    </script>
    <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4mEYVHOQHayGVyJpsfciUzZiR5QMxbgQ&libraries=places&callback=initAutocomplete">
    </script>
@endpush






</script>

