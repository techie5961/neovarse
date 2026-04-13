@extends('layout.users.app')
@section('title')
    Recharge
@endsection
@section('main')
     <section class="column p-20 g-20">
        {{-- new row --}}
             <div style="border:1px solid var(--primary-01);background:var(--primary-005)" class="w-full balance-div br-20 p-20 br-10 column g-10">
                <div class="row w-full align-center g-10">
                    <div style="background:linear-gradient(to bottom right,hsl(var(--primary-hsl),50%,80%),hsl(var(--primary-hsl),50%,50%))" class="h-40 primary-text perfect-square no-shrink br-10 column align-center justify-center">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M176,116H152a12,12,0,0,1,0-24h24a12,12,0,0,1,0,24ZM104,92h-4V88a12,12,0,0,0-24,0v4H72a12,12,0,0,0,0,24h4v4a12,12,0,0,0,24,0v-4h4a12,12,0,0,0,0-24ZM244.76,202.94a40,40,0,0,1-61,5.35,7,7,0,0,1-.53-.56L144.67,164H111.33L72.81,207.73c-.17.19-.35.38-.53.56A40,40,0,0,1,4.62,173.05a1.18,1.18,0,0,1,0-.2L21,88.79A63.88,63.88,0,0,1,83.88,36H172a64.08,64.08,0,0,1,62.93,52.48,1.8,1.8,0,0,1,0,.19l16.36,84.17a1.77,1.77,0,0,1,0,.2A39.74,39.74,0,0,1,244.76,202.94ZM172,140a40,40,0,0,0,0-80H83.89A39.9,39.9,0,0,0,44.62,93.06a1.55,1.55,0,0,0,0,.21l-16.34,84a16,16,0,0,0,13,18.44,16.07,16.07,0,0,0,13.86-4.21L96.9,144.07a12,12,0,0,1,9-4.07Zm55.76,37.31-7-35.95a63.84,63.84,0,0,1-44.27,22.46l24.41,27.72a16,16,0,0,0,26.85-14.23Z"></path></svg>

                    </div>
                    <div class="column g-5">
                        <span style="color:hsl(var(--primary-hsl),50%,80%)">GAMING WALLET</span>
                     <strong class="desc">&#8358;{{ number_format(Auth::guard('users')->user()->gaming_balance,2) }}</strong>
                    </div>
                </div>
                <span class="opacity-07 row align-center g-5">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M236,208a12,12,0,0,1-12,12H32a12,12,0,0,1-12-12V48a12,12,0,0,1,24,0v85.55L88.1,95a12,12,0,0,1,15.1-.57l56.22,42.16L216.1,87A12,12,0,1,1,231.9,105l-64,56a12,12,0,0,1-15.1.57L96.58,119.44,44,165.45V196H224A12,12,0,0,1,236,208Z"></path></svg>

                   Your gaming balance
                </span>
            </div>

        <form action="{{ url('users/post/redeem/voucher/process') }}" onsubmit="PostRequest(event,this,MyFunc.Updated)" method="POST" class="w-full column g-20 p-20 br-20 main-border main-border-bg">
     
     
            <div style="color:var(--primary-light);margin-bottom:10px;" class="row br-10 g-5 align-center">
                <span>
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M224,44H32A20,20,0,0,0,12,64V192a20,20,0,0,0,20,20H224a20,20,0,0,0,20-20V64A20,20,0,0,0,224,44Zm-4,24V88H36V68ZM36,188V112H220v76Zm172-24a12,12,0,0,1-12,12H164a12,12,0,0,1,0-24h32A12,12,0,0,1,208,164Zm-68,0a12,12,0,0,1-12,12H116a12,12,0,0,1,0-24h12A12,12,0,0,1,140,164Z"></path></svg>

                </span>
                <span class="desc bold">Fund Games Wallet</span>
              
            </div>


             <span>Enter a valid voucher code below and click on the button, your games wallet would be automatically creditted with the voucher value</span>
    
        <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
        <div class="column g-5">
        <label for="">Voucher Code</label>
        <div style="border: 1px solid rgba(var(--rgt),0.1)" class="cont h-50 w-full br-10 bg">
            <input name="code" placeholder="Enter voucher code" type="text" class="inp required input w-full h-full border-none br-10 bg-transparent">
        </div>
        <span>Dont have a voucher code? <a href="{{ url('vendors') }}" class="c-primary">Click to purchase one</a></span>
    </div> 
   
    
     
    <button class="post">
         <span>Redeem Voucher</span>
        </button>
    </form>
    
     </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Updated : function(response,event){
                
                let data=JSON.parse(response);
               
                if(data.status == 'success'){
                     
                    spa(event,"{{ url()->current() }}")
                }
            }
        }
    </script>
@endsection