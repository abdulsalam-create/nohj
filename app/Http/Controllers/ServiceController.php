<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\services;

class ServiceController extends Controller
{
    public function AllServices() {
        $id = Auth::user()->id;
        $allservice = Services::all();
 

        return view('admin.service', compact('allservice',));
    }
    public function EditServices($id) {
       
        $editservice= Services::findOrFail($id);
        $allservice = Services::where('id', $id)->get();


        return view('admin.service_edit', compact('editservice', 'allservice'));
    }

    public function ServiceSubmit(Request $request, $id) {


        services::where('id', $id)
                ->update(['service_title' => $request->input('title'),
                         'service_desc'=>$request->input('description'),
                        ]
                        );
                        $notification = array(
                            'message' => 'Service Updated Successfully',
                            'alert-type' => 'success'
                        );

  
        return redirect()->route('all.service')->with($notification);
    }
}
