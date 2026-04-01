@extends('layout.users.app')
@section('title')
    Upgrade Package
@endsection
@section('css')
    <style class="css">
       .cards.active{
        background:#4caf50 !important;
        color:white !important;
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
    <section class="w-full p-10 column align-center">
        <div class="w-full primary-text column align-center bg-primary max-w-500 br-10 p-10">
            <span>Current Package</span>
            <strong class="desc">{{ strtoupper(json_decode(Auth::guard('users')->user()->package)->name) }}</strong>
        </div>
          <div class="bg-secondary-dark w-full column g-10 mmax-w-500 br-10 p-10">
            <div class="row p-10 space-between br-10 border-1 border-color-dim align-center">

                <span class="desc bold">Upgrade Package</span>
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#4caf50" viewBox="0 0 256 256"><path d="M216,64H56a8,8,0,0,1,0-16H192a8,8,0,0,0,0-16H56A24,24,0,0,0,32,56V184a24,24,0,0,0,24,24H216a16,16,0,0,0,16-16V80A16,16,0,0,0,216,64Zm0,128H56a8,8,0,0,1-8-8V78.63A23.84,23.84,0,0,0,56,80H216Zm-48-60a12,12,0,1,1,12,12A12,12,0,0,1,168,132Z"></path></svg>

            </div>
          @if ($pkgs->isEmpty())
              <div style="border:0.1px dashed #4caf50" class="w-full c-green br-5 p-10 column bg-green-transparent">
                YOUR ACCOUNT IS CURRENTLY IN THE HIGHEST PACKAGE AVAILABLE,WAIT UNTIL A NEW PACKAGE IS OUT TO UPGRADE
              </div>
          @else
                <form action="{{ url('users/post/upgrade/package/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Upgraded)" class="w-full column g-10">
                <div class="column g-5 w-full">
               
                <span>Select a package you want to upgrade to.</span>
            </div>
                <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <div class="w-full p-10 grid grid-2 g-10 place-center">
                   @foreach ($pkgs as $data)
                        <div onclick="
                        document.querySelectorAll('.cards').forEach((card)=>{
                        card.classList.remove('active');
                        });
                        document.querySelector('input[name=package]').value='{{ $data->id }}';
                        this.classList.add('active');
                        document.querySelector('button.upgrade').classList.remove('disabled');
                        " style="transition:all 0.5s ease" class="w-full pointer cards align-center bg-dim br-5 p-10 column g-10">
                        <img src="{{ asset('packages/'.$data->banner.'') }}" alt="" class="w-half perfect-square no-shrink br-5">
                            <div class="row align-center g-2">
                                <strong>{{ $data->name }}</strong>
                                @if ($loop->last)
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M12.8324 21.8013C15.9583 21.1747 20 18.926 20 13.1112C20 7.8196 16.1267 4.29593 13.3415 2.67685C12.7235 2.31757 12 2.79006 12 3.50492V5.3334C12 6.77526 11.3938 9.40711 9.70932 10.5018C8.84932 11.0607 7.92052 10.2242 7.816 9.20388L7.73017 8.36604C7.6304 7.39203 6.63841 6.80075 5.85996 7.3946C4.46147 8.46144 3 10.3296 3 13.1112C3 20.2223 8.28889 22.0001 10.9333 22.0001C11.0871 22.0001 11.2488 21.9955 11.4171 21.9858C10.1113 21.8742 8 21.064 8 18.4442C8 16.3949 9.49507 15.0085 10.631 14.3346C10.9365 14.1533 11.2941 14.3887 11.2941 14.7439V15.3331C11.2941 15.784 11.4685 16.4889 11.8836 16.9714C12.3534 17.5174 13.0429 16.9454 13.0985 16.2273C13.1161 16.0008 13.3439 15.8564 13.5401 15.9711C14.1814 16.3459 15 17.1465 15 18.4442C15 20.4922 13.871 21.4343 12.8324 21.8013Z" fill="CurrentColor"></path>
</svg>
                                @endif

                            </div>
                            <span>(upgrade cost : &#8358;{{ number_format($data->cost,2) }})</span>
                    </div>
                   @endforeach
                   
                </div>
                {{-- PACKAGE SELECTED --}}
                <input type="hidden" name="package" class="input wallet">
                <label for="">Enter Coupon Code</label>
                <div class="cont row align-center w-full h-50 br-10 border-1 bg border-color-silver">
                  <input placeholder="E.g QWERTYUIOPDFGHJ" class="w-full inp input required account-number h-full no-border br-10 bg-transparent" name="coupon" type="text">
                </div>
                <span class="bold">Dont have a coupon code? <a href="{{ url('vendors') }}" class="c-green no-u">Purchase one</a></span>
              
                 
               
              
                <button class="post upgrade disabled">Upgrade Package</button>
            </form>
          @endif
          
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Upgraded : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,'{{ url('users/dashboard') }}')
                }
            }
        }
    </script>
@endsection