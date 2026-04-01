@extends('layout.users.index')
@section('title')
    Package List
@endsection
@section('main')
    <section class="w-full grid pc-grid-2 align-center g-10">
        <span class="c-primary grid-full" style="font-family:titan one;font-size:2rem">Package List</span>
        <span class="grid-full">Below is a list of our available packages,preview them and see which package best suites your choice</span>
        @if ($packages->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No package found'
            ])
        @else
            @foreach ($packages as $data)
                <div style="backdrop-filter: blur(50px)" class="column p-10 bg-black-transparent br-10 w-full g-5">
                    <string class="desc c-primary" style="font-family:luckiest guy;font-weight:400">{{ $data->name }}</string>
                    <img src="{{ asset('packages/'.$data->banner.'') }}" class="w-full br-10" alt="">
                </div>
            @endforeach
        @endif
    </section>
@endsection