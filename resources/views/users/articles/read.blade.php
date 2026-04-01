@extends('layout.users.app')
@section('title')
    Read Articles
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
     @if ($articles->isEmpty())
        @include('components.sections',[
            'null' => true,
            'text' => 'No Article available at the moment,please check back later'
        ])
    @else
        @foreach ($articles as $data)
            <div style="backdrop-filter: blur(50px)" class="w-full column br-10h border-1 border-color-primary p-10 g-10">
                <strong style="font-family:luckiest guy;font-weight:400" class="desc c-gold">{{ $data->topic->topic }}</strong>
                
                <hr class="bg-gold">
                <img src="{{ asset('banners/IMG-20251004-WA0022.jpg') }}" class="w-full" alt="">
                <div class="w-full">
                  
                    {!! strlen($data->article) > 200 ? nl2br(substr($data->article,0,200)).'....' : nl2br($data->article) !!}
                    <span class="text-average row align-center g-2 m-left-auto w-fit">
                       <svg width="10" height="10" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="CurrentColor"></path>
<path d="M16.807 19.0112C15.4398 19.9504 13.7841 20.5 12 20.5C10.2159 20.5 8.56023 19.9503 7.193 19.0111C6.58915 18.5963 6.33109 17.8062 6.68219 17.1632C7.41001 15.8302 8.90973 15 12 15C15.0903 15 16.59 15.8303 17.3178 17.1632C17.6689 17.8062 17.4108 18.5964 16.807 19.0112Z" fill="CurrentColor"></path>
<path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3432 6 9.00004 7.34315 9.00004 9C9.00004 10.6569 10.3432 12 12 12Z" fill="CurrentColor"></path>
</svg>

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
                    @if (strlen($data->article) > 200)
                        <button onclick="spa(event,'{{ url('users/article/read/more?id='.$data->id.'') }}')" class="btn-primary-3d clip-5 br-5">Read More...</button>
                    @endif
                </div>
            </div>
        @endforeach
        @if ($articles->currentPage() >= 1)
            @include('components.sections',[
                'paginate' => true,
                'data' => $articles 
            ])
        @endif
    @endif
   </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
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