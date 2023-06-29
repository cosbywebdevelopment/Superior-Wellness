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
                    <input name="contact_name" class="form-control" value="{{ $contacts->contact_name }}" disabled>
                </p>
                <p class="card-text">Business Addresses.</p>
                     <input class="form-control" id="validate_address" size="35" name="address" required>
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
@push('foot')
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
        }
    </script>

    <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4mEYVHOQHayGVyJpsfciUzZiR5QMxbgQ&libraries=places&callback=initAutocomplete">
    </script>
@endpush



