@extends('layouts.admin')
@section('content')
@foreach($allshop as $item)

    <form method="POST" action="{{ route('shop.update', $item->id)  }}" enctype="multipart/form-data">
        @csrf

        <div class="container-fluid pt-4 px-4 ">
            <div class="row g-4">


                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <input type="hidden" name="id" value="">
                        <h6 class="mb-4">Edit Shop Item</h6>
                        <div class="form-floating">
                            <div class="">
                                <input class="form-control bg-dark" name="b_img" type="file" id="image-upload">
                                <label for="formFile" class="form-label">Select Item Image</label>
                                <div id="preview-container" class="rounded mod-imgselect"></div>
                            </div>

                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="title" class="form-control" id="floatingInput"
                                placeholder="name@example.com" value="{{$item->title}}">
                            <label for="floatingInput">Item Title</label>
                        </div>

                        <div class="form-floating">
                            <div class="mb-1">
                                <label for="formFile" class="form-label">Item description</label>

                            </div>
                        </div>

                        <div class="form-floating ">
                            <div class="form-floating mb-3">
                                <textarea name="title_desc" id="trumbowyg-editor" placeholder="Start typing here...">{{ old('content', $item->title_desc) }}</textarea>
                            </div>
                        </div>






                        <div class="form-floating">
                            <div class="mb-3">
                                <input class="form-control bg-dark" name="i_sect" type="file" id="image-upload1">
                                <label for="formFile" class="form-label">Select Image One</label>
                                <div id="preview-container1" class="rounded mod-imgselect"></div>
                            </div>

                        </div>

                        {{-- <div class="form-floating">
                            <div class="form-floating mb-3">
                                <input type="text" name="desc" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" value="">
                                <label for="floatingInput">Blog Paragraph</label>
                            </div>

                        </div> --}}



                        {{-- <div class="form-floating">
                    <div class="form-floating mb-3">
                        <input type="text" name="f_desc" class="form-control" id="floatingInput"
                            placeholder="name@example.com" value="">
                        <label for="floatingInput">First header Paragraph</label>
                    </div>

                </div> --}}

                        <div class="form-floating">
                            <div class="mb-3">
                                <input class="form-control bg-dark" name="i_sect2" type="file" id="image-upload2">
                                <label for="formFile" class="form-label">Select Image Two</label>
                                <div id="preview-container2" class="rounded mod-imgselect"></div>
                            </div>

                        </div>
                        <div class="form-floating">
                            <div class="mb-3">
                                <input class="form-control bg-dark" name="i_sect3" type="file" id="image-upload3">
                                <label for="formFile" class="form-label">Select Image Three</label>
                                <div id="preview-container3" class="rounded mod-imgselect"></div>
                            </div>

                        </div>
                        <div class="form-floating">
                            <div class="mb-3">
                                <input class="form-control bg-dark" name="i_sect4" type="file" id="image-upload4">
                                <label for="formFile" class="form-label">Select Image Four</label>
                                <div id="preview-container4" class="rounded mod-imgselect"></div>
                            </div>

                        </div>




                        <button type="submit" class="btn btn-primary mt-5">Submit</button>



                    </div>

                </div>
            </div>
        </div>
    </form>
    @endforeach
@endsection
