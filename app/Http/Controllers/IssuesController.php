<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\Issues;
use App\Models\Reader;
use App\Models\User;
use Illuminate\Http\Request;

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

        $notification = array(
            'message' => 'Đã ghi lại sự cố!',
            'alert-type' => 'success'
        );
        return redirect()->route('return.add')->with($notification);
    }
}
