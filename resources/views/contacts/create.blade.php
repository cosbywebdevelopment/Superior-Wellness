@extends('layouts.app')
@section('title', 'Business Contacts - ' . $contacts->business_name)


@section('content')

    <form action="{{route('contacts.store',$contacts->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card" style="width: 22rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $contacts->business_name }}</h5>
                <p class="card-text">Contact Name.
                    <input name="contact_name" type="text" class="" value="{{ $contacts->contact_name }}" disabled>
                </p>
                <p class="card-text">Business Addresses.</p>
                     <textarea id="validate_address" class="" type="text" cols="40" rows="4" name="address" required></textarea>
                        <br>
                            <span class="">
                                    Billing Address:
                                    <input name="billing" type="checkbox" value="1">
                            </span>
                        <br>
                        <br>
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

<script>
    // google api places
    function initAutocomplete() {
        autoPickup = new google.maps.places.Autocomplete(
            document.getElementById('validate_address'),
            {
                types: ['address'],
                componentRestrictions: {'country': ['uk']},
                fields: ['place_id', 'geometry', 'address_components']
            });
        // autoDropOff = new google.maps.places.Autocomplete(
        //     document.getElementById('geoDropOff'),
        //     {
        //         types: ['address'],
        //         componentRestrictions: {'country': ['uk']},
        //         fields: ['place_id', 'geometry', 'address_components']
        //     });
        // store geo data
        //autoPickup.addListener('place_changed', onPlacePickup);
        //autoDropOff.addListener('place_changed', onPlaceDropOff);
    }
</script>
