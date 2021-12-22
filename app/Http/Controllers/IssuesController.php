<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\Issues;
use App\Models\Reader;
use App\Models\statistical;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssuesController extends Controller
{
    public function issuesView()
    {
        $data['allData'] = Issues::all();
        $data['borrow'] = Borrow::all();
        $data['borrow_details'] = BorrowDetail::all();
        $data['readers'] = Reader::all();
        $data['books'] = Book::all();
        $data['users'] = User::all();
        return view('backend.borrow.view_issues', $data);
    }

    public function issuesAdd($id)
    {
        $data['readers'] = Reader::all();
        $data['books'] = Book::all();
        $data['borrow'] = Borrow::find($id);
        $data['borrow_details'] = BorrowDetail::all();
        return view('backend.borrow.add_issues', $data);
    }

    public function issuesStore(Request $request)
    {
        $countBook = count($request->book_id);

        if ($countBook != NULL) {
            for ($i = 0; $i < $countBook; $i++) {
                $data_issues_detail = new Issues();
                $data_issues_detail->reader_id = $request->reader_id;
                $data_issues_detail->staff_id = $request->staff_id;
                $data_issues_detail->note = $request->note;
                $data_issues_detail->book_id = $request->book_id[$i];
                $data_issues_detail->issues_detail = $request->issues_detail[$i];
                $data_issues_detail->save();

                $data_book = Book::find($request->book_id[$i]);
                $data_temp = $data_book->amount;
                $data_book->amount = $data_temp - 1;
                $data_book->save();
            }
        }

        // Xử lý phân tích thống kê
        $amount_issue = 0;

        $amount_book = $countBook;

        $idCheck = DB::table('statisticals')
            ->whereDate('date', date('Y-m-d'))->value('id');

        $amountReturn = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_return');

        $amountBookReturn = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_book_return');

        $amountBorrow = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_borrow');

        $amountBookBorrow = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_book_borrow');

        if ($idCheck != null) {
            $statis = statistical::find($idCheck);
            $statis->amount_issue += 1;
            $statis->amount_book_issue += $countBook;
            $statis->date = Carbon::now();
            $statis->amount_return = $amountReturn;
            $statis->amount_book_return = $amountBookReturn;
            $statis->amount_borrow = $amountBorrow;
            $statis->amount_book_borrow = $amountBookBorrow;
            $statis->save();
        } else {
            $amount_issue += 1;
            $statistical = new statistical();
            $statistical->amount_issue = $amount_issue;
            $statistical->amount_book_issue = $amount_book;
            $statistical->date = Carbon::now();
            $statistical->amount_return = 0;
            $statistical->amount_book_return = 0;
            $statistical->amount_borrow = 0;
            $statistical->amount_book_borrow = 0;
            $statistical->save();
        }
        // Kết thúc xử lý phân tích thống kê

        $notification = array(
            'message' => 'Đã ghi lại sự cố!',
            'alert-type' => 'success'
        );
        return redirect()->route('return.add')->with($notification);
    }
}
