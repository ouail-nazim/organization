<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\MessageMail;
use App\Models\Message;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InboxController extends Controller
{
    function inbox()
    {
        return view('admin.mailbox.inbox')->with([
            "messages" => Message::where('type', 'receive')->latest()->paginate(6),
            "messagesNotReaded" => Message::where("isReaded", 0)->count()
        ]);
    }
    function favorite()
    {
        return view('admin.mailbox.inbox')->with([
            "messages" => Message::where('type', 'receive')->where("isFavorite", 1)->latest()->paginate(6),
            "messagesNotReaded" => Message::where("isReaded", 0)->count()
        ]);
    }
    function readed()
    {
        return view('admin.mailbox.inbox')->with([
            "messages" => Message::where('type', 'receive')->where("isReaded", 1)->latest()->paginate(6),
            "messagesNotReaded" => Message::where("isReaded", 0)->count()
        ]);
    }
    function trashed()
    {
        return view('admin.mailbox.inbox')->with([
            "messages" => Message::onlyTrashed()->where('type', 'receive')->latest()->paginate(6),
            "messagesNotReaded" => Message::where("isReaded", 0)->count()
        ]);
    }
    function sent()
    {
        return view('admin.mailbox.inbox')->with([
            "messages" => Message::where('type', 'sent')->latest()->paginate(6),
            "messagesNotReaded" => Message::where("isReaded", 0)->count()
        ]);
    }
    function show(Message $message)
    {
        $message->update([
            "isReaded" => 1
        ]);
        return view('admin.mailbox.read')->with([
            "message" => $message,
            "messagesNotReaded" => Message::where("isReaded", 0)->count()
        ]);
    }
    function like(Message $message)
    {
        $message->update([
            "isFavorite" => !$message->isFavorite
        ]);
        return redirect()->back();
    }
    function composer()
    {
        return view('admin.mailbox.create')->with([
            "messagesNotReaded" => Message::where("isReaded", 0)->count()
        ]);
    }
    function sendMail(Request $request)
    {
        request()->validate([
            'to' => ['required', 'email', 'string', 'max:50'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:10000'],
        ]);

        #FIXME:Failed to authenticate on SMTP server with username


        // Mail::to("ouail.cheikhboukal@univ-constantine2.dz")->send(new MessageMail([
        //     'subject' => request('subject'),
        //     'message' => request('message'),
        // ])); 


        Message::create([
            'firstName' => setting("app_name") . " Administrator",
            'lastName' => auth()->user()->email,
            'email' => request('to'),
            'subject' => request('subject'),
            'message' => request('message'),
            'isReaded' => 1,
            'type' => 'sent'
        ]);
        return redirect()->route('admin.home')->with('status', 'Message sent but not to email , just to your bd');
    }
    function destroy(Message $message)
    {
        if ($message) $message->delete();
        return redirect()->route("admin.mailbox.inbox");
    }
    function getPDF(Message $message)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.mailbox.pdf', compact('message'));
        return  $pdf->download($message->email . '.pdf');
    }
}
