@extends('layout.users.app')
@section('title')
    Read Article
@endsection

@section('css')
    <style class="css">
        .vote-svg.voted{
            fill:var(--primary);
        }
         span.clicked svg{
             animation:scale-out-in 0.5s ease forwards;
        }
        @keyframes scale-out-in{
            0%,100%{
                transform:scale(1);
            }
             50%{
                transform:scale(1.5);
            }
        }
    </style>
@endsection
@section('main')
   <section class="w-full p-10 g-10 grid pc-grid-2">
  
       
            <div style="backdrop-filter: blur(50px)" class="w-full column br-10hh border-1 border-color-primary p-10 g-10">
                <strong style="font-family:luckiest guy" class="desc font-weight-400 c-gold">{{ $data->topic->topic }}</strong>
                
                <hr class="bg-gold">
                <img src="{{ asset('banners/IMG-20251004-WA0022.jpg') }}" alt="" class="w-full m-x-auto br-10 max-w-500">
                <div class="w-full">
                  
                    {!! nl2br($data->article) !!}
                    <span class="text-average row align-center g-2 m-left-autot w-fit">
                       <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"></path></svg>

                        By {{ $data->user->username }}</span>
                </div>
                <div class="row w-full g-10 align-center space-between">
                    <div class="row no-select border-1 border-color-primary p-x-10 bg-primary-transparent br-10h p-5 align-center g-5">
                        <span class="svg-{{ $data->id }} vote-svg {{ $data->voted > 0 ? 'c-red' : '' }}" onclick="
                   let el=this;
                            if(this.classList.contains('voted')){
                      this.classList.remove('voted');
                      this.classList.add('clicked');
                      
                      setTimeout(function(){
                     el.classList.remove('clicked');
                      },1000)
                     }else{
                      this.classList.add('voted');
                       this.classList.add('clicked');
                        setTimeout(function(){
                      el.classList.remove('clicked');
                      },1000)
                     }
                        GetRequest(event,'{{ url('users/get/vote/article?id='.$data->id.'') }}',document.createElement('div'),MyFunc.Voted)
                        ">
     <svg  width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M2 9.13734C2 14.0003 6.01943 16.5917 8.96173 18.9111C10 19.7296 11 20.5002 12 20.5002C13 20.5002 14 19.7296 15.0383 18.9111C17.9806 16.5917 22 14.0003 22 9.13734C22 4.27441 16.4998 0.825708 12 5.50088C7.50016 0.825708 2 4.27441 2 9.13734Z" fill="CurrentColor"></path>
</svg>
                        </span>
                       
    <span class="votes-{{ $data->id }} bold">{{ number_format($data->votes) }}</span>
                        <span>Vote(s)</span>
                    </div>
                  
                </div>
            </div>
    
   </section>
@endsection
@section('js')
    <script class="js">
       
        window.MyFunc ={
            Voted : function(response){
               let data=JSON.parse(response);
               if(data.status == 'success'){
                document.querySelector(data.class).innerHTML=data.message;
                  if(data.type == 'unvoted'){
                    document.querySelector(data.svg_class).classList.remove('c-red');
                }else{
                    document.querySelector(data.svg_class).classList.add('c-red');
                }
               }
            }
        }
    </script>
@endsection