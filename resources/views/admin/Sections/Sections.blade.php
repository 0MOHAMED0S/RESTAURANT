<x-app-layout>
    <style>
    .green-radio {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 2px solid #4caf50;
    border-radius: 50%;
    background-color: white;
    margin: 5px;
    cursor: pointer;
}

.green-radio.checked {
    background-color: #4caf50;
}

    </style>
    <x-slot name="header">
        <div style="justify-content: space-between;display:flex;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{route('dashboard')}}">Dashboard</a> / {{ __('SECTIONS') }}
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
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table style="text-align: center;" class="table table-striped table-hover">
                @include('admin.Sections.add')
                <br>
                <br>
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">active</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $section )
                    <tr>
                        <th scope="row">{{$section->id}}</th>
                        <td>{{$section->name}}</td>
                        <td>
                            @if ($section->active == 1)
                            <div class="green-radio checked"></div>
                            @else
                                @include('admin.Sections.active')
                            @endif
                        </td>
                        <td>
                            @include('admin.Sections.edit')
                            @include('admin.Sections.delete')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
