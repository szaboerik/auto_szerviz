<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SidebarController extends Controller
{
    
public function index()
{
    $sidebar = Sidebar::get();

    return view('pages.sidebar', ['sidebar' => $sidebar]);    
}
}
