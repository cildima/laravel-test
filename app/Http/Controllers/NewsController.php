<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function edit ($id = null) {
        $news = News::where('id', $id)->first();
        $news = empty($news) ? new News() : $news;
        return view('news.edit', ['news' => $news]);
    }

    public function save (Request $request)
    {
        $request->validate([
            'id' => 'numeric|nullable',
            'title' => 'required|max:255',
            'publish_date' => 'required|date_format:Y-m-d',
            'preview_text' => 'required',
            'detail_text' => 'nullable',
            'picture' => 'array|image|nullable'
        ]);
        if (!empty($request->id))
            $news = News::where('id', $request->id)->first();
        else
            $news = new News();
        $news->title = $request->title;
        $news->publish_date = $request->publish_date;
        $news->preview_text = $request->preview_text;
        $news->detail_text = $request->detail_text;
        $news->picture = $request->picture;
        $news->save();
        return back();
    }
}
