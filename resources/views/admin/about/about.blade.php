@extends('layouts.admin')
@section('content')

<div class="container-fluid pt-4 px-4">
    
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">About Info</h6>
            <a href="{{ route('add.about') }}">Add New About</a>
        </div>  
        <div class="d-flex align-items-center justify-content-between mb-4">
            
            <h6 class="mb-0">About Info</h6>
            
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
        
                        <th scope="col">Image</th>
                        

                        <th scope="col">Title</th>
                        

                    
                      
                                                          
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($about as $item)
                    <tr>
                        {{-- <td> <img src="{{url($item->img)}}" class="rounded-sm avatar-lg img-fluid" style="width: 150px !important;"> </td>
                        <td>{{ $item->category }}</td> --}}
                        
                       
                        <td><img src="{{ url($item->b_img) }}" class="rounded-sm avatar-lg img-fluid"
                            style="width: 150px !important;"> </td>
                        <td>{{ $item->h_1 }}</td>
                     
                       
                        
                        <td><a class="btn btn-sm btn-primary" href="{{ route('edit.about',$item->id) }}">Detail</a></td>
                    </tr>
                    @endforeach
              
                    
                <h5>Note:for those with the collection category they edit the about info page while those without the collection category edit the "Our works" section in the about page</h5>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection