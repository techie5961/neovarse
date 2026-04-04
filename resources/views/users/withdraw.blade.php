@extends('layout.users.app')
@section('title')
    Withdraw
@endsection
@section('css')
    <style class="css">
       .wallets.active{
        background:#4caf50 !important;
        color:white !important;
         background:aqua !important;
         color:black !important;
        animation: scale-in-out 0.5s ease forwards;
       } 
       @keyframes scale-in-out{
        0%,100%{
            transform: scale(1)
        }

        50%{
            transform:scale(0.95);
        }

       }
      
    </style>
@endsection
@section('main')
    <section class="w-full align-center justify-center column g-10 p-20">
     
         <div class="section-group w-full column g-10 br-10 p-10">
            <div class="row p-10 g-5 c-primary-light br-10 align-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M240,52H16A12,12,0,0,0,4,64V192a12,12,0,0,0,12,12H240a12,12,0,0,0,12-12V64A12,12,0,0,0,240,52ZM181.21,180H74.79A60.18,60.18,0,0,0,28,133.21V122.79A60.18,60.18,0,0,0,74.79,76H181.21A60.18,60.18,0,0,0,228,122.79v10.42A60.18,60.18,0,0,0,181.21,180ZM228,97.94A36.23,36.23,0,0,1,206.06,76H228ZM49.94,76A36.23,36.23,0,0,1,28,97.94V76ZM28,158.06A36.23,36.23,0,0,1,49.94,180H28ZM206.06,180A36.23,36.23,0,0,1,228,158.06V180ZM128,88a40,40,0,1,0,40,40A40,40,0,0,0,128,88Zm0,56a16,16,0,1,1,16-16A16,16,0,0,1,128,144Z"></path></svg>

                </span>
                <span class="desc bold">Request Withdrawal</span>
              
            </div>
           
            <form action="{{ url('users/post/withdraw/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Completed)" class="w-full column g-10">
              
                <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                
              
                {{-- New Input --}}
               <div class="column w-full g-5">
                 <label for="">Select Withdrawal Wallet</label>
                <div style="border:1px solid var(--bg-lighter)" class="cont row align-center bg-light w-full h-50">
                <select name="wallet"  class="w-full inp input required account-number h-full no-border br-10 bg-transparent">
                    <option value="" selected disabled>Select Wallet...</option>
                    <option value="activities_balance">Coin Wallet - &#8358;{{ number_format(Auth::guard('users')->user()->activities_balance,2) }}</option>
                    <option value="affiliate_balance">Profit Split Wallet - &#8358;{{ number_format(Auth::guard('users')->user()->affiliate_balance,2) }}</option>
                    <option value="gaming_balance">Game Wallet - &#8358;{{ number_format(Auth::guard('users')->user()->gaming_balance,2) }}</option>
                     <option value="gaming_balance">GiftCard Wallet - {{ $giftcard_balance }}</option>
            
                </select>    
                </div>
               </div>
               
        {{-- New Input --}}
               <div class="column w-full g-5">
                <label for="">Enter Withdrawal Amount</label>
                <div style="border:1px solid var(--bg-lighter)" class="cont row align-center bg-light w-full h-50">
                    <input placeholder="Enter withdrawal amount" name="amount" type="number" class="w-full inp input required account-number h-full no-border br-10 bg-transparent">
                </div>
               </div>
                <span class="minimum_text"></span>
               

                {{-- BANK DETAILS --}}
                @if (isset(Auth::guard('users')->user()->bank))
                     <div class="w-full column g-10 main-border main-border-bg p-10 br-10">
                    <strong class="desc">Bank Account Details</strong>
                    <div class="w-full br-10 p-10 br-10 main-border bg column g-5">
                        <span>{{ strtoupper($bank->account_name) }}</span>
                        <span>{{ ucwords($bank->bank_name) }}</span>
                        <span>{{ ucwords($bank->account_number) }}</span>
                    </div>
                    <div onclick="spa(event,'{{ url('users/bank/add') }}')" class="row no-select align-center no-select pc-pointer c-primary-light g-5">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M232.49,55.51l-32-32a12,12,0,0,0-17,0l-96,96A12,12,0,0,0,84,128v32a12,12,0,0,0,12,12h32a12,12,0,0,0,8.49-3.51l96-96A12,12,0,0,0,232.49,55.51ZM192,49l15,15L196,75,181,60Zm-69,99H108V133l56-56,15,15Zm105-7.43V208a20,20,0,0,1-20,20H48a20,20,0,0,1-20-20V48A20,20,0,0,1,48,28h67.43a12,12,0,0,1,0,24H52V204H204V140.57a12,12,0,0,1,24,0Z"></path></svg>

                        </span>
                        <span>Edit Bank Details</span>
                    </div>
                </div>
                
                @endif
                 
               
           
                <button class="post clip-0 bold br-0">Make Withdrawal</button>
            </form>
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Completed : function(response,event){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,data.url);
                }
            }
        }
    </script>
@endsection