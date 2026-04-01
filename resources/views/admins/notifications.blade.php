@extends('layout.admins.app')
@section('title')
   Notifications
@endsection
@section('main')
       <section class="grid pc-grid-2 w-full g-10 p-10">
        @if ($notifications->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Notifications Found'
            ])
        @else

      @if ($total > 0)
             <button onclick="window.location.href='{{ url('admins/notification/mark/all/as/read') }}'" class="btn-green-3d grid-full m-left-auto clip-5 br-5 c-white">Mark All As Read</button>

      @endif
            @foreach ($notifications as $data)
                <div class="w-full br-10 bg-white box-shadow p-10 column g-10">
                    <div class="row g-10 align-center space-between">
                      <div class="h-50 circle w-50 bg-green column justify-center c-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M16,176a8,8,0,0,1,8-8h8V152a96.12,96.12,0,0,1,88-95.66V40H104a8,8,0,0,1,0-16h48a8,8,0,0,1,0,16H136V56.34A96.12,96.12,0,0,1,224,152v16h8a8,8,0,0,1,0,16H24A8,8,0,0,1,16,176Zm216,24H24a8,8,0,0,0,0,16H232a8,8,0,0,0,0-16Z"></path></svg>

                      </div>
                        <div class="column g-2 m-right-auto">
               
                   <div class="row text-average text-dim align-center g-2">
                   <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                   
                    {{ $data->frame }}
                </div>
            </div>
            <div class="status {{ $data->status == 'read' ? 'green' : 'gold' }}">{{ $data->status }}</div>
           
                    </div>
                    <hr>
                    <div class="w-full">
                        {!! $data->message !!}
                    </div>
                   @if ($data->status == 'unread')
                        <button onclick="window.location.href='{{ url('admins/notification/mark/as/read?id='.$data->id.'') }}'" class="btn-green-3d m-left-auto clip-5 br-5 c-white">Mark As Read</button>
                   @endif
                </div>
            @endforeach
            @if ($notifications->currentPage() >= 1)
                @include('components.sections',[
                    'paginate' => true,
                    'data' => $notifications,
                    'last' => $notifications->lastPage()
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