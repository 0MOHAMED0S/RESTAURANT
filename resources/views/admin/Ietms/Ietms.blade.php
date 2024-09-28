<x-app-layout>
    <x-slot name="header">
        <div style="justify-content: space-between;display:flex;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{route('dashboard')}}">Dashboard</a> / {{ __('All Menu Ietms') }}
            </h2>
            <h2>
                <a href="{{route('index')}}">HOME</a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table style="text-align: center;" class="table table-striped table-hover">
                <br>
                @include('admin.Ietms.add')
                <br>
                <br>
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Path</th>
                        <th scope="col">Name</th>
                        <th scope="col">Section</th>
                        <th scope="col">Price</th>
                        <th scope="col">Details</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ietms as $ietm)
                        @include('admin.Ietms.edit')
                        <tr>
                            <td scope="row">{{ $ietm->id }}</td>

                            <td scope="row"><a href="{{ asset('storage/' . $ietm->path) }}" class="glightbox"><img
                            width="70" height="70"  src="{{ asset('storage/' . $ietm->path) }}"
                                class="menu-img img-fluid" alt=""></a></td>
                            <td>{{ $ietm->name }}</td>
                            <td>{{ $ietm->section->name }}</td>
                            <td>{{ $ietm->price }}</td>
                            <td>{{ $ietm->details }}</td>
                            <td>
                                @include('admin.Ietms.delete')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editietm-{{$ietm->id}}">
                                    Edit IETM
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
                <!-- ======= Menu Section ======= -->
                <section id="menu" class="menu">
                    <div class="container" data-aos="fade-up">

                        <div class="section-header">
                            <h2>Our Menu</h2>
                            <p>Check Our <span>Yummy Menu</span></p>
                        </div>

                        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                            @foreach ($sections as $section)
                                <li class="nav-item">
                                    <a class="nav-link @if ($section->active == 1) active show @else @endif"
                                        data-bs-toggle="tab" data-bs-target="#{{ $section->namo }}">
                                        <h4>{{ $section->name }}</h4>
                                    </a>
                                </li>
                            @endforeach
                            <!-- End tab nav item -->

                        </ul>

                        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                            @foreach ($sections as $section)
                                <div class="tab-pane fade @if ($section->active == 1) active show
                    @else @endif "
                                    id="{{ $section->namo }}">

                                    <div class="tab-header text-center">
                                        <p>Menu</p>
                                        <h3>{{ $section->name }} </h3>
                                    </div>

                                    <div class="row gy-5">

                                        @foreach ($ietms as $ietm)
                                            @if ($ietm->section_id == $section->id)
                                                <div class="col-lg-4 menu-item">
                                                    <a href="{{ asset('storage/' . $ietm->path) }}" class="glightbox"><img
                                                            src="{{ asset('storage/' . $ietm->path) }}"
                                                            class="menu-img img-fluid" alt=""></a>
                                                    <h4>{{ $ietm->name }}<span></h4>
                                                    <p class="ingredients">
                                                        {{ $ietm->details }}
                                                    </p>
                                                    <p class="price">
                                                        ${{ $ietm->price }}
                                                    </p>
                                                </div><!-- Menu Item -->
                                            @endif
                                        @endforeach

                                    </div>
                                </div><!-- End Starter Menu Content -->
                            @endforeach

                        </div>

                    </div>
                </section><!-- End Menu Section -->

    </div>
</x-app-layout>
