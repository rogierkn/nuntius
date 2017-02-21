<?php

namespace Nuntius;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'nuntius_posts';

    protected $fillable = ['title', 'body'];

    public function user() {
        return $this->belongsTo(config('nuntius.model.className'));
    }
}
