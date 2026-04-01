@extends('layout.users.index')
@section('title')
    Vendors
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
        .chat-btn{
            width:fit-content;
            height:fit-content;
            background:rgba(0,255,0);

            padding:10px;
            border:none;
            user-select:none;
            color:black;
            font-family:var(--font);
            display:flex;
            flex-direction:row;
            align-items:center;
            clip-path:inset(0 round 5px);
            border-radius:5px;
            gap:5px;
            cursor:pointer;
         

        }
        .card{
            width:100%;
            border:1px solid rgba(var(--rgt),0.1);
            background:rgba(var(--rgt),0.05);
            padding:20px;
            border-radius:20px;
            position:relative;
        
        
        }
       
</style>
    
@endsection
@section('main')
    <section class="w-full p-20 column g-10 align-center">
        <strong class="hero-title">Purchase {{ config('settings.coupon') }}</strong>
        <span class="text-center">Below is a list of our verified {{ config('settings.coupon') }} {{ config('settings.vendors') }}s.Chat any of them on whatsapp to purchase your {{ config('settings.coupon') }}</span>
        <span class="text-center c-red" style="color:coral">⚠ Do not pay to anyone not listed on this page.We will not be held responsible for loss of funds.Only pay to {{ config('settings.vendors') }}s listed on thie page.</span>
        @if ($vendors->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Vendors Available at the moment,check back later'
            ])
        @else
           <div class="grid pc-grid-2 w-full g-10 place-center">
             @foreach ($vendors as $data)
                <div class="card">
                   <div class="w-full row align-center g-10">
                     @if (str_contains($data->photo,'avatar'))
                     <div class="no-shrink desc h-70 w-70 primary-text no-select perfect-square p-10 br-10 column align-center justify-center bg-primary">
                {{ strtoupper(substr($data->username,0,2)) }}
            </div>
                @else
                    <img src="{{ asset('users/'.$data->photo.'') }}" alt="" class="h-70 w-70 br-10">
                @endif
                   <div class="column m-right-auto g-5">
                    <strong class="desc">{{ ucfirst($data->username) }}</strong>
                    <span class="row no-select opacity-07 align-center g-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M228.75,100.05c-3.52-3.67-7.15-7.46-8.34-10.33-1.06-2.56-1.14-7.83-1.21-12.47-.15-10-.34-22.44-9.18-31.27s-21.27-9-31.27-9.18c-4.64-.07-9.91-.15-12.47-1.21-2.87-1.19-6.66-4.82-10.33-8.34C148.87,20.46,140.05,12,128,12s-20.87,8.46-27.95,15.25c-3.67,3.52-7.46,7.15-10.33,8.34-2.56,1.06-7.83,1.14-12.47,1.21C67.25,37,54.81,37.14,46,46S37,67.25,36.8,77.25c-.07,4.64-.15,9.91-1.21,12.47-1.19,2.87-4.82,6.66-8.34,10.33C20.46,107.13,12,116,12,128S20.46,148.87,27.25,156c3.52,3.67,7.15,7.46,8.34,10.33,1.06,2.56,1.14,7.83,1.21,12.47.15,10,.34,22.44,9.18,31.27s21.27,9,31.27,9.18c4.64.07,9.91.15,12.47,1.21,2.87,1.19,6.66,4.82,10.33,8.34C107.13,235.54,116,244,128,244s20.87-8.46,27.95-15.25c3.67-3.52,7.46-7.15,10.33-8.34,2.56-1.06,7.83-1.14,12.47-1.21,10-.15,22.44-.34,31.27-9.18s9-21.27,9.18-31.27c.07-4.64.15-9.91,1.21-12.47,1.19-2.87,4.82-6.66,8.34-10.33C235.54,148.87,244,140.05,244,128S235.54,107.13,228.75,100.05Zm-17.32,39.29c-4.82,5-10.28,10.72-13.19,17.76-2.82,6.8-2.93,14.16-3,21.29-.08,5.36-.19,12.71-2.15,14.66s-9.3,2.07-14.66,2.15c-7.13.11-14.49.22-21.29,3-7,2.91-12.73,8.37-17.76,13.19C135.78,214.84,130.4,220,128,220s-7.78-5.16-11.34-8.57c-5-4.82-10.72-10.28-17.76-13.19-6.8-2.82-14.16-2.93-21.29-3-5.36-.08-12.71-.19-14.66-2.15s-2.07-9.3-2.15-14.66c-.11-7.13-.22-14.49-3-21.29-2.91-7-8.37-12.73-13.19-17.76C41.16,135.78,36,130.4,36,128s5.16-7.78,8.57-11.34c4.82-5,10.28-10.72,13.19-17.76,2.82-6.8,2.93-14.16,3-21.29C60.88,72.25,61,64.9,63,63s9.3-2.07,14.66-2.15c7.13-.11,14.49-.22,21.29-3,7-2.91,12.73-8.37,17.76-13.19C120.22,41.16,125.6,36,128,36s7.78,5.16,11.34,8.57c5,4.82,10.72,10.28,17.76,13.19,6.8,2.82,14.16,2.93,21.29,3,5.36.08,12.71.19,14.66,2.15s2.07,9.3,2.15,14.66c.11,7.13.22,14.49,3,21.29,2.91,7,8.37,12.73,13.19,17.76,3.41,3.56,8.57,8.94,8.57,11.34S214.84,135.78,211.43,139.34ZM176.49,95.51a12,12,0,0,1,0,17l-56,56a12,12,0,0,1-17,0l-24-24a12,12,0,1,1,17-17L112,143l47.51-47.52A12,12,0,0,1,176.49,95.51Z"></path></svg>


<span>VERIFIED {{ strtoupper(config('settings.vendors')) }}</span>
                    </span>
                   </div>

                    <button onclick="window.open('https://wa.me/{{$data->phone}}?text={{ urlencode('Hello '.ucfirst($data->username).',are you online,i want to purchase '.($voucher ?? 'coupon').' code for '.config('app.name').'') }}')" class="chat-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,44H40A20,20,0,0,0,20,64V224A19.82,19.82,0,0,0,31.56,242.1a20.14,20.14,0,0,0,8.49,1.9,19.91,19.91,0,0,0,12.82-4.72l.12-.11L84.47,212H216a20,20,0,0,0,20-20V64A20,20,0,0,0,216,44Zm-4,144H80a11.93,11.93,0,0,0-7.84,2.92L44,215.23V68H212ZM84,108A12,12,0,0,1,96,96h64a12,12,0,1,1,0,24H96A12,12,0,0,1,84,108Zm0,40a12,12,0,0,1,12-12h64a12,12,0,0,1,0,24H96A12,12,0,0,1,84,148Z"></path></svg>
                        <span>Chat</span>
                    </button>
                   </div>
                </div>
            @endforeach
           </div>
        @endif
    </section>
@endsection