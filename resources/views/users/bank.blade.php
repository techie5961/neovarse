@extends('users.profile')
@section('page_title')
    Bank
@endsection

@section('form')
    <section class="w-full g-10 p-20 column flex-auto align-center">

        <div class="bg-inherit section-group w-full column g-10 br-10 p-10">
            <div style="color:var(--primary-light);margin-bottom:10px;" class="row br-10 g-5 align-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,96H48a20,20,0,0,0-20,20v84a20,20,0,0,0,20,20H208a20,20,0,0,0,20-20V116A20,20,0,0,0,208,96Zm-4,100H52V120H204ZM44,68A12,12,0,0,1,56,56H200a12,12,0,0,1,0,24H56A12,12,0,0,1,44,68ZM60,28A12,12,0,0,1,72,16H184a12,12,0,0,1,0,24H72A12,12,0,0,1,60,28Z"></path></svg>

                </span>
                <span class="desc bold">Bank Details</span>
              
            </div>
          
            <form action="{{ url('users/post/add/bank/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Added)" class="w-full column g-10">
               <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
              {{-- NEW INPUT --}}
               <div class="column w-full g-5">
                 <label for="">Account Number</label>
                <div style="border:0.1px solid var(--bg-lighter)" class="cont row align-center w-full h-50 bg-light">
                    <input placeholder="Enter 10 digits account number" name="account_number" type="number" class="w-full inp input required account-number h-full no-border br-10 bg-transparent">
                </div>
               </div>
                {{-- NEW INPUT --}}
               <div class="column w-full g-5">
                  <label for="">Account Bank</label>
                <div style="border:0.1px solid var(--bg-lighter)" class="cont row align-center space-between g-10 no-select w-full h-50 bg-light">
                    <select class="w-full inp input required account-number h-full no-border br-10 bg-transparent" name="bank_name">
                        <option value="" selected disabled>Select Bank....</option>
                          @foreach (Banks()->data as $data)
                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                          @endforeach
                    </select>
              
              
                </div>
               </div>
                 {{-- NEW INPUT --}}
               <div class="column w-full g-5">
                 <label for="">Account Name</label>
                <div style="border:0.1px solid var(--bg-lighter)" class="cont row align-center w-full h-50 bg-light">
                    <input placeholder="Enter account name" name="account_name" type="text" class="w-full inp input required account-number h-full no-border br-10 bg-transparent">
                </div>
               </div>
                
              
                <button class="post br-0 clip-0 bold">Update Bank Details</button>
            </form>
        </div>
     
    </section>
@endsection

@section('page_js')
    <script class="js">
        window.MyFunc = {
            Added : function(response,event){
                  let data=JSON.parse(response);
                if(data.status == 'success'){
                   spa(event,"{{ url('users/bank/add') }}");
                }
            },
            Verified : function(response){
               if(IsJSONABLE(response)){
                 let data=JSON.parse(response);
                document.querySelector('.verifying span').innerHTML=data.message;
                document.querySelector('.verifying').classList.add('resolved');
                document.querySelector('.verifying').classList.add(data.status);
                if(data.status == 'success'){
                    document.querySelector('input.account_name').value=data.message;
                    document.querySelector('button.post').classList.remove('disabled');

                }

               }else{
                CreateNotify('error',response);
               }
            }
          
        }
    </script>
@endsection