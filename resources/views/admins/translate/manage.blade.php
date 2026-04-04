@extends('layout.admins.app')
@section('title')
    Manage Translations
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
                   <span>Total Translations</span>
                <strong class="desc">{{ number_format($total) }}</strong>

              </div>
            </div>
           
        </div>
        
        {{-- skills --}}
     
        @if ($translate->isEmpty())
            @include('components.sections',[
                'null' => true
            ])
        @else
           <strong class="desc c-primary">All Skills</strong>
            <div class="grid pc-grid-2 g-5 place-center w-full">
                @foreach ($translate as $data)
                {{-- loop card --}}
                    <div style="border:1px solid var(--rgb-01)" class="w-full bg-light br-10 p-10">
                        <div class="row w-full g-10">
                           <img style="border:1px solid var(--rgb-005)" src="{{ asset('banners/3fe735f4-51a3-4741-aedb-b0d149c3ca88.jpeg') }}" alt="" class="h-70 perfect-square br-10 no-shrink">
                            <div class="column g-5">
                                <strong class="font-1">{{ $data->name ?? 'null' }}</strong>
                            <small class="opacity-07">Added {{ $data->frame }}</small>
                            </div>
                            <div class="status green m-left-auto">active</div>
                        </div>
                        <hr class="m-top-10" style="background:var(--rgb-01)">
                        <div>Primary Word : {!! nl2br($data->primary) !!}</div>
                         <div class="w-full">
                            Description : {!! nl2br($data->translation) !!}
                        </div>
                         <div>Language : {{ $data->language  }}</div>
                      
                         <hr class="m-top-10" style="background:var(--rgb-01)">
                        <div class="row align-center space-between w-full">
                            {{-- <button onclick="window.location.href='{{ url('admins/skills/edit?id='.$data->id.'') }}'" class="btn-blue">
                                Edit
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M204.37,51.6A108.08,108.08,0,1,0,236,128,108.09,108.09,0,0,0,204.37,51.6ZM92,200a12,12,0,1,1,24,0v11.11a83.78,83.78,0,0,1-24-7.22Zm48,0a12,12,0,1,1,24,0v3.89a83.78,83.78,0,0,1-24,7.22Zm-33.86-52h43.72l7.57,16.42A35.95,35.95,0,0,0,128,173.22a35.95,35.95,0,0,0-29.43-8.79Zm11.08-24L128,100.62,138.78,124ZM188,186.79V176a12.15,12.15,0,0,0-1.1-5l-48-104a12,12,0,0,0-21.8,0L69.1,171a12.15,12.15,0,0,0-1.1,5v10.77a84,84,0,1,1,120,0Z"></path></svg>

                            </button> --}}
                             <button onclick="MyFunc.Delete('{{ $data->name ?? 'null' }}','{{ $data->id }}')" class="btn-red">
                                Delete
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,48H180V36A28,28,0,0,0,152,8H104A28,28,0,0,0,76,36V48H40a12,12,0,0,0,0,24h4V208a20,20,0,0,0,20,20H192a20,20,0,0,0,20-20V72h4a12,12,0,0,0,0-24ZM100,36a4,4,0,0,1,4-4h48a4,4,0,0,1,4,4V48H100Zm88,168H68V72H188ZM116,104v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Zm48,0v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Z"></path></svg>

                            </button>
                            
                        </div>
                    </div>
                @endforeach
                
                    @if ($translate->currentPage() >= 1)
                        @include('components.sections',[
                            'paginate' => true,
                            'data' => $translate
                        ])
                    @endif
            </div>

        @endif
    </section>
    <template class="popup-template">
        <div class="w-full g-10 p-10 text-center column">
            <div class="desc c-red">⚠ Action Confirmation</div>
            <span class="font-1">Are you sure you want to delete this Translation( <span class="name">Programming</span> )? this action is irrevisible</span>
            <button onclick="window.location.href='{{ url('admins/translate/delete?id=') }}' + this.dataset.id" class="btn-red w-full">Yes! Delete this Translation</button>
        </div>
    </template>
@endsection
@section('js')
  <script class="js">
    InfiniteLoading();
      window.MyFunc = {
        Delete : function(name,id){
           
                   let template=document.querySelector('template.popup-template').innerHTML;
            let div=document.createElement('div');
            div.innerHTML=template;
            div.querySelector('.name').innerHTML=name;
            div.querySelector('div button').dataset.id=id;
            PopUp(div.innerHTML)
            
           
        
        },
        
    }
  </script>
@endsection