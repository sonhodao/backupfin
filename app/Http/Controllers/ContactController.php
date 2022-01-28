<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('accounts.index');
        $contacts = Contact::filter($request->all())
            ->orderByDesc('id')
            ->paginate();
        return view('accounts.contacts', compact('contacts'));
    }
    public function responded($id)
    {
        $contact = Contact::where('id', $id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function noResponseYet($id)
    {
        $contact = Contact::where('id', $id)->update(['status' => 0]);
        return redirect()->back();
    }
}
