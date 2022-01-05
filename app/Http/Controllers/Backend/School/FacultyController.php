<?php

namespace App\Http\Controllers\Backend\School;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use DB;
class FacultyController extends Controller
{
    public function facultyView()
    {
        $data['allData'] = Faculty::all();
        return view('backend.setup.view_faculty', $data);
    }

    public function facultyDetailView($id)
    {
        $data['faculty'] = Faculty::find($id);
        $data['allClass'] = DB::table('student_classes')
            ->where('faculty_id', '=', $id)
            ->get();
        return view('backend.setup.view_detail_faculty', $data);
    }

    public function facultyAdd()
    {
        return view('backend.setup.add_faculty');
    }

    public function facultyStore(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:faculties,name',

        ]);

        $data = new Faculty();
        $data->name = $request->name;
        $data->amount = $request->amount;
        $data->save();

        $notification = array(
            'message' => 'Đã khởi tạo khoa ' . $data->name . '!',
            'alert-type' => 'success'
        );
        return redirect()->route('faculty.view')->with($notification);
    }

    public function facultyEdit($id)
    {
        $editData = Faculty::find($id);
        return view('backend.setup.edit_faculty', compact('editData'));

    }


    public function facultyUpdate(Request $request, $id)
    {

        $data = Faculty::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:faculties,name,' . $data->id

        ]);


        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Cập nhật thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('faculty.view')->with($notification);
    }


    public function facultyDelete($id)
    {
        $user = Faculty::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Xoá thành công',
            'alert-type' => 'info'
        );

        return redirect()->route('faculty.view')->with($notification);

    }
}
