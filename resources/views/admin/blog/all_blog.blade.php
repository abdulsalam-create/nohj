@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">All Blogs</h6>
                <a href="{{ route('add.blog') }}">Add New Blog</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">

                            <th scope="col">Id</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Blog Banner</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Date Updated</th>




                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allBlog as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td> <img src="{{ url($item->b_img) }}" class="rounded-sm avatar-lg img-fluid"
                                        style="width: 150px !important;"> </td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>




                                <td><a class="btn btn-sm btn-primary"
                                        href="{{ route('blog.edit', $item->id) }}">Detail</a>
                                         {{-- <a
                                        class="btn btn-sm btn-primary"
                                        href="{{ route('portfolio.delete', $item->id) }}">Delete</a> --}}
                                    </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
