@extends('layout.users.app')
@section('title')
    Neo Skill
@endsection
@section('css')
    <style class="css">
        .skill-photo{
            position:relative;
        }
        .skill-photo::before{
            content:'';
            position:absolute;
            top:0;
            left:0;
            bottom:0;
            right:0;
            z-index:50;
            background:rgba(0,0,0,0.3)
        }
        .category-btn{
            padding:10px 20px;
            background:var(--primary);
            color:var(--primary-text);
            width:fit-content;
            height:fit-content;
            margin-top:auto;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            border-radius:1000px;
            text-transform:capitalize;
            font-size:1rem;
            font-weight:bold;
            border:1px solid var(--primary-light);
            box-shadow:0 10px 10px rgba(0,0,0,0.5);
            position: relative;
            z-index:100;
        }
    </style>
@endsection
@section('main')
    <section class="w-full p-20 column g-10">
     
        @if ($skills->isEmpty())
            @include('components.sections',[
                'null' => true
            ])
        @else
           <strong class="desc">Skill Aquisition</strong>
           <div class="grid pc-grid-2 w-full g-10">
            @foreach ($skills as $data)
               <div class="w-full overflow-hidden main-border br-20 main-border-bg column g-10">
                {{-- header --}}
                <div style="height:150px;background-image:url({{ asset('skills/'.$data->photo.'') }});background-position:center;background-size:contain;" class="w-full skill-photo p-20 column g-10">
                    <div class="category-btn">
                        <span class="c-gold">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M213.85,125.46l-112,120a8,8,0,0,1-13.69-7l14.66-73.33L45.19,143.49a8,8,0,0,1-3-13l112-120a8,8,0,0,1,13.69,7L153.18,90.9l57.63,21.61a8,8,0,0,1,3,12.95Z"></path></svg>

                        </span>
                        <span>{{ $data->category }}</span>
                    </div>
                </div>
                {{-- body --}}
                <div class="w-full p-20 column g-10">
                    <strong style="font-size:1.5rem;">{{  ucwords($data->name) }} </strong>
                    <span style="color:var(--primary-light)">{{ nl2br($data->description) }}</span>
                 {{-- community button --}}
                <div onclick="window.open('{{ $data->community }}')" style="border:3px solid var(--primary-light)" class="w-full pointer overflow-hidden clip-1000 no-select bold desc br-1000 row align-center g-10 justify-center p-10">
                    Join Community
                    <span class="column c-primary align-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M132,20A104.11,104.11,0,0,0,28,124v84a20,20,0,0,0,20,20h84a104,104,0,0,0,0-208Zm0,184H52V124a80,80,0,1,1,80,80Z"></path></svg>
                    </span>
                </div>
                <small class="opacity-07 text-center w-full">
                  &bull;
                    join the community to learn the skill
                    &bull;
                </small>
                </div>
               
               </div>
           @endforeach
           </div>
            
        @endif

    </section>
@endsection