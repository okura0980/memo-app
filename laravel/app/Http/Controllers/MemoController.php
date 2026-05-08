<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Tag;

class MemoController extends Controller
{
    public function store(Request $request)
    {
        $memo=Memo::create([
            'content' => $request['content'],
        ]);

        $tags = [];

        foreach ($request->tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $tags[] = $tag->id;
        }

        $memo->tags()->sync($tags);

        return response()->json(['message' => 'ok!!!']);
    }

    public function add_memo()
    {
        return Memo::with('tags')->latest()->get();
    }

    public function delete($id)
    {
        Memo::findOrFail($id)->delete();

        return response()->json(['message' => 'deleted']);
    }
}
