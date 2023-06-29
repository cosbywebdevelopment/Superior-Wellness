@extends('layouts.app')
@section('title', 'Dashboard')


@section('content')
    <p>You will find the link for the business contacts in the sidebar navigation, to view each business contact simply click the view button.</p>
    <p>You will then have an option to create a new associated business address, or you can edit saved addresses.
    In both instances the address will be auto completed via the Google places API so to make sure of validation and correct formatting.</p>
    <p>The deliveries link in the navbar when clicked will generate three random addresses from the business contacts, click on the 'Get Planned Route'
    button to view the best route according to Googles Direction Services API, the distance and driving time & at the bottom the total miles and duration
        of the journey.</p>
@endsection

