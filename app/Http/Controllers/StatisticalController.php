<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\Category;
use App\Models\Reader;
use App\Models\statistical;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StatisticalController extends Controller
{
    public function statisticalViewBorrow(Request $request)
    {
//        if($request->start_date != null)
//        {
//            $start_date = Carbon::parse($request->start_date)
//                ->toDateTimeString();
//
//            $end_date = Carbon::parse($request->end_date)
//                ->toDateTimeString();
//            $orders = statistical::whereBetween('created_at', [
//                $start_date, $end_date
//            ])->get();
//        }else{
//            $orders = statistical::all();
//        }

        $orders = statistical::all();
        return view('backend.statistical.borrow', ['orders' => $orders]);

    }

    public function statisticalStore(Request $request)
    {
        if($request->start_date != null)
        {
            $start_date = Carbon::parse($request->start_date)
                ->toDateTimeString();

            $end_date = Carbon::parse($request->end_date)
                ->toDateTimeString();
            $orders = statistical::whereBetween('created_at', [
                $start_date, $end_date
            ])->get();
        }else{
            $orders = statistical::all();
        }

        return view('backend.statistical.borrow', ['orders' => $orders]);

    }

    public function statisticalView()
    {
        $data['allData'] = Reader::all();
        $dataPoints = [];

        foreach ($data['allData'] as $browser) {

            $dataPoints[] = [
                "name" => $browser['name'],
                "y" => ($browser['amount'])
            ];
        }

        $data['data'] = json_encode($dataPoints);

        return view('backend.statistical.reader', $data);
    }

    public function statisticalViewCategory()
    {

        $name_category = Category::all()->pluck('name');

        $categories = Category::all();
        $amount_borrow = [];
        foreach ($categories as $key => $value) {
            $amount_borrow[] = DB::table('borrow_details')
                ->join('books', 'books.id', '=', 'borrow_details.book_id')
                ->where('category_id', $value->id)->count('*');
        }
        $data['allData'] = Category::all();
        $dataPoints = [];

        foreach ($data['allData'] as $browser) {

            $dataPoints[] = [
                "name" => $browser['name'],
                "y" => ($browser['amount'])
            ];
        }

        $data['data'] = json_encode($dataPoints);
        $data['name_category'] = json_encode($name_category,JSON_NUMERIC_CHECK);
        $data['amount_borrow'] = json_encode($amount_borrow,JSON_NUMERIC_CHECK);
        return view('backend.statistical.category', $data);

    }

    public function statisticalViewBook(){
        $data['books'] = Book::all();
        $data['borrow_detail'] = BorrowDetail::all();
        return view('backend.statistical.book', $data);

    }
}
