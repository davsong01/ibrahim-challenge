<?php

namespace App\Services;

use App\Models\BlogAdmin;
use Illuminate\Support\Arr;

class BlogAdminService
{
    public function createAdmin($request)
    {
        return BlogAdmin::create([
            'email' => $request['email'],
            'phone' => $request['phone'],
            'name' => $request['name'],
            'password' => bcrypt($request['password'])
        ]);
    }

    public function allAdmin()
    {
        return BlogAdmin::all();
    }
}

?>