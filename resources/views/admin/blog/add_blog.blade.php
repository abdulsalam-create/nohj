@extends('layouts.admin')
@section('content')
    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="container-fluid pt-4 px-4 ">
            <div class="row g-4">


                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <input type="hidden" name="id" value="">
                        <h6 class="mb-4">Create Blog</h6>
                        <div class="form-floating mb-3">
                            <input type="text" name="title" class="form-control" id="floatingInput"
                                placeholder="name@example.com" value="">
                            <label for="floatingInput">Blog Title</label>
                        </div>

                        <div class="form-floating">
                            <div class="mb-3">
                                <input class="form-control bg-dark" name="b_img" type="file" id="image-upload">
                                <label for="formFile" class="form-label">Select Banner Image</label>
                                <div id="preview-container" class="rounded mod-imgselect"></div>
                            </div>

                        </div>
                        <section>
                            {{-- <div class="form-floating">
                                <div class="form-floating mb-3">
                                    <input type="text" name="desc" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" value="">
                                    <label for="floatingInput">Blog Paragraph</label>
                                </div>

                            </div> --}}

                            <div class="form-floating ">
                                <div class="form-floating mb-3">
                                    <textarea name="desc" id="trumbowyg-editor" placeholder="Start typing here..."></textarea>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="f_title" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" value="">
                                <label for="floatingInput">First header</label>
                            </div>

                            {{-- <div class="form-floating">
                        <div class="form-floating mb-3">
                            <input type="text" name="f_desc" class="form-control" id="floatingInput"
                                placeholder="name@example.com" value="">
                            <label for="floatingInput">First header Paragraph</label>
                        </div>

                    </div> --}}

                            <div class="form-floating ">
                                <div class="form-floating mb-3">
                                    <textarea name="f_desc" id="trumbowyg-editor" placeholder="Start typing here..."></textarea>
                                </div>
                            </div>
                            <div class="form-floating">
                                <div class="mb-3">
                                    <input class="form-control bg-dark" name="f_img" type="file" id="image-upload1">
                                    <label for="formFile" class="form-label">First Section Image</label>
                                    <div id="preview-container1" class="rounded mod-imgselect"></div>
                                </div>

                            </div>
                            <div class="form-floating">
                                <div class="mb-3">
                                    <input class="form-control bg-dark" name="f_img2" type="file" id="image-upload2">
                                    <label for="formFile" class="form-label">First Section Image 2</label>
                                    <div id="preview-container2" class="rounded mod-imgselect"></div>
                                </div>

                            </div>

                        </section>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="category" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Select</option>
                                <option value="td-art">3D Art</option>
                                <option value="branding">Brand Design</option>
                                <option value="nft-art">Nft Art</option>
                                <option value="animations">Animations</option>
                            </select>
                            <label for="floatingSelect">Select Category</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="b_conc" class="form-control" id="floatingInput"
                                placeholder="name@example.com" value="">
                            <label for="floatingInput">Conclusion header</label>
                        </div>

                        {{-- <div class="form-floating">
                            <div class="form-floating mb-3">
                                <input type="text" name="b_conc_d" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" value="">
                                <label for="floatingInput">Conclusion paragraph</label>
                            </div>


                        </div> --}}

                        <div class="form-floating ">
                            <div class="form-floating mb-3">
                                <textarea name="b_conc_d" id="trumbowyg-editor" placeholder="Start typing here..."></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-5">Submit</button>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
