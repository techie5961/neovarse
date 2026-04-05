@extends('layout.users.app')
@section('title')
    Welcome to {{ config('app.name') }}
@endsection
@section('css')
    <style class="css">
        main{
            background-image:url('{{ asset('banners/3f7f4c77-8056-4e20-843b-6d899e9aac38.jpeg') }}');
            background-size:cover;
            background-position:center;
        }
        section.section{
            backdrop-filter:blur(10px);
            -webkit-backdrop-filter:blur(10px);

        }
        .box{
            position:relative;
        }
        .box .child{
            position: relative;
            z-index:10;
        }
        .box::before{
            content:'';
            width:40%;
            aspect-ratio:1;
            background:var(--primary);
            filter:blur(100px);
            position:absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
            z-index:5;
        }
    </style>
@endsection
@section('main')
    <section class="w-full section column flex-auto g-10 align-center justify-center">
        <div style="border:1px solid var(--primary)" class="br-20 bg box p-20 align-center text-center column g-20">
     <div class="child w-full column align-center text-center g-20">
               <div style="background:linear-gradient(to bottom right,hsl(var(--primary-hsl),30%,70%),hsl(var(--primary-hsl),50%,50%));box-shadow:0 0 30px var(--primary);" class="h-100 w-100 column circle align-center justify-center primary-text">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M232.49,80.49l-128,128a12,12,0,0,1-17,0l-56-56a12,12,0,1,1,17-17L96,183,215.51,63.51a12,12,0,0,1,17,17Z"></path></svg>

            </div>
            <strong style="font-size:1.5rem;" class="desc">Welcome to <span class="c-primary">{{ config('app.name') }}!</span></strong>
        <span class="opacity-07">Your account is live! click the button below to proceed to your dashboard.</span>
      <div style="border:1px solid gold;background:rgba(255, 215, 0,0.1);" class="p-20 br-10 column align-center g-10 text-center">
        <span class="opacity-06">Your onboarding Gift Card</span>
        <strong class="desc c-gold">${{ $cashback }} Gift Card</strong>
      </div>
      <button onclick="window.location.href='{{ url('users/dashboard?notified=true') }}'" style="background:linear-gradient(to left,hsl(var(--primary-hsl),30%,70%),hsl(var(--primary-hsl),50%,50%));" class="btn-primary p-x-20">
        <span>Go to Dashboard</span>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M224.49,136.49l-72,72a12,12,0,0,1-17-17L187,140H40a12,12,0,0,1,0-24H187L135.51,64.48a12,12,0,0,1,17-17l72,72A12,12,0,0,1,224.49,136.49Z"></path></svg>

        </span>
      </button>
     </div>
    </div>
    </section>
@endsection