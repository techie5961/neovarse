@extends('layout.users.app')
@section('title')
    Write & Win
@endsection
@section('main')
      <section class="w-full g-10 p-10 column flex-auto align-center">

        <div class="bg-secondary-dark w-full column g-10 br-10 p-10">
            <div class="row p-10 space-between br-10 border-1 border-color-dim align-center">

                <span class="desc bold">Write & Win</span>
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#4caf50" viewBox="0 0 256 256"><path d="M222.33,123.89c-.06-.13-.12-.26-.19-.38L192,69.9V32a16,16,0,0,0-16-16H80A16,16,0,0,0,64,32V69.92L33.86,123.51c-.07.12-.13.25-.2.38a15.94,15.94,0,0,0,1.46,16.57l.11.14,86.44,112.28a8,8,0,0,0,12.67,0L220.77,140.6l.11-.14A15.92,15.92,0,0,0,222.33,123.89ZM176,32V64H80V32ZM128,144a12,12,0,1,1,12-12A12,12,0,0,1,128,144Zm8,80.5V158.83a28,28,0,1,0-16,0v65.66L48,131,76.69,80H179.32L208,131Z"></path></svg>

            </div>
            <div class="column g-5 w-full">
                <strong class="desc c-green">Note:</strong>
                <span>Use the form below to select a topic & publish an article,the publisher with the highest vote would win prizes automatically creditted into his/her activities wallet.</span>
            </div>
            <form action="{{ url('users/post/publish/article/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Published)" class="w-full column g-10">
               <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <label for="">Select Topic</label>
                 @if ($topics->isEmpty())
                 <div class="w-full bg-gold-transparent border-1 border-color-gold br-10 p-10">
                    No topic available to write on at the moment,please check back later once admin add a new topic
                 </div>
                 @else
               <div class="cont row align-center w-full h-50 br-10 border-1 bg border-color-silver">
                    <select name="topic" class="w-full inp input required account-number h-full no-border br-10 bg-transparent" id="">
                        <option value="" selected disabled>Click to choose topic</option>
                       
                            @foreach ($topics as $data)
                                <option value="{{ $data->id }}">{{ $data->topic }}</option>
                            @endforeach
                      
                    </select>
                </div>
                  @endif
                  <label for="">Article</label>
               <div class="cont h-200 row align-center w-full br-10 border-1 bg border-color-silver">
                   <textarea placeholder="Write your blog article here..." class="w-full font-primary p-10 inp input required account-number h-full no-border br-10 bg-transparent" name="article"></textarea>
                </div>
                  
                
               
             
                <button class="post {{ $topics->isEmpty() ? 'disabled' : '' }}">Publish Article</button>
            </form>
        </div>
      
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
           Published : function(response,event){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,data.url);
                }
            }
        }
    </script>
@endsection