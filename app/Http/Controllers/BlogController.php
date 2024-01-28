<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function Blog()
    {
        $allBlog = Blog::latest()->get();
        return view('blog', compact('allBlog'));
    }
    public function AllBlog()
    {
        $allBlog = Blog::latest()->get();
        return view('admin.blog.all_blog', compact('allBlog'));
    }

    public function AddBlog()
    {
        $id = Auth::user()->id;
        $addBlog = Blog::find($id);
        return view('admin.blog.add_Blog', compact('addBlog'));
    }

    public function StoreBlog(Request $request)
    {
        $b_img = $request->file('b_img');
        $f_img = $request->file('f_img');
        $f_img2 = $request->file('f_img2');

        $path = '';

        # code...

        $name_gen1 = hexdec(uniqid()) . '.' . $b_img->getClientOriginalExtension(); // 343434.png
        $name_gen2 = hexdec(uniqid()) . '.' . $f_img->getClientOriginalExtension(); // 343434.png
        $name_gen3 = hexdec(uniqid()) . '.' . $f_img2->getClientOriginalExtension(); // 343434.png

        Image::make($b_img)->sharpen(3)->save('upload/blogs/' . $name_gen1);
        Image::make($f_img)->sharpen(3)->save('upload/blogs/' . $name_gen2);
        Image::make($f_img2)->sharpen(3)->save('upload/blogs/' . $name_gen3);
        $save_url_b = 'upload/blogs/' . $name_gen1;
        $save_url_f = 'upload/blogs/' . $name_gen2;
        $save_url_f2 = 'upload/blogs/' . $name_gen3;

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Validate the uploaded file
            $request->validate([
                'video' => 'required|mimetypes:video/mp4,video/avi,video/mov,video/mpeg,video/quicktime|max:500000'
            ]);


            // Store the new video file in the storage/app/public directory
            $path = $file->storeAs('upload/video', $file->getClientOriginalName());
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('upload/video'), $fileName);
        }
        Blog::insert([
            'title' => $request->title,
            'b_img' => $save_url_b,
            'b_desc' => $request->desc,
            'b_title1' => $request->f_title,
            'b_desc1' => $request->f_desc,
            'category' => $request->category,
            'f_img' => $save_url_f,
            'f_img2' => $save_url_f2,
            'b_conc' => $request->b_conc,
            'b_conc_d' => $request->b_conc_d,
            // 'link' => $path,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Blog Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    } // End Method

    public function EditBlog($id)
    {

        $editBlog = Blog::findOrFail($id);
        $allBlog = Blog::where('id', $id)->get();


        return view('admin.blog.edit_blog', compact('editBlog', 'allBlog'));
    }

    public function UpdateBlog(Request $request, $id)
    {

        $data = Blog::find($id);
        $data->title = $request->title;
        $data->b_desc = $request->desc;
        $data->b_title1 = $request->f_title;
        $data->b_desc1 = $request->f_desc;
        $data->b_conc = $request->b_conc;
        $data->b_conc_d = $request->b_conc_d;
        // 'link' => $path,
        $data->updated_at = Carbon::now();



        if ($request->file('b_img')) {
            $file = $request->file('b_img');

            @unlink(public_path('upload/blogs/' . $data->b_img));

            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
            Image::make($file)->sharpen(3)->save('upload/blogs/' . $name_gen);
            $save_url_b = 'upload/blogs/' . $name_gen;
            $data['b_img'] = $save_url_b;
        }

        if ($request->file('f_img')) {
            $file = $request->file('f_img');

            @unlink(public_path('upload/blogs/' . $data->f_img));

            $name_gen1 = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
            Image::make($file)->sharpen(3)->save('upload/blogs/' . $name_gen1);
            $f_img = 'upload/blogs/' . $name_gen1;
            $data['f_img'] = $f_img;
        }

        if ($request->file('f_img2')) {
            $file = $request->file('f_img2');

            @unlink(public_path('upload/blogs/' . $data->f_img2));

            $name_gen2 = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
            Image::make($file)->sharpen(3)->save('upload/blogs/' . $name_gen2);
            $img_i2 = 'upload/blogs/' . $name_gen2;
            $data['f_img2'] = $img_i2;
        }



        $data->save();

        $notification = array(
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    }

    public function DeleteBlog($id)
    {

        $polls = Blog::findOrFail($id);
        $img = $polls->Blog_image;
        @unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
}
