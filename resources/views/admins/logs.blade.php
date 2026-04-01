@extends('layout.admins.app')
@section('title')
    Logs
@endsection
@section('main')
       <section class="grid pc-grid-2 w-full g-10 p-10">
        @if ($logs->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Logs Found'
            ])
        @else
            @foreach ($logs as $data)
                <div class="w-full br-10 bg-white box-shadow p-10 column g-10">
                    <div class="row g-10 space-between">
                        <img class="h-50 w-50 circle clip-circle" src="{{ asset('users/'.$data->user->photo ?? 'avatar.jpeg'.'') }}" alt="">
                        <div class="column g-2 m-right-auto">
                <a href="{{ url('admins/user?id='.$data->user->id.'') }}" class="no-u bold font-1 c-green">{{ $data->user->username }}</a>
                <div class="row text-average text-dim align-center g-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-8,144H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>

                    {{ $data->user->email }}
                </div>
                   <div class="row text-average text-dim align-center g-2">
                   <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                    Logged
                    {{ $data->frame }}
                </div>
            </div>
            <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'rejected' ? 'red' : 'gold') }}">{{ $data->status }}</div>
           
                    </div>
                    <hr>
                    <div class="row align-center g-5 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M232,112H136V88h8a16,16,0,0,0,16-16V40a16,16,0,0,0-16-16H112A16,16,0,0,0,96,40V72a16,16,0,0,0,16,16h8v24H24a8,8,0,0,0,0,16H56v32H48a16,16,0,0,0-16,16v32a16,16,0,0,0,16,16H80a16,16,0,0,0,16-16V176a16,16,0,0,0-16-16H72V128H184v32h-8a16,16,0,0,0-16,16v32a16,16,0,0,0,16,16h32a16,16,0,0,0,16-16V176a16,16,0,0,0-16-16h-8V128h32a8,8,0,0,0,0-16ZM112,40h32V72H112ZM80,208H48V176H80Zm128,0H176V176h32Z"></path></svg>

                        <span>IP Address:</span>
                        <strong class="desc c-green">{{ $data->ip }}</strong>
                    </div>
                </div>
            @endforeach
            @if ($logs->currentPage() >= 1)
                @include('components.sections',[
                    'paginate' => true,
                    'data' => $logs,
                    'last' => $logs->lastPage()
                ])
            @endif
        @endif
       </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
    </script>
@endsection