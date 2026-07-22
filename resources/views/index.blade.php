{{-- Extend the master layout --}}
@extends('layout')

{{-- Set the page title --}}
@section('title', 'Contacts List - Prototype')

{{-- Define the main content --}}
@section('content')
    <h1>My Contacts</h1>
    
    {{-- 
    Loop through all contacts using @foreach
    $contacts was passed from the controller's index() method
    Each iteration, $contact will contain one contact from the DB
    --}}
    @foreach($contacts as $contact)
        {{-- 
        Create a styled box for each contact
        The style attribute adds inline CSS for this element
        --}}
        <div style="border: 1px solid #ddd; padding: 15px; margin: 10px 0; border-radius: 5px;">
            {{-- Display the contact name --}}
            <h3>{{ $contact['name'] }}</h3>
            
            {{-- Display the contact description --}}
            <p>{{ $contact['description'] }}</p>
            
            {{-- 
            Create a link to the Edit Contact page
            route('edit', $contact['id']) generates a URL like /edit/1
            The second parameter ($contact['id']) fills in the {id} part of the route
            --}}
            <a href="{{ route('edit', $contact['id']) }}">Edit this contact</a>
        </div>
    @endforeach
    
    {{-- Link to 'Add Contact' page --}}
    <p><a href="{{ route('add') }}">Add New Contact</a></p>
    
    {{--
    LOOP EXPLANATION:
    - @foreach loops through an array
    - $contacts as $contact means "for each item in $contacts, call it $contact"
    - $contact['name'] gets the 'name' value from the current contacts DB
    - @endforeach ends the loop
    - route('edit', $id) passes the ID as a parameter to the route
    --}}
@endsection