<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\Reader;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function readerView()
    {
        $data['allData'] = Reader::all();
        $data['classes'] = StudentClass::all();
        return view('backend.reader.view_reader', $data);
    }

    public function readerDetailView($id)
    {
        $data['reader'] = Reader::find($id);
        $data['classes'] = StudentClass::all();
        $data['borrows'] = Borrow::where('reader_id', $id)->get();
        $data['borrow_details'] = BorrowDetail::all();
        $data['books'] = Book::all();
        return view('backend.reader.view_detail_reader', $data);
    }

    public function readerAdd()
    {
        $data['classes'] = StudentClass::all();
        return view('backend.reader.add_reader', $data);
    }

    public function readerStore(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:readers,name',

        ]);

        $data = new Reader();
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->student_code = $request->student_code;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->class_id = $request->class_id;
        $data->address = $request->address;
        $data->save();

        $data_class = StudentClass::find($data->class_id);
        $data_temp = $data_class->amount_students;
        $data_class->amount_students = $data_temp + 1;
        $data_class->save();

        $notification = array(
            'message' => 'Đã thêm ' . $data->name . ' vào danh sách người đọc!',
            'alert-type' => 'success'
        );
        return redirect()->route('reader.view')->with($notification);
    }

    public function readerEdit($id)
    {
        $editData['reader'] = Reader::find($id);
        $editData['classes'] = StudentClass::all();
        return view('backend.reader.edit_reader', $editData);

    }


    public function readerUpdate(Request $request, $id)
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


    public function readerDelete($id)
    {
        $user = Reader::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Xoá người đọc thành công',
            'alert-type' => 'info'
        );

        return redirect()->route('reader.view')->with($notification);

    }

}
