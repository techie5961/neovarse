@extends('layout.users.app')
@section('title')
    Neo Translate
@endsection
@section('css')
    <style class="css">
        .title{
            width:fit-content;
            background:linear-gradient(to right,hsl(var(--primary-hsl),50%,80%),hsl(var(--primary-hsl),50%,50%));
             background-clip:text;
             -webkit-background-clip:text;
             -webkit-text-fill-color: transparent;
             font-size:1.5rem;
       
        }  
        .translate-form .understood-btn{
            display:none !important;
        }
        .translate-form.active .understood-btn{
            display:flex !important;
        }
        .translate-form.active .translate-btn{
            display:none !important;
        }
    </style>
@endsection
@section('main')
    <section class="w-full g-10 flex-auto column p-20">
      {{-- house --}}
        <div style="border:1px solid var(--primary-02);box-shadow:-5px -5px 50px var(--primary-01)" class="w-full overflow-hidden flex-auto br-20 column">
           {{-- head --}}
            <div style="border-bottom:1px solid var(--primary-02);background:var(--primary-01)" class="w-full p-20 column g-10">
                <div class="p-5 no-select p-x-20 br-1000 bg-primary w-fit row align-center g-5 primary-text">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z"></path></svg>

                    </span>
                    <span>NEO TRANSLATE</span>
                </div>
                <strong class="desc title">NeoTranslate</strong>
                <div class="row align-center c-primary w-fit">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,72H180.92c.39-.33.79-.65,1.17-1A29.53,29.53,0,0,0,192,49.57,32.62,32.62,0,0,0,158.44,16,29.53,29.53,0,0,0,137,25.91a54.94,54.94,0,0,0-9,14.48,54.94,54.94,0,0,0-9-14.48A29.53,29.53,0,0,0,97.56,16,32.62,32.62,0,0,0,64,49.57,29.53,29.53,0,0,0,73.91,71c.38.33.78.65,1.17,1H40A16,16,0,0,0,24,88v32a16,16,0,0,0,16,16v64a16,16,0,0,0,16,16h60a4,4,0,0,0,4-4V120H40V88h80v32h16V88h80v32H136v92a4,4,0,0,0,4,4h60a16,16,0,0,0,16-16V136a16,16,0,0,0,16-16V88A16,16,0,0,0,216,72ZM84.51,59a13.69,13.69,0,0,1-4.5-10A16.62,16.62,0,0,1,96.59,32h.49a13.69,13.69,0,0,1,10,4.5c8.39,9.48,11.35,25.2,12.39,34.92C109.71,70.39,94,67.43,84.51,59Zm87,0c-9.49,8.4-25.24,11.36-35,12.4C137.7,60.89,141,45.5,149,36.51a13.69,13.69,0,0,1,10-4.5h.49A16.62,16.62,0,0,1,176,49.08,13.69,13.69,0,0,1,171.49,59Z"></path></svg>

                    </span>
                    <span>Translate. Earn. Unlock More.</span>
                </div>
            </div>
            {{-- body --}}
           <div style="background:var(--primary-004)" class="column g-10 p-20">
            {{-- new row --}}
             <div style="border:1px solid var(--primary-01);background:var(--primary-005)" class="w-full p-10 br-10 column g-10">
                <div class="row w-full align-center g-10">
                    <div style="background:linear-gradient(to bottom right,hsl(var(--primary-hsl),50%,80%),hsl(var(--primary-hsl),50%,50%))" class="h-40 primary-text perfect-square no-shrink br-10 column align-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,24C74.17,24,32,48.6,32,80v96c0,31.4,42.17,56,96,56s96-24.6,96-56V80C224,48.6,181.83,24,128,24Zm80,104c0,9.62-7.88,19.43-21.61,26.92C170.93,163.35,150.19,168,128,168s-42.93-4.65-58.39-13.08C55.88,147.43,48,137.62,48,128V111.36c17.06,15,46.23,24.64,80,24.64s62.94-9.68,80-24.64Zm-21.61,74.92C170.93,211.35,150.19,216,128,216s-42.93-4.65-58.39-13.08C55.88,195.43,48,185.62,48,176V159.36c17.06,15,46.23,24.64,80,24.64s62.94-9.68,80-24.64V176C208,185.62,200.12,195.43,186.39,202.92Z"></path></svg>

                    </div>
                    <div class="column g-5">
                        <span style="color:hsl(var(--primary-hsl),50%,80%)">GIFTCARD WALLET</span>
                     <strong class="desc">&#8358;{{ number_format(Auth::guard('users')->user()->giftcard_balance,2) }}</strong>
                    </div>
                </div>
                <span class="opacity-07 row align-center g-5">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M236,208a12,12,0,0,1-12,12H32a12,12,0,0,1-12-12V48a12,12,0,0,1,24,0v85.55L88.1,95a12,12,0,0,1,15.1-.57l56.22,42.16L216.1,87A12,12,0,1,1,231.9,105l-64,56a12,12,0,0,1-15.1.57L96.58,119.44,44,165.45V196H224A12,12,0,0,1,236,208Z"></path></svg>

                    Earn & spend
                </span>
            </div>
             {{-- new row --}}
             <div style="border:1px solid var(--primary-01);background:var(--primary-005)" class="w-full p-10 br-10 column g-10">
                <div class="row w-full align-center g-10">
                    <div style="background:linear-gradient(to bottom right,hsl(var(--primary-hsl),50%,80%),hsl(var(--primary-hsl),50%,50%))" class="h-40 primary-text perfect-square no-shrink br-10 column align-center justify-center">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM128,168a16,16,0,1,1,16-16A16,16,0,0,1,128,168Zm80-88H48V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24Z"></path></svg>

                    </div>
                    <div class="column g-5">
                        <span style="color:hsl(var(--primary-hsl),50%,80%)">DAILY TRANSLATION</span>
                     <strong class="desc c-primary">{{ $translated == 'no' ? 'Available' : 'Not Available' }}</strong>
                    </div>
                </div>
                <span class="opacity-07 row align-center g-5">

                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M216,72H180.92c.39-.33.79-.65,1.17-1A29.53,29.53,0,0,0,192,49.57,32.62,32.62,0,0,0,158.44,16,29.53,29.53,0,0,0,137,25.91a54.94,54.94,0,0,0-9,14.48,54.94,54.94,0,0,0-9-14.48A29.53,29.53,0,0,0,97.56,16,32.62,32.62,0,0,0,64,49.57,29.53,29.53,0,0,0,73.91,71c.38.33.78.65,1.17,1H40A16,16,0,0,0,24,88v32a16,16,0,0,0,16,16v64a16,16,0,0,0,16,16h60a4,4,0,0,0,4-4V120H40V88h80v32h16V88h80v32H136v92a4,4,0,0,0,4,4h60a16,16,0,0,0,16-16V136a16,16,0,0,0,16-16V88A16,16,0,0,0,216,72ZM84.51,59a13.69,13.69,0,0,1-4.5-10A16.62,16.62,0,0,1,96.59,32h.49a13.69,13.69,0,0,1,10,4.5c8.39,9.48,11.35,25.2,12.39,34.92C109.71,70.39,94,67.43,84.51,59Zm87,0c-9.49,8.4-25.24,11.36-35,12.4C137.7,60.89,141,45.5,149,36.51a13.69,13.69,0,0,1,10-4.5h.49A16.62,16.62,0,0,1,176,49.08,13.69,13.69,0,0,1,171.49,59Z"></path></svg>

                    Daily free translation
                </span>
            </div>
            {{-- new row --}}
            <div class="row c-primary align-center g-10">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M160,129.89,175.06,160H144.94l6.36-12.7v0ZM224,48V208a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM207.16,188.42l-40-80a8,8,0,0,0-14.32,0L139.66,134.8a62.31,62.31,0,0,1-23.61-10A79.61,79.61,0,0,0,135.6,80H152a8,8,0,0,0,0-16H112V56a8,8,0,0,0-16,0v8H56a8,8,0,0,0,0,16h63.48a63.73,63.73,0,0,1-15.3,34.05,65.93,65.93,0,0,1-9-13.61,8,8,0,0,0-14.32,7.12,81.75,81.75,0,0,0,11.4,17.15A63.62,63.62,0,0,1,56,136a8,8,0,0,0,0,16,79.56,79.56,0,0,0,48.11-16.13,78.33,78.33,0,0,0,28.18,13.66l-19.45,38.89a8,8,0,0,0,14.32,7.16L136.94,176h46.12l9.78,19.58a8,8,0,1,0,14.32-7.16Z"></path></svg>

                </span>
                <span class="font-1">TRANSLATION STUDIO</span>
            </div>
            <form action="{{ url('users/post/neo/translate/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Translated,'do not notify')" class="w-full translate-form column g-10">
             <input name="_token" type="hidden" value="{{ @csrf_token() }}" class="inp input">
                <input name="id" type="hidden" value="{{ $translate->id }}" class="inp input">
                <div style="border:1px solid var(--primary-05);box-shadow:0 0 10px var(--primary-03);background:var(--primary-005)" class="cont h-150 w-full br-10">
                    <textarea name="word" readonly placeholder="Enter word to translate..." class="inp no-resize border-none bg-transparent h-full w-full input required">{{ $translate->primary }}</textarea>
                </div>
                @if ($translated == 'no')
                    <button class="post translate-btn">Translate</button>
                    @else
                    <div style="color:gold;background:rgba(255, 215, 0,0.1);border:1px solid gold;" class="w-full h-50 br-10 row align-center justify-center">
                            You have used your daily free translation,try again tomorrow
                    </div>
                @endif
                <div onclick="CreateNotify('success','Translation successfull and gift card wallet credited successfully');spa(event,'{{ url()->current() }}')" class="w-full understood-btn h-50 bg-gold c-black br-10 row align-center justify-center">
                   Claim Token
                </div>
            </form>

            <div style="border-left:4px solid var(--primary)" class="w-full p-10 bg br-10 column g-10">
                <div style="color:hsl(var(--primary-hsl),50%,80%)" class="w-full row align-center g-5">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M132,24A100.11,100.11,0,0,0,32,124v84a16,16,0,0,0,16,16h84a100,100,0,0,0,0-200ZM88,140a12,12,0,1,1,12-12A12,12,0,0,1,88,140Zm44,0a12,12,0,1,1,12-12A12,12,0,0,1,132,140Zm44,0a12,12,0,1,1,12-12A12,12,0,0,1,176,140Z"></path></svg>

                    </span>
                    <span class="font-1 translation-span">Your translation will appear here...</span>
                  
                </div>
                  <span class="font-1 language-span"></span>
                <div class="c-primary">
                    <span>✨</span>
                    <small>Translate a word, then claim your daily token rewards straight into your giftcard wallet.</small>
                </div>
            </div>

            



           </div>
        </div>
     
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Translated : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    document.querySelector('.translation-span').innerHTML=data.translation;
                     document.querySelector('.language-span').innerHTML=data.language;
                     document.querySelector('.translate-form').classList.add('active');
                }
            }
        }
    </script>
@endsection