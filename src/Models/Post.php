<?php

namespace Nuntius\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'nuntius_posts';

    protected $fillable = ['title', 'body'];

    protected $visible = ['id', 'title', 'body', 'published', 'updated_at', 'author'];

    protected $appends = ['author'];

    public function user() {
        return $this->belongsTo(config('nuntius.model.className'));
    }

    public function getAuthorAttribute()
    {
        return $this->user->name;
    }


}
