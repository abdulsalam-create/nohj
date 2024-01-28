<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Carternimations Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('backend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('backend/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Carternimation</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('frontend/img/hero/hm.jpg') }}" alt="" style="width: 50px; height: 50px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                    <h6 class="mb-0">Carternimation</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                 
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Homepage</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('all.service') }}" class="dropdown-item">Services</a>
                            <a href="{{ route('all.vid') }}" class="dropdown-item">Home Vid</a>
                            <a href="{{ route('all.data') }}" class="dropdown-item">Data</a>
                            <a href="{{ route('all.collection') }}" class="dropdown-item">Img Collection</a>
                            <a href="{{ route('all.testimonial') }}" class="dropdown-item active">Testimonial</a>


                        </div>
                    </div>
                    <a href="{{ route('about.img') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>About</a>
                    <a href="{{ route('all.portfolio') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Portfolio</a>

                    <a href="{{ route('logout.user') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>LogOut</a>
                   
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                
                <div class="navbar-nav align-items-center ms-auto">
             

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link " data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('frontend/img/hero/hm.jpg') }}" alt="" style="width: 50px; height: 50px;">
                            <span class="d-none d-lg-inline-flex">Carternimation</span>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Form Start -->
            @foreach($alltestimonial as $item)
            <form method="POST" action="{{ route('testimonial.update',$item->id)  }}">
            @csrf

            <div class="container-fluid pt-4 px-4 " >
                <div class="row g-4">
               
                  
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                            <h6 class="mb-4">Edit Data</h6>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="desc" placeholder="Leave a comment here"
                                    id="floatingTextarea" style="height: 150px;">{{ $item->description }}</textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                   
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" value="{{ $item->name }}">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="tag" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" value="{{ $item->tag }}">
                                <label for="floatingInput">Tag</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Submit</button>
                        </div>
                    </div>
               
</form>
                   
@endforeach
                  
</div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Carternimations</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('backend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('backend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('backend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('backend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('backend/js/main.js') }}"></script>
</body>

</html>