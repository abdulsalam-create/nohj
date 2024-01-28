<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function AllCategory() {
        $allCategory = Category::latest()->get();
        return view('admin.category.Category', compact('allCategory'));
    }

    public function AddCategory() {
        $id = Auth::user()->id;
        $addCategory = Category::find($id);
        return view('admin.category.add_category', compact('addCategory'));
    }

    public function StoreCategory(Request $request)
    {

              Category::insert([
                 'title' => $request->title,
                  'created_at' => Carbon::now(),

              ]);
              $notification = array(
                'message' => 'Category Item Added Successfully',
                'alert-type' => 'success'
            );
             
              return redirect()->route('all.category')->with($notification);

    } // End Method

    public function EditCategory($id) {
       
        $editCategory= Category::findOrFail($id);
        $allCategory = Category::where('id', $id)->get();


        return view('admin.category.edit_category', compact('editCategory', 'allCategory'));
    }

    public function UpdateCategory(Request $request, $id) {

        $data = Category::find($id);
        $data->title = $request->title;


     
        $data->save();

        $notification = array(
            'message' => 'Category Item Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }
}
