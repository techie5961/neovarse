@extends('layout.users.auth')
@section('title')
   Email Success
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
          <form style="border-radius:20px !important" action="{{ url('users/post/forgot/password/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Completed)" class="w-full max-w-500 align-center bg-transparent c-white column g-5">
            <div class="column w-full p-10 align-center g-5">
        
          <div style="background:rgba(255,255,255,0.1);color:var(--primary-light)" class="h-70 w-70 circle column align-center justify-center g-10">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z"></path></svg>

          </div>
          <strong class="desc">Password Reset Link Sent</strong>
          <span class="opacity-07">We sent a password reset to </span>
          <div style="border:1px solid var(--primary-01);background:var(--primary-005);color:var(--primary)" class="p-5 p-x-10 br-1000">{{ $email }}</div>
            <span class="opacity-07 text-center">Kindly check your <strong>spam/junk folder</strong> if you did not see the email</span>
           <div style="background:rgba(255,255,255,0.1);border-left:4px solid var(--primary)" class="p-10 w-full column g-5">
            <strong>What happend next?</strong>
            <small>Click the link in the email to create a new password. The link expires in 10 minutes for security reasons.</small>
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