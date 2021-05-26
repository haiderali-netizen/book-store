<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function fileUpload($destination, $file)
    {
        $file_name = date('Y-m-d') . 'T' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($destination, $file_name);

        return env('APP_URL') . $destination . $file_name;
    }
}
