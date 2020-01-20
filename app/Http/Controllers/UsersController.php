<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function avatar(Request $request)
    {
        $file = $request->file('avatar');
        $fileName = $request->input('name');

        Storage::disk('avatars')->put($fileName, $file);
    }
}
