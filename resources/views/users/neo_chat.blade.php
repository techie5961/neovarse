@extends('layout.users.app')
@section('title')
    Neo Chat
@endsection
@section('css')
    <style class="css">
        .message-divs{
            background:rgba(var(--rgt),0.1);
            width:fit-content;
            padding:20px;
            border-radius: 5px 20px 20px 20px;
            max-width:70% !important;
            display:flex;
            flex-direction: column;
            gap:10px;


        }
        .message-divs.me{
            border-radius: 20px 20px 5px 20px;
            margin-left:auto;
        }
    </style>
@endsection
@section('main')
    <section class="w-full flex-auto column g-10 p-20">
        <div style="border:1px solid var(--primary-02);" class="w-full flex-auto overflow-hidden br-20 column">
            {{-- head --}}
            <div style="border-bottom:1px solid var(--primary-02);" class="w-full p-20 column g-10">
              <div class="row align-center g-10 space-between">
                 <div class="row g-5 align-center">
                <span class="c-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M200,48H136V16a8,8,0,0,0-16,0V48H56A32,32,0,0,0,24,80V192a32,32,0,0,0,32,32H200a32,32,0,0,0,32-32V80A32,32,0,0,0,200,48ZM172,96a12,12,0,1,1-12,12A12,12,0,0,1,172,96ZM96,184H80a16,16,0,0,1,0-32H96ZM84,120a12,12,0,1,1,12-12A12,12,0,0,1,84,120Zm60,64H112V152h32Zm32,0H160V152h16a16,16,0,0,1,0,32Z"></path></svg>

                </span>
                <strong class="desc c-primary">NEO CHAT</strong>
               </div>
               <div style="border:1px solid var(--primary-text);color:var(--primary-text);background:linear-gradient(to right,var(--primary-light),var(--primary))" class="p-5 row align-center g-5 p-x-20 br-1000">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M184,89.57V84c0-25.08-37.83-44-88-44S8,58.92,8,84v40c0,20.89,26.25,37.49,64,42.46V172c0,25.08,37.83,44,88,44s88-18.92,88-44V132C248,111.3,222.58,94.68,184,89.57ZM56,146.87C36.41,141.4,24,132.39,24,124V109.93c8.16,5.78,19.09,10.44,32,13.57Zm80-23.37c12.91-3.13,23.84-7.79,32-13.57V124c0,8.39-12.41,17.4-32,22.87Zm-16,71.37C100.41,189.4,88,180.39,88,172v-4.17c2.63.1,5.29.17,8,.17,3.88,0,7.67-.13,11.39-.35A121.92,121.92,0,0,0,120,171.41Zm0-44.62A163,163,0,0,1,96,152a163,163,0,0,1-24-1.75V126.46A183.74,183.74,0,0,0,96,128a183.74,183.74,0,0,0,24-1.54Zm64,48a165.45,165.45,0,0,1-48,0V174.4a179.48,179.48,0,0,0,24,1.6,183.74,183.74,0,0,0,24-1.54ZM232,172c0,8.39-12.41,17.4-32,22.87V171.5c12.91-3.13,23.84-7.79,32-13.57Z"></path></svg>

                </span>
                <span>Earn</span>
               </div>
              </div>
            </div>
            {{-- body --}}
            <div style="background:rgba(var(--rgt),0.05);height:100px;" class="w-full overflow-auto g-10 flex-auto p-20 column">
                <div class="message-divs">
                    <div class="row align-center g-5">
                        <strong class="c-primary">NEO ASSIST</strong>
                        <span style="font-weight:100" class="opacity-07">Now</span>
                    </div>
                    <span>Welcome to the {{ config('app.name') }},Chat & earn Tokens</span>
                </div>
                <div class="message-divs me">
                    <div class="row align-center g-5">
                        <strong class="c-primary">YOU</strong>
                        <span style="font-weight:100" class="opacity-05">Now</span>
                    </div>
                    <span>Ok thank you, how can i withdraw please</span>
                </div>
                  <div class="message-divs">
                    <div class="row align-center g-5">
                        <strong class="c-primary">NEO ASSIST</strong>
                        <span style="font-weight:100" class="opacity-07">Now</span>
                    </div>
                    <span>Welcome to the {{ config('app.name') }},Chat & earn Tokens</span>
                </div>
                <div class="message-divs me">
                    <div class="row align-center g-5">
                        <strong class="c-primary">YOU</strong>
                        <span style="font-weight:100" class="opacity-05">Now</span>
                    </div>
                    <span>Ok thank you, how can i withdraw please</span>
                </div>  <div class="message-divs">
                    <div class="row align-center g-5">
                        <strong class="c-primary">NEO ASSIST</strong>
                        <span style="font-weight:100" class="opacity-07">Now</span>
                    </div>
                    <span>Welcome to the {{ config('app.name') }},Chat & earn Tokens</span>
                </div>
                <div class="message-divs me">
                    <div class="row align-center g-5">
                        <strong class="c-primary">YOU</strong>
                        <span style="font-weight:100" class="opacity-05">Now</span>
                    </div>
                    <span>Ok thank you, how can i withdraw please</span>
                </div>  <div class="message-divs">
                    <div class="row align-center g-5">
                        <strong class="c-primary">NEO ASSIST</strong>
                        <span style="font-weight:100" class="opacity-07">Now</span>
                    </div>
                    <span>Welcome to the {{ config('app.name') }},Chat & earn Tokens</span>
                </div>
                <div class="message-divs me">
                    <div class="row align-center g-5">
                        <strong class="c-primary">YOU</strong>
                        <span style="font-weight:100" class="opacity-05">Now</span>
                    </div>
                    <span>Ok thank you, how can i withdraw please</span>
                </div>
            </div>
            {{-- foot --}}
            <div style="border-top:1px solid var(--primary-02);" class="w-full p-20 column g-10">
                <div style="border:1px solid rgba(var(--rgt),0.1);background:rgba(var(--rgt),0.1);" class="w-full row align-center g-10 p-20 br-20">
                    <textarea style="width:100%;height:100%;background:transparent;border:none;resize:none;" placeholder="Type a Message..."></textarea>
                <div class="h-40 clip-circle pointer perfect-square circle bg-primary primary-text column align-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208.49,120.49a12,12,0,0,1-17,0L140,69V216a12,12,0,0,1-24,0V69L64.49,120.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0l72,72A12,12,0,0,1,208.49,120.49Z"></path></svg>

                </div>
                </div>
            </div>

        </div>
    </section>
@endsection