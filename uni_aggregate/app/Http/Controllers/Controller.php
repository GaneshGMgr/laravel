<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload($file, string $path): string
    {
        $original_file_name = $file->getClientOriginalName();
        // save image in public folder
        $file_name = "/uploads/$path/" . time() . "$original_file_name";
        $file->move(public_path("uploads/$path/"), $file_name);
        return $file_name;
    }
}
