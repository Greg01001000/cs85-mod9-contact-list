{{-- 
This is a Blade comment. It won't appear in the final HTML.
This file is our "master layout" - other pages will extend this template.
--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- 
    @yield creates a "placeholder" that child templates can fill in
    The second parameter ('Prototype Contacts App') is a default value
    --}}
    <title>@yield('title', 'Prototype Contacts App')</title>
    
    {{-- Simple CSS styles to make our site look better --}}
    <style>
        /* CSS styles go here - this makes our website look nicer */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        nav {
            background-color: #333;
            padding: 1rem;
            margin-bottom: 2rem;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            padding: 10px;
        }
        nav a:hover {
            background-color: #555;
        }
        .active {
            background-color: #007bff !important;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    {{-- Navigation menu --}}
    <nav>
        {{-- 
        route('add') generates a URL for the route named 'add'
        This is better than hardcoding URLs like href="/"
        --}}
        
        {{-- Show Contacts link --}}
        <a href="{{ route('contacts.index') }}" 
           class="{{ request()->routeIs('contacts.index') ? 'active' : '' }}">
           Show All Contacts
        </a>
        
        {{-- Add Contact link --}}
        <a href="{{ route('contacts.create') }}" 
           class="{{ request()->routeIs('contacts.create') ? 'active' : '' }}">
           Add a Contact
        </a>
        
        {{--
        EXPLANATION OF ACTIVE STATE:
        - request()->routeIs('add') checks if we're on the 'Add Contact' page
        - The ? : is PHP's "ternary operator" - it's like a short if/else
        - If we're on 'Add Contact' page, add 'active' class, otherwise add nothing
        - The 'active' class makes the link highlighted (see CSS above)
        - show.* means "any route that starts with show."
        --}}
    </nav>

    {{-- Main content area --}}
    <div class="container">
        {{-- 
        @yield('content') is where child templates will put their main content
        Each page template will define what goes in the 'content' section
        --}}
        @yield('content')
    </div>
</body>
</html>