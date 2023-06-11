<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function downloadBrochure()
    {
        $pathToFile = public_path('downloads/TKI-Membership-Brochure.pdf');
        return response()->file($pathToFile);
    }

}
