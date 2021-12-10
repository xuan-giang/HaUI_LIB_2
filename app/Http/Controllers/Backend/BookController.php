<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function bookView()
    {
        $data['allData'] = Book::all();
        $data['categories'] = Category::all();
        return view('backend.book.view_book', $data);
    }

    public function bookAdd()
    {
        $data['categories'] = Category::all();
        return view('backend.book.add_book', $data);
    }

    public function bookStore(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:books,name',

        ]);

        $data = new Book();
        $data->name = $request->name;
        $data->author = $request->author;
        $data->publisher = $request->publisher;
        $data->page = $request->page;
        $data->amount = $request->amount;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/book_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/book_images'), $filename);
            $data['image'] = $filename;
        }
        $data->price = $request->price;
        $data->category_id = $request->category_id;
        $data->save();

        $data_category = Category::find($data->category_id);
        $data_temp = $data_category->amount;
        $data_category->amount = $data_temp + 1;
        $data_category->save();

        $notification = array(
            'message' => 'Đã thêm sách ' . $data->name . ' thành công!',
            'alert-type' => 'success'
        );
        return redirect()->route('book.view')->with($notification);
    }

    public function bookEdit($id)
    {
        $editData['book'] = Book::find($id);
        $editData['categories'] = Category::all();
        return view('backend.book.edit_book', $editData);

    }


    public function bookUpdate(Request $request, $id)
    {

        $data = Book::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:books,name,' . $data->id

        ]);

        $data->name = $request->name;
        $data->author = $request->author;
        $data->publisher = $request->publisher;
        $data->page = $request->page;
        $data->amount = $request->amount;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/book_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/book_images'), $filename);
            $data['image'] = $filename;
        }
        $data->price = $request->price;

        if ($data->category_id != $request->category_id) {
            // Tăng amount trong Category mỡi
            $data_category1 = Category::find($request->category_id);
            $data_temp = $data_category1->amount;
            $data_category1->amount = $data_temp + 1;
            $data_category1->save();

            // Giảm amount trong Category cũ
            $data_category2 = Category::find($data->category_id);
            $data_temp = $data_category2->amount;
            if ($data_temp != 0) {
                $data_category2->amount = $data_temp - 1;
            } else {
                $data_category2->amount = 0;
            }
            $data_category2->save();
        }

        $data->category_id = $request->category_id;
        $data->save();
        $notification = array(
            'message' => 'Cập nhật sách thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('book.view')->with($notification);
    }


    public function bookDelete($id)
    {
        $user = Book::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Xoá sách thành công',
            'alert-type' => 'info'
        );

        return redirect()->route('book.view')->with($notification);

    }
}
