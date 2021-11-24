<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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

    public function readerAdd()
    {
        $data['classes'] = StudentClass::all();
        return view('backend.reader.add_reader', $data);
    }

    public function readerStore(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name',

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
        $data->class_id = $request->class_id;
        $data->address = $request->address;
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
