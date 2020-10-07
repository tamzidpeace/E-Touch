<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::all();
        return view('admin.pages.contact.index', \compact('messages'));
    }

    public function destroy(Request $request)
    {
        try {
            $message = Contact::findOrFail($request->messageID);
            $message->delete();
            return back();
        } catch (Exception $e) {
            return $e;
        }
    }
}
