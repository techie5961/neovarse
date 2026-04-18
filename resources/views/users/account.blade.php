@extends('users.profile')
@section('page_title')
    Account
@endsection
@section('form')
     <section class="column p-20">
        <form action="{{ url('users/post/update/profile/process') }}" onsubmit="PostRequest(event,this,MyFunc.Updated)" method="POST" class="w-full column g-10 p-20 br-20 main-border main-border-bg">
       <div style="color:var(--primary-light);margin-bottom:10px;" class="row br-10 g-5 align-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M172,120a44,44,0,1,1-44-44A44.05,44.05,0,0,1,172,120Zm60,8A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88.09,88.09,0,0,0-91.47-87.93C77.43,41.89,39.87,81.12,40,128.25a87.65,87.65,0,0,0,22.24,58.16A79.71,79.71,0,0,1,84,165.1a4,4,0,0,1,4.83.32,59.83,59.83,0,0,0,78.28,0,4,4,0,0,1,4.83-.32,79.71,79.71,0,0,1,21.79,21.31A87.62,87.62,0,0,0,216,128Z"></path></svg>
                    
                </span>
                <span class="desc bold">Account Settings</span>
              
            </div>
        <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
        <div class="column g-5">
        <label for="">Full Name</label>
        <div style="border: 1px solid rgba(var(--rgt),0.1)" class="cont h-50 w-full br-10 bg">
            <input name="name" value="{{ Auth::guard('users')->user()->name }}" type="text" class="inp required input w-full h-full border-none br-10 bg-transparent">
        </div>
    </div> 
     <div class="column g-5">
        <label for="">Username</label>
        <div style="border: 1px solid rgba(var(--rgt),0.1)" class="cont h-50 w-full br-10 bg">
            <input name="username" readonly value="{{ Auth::guard('users')->user()->username }}" type="text" class="inp required input w-full h-full border-none br-10 bg-transparent">
        </div>
    </div> 
     <div class="column g-5">
        <label for="">Email</label>
        <div style="border: 1px solid rgba(var(--rgt),0.1)" class="cont h-50 w-full br-10 bg">
            <input name="email" readonly value="{{ Auth::guard('users')->user()->email }}" type="email" class="inp required input w-full h-full border-none br-10 bg-transparent">
        </div>
    </div> 
     <div class="column g-5">
        <label for="">Phone Number</label>
        <div style="border: 1px solid rgba(var(--rgt),0.1)" class="cont h-50 w-full br-10 bg">
            <input name="phone" value="{{ Auth::guard('users')->user()->phone }}" type="number" class="inp required input w-full h-full border-none br-10 bg-transparent">
        </div>
    </div> 
    <button class="post">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,32H83.31A15.86,15.86,0,0,0,72,36.69L36.69,72A15.86,15.86,0,0,0,32,83.31V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM128,184a32,32,0,1,1,32-32A32,32,0,0,1,128,184ZM172,80a4,4,0,0,1-4,4H88a4,4,0,0,1-4-4V48h88Z"></path></svg>
        <span>Save Changes</span>
        </button>
    </form>
    
     </section>
@endsection
@section('page_js')
    <script class="js">
        window.MyFunc = {
            Updated : function(response,event){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,"{{ url()->current().'?'.http_build_query(request()->query()) }}")
                }
            }
        }
    </script>
@endsection