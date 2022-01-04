<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\Category;
use App\Models\statistical;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StatisticalController extends Controller
{
    public function statisticalViewBorrow()
    {
        $orders = statistical::all();

        return view('backend.statistical.borrow', ['orders' => $orders]);

    }

    public function statisticalView()
    {
        $year = ['2016','2017','2018','2019','2021', '2022'];

        $user = [];
        foreach ($year as $key => $value) {
            $user[] = statistical::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }

        return view('backend.statistical.view_statistical_reader')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }

    public function statisticalViewCategory()
    {
        $data['allData'] = Category::all();
        $dataPoints = [];

        foreach ($data['allData'] as $browser) {

            $dataPoints[] = [
                "name" => $browser['name'],
                "y" => ($browser['amount'])
            ];
        }
        $data['data'] = json_encode($dataPoints);
        return view('backend.statistical.category', $data);

    }

    public function statisticalViewBook(){
        $data['books'] = Book::all();
        $data['borrow_detail'] = BorrowDetail::all();
        return view('backend.statistical.book', $data);

    }
}
