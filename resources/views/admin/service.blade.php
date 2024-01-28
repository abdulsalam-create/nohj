@extends('layouts.admin')
@section('content')


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Home services</h6>
           
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                    
                                    <th scope="col">Service Title</th>
                                    <th scope="col">Description</th>
                                 
                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allservice as $item)
                                <tr>
                                    <td>{{$item->service_title}}</td>
                                    <td>{{$item->service_desc}}</td>
                                   
                                    
                                    <td><a class="btn btn-sm btn-primary" href="{{ route('edit.service',$item->id) }}">Detail</a></td>
                                </tr>
                                @endforeach
                          
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
@endsection
