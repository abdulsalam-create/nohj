<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Products;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function AllPort()
    {
        $allPort = Products::latest()->get();
        return view('admin.port.all_port', compact('allPort'));
    }

    public function AddPort(Request $request)
    {
        $id = Auth::user()->id;
        $addPort = Products::find($id);
        $categories = Category::all();
        $collections = Collection::all();
        return view('admin.port.add_port', compact('addPort', 'categories', 'collections'));
    }

    public function StorePort(Request $request)
    {



     

        
        $b_img = $request->file('b_img');


        $name_gen1 = hexdec(uniqid()) . '.' . $b_img->getClientOriginalExtension(); // 343434.png

        Image::make($b_img)->sharpen(3)->save('upload/Products/' . $name_gen1);

        $save_url_b = 'upload/Products/' . $name_gen1;


        // if ($request->hasFile('video')) {
        //     $file = $request->file('video');

        //     // Validate the uploaded file
        //     $request->validate([
        //         'video' => 'required|mimetypes:video/mp4,video/avi,video/mov,video/mpeg,video/quicktime|max:500000'
        //     ]);


        // Store the new video file in the storage/app/public directory
        // $path = $file->storeAs('upload/video', $file->getClientOriginalName());
        // $fileName = $file->getClientOriginalName();
        // $file->move(public_path('upload/video'), $fileName);


        // Create a new product
    $product = new Products([
        'title' => $request->input('title'),
        'price' => (float) str_replace(',', '', $request->input('price')),
        'category_id' => $request->input('category_id'),
        'collection_id' => $request->input('collection_id'),
        'b_img' => $save_url_b,
    ]);

    $product->save();

        $notification = array(
            'message' => 'Products Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.port')->with($notification);
    }

    public function EditPort($id)
    {

        $editPort = Products::findOrFail($id);
        $allPort = Products::where('id', $id)->get();
        $categories = Category::all();
        $collections = Collection::all();

        return view('admin.port.edit_port', compact('editPort', 'allPort', 'categories', 'collections'));
    }

    public function UpdatePort(Request $request, $id)
    {   

        $product = Products::findOrFail($id);
            if ($request->hasFile('image')) {
        $b_img = $request->file('b_img');


        $name_gen1 = hexdec(uniqid()) . '.' . $b_img->getClientOriginalExtension(); // 343434.png

        Image::make($b_img)->sharpen(3)->save('upload/Products/' . $name_gen1);

        $save_url_b = 'upload/Products/' . $name_gen1;
        $product->image = $save_url_b;
            }


        // if ($request->hasFile('video')) {
        //     $file = $request->file('video');

        //     // Validate the uploaded file
        //     $request->validate([
        //         'video' => 'required|mimetypes:video/mp4,video/avi,video/mov,video/mpeg,video/quicktime|max:500000'
        //     ]);


        // Store the new video file in the storage/app/public directory
        // $path = $file->storeAs('upload/video', $file->getClientOriginalName());
        // $fileName = $file->getClientOriginalName();
        // $file->move(public_path('upload/video'), $fileName);


        
     // Update the product fields
     $product->title = $request->input('title');
     $product->price = (float) str_replace(',', '', $request->input('price'));
     $product->category_id = $request->input('category_id');
     $product->collection_id = $request->input('collection_id');

    
    $notification = array(
        'message' => 'Products Updated Successfully',
        'alert-type' => 'success'
    );
    $product->save();

        return redirect()->route('all.port')->with($notification);
    }
}
