<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\statistical;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StatisticalController extends Controller
{
    public function statisticalViewBorrow()
    {
        $record = statistical::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();

        $data = [];

        foreach($record as $row) {
            $data['label'][] = $row->amount_borrow;
            $data['data'][] = (int) $row->amount_borrow;
        }

        $data['chart_data'] = json_encode($data);
        return view('backend.statistical.borrow', $data);

    }

    public function statisticalView()
    {
        $year = ['2016','2017','2018','2019','2021', '2022'];

        $user = [];
        foreach ($year as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }

        return view('backend.statistical.view_statistical_reader')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }
}
