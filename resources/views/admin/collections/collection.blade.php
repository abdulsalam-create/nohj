@extends('layouts.admin')
@section('content')


<div class="container-fluid pt-4 px-4">
    
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">All Collections</h6>
            <a href="{{ route('add.collection') }}">Add New Collection</a>
        </div>  
        <div class="d-flex align-items-center justify-content-between mb-4">
            
            
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                                

                        <th scope="col">Title</th>
                        

                        

                      
                    
                      
                                                          
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allcollection as $item)
                    <tr>
                        {{-- <td> <img src="{{url($item->img)}}" class="rounded-sm avatar-lg img-fluid" style="width: 150px !important;"> </td>
                        <td>{{ $item->category }}</td> --}}
                        
                        <td>{{ $item->title }}</td>
                      
                       
                        
                        <td><a class="btn btn-sm btn-primary" href="{{ route('edit.collection',$item->id) }}">Detail</a></td>
                    </tr>
                    @endforeach
              
                    
                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection