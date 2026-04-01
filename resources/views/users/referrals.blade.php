@extends('layout.users.app')
@section('title')
    Team
@endsection
@section('main')
    <section class="w-full grid pc-grid-2 g-5 p-20">
        @if ($team->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Referrals Found'
            ])
        @else
        <strong class="desc grid-full">My Team</strong>
            @foreach ($team as $data)
                <div class="w-full main-border main-border-bg br-10 p-20 column g-10">
                    <div class="row w-full g-10 space-between">
                          <div class="no-shrink h-40 w-40 primary-text no-select perfect-square p-10 br-10 column align-center justify-center bg-primary">
                {{ strtoupper(substr($data->name,0,2)) }}
            </div>
             <div class="column g-5 m-right-auto">
                            <strong class="font-1 bold no-select">{{ $data->name }}</strong>
                          
                               <span style="color:silver" class="row align-center">
                                   @if ($data->ref == Auth::guard('users')->user()->username)
                                    Level 1
                                    @else
                                    Indirect
                                @endif</span>
                               <span class="opacity-07">{{ $data->frame }}</span>
                                </div>
                                <div class="column g-5">
                                      <strong class="font-1">+ {!! Currency(Auth::guard('users')->user()->id)  !!}{{ number_format($data->commission,2) }}</strong>

                                     <div class="status green">Completed</div>
                                </div>
                              


                               
                    </div>
                  
                   
                  
                </div>
            @endforeach
        @endif
    </section>
@endsection