@extends('layout.users.app')
@section('title')
    Neo Chat
@endsection
@section('css')
    <style class="css">
        .message-divs{
            width:fit-content;
            padding:10px;
            border-radius: 2px 20px 20px 20px;
            max-width:70% !important;
            display:flex;
            flex-direction: column;
            gap:10px;
            background:var(--primary-01);
            border:1px solid var(--primary);
            


        }
        .message-divs.me{
            border-radius: 20px 20px 2px 20px;
            margin-left:auto;
               background:rgba(var(--rgt),0.1);
               border:1px solid rgba(var(--rgt),0.5);
              
        }
        .populate{
            position:fixed;
            top:0;
            left:0;
            bottom:0;
            right:0;
            z-index:3500;
            background:rgba(0,0,0,0.6);
            backdrop-filter:blur(5px);
            -webkit-backdrop-filter: blur(5px);
            padding:20px;
            display:flex;
            flex-direction:column;
            gap:10px;
            align-items:center;
            justify-content: center;
            display:none;
        }
        .populate .child{
            width:80%;
            background:var(--bg);
            border:1px solid var(--primary);
            padding:20px;
            border-radius:5px;
            display:flex;
            flex-direction:column;
            align-items:center;
            gap:10px;
            justify-content:center;
            
        }
        .populate.active{
            display:flex;
        }
        .populate.active .child{
            animation:animate-up 0.5s linear forwards;
        }
        @keyframes animate-up{
            0%{
                transform:translateY(30px);
                opacity:0;
            }
            100%{
                transform:translateY(0);
                opacity:1;
            }
        }
        body:has(.populate.active){
            overflow:hidden;
        }
    </style>
@endsection
@section('main')
<section class="populate">
<div class="child">
<span style="font-size:3rem">🎁✨</span>
<strong style="font-size:1.5rem;text-align:center;text-shadow:0 0 10px var(--primary);" class="c-primary">Gift Card Received</strong>
<strong style="font-size:2rem;text-align:center;text-shadow:0 0 10px var(--primary);" class="c-primary">$1.00</strong>
<span style="display:block;width:100%;color:var(--primary-light);text-align:center;opacity:0.7;border-bottom:1px dashed var(--primary-05);padding-bottom:10px;">You've been rewarded for your engaging conversation on NeoChat with our smart Neo Bot.</span>
<span class="text-center" style="color:var(--primary-05)">💜Powered by Neovarse | Neochat loyalty</span>
<div onclick="this.closest('.populate').classList.toggle('active');" class="w-full br-1000 row align-center justify-center g-10 h-40 bg-primary p-x-20 primary-text no-select pointer">
    Continue
</div>
</div>
</section>
    <section class="w-full flex-auto column g-10 p-20">
        <div style="border:1px solid var(--primary-05);" class="w-full flex-auto overflow-hidden br-20 column">
            {{-- head --}}
            <div style="border-bottom:1px solid var(--primary-02);" class="w-full p-20 column g-10">
              <div class="row align-center g-10 space-between">
                 <div class="row g-5 align-center">
                <span class="c-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M200,48H136V16a8,8,0,0,0-16,0V48H56A32,32,0,0,0,24,80V192a32,32,0,0,0,32,32H200a32,32,0,0,0,32-32V80A32,32,0,0,0,200,48ZM172,96a12,12,0,1,1-12,12A12,12,0,0,1,172,96ZM96,184H80a16,16,0,0,1,0-32H96ZM84,120a12,12,0,1,1,12-12A12,12,0,0,1,84,120Zm60,64H112V152h32Zm32,0H160V152h16a16,16,0,0,1,0,32Z"></path></svg>

                </span>
                <strong class="desc c-primary">NEO CHAT</strong>
               </div>
               <div style="border:1px solid var(--primary-text);color:var(--primary-text);background:linear-gradient(to right,var(--primary-light),var(--primary))" class="p-5 row align-center g-5 p-x-20 br-1000">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M160,152a16,16,0,0,1-16,16h-8V136h8A16,16,0,0,1,160,152Zm72-24A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-56,24a32,32,0,0,0-32-32h-8V88h4a16,16,0,0,1,16,16,8,8,0,0,0,16,0,32,32,0,0,0-32-32h-4V64a8,8,0,0,0-16,0v8h-4a32,32,0,0,0,0,64h4v32h-8a16,16,0,0,1-16-16,8,8,0,0,0-16,0,32,32,0,0,0,32,32h8v8a8,8,0,0,0,16,0v-8h8A32,32,0,0,0,176,152Zm-76-48a16,16,0,0,0,16,16h4V88h-4A16,16,0,0,0,100,104Z"></path></svg>
                  
                </span>
                <span>Earn</span>
               </div>
              </div>
            </div>
            {{-- body --}}
            <div style="background:rgba(var(--rgt),0.05);height:100px;" class="w-full chats-body overflow-auto g-10 flex-auto p-20 column">
               
                @if ($chats->isEmpty())
                    <div class="message-divs">
                        <span>Welcome {{ ucfirst(Auth::guard('users')->user()->username) }} 👋, I am Neo Bot, and i'm here to help you with whatever you need -- whatever it's answering questions,offering guidance, or just having a friendly chat. Go ahead and type your first message!</span>
                    </div>
                @else
                    @foreach ($chats as $data)
                        <div class="message-divs {{ $data->role == 'user' ? 'me' : '' }}">
                            <span>{!! nl2br($data->raw_message) !!}</span>
                        </div>
                    @endforeach
                @endif
              
              
            </div>
            {{-- foot --}}
            <div style="border-top:1px solid var(--primary-02);" class="w-full p-20 column g-10">
                <div style="border:1px solid rgba(var(--rgt),0.1);background:rgba(var(--rgt),0.1);height:70px;" class="w-full row align-center g-10 p-10 br-20">
                    <textarea oninput="MyFunc.Typing(this)" style="width:100%;height:100%;background:transparent;border:none;resize:none;" class="input" placeholder="Type a Message..."></textarea>
                <div onclick="MyFunc.SendChat('{{ url('users/get/neo/chat/send/message/process?message=') }}')" class="h-40 send-btn display-none clip-circle pointer perfect-square circle bg-primary primary-text column align-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208.49,120.49a12,12,0,0,1-17,0L140,69V216a12,12,0,0,1-24,0V69L64.49,120.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0l72,72A12,12,0,0,1,208.49,120.49Z"></path></svg>

                </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        let chat_started;
        window.MyFunc = {
            Restyle : ()=>{
               
                // scroll into view
                document.querySelector('.chats-body').scrollTo({
                    top : document.querySelector('.chats-body').scrollHeight,
                    behavior : 'smooth'
                });
            },
            Typing : (element)=>{
                if(element.value == ''){
                    document.querySelector('.send-btn').classList.add('display-none');
                }else{
                    document.querySelector('.send-btn').classList.remove('display-none');
                }
            },
            SendChat : async (link)=>{
                
              let send_btn=document.querySelector('.send-btn');
                 let input=document.querySelector('textarea.input');
                let message=input.value;
                // alert(message)
               let div=document.createElement('div');
               div.classList.add('message-divs');
               div.classList.add('me');
               div.innerHTML=`<span>${message.replace(/\n/g,'<br>')}</span>`;
                 let chats_body=document.querySelector('div.chats-body');
                   
                    chats_body.appendChild(div);
                    let bot_div=document.createElement('div');
                    bot_div.classList.add('message-divs');
                bot_div.innerHTML=`<svg height="20" width="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="12" r="3" opacity="1"><animate id="spinner_qYjJ" begin="0;spinner_t4KZ.end-0.25s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze"/></circle><circle cx="12" cy="12" r="3" opacity=".4"><animate begin="spinner_qYjJ.begin+0.15s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze"/></circle><circle cx="20" cy="12" r="3" opacity=".3"><animate id="spinner_t4KZ" begin="spinner_qYjJ.begin+0.3s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze"/></circle></svg>`;
                chats_body.appendChild(bot_div);
                    // scroll into view start
                  
                    chats_body.scrollTo({
                        top : chats_body.scrollHeight,
                        behavior : 'smooth'
                    });

                    // scroll into view end
                    input.value='';
                    send_btn.classList.add('display-none');
                    let response=await fetch(link + message.replace(/\n/g,' ') + '&raw_message=' + message);
                    if(response.ok){
                        let data=await response.json();
                        if(data.status == 'success'){
                            chat_started='true';
                            document.querySelector('div.message-divs:last-of-type').innerHTML=`<span>${data.message}</span>`;
                             // scroll into view start
                  
                    chats_body.scrollTo({
                        top : chats_body.scrollHeight,
                        behavior : 'smooth'
                    });

                    // scroll into view end
                        }else{
                            CreateNotify('error',data.message);
                        }
                    }else{
                        document.querySelector('div.message-divs:last-of-type').remove();
                        CreateNotify('error','Unknown error occured,please try again');
                    }
              
            },
            RewardUser : ()=>{
              
                let countdown=setInterval(async () => {
                    
                   if(chat_started){
                      let response=await fetch('{{ url('users/get/neo/chat/reward/user/process') }}');
                     if(response.ok){
                        let data=await response.json();
                        if(data.status == 'success'){
                             document.querySelector('.populate').classList.add('active')
                        }
                       

                     }
                   }
                }, 60000);
            }
        }
       
        MyFunc.Restyle();
    MyFunc.RewardUser();
    </script>
@endsection