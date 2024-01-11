<x-app-layout>
    <x-slot name="header">
        <div style="justify-content: space-between;display:flex;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('dashboard') }}">Dashboard</a> / {{ __('All Chefs') }}
            </h2>
            <h2>
                <a href="{{route('index')}}">HOME</a>
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table style="text-align: center;" class="table table-striped table-hover">
                <br>
                @include('admin.addchef')
                <br>
                <br>
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Path</th>
                        <th scope="col">Name</th>
                        <th scope="col">Rank</th>
                        <th scope="col">Details</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chefs as $chef)
                        @include('admin.editchefs')
                        <tr>
                            <td scope="row">{{ $chef->id }}</td>
                            <td scope="row"><a href="{{ asset('storage/' . $chef->path) }}" class="glightbox"><img
                                        width="70" height="70" src="{{ asset('storage/' . $chef->path) }}"
                                        class="menu-img img-fluid" alt=""></a></td>
                            <td>{{ $chef->name }}</td>
                            <td>{{ $chef->rank }}</td>
                            <td>{{ $chef->details }}</td>
                            <td>
                                @include('admin.deletechef')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editchef-{{ $chef->id }}">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ======= Chefs Section ======= -->
        <section id="chefs" class="chefs section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Chefs</h2>
                    <p>Our <span>Proffesional</span> Chefs</p>
                </div>

                <div class="row gy-4">
                    @foreach ($chefs as $chef)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="100">
                            <div class="chef-member">
                                <div class="member-img">
                                    <img src="{{ asset('storage/' . $chef->path) }}" class="img-fluid" alt="">
                                    {{-- <div class="social">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
        </div> --}}
                                </div>
                                <div class="member-info">
                                    <h4>{{ $chef->name }}</h4>
                                    <span>{{ $chef->rank }}</span>
                                    <p>{{ $chef->details }}</p>
                                </div>
                            </div>
                        </div><!-- End Chefs Member -->
                    @endforeach

                </div>

            </div>
        </section><!-- End Chefs Section -->

    </div>
</x-app-layout>
