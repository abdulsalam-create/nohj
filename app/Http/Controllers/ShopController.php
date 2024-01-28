<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ShopController extends Controller
{
    public function AllShop()
    {
        $allshop = Shop::latest()->get();
        return view('admin.shop.all_shop', compact('allshop'));
    }

    public function AddShop()
    {
        $id = Auth::user()->id;
        $addShop = Shop::find($id);
        return view('admin.shop.add_shop', compact('addShop'));
    }


    public function StoreShop(Request $request)
    {
        $b_img = $request->file('b_img');
        $f_img = $request->file('i_sect');
        $f_img2 = $request->file('i_sect2');
        $f_img3 = $request->file('i_sect3');
        $f_img4 = $request->file('i_sect4');

        $path = '';

        # code...

        $name_gen1 = hexdec(uniqid()) . '.' . $b_img->getClientOriginalExtension(); // 343434.png
        $name_gen2 = hexdec(uniqid()) . '.' . $f_img->getClientOriginalExtension(); // 343434.png
        $name_gen3 = hexdec(uniqid()) . '.' . $f_img2->getClientOriginalExtension(); // 343434.png
        $name_gen4 = hexdec(uniqid()) . '.' . $f_img3->getClientOriginalExtension(); // 343434.png
        $name_gen5 = hexdec(uniqid()) . '.' . $f_img4->getClientOriginalExtension(); // 343434.png

        Image::make($b_img)->sharpen(3)->save('upload/shop/' . $name_gen1);
        Image::make($f_img)->sharpen(3)->save('upload/shop/' . $name_gen2);
        Image::make($f_img2)->sharpen(3)->save('upload/shop/' . $name_gen3);
        Image::make($f_img3)->sharpen(3)->save('upload/shop/' . $name_gen4);
        Image::make($f_img4)->sharpen(3)->save('upload/shop/' . $name_gen5);
        $save_url_b = 'upload/shop/' . $name_gen1;
        $save_url_f = 'upload/shop/' . $name_gen2;
        $save_url_f2 = 'upload/shop/' . $name_gen3;
        $save_url_f3 = 'upload/shop/' . $name_gen4;
        $save_url_f4 = 'upload/shop/' . $name_gen5;

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
        Shop::insert([
            'b_img' => $save_url_b,
            'title' => $request->title,
            'title_desc' => $request->title_desc,
            's_img' => $save_url_f,
            's_img2' => $save_url_f2,
            's_img3' => $save_url_f3,
            's_img4' => $save_url_f4,
            // 'link' => $path,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Shop Added Successfully',
            'alert-type' => 'success'
        );
    }

    public function EditShop($id)
    {

        $editshop = shop::findOrFail($id);
        $allshop = shop::where('id', $id)->get();


        return view('admin.shop.edit_shop', compact('editshop', 'allshop'));
    }

    public function Updateshop(Request $request, $id)
    {

        $shop = shop::find($id);
        $shop->title = $request->title;
        $shop->title_desc = $request->title_desc;

        $notification = array(
            'message' => 'shop updated Successfully',
            'alert-type' => 'success'
        );


        if ($request->file('b_img')) {
            $file = $request->file('b_img');

            @unlink(public_path('upload/shop/' . $shop->b_img));

            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
            Image::make($file)->sharpen(3)->save('upload/shop/' . $name_gen);
            $save_url_b = 'upload/shop/' . $name_gen;
            $shop['b_img'] = $save_url_b;

           
        }

        if ($request->file('i_sect')) {
            $file = $request->file('i_sect');

            @unlink(public_path('upload/shop/' . $shop->s_img));

            $name_gen2 = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
            Image::make($file)->sharpen(3)->save('upload/shop/' . $name_gen2);
            $save_url_f = 'upload/shop/' . $name_gen2;
            $shop['s_img'] = $save_url_f;

           
        }

        if ($request->file('i_sect2')) {
            $file = $request->file('i_sect2');

            @unlink(public_path('upload/shop/' . $shop->s_img2));

            $name_gen3 = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
            Image::make($file)->sharpen(3)->save('upload/shop/' . $name_gen3);
            $save_url_f2 = 'upload/shop/' . $name_gen3;
            $shop['s_img2'] = $save_url_f2;

           
        }

        if ($request->file('i_sect3')) {
            $file = $request->file('i_sect3');

            @unlink(public_path('upload/shop/' . $shop->s_img3));

            $name_gen4 = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
            Image::make($file)->sharpen(3)->save('upload/shop/' . $name_gen4);
            $save_url_f3 = 'upload/shop/' . $name_gen4;
            $shop['s_img3'] = $save_url_f3;

           
        }

        if ($request->file('i_sect4')) {
            $file = $request->file('i_sect4');

            @unlink(public_path('upload/shop/' . $shop->s_img4));

            $name_gen5 = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // 343434.png
            Image::make($file)->sharpen(3)->save('upload/shop/' . $name_gen5);
            $save_url_f4 = 'upload/shop/' . $name_gen5;
            $shop['s_img4'] = $save_url_f4;

           
        }

        $shop->save();
        return redirect()->route('all.shop')->with($notification);
        
    }
}
