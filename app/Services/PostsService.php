<?php

namespace App\Services;

use App\Models\Posts;
use Illuminate\Support\Arr;

class PostsService
{
    public function createPostByform($request)
    {
        return Posts::create([
            'content' => $request->title,
            'userid' => bcrypt($request->password)
        ]);
    }

    public function allPost()
    {
        return Posts::all();
    }
}

?>