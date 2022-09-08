<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Posts extends Model
{
    use HasFactory, Uuids;

    protected $table = 'posts';

    public function blogadmin()
    {
        return $this->belongsTo(BlogAdmin::class, 'user_id');
    }
}
