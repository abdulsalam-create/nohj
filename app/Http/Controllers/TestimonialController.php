<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function AllTestimonial() {
        $alltestimonial = Testimonial::latest()->get();
        return view('admin.all_testimonial', compact('alltestimonial'));
    }

    public function EditTestimonial($id) {
       
        $editestimonial= Testimonial::findOrFail($id);
        $alltestimonial = Testimonial::where('id', $id)->get();


        return view('admin.testimonial_edit', compact('editestimonial', 'alltestimonial'));
    }

    public function UpdateTestimonial(Request $request, $id) {

        $data = Testimonial::find($id);
        $data->description = $request->desc;
        $data->name = $request->name;
        $data->tag = $request->tag;


        $data->save();
        $notification = array(
            'message' => 'Testimonial Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testimonial')->with($notification);
    }

}
