<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;

Route::post('/memos', [MemoController::class, 'store']);
Route::post('/memos', [MemoController::class, 'store']);
