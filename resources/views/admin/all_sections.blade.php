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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table style="text-align: center;" class="table table-striped table-hover">
                @include('admin.addsection_modal')
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
                                @include('admin.active_modal')
                            @endif                        
                        </td>
                        <td>
                            @include('admin.editsection_modal')
                            @include('admin.deletesection_modal')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
