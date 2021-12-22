<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\Reader;
use App\Models\ReturnDetail;
use App\Models\statistical;
use App\Models\StudentClass;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use PDF;
use function Illuminate\Support\Facades\Request;

class BorrowController extends Controller
{
    public function borrowView()
    {
        $data['allData'] = Borrow::all();
        $data['borrow_details'] = BorrowDetail::all();
        $data['readers'] = Reader::all();
        $data['readers'] = Reader::all();
        $data['books'] = Book::all();
        return view('backend.borrow.view_borrow', $data);
    }

    public function borrowAdd()
    {
        $data['readers'] = Reader::all();
        $data['books'] = Book::all();
        return view('backend.borrow.add_borrow', $data);
    }

    public function returnAdd()
    {
        $data['allData'] = Borrow::all();
        $data['borrow_details'] = BorrowDetail::all();
        $data['readers'] = Reader::all();
        $data['books'] = Book::all();
        return view('backend.borrow.add_return', $data);
    }

    public function borrowStore(Request $request)
    {
        $CHECK_STATUS_AMOUNT_BOOK = 0;
        $NOTIFICATION_NULL_BOOK = "";

        $amount_book = 0;
        $amount_borrow = 0;

        $countBook = count($request->book_id);

        $data_borrow = new Borrow();
        $data_borrow->reader_id = $request->reader_id;
        $data_borrow->staff_id = $request->staff_id;
        $data_borrow->status = $request->status;
        $data_borrow->note = $request->note;

        $data_borrow->save();

        // Xử lý phân tích thống kê
        $amount_borrow = 0;

        $amount_book = $countBook;

        $idCheck = DB::table('statisticals')
            ->whereDate('date', date('Y-m-d'))->value('id');

        $amountReturn = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_return');

        $amountBookReturn = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_book_return');

        $amountIssue = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_issue');

        $amountBookIssue = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_book_issue');

        if ($idCheck != null) {
            $statis = statistical::find($idCheck);
            $statis->amount_borrow += 1;
            $statis->amount_book_borrow += $countBook;
            $statis->date = Carbon::now();
            $statis->amount_return = $amountReturn;
            $statis->amount_book_return = $amountBookReturn;
            $statis->amount_issue = $amountIssue;
            $statis->amount_book_issue = $amountBookIssue;
            $statis->save();
        } else {
            $amount_borrow += 1;
            $statistical = new statistical();
            $statistical->amount_borrow = $amount_borrow;
            $statistical->amount_book_borrow = $amount_book;
            $statistical->date = Carbon::now();
            $statistical->amount_return = 0;
            $statistical->amount_book_return = 0;
            $statistical->amount_issue = 0;
            $statistical->amount_book_issue = 0;
            $statistical->save();
        }
        // Kết thúc xử lý phân tích thống kê

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

    public function borrowStoreReturn(Request $request)
    {
        $CHECK_STATUS_AMOUNT_BOOK = 0;
        $NOTIFICATION_NULL_BOOK = "";

        $countBook = count($request->book_id);

        $data_borrow = Borrow::find($request->borrow_id);
        $data_borrow->status = $request->status;

        $data_borrow->save();


        if ($countBook != NULL) {
            for ($i = 0; $i < $countBook; $i++) {
                $data_return_detail = new ReturnDetail();
                $data_return_detail->borrow_id = $data_borrow->id;
                $data_return_detail->book_id = $request->book_id[$i];
                $data_return_detail->staff_id = $request->staff_id;
                $data_return_detail->save();

                $data_book = Book::find($request->book_id[$i]);
                $data_temp = $data_book->amount;
                $data_book->amount = $data_temp + 1;
                $data_book->save();
            }
        }

// Xử lý phân tích thống kê
        $amount_return = 0;

        $amount_book = $countBook;

        $idCheck = DB::table('statisticals')
            ->whereDate('date', date('Y-m-d'))->value('id');

        $amountBorrow = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_borrow');

        $amountBookBorrow = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_book_borrow');

        $amountIssue = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_issue');

        $amountBookIssue = DB::table('statisticals')
            ->where('id', $idCheck)->value('amount_book_issue');

        if ($idCheck != null) {
            $statis = statistical::find($idCheck);
            $statis->amount_return += 1;
            $statis->amount_book_return += $countBook;
            $statis->date = Carbon::now();
            $statis->amount_borrow = $amountBorrow;
            $statis->amount_book_borrow = $amountBookBorrow;
            $statis->amount_issue = $amountIssue;
            $statis->amount_book_issue = $amountBookIssue;
            $statis->save();
        } else {
            $amount_return += 1;
            $statistical = new statistical();
            $statistical->amount_return = $amount_return;
            $statistical->amount_book_return = $amount_book;
            $statistical->date = Carbon::now();
            $statistical->amount_borrow = 0;
            $statistical->amount_book_borrow = 0;
            $statistical->amount_issue = 0;
            $statistical->amount_book_issue = 0;
            $statistical->save();
        }
        // Kết thúc xử lý phân tích thống kê

        $notification = array(
            'message' => 'Xác nhận trả thành công!',
            'alert-type' => 'success'
        );
        return redirect()->route('borrow.view')->with($notification);
    }

    public
    function borrowEdit($id)
    {
        $editData['borrow'] = Borrow::find($id);
        $editData['readers'] = Reader::all();
        $editData['books'] = Book::all();
        $editData['borrow_details'] = BorrowDetail::all();
        return view('backend.borrow.edit_borrow', $editData);
    }


    public
    function borrowUpdate(Request $request, $id)
    {

        $data = Reader::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:readers,name,' . $data->id

        ]);

        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->student_code = $request->student_code;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $data->address = $request->address;

        if ($data->class_id != $request->class_id) {
            // Tăng amount trong Class mỡi
            $data_class1 = StudentClass::find($request->class_id);
            $data_temp = $data_class1->amount_students;
            $data_class1->amount_students = $data_temp + 1;
            $data_class1->save();

            // Giảm amount trong Class cũ
            $data_class2 = StudentClass::find($data->class_id);
            $data_temp = $data_class2->amount_students;
            if ($data_temp != 0) {
                $data_class2->amount_students = $data_temp - 1;
            } else {
                $data_class2->amount_students = 0;
            }
            $data_class2->save();
        }

        $data->class_id = $request->class_id;

        $data->save();

        $notification = array(
            'message' => 'Cập nhật người đọc thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('reader.view')->with($notification);
    }


    public
    function readerDelete($id)
    {
        $user = Reader::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Xoá người đọc thành công',
            'alert-type' => 'info'
        );

        return redirect()->route('reader.view')->with($notification);

    }

    public
    function borrowDetail($borrow_id)
    {
        $data['borrow'] = Borrow::find($borrow_id);
        $data['borrow_details'] = BorrowDetail::all()->where('borrow_id', $borrow_id);
        $data['reader'] = Reader::find($data['borrow']->reader_id);
        $data['class'] = StudentClass::find($data['reader']->class_id);
        $data['books'] = Book::all();
        $pdf = PDF::loadView('backend.borrow.view_detail_borrow_pdf', $data);

        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

}
