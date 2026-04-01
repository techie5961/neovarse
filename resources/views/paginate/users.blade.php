@isset($tasks)
      @foreach ($tasks as $data)
            <div class="column w-full no-select g-10 p-10 br-10 bg-secondary-dark box-shadow">
                <div class="row w-full align-center space-between">
                    <strong>{{ $data->title ?? 'null' }}</strong>
                    <div class="p-y-5 p-x-10 c-black bg-gold br-1000 bold">{!! Currency(Auth::guard('users')->user()->id)  !!}{{ number_format($reward ?? 0,2) }}</div>
                </div>
                <hr>
                <span class="text-average">Click the button below to perform the task,note that not performing task would lead to permanent banning of your account so be warned.</span>
            <div class="w-full br-1000 h-5 bg-green"></div>
           <div class="row w-full align-center space-between">
             <span class="row align-center g-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="CurrentColor" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"></path></svg>
                Posted by Admin
            </span>
            <span>{{ $data->completed }}/{{ $data->limit }}</span>

           </div>
           <div class="row space-between w-full align-center">
            <button onclick="
                window.open('{{ $data->link }}');
                document.querySelector('.claim-btn').classList.remove('display-none');
                " class="btn-blue br-5 clip-5"><span>Perform task</span></button>
              <button onclick="GetRequest(event,'{{ url('users/get/claim/task/reward?id='.$data->id.'') }}',this,MyFunc.Completed)" class="btn-green claim-btn display-none br-5 clip-5"><span>Claim Reward</span></button>
           </div>
            </div>
        @endforeach
        @if ($tasks->currentPage() >= 1)
            @include('components.sections',[
                'data' => $tasks ,
                'infinite_loading' => true
            ])
        @endif
@endisset
@isset($transactions)
     @foreach ($transactions as $data)
                <div onclick="spa(event,'{{ url('users/transaction/receipt?id='.$data->id.'') }}')" class="w-full main-border main-border-bg p-20 br-10 row align-center g-10 space-between">
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
               <div class="column g-2 m-right-auto">
                <strong class="font-1">{{ $data->type }}</strong>
                <span class="text-average text-dim">{{ $data->date }}</span>
               </div>
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
@endisset
@isset($articles)
      @foreach ($articles as $data)
            <div class="w-full column br-10 border-1 border-color-primary p-10 g-10">
                <strong class="desc c-gold">{{ $data->topic->topic }}</strong>
                
                <hr class="bg-gold">
                 <img src="{{ asset('banners/IMG-20251004-WA0022.jpg') }}" class="w-full" alt="">
              
                <div class="w-full">
                  
                    {!! strlen($data->article) > 200 ? nl2br(substr($data->article,0,200)).'....' : nl2br($data->article) !!}
                    <span class="text-average row align-center g-2 m-left-auto w-fit">
                         <svg width="10" height="10" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="CurrentColor"></path>
<path d="M16.807 19.0112C15.4398 19.9504 13.7841 20.5 12 20.5C10.2159 20.5 8.56023 19.9503 7.193 19.0111C6.58915 18.5963 6.33109 17.8062 6.68219 17.1632C7.41001 15.8302 8.90973 15 12 15C15.0903 15 16.59 15.8303 17.3178 17.1632C17.6689 17.8062 17.4108 18.5964 16.807 19.0112Z" fill="CurrentColor"></path>
<path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3432 6 9.00004 7.34315 9.00004 9C9.00004 10.6569 10.3432 12 12 12Z" fill="CurrentColor"></path>
</svg>
                        By {{ $data->user->username }}</span>
                </div>
                <div class="row w-full g-10 align-center space-between">
                     <div class="row no-select border-1 border-color-primary p-x-10 bg-primary-transparent br-10h p-5 align-center g-5">
                        <span class="svg-{{ $data->id }} vote-svg {{ $data->voted > 0 ? 'c-red' : '' }}" onclick="
                   let el=this;
                            if(this.classList.contains('voted')){
                      this.classList.remove('voted');
                      this.classList.add('clicked');
                      
                      setTimeout(function(){
                     el.classList.remove('clicked');
                      },1000)
                     }else{
                      this.classList.add('voted');
                       this.classList.add('clicked');
                        setTimeout(function(){
                      el.classList.remove('clicked');
                      },1000)
                     }
                        GetRequest(event,'{{ url('users/get/vote/article?id='.$data->id.'') }}',document.createElement('div'),MyFunc.Voted)
                        ">
     <svg  width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M2 9.13734C2 14.0003 6.01943 16.5917 8.96173 18.9111C10 19.7296 11 20.5002 12 20.5002C13 20.5002 14 19.7296 15.0383 18.9111C17.9806 16.5917 22 14.0003 22 9.13734C22 4.27441 16.4998 0.825708 12 5.50088C7.50016 0.825708 2 4.27441 2 9.13734Z" fill="CurrentColor"></path>
</svg>
                        </span>
                       
    <span class="votes-{{ $data->id }} bold">{{ number_format($data->votes) }}</span>
                        <span>Vote(s)</span>
                    </div>
                    @if (strlen($data->article) > 200)
                        <button onclick="spa(event,'{{ url('users/article/read/more?id='.$data->id.'') }}')" class="btn-primary-3d clip-5 br-5">Read More...</button>
                    @endif
                </div>
            </div>
        @endforeach
        @if ($articles->currentPage() >= 1)
            @include('components.sections',[
                'paginate' => true,
                'data' => $articles 
            ])
        @endif
@endisset
@isset($vendors_dashboard)
     @foreach ($coupons as $data)
   <div class="w-full main-border main-border-bg loop column g-10 br-10 p-20">
                     <div class="column g-10 w-full">
                          <div class="row g-10 align-center w-full space-between">
                         <strong class="desc">{{ $data->code }}</strong>
                        <div style="border-radius:5px;" onclick="copy('{{ $data->code }}')" class="w-fit p-5 main-border-bg main-border p-x-20 row align-center justify-center m-right-auto">
                           copy
                        </div>
                        @switch($data->status)
                            @case('active')
                                <div class="status gold">{{ $data->status }}</div>
                                @break
                            @case('redeemed')
                                  <div class="status green">{{ $data->status }}</div>
                                @break
                            @default
                             <div class="status green">{{ $data->status }}</div>
                                  
                        @endswitch

                       </div>
                     
                       <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                           
<span>Used By:</span>

                        </div>
                        <span class="bold">{{ $data->used_by }}</span>
                       </div>
                        <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                          

<span>Invited By:</span>

                        </div>
                        <span class="bold">{{ $data->ref }}</span>
                       </div>
                         <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                       



<span>Package:</span>

                        </div>
                        <span class="bold">{{ $data->package->name }}</span>
                       </div>
                        <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                       




<span>Package Cost:</span>

                        </div>
                        <span class="bold">&#8358;{{ number_format($data->package->cost,2) }}</span>
                       </div>
                         <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                         

<span>Created:</span>

                        </div>
                        <span class="bold">{{ $data->frame }}</span>
                       </div>
                     </div>
                    </div>
                    
                @endforeach
                @if ($coupons->currentPage() >= 1)
                   @include('components.sections',[
                    'paginate' => true,
                    'data' => $coupons 
                   ]) 
                @endif
@endisset