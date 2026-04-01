@extends('users.profile')
@section('page_title')
   Security
@endsection
@section('form')
    <section class="w-full g-10 p-20 column flex-auto align-center">

       
           
           
            <form action="{{ url('users/post/update/password/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Updated)" class="w-full p-20 br-20 main-border main-border-bg column g-10">
               <div style="color:var(--primary-light);margin-bottom:10px;" class="row br-10 g-5 align-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,40H48A16,16,0,0,0,32,56v56c0,52.72,25.52,84.67,46.93,102.19,23.06,18.86,46,25.27,47,25.53a8,8,0,0,0,4.2,0c1-.26,23.91-6.67,47-25.53C198.48,196.67,224,164.72,224,112V56A16,16,0,0,0,208,40ZM128,223.62a128.25,128.25,0,0,1-38.92-21.81C65.83,182.79,52.37,158,48.9,128H128V56h80v56a141.24,141.24,0,0,1-.9,16H128v95.62Z"></path></svg>

                </span>
                <span class="desc bold">Security Settings</span>
              
            </div> 
                <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
              <div class="w-full column g-5">
                  <label for="">Current Password</label>
               <div style="border:1px solid rgba(var(--rgt),0.1)" class="cont row align-center w-full h-50 bg">
                    <input placeholder="Enter current password" name="current_password" type="password" class="w-full inp input required account-number h-full no-border br-10 bg-transparent">
                </div>
              </div>
                <div class="column w-full g-5">
                      <label for="">New Password</label>
               <div style="border:1px solid rgba(var(--rgt),0.1)" class="cont row align-center w-full h-50 bg">
                    <input placeholder="Enter current password" name="new_password" type="password" class="w-full inp input required account-number h-full no-border br-10 bg-transparent">
                </div>
                </div>
                 <div class="column w-full g-5">
                     <label for="">Confirm New Password</label>
              <div style="border:1px solid rgba(var(--rgt),0.1)" class="cont row align-center w-full h-50 bg">
                    <input placeholder="Enter current password" name="confirm_password" type="password" class="w-full inp input required account-number h-full no-border br-10 bg-transparent">
                </div>
                
                 </div>
               
             
                <button class="post br-0 clip-0 bold">Update Account Password</button>
            </form>
        
      
    </section>
    
@endsection
@section('page_js')
    <script class="js">
        window.MyFunc = {
            Updated : function(response,event){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,data.url);
                }
            }
        }
    </script>
@endsection