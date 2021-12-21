<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function statisticalViewBorrow()
    {
        $data['allData'] = Borrow::all();
//        $data['classes'] = StudentClass::all();
        return view('backend.statistical.borrow', $data);
    }
}
