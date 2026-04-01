@extends('layout.admins.app')
@section('title')
    Streams
@endsection

@section('main')
    <section class="w-full column p-20 g-10">
        @if ($streams->isEmpty())
            @include('components.sections',[
                'null' => true
            ])
        @else
         <strong class="desc">Top Streamers</strong>
            <div class="grid w-full pc-grid-2 g-10">
                @foreach ($streams as $data)
           
                <div style="border:1px solid rgba(0,0,0,0.1)" class="w-full bg-light br-10 p-20 column g-10">
                 <div class="row space-between w-full g-10">
                      @if (str_contains($data->user->photo,'avatar'))
                     <div class="no-shrink desc h-70 w-70 primary-text no-select perfect-square p-10 br-10 column align-center justify-center bg-primary">
                {{ strtoupper(substr($data->user->username,0,2)) }}
            </div>
                @else
                    <img src="{{ asset('users/'.$data->user->photo.'') }}" alt="" class="h-70 w-70 br-10">
                @endif
                <div class="column m-right-auto">
                    <strong class="desc">{{ ucfirst($data->user->username) }}</strong>
                    <button onclick="window.location.href='{{ url('admins/user?id='.$data->user_id.'') }}'" class="btn-green-3d c-white">
                        View User
                    </button>
                </div>
                 <div style="border:1px solid rgba(0,0,0,0.1);background:rgba(0,0,0,0.05);font-weight:900" class="h-50 {{ $loop->iteration == 1 ? 'first' : '' }} iteration desc column align-center no-select justify-center w-50 no-shrink circle">{{ $loop->iteration }}</div>
                   
                 </div>
                 <hr>
                 <div>
                    <strong class="font-1">Total Songs Streamed : {{ $data->total }}</strong>
                 </div>
             

                </div>
            </div>
            @endforeach

             @if ($streams->currentPage() >= 1)
                        @include('components.sections',[
                            'paginate' => true,
                            'data' => $streams
                        ])
                    @endif
        @endif
    </section>
@endsection