<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'phone' => 'nullable',
        ]);

        $contact = Contact::create($validatedData);
        return response()->json($contact, 201);
    }

    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,'.$contact->id,
            'phone' => 'nullable',
        ]);

        $contact->update($validatedData);
        return response()->json($contact);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['message' => 'Contact deleted']);
    }
}
