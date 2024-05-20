<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
{
    $currentUrl = '/home'; // Establece la URL actual según corresponda
    return view('store.index_ta')->with('currentUrl', $currentUrl);
}
}
