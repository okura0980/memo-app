<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = ['content'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

