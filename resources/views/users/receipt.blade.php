@extends('layout.users.app')
@section('title')
    Transaction Receipt
@endsection
@section('css')
    <style class="css">
         header{
            display:none !important;
         }
         footer{
            display:none !important;
         }
        .house{
        
            background-color:var(--bg);
            background-size:cover;
            background-position:center;
            z-index:5000;
        }
        .status-details{
            position:relative;
            margin-top:30px !important;
            width:80%;
            margin-left:auto;
            margin-right:auto;
        }
        .status-details::before{
            position:absolute;
            content:'';
            left:50%;
           bottom:100%;
           transform:translateX(-50%);
           border-left:5px solid transparent;
           border-right:5px solid transparent;
           border-bottom:5px solid var(--bg-lighter);
        }
        .receipt-body{
            background:rgba(var(--rgt),0.05);
            width:100%;
            /* padding:20px; */
            border:1px solid rgba(var(--rgt),0.1);
            border-radius:10px;
        }
        .action-btn{
            height:50px;
            width:100%;
            border-radius:10px;
            display:flex;
            align-items:center;
            justify-content: center;

        }
        .action-btn.go-back{
            border:1px solid rgba(var(--rgt),0.1);
            background:rgba(var(--rgt),0.05)
        }
        .action-btn.share{
            color:var(--primary-text);
            background:var(--primary)
        }
       
    </style>
@endsection
@section('main')
    <section class="column align-center justify-center p-20">
        {{-- HEADER --}}
        <div class="row bg-transparent trx-head backdrop-blur-10 space-between pos-fixed top-0 left-0 right-0 p-10 align-center">
            <div onclick="
            spa(event,'{{ url('users/transactions') }}');
            " class="h-30 pc-pointer w-30 column bg circle justify-center br-10">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.5303 5.46967C10.8232 5.76256 10.8232 6.23744 10.5303 6.53033L5.81066 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H5.81066L10.5303 17.4697C10.8232 17.7626 10.8232 18.2374 10.5303 18.5303C10.2374 18.8232 9.76256 18.8232 9.46967 18.5303L3.46967 12.5303C3.17678 12.2374 3.17678 11.7626 3.46967 11.4697L9.46967 5.46967C9.76256 5.17678 10.2374 5.17678 10.5303 5.46967Z" fill="CurrentColor"></path>
</svg>

            </div>
            <strong class="desc">Transaction Receipt</strong>
            <span></span>
        </div>
        {{-- RECEIPT BODY --}}
        <div class="receipt-body">
            {{-- First group/head group --}}
          <div class="column w-full p-20 g-20">
             {{-- date and type --}}
           <div class="column g-2">
             {{-- type --}}
           <div class="column desc w-fit">
{{ $data->type }}
           </div>
           {{-- date --}}
           <small class="opacity-07">{{ $data->date_format }}</small>
           </div>
           {{-- amount group --}}
           <div class="column m-top-20 g-2">
            <small>Amount</small>
            <strong class="w-fit column" style="font-size:2rem">NGN{{ number_format($data->amount,2) }}</strong>
           
           </div>
          </div>
           <hr style="background:rgba(var(--rgt),0.1)" class="w-full">
         
        
          {{-- DETAILS SECTION --}}
          <div class="column p-20 g-10">
              {{-- status --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
       @if ($data->status == 'pending')
           <span class="c-gold">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>

           </span>
       @endif
        @if ($data->status == 'success')
           <span class="c-green">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

           </span>
       @endif
        @if ($data->status == 'rejected')
           <span class="c-red">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,130.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>

           </span>
       @endif
    </div>
   <div class="column g-2">
     <span class="opacity-07">Status</span>
    <span class="font-1">{{ $data->status }}</span>
   </div>
</div>
            {{-- transaction type --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M68,100A12,12,0,0,1,80,88h96a12,12,0,0,1,0,24H80A12,12,0,0,1,68,100Zm12,52h96a12,12,0,0,0,0-24H80a12,12,0,0,0,0,24ZM236,56V208a12,12,0,0,1-17.37,10.73L192,205.42l-26.63,13.31a12,12,0,0,1-10.74,0L128,205.42l-26.63,13.31a12,12,0,0,1-10.74,0L64,205.42,37.37,218.73A12,12,0,0,1,20,208V56A20,20,0,0,1,40,36H216A20,20,0,0,1,236,56Zm-24,4H44V188.58l14.63-7.31a12,12,0,0,1,10.74,0L96,194.58l26.63-13.31a12,12,0,0,1,10.74,0L160,194.58l26.63-13.31a12,12,0,0,1,10.74,0L212,188.58Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Type</span>
    <span class="font-1">{{ $data->type }}</span>
   </div>
</div>
     {{-- transaction amount --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm0,192a84,84,0,1,1,84-84A84.09,84.09,0,0,1,128,212Zm44-64a32,32,0,0,1-32,32v4a12,12,0,0,1-24,0v-4H104a12,12,0,0,1,0-24h36a8,8,0,0,0,0-16H116a32,32,0,0,1,0-64V72a12,12,0,0,1,24,0v4h12a12,12,0,0,1,0,24H116a8,8,0,0,0,0,16h24A32,32,0,0,1,172,148Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Amount</span>
    <span class="font-1">{!! Currency(Auth::guard('users')->user()->id)  !!}{{ number_format($data->amount,2) }}</span>
   </div>
</div>
  {{-- transaction fee --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M204,168a52.06,52.06,0,0,1-52,52H140v12a12,12,0,0,1-24,0V220H104a52.06,52.06,0,0,1-52-52,12,12,0,0,1,24,0,28,28,0,0,0,28,28h48a28,28,0,0,0,0-56H112a52,52,0,0,1,0-104h4V24a12,12,0,0,1,24,0V36h4a52.06,52.06,0,0,1,52,52,12,12,0,0,1-24,0,28,28,0,0,0-28-28H112a28,28,0,0,0,0,56h40A52.06,52.06,0,0,1,204,168Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Fee</span>
    <span class="font-1">{!! Currency(Auth::guard('users')->user()->id)  !!}{{ number_format(0,2) }}</span>
   </div>
</div>
 {{-- transaction reference --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M205.82,128l28.6-50A12,12,0,0,0,224,60H167l-28.55-50A12,12,0,0,0,128,4h0a12,12,0,0,0-10.42,6.05L89,60H32A12,12,0,0,0,21.58,78l28.58,50L21.58,178A12,12,0,0,0,32,196H89l28.57,50a12,12,0,0,0,20.84,0L167,196h57a12,12,0,0,0,10.42-17.95Zm-2.5-44L192,103.81,180.68,84Zm-25.14,44L153,172h-50.1L77.81,128l25.13-44H153ZM128,40.18,139.33,60H116.66ZM52.68,84H75.29L64,103.82Zm0,87.92L64,152.18,75.29,172ZM128,215.82,116.66,196h22.67ZM180.68,172,192,152.19,203.32,172Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Transaction Reference</span>
    <span class="font-1">{{ $data->uniqid }}</span>
   </div>
</div>
 {{-- session id --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M252.49,87.51l-38-38a12,12,0,0,0-17,0L168,79,136.49,47.51a12,12,0,0,0-17,0L88,79,58.49,49.51a12,12,0,0,0-17,0l-38,38a12,12,0,0,0,0,17l38,38a12,12,0,0,0,17,0L88,113l23,23L79.51,167.51a12,12,0,0,0,0,17l40,40a12,12,0,0,0,17,0l40-40a12,12,0,0,0,0-17L145,136l23-23,29.51,29.52a12,12,0,0,0,17,0l38-38A12,12,0,0,0,252.49,87.51ZM50,117,29,96,50,75,71,96Zm78,82-23-23,23-23,23,23Zm0-80L105,96l23-23,23,23Zm78-2L185,96l21-21,21,21Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Session ID</span>
    <span class="font-1">{{ rand(10000000000000000,999999999999999999) }}</span>
   </div>
</div>


 @if (str_contains(strtolower($data->type),'withdrawal'))
 {{-- recipient details --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M224,44H32A20,20,0,0,0,12,64V192a20,20,0,0,0,20,20H224a20,20,0,0,0,20-20V64A20,20,0,0,0,224,44Zm-4,24V88H36V68ZM36,188V112H220v76Zm172-24a12,12,0,0,1-12,12H164a12,12,0,0,1,0-24h32A12,12,0,0,1,208,164Zm-68,0a12,12,0,0,1-12,12H116a12,12,0,0,1,0-24h12A12,12,0,0,1,140,164Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Recipient Details</span>
    <span class="font-1">{{ strtoupper($data->json->data->bank->account_name) }} | {{ $data->json->data->bank->account_number }} | {{ $data->json->data->bank->bank_name }}</span>
   </div>
</div>
 @endif

@if (str_contains(strtolower($data->type),'data bundle'))
{{-- data bundle details --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M224,154.8l-47.09-21.11-.18-.08a19.94,19.94,0,0,0-19,1.75,13.08,13.08,0,0,0-1.12.84l-22.31,19c-13-7.05-26.43-20.37-33.49-33.21l19.06-22.66a11.76,11.76,0,0,0,.85-1.15,20,20,0,0,0,1.66-18.83,1.42,1.42,0,0,1-.08-.18L101.2,32A20.06,20.06,0,0,0,80.42,20.15,60.27,60.27,0,0,0,28,80c0,81.61,66.39,148,148,148a60.27,60.27,0,0,0,59.85-52.42A20.06,20.06,0,0,0,224,154.8ZM176,204A124.15,124.15,0,0,1,52,80,36.29,36.29,0,0,1,80.48,44.46l18.82,42L80.14,109.28a12,12,0,0,0-.86,1.16A20,20,0,0,0,78,130.08c9.42,19.28,28.83,38.56,48.31,48A20,20,0,0,0,146,176.63a11.63,11.63,0,0,0,1.11-.85l22.43-19.07,42,18.81A36.29,36.29,0,0,1,176,204Z"></path></svg>
    </div>
   <div class="column g-2">
     <span class="opacity-07">Recipient Mobile</span>
    <span class="font-1">{{ $data->json->body->number }}</span>
   </div>
</div>

@endif


@if (str_contains(strtolower($data->type),'data bundle'))
{{-- data bundle details --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M138.67,86.51a12,12,0,0,0-21.34,0l-72,140a12,12,0,1,0,21.34,11l11-21.49H178.28l11.05,21.49a12,12,0,1,0,21.34-11ZM128,118.24,145.36,152H110.64ZM90.07,192l8.22-16h59.42l8.22,16ZM174.51,68.73a12,12,0,1,1-21.45,10.75,28,28,0,0,0-50.37.52A12,12,0,1,1,81,69.7,52.28,52.28,0,0,1,128,40,51.74,51.74,0,0,1,174.51,68.73Zm-124.58,76a92,92,0,1,1,156.14,0A12,12,0,0,1,185.71,132a68,68,0,1,0-115.42,0A12,12,0,0,1,49.93,144.7Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Recipient Network</span>
    <span class="font-1">{{ $data->json->body->network }}</span>
   </div>
</div>

@endif


@if (str_contains(strtolower($data->type),'data bundle'))
{{-- data bundle details --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M172,72V200a12,12,0,0,1-24,0V72a12,12,0,0,1,24,0Zm28-52a12,12,0,0,0-12,12V200a12,12,0,0,0,24,0V32A12,12,0,0,0,200,20Zm-80,80a12,12,0,0,0-12,12v88a12,12,0,0,0,24,0V112A12,12,0,0,0,120,100ZM80,140a12,12,0,0,0-12,12v48a12,12,0,0,0,24,0V152A12,12,0,0,0,80,140ZM40,180a12,12,0,0,0-12,12v8a12,12,0,0,0,24,0v-8A12,12,0,0,0,40,180Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Data Bundle</span>
    <span class="font-1">{{ ($data->json->body->amount / 1000) }}GB</span>
   </div>
</div>

@endif

@if (str_contains(strtolower($data->type),'airtime'))
{{-- airtime topup details --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M224,154.8l-47.09-21.11-.18-.08a19.94,19.94,0,0,0-19,1.75,13.08,13.08,0,0,0-1.12.84l-22.31,19c-13-7.05-26.43-20.37-33.49-33.21l19.06-22.66a11.76,11.76,0,0,0,.85-1.15,20,20,0,0,0,1.66-18.83,1.42,1.42,0,0,1-.08-.18L101.2,32A20.06,20.06,0,0,0,80.42,20.15,60.27,60.27,0,0,0,28,80c0,81.61,66.39,148,148,148a60.27,60.27,0,0,0,59.85-52.42A20.06,20.06,0,0,0,224,154.8ZM176,204A124.15,124.15,0,0,1,52,80,36.29,36.29,0,0,1,80.48,44.46l18.82,42L80.14,109.28a12,12,0,0,0-.86,1.16A20,20,0,0,0,78,130.08c9.42,19.28,28.83,38.56,48.31,48A20,20,0,0,0,146,176.63a11.63,11.63,0,0,0,1.11-.85l22.43-19.07,42,18.81A36.29,36.29,0,0,1,176,204Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Recipient Mobile</span>
    <span class="font-1">{{ $data->json->body->number }}</span>
   </div>
</div>

@endif


@if (str_contains(strtolower($data->type),'airtime'))
{{-- airtime topup details --}}
  <div style="border-bottom:0.1px solid rgba(var(--rgt),0.1)" class="row p-10 w-full align-center g-10">
    <div class="main-border-bg h-30 circle w-30 column no-shrink align-center justify-center">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M224,154.8l-47.09-21.11-.18-.08a19.94,19.94,0,0,0-19,1.75,13.08,13.08,0,0,0-1.12.84l-22.31,19c-13-7.05-26.43-20.37-33.49-33.21l19.06-22.66a11.76,11.76,0,0,0,.85-1.15,20,20,0,0,0,1.66-18.83,1.42,1.42,0,0,1-.08-.18L101.2,32A20.06,20.06,0,0,0,80.42,20.15,60.27,60.27,0,0,0,28,80c0,81.61,66.39,148,148,148a60.27,60.27,0,0,0,59.85-52.42A20.06,20.06,0,0,0,224,154.8ZM176,204A124.15,124.15,0,0,1,52,80,36.29,36.29,0,0,1,80.48,44.46l18.82,42L80.14,109.28a12,12,0,0,0-.86,1.16A20,20,0,0,0,78,130.08c9.42,19.28,28.83,38.56,48.31,48A20,20,0,0,0,146,176.63a11.63,11.63,0,0,0,1.11-.85l22.43-19.07,42,18.81A36.29,36.29,0,0,1,176,204Z"></path></svg>

    </div>
   <div class="column g-2">
     <span class="opacity-07">Recipient Network</span>
    <span class="font-1">{{ $data->json->body->network }}</span>
   </div>
</div>

@endif
 



                  
                  

          </div>
        
       
 


           
        
        
  
       
    {{-- action buttons --}}
        <div style="margin:20px 0" class="row buttons-group w-full p-20 align-center g-10 space-between">
        <div class="action-btn go-back" onclick="spa(event,'{{ url('users/transactions') }}');" >Go Back</div>
          <div class="action-btn share">Share Receipt</div>
     </div>
    </section>
    
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Restyle : function(){
                try{
                   
                       document.querySelector('.receipt-body').style.marginTop=document.querySelector('.trx-head').getBoundingClientRect().height + 'px';
                         }catch(error){
                    alert(error.stack);
                }
                 }
        }
        MyFunc.Restyle()
    </script>
@endsection


 