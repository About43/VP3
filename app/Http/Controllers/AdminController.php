<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function categories()
    {
        return view('admin.categories');
    }

    public function orders()
    {
        return view('admin.orders');
    }
}
