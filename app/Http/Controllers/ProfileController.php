<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Profile::all()->sortBy('profile_id');
        return view('profile.index', ['items' => $items]);
    }
}
