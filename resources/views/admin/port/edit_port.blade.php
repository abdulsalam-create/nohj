@extends('layouts.admin')
@section('content')
@foreach($allPort as $item)

<form method="POST" action="{{ route('port.update', $item->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid pt-4 px-4 ">
        <div class="row g-4">


            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <input type="hidden" name="id" value="">
                    <h6 class="mb-4">Add Product</h6>
                    <div class="form-floating">
                        <div class="">
                            <input class="form-control bg-dark" name="b_img" type="file" id="image-upload">
                            <label for="formFile" class="form-label">Select Item Image</label>
                            <div id="preview-container" class="rounded mod-imgselect"></div>
                        </div>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="title" value="{{$item->title}}" class="form-control" id="floatingInput"
                            placeholder="name@example.com" value="">
                        <label for="floatingInput">Item Title</label>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">&#x20A6</span>
                        <input type="text" name="price" value="{{ number_format($item->price, 2, '.', ',') }}" class="form-control" id="nairaInput" aria-label="Amount (to the nearest dollar)">
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="category_id" id="floatingSelect"
                            aria-label="Floating label select example" required>
                            <option selected>Open this select menu</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach

                        </select>
                        <label for="floatingSelect">Select Category</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="collection_id" id="floatingSelect"
                            aria-label="Floating label select example" required>
                            <option selected>Open this select menu</option>
                            @foreach($collections as $collection)
                            <option value="{{ $collection->id }}" {{ $item->collection_id == $collection->id ? 'selected' : '' }}>{{ $collection->title }}</option>
                        @endforeach

                        </select>
                        <label for="floatingSelect">Select Collection</label>
                    </div>



            



                    <button type="submit" class="btn btn-primary mt-5">Submit</button>



                </div>

            </div>
        </div>
    </div>
</form>
@endforeach
@endsection