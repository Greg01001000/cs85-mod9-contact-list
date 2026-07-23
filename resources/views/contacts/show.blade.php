{{-- Extend the master layout --}}
@extends('layouts.layout')

{{-- Set the page title --}}
@section('title', 'Show Contact - Prototype')

{{-- Define the main content --}}
@section('content')
    <h1>Show Contact</h1>     
        <div style="border: 1px solid #ddd; padding: 15px; margin: 10px 0; border-radius: 5px;">
            {{-- Display the contact name --}}
            <h3>{{ $contact['name'] }}</h3>
            
            {{-- Display the contact email address --}}
            <p>{{ $contact['email'] }}</p>
            
            {{-- Display the contact phone number --}}
            <p>{{ $contact['phone'] }}</p>
            
            {{-- 
            Create a link to the Edit Contact page
            route('edit', $contact['id']) generates a URL like /edit/1
            The second parameter ($contact['id']) fills in the {id} part of the route
            --}}
            <a href="{{ route('contacts.edit', $contact->id) }}">Edit this contact</a>
        </div>
@endsection