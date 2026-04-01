@extends('layout.users.app')
@section('title')
    Vendor Dashboard
@endsection
@section('css')
    <style class="css">
       .analytic{
        width:100%;
        /* border:1px solid rgba(var(--rgt),0.1); */
        background:rgba(var(--rgt),0.05);
        padding:20px;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        display:flex;
        flex-direction:row;
        align-items:center;
        justify-content:space-between;
      
       }
       .analytic::before{
        content:'';
        position:absolute;
        left:0;
        top:0;
        right:0;
        width:5px;
        height:100%;
        background:linear-gradient(to right,rgba(218, 165, 32,0.8),rgba(218, 165, 32,0.3),rgba(218, 165, 32,0.1));
       }
       .analytics{
        width::100%;
        display:flex;
        flex-direction:column;
        gap:10px;
       }
       .prompt{
        width:100%;
        border:1px dashed rgb(0,255,0);
        background:rgba(0,255,0,0.1);
        padding:20px;
        border-radius:10px;
        color:rgba(0,255,0);
       }
    </style>
@endsection
@section('main')
    <section class="w-full p-20 column g-10">
        <strong style="font-size:2rem;">Vendor Portal</strong>
       
        <div class="analytics">
            {{-- total --}}
            <div class="analytic">
                
                   <div class="column g-5">
                    <span style="color:rgba(0,255,0)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M120,56v48a16,16,0,0,1-16,16H56a16,16,0,0,1-16-16V56A16,16,0,0,1,56,40h48A16,16,0,0,1,120,56Zm-16,80H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm96-96H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40ZM144,184a8,8,0,0,0,8-8V144a8,8,0,0,0-16,0v32A8,8,0,0,0,144,184Zm64-32H184v-8a8,8,0,0,0-16,0v56H144a8,8,0,0,0,0,16h32a8,8,0,0,0,8-8V168h24a8,8,0,0,0,0-16Zm0,32a8,8,0,0,0-8,8v16a8,8,0,0,0,16,0V192A8,8,0,0,0,208,184Z"></path></svg>

                    </span>
                    <span class="font-1">Total {{ config('settings.coupon') }}s</span>
                   </div>
                    
                   <strong class="desc">{{ number_format($total_coupons) }}</strong>
                   
                
            </div>

            {{-- active --}}
              <div class="analytic">
                
                   <div class="column g-5">
                    <span style="color:rgba(0,255,0)">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

                    </span>
                    <span class="font-1">Active {{ config('settings.coupon') }}s</span>
                   </div>
                    
                   <strong class="desc">{{ number_format($active_coupons) }}</strong>
                   
                
            </div>

             {{-- redeemed --}}
              <div class="analytic">
                
                   <div class="column g-5">
                    <span style="color:rgba(0,255,0)">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

                    </span>
                    <span class="font-1">Redeemed {{ config('settings.coupon') }}s</span>
                   </div>
                    
                   <strong class="desc">{{ number_format($redeemed_coupons) }}</strong>
                   
                
            </div>

             {{-- total --}}
              <div class="analytic">
                
                   <div class="column g-5">
                    <span style="color:rgba(0,255,0)">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M160,152a16,16,0,0,1-16,16h-8V136h8A16,16,0,0,1,160,152Zm72-24A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-56,24a32,32,0,0,0-32-32h-8V88h4a16,16,0,0,1,16,16,8,8,0,0,0,16,0,32,32,0,0,0-32-32h-4V64a8,8,0,0,0-16,0v8h-4a32,32,0,0,0,0,64h4v32h-8a16,16,0,0,1-16-16,8,8,0,0,0-16,0,32,32,0,0,0,32,32h8v8a8,8,0,0,0,16,0v-8h8A32,32,0,0,0,176,152Zm-76-48a16,16,0,0,0,16,16h4V88h-4A16,16,0,0,0,100,104Z"></path></svg>

                    </span>
                    <span class="font-1">Total Value</span>
                   </div>
                    
                   <strong class="desc">&#8358;{{ number_format($value,2) }}</strong>
                   
                
            </div>
           
            
           
        </div>
        <strong class="desc">{{ config('settings.coupon') }}</strong>
        <div class="prompt">
          
<span> ALL {{ config('settings.coupon') }} CODE SHOWN HERE ARE ALLOCATED TO YOUR ACCOUNT,UPON PAYMENT FOR {{ config('settings.coupon') }} CODE BY DOWNLINES,CONTACT ADMIN ON WHATSAPP TO GENERATE A {{ config('settings.coupon') }} CODE FOR YOU THEN COME BACK HERE TO COPY THE CODE AND SEND TO YOUR DOWNLINE.</span>
        </div>
        <div onclick="
        if(this.querySelector('.options').classList.contains('display-none')){
        this.querySelector('.options').classList.remove('display-none')
        }else{
        this.querySelector('.options').classList.add('display-none')
        }
        " class="w-fit pos-relative row align-center p-10 border-1 border-color-primary g-5 no-select m-left-auto">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M12 8.75C11.5858 8.75 11.25 8.41421 11.25 8V5C11.25 4.58579 11.5858 4.25 12 4.25C12.4142 4.25 12.75 4.58579 12.75 5V8C12.75 8.41421 12.4142 8.75 12 8.75Z" fill="CurrentColor"></path>
<path d="M4 12C2.89543 12 2 11.1046 2 10C2 8.89543 2.89543 8 4 8C5.10457 8 6 8.89543 6 10C6 11.1046 5.10457 12 4 12Z" fill="CurrentColor"></path>
<path d="M10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12Z" fill="CurrentColor"></path>
<path d="M18 14C18 12.8954 18.8954 12 20 12C21.1046 12 22 12.8954 22 14C22 15.1046 21.1046 16 20 16C18.8954 16 18 15.1046 18 14Z" fill="CurrentColor"></path>
<path d="M19.25 10C19.25 10.4142 19.5858 10.75 20 10.75C20.4142 10.75 20.75 10.4142 20.75 10V5C20.75 4.58579 20.4142 4.25 20 4.25C19.5858 4.25 19.25 4.58579 19.25 5V10Z" fill="CurrentColor"></path>
<path d="M4 13.25C3.58579 13.25 3.25 13.5858 3.25 14L3.25 19C3.25 19.4142 3.58579 19.75 4 19.75C4.41421 19.75 4.75 19.4142 4.75 19L4.75 14C4.75 13.5858 4.41421 13.25 4 13.25Z" fill="CurrentColor"></path>
<path d="M11.25 19C11.25 19.4142 11.5858 19.75 12 19.75C12.4142 19.75 12.75 19.4142 12.75 19V16C12.75 15.5858 12.4142 15.25 12 15.25C11.5858 15.25 11.25 15.5858 11.25 16V19Z" fill="CurrentColor"></path>
<path d="M20 19.75C19.5858 19.75 19.25 19.4142 19.25 19V18C19.25 17.5858 19.5858 17.25 20 17.25C20.4142 17.25 20.75 17.5858 20.75 18V19C20.75 19.4142 20.4142 19.75 20 19.75Z" fill="CurrentColor"></path>
<path d="M3.25 5C3.25 4.58579 3.58579 4.25 4 4.25C4.41421 4.25 4.75 4.58579 4.75 5V6C4.75 6.41421 4.41421 6.75 4 6.75C3.58579 6.75 3.25 6.41421 3.25 6L3.25 5Z" fill="CurrentColor"></path>
</svg>

            <span>FILTER</span>
            <div style="top:calc(100% + 10px);background:rgb(var(--rgb),0.5);backdrop-filter:blur(30px);-webkit-backdrop-filter:blur(30px);" class="pos-absolute options display-none z-index-1000 br-5  top-full right-0" >
                <div style="border-left:5px solid transparent;border-right:5px solid transparent;border-bottom:5px solid rgba(0,0,0,0.5);position:absolute;bottom:100%;right:10px;" class="arrow"></div>
             <div onclick="spa(event,'{{ url('users/vendor/dashboard') }}')" style="border-color:#222;" class="row pointer overflow-hidden border-bottom-1 p-10 ws-nowrap align-center w-full space-between g-10">
                    <span>All {{ config('settings.coupon') }}s</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                </div>
                <div onclick="spa(event,'{{ url('users/vendor/dashboard?status=active') }}')" style="border-color:#222;" class="row pointer overflow-hidden border-bottom-1 p-10 ws-nowrap align-center w-full space-between g-10">
                    <span>Active {{ config('settings.coupon') }}s</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                </div>
                   <div onclick="spa(event,'{{ url('users/vendor/dashboard?status=redeemed') }}')" class="row pointer overflow-hidden p-10 ws-nowrap align-center w-full space-between g-10">
                    <span>Redeemed/Used {{ config('settings.coupon') }}s</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                </div>
            </div>
        </div>
        <div class="grid pc-grid-2 w-full g-10">
            @if ($coupons->isEmpty())
                @include('components.sections',[
                    'null' => true,
                    'text' => 'No Data Found'
                ])
            @else
                @foreach ($coupons as $data)
                    <div class="w-full main-border main-border-bg loop column g-10 br-10 p-20">
                     <div class="column g-10 w-full">
                          <div class="row g-10 align-center w-full space-between">
                         <strong class="desc">{{ $data->code }}</strong>
                        <div style="border-radius:5px;" onclick="copy('{{ $data->code }}')" class="w-fit p-5 main-border-bg main-border p-x-20 row align-center justify-center m-right-auto">
                           copy
                        </div>
                        @switch($data->status)
                            @case('active')
                                <div class="status gold">{{ $data->status }}</div>
                                @break
                            @case('redeemed')
                                  <div class="status green">{{ $data->status }}</div>
                                @break
                            @default
                             <div class="status green">{{ $data->status }}</div>
                                  
                        @endswitch

                       </div>
                     
                       <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                           
<span>Used By:</span>

                        </div>
                        <span class="bold">{{ $data->used_by }}</span>
                       </div>
                        <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                          

<span>Invited By:</span>

                        </div>
                        <span class="bold">{{ $data->ref }}</span>
                       </div>
                         <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                       



<span>Package:</span>

                        </div>
                        <span class="bold">{{ $data->package->name }}</span>
                       </div>
                        <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                       




<span>Package Cost:</span>

                        </div>
                        <span class="bold">&#8358;{{ number_format($data->package->cost,2) }}</span>
                       </div>
                         <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                         

<span>Created:</span>

                        </div>
                        <span class="bold">{{ $data->frame }}</span>
                       </div>
                     </div>
                    </div>
                @endforeach
                @if ($coupons->currentPage() >= 1)
                   @include('components.sections',[
                    'paginate' => true,
                    'data' => $coupons 
                   ]) 
                @endif
            @endif
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
    </script>
@endsection