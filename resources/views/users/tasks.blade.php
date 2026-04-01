@extends('layout.users.app')
@section('title')
    Tasks
@endsection
@section('css')
    <style class="css">
        .task-card{
            width:100%;
            padding:20px;
            border-radius:20px;
            border:1px solid var(--primary-light);
            display: flex;
            flex-direction:column;
            gap:20px;
        }
        .task-icon{
            height:50px;
            width:50px;
            aspect-ratio:1;
            display:flex;
            align-items: center;
            justify-content: center;
            background:rgba(var(--rgt),0.1);
            flex-shrink: 0;
            border-radius:15px;
            color:var(--primary-light)
        }
        .task-reward{
            width:fit-content;
            padding:2px 10px;
            background:rgba(0,255,0,0.1);
            border:1px solid rgb(0,255,0);
            border-radius:1000px;
            color:rgb(0,255,0);
            display:flex;
            flex-direction: row;
            align-items: center;
            justify-content:center;
            gap:5px;

        }
    </style>
@endsection
@section('main')

    <section class="grid w-full pc-grid-2 g-10 p-20">
       
        @if ($tasks->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No task available at the moment,check back later'
            ])
        @else
       <div class="column grid-full m-bottom-20 g-2">
         <strong class="desc grid-full">Daily Tasks</strong>
        <span class="opacity-07">Complete tasks to earn rewards instantly.</span>
       </div>
            @foreach ($tasks as $data)
            {{-- TASK CARD --}}
            <div class="task-card">
                {{-- TASK NAME/ICON & DESCRIPTION --}}
                <div class="row w-full align-center space-between">
                   <div class="row g-10">
                    {{-- icon --}}
                    <div class="task-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M228.75,100.05c-3.52-3.67-7.15-7.46-8.34-10.33-1.06-2.56-1.14-7.83-1.21-12.47-.15-10-.34-22.44-9.18-31.27s-21.27-9-31.27-9.18c-4.64-.07-9.91-.15-12.47-1.21-2.87-1.19-6.66-4.82-10.33-8.34C148.87,20.46,140.05,12,128,12s-20.87,8.46-27.95,15.25c-3.67,3.52-7.46,7.15-10.33,8.34-2.56,1.06-7.83,1.14-12.47,1.21C67.25,37,54.81,37.14,46,46S37,67.25,36.8,77.25c-.07,4.64-.15,9.91-1.21,12.47-1.19,2.87-4.82,6.66-8.34,10.33C20.46,107.13,12,116,12,128S20.46,148.87,27.25,156c3.52,3.67,7.15,7.46,8.34,10.33,1.06,2.56,1.14,7.83,1.21,12.47.15,10,.34,22.44,9.18,31.27s21.27,9,31.27,9.18c4.64.07,9.91.15,12.47,1.21,2.87,1.19,6.66,4.82,10.33,8.34C107.13,235.54,116,244,128,244s20.87-8.46,27.95-15.25c3.67-3.52,7.46-7.15,10.33-8.34,2.56-1.06,7.83-1.14,12.47-1.21,10-.15,22.44-.34,31.27-9.18s9-21.27,9.18-31.27c.07-4.64.15-9.91,1.21-12.47,1.19-2.87,4.82-6.66,8.34-10.33C235.54,148.87,244,140.05,244,128S235.54,107.13,228.75,100.05Zm-17.32,39.29c-4.82,5-10.28,10.72-13.19,17.76-2.82,6.8-2.93,14.16-3,21.29-.08,5.36-.19,12.71-2.15,14.66s-9.3,2.07-14.66,2.15c-7.13.11-14.49.22-21.29,3-7,2.91-12.73,8.37-17.76,13.19C135.78,214.84,130.4,220,128,220s-7.78-5.16-11.34-8.57c-5-4.82-10.72-10.28-17.76-13.19-6.8-2.82-14.16-2.93-21.29-3-5.36-.08-12.71-.19-14.66-2.15s-2.07-9.3-2.15-14.66c-.11-7.13-.22-14.49-3-21.29-2.91-7-8.37-12.73-13.19-17.76C41.16,135.78,36,130.4,36,128s5.16-7.78,8.57-11.34c4.82-5,10.28-10.72,13.19-17.76,2.82-6.8,2.93-14.16,3-21.29C60.88,72.25,61,64.9,63,63s9.3-2.07,14.66-2.15c7.13-.11,14.49-.22,21.29-3,7-2.91,12.73-8.37,17.76-13.19C120.22,41.16,125.6,36,128,36s7.78,5.16,11.34,8.57c5,4.82,10.72,10.28,17.76,13.19,6.8,2.82,14.16,2.93,21.29,3,5.36.08,12.71.19,14.66,2.15s2.07,9.3,2.15,14.66c.11,7.13.22,14.49,3,21.29,2.91,7,8.37,12.73,13.19,17.76,3.41,3.56,8.57,8.94,8.57,11.34S214.84,135.78,211.43,139.34ZM176.49,95.51a12,12,0,0,1,0,17l-56,56a12,12,0,0,1-17,0l-24-24a12,12,0,1,1,17-17L112,143l47.51-47.52A12,12,0,0,1,176.49,95.51Z"></path></svg>
                  </div>
                  {{-- title and description --}}
                  <div class="column g-5">
                      <strong class="desc">{{ $data->title ?? 'null' }}</strong>
                      <span class="opacity-07">Click the button below to join the group and get rewarded</span>
                    {{-- task reward --}}
                      <div class="task-reward">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,72H180.92c.39-.33.79-.65,1.17-1A29.53,29.53,0,0,0,192,49.57,32.62,32.62,0,0,0,158.44,16,29.53,29.53,0,0,0,137,25.91a54.94,54.94,0,0,0-9,14.48,54.94,54.94,0,0,0-9-14.48A29.53,29.53,0,0,0,97.56,16,32.62,32.62,0,0,0,64,49.57,29.53,29.53,0,0,0,73.91,71c.38.33.78.65,1.17,1H40A16,16,0,0,0,24,88v32a16,16,0,0,0,16,16v64a16,16,0,0,0,16,16h60a4,4,0,0,0,4-4V120H40V88h80v32h16V88h80v32H136v92a4,4,0,0,0,4,4h60a16,16,0,0,0,16-16V136a16,16,0,0,0,16-16V88A16,16,0,0,0,216,72ZM84.51,59a13.69,13.69,0,0,1-4.5-10A16.62,16.62,0,0,1,96.59,32h.49a13.69,13.69,0,0,1,10,4.5c8.39,9.48,11.35,25.2,12.39,34.92C109.71,70.39,94,67.43,84.51,59Zm87,0c-9.49,8.4-25.24,11.36-35,12.4C137.7,60.89,141,45.5,149,36.51a13.69,13.69,0,0,1,10-4.5h.49A16.62,16.62,0,0,1,176,49.08,13.69,13.69,0,0,1,171.49,59Z"></path></svg>

                         <span>&#8358;{{ number_format($reward ?? 0,2) }}</span>
                        </div>

                    </div>

                   
                   </div>
                    
                </div>
               
         
           <div class="grid buttons g-10 place-center w-full align-center">
            <button onclick="
                window.open('{{ $data->link }}');
                this.closest('.buttons').querySelector('.claim-btn').classList.remove('display-none');
                " style="border-radius:2px;clip-path:inset(0 round 2px)" class="row justify-center align-center g-5 main-border bg-transparent c-text border-none font-primary h-50 br-10 clip-10 w-full">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,104a12,12,0,0,1-24,0V69l-59.51,59.51a12,12,0,0,1-17-17L187,52H152a12,12,0,0,1,0-24h64a12,12,0,0,1,12,12Zm-44,24a12,12,0,0,0-12,12v64H52V84h64a12,12,0,0,0,0-24H48A20,20,0,0,0,28,80V208a20,20,0,0,0,20,20H176a20,20,0,0,0,20-20V140A12,12,0,0,0,184,128Z"></path></svg>

             <span> Visit Link to perform task</span>
            </button>
                <button onclick='
    let data=` <form action="{{ url("users/post/claim/task/reward/process") }}" onsubmit="PostRequest(event,this,MyFunc.Completed)" class="w-full align-center column p-10 g-20">
            <label style="border:2px dashed var(--bg-lighter);background:var(--bg-light)" class="w-full img-label cont pointer clip-5 br-5 no-select column p-10 justify-center h-fit no-shrink">
                <div class="column summary p-10 align-center text-center g-5">
                   <svg width="50" height="50" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M21.9998 12.6978C21.9983 14.1674 21.9871 15.4165 21.9036 16.4414C21.8067 17.6308 21.6081 18.6246 21.1636 19.45C20.9676 19.814 20.7267 20.1401 20.4334 20.4334C19.601 21.2657 18.5405 21.6428 17.1966 21.8235C15.8835 22 14.2007 22 12.0534 22H11.9466C9.79929 22 8.11646 22 6.80345 21.8235C5.45951 21.6428 4.39902 21.2657 3.56664 20.4334C2.82871 19.6954 2.44763 18.777 2.24498 17.6376C2.04591 16.5184 2.00949 15.1259 2.00192 13.3967C2 12.9569 2 12.4917 2 12.0009V11.9466C1.99999 9.79929 1.99998 8.11646 2.17651 6.80345C2.3572 5.45951 2.73426 4.39902 3.56664 3.56664C4.39902 2.73426 5.45951 2.3572 6.80345 2.17651C7.97111 2.01952 9.47346 2.00215 11.302 2.00024C11.6873 1.99983 12 2.31236 12 2.69767C12 3.08299 11.6872 3.3952 11.3019 3.39561C9.44749 3.39757 8.06751 3.41446 6.98937 3.55941C5.80016 3.7193 5.08321 4.02339 4.5533 4.5533C4.02339 5.08321 3.7193 5.80016 3.55941 6.98937C3.39683 8.19866 3.39535 9.7877 3.39535 12C3.39535 12.2702 3.39535 12.5314 3.39567 12.7844L4.32696 11.9696C5.17465 11.2278 6.45225 11.2704 7.24872 12.0668L11.2392 16.0573C11.8785 16.6966 12.8848 16.7837 13.6245 16.2639L13.9019 16.0689C14.9663 15.3209 16.4064 15.4076 17.3734 16.2779L20.0064 18.6476C20.2714 18.091 20.4288 17.3597 20.5128 16.3281C20.592 15.3561 20.6029 14.1755 20.6044 12.6979C20.6048 12.3126 20.917 12 21.3023 12C21.6876 12 22.0002 12.3125 21.9998 12.6978Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 11C15.3787 11 14.318 11 13.659 10.341C13 9.68198 13 8.62132 13 6.5C13 4.37868 13 3.31802 13.659 2.65901C14.318 2 15.3787 2 17.5 2C19.6213 2 20.682 2 21.341 2.65901C22 3.31802 22 4.37868 22 6.5C22 8.62132 22 9.68198 21.341 10.341C20.682 11 19.6213 11 17.5 11ZM18.25 4.5C18.25 4.08579 17.9142 3.75 17.5 3.75C17.0858 3.75 16.75 4.08579 16.75 4.5V5.75H15.5C15.0858 5.75 14.75 6.08579 14.75 6.5C14.75 6.91421 15.0858 7.25 15.5 7.25H16.75V8.5C16.75 8.91421 17.0858 9.25 17.5 9.25C17.9142 9.25 18.25 8.91421 18.25 8.5V7.25H19.5C19.9142 7.25 20.25 6.91421 20.25 6.5C20.25 6.08579 19.9142 5.75 19.5 5.75H18.25V4.5Z" fill="CurrentColor"></path>
</svg>


                    <span>ATTACH SCREENSHOT OF TASK PERFORMED</span>
                    <span>JPG,PNG,JPEG MAX:2MB</span>
                </div>
                <img src="" alt="" class="w-half display-none br-10">
                    <input onchange="MyFunc.Preview(this)" type="file" accept="image/*" class="display-none inp input required">
            </label>
          <input type="text" value="{{ $data->id }}" name="id" class="inp input display-none">
            <input type="text" value="{{ @csrf_token() }}" name="_token" class="inp input display-none">

            <label class="row display-none m-right-auto align-center g-2">
                <input checked required type="checkbox" style="transform:scale(0.7)">
                I have performed the task correctly</label>
                <span class="c-red display-none bold text-average">
                    ⚠️ Warning
Submitting without properly completing the task will result in a permanent ban with no appeal.
All proofs are verified by admins — fake or incomplete submissions are not tolerated.
                </span>
           <div class="row align-center g-10">
             <button style="border-radius:2px;clip-path:inset(0 round 2px);" class="btn-primary primary-text w-fit">Submit Task</button>
             <button type="button" onclick="MyFunc.Reselect(this)" style="border-radius:2px;clip-path:inset(0 round 2px);" class="btn-primary primary-text w-fit clip-2 br-2">Re-Select</button>
            </div>
        </form>`;
        PopUp(data)
                ' style="border-radius:10px;clip-path:inset(0 round 10px);font-weight:normal;" class="btn-green g-5 h-50 w-full claim-btn display-none">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M176.49,95.51a12,12,0,0,1,0,17l-56,56a12,12,0,0,1-17,0l-24-24a12,12,0,1,1,17-17L112,143l47.51-47.52A12,12,0,0,1,176.49,95.51ZM236,128A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z"></path></svg>


                <span>Receive Task Reward</span></button>
                
              {{-- <button onclick="GetRequest(event,'{{ url('users/get/claim/task/reward?id='.$data->id.'') }}',this,MyFunc.Completed)" class="btn-green claim-btn display-none br-5 clip-5"><span>Claim Reward</span></button> --}}
           </div>
            </div>
        @endforeach
        {{-- @if ($tasks->currentPage() >= 1)
            @include('components.sections',[
                'data' => $tasks ,
                'infinite_loading' => true
            ])
        @endif --}}
        @endif
      
    </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
        window.MyFunc = {
            Completed : function(response,event){
                let data=JSON.parse(response);
                CreateNotify(data.status,data.message);
                if(data.status == 'success'){
                    HidePopUp();
                    spa(event,'{{ url('users/tasks') }}');
                }
            },
            Preview : function(element){
                
                    if(element.files[0]){
                    
                   element.closest(".cont").querySelector("img").src=window.URL.createObjectURL(element.files[0]);
                     element.closest(".cont").querySelector("img").classList.remove("display-none");
                     element.closest(".cont").querySelector(".summary").classList.add("display-none");
                   
                    }else{
                    element.closest(".cont").querySelector("img").src="";
                     element.closest(".cont").querySelector("img").classList.add("display-none");
                     element.closest(".cont").querySelector(".summary").classList.remove("display-none");
                    }
            },
            Reselect : function(element){
                element.closest('form').querySelector('.img-label').click();
                
            }
        }
    </script>
@endsection