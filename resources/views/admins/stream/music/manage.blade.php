@extends('layout.admins.app')
@section('title')
    Manage Songs
@endsection
@section('css')
    <style class="css">
      
        .play-btn .pause{
            display:none !important;

        }
        .play-btn.active .play{
            display:none !important;
        }
        .play-btn.active .pause{
            display:flex !important;
        }
    </style>
@endsection
@section('main')
    <section class="w-full p-20 g-10 column">
        {{-- analytics --}}
        <div style="border:1px solid var(--rgb-01)" class="w-full bg-light br-20 column g-5 p-20">
            <div class="w-full row g-10">
                <div style="background:rgba(0,255,0,0.1);color:#4caf50;" class="c-green h-50 perfect-square column align-center justify-center br-10 no-shrink">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M100,36H56A20,20,0,0,0,36,56v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V56A20,20,0,0,0,100,36ZM96,96H60V60H96ZM200,36H156a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V56A20,20,0,0,0,200,36Zm-4,60H160V60h36Zm-96,40H56a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V156A20,20,0,0,0,100,136Zm-4,60H60V160H96Zm104-60H156a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V156A20,20,0,0,0,200,136Zm-4,60H160V160h36Z"></path></svg>

                </div>
              <div class="column g-5">
                   <span>Total Songs</span>
                <strong class="desc">{{ number_format($total) }}</strong>

              </div>
            </div>
           
        </div>
        
        {{-- skills --}}
     
        @if ($songs->isEmpty())
            @include('components.sections',[
                'null' => true
            ])
        @else
           <strong class="desc c-primary">All Songs</strong>
            <div class="grid pc-grid-2 g-5 place-center w-full">
                @foreach ($songs as $data)
                {{-- loop card --}}
                    <div style="border:1px solid var(--rgb-01)" class="w-full column pos-relative align-center overflow-hidden bg-light br-10 p-20">
                      <div style="filter:blur(100px);z-index:50;background-image:url('{{ asset('songs/photos/'.$data->photo.'') }}')" class="pos-absolute top-0 left-0 right-0 bottom-0">

                      </div>
                       <div style="z-index:100" class="column align-center g-10 w-full pos-relative">
                         <img src="{{ asset('songs/photos/'.$data->photo.'') }}" alt="" style="width:70%;" class="perfect-square br-10">
                       <div class="column align-center g-5">
                        <strong style="font-size:1.5rem">{{ $data->name }}</strong>
                       <strong class="desc opacity-07">{{ $data->artist }}</strong>
                       <span>( {{ $data->streams }} Stream{{ $data->streams > 1 ? 's' : '' }} )</span>
                       </div>
                       <div style="background: rgba(0,0,0,0.1)" class="h-5 w-full br-1000"></div>
                         <div class="row align-center justify-center g-10">
                            <div onclick="MyFunc.PlayAudio('{{ asset('songs/audios/'.$data->audio.'') }}',this)" class="h-70 play-btn pc-pointer perfect-square primary-text no-shrink circle bg-primary column align-center justify-center">
                                <svg class="play" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M240,128a15.74,15.74,0,0,1-7.6,13.51L88.32,229.65a16,16,0,0,1-16.2.3A15.86,15.86,0,0,1,64,216.13V39.87a15.86,15.86,0,0,1,8.12-13.82,16,16,0,0,1,16.2.3L232.4,114.49A15.74,15.74,0,0,1,240,128Z"></path></svg>
                                <svg class="pause" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M216,48V208a16,16,0,0,1-16,16H160a16,16,0,0,1-16-16V48a16,16,0,0,1,16-16h40A16,16,0,0,1,216,48ZM96,32H56A16,16,0,0,0,40,48V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V48A16,16,0,0,0,96,32Z"></path></svg>

                            </div>
                        </div>
                        <div onclick="MyFunc.Delete('{{ $data->name }}','{{ $data->id }}')" class="w-full no-select pc-pointer br-10 row align-center p-10 justify-center bg-red c-white">
                            Delete Song
                        </div>
                       </div>
                    </div>
                @endforeach
                
                    @if ($songs->currentPage() >= 1)
                        @include('components.sections',[
                            'paginate' => true,
                            'data' => $songs
                        ])
                    @endif
            </div>

        @endif
    </section>
    <template class="popup-template">
        <div class="w-full g-10 p-10 text-center column">
            <div class="desc c-red">⚠ Action Confirmation</div>
            <span class="font-1">Are you sure you want to delete this Song? this action is irrevisible</span>
            <button onclick="window.location.href='{{ url('admins/song/delete?id=') }}' + this.dataset.id" class="btn-red w-full">Yes! Delete this song</button>
        </div>
    </template>
@endsection
@section('js')
  <script class="js">
    InfiniteLoading();
    let currentaudio=null;
      window.MyFunc = {
        Delete : function(name,id){
           
                   let template=document.querySelector('template.popup-template').innerHTML;
            let div=document.createElement('div');
            div.innerHTML=template;
            // div.querySelector('.name').innerHTML=name;
            div.querySelector('div button').dataset.id=id;
            PopUp(div.innerHTML)
            
           
        
        },
        PlayAudio : async function(song,element){
        //    alert(currentaudio ?? 'nulls')
          try{
        //    if(currentaudio){
        //     currentaudio.pause();
        //     return;
        //    }
        document.querySelectorAll('.play-btn').forEach((data)=>{
            data.classList.remove('active');
        })
              let audio=new Audio(song);
          
              if(currentaudio && !currentaudio.paused){
               
            currentaudio.pause();
            element.classList.remove('active');
            return;
           }
           
            await audio.play();
           
             currentaudio=audio;
            element.classList.add('active');

            
          }catch(error){
           CreateNotify('error','Playback Error');
          }


        }
        
    }
  </script>
@endsection