@extends('layout.admins.app')
@section('title')
    Submiited Tasks
@endsection
@section('main')
     <section class="grid pc-grid-2 w-full g-10 p-10">
         <div class="w-full row space-between g-10 br-10 bg-white box-shadow grid-full p-10">
        <div class="h-50 br-10 column justify-center w-50 bg-green-transparent c-green">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="CurrentColor" viewBox="0 0 256 256"><path d="M88,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H96A8,8,0,0,1,88,64Zm128,56H96a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Zm0,64H96a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16ZM56,56H40a8,8,0,0,0,0,16H56a8,8,0,0,0,0-16Zm0,64H40a8,8,0,0,0,0,16H56a8,8,0,0,0,0-16Zm0,64H40a8,8,0,0,0,0,16H56a8,8,0,0,0,0-16Z"></path></svg>

        </div>
        <div class="column g-2 m-right-auto">
          <span>Total Submission</span>
          <strong class="desc">{{ number_format($total) }}</strong>

        </div>
      </div>
        <div class="w-full row space-between g-10 br-10 bg-white box-shadow grid-full p-10">
        <div class="h-50 br-10 column justify-center w-50 bg-green-transparent c-green">
       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="CurrentColor" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>

        </div>
        <div class="column g-2 m-right-auto">
          <span>Today's Submission</span>
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
      @if ($proofs->isEmpty())
          @include('components.sections',[
            'null' => true,
            'text' => 'No Tasks Submitted'
          ])
      @else
          @foreach ($proofs as $data)
              <div class="w-full box--shadow br-10 p-10 bg-white column g-10">
                <div class="row w-full g-10 space-between">
                <img src="{{ asset('users/'.$data->user->photo.'') }}" alt="" class="h-50 w-50 clip-circle circle">
            <div class="column g-2 m-right-auto">
                <a href="{{ url('admins/user?id='.$data->user->id.'') }}" class="no-u bold font-1 c-green">{{ $data->user->username }}</a>
               
                   <div class="row text-average text-dim align-center g-2">
                   <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="CurrentColor" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                    Submitted
                    {{ $data->frame }}
                </div>
            </div>
            <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'rejected' ? 'red' : 'gold') }}">{{ $data->status }}</div>
            </div>
            <hr>
            <div class="row g-5 align-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(108,92,230)" viewBox="0 0 256 256"><path d="M253.66,90.34l-40-40a8,8,0,0,0-11.32,0L168,84.69,133.66,50.34a8,8,0,0,0-11.32,0L88,84.69,53.66,50.34a8,8,0,0,0-11.32,0l-40,40a8,8,0,0,0,0,11.32l40,40a8,8,0,0,0,11.32,0L88,107.31,116.69,136,82.34,170.34a8,8,0,0,0,0,11.32l40,40a8,8,0,0,0,11.32,0l40-40a8,8,0,0,0,0-11.32L139.31,136,168,107.31l34.34,34.35a8,8,0,0,0,11.32,0l40-40A8,8,0,0,0,253.66,90.34ZM48,124.69,19.31,96,48,67.31,76.69,96Zm80,80L99.31,176,128,147.31,156.69,176Zm0-80L99.31,96,128,67.31,156.69,96Zm80,0L179.31,96,208,67.31,236.69,96Z"></path></svg>
                <span>Task ID:</span>
                <strong class="font-1 c-green">{{ $data->json->id }}</strong>
            </div>
            <div class="row g-5 align-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M184,32H72A16,16,0,0,0,56,48V224a8,8,0,0,0,12.24,6.78L128,193.43l59.77,37.35A8,8,0,0,0,200,224V48A16,16,0,0,0,184,32Zm0,16V161.57l-51.77-32.35a8,8,0,0,0-8.48,0L72,161.56V48ZM132.23,177.22a8,8,0,0,0-8.48,0L72,209.57V180.43l56-35,56,35v29.14Z"></path></svg>
                <span>Task Title:</span>
                <strong class="font-1 c-green">{{ $data->json->title }}</strong>
            </div>
            <div class="row g-5 align-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M240,88.23a54.43,54.43,0,0,1-16,37L189.25,160a54.27,54.27,0,0,1-38.63,16h-.05A54.63,54.63,0,0,1,96,119.84a8,8,0,0,1,16,.45A38.62,38.62,0,0,0,150.58,160h0a38.39,38.39,0,0,0,27.31-11.31l34.75-34.75a38.63,38.63,0,0,0-54.63-54.63l-11,11A8,8,0,0,1,135.7,59l11-11A54.65,54.65,0,0,1,224,48,54.86,54.86,0,0,1,240,88.23ZM109,185.66l-11,11A38.41,38.41,0,0,1,70.6,208h0a38.63,38.63,0,0,1-27.29-65.94L78,107.31A38.63,38.63,0,0,1,144,135.71a8,8,0,0,0,16,.45A54.86,54.86,0,0,0,144,96a54.65,54.65,0,0,0-77.27,0L32,130.75A54.62,54.62,0,0,0,70.56,224h0a54.28,54.28,0,0,0,38.64-16l11-11A8,8,0,0,0,109,185.66Z"></path></svg>
                <span>Task Link:</span>
                <strong class="font-1 c-green"><a target="_blank" href="{{ $data->json->link }}" class="c-inherit">Visit Link</a></strong>
            </div>
            <div class="row g-5 align-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M207.58,63.84C186.85,53.48,159.33,48,128,48S69.15,53.48,48.42,63.84,16,88.78,16,104v48c0,15.22,11.82,29.85,32.42,40.16S96.67,208,128,208s58.85-5.48,79.58-15.84S240,167.22,240,152V104C240,88.78,228.18,74.15,207.58,63.84ZM128,64c62.64,0,96,23.23,96,40s-33.36,40-96,40-96-23.23-96-40S65.36,64,128,64Zm-8,95.86v32c-19-.62-35-3.42-48-7.49V153.05A203.43,203.43,0,0,0,120,159.86Zm16,0a203.43,203.43,0,0,0,48-6.81v31.31c-13,4.07-29,6.87-48,7.49ZM32,152V133.53a82.88,82.88,0,0,0,16.42,10.63c2.43,1.21,5,2.35,7.58,3.43V178C40.17,170.16,32,160.29,32,152Zm168,26V147.59c2.61-1.08,5.15-2.22,7.58-3.43A82.88,82.88,0,0,0,224,133.53V152C224,160.29,215.83,170.16,200,178Z"></path></svg>
                 <span>Task Earning:</span>
                <strong class="font-1 c-green">{!! Currency($data->user->id)  !!}{{ number_format($data->json->reward,2) }}</strong>
            </div>

              </div>
          @endforeach
          @if ($proofs->currentPage() >= 1)
              @include('components.sections',[
                'paginate' => true,
                'data' => $proofs
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