@extends('layout.users.app')
@section('css')
    <style class="cs">
        .online{
            width:10px;
            height:10px;
            border-radius:50%;
            background:#4caf50;
            animation:breathe 1s linear infinite;
        }
        @keyframes breathe{
            0%,100%{
                opacity:1;
            }
            50%{
                opacity:0.5
            }
        }
        .contest-ended{
            border:1px solid gold !important;
            background:rgba(255, 215, 0,0.3) !important;
            color:gold;
        }
        .contest-ended .online{
               background:gold !important;
            animation:none;
        }
    </style>
@endsection
@section('main')
    <section class="w-full p-10 column g-10">
      
        <div class="column p-10 g-10 w-full bg-light br-5">
  <div class="row w-full g-10 space-between align-center">
            <div style="color:var(--primary-light)" class="c-primary-light">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="50" width="50"><path d="M232,64H208V48a8,8,0,0,0-8-8H56a8,8,0,0,0-8,8V64H24A16,16,0,0,0,8,80V96a40,40,0,0,0,40,40h3.65A80.13,80.13,0,0,0,120,191.61V216H96a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16H136V191.58c31.94-3.23,58.44-25.64,68.08-55.58H208a40,40,0,0,0,40-40V80A16,16,0,0,0,232,64ZM48,120A24,24,0,0,1,24,96V80H48v32q0,4,.39,8ZM232,96a24,24,0,0,1-24,24h-.5a81.81,81.81,0,0,0,.5-8.9V80h24Z"></path></svg>

            </div>
            <div class="column m-right-auto">
                <strong style="font-size:2rem;">Referral Contest</strong>
                <span style="opacity:0.7;">Invite Friends and win amazing rewards up to NGN500,000</span>
            </div>
            <div class="p-5 c-green contest-{{ $status }} row align-center g-5 border-1 br-1000 p-x-10 bg-green-transparent">
                <div class="online"></div>
                Contest {{ ucfirst($status) }}
            </div>
        </div>
        <div style="background:var(--bg-lighter)" class="w-full row g-5 align-center p-10 br-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm0,48H48V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24Z"></path></svg>

            <strong>Starts:</strong><span>December 13,2025</span>
        </div>
         <div style="background:var(--bg-lighter)" class="w-full row g-5 align-center p-10 br-5">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM169.66,133.66l-48,48a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L116,164.69l42.34-42.35a8,8,0,0,1,11.32,11.32ZM48,80V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80Z"></path></svg>
            <strong>Ends:</strong><span>March 13,2025</span>
        </div>
        </div>
        <div class="row w-full g-10 align-center space-between br-10 c-white bg-green p-10">
            <div class="column g-10">
                <span>Your Referrals</span>
                <strong class="desc">0</strong>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M256,136a8,8,0,0,1-8,8H232v16a8,8,0,0,1-16,0V144H200a8,8,0,0,1,0-16h16V112a8,8,0,0,1,16,0v16h16A8,8,0,0,1,256,136Zm-57.87,58.85a8,8,0,0,1-12.26,10.3C165.75,181.19,138.09,168,108,168s-57.75,13.19-77.87,37.15a8,8,0,0,1-12.25-10.3c14.94-17.78,33.52-30.41,54.17-37.17a68,68,0,1,1,71.9,0C164.6,164.44,183.18,177.07,198.13,194.85ZM108,152a52,52,0,1,0-52-52A52.06,52.06,0,0,0,108,152Z"></path></svg>

        </div>
                <div class="row w-full g-10 align-center space-between br-10 c-white bg-blue p-10">
            <div class="column g-10">
                <span>Your Rank</span>
                <strong class="desc">---</strong>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M240,56v64a8,8,0,0,1-16,0V75.31l-82.34,82.35a8,8,0,0,1-11.32,0L96,123.31,29.66,189.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0L136,140.69,212.69,64H168a8,8,0,0,1,0-16h64A8,8,0,0,1,240,56Z"></path></svg>
        </div>
        <strong class="desc">Your Referral Link</strong>
        <div style="border:1px solid var(--bg-lighter)" class="w-full bg-light g-5 secondary-text br-0 p-10 row space-between align-center">
            <div class="w-full h-40 no-scrollbar align-center row ws-nowrap overflow-auto p-5 br-10 bg-secondary-transparent">{{ url('register/'.Auth::guard('users')->user()->username.'') }}</div>
            <div onclick="copy('{{ url('register/'.Auth::guard('users')->user()->username.'') }}')" style="border:1px solid var(--bg-lighter)" class="h-40 perfect-square column justify-center">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M20.0616 12.6473L20.5793 10.7154C21.1835 8.46034 21.4856 7.3328 21.2581 6.35703C21.0785 5.58657 20.6744 4.88668 20.097 4.34587C19.3657 3.66095 18.2381 3.35883 15.9831 2.75458C13.728 2.15033 12.6004 1.84821 11.6247 2.07573C10.8542 2.25537 10.1543 2.65945 9.61351 3.23687C9.02709 3.86298 8.72128 4.77957 8.26621 6.44561C8.18979 6.7254 8.10915 7.02633 8.02227 7.35057L8.02222 7.35077L7.50458 9.28263C6.90033 11.5377 6.59821 12.6652 6.82573 13.641C7.00537 14.4115 7.40945 15.1114 7.98687 15.6522C8.71815 16.3371 9.84569 16.6392 12.1008 17.2435L12.1008 17.2435C14.1334 17.7881 15.2499 18.0873 16.165 17.9744C16.2652 17.9621 16.3629 17.9448 16.4592 17.9223C17.2296 17.7427 17.9295 17.3386 18.4703 16.7612C19.1552 16.0299 19.4574 14.9024 20.0616 12.6473Z" fill="CurrentColor"></path>
<path d="M2.50458 14.715L3.02222 16.6469C3.62647 18.902 3.92859 20.0295 4.61351 20.7608C5.15432 21.3382 5.85421 21.7423 6.62466 21.9219C7.60044 22.1494 8.72798 21.8473 10.9831 21.2431C13.2381 20.6388 14.3657 20.3367 15.097 19.6518C15.1577 19.5949 15.2164 19.5363 15.2733 19.4761C14.9391 19.448 14.602 19.3942 14.2594 19.3261C13.5633 19.1877 12.7362 18.9661 11.758 18.704L11.6512 18.6753L11.6264 18.6687C10.5621 18.3835 9.67281 18.1448 8.96277 17.8883C8.21607 17.6185 7.5376 17.286 6.96148 16.7464C6.16753 16.0028 5.61193 15.0404 5.36491 13.9811C5.18567 13.2123 5.23691 12.4585 5.37666 11.6769C5.51058 10.928 5.75109 10.0305 6.03926 8.95515L6.03926 8.95514L6.57365 6.96077L6.59245 6.89062C4.6719 7.40799 3.66101 7.71408 2.98687 8.34548C2.40945 8.88629 2.00537 9.58617 1.82573 10.3566C1.59821 11.3324 1.90033 12.4599 2.50458 14.715Z" fill="CurrentColor"></path>
</svg>

            </div>
        </div>
        <hr>
        <div class="row align-center g-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M248,80a28,28,0,1,0-51.12,15.77l-26.79,33L146,73.4a28,28,0,1,0-36.06,0L85.91,128.74l-26.79-33a28,28,0,1,0-26.6,12L47,194.63A16,16,0,0,0,62.78,208H193.22A16,16,0,0,0,209,194.63l14.47-86.85A28,28,0,0,0,248,80ZM128,40a12,12,0,1,1-12,12A12,12,0,0,1,128,40ZM24,80A12,12,0,1,1,36,92,12,12,0,0,1,24,80ZM193.22,192H62.78L48.86,108.52,81.79,149A8,8,0,0,0,88,152a7.83,7.83,0,0,0,1.08-.07,8,8,0,0,0,6.26-4.74l29.3-67.4a27,27,0,0,0,6.72,0l29.3,67.4a8,8,0,0,0,6.26,4.74A7.83,7.83,0,0,0,168,152a8,8,0,0,0,6.21-3l32.93-40.52ZM220,92a12,12,0,1,1,12-12A12,12,0,0,1,220,92Z"></path></svg>
            <strong class="desc">Leaderboard(top 10)</strong>
        </div>
        <div style="border:1px solid var(--bg-lighter)" class="w-full br-10 bg-light p-10 column g-10">
            @if ($top->isEmpty())
                @include('components.sections',[
                    'null' => true,
                    'text' => 'No data found'
                ])
            @else
                @foreach ($top as $data)
                    <div class="w-full row align-center g-10">
                        <strong class="desc">{{ $loop->iteration }}</strong>
                        <img src="{{ asset('users/'.$data->user->photo.'') }}" alt="" class="h-70 w-70 circle">
                        <div class="column g-10">
                            <strong class="font-1">{{ $data->ref }}</strong>
                            <span style="opacity:0.8">{{ $data->total }} Referrals</span>
                        </div>
                       <div class="column m-left-auto">
                         <div class="status green">Active</div>
                      
                       </div>
                    </div>
                    @if (!$loop->last)
                       <hr> 
                  
                    @endif
                @endforeach
            @endif
        </div>
        
       
    </section>
@endsection