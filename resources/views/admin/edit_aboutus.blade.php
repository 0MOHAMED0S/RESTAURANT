
<x-app-layout>
    <x-slot name="header">
        <div style="justify-content: space-between;display:flex;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{route('dashboard')}}">Dashboard</a> / {{ __('Edit About Us') }}
            </h2>
            <h2>
                <a href="{{route('index')}}">HOME</a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form style="margin: 50px" action="{{route('update.aboutus')}}"  class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT') 
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Details</label>
                        <input name="details" type="text" class="form-control" id="validationCustom01" value="{{$aboutus->details}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('Details')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Book Table Number</label>
                        <input name="booktable_number" type="number" class="form-control" id="validationCustom01" value="{{$aboutus->booktable_number}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('booktable_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">First Image</label>
                        <input name="first_path" type="file" class="form-control" aria-label="file example" required>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                        <br>
                        <img width="50" height="50" src="{{asset('storage/'.$aboutus->first_path)}}" alt="">
                        @error('first_path')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Second IMAGE</label>
                        <input name="second_path" type="file" class="form-control" aria-label="file example" required>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                        <br>
                        <img width="50" height="50" src="{{asset('storage/'.$aboutus->second_path)}}" alt="">
                        @error('second_path')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
                
            </div>
        </div>
                <!-- ======= About Section ======= -->
                <section id="about" class="about">
                    <div class="container" data-aos="fade-up">
        
                        <div class="section-header">
                            <h2>About Us</h2>
                            <p>Learn More <span>About Us</span></p>
                        </div>
        
                        <div class="row gy-4">
                            <div class="col-lg-7 position-relative about-img"
                                style="background-image: url('{{ asset('storage/' . $aboutus->first_path) }}') ;"
                                data-aos="fade-up" data-aos-delay="150">
                                <div class="call-us position-absolute">
                                    <h4>Book a Table</h4>
                                    <p>+{{ $aboutus->booktable_number }}</p>
                                </div>
                            </div>
                            <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                                <div class="content ps-0 ps-lg-5">
                                    <ul>
                                        <li><i class="bi bi-check2-all"></i> {{ $aboutus->details }}..</li>
                                    </ul>
                                    <div class="position-relative mt-4">
                                        <img src="{{ asset('storage/' . $aboutus->second_path) }}" class="img-fluid"
                                            alt="">
                                        {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </section><!-- End About Section -->
        
    </div>
</x-app-layout>
