@extends('layout.admins.app')
@section('title')
   Add Translate
@endsection
@section('main')
    <section class="w-full p-20 column g-10">
        <form method="POST" action="{{ url('admins/post/add/translation/process') }}" onsubmit="PostRequest(event,this,MyFunc.added)" style="border:1px solid var(--rgb-02);background:white" class="w-full br-20 p-20 column g-10">
                {{-- header --}}
            
            <div class="row w-full c-primary align-center g-10">
               <span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M250.73,210.63l-56-112a12,12,0,0,0-21.46,0l-20.52,41A84.2,84.2,0,0,1,114,126.22,107.48,107.48,0,0,0,139.33,68H160a12,12,0,0,0,0-24H108V32a12,12,0,0,0-24,0V44H32a12,12,0,0,0,0,24h83.13A83.69,83.69,0,0,1,96,110.35,84,84,0,0,1,83.6,91a12,12,0,1,0-21.81,10A107.55,107.55,0,0,0,78,126.24,83.54,83.54,0,0,1,32,140a12,12,0,0,0,0,24,107.47,107.47,0,0,0,64-21.07,108.4,108.4,0,0,0,45.39,19.44l-24.13,48.26a12,12,0,1,0,21.46,10.73L151.41,196h65.17l12.68,25.36a12,12,0,1,0,21.47-10.73ZM163.41,172,184,130.83,204.58,172Z"></path></svg>

               </span>
                <strong class="desc">Add Translate</strong>
            </div>
            <hr style="background:var(--rgb-02)">
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
         
           
            {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Primary Word/Sentence</label>
                <div class="w-full cont br-10 overflow-hidden h-150 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                   <textarea placeholder="Enter primary word/sentence..." name="primary" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent"></textarea>
                </div>
            </div>
             {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Translation</label>
                <div class="w-full cont br-10 overflow-hidden h-150 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                   <textarea placeholder="Enter translation..." name="translation" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent"></textarea>
                </div>
            </div>
              {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Translation Language</label>
                <div class="w-full cont br-10 overflow-hidden h-50 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <input name="language" placeholder="E.g French" type="text" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent">
                </div>
            </div>
              
           
            <button class="post">Add Translation Now</button>
           
        </form>
    </section>
@endsection
@section('js')
<script class="js">
    window.MyFunc = {
        added : function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href='{{ url('admins/translate/manage') }}';
            }
        }
    }
</script>
    
@endsection