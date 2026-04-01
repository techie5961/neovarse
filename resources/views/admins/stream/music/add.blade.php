@extends('layout.admins.app')
@section('title')
   Upload Song
@endsection
@section('main')
    <section class="w-full p-20 column g-10">
        <form enctype="multipart/form-data" method="POST" action="{{ url('admins/post/add/song/process') }}" onsubmit="PostRequest(event,this,MyFunc.added)" style="border:1px solid var(--rgb-02);background:white" class="w-full br-20 p-20 column g-10">
                {{-- header --}}
            
            <div class="row w-full c-primary align-center g-10">
               <span>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M215.38,14.54a12,12,0,0,0-10.29-2.18l-128,32A12,12,0,0,0,68,56V159.35A40,40,0,1,0,92,196V113.37l104-26v40A40,40,0,1,0,220,164V24A12,12,0,0,0,215.38,14.54ZM52,212a16,16,0,1,1,16-16A16,16,0,0,1,52,212ZM92,88.63V65.37l104-26V62.63ZM180,180a16,16,0,1,1,16-16A16,16,0,0,1,180,180Z"></path></svg>

               </span>
                <strong class="desc">Upload Song</strong>
            </div>
            <hr style="background:var(--rgb-02)">
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
           {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Cover Photo</label>
                <div class="w-full cont br-10 overflow-hidden h-50 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <input name="photo" type="file" accept="image/*" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent">
                </div>
            </div>
             {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Music Audio</label>
                <div class="w-full cont br-10 overflow-hidden h-50 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <input name="audio" type="file" accept="audio/*" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent">
                </div>
            </div>
            {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Song Name</label>
                <div class="w-full cont br-10 overflow-hidden h-50 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <input name="name" placeholder="E.g With You" type="text" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent">
                </div>
            </div>
              {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Artist</label>
                <div class="w-full cont br-10 overflow-hidden h-50 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <input name="artist" placeholder="E.g Davido" type="text" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent">
                </div>
            </div>
              
           
            <button class="post">Upload Audio Now</button>
           
        </form>
    </section>
@endsection
@section('js')
<script class="js">
    window.MyFunc = {
        added : function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href='{{ url('admins/music/stream/manage') }}';
            }
        }
    }
</script>
    
@endsection