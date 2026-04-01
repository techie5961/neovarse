@extends('layout.admins.app')
@section('title')
    Articles Topics
@endsection
@section('main')
    <section class="w-full p-10 grid pc-grid-2 g-10">
        <form action="{{ url('admins/post/add/article/topic/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Added)" class="grid-full row p-10 align-center g-5 bg-white br-10 box-shadow">
           <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="input">
            <div class="w-full h-50 cont border-1 border-color-silver br-10 bg-dim">
                <input placeholder="Enter new Article Topic" type="text" name="topic" class="inp required no-border input h-full w-full br-10 bg-transparent">
            </div>
            <button class="btn-green-3d c-white h-50 ws-nowrap clip-5 br-5">Add Title</button>
        </form>
        @if ($topics->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Topic found'
            ])
        @else
            @foreach ($topics as $data)
                <div class="w-full br-10 bg-white p-10 box-shadow column g-5">
                    <div class="row space-between align-center g-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#13d816" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM176,168H80a8,8,0,0,1,0-16h96a8,8,0,0,1,0,16Zm0-32H80a8,8,0,0,1,0-16h96a8,8,0,0,1,0,16Zm0-32H80a8,8,0,0,1,0-16h96a8,8,0,0,1,0,16Z"></path></svg>
                       <div class="column m-right-auto g-2">
                         <strong class="c-green m-right-auto font-1">{{ $data->topic }}</strong>
                          <span class="text-dim row align-center g-2 text-average">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>

                            Added {{ $data->frame }}</span>
                       </div>
                        <div class="status {{ $data->status == 'active' ? 'green' : 'gold' }}">{{ $data->status }}</div>
                    </div>
                    <hr>
                      <div class="row align-center g-5">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffd700" viewBox="0 0 256 256"><path d="M232,64H208V48a8,8,0,0,0-8-8H56a8,8,0,0,0-8,8V64H24A16,16,0,0,0,8,80V96a40,40,0,0,0,40,40h3.65A80.13,80.13,0,0,0,120,191.61V216H96a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16H136V191.58c31.94-3.23,58.44-25.64,68.08-55.58H208a40,40,0,0,0,40-40V80A16,16,0,0,0,232,64ZM48,120A24,24,0,0,1,24,96V80H48v32q0,4,.39,8ZM232,96a24,24,0,0,1-24,24h-.5a81.81,81.81,0,0,0,.5-8.9V80h24Z"></path></svg>
                       <span>Winner:</span>
                     @if (($data->winner_id ?? '') !== '')
                          <strong onclick="window.location.href='{{ url('admins/user?id='.$data->winner_id.'') }}'" class="c-green u font-1">{{ $data->winner_username }}</strong>
                     @else
                          <strong class="c-green font-1">---</strong>
                     @endif
                    </div>
                    <div class="row align-center g-10 space-between w-full">
                      <button onclick="window.location.href='{{ url('admins/article/writers?id='.$data->id.'') }}'" class="btn-green-3d clip-5 br-5 c-white">View Writers</button>
                        <button onclick="
                        let data=`
                       <svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='red' viewBox='0 0 256 256'><path d='M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z'></path></svg> 
                        <span class='text-center'>Are you sure you want to delete/remove this topic? This action cannot be undone.</span>
                    <button onclick='window.location.href=&quot;{{ url('admins/get/topic/delete?id='.$data->id.'') }}&quot;' class='btn-red-3d w-full clip-5 g-5 br-5'>Yes! Delete Topic</button>
                        `;
                        PopUp(data);
                        " class="btn-red-3d clip-5 br-5">Remove Topic</button>
                    </div>
                    
                </div>
            @endforeach
            @if ($topics->currentPage() >= 1)
                @include('components.sections',[
                    'paginate' => true,
                    'data' => $topics,
                    'last' => $topics->lastPage()
                ])
            @endif
        @endif
    </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
        window.MyFunc = {
            Added : function(response){
                if(JSON.parse(response).status == 'success'){
                    window.location.reload();
                }
            }
        }
    </script>
@endsection