@extends('layout.users.app')
@section('title')
    Neo Stream
@endsection
@section('css')
    <style class="css">
        .populate{
            z-index:5000;
            background:rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding:20px;
            display:none;
            align-items:center;
            justify-content:center;
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;

            
        }
        .populate .child{
            width:90%;
            max-width: 500px;
            padding:20px;
            border-radius:20px;
            background:var(--bg);
            display:flex;
            flex-direction: column;
            align-items:center;
            gap:10px;
            text-align:start;

        }
        .populate .child .banner{
            width:100%;
            border-radius:10px;

        }
        .populate.active .child{
            animation:animate 0.3s linear forwards;
        }
       .populate.active{
        display:flex;
        flex-direction: column;
        }
        @keyframes animate{
            0%{
                transform: scale(0.7);
            }
            100%{
                transform:scale(1);
            }
        }
        .control .pause{
            display:none;
        }
        .control.active .play{
            display:none;
        }
        .control.active .pause{
            display:flex;
        }
        .control .play{
            display:flex;
        }
        .control .load{
            display:none;
        }
        .control.processing .load{
            display:flex;
        }
        .control.processing .main-controls{
            display:none;
        }
    </style>
@endsection
@section('main')
<section class="w-full p-20 column g-10">
     <div style="background:var(--primary-005);border:1px solid var(--primary-01);color:var(--primary-light)" class="w-full br-20 p-20 column g-10">
        <div class="w-full row g-10 align-center">
            <div style="box-shadow:0 0 10px var(--primary-07)" class="w-30 bg-primary perfect-square no-shrink circle primary-text column align-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M60,96v64a12,12,0,0,1-24,0V96a12,12,0,0,1,24,0ZM88,20A12,12,0,0,0,76,32V224a12,12,0,0,0,24,0V32A12,12,0,0,0,88,20Zm40,32a12,12,0,0,0-12,12V192a12,12,0,0,0,24,0V64A12,12,0,0,0,128,52Zm40,32a12,12,0,0,0-12,12v64a12,12,0,0,0,24,0V96A12,12,0,0,0,168,84Zm40-16a12,12,0,0,0-12,12v96a12,12,0,0,0,24,0V80A12,12,0,0,0,208,68Z"></path></svg>

            </div>
            <strong style="color:var(--primary-light);font-size:25px;" class="desc">Neo Stream</strong>
        </div>
        <div class="row align-center g-10 w-full">
            <img style="width:30%;" src="{{ asset('songs/banners/burna.webp') }}" alt="" class="br-20">
            <img style="width:35%;" src="{{ asset('songs/banners/Davido_Portrait_Session_79507.png') }}" alt="" class="br-20">
            <img style="width:30%;" src="{{ asset('songs/banners/wizkid.webp') }}" alt="" class="br-20">
        </div>
        <img style="height:100px;" src="{{ asset('songs/banners/marcela-laskoski-YrtFlrLo2DQ-unsplash.jpg') }}" alt="" class="w-full br-10">
        <strong class="desc">Tracks</strong>
        @if ($songs->isEmpty())
            <div class="column w-full align-center justify-center g-10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="50" width="50"><path d="M212.92,17.71a7.89,7.89,0,0,0-6.86-1.46l-128,32A8,8,0,0,0,72,56V166.1A36,36,0,1,0,88,196V102.25l112-28V134.1A36,36,0,1,0,216,164V24A8,8,0,0,0,212.92,17.71Z"></path></svg>

                <span class="font-1 text-center">No Tracks Available at the moment, Please check back later</span>
            </div>
        @else
           @foreach ($songs as $data)
           <div style="background:var(--primary-005);border:1px solid var(--primary-01);box-shadow:0 0 10px rgba(0,0,0,0.1)" class="w-full br-10 p-10 column g-10">
            <div class="row space-between w-full align-center g-10">
                <img src="{{ asset('songs/photos/'.$data->photo.'') }}" alt="" class="w-50 no-shrink perfect-square br-10">
          <div class="column m-top-20 m-right-auto g-5">
            <strong class="font-1 c-text">{{ $data->name }}</strong>
            <span>{{ $data->artist }}</span>
          </div>
          <span onclick="MyFunc.Populate('{{ asset('songs/photos/'.$data->photo.'') }}','{{ $data->name }}','{{ $data->artist }}','{{ asset('songs/audios/'.$data->audio.'') }}',{{ $data->id }})">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M176,128a12,12,0,0,1-5.17,9.87l-52,36A12,12,0,0,1,100,164V92a12,12,0,0,1,18.83-9.87l52,36A12,12,0,0,1,176,128Zm60,0A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z"></path></svg>

          </span>
            </div>
           </div>
               
           @endforeach 
           
        @endif
    </div>
</section>



    <section onclick="this.classList.remove('active')" class="populate">
        <div onclick="event.stopPropagation()" class="child">
            <img src="{{ asset('songs/photos/1773951684.jpg') }}" alt="" class="banner">
           <div class="column g-10 w-full">
             <strong class="desc song">With You Mixtape</strong>
             <span class="font-1 artist opacity-07">Davido x Omah Lay</span>
             <div class="w-full overflow-hidden duration br-1000 h-5" style="background:rgba(var(--rgt),0.1)">
                <div style="background:rgba(var(--rgt),0.4);width:0%;" class="bar h-full"></div>
             </div>
             <div class="row align-center justify-center g-10">
                <span class="opacity-07">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M208,48V208a8,8,0,0,1-13.66,5.66L128,147.31V208a8,8,0,0,1-13.66,5.66l-80-80a8,8,0,0,1,0-11.32l80-80A8,8,0,0,1,128,48v60.69l66.34-66.35A8,8,0,0,1,208,48Z"></path></svg>

                </span>
                <span class="control">
                 <span class="main-controls">
                       <svg onclick="MyFunc.PlayAudio(this)" class="play" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M240,128a15.74,15.74,0,0,1-7.6,13.51L88.32,229.65a16,16,0,0,1-16.2.3A15.86,15.86,0,0,1,64,216.13V39.87a15.86,15.86,0,0,1,8.12-13.82,16,16,0,0,1,16.2.3L232.4,114.49A15.74,15.74,0,0,1,240,128Z"></path></svg>
                    <svg onclick="MyFunc.PauseAudio(this)" class="pause" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M216,48V208a16,16,0,0,1-16,16H160a16,16,0,0,1-16-16V48a16,16,0,0,1,16-16h40A16,16,0,0,1,216,48ZM96,32H56A16,16,0,0,0,40,48V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V48A16,16,0,0,0,96,32Z"></path></svg>

                 </span>
                 <span class="load">
                    <svg fill="currentColor" height="40" width="40" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><circle cx="12" cy="3" r="1"><animate id="spinner_7Z73" begin="0;spinner_tKsu.end-0.5s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="16.50" cy="4.21" r="1"><animate id="spinner_Wd87" begin="spinner_7Z73.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="7.50" cy="4.21" r="1"><animate id="spinner_tKsu" begin="spinner_9Qlc.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="19.79" cy="7.50" r="1"><animate id="spinner_lMMO" begin="spinner_Wd87.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="4.21" cy="7.50" r="1"><animate id="spinner_9Qlc" begin="spinner_Khxv.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="21.00" cy="12.00" r="1"><animate id="spinner_5L9t" begin="spinner_lMMO.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="3.00" cy="12.00" r="1"><animate id="spinner_Khxv" begin="spinner_ld6P.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="19.79" cy="16.50" r="1"><animate id="spinner_BfTD" begin="spinner_5L9t.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="4.21" cy="16.50" r="1"><animate id="spinner_ld6P" begin="spinner_XyBs.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="16.50" cy="19.79" r="1"><animate id="spinner_7gAK" begin="spinner_BfTD.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="7.50" cy="19.79" r="1"><animate id="spinner_XyBs" begin="spinner_HiSl.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><circle cx="12" cy="21" r="1"><animate id="spinner_HiSl" begin="spinner_7gAK.begin+0.1s" attributeName="r" calcMode="spline" dur="0.6s" values="1;2;1" keySplines=".27,.42,.37,.99;.53,0,.61,.73"/></circle><animateTransform attributeName="transform" type="rotate" dur="6s" values="360 12 12;0 12 12" repeatCount="indefinite"/></g></svg>


                 </span>
                </span>
                <span class="opacity-07">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M221.66,133.66l-80,80A8,8,0,0,1,128,208V147.31L61.66,213.66A8,8,0,0,1,48,208V48a8,8,0,0,1,13.66-5.66L128,108.69V48a8,8,0,0,1,13.66-5.66l80,80A8,8,0,0,1,221.66,133.66Z"></path></svg>

                </span>
             </div>
           </div>
        </div>
    </section>

   
@endsection
@section('js')
    <script class="js">
        let currentaudio=null;

        window.MyFunc = {
           
            Populate : async function(banner,song,artist,music,song_id){
               try{
                let duration;
                let currenttime;
                let is_sent;
                 document.querySelector('.populate .child .banner').src=banner;
                document.querySelector('.populate .child .song').innerHTML=song;
                document.querySelector('.populate .child .artist').innerHTML=artist;
               document.querySelector('.populate').classList.add('active');
                    if(currentaudio){
                        
                        if(currentaudio.src == music){
                            currentaudio.play();
                                   // duration bar
               duration=currentaudio.duration;
                currenttime=currentaudio.currentTime;
                 currentaudio.addEventListener('timeupdate',()=>{
                    currenttime=currentaudio.currentTime;
                  
                     document.querySelector('.populate .child .duration .bar').style.width=(currenttime/duration) * 100 + '%';

                 });
                            document.querySelector('.populate .child .control').classList.add('active');
                            return;
                        }
                        currentaudio.pause();
                    }
                     document.querySelector('.populate .child .control').classList.add('processing');
                           
                    let audio=new Audio(music);

                    await audio.play();
                    currentaudio=audio;
                     document.querySelector('.populate .child .control').classList.remove('processing');
                           
                    // duration bar
               duration=audio.duration;
                currenttime=audio.currentTime;
                 audio.addEventListener('timeupdate',async ()=>{
                   
                    currenttime=audio.currentTime;
                     let min_time=duration/2;
                     min_time=Math.round(min_time);
                      document.querySelector('.populate .child .duration .bar').style.width=(currenttime/duration) * 100 + '%';

                //    CreateNotify('success','current time=' + currenttime + 'min time=' + min_time)
                    if(is_sent != song_id){
                        if(Math.round(currenttime) == min_time){
                        is_sent=song_id;
                        
                        let response=await fetch('{{ url('users/get/streamed') }}?song_id=' + song_id);
                        // if(response.ok){
                        //     let data=await response.text();
                        //     // alert(data)
                        // }
                    //    CreateNotify('success',min_time)
                    }
                    }
                  
                    
                 });

                    
                    document.querySelector('.populate .child .control').classList.add('active');

                   
                
               }catch(error){
                alert(error.stack)
               }
            },
            PlayAudio : function(element){
                currentaudio.play();
                element.closest('.control').classList.add('active');
            },
            PauseAudio : function(element){
                currentaudio.pause();
                 element.closest('.control').classList.remove('active');
            }
        }
        
    </script>
@endsection