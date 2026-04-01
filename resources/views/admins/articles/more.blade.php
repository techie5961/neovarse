@extends('layout.admins.app')
@section('title')
  Articles |  Read More
@endsection
@section('main')
    <section class="grid w-full g-10 p-10">
    
      
       <div class="w-full border-1 border-color-secondary br-5 p-10">
          <strong class="desc">{{ $data->topic->topic }}</strong>
        </div>
            <div class="w-full h-fit  box-shadow bg-secondary-transparent border-1 border-color-secondary br-10 p-10 column g-10">
                  <div class="row w-full g-10 space-between">
                <img src="{{ asset('users/'.$data->user->photo.'') }}" alt="" class="h-50 w-50 clip-circle circle">
            <div class="column g-2 m-right-auto">
                <a href="{{ url('admins/user?id='.$data->user->id.'') }}" class="no-u row align-center g-2 bold font-1 c-green">{{ $data->user->username }}
               @if ($data->winner == 'true')
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M248,80a28,28,0,1,0-51.12,15.77l-26.79,33L146,73.4a28,28,0,1,0-36.06,0L85.91,128.74l-26.79-33a28,28,0,1,0-26.6,12L47,194.63A16,16,0,0,0,62.78,208H193.22A16,16,0,0,0,209,194.63l14.47-86.85A28,28,0,0,0,248,80ZM128,40a12,12,0,1,1-12,12A12,12,0,0,1,128,40ZM24,80A12,12,0,1,1,36,92,12,12,0,0,1,24,80ZM220,92a12,12,0,1,1,12-12A12,12,0,0,1,220,92Z"></path></svg>

               @endif
                </a>
                <div class="row text-average text-dim align-center g-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-8,144H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>

                    {{ $data->user->email }}
                </div>
                   <div class="row text-average text-dim align-center g-2">
                   <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                    Written
                    {{ $data->frame }}
                </div>
            </div>
             </div>
            <hr class="bg-secondary h-1">
            <div class="w-full">
                {!! nl2br($data->article) !!}

            </div>
            <div class="w-full align-center row g-10 space-between">
             <div class="status bg-dim p-10 border-1 br-1000 row align-center g-2 font-1 bold no-select">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32Z"></path></svg>

                {{ number_format($data->votes) }} vote(s)
            </div>
          
              <button onclick="
                        let data=`
                       <svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='red' viewBox='0 0 256 256'><path d='M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z'></path></svg> 
                        <span class='text-center'>Are you sure you want to delete/remove this article from this writer? This action cannot be undone.</span>
                    <button onclick='window.location.href=&quot;{{ url('admins/get/article/delete?id='.$data->id.'') }}&quot;' class='btn-red-3d w-full clip-5 g-5 br-5'>Yes! Delete Article</button>
                        `;
                        PopUp(data);
                        " class="btn-red-3d m-left-auto clip-5 br-5">Delete Article</button>
            </div>
                </div>   
        
           
      
    </section>
@endsection