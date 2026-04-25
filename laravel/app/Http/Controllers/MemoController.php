<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function store(Request $request)
    {
        Memo::create([
            'content' => $request['content'],
        ]);

        return response()->json(['message' => 'ok!!!']);
    }

    public function add_memo()
    {
        return Memo::all();
    }

    public function delete($id)
    {
        Memo::findOrFail($id)->delete();

        return response()->json(['message' => 'deleted']);
    }
}
