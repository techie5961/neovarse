@extends('layout.users.auth')
@section('title')
    Forgot Password
@endsection
@section('css')
<style class="css">
    input{
        color:white !important;
    }
    input::placeholder{
        color:silver;
        opacity:0.5
    }

</style>
@endsection
@section('main')
     <section class="column w-full flex-auto justify-center">
        {{-- <form action="{{ url('users/post/login/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.call_back)" class="w-full border-1 border-color-silver max-w-500 align-center br-10 bg-white  column g-5"> --}}
          <form action="{{ url('users/post/forgot/password/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Completed)" class="w-full max-w-500 align-center bg-transparent c-white column g-5">
            <div class="column w-full p-10 align-center g-5">
             <img onclick="window.location.href='{{ url('/') }}'" src="{{ $logo }}" class="w-quarter pc-pointer" alt="">
            <span class="desc strong">Forgot Password</span>
            <span class="text-center opacity-06">Enter your your registered email address to reset account password</span>
       
          <div class="w-full column g-10">
             <input type="hidden" class="input" name="_token" value="{{ csrf_token() }}">
           
             {{-- NEW INPUT --}}
             <div class="w-full column g-5">
                <label for="" class="m-right-auto m-top-10">Email Address</label>
            <div style="border:0.1px solid var(--bg-lighter);" class="cont bg w-full h-50 br border-1 border-color-silver">
                <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" type="email" placeholder="Enter registered email" name="email" class="inp input required w-full h-full no-border bg-transparent br-10">
            </div>
             </div>
            
            
             
          </div>
          
            <button class="post h-50 clip-0 br-0 m-top-20 m-bottom-10 w-full bold"><span>Send Reset Link</span></button>
            <div class="no-select g-5 text-center opacity-06 row align-center">
               
               Remember Password? <a style="color:inherit;text-decoration:none;" href="{{ url('login') }}" class="text-indent-5"> Back to Login</a>
            </div>
           
           </div>
        </form>
    </section>
    
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Completed : (response)=>{
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('users/email/link/success') }}'
                }
            }
        }
    </script>
@endsection