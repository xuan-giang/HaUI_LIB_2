<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView()
    {
        $data['allData'] = Category::all();
        return view('backend.category.view_category', $data);
    }

    public function categoryAdd()
    {
        return view('backend.category.add_category');
    }

    public function categoryStore(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name',

        ]);

        $data = new Category();
        $data->name = $request->name;
        $data->amount = $request->amount;
        $data->save();

        $notification = array(
            'message' => 'Đã thêm danh mục ' . $data->name . ' thành công!',
            'alert-type' => 'success'
        );
        return redirect()->route('category.view')->with($notification);
    }

    public function categoryEdit($id)
    {
        $editData = Category::find($id);
        return view('backend.category.edit_category', compact('editData'));

    }


    public function categoryUpdate(Request $request, $id)
    {

        $data = Category::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,' . $data->id

        ]);


        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Cập nhật danh mục thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('category.view')->with($notification);
    }


    public function categoryDelete($id)
    {
        $user = Category::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Xoá danh mục thành công',
            'alert-type' => 'info'
        );

        return redirect()->route('category.view')->with($notification);

    }
}
