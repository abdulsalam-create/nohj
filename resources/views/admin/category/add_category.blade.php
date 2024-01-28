@extends('layouts.admin')
@section('content')
<form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="container-fluid pt-4 px-4 ">
        <div class="row g-4">


            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <input type="hidden" name="id" value="">
                    <h6 class="mb-4">Create Category</h6>
                   
                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="floatingInput"
                            placeholder="name@example.com" value="">
                        <label for="floatingInput">Item Title</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Submit</button>



                </div>

            </div>
        </div>
    </div>
</form>
@endsection