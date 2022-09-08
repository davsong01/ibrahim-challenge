<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Foundation\Auth\User as Authenticatable;


class BlogAdmin extends Authenticatable
{
    use HasFactory, Uuids;

    protected $table = 'blog_admin';

    protected $guard = 'blogadmin';


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    public function post()
    {
        return $this->hasMany(Posts::class, 'user_id');
    }

    public function getAuthPassword(){
        return $this->client_password;
    }
}
