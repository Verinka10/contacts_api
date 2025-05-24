<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Jobs\TelegramNotification;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $contacts = Contact::latest()->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('contacts.create');
    }

    public function store(ContactRequest $request): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('contacts.index')->with('success', 'Created successfully');
    }

    public function show(Contact $contact): \Illuminate\Contracts\View\View
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact): \Illuminate\Contracts\View\View
    {
        return view('contacts.edit', compact('contact'));
    }

    /*public function update(ContactRequest $request, Contact $contact): \Illuminate\Http\RedirectResponse
    {
        $contact->update($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Updated successfully');
    }*/

    /*public function destroy(Contact $contact): \Illuminate\Http\RedirectResponse
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Deleted successfully');
    }*/
}
