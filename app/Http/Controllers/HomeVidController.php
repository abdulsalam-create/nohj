<?php

namespace App\Http\Controllers;

use App\Models\HomeVid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class HomeVidController extends Controller
{
    public function AllVid() {
        $allvid = HomeVid::latest()->get();
        return view('admin.all_vid', compact('allvid'));
    }
    public function AddVid() {
        $id = Auth::user()->id;
        $addvid = HomeVid::find($id);
        return view('admin.add_vid', compact('addvid'));
    }

    public function Store(Request $request)
     {
            $image = $request->file('homevid');

            # code...

               $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 343434.png
               Image::make($image)->sharpen(3)->save('upload/home-img/' . $name_gen);
               $save_url = 'upload/home-img/' . $name_gen;
               HomeVid::insert([
                  'over_text' => $request->title,
                   'over_desc' => $request->desc,
                   'link' => $request->link,
                   'home_img' => $save_url,
                   'created_at' => Carbon::now(),

               ]);
              
               return redirect()->route('all.vid');

     } // End Method

     public function EditVid($id) {
       
        $editvid= HomeVid::findOrFail($id);
        $allvid = HomeVid::where('id', $id)->get();


        return view('admin.homevid_edit', compact('editvid', 'allvid'));
    }

    public function HomevidUpdate(Request $request, $id) {

        $data = HomeVid::find($id);
        $data->over_text = $request->title;
        $data->over_desc = $request->desc;

        
        if ($request->hasFile('video')) {
            $file = $request->file('video');
        
            // Validate the uploaded file
            $request->validate([
                'video' => 'required|mimetypes:video/mp4,video/avi,video/mov,video/mpeg,video/quicktime|max:500000'
            ]);
        
     // Delete the previous video file
     Storage::delete($data->link);
        
            // Store the new video file in the storage/app/public directory
            $path = $file->storeAs('upload/video', $file->getClientOriginalName());
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('upload/video'), $fileName);
         
            // Update the database with the new video path
            $data->link = $path;
        }
        

        




        if ($request->file('homevid')) {
            $file = $request->file('homevid');

            @unlink(public_path('upload/home-img/'.$data->home_img));

            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
               Image::make($file)->sharpen(3)->save('upload/home-img/' . $name_gen);
               $save_url = 'upload/home-img/' . $name_gen;
               $data['home_img'] = $save_url;
        }
        $data->save();

        $notification = array(
            'message' => 'Video Updated Successfully',
            'alert-type' => 'success'
        );
  
        return redirect()->route('all.vid')->with($notification);
    }

}
