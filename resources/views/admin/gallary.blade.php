<x-app-layout>
    <x-slot name="header">
        <div style="justify-content: space-between;display:flex;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('dashboard') }}">Dashboard</a> / {{ __('GALLARY') }}
            </h2>
            <h2>
                <a href="{{route('index')}}">HOME</a>
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section id="gallery" class="gallery section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <p> <span> Gallery                 @include('admin.addgallary')
                        </span></p>
                    </div>  <div style="    max-width: 600px;
                    max-height: 444px;" class="gallery-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach ($gallarys as $gallary )
                                    <div class="carousel-item active">
                                        <center>
                                            <form action="{{route('destroy.gallary',['id'=>$gallary->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">DEL</button>
                                            </form>
                                            <br>
                                        </center>
                                        <img src="{{asset('storage/'.$gallary->path)}}" class="d-block w-100" alt="...">
                                      </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                    </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
            </section>
        </div>
        
        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>gallery</h2>
                    <p>Check <span>Our Gallery</span></p>
                </div>

                <div style="    max-width: 600px;
                max-height: 444px;" class="gallery-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div id="carouselExample2" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($gallarys as $gallary )
                                <div class="carousel-item active">
                                    <img src="{{asset('storage/'.$gallary->path)}}" class="d-block w-100" alt="...">
                                  </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                </div>

            </div>
        </section><!-- End Gallery Section -->

        </div>
</x-app-layout>
