<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function profile($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.profile', compact('admin'));
    }
}
