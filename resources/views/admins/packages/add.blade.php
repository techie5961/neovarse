@extends('layout.admins.app')
@section('title')
    Add Package
@endsection
@section('main')

    <section class="w-full column g-10 p-10">
        <form action="{{ url('admins/post/packages/add/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Added)" class="w-full bg-white br-10 p-10 column g-10">
           <input type="hidden" name="_token" class="input" value="{{ @csrf_token() }}">
          <div class="row w-full g-10 align-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--bg-secondary)" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V80A16,16,0,0,0,224,64ZM96,56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96ZM224,80v32H192v-8a8,8,0,0,0-16,0v8H80v-8a8,8,0,0,0-16,0v8H32V80Zm0,112H32V128H64v8a8,8,0,0,0,16,0v-8h96v8a8,8,0,0,0,16,0v-8h32v64Z"></path></svg>

             <strong class="c-bg-secondary desc">Add New Package</strong>
           </div>
           <hr>
           <label for="">Package Banner</label>
            <div class="w-full cont br-10 bg-dim h-50 border-1 border-color-silver">
              <input type="file" accept="image/*" name="banner" class="inp input required w-full h-full bg-transparent br-10">
            </div>
            <label for="">Package Type</label>
           <div class="w-full cont br-10 bg-dim h-50 border-1 border-color-silver">
           <select onchange="
            if(this.value == 'free'){
            document.querySelector('.reg-fee').querySelector('input').classList.remove('input');
             document.querySelector('.reg-fee').querySelector('input').classList.remove('required');
             document.querySelector('.reg-fee').classList.add('display-none');
            
            }else{
             document.querySelector('.reg-fee').querySelector('input').classList.add('input');
             document.querySelector('.reg-fee').querySelector('input').classList.add('required');
             document.querySelector('.reg-fee').classList.remove('display-none');
            
            }
            " name="type" id="" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
            <option value="">Select Package Type...</option>
            <option value="free">Free Package</option>
            <option value="paid">Paid Package</option>
           </select>
           </div>
           <label for="">Package Name</label>
           <div class="w-full cont br-10 bg-dim h-50 border-1 border-color-silver">
            <input placeholder="E.g Alpha Package" type="text" name="name" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
            <label for="">Country</label>
           <div class="w-full cont br-10 bg-dim h-50 border-1 border-color-silver">
           <select class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent" name="country">
            <option value="" selected disabled>Select Country...</option>
            <option value="nigeria">Nigeria</option>
            <option value="ghana">Ghana</option>
            <option value="cameroon">Cameroon</option>
           </select>
           </div>
           <div class="column display-none w-full reg-fee g-5">
            <label for="">Registration Fee</label>
           <div class="w-full cont br-10 bg-dim h-50 border-1 border-color-silver">
            <input placeholder="E.g 3000" type="number" step="any" name="fee" class="inp h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
             
           
            </div>
        
             <label for="">Minimum Withdrawal</label>
           <div class="w-full cont br-10 bg-dim h-50 border-1 border-color-silver">
            <input placeholder="E.g 5000" type="number" step="any" name="minimum_withdrawal" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
             <label for="">Maximum Withdrawal</label>
           <div class="w-full cont br-10 bg-dim h-50 border-1 border-color-silver">
            <input placeholder="E.g 150000" type="number" step="any" name="maximum_withdrawal" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           

           </div>
            <div class="w-full house g-5 bg-secondary-light p-10 border-1 br-10 border-color-bg-secondary column">
            <div class="row w-full align-center space-between">
              <div class="row g-5 align-center">
                <span class="c-bg-secondary">
                 <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M10.277 16.5153C10.2817 16.4054 10.4637 16.3618 10.5176 16.4576C10.771 16.9073 11.2031 17.5687 11.6935 17.8694C12.1838 18.1701 12.9692 18.2554 13.4849 18.2773C13.5948 18.282 13.6384 18.4639 13.5426 18.5179C13.0929 18.7712 12.4315 19.2034 12.1308 19.6937C11.8301 20.1841 11.7448 20.9695 11.7229 21.4851C11.7182 21.595 11.5363 21.6386 11.4823 21.5428C11.229 21.0931 10.7968 20.4318 10.3065 20.1311C9.81613 19.8304 9.03072 19.745 8.51505 19.7232C8.4052 19.7185 8.36157 19.5365 8.45737 19.4825C8.90707 19.2292 9.56842 18.7971 9.86913 18.3067C10.1698 17.8164 10.2552 17.031 10.277 16.5153Z" fill="CurrentColor"></path>
<path d="M18.4921 15.5152C18.4837 15.4056 18.2918 15.3596 18.2346 15.4535C18.0623 15.736 17.8138 16.0769 17.5376 16.2463C17.2614 16.4157 16.8449 16.4825 16.515 16.508C16.4053 16.5165 16.3593 16.7083 16.4532 16.7656C16.7357 16.9379 17.0767 17.1863 17.246 17.4625C17.4154 17.7387 17.4823 18.1552 17.5078 18.4852C17.5162 18.5948 17.7081 18.6408 17.7653 18.5469C17.9376 18.2644 18.1861 17.9234 18.4623 17.7541C18.7384 17.5847 19.155 17.5178 19.4849 17.4924C19.5945 17.4839 19.6405 17.292 19.5467 17.2348C19.2642 17.0625 18.9232 16.814 18.7538 16.5379C18.5845 16.2617 18.5176 15.8451 18.4921 15.5152Z" fill="CurrentColor"></path>
<path d="M14.7037 4.00181L14.4614 3.69574C13.5247 2.51266 13.0564 1.92112 12.5115 2.00845C11.9667 2.09577 11.7062 2.80412 11.1851 4.22083L11.0503 4.58735C10.9023 4.98993 10.8282 5.19122 10.6862 5.33897C10.5443 5.48671 10.3504 5.56417 9.96266 5.71911L9.60966 5.86016L9.3618 5.95933C8.16229 6.4406 7.55786 6.71331 7.48069 7.24324C7.39837 7.80849 7.97047 8.29205 9.11468 9.25915L9.4107 9.50935C9.73584 9.78417 9.89842 9.92158 9.99161 10.1089C10.0848 10.2962 10.0981 10.5121 10.1246 10.9441L10.1488 11.3373C10.2421 12.8574 10.2888 13.6174 10.7828 13.8794C11.2768 14.1414 11.8909 13.7319 13.1191 12.9129L13.1191 12.9129L13.4368 12.701C13.7858 12.4683 13.9603 12.3519 14.1599 12.32C14.3595 12.288 14.5616 12.344 14.9657 12.456L15.3336 12.558C16.7558 12.9522 17.4669 13.1493 17.8545 12.746C18.2421 12.3427 18.0495 11.6061 17.6644 10.1328L17.5647 9.75163C17.4553 9.33297 17.4006 9.12364 17.4307 8.91657C17.4609 8.70951 17.5725 8.52816 17.7957 8.16546L17.7957 8.16544L17.999 7.83522C18.7845 6.55883 19.1773 5.92063 18.9229 5.40935C18.6685 4.89806 17.9354 4.85229 16.4691 4.76076L16.0898 4.73708C15.6731 4.71107 15.4648 4.69807 15.2839 4.60208C15.1029 4.5061 14.9698 4.338 14.7037 4.00181L14.7037 4.00181Z" fill="CurrentColor"></path>
<path d="M8.835 13.326C6.69772 14.3702 4.91931 16.024 4.24844 18.0002C3.49589 13.2926 4.53976 10.2526 6.21308 8.36328C6.35728 8.658 6.54466 8.902 6.71297 9.09269C7.06286 9.48911 7.56518 9.91347 8.07523 10.3444L8.44225 10.6545C8.51184 10.7134 8.56597 10.7592 8.61197 10.7989C8.61665 10.8632 8.62129 10.9383 8.62727 11.0357L8.65708 11.5212C8.69717 12.1761 8.7363 12.8155 8.835 13.326Z" fill="CurrentColor"></path>
</svg>


                </span>
              
                <strong class="desc c-bg-secondary">CashBack</strong>
              </div>
                <div class="toggle active"><div onclick="
               if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                this.closest('.house').querySelector('input.inp').classList.remove('input');
                 this.closest('.house').querySelector('input.inp').classList.remove('required');
                  this.closest('.house').querySelector('.cont').classList.add('display-none');
               }else{
                this.closest('.toggle').classList.add('active');
              this.closest('.house').querySelector('input.inp').classList.add('input');
                 this.closest('.house').querySelector('input.inp').classList.add('required');
                  this.closest('.house').querySelector('.cont').classList.remove('display-none');
               }
                " class="child"></div></div>
            </div>
            <span class="text-dim">Cashback amount for this package</span>
            
           <div class="w-full cont br-10 bg-white h-50 border-1 border-color-silver">
            <input placeholder="E.g 500" type="number" step="any" name="cashback" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           </div>
           <div class="w-full house g-5 bg-secondary-light p-10 border-1 br-10 border-color-bg-secondary column">
            <div class="row w-full align-center space-between">
              <div class="row g-5 align-center">
                 <div class="c-bg-secondary">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<circle cx="9.00098" cy="6" r="4" fill="CurrentColor"></circle>
<ellipse cx="9.00098" cy="17.001" rx="7" ry="4" fill="CurrentColor"></ellipse>
<path d="M20.9996 17.0007C20.9996 18.6576 18.9641 20.0007 16.4788 20.0007C17.211 19.2003 17.7145 18.1958 17.7145 17.0021C17.7145 15.807 17.2098 14.8015 16.4762 14.0007C18.9615 14.0007 20.9996 15.3438 20.9996 17.0007Z" fill="CurrentColor"></path>
<path d="M17.9996 6.00098C17.9996 7.65783 16.6565 9.00098 14.9996 9.00098C14.6383 9.00098 14.292 8.93711 13.9712 8.82006C14.4443 7.98796 14.7145 7.02547 14.7145 5.99986C14.7145 4.97501 14.4447 4.01318 13.9722 3.18151C14.2927 3.0647 14.6387 3.00098 14.9996 3.00098C16.6565 3.00098 17.9996 4.34412 17.9996 6.00098Z" fill="CurrentColor"></path>
</svg>

                 </div>
                <strong class="desc c-bg-secondary">Direct Affiliate</strong>
              </div>
                <div class="toggle active"><div onclick="
               if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                this.closest('.house').querySelector('input.inp').classList.remove('input');
                 this.closest('.house').querySelector('input.inp').classList.remove('required');
                  this.closest('.house').querySelector('.cont').classList.add('display-none');
               }else{
                this.closest('.toggle').classList.add('active');
              this.closest('.house').querySelector('input.inp').classList.add('input');
                 this.closest('.house').querySelector('input.inp').classList.add('required');
                  this.closest('.house').querySelector('.cont').classList.remove('display-none');
               }
                " class="child"></div></div>
            </div>

            <span class="text-dim">Bonus earned from direct referrals</span>
            
           <div class="w-full cont br-10 bg-white h-50 border-1 border-color-silver">
            <input placeholder="E.g 2500" type="number" step="any" name="subordinate" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           </div>
           <div class="w-full house g-5 bg-secondary-light p-10 border-1 br-10 border-color-bg-secondary column">
            <div class="row w-full align-center space-between">
              <div class="row g-5 align-center">
                 <div class="c-bg-secondary"><svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5 7.5C15.5 9.433 13.933 11 12 11C10.067 11 8.5 9.433 8.5 7.5C8.5 5.567 10.067 4 12 4C13.933 4 15.5 5.567 15.5 7.5Z" fill="CurrentColor"></path>
<path d="M18 16.5C18 18.433 15.3137 20 12 20C8.68629 20 6 18.433 6 16.5C6 14.567 8.68629 13 12 13C15.3137 13 18 14.567 18 16.5Z" fill="CurrentColor"></path>
<path d="M7.12205 5C7.29951 5 7.47276 5.01741 7.64005 5.05056C7.23249 5.77446 7 6.61008 7 7.5C7 8.36825 7.22131 9.18482 7.61059 9.89636C7.45245 9.92583 7.28912 9.94126 7.12205 9.94126C5.70763 9.94126 4.56102 8.83512 4.56102 7.47063C4.56102 6.10614 5.70763 5 7.12205 5Z" fill="CurrentColor"></path>
<path d="M5.44734 18.986C4.87942 18.3071 4.5 17.474 4.5 16.5C4.5 15.5558 4.85657 14.744 5.39578 14.0767C3.4911 14.2245 2 15.2662 2 16.5294C2 17.8044 3.5173 18.8538 5.44734 18.986Z" fill="CurrentColor"></path>
<path d="M16.9999 7.5C16.9999 8.36825 16.7786 9.18482 16.3893 9.89636C16.5475 9.92583 16.7108 9.94126 16.8779 9.94126C18.2923 9.94126 19.4389 8.83512 19.4389 7.47063C19.4389 6.10614 18.2923 5 16.8779 5C16.7004 5 16.5272 5.01741 16.3599 5.05056C16.7674 5.77446 16.9999 6.61008 16.9999 7.5Z" fill="CurrentColor"></path>
<path d="M18.5526 18.986C20.4826 18.8538 21.9999 17.8044 21.9999 16.5294C21.9999 15.2662 20.5088 14.2245 18.6041 14.0767C19.1433 14.744 19.4999 15.5558 19.4999 16.5C19.4999 17.474 19.1205 18.3071 18.5526 18.986Z" fill="CurrentColor"></path>
</svg>
</div>
                <strong class="desc c-bg-secondary">First Indirect</strong>
              </div>
                <div class="toggle active"><div onclick="
               if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                this.closest('.house').querySelector('input.inp').classList.remove('input');
                 this.closest('.house').querySelector('input.inp').classList.remove('required');
                  this.closest('.house').querySelector('.cont').classList.add('display-none');
               }else{
                this.closest('.toggle').classList.add('active');
              this.closest('.house').querySelector('input.inp').classList.add('input');
                 this.closest('.house').querySelector('input.inp').classList.add('required');
                  this.closest('.house').querySelector('.cont').classList.remove('display-none');
               }
                " class="child"></div></div>
            </div>
            <span class="text-dim">Bonus earned from first indirect referrals</span>
            
           <div class="w-full cont br-10 bg-white h-50 border-1 border-color-silver">
            <input placeholder="E.g 1500" type="number" step="any" name="first_indirect" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           </div>
            <div class="w-full house g-5 bg-secondary-light p-10 border-1 br-10 border-color-bg-secondary column">
            <div class="row w-full align-center space-between">
              <div class="row g-5 align-center">
              <div class="c-bg-secondary">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,40H40A16,16,0,0,0,24,56V184a16,16,0,0,0,16,16h60.43l13.68,23.94a16,16,0,0,0,27.78,0L155.57,200H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM84,132a12,12,0,1,1,12-12A12,12,0,0,1,84,132Zm44,0a12,12,0,1,1,12-12A12,12,0,0,1,128,132Zm44,0a12,12,0,1,1,12-12A12,12,0,0,1,172,132Z"></path></svg>
              </div>
                <strong class="desc c-bg-secondary">Neo Chat</strong>
              </div>
                <div class="toggle active"><div onclick="
               if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                this.closest('.house').querySelector('input.inp').classList.remove('input');
                 this.closest('.house').querySelector('input.inp').classList.remove('required');
                  this.closest('.house').querySelector('.cont').classList.add('display-none');
               }else{
                this.closest('.toggle').classList.add('active');
              this.closest('.house').querySelector('input.inp').classList.add('input');
                 this.closest('.house').querySelector('input.inp').classList.add('required');
                  this.closest('.house').querySelector('.cont').classList.remove('display-none');
               }
                " class="child"></div></div>
            </div>
            <span class="text-dim">Neo Chat Earning amount in Naira</span>
            
           <div class="w-full cont br-10 bg-white h-50 border-1 border-color-silver">
            <input placeholder="E.g &#8358;5000" type="number" step="any" name="neo_chat" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           </div>
           <div class="w-full house g-5 bg-secondary-light p-10 border-1 br-10 border-color-bg-secondary column">
            <div class="row w-full align-center space-between">
              <div class="row g-5 align-center">
              <div class="c-bg-secondary">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M212.92,17.71a7.89,7.89,0,0,0-6.86-1.46l-128,32A8,8,0,0,0,72,56V166.1A36,36,0,1,0,88,196V102.25l112-28V134.1A36,36,0,1,0,216,164V24A8,8,0,0,0,212.92,17.71Z"></path></svg>


              </div>
                <strong class="desc c-bg-secondary">Music Streaming</strong>
              </div>
                <div class="toggle active"><div onclick="
               if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                this.closest('.house').querySelector('input.inp').classList.remove('input');
                 this.closest('.house').querySelector('input.inp').classList.remove('required');
                  this.closest('.house').querySelector('.cont').classList.add('display-none');
               }else{
                this.closest('.toggle').classList.add('active');
              this.closest('.house').querySelector('input.inp').classList.add('input');
                 this.closest('.house').querySelector('input.inp').classList.add('required');
                  this.closest('.house').querySelector('.cont').classList.remove('display-none');
               }
                " class="child"></div></div>
            </div>
            <span class="text-dim">Music Streaming earning amount</span>
            
           <div class="w-full cont br-10 bg-white h-50 border-1 border-color-silver">
            <input placeholder="E.g 5,000" type="number" step="any" name="music_streaming" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           </div>
           <div class="w-full house g-5 bg-secondary-light p-10 border-1 br-10 border-color-bg-secondary column">
            <div class="row w-full align-center space-between">
              <div class="row g-5 align-center">
            <div class="c-bg-secondary">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 7.28595 22 4.92893 20.5355 3.46447C19.0711 2 16.714 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447ZM12.3975 14.0385L14.859 16.4999C15.1138 16.7548 15.2413 16.8822 15.3834 16.9411C15.573 17.0196 15.7859 17.0196 15.9755 16.9411C16.1176 16.8822 16.2451 16.7548 16.4999 16.4999C16.7548 16.2451 16.8822 16.1176 16.9411 15.9755C17.0196 15.7859 17.0196 15.573 16.9411 15.3834C16.8822 15.2413 16.7548 15.1138 16.4999 14.859L14.0385 12.3975L14.7902 11.6459C15.5597 10.8764 15.9444 10.4916 15.8536 10.0781C15.7628 9.66451 15.2522 9.47641 14.231 9.10019L10.8253 7.84544C8.78816 7.09492 7.7696 6.71966 7.24463 7.24463C6.71966 7.7696 7.09492 8.78816 7.84544 10.8253L9.10019 14.231C9.47641 15.2522 9.66452 15.7628 10.0781 15.8536C10.4916 15.9444 10.8764 15.5597 11.6459 14.7902L12.3975 14.0385Z" fill="CurrentColor"></path>
</svg>

            </div>
                <strong class="desc c-bg-secondary">Social Task</strong>
              </div>
                <div class="toggle active"><div onclick="
               if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                this.closest('.house').querySelector('input.inp').classList.remove('input');
                 this.closest('.house').querySelector('input.inp').classList.remove('required');
                  this.closest('.house').querySelector('.cont').classList.add('display-none');
               }else{
                this.closest('.toggle').classList.add('active');
              this.closest('.house').querySelector('input.inp').classList.add('input');
                 this.closest('.house').querySelector('input.inp').classList.add('required');
                  this.closest('.house').querySelector('.cont').classList.remove('display-none');
               }
                " class="child"></div></div>
            </div>
            <span class="text-dim">Earning per task performed</span>
            
           <div class="w-full cont br-10 bg-white h-50 border-1 border-color-silver">
            <input placeholder="E.g 200" type="number" step="any" name="earning_per_click" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           </div>
           <div class="w-full house g-5 bg-secondary-light p-10 border-1 br-10 border-color-bg-secondary column">
            <div class="row w-full align-center space-between">
              <div class="row g-5 align-center">
           <div class="c-bg-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M160,129.89,175.06,160H144.94l6.36-12.7v0ZM224,48V208a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM207.16,188.42l-40-80a8,8,0,0,0-14.32,0L139.66,134.8a62.31,62.31,0,0,1-23.61-10A79.61,79.61,0,0,0,135.6,80H152a8,8,0,0,0,0-16H112V56a8,8,0,0,0-16,0v8H56a8,8,0,0,0,0,16h63.48a63.73,63.73,0,0,1-15.3,34.05,65.93,65.93,0,0,1-9-13.61,8,8,0,0,0-14.32,7.12,81.75,81.75,0,0,0,11.4,17.15A63.62,63.62,0,0,1,56,136a8,8,0,0,0,0,16,79.56,79.56,0,0,0,48.11-16.13,78.33,78.33,0,0,0,28.18,13.66l-19.45,38.89a8,8,0,0,0,14.32,7.16L136.94,176h46.12l9.78,19.58a8,8,0,1,0,14.32-7.16Z"></path></svg>
            </div>
                <strong class="desc c-bg-secondary">Neo Translate</strong>
              </div>
                <div class="toggle active"><div onclick="
               if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                this.closest('.house').querySelector('input.inp').classList.remove('input');
                 this.closest('.house').querySelector('input.inp').classList.remove('required');
                  this.closest('.house').querySelector('.cont').classList.add('display-none');
               }else{
                this.closest('.toggle').classList.add('active');
              this.closest('.house').querySelector('input.inp').classList.add('input');
                 this.closest('.house').querySelector('input.inp').classList.add('required');
                  this.closest('.house').querySelector('.cont').classList.remove('display-none');
               }
                " class="child"></div></div>
            </div>
            <span class="text-dim">Neo Translate earning amount</span>
            
           <div class="w-full cont br-10 bg-white h-50 border-1 border-color-silver">
            <input placeholder="E.g 1,000" type="number" step="any" name="neo_translate" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           </div>
            {{-- <div class="w-full house g-5 bg-secondary-light p-10 border-1 br-10 border-color-bg-secondary column">
            <div class="row w-full align-center space-between">
              <div class="row g-5 align-center">
            <div class="c-bg-secondary">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6669 6.13443L10.165 5.77922C9.44862 5.27225 8.59264 5 7.71504 5H7.10257C6.69838 5 6.29009 5.02549 5.90915 5.16059C3.52645 6.00566 1.88749 9.09504 2.00604 16.1026C2.02992 17.5145 2.3603 19.075 3.63423 19.6842C4.03121 19.8741 4.49667 20 5.02671 20C5.66273 20 6.1678 19.8187 6.55763 19.5632C6.96641 19.2953 7.32633 18.9471 7.68612 18.599C8.13071 18.1688 8.57511 17.7389 9.11125 17.4609C9.69519 17.1581 10.3434 17 11.0011 17H12.9989C13.6566 17 14.3048 17.1581 14.8888 17.4609C15.4249 17.7389 15.8693 18.1688 16.3139 18.599C16.6737 18.9471 17.0336 19.2953 17.4424 19.5632C17.8322 19.8187 18.3373 20 18.9733 20C19.5033 20 19.9688 19.8741 20.3658 19.6842C21.6397 19.075 21.9701 17.5145 21.994 16.1026C22.1125 9.09503 20.4735 6.00566 18.0908 5.16059C17.7099 5.02549 17.3016 5 16.8974 5H16.2849C15.4074 5 14.5514 5.27225 13.8351 5.77922L13.3332 6.13441C12.9434 6.41029 12.4776 6.55844 12 6.55844C11.5225 6.55844 11.0567 6.41029 10.6669 6.13443ZM16.75 9C17.1642 9 17.5 9.33579 17.5 9.75C17.5 10.1642 17.1642 10.5 16.75 10.5C16.3358 10.5 16 10.1642 16 9.75C16 9.33579 16.3358 9 16.75 9ZM7.5 9.25C7.91421 9.25 8.25 9.58579 8.25 10V10.75H9C9.41421 10.75 9.75 11.0858 9.75 11.5C9.75 11.9142 9.41421 12.25 9 12.25H8.25V13C8.25 13.4142 7.91421 13.75 7.5 13.75C7.08579 13.75 6.75 13.4142 6.75 13V12.25H6C5.58579 12.25 5.25 11.9142 5.25 11.5C5.25 11.0858 5.58579 10.75 6 10.75H6.75V10C6.75 9.58579 7.08579 9.25 7.5 9.25ZM19 11.25C19 11.6642 18.6642 12 18.25 12C17.8358 12 17.5 11.6642 17.5 11.25C17.5 10.8358 17.8358 10.5 18.25 10.5C18.6642 10.5 19 10.8358 19 11.25ZM15.25 12C15.6642 12 16 11.6642 16 11.25C16 10.8358 15.6642 10.5 15.25 10.5C14.8358 10.5 14.5 10.8358 14.5 11.25C14.5 11.6642 14.8358 12 15.25 12ZM17.5 12.75C17.5 12.3358 17.1642 12 16.75 12C16.3358 12 16 12.3358 16 12.75C16 13.1642 16.3358 13.5 16.75 13.5C17.1642 13.5 17.5 13.1642 17.5 12.75Z" fill="CurrentColor"></path>
</svg>

              </div>
                  <strong class="desc c-bg-secondary">Casino Game</strong>
              </div>
                <div class="toggle active"><div onclick="
               if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                this.closest('.house').querySelector('input.inp').classList.remove('input');
                 this.closest('.house').querySelector('input.inp').classList.remove('required');
                  this.closest('.house').querySelector('.cont').classList.add('display-none');
               }else{
                this.closest('.toggle').classList.add('active');
              this.closest('.house').querySelector('input.inp').classList.add('input');
                 this.closest('.house').querySelector('input.inp').classList.add('required');
                  this.closest('.house').querySelector('.cont').classList.remove('display-none');
               }
                " class="child"></div></div>
            </div>
            <span class="text-dim">Casino game earning amount</span>
            
           <div class="w-full cont br-10 bg-white h-50 border-1 border-color-silver">
            <input placeholder="E.g 5000" type="number" step="any" name="casino_game" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           </div> --}}
            {{-- <div class="w-full house g-5 bg-secondary-light p-10 border-1 br-10 border-color-bg-secondary column">
            <div class="row w-full align-center space-between">
              <div class="row g-5 align-center">
          <div class="c-bg-secondary">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M17.976 2.60214C18.4394 2.34255 18.742 2.17429 18.9825 2.07837C19.209 1.98805 19.3082 1.99265 19.3758 2.0102C19.4425 2.02754 19.5291 2.07058 19.6774 2.25703C19.8356 2.45593 20.0105 2.74753 20.2782 3.19747L21.3821 5.0525C21.6499 5.50257 21.8227 5.7951 21.921 6.02715C22.0133 6.24515 22.0063 6.33514 21.9904 6.39301C21.9741 6.45176 21.9326 6.53473 21.7385 6.68003C21.5329 6.83397 21.2316 7.004 20.7681 7.26366L16.8361 9.46618C16.3975 9.71185 16.1138 9.86953 15.889 9.95899C15.6784 10.0428 15.5925 10.0358 15.5381 10.0214C15.4837 10.007 15.4058 9.97072 15.2658 9.7942C15.1165 9.60582 14.9506 9.32925 14.6952 8.90007L13.5162 6.91881C13.2539 6.47796 13.0851 6.19212 12.989 5.96551C12.8987 5.7528 12.9059 5.66639 12.9206 5.61202C12.9354 5.55766 12.9729 5.47928 13.1589 5.33961C13.3569 5.1908 13.6479 5.02654 14.0984 4.77419L17.976 2.60214Z" fill="CurrentColor"></path>
<path d="M8.63783 8.4508L12.0871 6.51869C12.2139 6.78176 12.3907 7.07891 12.5908 7.41514L13.805 9.45545C13.9882 9.76334 14.1517 10.0381 14.3093 10.2627L12.7624 11.1292L16.9384 20.9182C17.1076 21.3148 16.919 21.7717 16.5172 21.9387C16.1153 22.1057 15.6524 21.9196 15.4832 21.523L12.0003 13.3585L8.51732 21.523C8.34812 21.9196 7.88519 22.1057 7.48335 21.9387C7.0815 21.7717 6.8929 21.3148 7.0621 20.9182L10.7594 12.2512C10.357 12.4764 10.0901 12.6231 9.87652 12.7081C9.66592 12.7919 9.57999 12.7849 9.52562 12.7705C9.47124 12.7561 9.39327 12.7198 9.25334 12.5433C9.104 12.3549 8.93814 12.0783 8.68275 11.6492L8.05569 10.5954C7.79336 10.1546 7.62457 9.86873 7.5284 9.64212C7.43814 9.42941 7.4453 9.343 7.46005 9.28863C7.47481 9.23427 7.51238 9.15589 7.6983 9.01622C7.89638 8.86741 8.18734 8.70315 8.63783 8.4508Z" fill="CurrentColor"></path>
<path d="M6.62684 10.196L3.23194 12.0976C2.76839 12.3573 2.46708 12.5273 2.26148 12.6813C2.06741 12.8266 2.02586 12.9095 2.00964 12.9683C1.99365 13.0262 1.98667 13.1162 2.07902 13.3342C2.17732 13.5662 2.35007 13.8587 2.6179 14.3088C2.88564 14.7587 3.06048 15.0503 3.21868 15.2492C3.36698 15.4357 3.45364 15.4787 3.52035 15.4961C3.58788 15.5136 3.68707 15.5182 3.91358 15.4279C4.15411 15.332 4.45672 15.1637 4.92014 14.9041L8.29723 13.0124C8.13943 12.7877 7.97589 12.5128 7.79249 12.2046L7.1303 11.0918C6.93035 10.7558 6.75363 10.4589 6.62684 10.196Z" fill="CurrentColor"></path>
</svg>

            </div>   
               <strong class="desc c-bg-secondary">Daily Adverts</strong>
              </div>
                <div class="toggle active"><div onclick="
               if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                this.closest('.house').querySelector('input.inp').classList.remove('input');
                 this.closest('.house').querySelector('input.inp').classList.remove('required');
                  this.closest('.house').querySelector('.cont').classList.add('display-none');
               }else{
                this.closest('.toggle').classList.add('active');
              this.closest('.house').querySelector('input.inp').classList.add('input');
                 this.closest('.house').querySelector('input.inp').classList.add('required');
                  this.closest('.house').querySelector('.cont').classList.remove('display-none');
               }
                " class="child"></div></div>
            </div>
            <span class="text-dim">Daily Adverts Earning amount</span>
            
           <div class="w-full cont br-10 bg-white h-50 border-1 border-color-silver">
            <input placeholder="E.g 400" type="number" step="any" name="daily_advert" class="inp required input h-full w-full no-border bg-transparent br-10 border-color-transparent">
           </div>
           </div> --}}
           <button class="post bg-secondary secondary-text m-top-20 w-full"><span>Add Package</span></button>

        </form>
    </section>
@endsection
@section('js')
    <script class="js">
      window.MyFunc = {
        Added : function(response){
          let data=JSON.parse(response);
          if(data.status == 'success'){
            window.location.href=data.url;
          }
        }
      }
    </script>
@endsection