@extends('layout.admins.app')
@section('title')
  Airtime  Transactions
@endsection
@section('main')
     <section class="grid pc-grid-2 w-full g-10 p-10">
         <div class="w-full row space-between g-10 br-10 bg-white box-shadow grid-full p-10">
        <div class="h-50 br-10 column justify-center w-50 bg-green-transparent c-green">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="CurrentColor" viewBox="0 0 256 256"><path d="M88,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H96A8,8,0,0,1,88,64Zm128,56H96a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Zm0,64H96a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16ZM56,56H40a8,8,0,0,0,0,16H56a8,8,0,0,0,0-16Zm0,64H40a8,8,0,0,0,0,16H56a8,8,0,0,0,0-16Zm0,64H40a8,8,0,0,0,0,16H56a8,8,0,0,0,0-16Z"></path></svg>

        </div>
        <div class="column g-2 m-right-auto">
          <span>Total Airtime Transactions</span>
          <strong class="desc">{{ number_format($total) }}</strong>

        </div>
      </div>
        <div class="w-full row space-between g-10 br-10 bg-white box-shadow grid-full p-10">
        <div class="h-50 br-10 column justify-center w-50 bg-green-transparent c-green">
       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="CurrentColor" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>

        </div>
        <div class="column g-2 m-right-auto">
          <span>Today's Airtime Transactions</span>
          <strong class="desc">{{ number_format($today) }}</strong>

        </div>
      </div>
        <div class="w-full row space-between g-10 br-10 bg-white box-shadow grid-full p-10">
        <div class="h-50 br-10 column justify-center w-50 bg-green-transparent c-green">
         <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="CurrentColor" viewBox="0 0 256 256"><path d="M80,120h96a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8v48A8,8,0,0,0,80,120Zm8-48h80v32H88ZM200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM100,148a12,12,0,1,1-12-12A12,12,0,0,1,100,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,148Zm-80,40a12,12,0,1,1-12-12A12,12,0,0,1,100,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,188Z"></path></svg>

        </div>
        <div class="column g-2 m-right-auto">
          <span>Total Amount</span>
          <strong class="desc">&#8358;{{ number_format($sum,2) }}</strong>

        </div>
      </div>
       <div class="w-full row space-between g-10 br-10 bg-white box-shadow grid-full p-10">
        <div class="h-50 br-10 column justify-center w-50 bg-green-transparent c-green">
         <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="CurrentColor" viewBox="0 0 256 256"><path d="M69.12,94.15,28.5,128l40.62,33.85a8,8,0,1,1-10.24,12.29l-48-40a8,8,0,0,1,0-12.29l48-40a8,8,0,0,1,10.24,12.3Zm176,27.7-48-40a8,8,0,1,0-10.24,12.3L227.5,128l-40.62,33.85a8,8,0,1,0,10.24,12.29l48-40a8,8,0,0,0,0-12.29ZM162.73,32.48a8,8,0,0,0-10.25,4.79l-64,176a8,8,0,0,0,4.79,10.26A8.14,8.14,0,0,0,96,224a8,8,0,0,0,7.52-5.27l64-176A8,8,0,0,0,162.73,32.48Z"></path></svg>

        </div>
        <div class="column g-2 m-right-auto">
          <span>API Balance</span>
          <div class="row align-center g-5">
            <strong class="desc api_balance">&#8358;{{ number_format($api_balance->balance ?? 0,2) }}</strong>
          <button onclick="
          GetRequest(event,'{{ url('admins/get/api/balance') }}',this,MyFunc.Gotten)
          " class="btn-green-3d c-white clip-5 br-5">refresh</button>

          </div>

        </div>
      </div>
      @if ($transactions->isEmpty())
          @include('components.sections',[
            'null' => true,
            'text' => 'No Transactions Found'
          ])
      @else
      @foreach ($transactions as $data)
          <div class="w-full bg-white column  p-10 br-10 box-shadow">
            <div class="row w-full g-10 space-between">
                <img src="{{ asset('users/'.$data->user->photo.'') }}" alt="" class="h-50 w-50 clip-circle circle">
            <div class="column g-2 m-right-auto">
                <a href="{{ url('admins/user?id='.$data->user->id.'') }}" class="no-u bold font-1 c-green">{{ $data->user->username }}</a>
                <div class="row text-average text-dim align-center g-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-8,144H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>

                    {{ $data->user->email }}
                </div>
                   <div class="row text-average text-dim align-center g-2">
                   <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                    Submitted
                    {{ $data->frame }}
                </div>
            </div>
            <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'rejected' ? 'red' : 'gold') }}">{{ $data->status }}</div>
            </div>
            <hr>
            <div class="row m-top-10 w-full g-10 space-between">
                <div class="column g-2">
                    <div class="row m-right-auto align-center g-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="rgba(108,92,230)" viewBox="0 0 256 256"><path d="M239.76,158.06,217.28,68.12A16,16,0,0,0,201.75,56H136V40a16,16,0,0,0-16-16H80A16,16,0,0,0,64,40V56H54.25A16,16,0,0,0,38.72,68.12L16.24,158.06A7.93,7.93,0,0,0,16,160v32a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V160A7.93,7.93,0,0,0,239.76,158.06ZM80,40h40V56H80ZM54.25,72h147.5l20,80H34.25ZM32,192V168H224v24ZM64,96a8,8,0,0,1,8-8H88a8,8,0,0,1,0,16H72A8,8,0,0,1,64,96Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H120A8,8,0,0,1,112,96Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H168A8,8,0,0,1,160,96ZM64,128a8,8,0,0,1,8-8H88a8,8,0,0,1,0,16H72A8,8,0,0,1,64,128Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H120A8,8,0,0,1,112,128Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H168A8,8,0,0,1,160,128Z"></path></svg>

                        Transaction Type
                    </div>
                    <strong class="font-1 m-right-auto">{{ $data->type }}</strong>
                </div>
                 <div class="column g-2">
                    <div class="row m-left-auto align-center g-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="orangered  " viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V96H40V56ZM40,112H96v88H40Zm176,88H112V112H216v88Z"></path></svg>

                        Transaction Class
                    </div>
                    <strong class="font-1 m-left-auto">{{ $data->class }}</strong>
                </div>
            </div>
              <div class="row m-top-10 w-full g-10 space-between">
                <div class="column g-2">
                    <div class="row m-right-auto align-center g-2">
                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M176,16H80A24,24,0,0,0,56,40V216a24,24,0,0,0,24,24h96a24,24,0,0,0,24-24V40A24,24,0,0,0,176,16Zm8,200a8,8,0,0,1-8,8H80a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h96a8,8,0,0,1,8,8ZM140,60a12,12,0,1,1-12-12A12,12,0,0,1,140,60Z"></path></svg>

                        Mobile Number
                    </div>
                    <strong class="font-1 m-right-auto">{{ $data->json->body->number ?? 'null' }}</strong>
                </div>
                 <div class="column g-2">
                    <div class="row m-left-auto align-center g-2">
                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M135.16,84.42a8,8,0,0,0-14.32,0l-72,144a8,8,0,0,0,14.31,7.16L77,208h102.1l13.79,27.58A8,8,0,0,0,200,240a8,8,0,0,0,7.15-11.58ZM128,105.89,155.06,160H100.94ZM85,192l8-16h70.1l8,16Zm74.54-98.26a32,32,0,1,0-63,0,8,8,0,1,1-15.74,2.85,48,48,0,1,1,94.46,0,8,8,0,0,1-7.86,6.58,8.74,8.74,0,0,1-1.43-.13A8,8,0,0,1,159.49,93.74ZM64.15,136.21a80,80,0,1,1,127.7,0,8,8,0,0,1-12.76-9.65,64,64,0,1,0-102.18,0,8,8,0,0,1-12.76,9.65Z"></path></svg>

                        Network Provider
                    </div>
                    <strong class="font-1 m-left-auto">{{ $data->json->body->network ?? '' }}</strong>
                </div>
            </div>
              <div class="row m-top-10 w-full g-10 space-between">
                <div class="column g-2">
                    <div class="row m-right-auto align-center g-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M224,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Zm0,16V88H32V64Zm0,128H32V104H224v88Zm-16-24a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h32A8,8,0,0,1,208,168Zm-64,0a8,8,0,0,1-8,8H120a8,8,0,0,1,0-16h16A8,8,0,0,1,144,168Z"></path></svg>

                       Topup Amount
                    </div>
                    <strong class="font-1 m-right-auto">{!! Currency($data->user->id)  !!}{{ number_format($data->json->body->amount ?? 0,2) }}</strong>
                </div>
                 <div class="column g-2">
                    <div class="row m-left-auto align-center g-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M178.16,176H111.32A48,48,0,1,1,25.6,139.19a8,8,0,0,1,12.8,9.61A31.69,31.69,0,0,0,32,168a32,32,0,0,0,64,0,8,8,0,0,1,8-8h74.16a16,16,0,1,1,0,16ZM64,184a16,16,0,0,0,14.08-23.61l35.77-58.14a8,8,0,0,0-2.62-11,32,32,0,1,1,46.1-40.06A8,8,0,1,0,172,44.79a48,48,0,1,0-75.62,55.33L64.44,152c-.15,0-.29,0-.44,0a16,16,0,0,0,0,32Zm128-64a48.18,48.18,0,0,0-18,3.49L142.08,71.6A16,16,0,1,0,128,80l.44,0,35.78,58.15a8,8,0,0,0,11,2.61A32,32,0,1,1,192,200a8,8,0,0,0,0,16,48,48,0,0,0,0-96Z"></path></svg>

                        API Response
                    </div>
                    <strong class="font-1 m-left-auto">ORDER_RECEIVED</strong>
                </div>
            </div>
            @if (str_contains(strtolower($data->type),'withdrawal'))
                 <div class="row m-top-10 w-full g-10 space-between">
                <div class="column g-2">
                    <div class="row m-right-auto align-center g-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="blue" viewBox="0 0 256 256"><path d="M224,88H175.4l8.47-46.57a8,8,0,0,0-15.74-2.86l-9,49.43H111.4l8.47-46.57a8,8,0,0,0-15.74-2.86L95.14,88H48a8,8,0,0,0,0,16H92.23L83.5,152H32a8,8,0,0,0,0,16H80.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,80,224a8,8,0,0,0,7.86-6.57l9-49.43H144.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,144,224a8,8,0,0,0,7.86-6.57l9-49.43H208a8,8,0,0,0,0-16H163.77l8.73-48H224a8,8,0,0,0,0-16Zm-76.5,64H99.77l8.73-48h47.73Z"></path></svg>
                     
                        Account Number
                    </div>
                    <strong class="font-1 m-right-auto">{{ $data->json->data->bank->account_number }} <svg onclick="copy('{{ $data->json->data->bank->account_number }}')" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M216,32H88a8,8,0,0,0-8,8V80H40a8,8,0,0,0-8,8V216a8,8,0,0,0,8,8H168a8,8,0,0,0,8-8V176h40a8,8,0,0,0,8-8V40A8,8,0,0,0,216,32Zm-8,128H176V88a8,8,0,0,0-8-8H96V48H208Z"></path></svg>
                    </strong>
                </div>
                 <div class="column g-2">
                    <div class="row m-left-auto align-center g-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#4caf50" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>

                        Bank Name
                    </div>
                    <strong class="font-1 m-left-auto">{{ $data->json->data->bank->bank_name }}</strong>
                </div>
            </div>
              <div class="row m-top-10 w-full g-10 space-between">
                <div class="column g-2">
                    <div class="row m-right-auto align-center g-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="pink" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V192a16,16,0,0,0,16,16H56v16a8,8,0,0,0,16,0V208H184v16a8,8,0,0,0,16,0V208h16a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,152H40V56H216v64H199.32a48,48,0,1,0,0,16H216v56Zm-50.16-72a16,16,0,1,0,0,16H183a32,32,0,1,1,0-16Z"></path></svg>

                        Account Holder Name
                    </div>
                    <strong class="font-1 m-right-auto">{{ $data->json->data->bank->account_name }}</strong>
                </div>
                 <div class="column g-2">
                    <div class="row m-left-auto align-center g-2">
                     <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="orange" viewBox="0 0 256 256"><path d="M224,64H32A16,16,0,0,0,16,80v72a16,16,0,0,0,16,16H56v32a8,8,0,0,0,16,0V168H184v32a8,8,0,0,0,16,0V168h24a16,16,0,0,0,16-16V80A16,16,0,0,0,224,64Zm0,64.69L175.31,80H224ZM80.69,80l72,72H103.31L32,80.69V80ZM32,103.31,80.69,152H32ZM224,152H175.31l-72-72h49.38L224,151.32V152Z"></path></svg>

                      Gateway
                    </div>
                    <strong class="font-1 m-left-auto">Local Bank</strong>
                </div>
                
            </div>
            @endif
              @if (str_contains(strtolower($data->type),'deposit') && $data->gateway == 'manual')
                 <div class="row m-top-10 w-full g-10 space-between">
               
                 <div class="column g-2">
                    <div class="row m-right-auto align-center g-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#4caf50" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>

                        Bank Sent From
                    </div>
                    <strong class="font-1 m-right-auto">{{ $data->json->data->bank->bank_name }}</strong>
                </div>
                 <div class="column g-2">
                    <div class="row m-left-auto align-center g-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="pink" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V192a16,16,0,0,0,16,16H56v16a8,8,0,0,0,16,0V208H184v16a8,8,0,0,0,16,0V208h16a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,152H40V56H216v64H199.32a48,48,0,1,0,0,16H216v56Zm-50.16-72a16,16,0,1,0,0,16H183a32,32,0,1,1,0-16Z"></path></svg>

                        Name on Account
                    </div>
                    <strong class="font-1 m-left-auto">{{ $data->json->data->bank->account_name }}</strong>
                </div>
            </div>
            
            @endif
            <div class="row w-full m-top-10 align-center space-between">
              <strong class="desc m-left-auto c-green">{!! Currency($data->user->id) !!}{{ number_format($data->amount,2) }}</strong>
            </div>
           
           @if ($data->status == 'pending')
           
               <hr> 
               
               <div class="row w-full g-10 align-center space-between">
                <button onclick="
                @if(str_contains(strtolower($data->type),'deposit'))
                let data=`<div class='align-center column g-5 text-center'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='blue' viewBox='0 0 256 256'><path d='M208,40H48A16,16,0,0,0,32,56v56c0,52.72,25.52,84.67,46.93,102.19,23.06,18.86,46,25.26,47,25.53a8,8,0,0,0,4.2,0c1-.27,23.91-6.67,47-25.53C198.48,196.67,224,164.72,224,112V56A16,16,0,0,0,208,40Zm-34.32,69.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z'></path></svg>
                  <strong class='desc c-blue'>Security Check</strong>
                 <span> Are you sure you want to approve this deposit, <strong class='desc c-green'>{{ $data->user->username }}</strong> would be creditted the sum of <strong class='desc c-green'>{!! Currency($data->user->id) !!}{{ number_format($data->amount,2) }}</strong> into his/her deposit wallet</span></div>
                <button onclick=&quot;GetRequest(event,'{{ url('admins/get/transaction/approve?id='.$data->id.'') }}',this,MyFunc.Actioned)&quot; class='btn-green-3d c-white w-full clip-5 g-5 br-5'>Yes! i confirm to approve this deposit</button>
                `;
                PopUp(data);


                @else
                   let data=`<div class='align-center column g-5 text-center'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='blue' viewBox='0 0 256 256'><path d='M208,40H48A16,16,0,0,0,32,56v56c0,52.72,25.52,84.67,46.93,102.19,23.06,18.86,46,25.26,47,25.53a8,8,0,0,0,4.2,0c1-.27,23.91-6.67,47-25.53C198.48,196.67,224,164.72,224,112V56A16,16,0,0,0,208,40Zm-34.32,69.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z'></path></svg>
                  <strong class='desc c-blue'>Security Check</strong>
                 <span> Are you sure you want to approve this withdrawal, <strong class='desc c-green'>{{ $data->user->username }}</strong> would be notified that his/her withdrawal has been approved so it is advisable to send the funds before confirming else reject this withdrawal.</span></div>
                <button onclick=&quot;GetRequest(event,'{{ url('admins/get/transaction/approve?id='.$data->id.'') }}',this,MyFunc.Actioned)&quot; class='btn-green-3d c-white w-full clip-5 g-5 br-5'>Yes! i confirm to approve this withdrawal</button>
                `;
                PopUp(data);

                @endif
                " class="btn-green-3d c-white clip-5 g-5 br-5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="CurrentColor" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

                  Approve
                </button>
                 <button onclick="
                @if(str_contains(strtolower($data->type),'deposit'))
                let data=`<div class='align-center column g-5 text-center'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='blue' viewBox='0 0 256 256'><path d='M208,40H48A16,16,0,0,0,32,56v56c0,52.72,25.52,84.67,46.93,102.19,23.06,18.86,46,25.26,47,25.53a8,8,0,0,0,4.2,0c1-.27,23.91-6.67,47-25.53C198.48,196.67,224,164.72,224,112V56A16,16,0,0,0,208,40Zm-34.32,69.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z'></path></svg>
                  <strong class='desc c-blue'>Security Check</strong>
                 <span> Are you sure you want to reject this deposit, <strong class='desc c-green'>{{ $data->user->username }}</strong> would be notified that his/her deposit has been rejected.</span></div>
                <button onclick=&quot;GetRequest(event,'{{ url('admins/get/transaction/reject?id='.$data->id.'') }}',this,MyFunc.Actioned)&quot; class='btn-red-3d c-white w-full clip-5 g-5 br-5'>Yes! i confirm to reject this deposit</button>
                `;
                PopUp(data);


                @else
                   let data=`<div class='align-center column g-5 text-center'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='blue' viewBox='0 0 256 256'><path d='M208,40H48A16,16,0,0,0,32,56v56c0,52.72,25.52,84.67,46.93,102.19,23.06,18.86,46,25.26,47,25.53a8,8,0,0,0,4.2,0c1-.27,23.91-6.67,47-25.53C198.48,196.67,224,164.72,224,112V56A16,16,0,0,0,208,40Zm-34.32,69.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z'></path></svg>
                  <strong class='desc c-blue'>Security Check</strong>
                 <span> Are you sure you want to approve this withdrawal, <strong class='desc c-green'>{{ $data->user->username }}</strong> would be refunded back the sum of <strong class='desc c-green'>{!! Currency($data->user->id) !!}{{ number_format($data->amount,2) }}</strong> into his/her {{ ucfirst(str_replace('_balance','',$data->json->wallet)) }} Wallet.</span></div>
                <button onclick=&quot;GetRequest(event,'{{ url('admins/get/transaction/reject?id='.$data->id.'') }}',this,MyFunc.Actioned)&quot; class='btn-red-3d c-white w-full clip-5 g-5 br-5'>Yes! i confirm to reject this withdrawal</button>
                `;
                PopUp(data);

                @endif
                " class="btn-red-3d clip-5 g-5 br-5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="CurrentColor" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,130.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>

                  Reject
                </button>
               </div>
           @endif
          </div>
      @endforeach
          @if ($transactions->currentPage() >= 1)
              @include('components.sections',[
                'paginate' => true,
                'data' => $transactions,
                'last' => $transactions->lastPage()
              ])
          @endif
      @endif
     </section>
@endsection
@section('js')
    <script class="js">
      InfiniteLoading();
      window.MyFunc = {
        Actioned : function(response,event){
          let data=JSON.parse(response);
          CreateNotify(data.status,data.message);
          if(data.status == 'success'){
            window.location.reload();
          }
        },
        Gotten : function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                document.querySelector('.api_balance').innerHTML=`&#8358;${data.message}`;
            }else{
                CreateNotify(data.status,data.message);
            }
        }
      }
    </script>
@endsection