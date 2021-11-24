<?php

namespace App\Http\Controllers\Backend\School;

use App\Http\Controllers\Controller;
use App\Models\AssignClass;
use App\Models\Faculty;
use App\Models\StudentClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function classView()
    {
        $data['allData'] = StudentClass::all();
//        $data['faculties'] = Faculty::all();
//        $data['faculty_id'] = Faculty::orderBy('id','desc')->first()->id;
//        dd($data['class_id']);
//        $data['allData1'] = AssignClass::where('faculty_id',$data['faculty_id'])->get();
        return view('backend.class.view_class', $data);
    }

    public function classAdd()
    {
        $data['faculties'] = Faculty::all();

        return view('backend.class.add_class', $data);
    }

    public function classStore(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',

        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->name_school_year = $request->name_school_year;
        $data->amount_students = $request->amount_students;
        $data->teacher_manage = $request->teacher_manage;
        $data->faculty_id = $request->faculty_id;
        $data->save();

        $data_faculty = Faculty::find($data->faculty_id);
        $data_temp = $data_faculty->amount;
        $data_faculty->amount = $data_temp + 1;
        $data_faculty->save();

//        $assign_class = new AssignClass();
//        $assign_class->class_id = $data->id;
//        $assign_class->faculty_id = $request->faculty_id;
//        $assign_class->save();

        $notification = array(
            'message' => 'Đã tạo lớp ' . $data->name . ' thành công!',
            'alert-type' => 'success'
        );
        return redirect()->route('class.view')->with($notification);
    }

    public function classEdit($id)
    {
        $editData['class'] = StudentClass::find($id);
        $editData['faculties'] = Faculty::all();
        return view('backend.class.edit_class', $editData);

    }


    public function classUpdate(Request $request, $class_id)
    {
        DB::transaction(function () use ($request, $class_id) {
            $data = StudentClass::find($class_id);

            $validatedData = $request->validate([
                'name' => 'required|unique:student_classes,name,' . $data->id

            ]);

            $data->name = $request->name;
            $data->name_school_year = $request->name_school_year;
            $data->amount_students = $request->amount_students;
            $data->teacher_manage = $request->teacher_manage;

            if ($data->faculty_id != $request->faculty_id) {
                // Tăng amount trong Faculty mỡi
                $data_faculty1 = Faculty::find($request->faculty_id);
                $data_temp = $data_faculty1->amount;
                $data_faculty1->amount = $data_temp + 1;
                $data_faculty1->save();

                // Giảm amount trong Faculty cũ
                $data_faculty2 = Faculty::find($data->faculty_id);
                $data_temp = $data_faculty2->amount;
                if ($data_temp != 0) {
                    $data_faculty2->amount = $data_temp - 1;
                } else {
                    $data_faculty2->amount = 0;
                }
                $data_faculty2->save();
            }

            $data->faculty_id = $request->faculty_id;
//
//            $assign_class = AssignClass::where('id', $request->id)->where('class_id', $class_id)->first();
//
//            $assign_class->faculty_id = $request->faculty_id;
//
//            $assign_class->save();

            $data->save();
        });

        $notification = array(
            'message' => 'Cập nhật lớp thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('class.view')->with($notification);
    }


    public function classDelete($id)
    {
        $user = StudentClass::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Xoá lớp học thành công',
            'alert-type' => 'info'
        );

        return redirect()->route('class.view')->with($notification);

    }


}
