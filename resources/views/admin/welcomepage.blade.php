<x-app-layout>
    <style>
        .fixed-top {
    position: relative;
}
    </style>
    <x-slot name="header">

        <div style="justify-content: space-between;display:flex;align-items: center">
            <h2 style="display: flex;
            align-items: center;
            gap: 16px;" class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{route('dashboard')}}">Dashboard /</a> {{ __('Edit Welcome Page') }}                    <img width="100" height="100" src="{{asset('storage/'.$welcomes->logo_path)}}" alt="">
            </h2>
            <h2>
                <a href="{{route('index')}}">HOME</a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form style="margin: 50px" action="{{route('update.welcome')}}"  class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT') 
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">NAME</label>
                    <input name="name" type="text" class="form-control" id="validationCustom01" value="{{$welcomes->name}}" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">LOGO</label>
                    <input name="logo_path" type="file" class="form-control" aria-label="file example" required>
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                    <br>
                    <img width="50" height="50" src="{{asset('storage/'.$welcomes->logo_path)}}" alt="">
                    @error('logo_path')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div  class="mb-3">
                    <label for="validationCustom01" class="form-label">HIGHT LIGHT</label>
                    <input name="hight_light" type="text" class="form-control" id="validationCustom01" value="{{$welcomes->hight_light}}" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('hight_light')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="validationTextarea" class="form-label">DESCRIPTION</label>
                    <textarea name="description" class="form-control" id="validationTextarea" placeholder="Required example textarea" required>
                        {{$welcomes->description}}
                    </textarea>
                    <div class="invalid-feedback">
                        Please enter a message in the textarea.
                    </div>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">MAIN IMAGE</label>
                    <input name="main_path" type="file" class="form-control" aria-label="file example" required>
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                    <br>
                    <img width="50" height="50" src="{{asset('storage/'.$welcomes->main_path)}}" alt="">
                    @error('main_path')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
            </div>
        </div>
            <!-- ======= Header ======= -->
    <header style="margin-top: 100px"  id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('storage/' . $welcomes->logo_path) }}" alt="">
                <h1>{{ $welcomes->name }}<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#chefs">Chefs</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

            <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">
                        <n1br2> {{ $welcomes->hight_light }}</n1br2>
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="100">
                        <n1br2> {{ $welcomes->description }}</n1br2>
                    </p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="#contact" class="btn-book-a-table">Book a Table</a>
                        {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ asset('storage/' . $welcomes->main_path) }}" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    </div>
</x-app-layout>
