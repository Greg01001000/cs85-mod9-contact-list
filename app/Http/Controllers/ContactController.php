<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // First, validate the incoming data 
        $validatedData = $request->validate([ 
            'name' => ['required', 'string', 'max:42', 'regex:/^[\p{L}\p{M}\s\'-,]+$/u'],
            'email' => ['required', 'email', 'unique:contacts,email'],
            'phone' => ['required', 'string', 'regex:/^\+?[0-9]{1,3}[\s-]?(?:\([0-9]{1,4}\)|[0-9]{1,4})[\s-]?[0-9\s-]{4,}$/'],
        ]);  
        
        // If validation passes, create the new contact 
        $contact = Contact::create($validatedData); 
        
        // Redirect to the contact detail page with a success message 
        return redirect()->route('contacts.show', $contact) 
            ->with('success', 'Contact created successfully!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the specific contact or return a 404 error if not found 
        $contact = Contact::findOrFail($id); 
        
        // Pass the contact data to the view so the page can be pre-populated 
        return view('contacts.show', compact('contact')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {      
        // Find the specific contact or return a 404 error if not found 
        $contact = Contact::findOrFail($id); 
        
        // Pass the contact data to the view so the form can be pre-populated 
        return view('contacts.edit', compact('contact')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the contact we're updating 
        $contact = Contact::findOrFail($id); 
        
        // Validate the incoming changes, don't reject validation if user submits same
        // email as before
        $validatedData = $request->validate([ 
            'name' => ['required', 'string', 'max:42', 'regex:/^[\p{L}\p{M}\s\'-,]+$/u'],
            'email' => ['required', 'email', 'unique:contacts,email,' . $id],
            'phone' => ['required', 'string', 'regex:/^\+?[0-9]{1,3}[\s-]?(?:\([0-9]{1,4}\)|[0-9]{1,4})[\s-]?[0-9\s-]{4,}$/'],
        ]); 

        
        // Update the contact with the validated data 
        $contact->update($validatedData); 
        
        // Redirect back to the contact with a success message 
        return redirect()->route('contacts.show', $contact) 
            ->with('success', 'Contact updated successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully!'); 
    }
}
