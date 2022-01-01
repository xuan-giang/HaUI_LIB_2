<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\statistical;
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
        $record = statistical::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();

        $data = [];

        foreach($record as $row) {
            $data['label'][] = $row->name;
            $data['data'][] = (int) $row->id;
        }

        $data['chart_data'] = json_encode($data);
        return view('backend.statistical.view_statistical_reader', $data);
    }
}
