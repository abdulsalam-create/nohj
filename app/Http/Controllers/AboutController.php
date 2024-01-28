<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function About()
    {
        $about = About::latest()->get();
        return view('admin.about.about', compact('about'));
    }

    public function AddAbout(Request $request)
    {
        $id = Auth::user()->id;
        $addAbout = About::find($id);
        return view('admin.about.add_about', compact('addAbout'));
    }


    public function StoreAbout(Request $request)
    {
        $b_img = $request->file('b_img');
       

        $path = '';

        # code...

        $name_gen1 = hexdec(uniqid()) . '.' . $b_img->getClientOriginalExtension(); // 343434.png
      

        Image::make($b_img)->sharpen(3)->save('upload/about/' . $name_gen1);
     
        $save_url_b = 'upload/about/' . $name_gen1;
     


       

          

        
        About::insert([
            'b_img' => $save_url_b,
            'h_1' => $request->h_1,
            'h_1_desc' => $request->h_1_desc,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Blog Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.about')->with($notification);

    } // End Method





    public function EditAbout($id)
    {

        $editimg = About::findOrFail($id);
        $about = About::where('id', $id)->get();


        return view('admin.about.edit_about', compact('editimg', 'about'));
    }

    public function UpdateAbout(Request $request, $id)
    {

        $data = About::find($id);
        $data->h_1 = $request->h_1;
        $data->h_1_desc = $request->h_1_desc;
        $data->updated_at = Carbon::now();



        if ($request->file('b_img')) {
            $file = $request->file('b_img');

            @unlink(public_path('upload/about/' . $data->b_img));

            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
            Image::make($file)->sharpen(3)->save('upload/about/' . $name_gen);
            $save_url_b = 'upload/about/' . $name_gen;
            $data['b_img'] = $save_url_b;
        }

        $data->save();

        $notification = array(
            'message' => 'Image Updated Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.about')->with($notification);
    }

    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
