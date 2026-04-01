@extends('layout.users.app')
@section('title')
    Buy Data Bundle
@endsection
@section('css')
    <style class="css">
        .placeholder-bold::placeholder{
            font-weight: bold;
        }
        .networks{
            top:calc(100% + 10px);
        }
        .angle{
            border-left:5px solid transparent;
            border-right:5px solid transparent;
            border-bottom:5px solid rgba(0,0,0,0.5);
          
            position:absolute;
            bottom:100%;
            left:10px;
        }
        hr.bg-silver{
          background:#222;
        }
        .network.active .radio span{
            background:#4caf50 !important;
        }
        .network.active .radio{
           border-color:#4caf50;
        }
        .amount.active{
            background:aqua;
            color:black;
            animation:bounce-in-out 0.5s ease forwards;
        }
        @keyframes bounce-in-out{
            50%{
                transform:scale(0.95);
            }
            0%,100%{
                transform:scale(1);
            }
        }
    </style>
@endsection
@section('main')
    <section class="w-full column p-10 g-10">
        <div class="w-full column g-10 mmax-w-500 br-10 p-10">
 <div class="row p-10 space-between br-10 align-center">

                <span class="desc bold">Buy Data Bundle</span>
            
            </div>
            <div class="column g-5 w-full">
                 @if ($general->vtu->data == 'open')
                <span>
                  The Data portal is now active and accessible. Users can proceed with data bundle purchases and related services while the portal remains open.

                </span>
                    
                @else
                  <span>The Data portal is presently closed by Admin. It will reopen soon — please check back later.</span>
  
                @endif
                            </div>
                            <label for="">Select Network Provider & Enter Number</label>
       <div style="border:1px solid var(--bg-lighter)" class="w-full bg-light pos-relative h-50 row align-center">
             <div onclick="
           if(document.querySelector('.networks').classList.contains('display-none')){
            document.querySelector('.networks').classList.remove('display-none');
           }else{
            document.querySelector('.networks').classList.add('display-none');
           }
                " class="h-full pc-pointer g-5 row align-center p-10">
            <img src="{{ asset('networks/mtn.jpg') }}" alt="" class="h-full network-img no-shrink perfect-square circle">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M72.61,83.06a8,8,0,0,1,1.73-8.72l48-48a8,8,0,0,1,11.32,0l48,48A8,8,0,0,1,176,88H80A8,8,0,0,1,72.61,83.06ZM176,168H80a8,8,0,0,0-5.66,13.66l48,48a8,8,0,0,0,11.32,0l48-48A8,8,0,0,0,176,168Z"></path></svg>

            </div>
            <input readonly onfocus="this.removeAttribute('readonly')" autocomplete="off" oninput="
             if(document.querySelector('input[name=network]').value !== '' && document.querySelector('input[name=amount]').value !== '' ){
             if((this.value).replace(/^0+/,'').length == 10){
              document.querySelector('button.topup').classList.remove('disabled');
             }else{
              document.querySelector('button.topup').classList.add('disabled');
             }
              }
            " type="number" placeholder="0XXXXXXXXX" name="number" class="inp placeholder-bold input w-full h-full bg-transparent border-none br-10">
        <div style="background:rgba(0,0,0,0.5) !important;backdrop-filter:blur(30px);-webkit-backdrop-filter:blur(30px);" class="pos-absolute max-w-500 average display-none networks top-full w-full column p-10 g-2 bg-light br-10">
            <div class="angle"></div>
            <div onclick="
             try{
             
              document.querySelector('.network-img').src=this.querySelector('img').src;
              document.querySelectorAll('.network').forEach((network)=>{
              network.classList.remove('active');
              });
              this.classList.add('active');
              document.querySelector('input[name=network]').value='MTN';
              this.closest('.networks').classList.add('display-none');
              if(document.querySelector('input[name=amount]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }
             }catch(error){
             alert(error.stack);
             }

              " class="w-full network align-center space-between row g-10 pc-pointer">
              <img src="{{ asset('networks/mtn.jpg') }}" alt="" class="h-30 no-shrink perfect-square circle">
              <strong class="m-right-auto">MTN</strong>
              <div class="h-15 p-2 radio perfect-square circle border-1 border-color-silver">
                <span class="h-full row perfect-square circle"></span>
              </div>
            </div>
            <hr class="bg-silver">
              <div onclick="
              document.querySelector('.network-img').src=this.querySelector('img').src;
              document.querySelectorAll('.network').forEach((network)=>{
              network.classList.remove('active');
              });
              this.classList.add('active');
              document.querySelector('input[name=network]').value='Airtel';
              this.closest('.networks').classList.add('display-none');
               if(document.querySelector('input[name=amount]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }

              " class="w-full network align-center space-between row g-10 pc-pointer">
              <img src="{{ asset('networks/airtel.jpg') }}" alt="" class="h-30 no-shrink perfect-square circle">
              <strong class="m-right-auto">Airtel</strong>
              <div class="h-15 p-2 radio perfect-square circle border-1 border-color-silver">
                <span class="h-full row perfect-square circle"></span>
              </div>
            </div>
            <hr class="bg-silver">
              <div onclick="
              document.querySelector('.network-img').src=this.querySelector('img').src;
              document.querySelectorAll('.network').forEach((network)=>{
              network.classList.remove('active');
              });
              this.classList.add('active');
              document.querySelector('input[name=network]').value='Globacom';
              this.closest('.networks').classList.add('display-none');
               if(document.querySelector('input[name=amount]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }

              " class="w-full network align-center space-between row g-10 pc-pointer">
              <img src="{{ asset('networks/glo.jpg') }}" alt="" class="h-30 no-shrink perfect-square circle">
              <strong class="m-right-auto">Globacom</strong>
              <div class="h-15 p-2 radio perfect-square circle border-1 border-color-silver">
                <span class="h-full row perfect-square circle"></span>
              </div>
            </div>
            <hr class="bg-silver">
              <div onclick="
              document.querySelector('.network-img').src=this.querySelector('img').src;
              document.querySelectorAll('.network').forEach((network)=>{
              network.classList.remove('active');
              });
              this.classList.add('active');
              document.querySelector('input[name=network]').value='9Mobile';
              this.closest('.networks').classList.add('display-none');
               if(document.querySelector('input[name=amount]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }

              " class="w-full network align-center space-between row g-10 pc-pointer">
              <img src="{{ asset('networks/9mobile.jpg') }}" alt="" class="h-30 no-shrink perfect-square circle">
              <strong class="m-right-auto">9Mobile</strong>
              <div class="h-15 p-2 radio perfect-square circle border-1 border-color-silver">
                <span class="h-full row perfect-square circle"></span>
              </div>
            </div>
            
        </div>
        </div>
      
        <label for="">Select Amount</label>
        <div class="w-full grid grid-full g-10 grid-3 pc-grid-6">
        
            <div onclick="
            document.querySelectorAll('.amount').forEach((amount)=>{
            amount.classList.remove('active');
            })
                this.classList.add('active');
                document.querySelector('input[name=amount]').value=1000;
                 if(document.querySelector('input[name=network]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }

                " class="column transition-ease-half amount bg-light no-select  justify-center p-10 w-full g-5 pc-pointer">
                <strong class="font-1">1GB</strong>
                <span class="text-average">click to select</span>
            </div>
              <div onclick="
            document.querySelectorAll('.amount').forEach((amount)=>{
            amount.classList.remove('active');
            })
                this.classList.add('active');
                   document.querySelector('input[name=amount]').value=2000;
                    if(document.querySelector('input[name=network]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }

                " class="column transition-ease-half amount bg-light no-select  justify-center p-10 w-full g-5 pc-pointer">
                <strong class="font-1">2GB</strong>
                <span class="text-average">click to select</span>
            </div>
              <div onclick="
            document.querySelectorAll('.amount').forEach((amount)=>{
            amount.classList.remove('active');
            })
                this.classList.add('active');
                   document.querySelector('input[name=amount]').value=3000;

                    if(document.querySelector('input[name=network]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }

                " class="column transition-ease-half amount bg-light no-select  justify-center p-10 w-full g-5 pc-pointer">
                <strong class="font-1">3GB</strong>
                <span class="text-average">click to select</span>
            </div>
              <div onclick="
            document.querySelectorAll('.amount').forEach((amount)=>{
            amount.classList.remove('active');
            })
                this.classList.add('active');
                   document.querySelector('input[name=amount]').value=4000;
                    if(document.querySelector('input[name=network]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }

                " class="column transition-ease-half amount bg-light no-select  justify-center p-10 w-full g-5 pc-pointer">
                <strong class="font-1">4GB</strong>
                <span class="text-average">click to select</span>
            </div>
            <div onclick="
            document.querySelectorAll('.amount').forEach((amount)=>{
            amount.classList.remove('active');
            })
                this.classList.add('active');
                   document.querySelector('input[name=amount]').value=5000;
                    if(document.querySelector('input[name=network]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }

                " class="column transition-ease-half amount bg-light no-select  justify-center p-10 w-full g-5 pc-pointer">
                <strong class="font-1">5GB</strong>
                <span class="text-average">click to select</span>
            </div>
            <div onclick="
            document.querySelectorAll('.amount').forEach((amount)=>{
            amount.classList.remove('active');
            })
                this.classList.add('active');
                   document.querySelector('input[name=amount]').value=6000;
                    if(document.querySelector('input[name=network]').value !== '' && (document.querySelector('input[name=number]').value).replace(/^0+/,'').length == 10 ){
              document.querySelector('button.topup').classList.remove('disabled');
              }

                " class="column transition-ease-half amount bg-light no-select  justify-center p-10 w-full g-5 pc-pointer">
                <strong class="font-1">6GB</strong>
                <span class="text-average">click to select</span>
            </div>
        </div>
          {{-- NETWORK SELECTED HIDDEN INPUT --}}
        <input type="hidden" value="null" name="network" name="hidden" class="input bg">
        {{-- AMOUNT SELECTED HIDDEN INPUT --}}
        <input type="hidden" name="amount" class="input bg">
        <button onclick="
        let amount=document.querySelector('input[name=amount]').value;
        let number=document.querySelector('input[name=number]').value;
        let network=document.querySelector('input[name=network]').value;
        let net_img=document.querySelector('.network-img').src;
        if(network == 'null'){
        document.querySelector('.networks').classList.remove('display-none');
        CreateNotify('error','Please select network provider');
        return;
        
        }
        let data=`<div class='w-full p-20 column g-10'>
        <div class='row w-full align-center g-10 space-between'>
            <span class='text-dim'>Product Name</span>
            <span>Data Bundle</span>
        </div>
         <div class='row w-full align-center g-5 space-between'>
            <span class='text-dim'>Recipient Mobile</span>
            <span>${document.querySelector('input[name=number]').value}</span>
        </div>
        <div class='row w-full align-center g-5 space-between'>
            <span class='text-dim'>Recipient Network</span>
            <img src='${net_img}' alt='' class='m-left-auto no-shrink h-15 perfect-square circle'>
            <span>${document.querySelector('input[name=network]').value}</span>
        </div>
         <div class='row w-full align-center g-5 space-between'>
            <span class='text-dim'>Topup Amount</span>
            <span>{!! Currency(Auth::guard('users')->user()->id)  !!}${parseFloat(document.querySelector('input[name=amount]').value).toLocaleString()}.00</span>
        </div>
          <div class='row w-full align-center g-5 space-between'>
            <span class='text-dim'>Debit Wallet</span>
            <span>Activities Wallet</span>
        </div>
        <button onclick='GetRequest(event,&quot;{{ url('users/get/data/topup?number=') }}${number}&network=${network}&amount=${amount}&quot;,this,MyFunc.Completed)' class='btn-primary m-top-10 m-bottom-10 h-50 w-full clip-1000 br-1000'>Confirm Purchase</button>
    </div>`;
    SlideUp(data);
        " class="post topup clip-0 br-0 bold disabled">Buy Data Bundle</button>
    </div>
    </section>
@endsection

@section('js')
     <script class="js">
     window.MyFunc ={
        Completed : function(response,event){
       let data=JSON.parse(response);
       CreateNotify(data.status,data.message);
       if(data.status == 'success'){
        HideSlideUp();
        spa(event,data.url);
       }

        }
     }
     </script>
@endsection