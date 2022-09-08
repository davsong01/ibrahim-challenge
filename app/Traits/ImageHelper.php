<?php

namespace App\Traits\Image;

use Illuminate\Support\Facades\File;

class ImageHelper
{
    public static function uploadAnything($file, $pathDirectory)
    {
        $image = $file;

        $filename = rand(100000, 9000000).'.'.$image->getClientOriginalExtension();

        $directory = $pathDirectory.'/';

        $path = $directory.$filename;

        File::ensureDirectoryExists($directory, $mode = 0777, true);

        $image->move($directory, $filename);

        return [
            'path' => $path,
            'type' => $image->getClientOriginalExtension(),
        ];
    }

}
