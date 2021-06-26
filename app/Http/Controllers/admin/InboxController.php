<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

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

    function composer()
    {
        dd("composer");
    }
    function sendMail()
    {
        dd("sendMail");
    }
    function destroy(Message $message)
    {
        if ($message) $message->delete();
        return redirect()->back();
    }
}
