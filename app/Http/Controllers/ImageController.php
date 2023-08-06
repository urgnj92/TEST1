<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $dir = 'img';

        $request->file('img_path')->store('public/'. $dir);

        return redirect('/');
    }
}
