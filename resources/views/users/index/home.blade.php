@extends('layout.users.index')
@section('title')
    Homepage
@endsection
@section('css')
    <style class="css">
        .observe{
            opacity:0;
        }
        .observe.scale-in{
            animation:scale-in 1.0s ease forwards;
        }
        .observe.scale-out{
            animation:scale-out 1.0s ease forwards;
        }

        @keyframes scale-in{
            0%{
                transform:scale(0.8);
                opacity:0;
            }
            100%{
                transform:scale(1);
                opacity:1;
            }
        }
          @keyframes scale-out{
            0%{
                transform:scale(1.2);
                opacity:0;
            }
            100%{
                transform:scale(1);
                opacity:1;
            }
        }
        .observe.trans-up{
            animation:trans-up 0.2s linear forwards;
        }
        @keyframes trans-up{
            0%{
                opacity:0;
                transform:translateY(30px);
            }
             100%{
                opacity:1;
                transform:translateY(0);
            }
        }
        .observe.trans-from-left{
            animation:trans-from-left 2s ease forwards;
        }
        @keyframes trans-from-left{
            0%{
                opacity:0;
                transform:translateX(-50px);
            }
             100%{
                opacity:1;
                transform:translateX(0);
            }
        }
         .observe.trans-from-right{
            animation:trans-from-right 2s ease forwards;
        }
        @keyframes trans-from-right{
            0%{
                opacity:0;
                transform:translateX(50px);
            }
             100%{
                opacity:1;
                transform:translateX(0);
            }
        }
          .observe.trans-from-bottom{
            animation:trans-from-bottom 0.5s ease forwards;
        }
        @keyframes trans-from-bottom{
            0%{
                opacity:0;
                transform:translateY(50px);
            }
             100%{
                opacity:1;
                transform:translateY(0);
            }
        }
                  .observe.trans-from-top{
            animation:trans-from-top 2s ease forwards;
        }
        @keyframes trans-from-top{
            0%{
                opacity:0;
                transform:translateY(-50px);
            }
             100%{
                opacity:1;
                transform:translateY(0);
            }
        }
        .observe.rotate-in-from-left{
            animation:rotate-in-from-left 1s ease forwards;
        }
        @keyframes rotate-in-from-left{
            0%{
                transform:rotate(-90deg) translateX(-200px);
                opacity:0;
            }
            100%{
                transform:rotate(0deg) translateX(0);
                opacity:1;
            }
        }
        .observe.rotate-in-from-right{
            animation:rotate-in-from-right 1s ease forwards;
        }
        @keyframes rotate-in-from-right{
            0%{
                transform:rotate(90deg) translateX(200px);
                opacity:0;
            }
            100%{
                transform:rotate(0deg) translateX(0);
                opacity:1;
            }
        }
         .observe.rotate-in-from-top{
            animation:rotate-in-from-top 1s ease forwards;
        }
        @keyframes rotate-in-from-top{
            0%{
                transform:rotate(45deg) translateY(50px);
                opacity:0;
            }
            100%{
                transform:rotate(0deg) translateY(0);
                opacity:1;
            }
        }
         .observe.rotate-in-from-bottom{
            animation:rotate-in-from-bottom 1s ease forwards;
        }
        @keyframes rotate-in-from-bottom{
            0%{
                transform:rotate(-180deg) translateY(-50px);
                opacity:0;
            }
            100%{
                transform:rotate(0deg) translateY(0);
                opacity:1;
            }
        }
        .hero-title{
            font-size:2rem;
            font-weight:900;
            color: var(--primary-light);
           
            
          
        }
        .features-card{
            display:flex;
            flex-direction:column;
            gap:10px;
            padding:20px;
            border:1px solid rgba(var(--rgt),0.1);
            background:rgba(var(--rgt),0.01);
            border-radius:10px;
           

        }
        .features-card:hover{
            border-color:var(--primary-light);
            box-shadow:0 0 20px var(--primary-transparent)

        }
        .features-card:hover .symbol{
              background:var(--primary);
            color:var(--primary-text);
        }
        .features-card .symbol{
             background:var(--primary);
            color:var(--primary-text);
            padding:10px;
            border-radius:10px;
            height:50px;
            width:50px;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .features-title{
            font-weight:800;
            font-size:1.5rem;

        }
        .features-details{
            color:silver;
        }
        .faq{
            width:100%;
            padding:20px;
            border:1px solid rgba(var(--rgt),0.1);
            background:rgba(255,2552,255,0.05);
            display:flex;
            flex-direction:column;
            gap:10px;
            border-radius:10px;
        }
        .faq.active {
            border-color:var(--primary) !important;
            box-shadow:0 0 10px var(--primary-transparent);
        }
        .faq .question{
            display:flex;
             flex-direction:row;
            align-items:center;
            gap:10px;
            justify-content: space-between;
            text-align:start;
        }
        .faq .answer{
            
            display:none;
           background:rgba(var(--rgt),0.05);
           padding:10px;
           border:1px solid rgba(var(--rgt),0.1);
           border-radius:10px;
           opacity:0.7;
           border-color:var(--primary);
           background:var(--primary-transparent)
        }

        .faq .question *{
            transition: all 0.5s ease;
        }
       
         .faq.active .question .icon svg{
          transform:rotate(90deg);
          

        }
        .faq.active .question{
            display:flex;
           
        }
        .faq.active .answer{
            display:flex;
             flex-direction: column;
             align-items:flex-start;
             text-align:start;
             gap:5px;
            
        }
         .get-started-btn{
            position: relative;

         }
        .get-started-btn::before{
            content:'';
            position:absolute;
            left:0;
            top:0;
            bottom:0;
            background:linear-gradient(to right,transparent,rgba(var(--rgt),0.5),transparent,transparent);
            width:100%;
            animation:shiny 2s linear infinite;
            transform:skew(40deg)
        }
        
        @keyframes shiny{
            0%{
                left:-25%;
            }
            25%{
                left:25%;
            }
            50%{
                left:50%;
            }
            75%{
                left:75%;
            }
            100%{
                left:100%
            }
        }
        .observe.bounce-in-from-right{
            animation:bounce-in-from-right 0.2s linear forwards;
        }
        @keyframes bounce-in-from-right{
            0%{
                transform:translateX(30%);
                opacity:1;
            }
        
           
           100%{
                transform: translateX(0);
                opacity:1;
            }
        }

    </style>
@endsection
@section('main')
    <section class="w-full align-center  g-10 column p-20">
           
        <div class="hero-title">
           <span class="c-white">{{ config('app.name') }}:</span> Learn skills, earn daily rewards with our AI powered ecosystem.
        </div>
        
        <span class="text-center opacity-07">
           {{ config('app.name') }} is a next-generation digital ecosystem powered by artifial intelligence. It offers users the opportunity to aquire practical skills, interact with intelligent tools, and earn tangible rewards on a daily basis.

        </span>
        {{-- action buttons --}}
       <div style="padding-top:20px;padding-bottom:20px;" class="grid pc-grid-2 w-full g-10 m-y-20">
        {{-- get started btn --}}
        <div onclick="window.location.href='{{ url('register') }}'" style="background: var(--primary);color:white;" class="h-50 font-1 pointer get-started-btn w-full row g-10 justify-center overflow-hidden p-10 br-1000 clip-1000">
        Get Started
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M240.49,119.51l-96-96A12,12,0,0,0,124,32V68H48A20,20,0,0,0,28,88v80a20,20,0,0,0,20,20h76v36a12,12,0,0,0,20.49,8.49l96-96A12,12,0,0,0,240.49,119.51ZM148,195V176a12,12,0,0,0-12-12H52V92h84a12,12,0,0,0,12-12V61l67,67Z"></path></svg>

    </div>
    {{-- sign in btn --}}
    <div onclick="window.location.href='{{ url('login') }}'" style="border:1px solid var(--primary);color:var(--primary);background:transparent" class="h-50 font-1 pointer overflow-hidden clip-5 w-full row g-10 justify-center p-10 br-1000">
       Sign In
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M240.49,119.51l-96-96A12,12,0,0,0,124,32V68H48A20,20,0,0,0,28,88v80a20,20,0,0,0,20,20h76v36a12,12,0,0,0,20.49,8.49l96-96A12,12,0,0,0,240.49,119.51ZM148,195V176a12,12,0,0,0-12-12H52V92h84a12,12,0,0,0,12-12V61l67,67Z"></path></svg>


    </div>
       </div>
       {{-- analytics --}}
       <div class="row w-full g-10 align-center space-between">
        {{-- total users --}}
        <div class="column align-center g-10">
            <strong data-max="100" data-increment="1" data-initial="0" style="font-size:1.5rem;" class="analytic count c-primary"><span>0</span>K+</strong>
            <span class="opacity-07">Total Users</span>
        </div>
        {{-- paid out --}}
         <div class="column align-center g-10">
            <strong data-max="56" data-increment="1" data-initial="0" style="font-size:1.5rem;" class="analytic count c-primary">&#8358;<span>0</span>M+</strong>
            <span class="opacity-07">Paid Out</span>
        </div>
          {{-- customer satisfaction --}}
         <div class="column align-center g-10">
            <strong style="font-size:1.5rem;" class="c-primary">99%</strong>
            <span class="opacity-07">Uptime</span>
        </div>
       </div>
       
         <img data-class='bounce-in-from-right' src="{{ asset('banners/3f7f4c77-8056-4e20-843b-6d899e9aac38.jpeg') }}" alt="" class="w-full m-x-auto observe br-10 max-w-500">
       
       
        <span class="hero-title">Everything You Need</span>
        <span class="opacity-07 text-center w-full column align-center">
            One platform,Everything you need
        </span>
        <div class="grid p-20 pc-grid-2 w-full g-10">
              {{-- new feature --}}
            <div data-class="trans-up" class="features-card observe">
                <div class="symbol">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M72,104a16,16,0,1,1,16,16A16,16,0,0,1,72,104Zm96,16a16,16,0,1,0-16-16A16,16,0,0,0,168,120Zm68-40V192a36,36,0,0,1-36,36H56a36,36,0,0,1-36-36V80A36,36,0,0,1,56,44h60V16a12,12,0,0,1,24,0V44h60A36,36,0,0,1,236,80Zm-24,0a12,12,0,0,0-12-12H56A12,12,0,0,0,44,80V192a12,12,0,0,0,12,12H200a12,12,0,0,0,12-12Zm-12,82a30,30,0,0,1-30,30H86a30,30,0,0,1,0-60h84A30,30,0,0,1,200,162Zm-80-6v12h16V156ZM86,168H96V156H86a6,6,0,0,0,0,12Zm90-6a6,6,0,0,0-6-6H160v12h10A6,6,0,0,0,176,162Z"></path></svg>


                </div>
                <strong class="features-title">AI Leaning</strong>
                <span class="features-details">interactive AI-powered learning system that adapts to your growth journey.</span>
            </div>
              {{-- new feature --}}
             <div data-class="trans-up" class="features-card observe">
                <div class="symbol">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M208,28H188V24a12,12,0,0,0-24,0v4H92V24a12,12,0,0,0-24,0v4H48A20,20,0,0,0,28,48V208a20,20,0,0,0,20,20H208a20,20,0,0,0,20-20V48A20,20,0,0,0,208,28ZM68,52a12,12,0,0,0,24,0h72a12,12,0,0,0,24,0h16V76H52V52ZM52,204V100H204V204Zm120.49-84.49a12,12,0,0,1,0,17l-48,48a12,12,0,0,1-17,0l-24-24a12,12,0,0,1,17-17L116,159l39.51-39.52A12,12,0,0,1,172.49,119.51Z"></path></svg>



                </div>
                <strong class="features-title">Earn Daily Rewards</strong>
                <span class="features-details">Complete structure micro-tasks and earn consistent daily rewards.</span>
            </div>
              {{-- new feature --}}
            <div data-class="trans-up" class="features-card observe">
                <div class="symbol">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M248.59,58.67c-6.31-10.87-23-21.06-66.16-9.71A95.94,95.94,0,0,0,32,128q0,3.6.26,7.14C.56,166.86,1.1,186.4,7.44,197.33,13.4,207.61,25.3,212,40.68,212c9.79,0,21-1.78,32.95-4.91A95.94,95.94,0,0,0,224,128c0-2.41-.09-4.79-.27-7.16,14.31-14.38,23.86-28.21,27-40C253.55,70.42,251.12,63,248.59,58.67ZM128,56a72.11,72.11,0,0,1,70.19,56C184,124.73,165,138.59,141.92,151.86c-21.74,12.49-43.55,22.36-63.09,28.65A72,72,0,0,1,128,56ZM28.19,185.29c-.61-1.07-.17-8.22,10.67-21.71A95.77,95.77,0,0,0,52.35,187C35.12,189.61,28.85,186.41,28.19,185.29ZM128,200a71.66,71.66,0,0,1-22.56-3.64,394.1,394.1,0,0,0,48.42-23.69A388.11,388.11,0,0,0,198.43,143,72.12,72.12,0,0,1,128,200ZM227.57,74.65c-1.28,4.78-4.81,10.87-10.39,17.8A95.74,95.74,0,0,0,203.68,69c15.83-2.37,23.17,0,24.15,1.71C228,71,228.21,72.28,227.57,74.65Z"></path></svg>


                </div>
                <strong class="features-title">Smart Technology</strong>
                <span class="features-details">Built with modern technology for seamless user experience.</span>
            </div>
            {{-- new feature --}}
              <div data-class="trans-up" class="features-card observe">
                <div class="symbol">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M236,208a12,12,0,0,1-12,12H32a12,12,0,0,1-12-12V48a12,12,0,0,1,24,0v99l43.51-43.52a12,12,0,0,1,17,0L128,127l43-43H160a12,12,0,0,1,0-24h40a12,12,0,0,1,12,12v40a12,12,0,0,1-24,0V101l-51.51,51.52a12,12,0,0,1-17,0L96,129,44,181v15H224A12,12,0,0,1,236,208Z"></path></svg>



                </div>
                <strong class="features-title">Ethical growth</strong>
                <span class="features-details">Tech-based and structured environment for responsive digital earning.</span>
            </div>
            
          
        </div>

       
      
       
     
        <div class="column m-x-auto m-top-50 g-10 w-full">
            <strong class="hero-title">Introducing Neo-Chat Feature</strong>
            <span>Imagine being paid for what you do daily.With Neo-Chat,Every 60 seconds of chatting with our smart AI return rewards in cash.</span>
        <img src="{{ asset('banners/4c5786fe-7b73-46e2-a891-55488d1428e5.jpeg') }}" alt="" data-class="trans-from-bottom" class="w-full m-x-auto observe max-w-500 br-10">
          
        </div>
         <div class="column m-x-auto m-top-50 g-10 w-full">
            <strong class="hero-title">Introducing Neo-Skill Feature</strong>
            <span>Earn from daily online skills session ranging from web develpment,forex trading,graphic designs copywriting etc and also gain practical knowledge</span>
        <img src="{{ asset('banners/56ad2bfc-d99e-4b40-9aa4-1985b8f1f900.jpeg') }}" alt="" data-class="trans-from-bottom" class="w-full m-x-auto observe max-w-500 br-10">
          
        </div>
        {{-- FREQUENTLY ASKED QUESTIONS --}}
         <div class="column m-x-auto m-top-50 text-center g-10 w-full">
            <strong class="hero-title">Frequently Asked Questions</strong>
            <div class="faq no-select w-full column g-10">
                <div onclick="if(this.closest('.faq').classList.contains('active')){
                this.closest('.faq').classList.remove('active')
                }else{
                this.closest('.faq').classList.add('active')
                }" class="w-full question space-between row align-center g-10">
                    <span class="desc">How Do I earn?</span>
                    <div class="icon h-30 w-30 no-shrink br-5 column justify-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                    </div>
                </div>
                <div class="answer">
                 <span>On {{ config('app.name') }},we have multiple earning methods like sponsored posts,NeoChat,NeoTranslate,NeoSkill,Music Streaming etc. All tailored to meet your needs.</span>
                </div>
            </div>

            {{-- FAQ SECTION --}}
            {{-- NEW FAQ --}}
            <div class="faq">
                <div onclick="if(this.closest('.faq').classList.contains('active')){
                this.closest('.faq').classList.remove('active')
                }else{
                this.closest('.faq').classList.add('active')
                }" class="question">
                    <span class="desc">How long does withdrawal take?</span>
                    <div class="icon h-30 w-30 no-shrink br-5 column justify-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                    </div>
                </div>
                <div class="answer">
              <span>All withdrawal requests are processed within 1 - 5 minutes but might exceed if we have many requests to attend to.Be rest assured that uyou would receive your withdrawal.</span>
                </div>
            </div>
             {{-- NEW FAQ --}}
            <div class="faq">
                <div onclick="if(this.closest('.faq').classList.contains('active')){
                this.closest('.faq').classList.remove('active')
                }else{
                this.closest('.faq').classList.add('active')
                }" class="question">
                    <span class="desc">Is there a minimum withdrawal amount?</span>
                    <div class="icon h-30 w-30 no-shrink br-5 column justify-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                    </div>
                </div>
                <div class="answer">
              <span>The minimum withdrawal varies based on account package.</span>
                </div>
            </div>
              {{-- NEW FAQ --}}
            <div class="faq">
                <div onclick="if(this.closest('.faq').classList.contains('active')){
                this.closest('.faq').classList.remove('active')
                }else{
                this.closest('.faq').classList.add('active')
                }" class="question">
                    <span class="desc">Is registration free?</span>
                    <div class="icon h-30 w-30 no-shrink br-5 column justify-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                    </div>
                </div>
                <div class="answer">
             <span>To join {{ config('app.name') }}, you must purchase a valid {{ config('settings.coupon') }} from our verified {{ config('settings.vendors') }}s.</span>
                </div>
            </div>
               {{-- NEW FAQ --}}
            <div class="faq">
                <div onclick="if(this.closest('.faq').classList.contains('active')){
                this.closest('.faq').classList.remove('active')
                }else{
                this.closest('.faq').classList.add('active')
                }" class="question">
                    <span class="desc">Is my data secure?</span>
                    <div class="icon h-30 w-30 no-shrink br-5 column justify-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                    </div>
                </div>
                <div class="answer">
             <span>Yes. We use modern security protocols and end-to-end encrypted systems to protect user information.</span>
                </div>
            </div>
        </div>
         <img src="{{ asset('banners/f8ba1e5d-12ed-45b7-9ee0-b828227e0c67.jpeg') }}" alt="" class="w-full m-x-auto br-10 max-w-500">
        
    </section>
@endsection
@section('js')
    <script class="js">
        function ObserveItems(class_name){
            let observer=new IntersectionObserver((entries)=>{
                entries.forEach((entry)=>{
                    if(entry.isIntersecting){
                        entry.target.classList.add(entry.target.dataset.class);
                    }else{
                        entry.target.classList.remove(entry.target.dataset.class);
                    }
                });
            },{
                threshold : 0
            });
            let items=document.querySelectorAll('.' + class_name);
           items.forEach((item)=>{
             observer.observe(item);
           })
        }

        function CountAnalytics(){
           
                let observer=new IntersectionObserver((entries)=>{
                entries.forEach((entry)=>{
                    if(entry.isIntersecting){
                       let countinterval= setInterval(()=>{
                            if(parseFloat(entry.target.querySelector('span').innerHTML) >= parseFloat(entry.target.dataset.max)){
                                clearInterval(countinterval)
                            }else{
                                  entry.target.querySelector('span').innerHTML=parseFloat(entry.target.querySelector('span').innerHTML) + parseFloat(entry.target.dataset.increment);

                            }
                          
                        },50);
                     
                    }
                })
            },{
                threshold : 0
            })
            document.querySelectorAll('.analytic.count').forEach((data)=>{
                observer.observe(data);
            })
           
        }
       
        ObserveItems('observe');
        CountAnalytics();
    </script>
@endsection
