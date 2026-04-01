@extends('layout.users.app')
@section('title')
    Transaction History
@endsection
@section('css')
    <style class="css">
        .svg svg{
            fill:var(--primary);
           
        }
        
        svg.rotated{
            transform: rotate(180deg)
        }
    </style>
@endsection
@section('main')
    <section class="w-full align-center p-20 column g-10">
        @if ($transactions->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Transactions Found'
            ])
        @else
       <div class="column g-10  w-full">
         <strong class="desc">Transaction History</strong>
       
       </div>
          <div class="w-full g-5 column  br-10 box-shadow">
              @foreach ($transactions as $data)
              {{-- TRANSACTIONS CARD --}}
               <div onclick="spa(event,'{{ url('users/transaction/receipt?id='.$data->id.'') }}')" class="w-full main-border main-border-bg p-20 br-10 row align-center g-10 space-between">
                 {{-- TRANSACTION TYPE INDICATOR --}}
                <div class="h-50 {{ $data->class == 'credit' ? 'c-green' : 'c-red' }} w-50 column svg justify-center circle clip-circle no-shrink main-border main-border-bg">
                        @if ($data->class == 'credit')
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.25C12.4142 3.25 12.75 3.58579 12.75 4L12.75 18.1893L17.4697 13.4697C17.7626 13.1768 18.2374 13.1768 18.5303 13.4697C18.8232 13.7626 18.8232 14.2374 18.5303 14.5303L12.5303 20.5303C12.3897 20.671 12.1989 20.75 12 20.75C11.8011 20.75 11.6103 20.671 11.4697 20.5303L5.46967 14.5303C5.17678 14.2374 5.17678 13.7626 5.46967 13.4697C5.76256 13.1768 6.23744 13.1768 6.53033 13.4697L11.25 18.1893L11.25 4C11.25 3.58579 11.5858 3.25 12 3.25Z" fill="CurrentColor"></path>
</svg>

                        @else
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.4697 3.46967C11.7626 3.17678 12.2374 3.17678 12.5303 3.46967L18.5303 9.46967C18.8232 9.76256 18.8232 10.2374 18.5303 10.5303C18.2374 10.8232 17.7626 10.8232 17.4697 10.5303L12.75 5.81066L12.75 20C12.75 20.4142 12.4142 20.75 12 20.75C11.5858 20.75 11.25 20.4142 11.25 20L11.25 5.81066L6.53033 10.5303C6.23744 10.8232 5.76256 10.8232 5.46967 10.5303C5.17678 10.2374 5.17678 9.76256 5.46967 9.46967L11.4697 3.46967Z" fill="CurrentColor"></path>
</svg>

                        @endif

                    </div>
                    {{-- TRANSACTION DATE --}}
               <div class="column g-2 m-right-auto">
                <strong class="font-1">{{ $data->type }}</strong>
                <span class="text-average text-dim">{{ $data->date }}</span>
               </div>
               {{-- TRANSACTION STATUS AND AMOUNT --}}
               <div class="column align-center g-2">
            
                  <strong class="font-1">{{ $data->class == 'credit' ? '+' : '-' }} {!! Currency(Auth::guard('users')->user()->id)  !!}{{ number_format($data->amount,2) }}</strong> 
             
                <div class="row status m-left-auto {{ $data->status == 'success' ? 'green' : ($data->status == 'rejected' ? 'red' : 'gold') }}">{{ $data->status }}</div>
               </div>
                </div>
            @endforeach
            @if ($transactions->currentPage() >= 1)
                @include('components.sections',[
                    'paginate' => true,
                    'data' => $transactions
                ])
            @endif
          </div>
        @endif
    </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
    </script>
@endsection