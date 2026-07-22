{{-- Extend the master layout --}}
@extends('layout')

{{-- Set the page title --}}
@section('title', 'Edit Contact - Prototype')

{{-- Define the main content --}}
@section('content')
    <h1>Edit Contact</h1>     
    <form method="POST" action="/contacts"> 
        @csrf 
        
        <div class="form-group"> 
            <label for="name">Name</label> 
            <input type="text"  
                name="name"  
                id="name"  
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name') }}" 
                required> 
            
            {{-- Display field-specific error --}} 
            @error('name') 
                <div class="invalid-feedback"> 
                    {{ $message }} 
                </div> 
            @enderror 
        </div> 
        
        <div class="form-group"> 
            <label for="email">Email Address</label> 
            <input type="text"  
                name="email"  
                id="email"  
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}" 
                required> 
            
            @error('email') 
                <div class="invalid-feedback"> 
                    {{ $message }} 
                </div> 
            @enderror 
        </div> 

        <div class="form-group"> 
            <label for="phone">Phone Number</label> 
            <input type="text"  
                name="phone"  
                id="phone"  
                class="form-control @error('phone') is-invalid @enderror" 
                value="{{ old('phone') }}" 
                required> 
            
            @error('phone') 
                <div class="invalid-feedback"> 
                    {{ $message }} 
                </div> 
            @enderror 
        </div> 
        
        <button type="submit" class="btn btn-primary">Edit Contact</button> 
    </form> 
@endsection