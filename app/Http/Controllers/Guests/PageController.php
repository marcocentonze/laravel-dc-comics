<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comics;

class PageController extends Controller
{
    public function index()
    {
        $comics = config('comics');

        return view('home', compact('comics'));
    }

    public function comics()
    {
        $comics = config('comics');

        return view('comics', compact('comics'));
    }
}
