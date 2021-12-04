<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\Reader;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function issuesView()
    {
        $data['allData'] = Borrow::all();
        $data['borrow_details'] = BorrowDetail::all();
//        $data['reader'] = Reader::find($data['allData']->reader_id);
        $data['readers'] = Reader::all();
        $data['books'] = Book::all();
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
        $CHECK_STATUS_AMOUNT_BOOK   = 0;
        $NOTIFICATION_NULL_BOOK     = "";

        $countBook = count($request->book_id);

        $data_borrow = new Borrow();
        $data_borrow->reader_id = $request->reader_id;
        $data_borrow->staff_id = $request->staff_id;
        $data_borrow->status = $request->status;
        $data_borrow->note = $request->note;

        $data_borrow->save();

        if ($countBook != NULL) {
            for ($i = 0; $i < $countBook; $i++) {
                $data_borrow_detail = new BorrowDetail();
                $data_borrow_detail->borrow_id = $data_borrow->id;
                $data_borrow_detail->book_id = $request->book_id[$i];
                $data_borrow_detail->expire_date = $request->expire_date[$i];
                $data_borrow_detail->save();

                $data_book = Book::find($request->book_id[$i]);
                $data_temp = $data_book->amount;
                $data_book->amount = $data_temp - 1;
                $data_book->save();
            }
        }

        $notification = array(
            'message' => 'Đã tạo phiếu mượn thành công!',
            'alert-type' => 'success'
        );
        return redirect()->route('borrow.view')->with($notification);
    }
}
