<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getName()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.body.sidebar',compact('user'));
    }
}
