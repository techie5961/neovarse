@extends('layout.admins.app')
@section('title')
    Add Vendor
@endsection
@section('main')
    <section class="w-full column p-10 g-10">
        <form action="" class="w-full bg-white br-10 box-shadow p-10 column g-5">
            <div class="row w-full align-center g-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--bg-secondary)" viewBox="0 0 256 256"><path d="M27.2,126.4a8,8,0,0,0,11.2-1.6,52,52,0,0,1,83.2,0,8,8,0,0,0,11.2,1.59,7.73,7.73,0,0,0,1.59-1.59h0a52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,93.51a40,40,0,1,0-53.94,0,67.27,67.27,0,0,0-21,14.31,67.27,67.27,0,0,0-21-14.31,40,40,0,1,0-53.94,0A67.88,67.88,0,0,0,25.6,115.2,8,8,0,0,0,27.2,126.4ZM176,40a24,24,0,1,1-24,24A24,24,0,0,1,176,40ZM80,40A24,24,0,1,1,56,64,24,24,0,0,1,80,40ZM203,197.51a40,40,0,1,0-53.94,0,67.27,67.27,0,0,0-21,14.31,67.27,67.27,0,0,0-21-14.31,40,40,0,1,0-53.94,0A67.88,67.88,0,0,0,25.6,219.2a8,8,0,1,0,12.8,9.6,52,52,0,0,1,83.2,0,8,8,0,0,0,11.2,1.59,7.73,7.73,0,0,0,1.59-1.59h0a52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,197.51ZM80,144a24,24,0,1,1-24,24A24,24,0,0,1,80,144Zm96,0a24,24,0,1,1-24,24A24,24,0,0,1,176,144Z"></path></svg>
                <strong class="desc c-bg-secondary">Register New Vendor</strong>
            </div>
            <hr>
            <label for="" class="m-top-5">Identifyer/Username</label>
            <div class="cont w-full h-50 border-1 border-color-silver bg-dim br-10">
                <input type="text" placeholder="E.g John Doe" class="inp no-border input w-full h-full br-10 bg-transparent">
            </div>
            <label for="" class="m-top-5">Contact Link</label>
            <div class="cont w-full h-50 border-1 border-color-silver bg-dim br-10">
                <input type="url" placeholder="E.g https://wa.me/+2349013350351" class="inp no-border input w-full h-full br-10 bg-transparent">
            </div>
               <label for="" class="m-top-5">Vendor Login Password</label>
            <div class="cont w-full h-50 border-1 border-color-silver bg-dim br-10">
                <input type="url" placeholder="E.g https://wa.me/+2349013350351" class="inp no-border input w-full h-full br-10 bg-transparent">
            </div>
        </form>
    </section>
@endsection