@extends('layout.users.app')
@section('title')
    Photo Update
@endsection
@section('main')
     <section class="w-full g-10 p-10 column h-full flex-auto align-center">

        <div class=" w-full column g-10 max-w-500 br-10 p-10">
            <div class="row space-between br-10 align-center">

                <span class="desc bold">Update Profile Photo</span>
              
            </div>
            <div class="column g-5 w-full">
                
                <span>Updating your profile photo means your display photo would be updated across the entire platform.</span>
            </div>
            <form enctype="multipart/form-data" action="{{ url('users/post/update/profile/photo/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Updated)" class="w-full align-center  column g-10">
               <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <label style="border:2px dashed var(--primary)" class="w-fit label pointer p-20 no-select column justify-center text-center perfect-square clip-circle circle bg-light">
                    <div class="column text align-center g-5">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 15.75C12.4142 15.75 12.75 15.4142 12.75 15V4.02744L14.4306 5.98809C14.7001 6.30259 15.1736 6.33901 15.4881 6.06944C15.8026 5.79988 15.839 5.3264 15.5694 5.01191L12.5694 1.51191C12.427 1.34567 12.2189 1.25 12 1.25C11.7811 1.25 11.573 1.34567 11.4306 1.51191L8.43056 5.01191C8.16099 5.3264 8.19741 5.79988 8.51191 6.06944C8.8264 6.33901 9.29988 6.30259 9.56944 5.98809L11.25 4.02744L11.25 15C11.25 15.4142 11.5858 15.75 12 15.75Z" fill="CurrentColor"></path>
<path d="M16 9C15.2978 9 14.9467 9 14.6945 9.16851C14.5853 9.24148 14.4915 9.33525 14.4186 9.44446C14.25 9.69667 14.25 10.0478 14.25 10.75L14.25 15C14.25 16.2426 13.2427 17.25 12 17.25C10.7574 17.25 9.75004 16.2426 9.75004 15L9.75004 10.75C9.75004 10.0478 9.75004 9.69664 9.58149 9.4444C9.50854 9.33523 9.41481 9.2415 9.30564 9.16855C9.05341 9 8.70227 9 8 9C5.17157 9 3.75736 9 2.87868 9.87868C2 10.7574 2 12.1714 2 14.9998V15.9998C2 18.8282 2 20.2424 2.87868 21.1211C3.75736 21.9998 5.17157 21.9998 8 21.9998H16C18.8284 21.9998 20.2426 21.9998 21.1213 21.1211C22 20.2424 22 18.8282 22 15.9998V14.9998C22 12.1714 22 10.7574 21.1213 9.87868C20.2426 9 18.8284 9 16 9Z" fill="CurrentColor"></path>
</svg>
<span>Click to Upload</span>
<span>JPG,PNG or JPEG MAX 5MB</span>
                    </div>
                    <input onchange="
                    let file=this.files[0];
                    if(file){
                    this.closest('.label').querySelector('img').src=window.URL.createObjectURL(file);
                    this.closest('.label').querySelector('img').classList.remove('display-none');
                    this.closest('.label').querySelector('.text').classList.add('display-none');
                    

                    }else{
                     this.closest('.label').querySelector('img').src='';
                    this.closest('.label').querySelector('img').classList.add('display-none');
                    this.closest('.label').querySelector('.text').classList.remove('display-none');
                    
                    }
                    " type="file" name="photo" accept="image/*" required class="display-none input">
                     <img src="" alt="" class="w-full display-none h-full circle">
                </label>
               
               
             
                <button class="post br-0 clip-0 m-top-auto bold">Update Profile Photo</button>
            </form>
        </div>
      
    </section>
@endsection
@section('js')
    <script class="js">

        window.MyFunc = {
            Updated : function(response,event){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,data.url);
                }
            },
            Restyle : function(){
                document.querySelector('.label').style.maxWidth=document.querySelector('.label').getBoundingClientRect().width + 'px';
            }
        }
        MyFunc.Restyle();
    </script>
@endsection