@extends('layouts.app')
@section('title', 'Business Contacts')

@section('content')
    <p>Lists all of your businesses Contacts</p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Business Name</th>
            <th scope="col">Contact Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->business_name }}</td>
                <td>{{ $contact->contact_name }}</td>
                <td>
                    <a href="{{route('contacts.show',$contact->id)}}" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

