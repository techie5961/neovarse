@extends('layout.admins.app')
@section('title')
    Edit Skill
@endsection
@section('main')
    <section class="w-full p-20 column g-10">
        <form method="POST" action="{{ url('admins/post/edit/skill/process') }}" onsubmit="PostRequest(event,this,MyFunc.added)" style="border:1px solid var(--rgb-02);background:white" class="w-full br-20 p-20 column g-10">
                {{-- header --}}
            
            <div class="row w-full c-primary align-center g-10">
               <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M249.8,85.49l-116-64a12,12,0,0,0-11.6,0l-116,64a12,12,0,0,0,0,21l21.8,12v47.76a19.89,19.89,0,0,0,5.09,13.32C46.63,194.7,77,220,128,220a136.88,136.88,0,0,0,40-5.75V240a12,12,0,0,0,24,0V204.12a119.53,119.53,0,0,0,30.91-24.51A19.89,19.89,0,0,0,228,166.29V118.53l21.8-12a12,12,0,0,0,0-21ZM128,45.71,219.16,96,186,114.3a1.88,1.88,0,0,1-.18-.12l-52-28.69a12,12,0,0,0-11.6,21l39,21.49L128,146.3,36.84,96ZM128,196c-40.42,0-64.65-19.07-76-31.27v-33l70.2,38.74a12,12,0,0,0,11.6,0L168,151.64v37.23A110.46,110.46,0,0,1,128,196Zm76-31.27a93.21,93.21,0,0,1-12,10.81V138.39l12-6.62Z"></path></svg>

               </span>
                <strong class="desc">Edit Skill</strong>
            </div>
            <hr style="background:var(--rgb-02)">
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
            {{-- skill id --}}
            <input type="hidden" name="id" value="{{ $data->id }}" class="inp input">
           {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Skill Photo</label>
                <div class="w-full cont br-10 overflow-hidden h-50 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <input name="photo" type="file" accept="image/*" class="w-full inp input h-full br-10 g-10 border-none bg-transparent">
                </div>
            </div>
            {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Skill Name</label>
                <div class="w-full cont br-10 overflow-hidden h-50 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <input value="{{ $data->name }}" name="name" placeholder="E.g Data Science" type="text" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent">
                </div>
            </div>
              {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Skill Category</label>
                <div class="w-full cont br-10 overflow-hidden h-50 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <input value="{{ $data->category }}" name="category" placeholder="E.g analytics" type="text" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent">
                </div>
            </div>
               {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Skill Learning community/group link</label>
                <div class="w-full cont br-10 overflow-hidden h-50 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <input value="{{ $data->community }}" name="community" placeholder="E.g https://wa.me/the-group-link" type="url" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent">
                </div>
            </div>
              {{--new input --}}
            <div class="column w-full g-5">
                <label for="">Brief Description</label>
                <div class="w-full cont br-10 overflow-hidden h-150 row align-center" style="border:1px solid var(--rgb-01);background:var(--rgb-005)">
                    <textarea name="description" placeholder="E.g Python, SQL, analytics. Turn data into decisions." type="text" class="w-full required inp input h-full br-10 g-10 border-none bg-transparent">{{ $data->description }}</textarea>

                </div>
            </div>
            <button class="post">Save Changes</button>
           
        </form>
    </section>
@endsection
@section('js')
<script class="js">
    window.MyFunc = {
        added : function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href='{{ url('admins/skills/manage') }}';
            }
        }
    }
</script>
    
@endsection