<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::latest()->paginate(20);

        return view('admin.contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    public function show(Contact $contact): View
    {
        $contact->update(['status' => 'read']);

        return view('admin.contacts.show', [
            'contact' => $contact,
        ]);
    }

    public function update(Contact $contact)
    {
        $data = request()->validate([
            'status' => 'required|in:new,read,resolved',
            'admin_notes' => 'nullable|string',
        ]);

        $contact->update($data);

        return redirect()->route('admin.contacts.index')->with('success', 'Contact mis à jour!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contact supprimé!');
    }
}
