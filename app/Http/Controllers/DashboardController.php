<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Reader;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardView()
    {
        $data['reader'] = Reader::all();

        return view('admin.dashboard', $data);
    }
}
