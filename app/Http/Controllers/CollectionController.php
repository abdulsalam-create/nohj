<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class CollectionController extends Controller
{
    public function AllCollection() {
        $allcollection = Collection::latest()->get();
        return view('admin.collections.collection', compact('allcollection'));
    }

    public function AddCollection() {
        $id = Auth::user()->id;
        $addcollection = Collection::find($id);
        return view('admin.collections.add_collection', compact('addcollection'));
    }

    public function StoreCollection(Request $request)
    {


            
              Collection::insert([
                 'title' => $request->title,
                  'created_at' => Carbon::now(),

              ]);
              $notification = array(
                'message' => 'Collection Item Added Successfully',
                'alert-type' => 'success'
            );
             
              return redirect()->route('all.collection')->with($notification);

    } // End Method

    public function EditCollection($id) {
       
        $editcollection= Collection::findOrFail($id);
        $allcollection = Collection::where('id', $id)->get();


        return view('admin.collections.edit_collection', compact('editcollection', 'allcollection'));
    }

    public function UpdateCollection(Request $request, $id) {

        $data = Collection::find($id);
        $data->title = $request->title;


     
        $data->save();

        $notification = array(
            'message' => 'Collection Item Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.collection')->with($notification);
    }
}
