<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NewsController extends Controller
{
    function index()
    {
        return view('admin.news.newsList')->with([
            'news' => News::latest()->paginate(6)
        ]);
    }
    function create()
    {
        return view('admin.news.addNews');
    }
    function store(Request $request)
    {
        request()->validate([
            'cover' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2000'],
            'ar_title' => ['required', 'string', 'max:50'],
            'en_title' => ['required', 'string', 'max:50'],
            'ar_description' => ['required', 'string', 'max:255'],
            'en_description' => ['required', 'string', 'max:255'],
        ]);

        $news = News::create([
            'ar_title' => request('ar_title'),
            'en_title' => request('en_title'),
            'ar_description' => request('ar_description'),
            'en_description' => request('en_description'),
        ]);

        if (request('cover')) {
            $news->addMedia(request('cover'))->toMediaCollection("news_cover");
        }
        return redirect()->route("admin.news.list");
    }
    function edit(News $news)
    {
        return view("admin.news.editNews")->with([
            "news" => $news
        ]);
    }
    function update(News $news, Request $request)
    {
        $attr = [];
        request()->validate([
            'cover' => ['image', 'mimes:png,jpg,jpeg,svg', 'max:1000'],
            'ar_title' => ['required', 'string', 'max:150'],
            'en_title' => ['required', 'string', 'max:150'],
            'ar_description' => ['required', 'string', 'max:255'],
            'en_description' => ['required', 'string', 'max:255'],
        ]);

        // get changed data
        if (request('ar_title') != $news->ar_title) $attr = Arr::add($attr, 'ar_title', request('ar_title'));
        if (request('en_title') != $news->en_title) $attr = Arr::add($attr, 'en_title', request('en_title'));
        if (request('ar_description') != $news->ar_description) $attr = Arr::add($attr, 'ar_description', request('ar_description'));
        if (request('en_description') != $news->en_description) $attr = Arr::add($attr, 'en_description', request('en_description'));
        // update member data

        if (count($attr) > 0) $news->update($attr);

        //change cover 
        if ($request->cover_changed === 'true') {
            $news->clearMediaCollection("news_cover");
            $news->addMedia(request('cover'))->toMediaCollection("news_cover");
        }

        return redirect()->route("admin.news.list");
    }
    function destroy(News $news)
    {
        if ($news) $news->delete();
        return redirect()->back();
    }
}
