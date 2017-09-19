<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function save (Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'publish_date' => 'required|date_format:Y-m-d',
            'preview_text' => 'required',
            'detail_text' => 'nullable',
            'picture' => 'array|image|nullable'
        ]);
        $news = new \App\News;
        $news->title = $request->title;
        $news->publish_date = $request->publish_date;
        $news->preview_text = $request->preview_text;
        $news->detail_text = $request->detail_text;
        $news->picture = $request->picture;
        $news->save();
        return redirect('/');
    }
}
