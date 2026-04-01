@extends('layout.users.index')
@section('title')
    Top Earners
@endsection
@section('css')
<style class="css">
     .quick-link{
            position:relative;
            

        }
        .quick-link .group{
            z-index:20;
            position:relative;
        }
        .quick-link::before{
            content:'';
            position:absolute;
            left:10%;
            top:10%;
            width:40%;
            height:40%;
            background:var(--primary);
            border-radius:50%;
            filter:blur(30px);
            z-index:10;
        }
         .quick-link::after{
            content:'';
            position:absolute;
            right:10%;
            bottom:10%;
            width:20%;
            height:20%;
            background:var(--primary);
            border-radius:50%;
            filter:blur(20px);
            z-index:10;
        }
        .card{
            width:100%;
            border:1px solid rgba(var(--rgt),0.1);
            background:rgba(var(--rgt),0.05);
            padding:20px;
            border-radius:20px;
            position:relative;
            display:flex;
            flex-direction:row;
            gap:10px;
            align-items:center;
            justify-content:space-between;
        
        
        }
        .iteration.first{
            border-color:gold !important;
            color:gold;
            background:rgba(255, 215, 0,0.1) !important;
        }
</style>
    
@endsection
@section('main')
    <section class="w-full column p-20 g-10">
        <strong class="hero-title m-right-auto">Top Streamers</strong>
        <span>Top 10 leading streamers</span>
        
        @if ($top->isEmpty())
            @include('components.sections',[
                'null' => 'true',
                'text' => 'No Data Found'
            ])
        @else
         <div class="grid pc-grid-2 w-full g-10 place-center">
          
        @foreach ($top as $data)
             <div class="card">
                @if (str_contains($data->user->photo,'avatar'))
                     <div class="no-shrink desc h-70 w-70 primary-text no-select perfect-square p-10 br-10 column align-center justify-center bg-primary">
                {{ strtoupper(substr($data->user->username,0,2)) }}
            </div>
                @else
                    <img src="{{ asset('users/'.$data->user->photo.'') }}" alt="" class="h-70 w-70 br-10">
                @endif
             
              
                <div class="column m-right-auto g-5">
                        <span class="desc bold " >{{ ucfirst($data->user->username) }}</span>
                     <span class="font-1">{{ strtoupper($data->user->country) }}</span>
                    </div>
                    <div style="border:1px solid rgba(var(--rgt),0.1);background:rgba(var(--rgt),0.05);font-weight:900" class="h-50 {{ $loop->iteration == 1 ? 'first' : '' }} iteration desc column align-center no-select justify-center w-50 no-shrink circle">{{ $loop->iteration }}</div>
                       
            </div>
        @endforeach
         </div>
            
        @endif
       </section>
@endsection