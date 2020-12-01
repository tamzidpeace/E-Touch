<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;

use Illuminate\Support\Facades\Mail;
use App\Mail\FeedBackEmail;
use Symfony\Component\HttpFoundation\Response;

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
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function viewMessageAjax(Request $request)
    {
        $message = Contact::findOrFail($request->id);
        return response()->json($message);
    }

    public function getFeedbackEmail(Request $request)
    {
        $contact = Contact::findOrfail($request->id);
        return $contact;
    }

    public function giveFeedback(Request $request)
    {
        
        $request->validate([
            'feeback_email' => 'required|email',
            'feedback' => 'required|string'
        ]);

        $email = $request->feeback_email;
   
        $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.positronx.io',
            'feedback' => $request->feedback,
        ];
  
        Mail::to($email)->send(new FeedBackEmail($mailData));
           

        return back()->withSuccess('Eamil has sent!');
    }
}
