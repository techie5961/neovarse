@extends('layout.admins.app')
@section('title')
    Add Coupon
@endsection
@section('main')
     <section class="w-full column p-10 g-10">
        <form action="{{ url('admins/post/create/coupon/process') }}"  method="POST" onsubmit="PostRequest(event,this,MyFunc.Added)" class="w-full bg-white br-10 box-shadow p-10 column g-5">
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="input">
            <div class="row w-full align-center g-5">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--bg-secondary)" viewBox="0 0 256 256"><path d="M243.31,136,144,36.69A15.86,15.86,0,0,0,132.69,32H40a8,8,0,0,0-8,8v92.69A15.86,15.86,0,0,0,36.69,144L136,243.31a16,16,0,0,0,22.63,0l84.68-84.68a16,16,0,0,0,0-22.63Zm-96,96L48,132.69V48h84.69L232,147.31ZM96,84A12,12,0,1,1,84,72,12,12,0,0,1,96,84Z"></path></svg>
                 <strong class="desc c-bg-secondary">Create New Coupon Code</strong>
            </div>
            <hr>
            <label for="">How many Codes</label>
             <div class="cont w-full h-50 border-1 border-color-silver bg-dim br-10">
                <input name="amount" value="1" placeholder="How many codes do you want to generate" type="number" class="inp no-border input w-full h-full br-10 bg-transparent required">
             </div>
            <label for="" class="m-top-5">Select Vendor</label>
            <div class="cont w-full h-50 border-1 border-color-silver bg-dim br-10">
               <select class="inp no-border input w-full h-full br-10 bg-transparent required" name="vendor_id" id="">
                <option value="" selected disabled>Choose Vendor</option>
                <option value="0">Non Vendor</option>
                @if (!$vendors->isEmpty())
                @foreach ($vendors as $data)
                    <option value="{{ $data->id }}">{{ $data->username ?? 'null' }}</option>
                @endforeach
                @endif
               </select>
            </div>
            <label for="" class="m-top-5">Select Package</label>
            <div class="cont w-full h-50 border-1 border-color-silver bg-dim br-10">
              <select name="package" id="" class="inp required no-border input w-full h-full br-10 bg-transparent">
                <option value="" selected disabled>Choose Package</option>
                @if (!$packages->isEmpty())
                    @foreach ($packages as $data)
                        <option value="{{ $data->id ?? '' }}">{{ $data->name ?? 'null' }} ({{ $data->country }})</option>
                    @endforeach
                @endif
              </select>
            </div>
            <button class="post bg-secondary secondary-text m-top-20 m-bottom-20 w-full"><span>Create Coupon</span></button>
               <div class="w-full g-5 br-10 bg-green-transparent p-10 row align-center">
                <svg class="min-w-20 min-h-20" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--green)" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>
                <span class="c-green font-libertinus-sans">Note that the coupon code is internally generated automatically on submission and is based on the vendor and package selected.</span>
               </div>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Added : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href=data.url;
                }
            }
        }
      
    </script>
@endsection