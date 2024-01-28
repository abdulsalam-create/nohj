@extends('layouts.admin')
@section('content')
    

      


            <!-- Form Start -->
            @foreach($about as $item)
            <form method="POST" action="{{ route('update.about',$item->id)  }}" enctype="multipart/form-data">
            @csrf

            <div class="container-fluid pt-4 px-4 ">
                <div class="row g-4">
        
        
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <input type="hidden" name="id" value="">
                            <h6 class="mb-4">About Info</h6>
                            <div class="form-floating">
                                <div class="mb-3">
                                    <input class="form-control bg-dark" name="b_img" type="file" id="image-upload">
                                    <label for="formFile" class="form-label">Select Banner Image</label>
                                    <div id="preview-container" class="rounded mod-imgselect"></div>
                                </div>
        
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="h_1" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" value="{{$item->h_1}}">
                                <label for="floatingInput">Header One</label>
                            </div>
        
                            <div class="form-floating ">
                                <div class="form-floating mb-3">
                                    <textarea name="h_1_desc" id="trumbowyg-editor" placeholder="Start typing here...">{{ old('content', $item->h_1_desc) }}</textarea>
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