@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
    <style class="css">
        .balance-div{
            border:1px solid var(--primary);
           background:rgba(var(--rgt),0.05);
           position:relative;
           overflow:hidden;
             padding:20px !important;
             border-radius: 10px !important
        
        }
        .balance-div::before{
            content:'';
            top:0;
            left:0;
            height:80%;
            aspect-ratio:1;
            filter:blur(50px);
            background: var(--primary);
            border-radius:1000px;
            position: absolute;
        
        }
        .balance-div .content{
            position:relative;
            z-index:200;
            display:flex;
            flex-direction: column;
            gap:10px;
            width:100%;
          
        }
        .analytic{
         
            display:flex;
            flex-direction:row;
            align-items:center;
            gap:10px;
            justify-content: center;
            padding:10px;
            border:1px solid var(--primary);
            background:rgba(var(--rgt),0.05);
            border-radius:10px;
            padding:10px;

        }
        .balance-row{
         overflow:auto;
        }
        .balance-row .balance-div{
            width:80%;
            min-width:80%;
        }
        .balance-dots{
            width:100%;
            display:flex;
            flex-direction:row;
            align-items:center;
            justify-content:center;
            gap:10px;
        }
        .balance-dot{
            width:10px;
            height:10px;
            flex-shrink: 0;
            min-height:10px;
            min-width:10px;
            background:rgb(var(--rgt),0.6);
            border-radius:50%;
        }
        .balance-dot.active{
            background:var(--primary);
            transform:scale(1.2);
        }
        .wallet-column span.hide{
            display:none;
        }

        .wallet-column .star{
            display:flex;
        }
        .wallet-column .balance{
            display:none;
        }
        .wallet-column.active span.hide{
            display:flex;
        }
         .wallet-column.active span.view{
            display:none;
        }
        .wallet-column.active .balance{
            display:flex !important;
        }
        .wallet-column.active .star{
            display:none !important;
        }
        .claim-btn.disabled{
            pointer-events:none;
            filter:grayscale(50%);
        }
        .claim-section .claim-btn{
            display:none;
        }
        .claim-section.active .claim-btn{
            display:flex;
        }
        .claim-section.active .countdown{
            opacity:0;
            pointer-events: none;
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
            animation:animate-up 1s linear forwards;
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
 @isset($social->notification)
      <section class="populate active">
<div class="child">
<span style="font-size:3rem">✨🎁✨</span>
{{-- <strong style="font-size:1.5rem;text-align:center;text-shadow:0 0 10px var(--primary);" class="c-primary">Gift Card Received</strong> --}}
<strong style="font-size:1.4rem;text-align:center;text-shadow:0 0 10px var(--primary);" class="c-primary">Welcome Back</strong>
<span style="display:block;width:100%;color:var(--primary-light);text-align:center;opacity:0.7;border-bottom:1px dashed var(--primary-05);padding-bottom:10px;">{!! nl2br($social->notification ?? '') !!}</span>
<span class="text-center" style="color:var(--primary-05)">💜 Earn while you Learn</span>
<div onclick="this.closest('.populate').classList.toggle('active');" class="w-full br-1000 row align-center justify-center g-10 h-40 bg-primary p-x-20 primary-text no-select pointer">
    Understood
</div>
</div>
</section>
 @endisset

     <section class="w-full p-20 g-10 column">
        {{-- WELCOME --}}
        <div class="row w-full g-10">
            <div class="w-fit no-shrink h-fit primary-text no-select perfect-square p-10 br-10 column align-center justify-center bg-primary">
                {{ strtoupper(substr(Auth::guard('users')->user()->name,0,2)) }}
            </div>
            <div class="column g-5">
                <span class="opacity-05">Welcome back</span>
                <span class="font-1">{{ ucfirst(Auth::guard('users')->user()->username) }}</span>
                <small class="p-2 w-fit br-1000 p-x-5" style="border:1px solid rgba(var(--rgt),0.1);background:rgba(var(--rgt),0.05)">{{ Auth::guard('users')->user()->name }}</small>
            </div>
        </div>
        {{-- NAV LINKS --}}
        <div class="row w-full quick-navs g-10 align-center">
            {{-- NEW --}}
            <div onclick="spa(event,'{{ url('users/skill/aquisition') }}')" style="border:1px solid rgba(var(--rgt),0.08);background:rgba(var(--rgt),0.03)" class="w-70 quick-nav perfect-square column align-center text-center g-2 justify-center br-5">
               <span class="opacity-06">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M249.8,85.49l-116-64a12,12,0,0,0-11.6,0l-116,64a12,12,0,0,0,0,21l21.8,12v47.76a19.89,19.89,0,0,0,5.09,13.32C46.63,194.7,77,220,128,220a136.88,136.88,0,0,0,40-5.75V240a12,12,0,0,0,24,0V204.12a119.53,119.53,0,0,0,30.91-24.51A19.89,19.89,0,0,0,228,166.29V118.53l21.8-12a12,12,0,0,0,0-21ZM128,45.71,219.16,96,186,114.3a1.88,1.88,0,0,1-.18-.12l-52-28.69a12,12,0,0,0-11.6,21l39,21.49L128,146.3,36.84,96ZM128,196c-40.42,0-64.65-19.07-76-31.27v-33l70.2,38.74a12,12,0,0,0,11.6,0L168,151.64v37.23A110.46,110.46,0,0,1,128,196Zm76-31.27a93.21,93.21,0,0,1-12,10.81V138.39l12-6.62Z"></path></svg>

               </span>
                <small class="opacity-06">Neo Skill</small>
            </div>
            {{-- NEW --}}
             <div onclick="window.location.href='{{ url('users/neo/game') }}'" style="border:1px solid rgba(var(--rgt),0.08);background:rgba(var(--rgt),0.03)" class="w-70 quick-nav perfect-square column align-center text-center g-2 justify-center br-5">
               <span class="opacity-06">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M176,116H152a12,12,0,0,1,0-24h24a12,12,0,0,1,0,24ZM104,92h-4V88a12,12,0,0,0-24,0v4H72a12,12,0,0,0,0,24h4v4a12,12,0,0,0,24,0v-4h4a12,12,0,0,0,0-24ZM244.76,202.94a40,40,0,0,1-61,5.35,7,7,0,0,1-.53-.56L144.67,164H111.33L72.81,207.73c-.17.19-.35.38-.53.56A40,40,0,0,1,4.62,173.05a1.18,1.18,0,0,1,0-.2L21,88.79A63.88,63.88,0,0,1,83.88,36H172a64.08,64.08,0,0,1,62.93,52.48,1.8,1.8,0,0,1,0,.19l16.36,84.17a1.77,1.77,0,0,1,0,.2A39.74,39.74,0,0,1,244.76,202.94ZM172,140a40,40,0,0,0,0-80H83.89A39.9,39.9,0,0,0,44.62,93.06a1.55,1.55,0,0,0,0,.21l-16.34,84a16,16,0,0,0,13,18.44,16.07,16.07,0,0,0,13.86-4.21L96.9,144.07a12,12,0,0,1,9-4.07Zm55.76,37.31-7-35.95a63.84,63.84,0,0,1-44.27,22.46l24.41,27.72a16,16,0,0,0,26.85-14.23Z"></path></svg>

               </span>
                <small class="opacity-06">Neo Game</small>
            </div>
             {{-- NEW --}}
             <div onclick="spa(event,'{{ url('users/neo/chat') }}')" style="border:1px solid rgba(var(--rgt),0.08);background:rgba(var(--rgt),0.03)" class="w-70 quick-nav perfect-square column align-center text-center g-2 justify-center br-5">
               <span class="opacity-06">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M152,144a16,16,0,1,1-16-16A16,16,0,0,1,152,144Zm32-16a16,16,0,1,0,16,16A16,16,0,0,0,184,128Zm59.18,82.35a20,20,0,0,1-24.83,24.83l-23.26-6.84A84,84,0,0,1,83.72,187.11a83.2,83.2,0,0,1-22.82-6.77l-23.25,6.84A20.24,20.24,0,0,1,32,188a20,20,0,0,1-19.19-25.64l6.84-23.26A84,84,0,0,1,172.33,68.91a84,84,0,0,1,64,118.18ZM76.46,160.75A83.94,83.94,0,0,1,145,69.37,60,60,0,0,0,43.08,132.3a12,12,0,0,1,.93,9.06l-6.09,20.72L58.64,156a12,12,0,0,1,9.06.93A60.08,60.08,0,0,0,76.46,160.75ZM220,152a60,60,0,1,0-31.7,52.92,12,12,0,0,1,9.06-.93l20.72,6.09L212,189.36a12,12,0,0,1,.93-9.06A60.09,60.09,0,0,0,220,152Z"></path></svg>

               </span>
                <small class="opacity-06">Neo Chat</small>
            </div> {{-- NEW --}}
             <div onclick="spa(event,'{{ url('users/neo/translate') }}')" style="border:1px solid rgba(var(--rgt),0.08);background:rgba(var(--rgt),0.03)" class="w-70 quick-nav perfect-square column align-center text-center g-2 justify-center br-5">
               <span class="opacity-06">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M250.73,210.63l-56-112a12,12,0,0,0-21.46,0l-20.52,41A84.2,84.2,0,0,1,114,126.22,107.48,107.48,0,0,0,139.33,68H160a12,12,0,0,0,0-24H108V32a12,12,0,0,0-24,0V44H32a12,12,0,0,0,0,24h83.13A83.69,83.69,0,0,1,96,110.35,84,84,0,0,1,83.6,91a12,12,0,1,0-21.81,10A107.55,107.55,0,0,0,78,126.24,83.54,83.54,0,0,1,32,140a12,12,0,0,0,0,24,107.47,107.47,0,0,0,64-21.07,108.4,108.4,0,0,0,45.39,19.44l-24.13,48.26a12,12,0,1,0,21.46,10.73L151.41,196h65.17l12.68,25.36a12,12,0,1,0,21.47-10.73ZM163.41,172,184,130.83,204.58,172Z"></path></svg>

               </span>
                <small class="opacity-06">Neo Translate</small>
            </div> {{-- NEW --}}
             <div onclick="spa(event,'{{ url('users/neo/stream') }}')" style="border:1px solid rgba(var(--rgt),0.08);background:rgba(var(--rgt),0.03)" class="w-70 quick-nav perfect-square column align-center text-center g-2 justify-center br-5">
               <span class="opacity-06">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M215.38,14.54a12,12,0,0,0-10.29-2.18l-128,32A12,12,0,0,0,68,56V159.35A40,40,0,1,0,92,196V113.37l104-26v40A40,40,0,1,0,220,164V24A12,12,0,0,0,215.38,14.54ZM52,212a16,16,0,1,1,16-16A16,16,0,0,1,52,212ZM92,88.63V65.37l104-26V62.63ZM180,180a16,16,0,1,1,16-16A16,16,0,0,1,180,180Z"></path></svg>

               </span>
                <small class="opacity-06">Neo Stream</small>
            </div>
        </div>
        {{-- NOTIFICATION --}}
        {{-- <div style="background:var(--primary-transparent);border:1px solid var(--primary)" class="w-full br-10 row g-10 p-10">
            <div class="w-40 no-shrink h-40 bg-primary-transparent column br-10 align-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M225.29,165.93C216.61,151,212,129.57,212,104a84,84,0,0,0-168,0c0,25.58-4.59,47-13.27,61.93A20.08,20.08,0,0,0,30.66,186,19.77,19.77,0,0,0,48,196H84.18a44,44,0,0,0,87.64,0H208a19.77,19.77,0,0,0,17.31-10A20.08,20.08,0,0,0,225.29,165.93ZM128,212a20,20,0,0,1-19.6-16h39.2A20,20,0,0,1,128,212ZM54.66,172C63.51,154,68,131.14,68,104a60,60,0,0,1,120,0c0,27.13,4.48,50,13.33,68Z"></path></svg>
                
            </div>
            <span>This is a mock/test notification.</span>
        </div> --}}
        {{-- balance divs --}}
         {{-- Profit split/affiliate wallet --}}
        <div class="w-full balance-div column g-10 p-10 br-10">
         <div class="content">
             <div class="w-full row g-10 space-between">
            <div class="column wallet-column active actifve g-10">
                  <div class="row align-center g-5">
                <span class="opacity-06">Profit Split Wallet</span>
                  <div>
            <span onclick="this.closest('.wallet-column').classList.remove('active')" class="opacity-07 wallet-toggle hide">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M56.88,31.93A12,12,0,1,0,39.12,48.07l16,17.65C20.67,88.66,5.72,121.58,5,123.13a12.08,12.08,0,0,0,0,9.75c.37.82,9.13,20.26,28.49,39.61C59.37,198.34,92,212,128,212a131.34,131.34,0,0,0,51-10l20.09,22.1a12,12,0,0,0,17.76-16.14ZM128,188c-29.59,0-55.47-10.73-76.91-31.88A130.69,130.69,0,0,1,29.52,128c5.27-9.31,18.79-29.9,42-44.29l90.09,99.11A109.33,109.33,0,0,1,128,188Zm123-55.12c-.36.81-9,20-28,39.16a12,12,0,1,1-17-16.9A130.48,130.48,0,0,0,226.48,128a130.36,130.36,0,0,0-21.57-28.12C183.46,78.73,157.59,68,128,68c-3.35,0-6.7.14-10,.42a12,12,0,1,1-2-23.91c3.93-.34,8-.51,12-.51,36,0,68.63,13.67,94.49,39.52,19.35,19.35,28.11,38.8,28.48,39.61A12.08,12.08,0,0,1,251,132.88Z"></path></svg>

            </span>
            <span onclick="this.closest('.wallet-column').classList.add('active')" class="opacity-07 wallet-toggle view">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M251,123.13c-.37-.81-9.13-20.26-28.48-39.61C196.63,57.67,164,44,128,44S59.37,57.67,33.51,83.52C14.16,102.87,5.4,122.32,5,123.13a12.08,12.08,0,0,0,0,9.75c.37.82,9.13,20.26,28.49,39.61C59.37,198.34,92,212,128,212s68.63-13.66,94.48-39.51c19.36-19.35,28.12-38.79,28.49-39.61A12.08,12.08,0,0,0,251,123.13Zm-46.06,33C183.47,177.27,157.59,188,128,188s-55.47-10.73-76.91-31.88A130.36,130.36,0,0,1,29.52,128,130.45,130.45,0,0,1,51.09,99.89C72.54,78.73,98.41,68,128,68s55.46,10.73,76.91,31.89A130.36,130.36,0,0,1,226.48,128,130.45,130.45,0,0,1,204.91,156.12ZM128,84a44,44,0,1,0,44,44A44.05,44.05,0,0,0,128,84Zm0,64a20,20,0,1,1,20-20A20,20,0,0,1,128,148Z"></path></svg>
              
            </span>
          </div>
          </div>
             
                 <strong class="balance" style="font-size:2rem;">&#8358;{{ number_format(Auth::guard('users')->user()->affiliate_balance,2) }}</strong>
               <strong class="star" style="font-size:2rem;">****</strong>
               

          <div class="row font-1 opacity-07 align-center g-2">
             <span class="h-fit column">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M225.24,150.73a12,12,0,0,1-1.58,16.9C205.49,182.7,189.06,188,174.15,188c-19.76,0-36.86-9.29-51.88-17.44-25.06-13.62-44.86-24.37-74.61.3a12,12,0,1,1-15.32-18.48c42.25-35,75-17.23,101.39-2.92,25.06,13.61,44.86,24.37,74.61-.31A12,12,0,0,1,225.24,150.73ZM47.66,106.85c29.75-24.68,49.55-13.92,74.61-.31,15,8.16,32.12,17.45,51.88,17.45,14.91,0,31.34-5.3,49.51-20.37a12,12,0,0,0-15.32-18.48c-29.75,24.67-49.55,13.92-74.61.3-26.35-14.3-59.14-32.11-101.39,2.93a12,12,0,0,0,15.32,18.48Z"></path></svg>
            
           </span>
                <span class="balance">${{ number_format(ToDollars(Auth::guard('users')->user()->affiliate_balance),2) }}</span>
           <span class="star">****</span>
         
            </div>
            </div>
            <div class="bg-primary-transparent wallet-icon p-10 h-50 column align-center justify-center w-50 br-10 c-primary no-shrink">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M93.82,116.64A12,12,0,0,0,100,106.15V40.74A12,12,0,0,0,83,29.83,108.26,108.26,0,0,0,20,128c0,3.37.16,6.76.47,10.1a12,12,0,0,0,17.76,9.38ZM76,62.06v37L44.81,116.36A84.39,84.39,0,0,1,76,62.06ZM128,20a12,12,0,0,0-12,12v89.53L39.18,166.27a12,12,0,0,0-4.3,16.46A108,108,0,1,0,128,20Zm0,192a84.47,84.47,0,0,1-65.57-31.5L134,138.79a12,12,0,0,0,6-10.37V44.85A84,84,0,0,1,128,212Z"></path></svg>

            </div>
          </div>
          <span class="c-primary">Your earnings from downlines and referrals</span>
         {{-- NEW ROW --}}
         <div class="row w-full align-center g-10">
             <div onclick="spa(event,'{{ url('users/withdraw') }}')" class="bg-primary withdraw-btn p-10 w-fit h-40 row align-center justify-center no-select br-5">
            Withdraw
          </div>
           <div onclick="spa(event,'{{ url('users/transactions') }}')" class="bg-transaperent trx-btn border-1 border-color-primary c-primary p-10 w-fit h-40 row align-center justify-center no-select br-5">
            Transactions
          </div>

         </div>
         </div>
        </div>
        {{-- new balance row --}}
        <div class="w-full balance-row row align-center g-10">
            {{-- game wallet --}}
             <div data-dot='game-wallet-dot' class="w-full balance-div column g-10 p-10 br-10">
         <div class="content">
             <div class="w-full row g-10 space-between">
            <div class="column g-10">
                <span class="opacity-06">Game Wallet</span>
                <strong style="font-size:1.5rem;">&#8358;{{ number_format(Auth::guard('users')->user()->gaming_balance,2) }}</strong>
              <div class="row font-1 opacity-07 align-center g-2">
             <span class="h-fit column">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M225.24,150.73a12,12,0,0,1-1.58,16.9C205.49,182.7,189.06,188,174.15,188c-19.76,0-36.86-9.29-51.88-17.44-25.06-13.62-44.86-24.37-74.61.3a12,12,0,1,1-15.32-18.48c42.25-35,75-17.23,101.39-2.92,25.06,13.61,44.86,24.37,74.61-.31A12,12,0,0,1,225.24,150.73ZM47.66,106.85c29.75-24.68,49.55-13.92,74.61-.31,15,8.16,32.12,17.45,51.88,17.45,14.91,0,31.34-5.3,49.51-20.37a12,12,0,0,0-15.32-18.48c-29.75,24.67-49.55,13.92-74.61.3-26.35-14.3-59.14-32.11-101.39,2.93a12,12,0,0,0,15.32,18.48Z"></path></svg>
            
           </span>
                <span>${{ number_format(ToDollars(Auth::guard('users')->user()->gaming_balance),2) }}</span>
          </div>
            </div>
            <div class="bg-primary-transparent p-10 h-40 column align-center justify-center w-40 br-10 c-primary no-shrink">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M176,116H152a12,12,0,0,1,0-24h24a12,12,0,0,1,0,24ZM104,92h-4V88a12,12,0,0,0-24,0v4H72a12,12,0,0,0,0,24h4v4a12,12,0,0,0,24,0v-4h4a12,12,0,0,0,0-24ZM244.76,202.94a40,40,0,0,1-61,5.35,7,7,0,0,1-.53-.56L144.67,164H111.33L72.81,207.73c-.17.19-.35.38-.53.56A40,40,0,0,1,4.62,173.05a1.18,1.18,0,0,1,0-.2L21,88.79A63.88,63.88,0,0,1,83.88,36H172a64.08,64.08,0,0,1,62.93,52.48,1.8,1.8,0,0,1,0,.19l16.36,84.17a1.77,1.77,0,0,1,0,.2A39.74,39.74,0,0,1,244.76,202.94ZM172,140a40,40,0,0,0,0-80H83.89A39.9,39.9,0,0,0,44.62,93.06a1.55,1.55,0,0,0,0,.21l-16.34,84a16,16,0,0,0,13,18.44,16.07,16.07,0,0,0,13.86-4.21L96.9,144.07a12,12,0,0,1,9-4.07Zm55.76,37.31-7-35.95a63.84,63.84,0,0,1-44.27,22.46l24.41,27.72a16,16,0,0,0,26.85-14.23Z"></path></svg>

            </div>
          </div>
          <span class="c-primary">Your earnings from gaming</span>
       
         </div>
        </div>
        {{-- COIN WALLET/ACTIVITIES WALLET --}}
             <div data-dot='coin-wallet-dot' class="w-full balance-div column g-10 p-10 br-10">
         <div class="content">
             <div class="w-full row g-10 space
             Coin Wallet
             ₦530.00
             $0.53
             Your earnings from daily platform activities
             GiftCard Wallet
             $0.10
             Your gift card wallet balance
             Daily Claim Wallet
             ₦0.00
             Your earnnigs from daily 30 minutes cl-between">
            <div class="column g-10">
                <span class="opacity-06">Coin Wallet</span>
                <strong style="font-size:1.5rem;">&#8358;{{ number_format(Auth::guard('users')->user()->activities_balance,2) }}</strong>
              <div class="row font-1 opacity-07 align-center g-2">
             <span class="h-fit column">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M225.24,150.73a12,12,0,0,1-1.58,16.9C205.49,182.7,189.06,188,174.15,188c-19.76,0-36.86-9.29-51.88-17.44-25.06-13.62-44.86-24.37-74.61.3a12,12,0,1,1-15.32-18.48c42.25-35,75-17.23,101.39-2.92,25.06,13.61,44.86,24.37,74.61-.31A12,12,0,0,1,225.24,150.73ZM47.66,106.85c29.75-24.68,49.55-13.92,74.61-.31,15,8.16,32.12,17.45,51.88,17.45,14.91,0,31.34-5.3,49.51-20.37a12,12,0,0,0-15.32-18.48c-29.75,24.67-49.55,13.92-74.61.3-26.35-14.3-59.14-32.11-101.39,2.93a12,12,0,0,0,15.32,18.48Z"></path></svg>
            
           </span>
                <span>${{ number_format(ToDollars(Auth::guard('users')->user()->activities_balance),2) }}</span>
          </div>
            </div>
            <div class="bg-primary-transparent p-10 h-40 column align-center justify-center w-40 br-10 c-primary no-shrink">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,20a12,12,0,0,0-12,12V88a12,12,0,0,0,12,12,28,28,0,1,1-24.26,14A12,12,0,0,0,99.35,97.6l-48.5-28A12,12,0,0,0,34.46,74,108,108,0,1,0,128,20ZM50,96.81l28.2,16.28A52.08,52.08,0,0,0,76,128c0,.5,0,1,0,1.5l-31.43,8.42A83.21,83.21,0,0,1,44,128,84.35,84.35,0,0,1,50,96.81Zm.83,64.3,31.43-8.43A52.2,52.2,0,0,0,116,178.59v32.54A84.26,84.26,0,0,1,50.81,161.11Zm89.19,50V178.59A52,52,0,0,0,140,77.4V44.85a84,84,0,0,1,0,166.28Z"></path></svg>

            </div>
          </div>
          <span class="c-primary">Your earnings from daily platform activities</span>
       
         </div>
        </div>
          {{-- GIFT CARD WALLET --}}
             <div data-dot='gift-card-wallet-dot' class="w-half balance-div column g-10 p-10 br-10">
         <div class="content">
             <div class="w-full row g-10 space-between">
            <div class="column g-10">
                <span class="opacity-06">GiftCard Wallet</span>
                <strong style="font-size:1.5rem;">{{ $giftcard_balance }}</strong>
            </div>
            <div class="bg-primary-transparent p-10 h-40 column align-center justify-center w-40 br-10 c-primary no-shrink">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,72H180.92c.39-.33.79-.65,1.17-1A29.53,29.53,0,0,0,192,49.57,32.62,32.62,0,0,0,158.44,16,29.53,29.53,0,0,0,137,25.91a54.94,54.94,0,0,0-9,14.48,54.94,54.94,0,0,0-9-14.48A29.53,29.53,0,0,0,97.56,16,32.62,32.62,0,0,0,64,49.57,29.53,29.53,0,0,0,73.91,71c.38.33.78.65,1.17,1H40A16,16,0,0,0,24,88v32a16,16,0,0,0,16,16v64a16,16,0,0,0,16,16h60a4,4,0,0,0,4-4V120H40V88h80v32h16V88h80v32H136v92a4,4,0,0,0,4,4h60a16,16,0,0,0,16-16V136a16,16,0,0,0,16-16V88A16,16,0,0,0,216,72ZM84.51,59a13.69,13.69,0,0,1-4.5-10A16.62,16.62,0,0,1,96.59,32h.49a13.69,13.69,0,0,1,10,4.5c8.39,9.48,11.35,25.2,12.39,34.92C109.71,70.39,94,67.43,84.51,59Zm87,0c-9.49,8.4-25.24,11.36-35,12.4C137.7,60.89,141,45.5,149,36.51a13.69,13.69,0,0,1,10-4.5h.49A16.62,16.62,0,0,1,176,49.08,13.69,13.69,0,0,1,171.49,59Z"></path></svg>

            </div>
          </div>
          <span class="c-primary">Your gift card wallet balance</span>
       
         </div>
        </div>
        {{-- daily claim wallet --}}
         <div data-dot='daily-claim-wallet-dot' class="w-half balance-div column g-10 p-10 br-10">
         <div class="content">
             <div class="w-full row g-10 space-between">
            <div class="column g-10">
                <span class="opacity-06">Daily Claim Wallet</span>
                <strong style="font-size:1.5rem;" class="dailyclaim_balance">{{ number_format(Auth::guard('users')->user()->dailyclaim_balance) }} Coins</strong>
            </div>
            <div class="bg-primary-transparent p-10 h-40 column align-center justify-center w-40 br-10 c-primary no-shrink">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
               
            </div>
          </div>
          <span class="c-primary">Your earnnigs from daily 30 minutes claim</span>
       
         </div>
        </div>
        
        </div>
  <div class="balance-dots">
    <div class="balance-dot game-wallet-dot active"></div>
    <div class="balance-dot coin-wallet-dot"></div>
    <div class="balance-dot gift-card-wallet-dot"></div>
    <div class="balance-dot daily-claim-wallet-dot"></div>
  </div>

        {{-- Analytics --}}
        <div class="row w-full analytics g-10 align-center">
        <div class="analytic">
            <div style="background:rgba(var(--rgt),0.1)" class="w-30 h-30 no-shrink br-10 column align-center justify-center">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.25C6.37665 1.25 4.25 3.37665 4.25 6C4.25 8.62335 6.37665 10.75 9 10.75C11.6234 10.75 13.75 8.62335 13.75 6C13.75 3.37665 11.6234 1.25 9 1.25ZM5.75 6C5.75 4.20507 7.20507 2.75 9 2.75C10.7949 2.75 12.25 4.20507 12.25 6C12.25 7.79493 10.7949 9.25 9 9.25C7.20507 9.25 5.75 7.79493 5.75 6Z" fill="CurrentColor"></path>
<path d="M15 2.25C14.5858 2.25 14.25 2.58579 14.25 3C14.25 3.41421 14.5858 3.75 15 3.75C16.2426 3.75 17.25 4.75736 17.25 6C17.25 7.24264 16.2426 8.25 15 8.25C14.5858 8.25 14.25 8.58579 14.25 9C14.25 9.41421 14.5858 9.75 15 9.75C17.0711 9.75 18.75 8.07107 18.75 6C18.75 3.92893 17.0711 2.25 15 2.25Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M3.67815 13.5204C5.07752 12.7208 6.96067 12.25 9 12.25C11.0393 12.25 12.9225 12.7208 14.3219 13.5204C15.7 14.3079 16.75 15.5101 16.75 17C16.75 18.4899 15.7 19.6921 14.3219 20.4796C12.9225 21.2792 11.0393 21.75 9 21.75C6.96067 21.75 5.07752 21.2792 3.67815 20.4796C2.3 19.6921 1.25 18.4899 1.25 17C1.25 15.5101 2.3 14.3079 3.67815 13.5204ZM4.42236 14.8228C3.26701 15.483 2.75 16.2807 2.75 17C2.75 17.7193 3.26701 18.517 4.42236 19.1772C5.55649 19.8253 7.17334 20.25 9 20.25C10.8267 20.25 12.4435 19.8253 13.5776 19.1772C14.733 18.517 15.25 17.7193 15.25 17C15.25 16.2807 14.733 15.483 13.5776 14.8228C12.4435 14.1747 10.8267 13.75 9 13.75C7.17334 13.75 5.55649 14.1747 4.42236 14.8228Z" fill="CurrentColor"></path>
<path d="M18.1607 13.2674C17.7561 13.1787 17.3561 13.4347 17.2674 13.8393C17.1787 14.2439 17.4347 14.6439 17.8393 14.7326C18.6317 14.9064 19.2649 15.2048 19.6829 15.5468C20.1014 15.8892 20.25 16.2237 20.25 16.5C20.25 16.7507 20.1294 17.045 19.7969 17.3539C19.462 17.665 18.9475 17.9524 18.2838 18.1523C17.8871 18.2717 17.6624 18.69 17.7818 19.0867C17.9013 19.4833 18.3196 19.708 18.7162 19.5886C19.5388 19.3409 20.2743 18.9578 20.8178 18.4529C21.3637 17.9457 21.75 17.2786 21.75 16.5C21.75 15.6352 21.2758 14.912 20.6328 14.3859C19.9893 13.8593 19.1225 13.4783 18.1607 13.2674Z" fill="CurrentColor"></path>
</svg>

            </div>
           <div class="column g-5">
             <strong class="desc">{{ number_format($team_members) }}</strong>
           
                <span>Team Members</span>
        
           </div>
        </div>
          <div class="analytic">
            <div style="background:rgba(var(--rgt),0.1)" class="w-30 h-30 no-shrink br-10 column align-center justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.07881 5.06891C8.87414 1.27893 15.0438 1.31923 18.8623 5.13778C22.6825 8.95797 22.7212 15.1313 18.9263 18.9262C15.1314 22.7211 8.95805 22.6824 5.13786 18.8622C2.87401 16.5984 1.93916 13.5099 2.34059 10.5812C2.39684 10.1708 2.77512 9.88377 3.18549 9.94002C3.59587 9.99627 3.88295 10.3745 3.8267 10.7849C3.48672 13.2652 4.27794 15.881 6.19852 17.8016C9.443 21.0461 14.6665 21.0646 17.8656 17.8655C21.0647 14.6664 21.0461 9.44292 17.8017 6.19844C14.5588 2.95561 9.33901 2.93539 6.13947 6.12957L6.88717 6.13333C7.30138 6.13541 7.63547 6.47288 7.63339 6.88709C7.63131 7.3013 7.29384 7.63539 6.87963 7.63331L4.33408 7.62052C3.92281 7.61845 3.58993 7.28556 3.58786 6.8743L3.57507 4.32874C3.57299 3.91454 3.90708 3.57707 4.32129 3.57498C4.7355 3.5729 5.07297 3.907 5.07505 4.32121L5.07881 5.06891ZM12 7.24992C12.4142 7.24992 12.75 7.58571 12.75 7.99992V11.6893L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0302C14.7374 15.3231 14.2626 15.3231 13.9697 15.0302L11.25 12.3106V7.99992C11.25 7.58571 11.5858 7.24992 12 7.24992Z" fill="CurrentColor"></path>
</svg>


            </div>
           <div class="column g-5">
             <strong class="desc">{{ number_format($total_transactions) }}</strong>
           
                <span>Total Transactions</span>
        
           </div>
        </div>
           <div class="analytic">
            <div style="background:rgba(var(--rgt),0.1)" class="w-30 h-30 no-shrink br-10 column align-center justify-center">
             <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C9.37665 1.25 7.25 3.37665 7.25 6C7.25 8.62335 9.37665 10.75 12 10.75C14.6234 10.75 16.75 8.62335 16.75 6C16.75 3.37665 14.6234 1.25 12 1.25ZM8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6C15.25 7.79493 13.7949 9.25 12 9.25C10.2051 9.25 8.75 7.79493 8.75 6Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.25C9.96067 12.25 8.07752 12.7208 6.67815 13.5204C5.3 14.3079 4.25 15.5101 4.25 17C4.25 18.4899 5.3 19.6921 6.67815 20.4796C8.07752 21.2792 9.96067 21.75 12 21.75C14.0393 21.75 15.9225 21.2792 17.3219 20.4796C18.7 19.6921 19.75 18.4899 19.75 17C19.75 15.5101 18.7 14.3079 17.3219 13.5204C15.9225 12.7208 14.0393 12.25 12 12.25ZM5.75 17C5.75 16.2807 6.26701 15.483 7.42236 14.8228C8.55649 14.1747 10.1733 13.75 12 13.75C13.8267 13.75 15.4435 14.1747 16.5776 14.8228C17.733 15.483 18.25 16.2807 18.25 17C18.25 17.7193 17.733 18.517 16.5776 19.1772C15.4435 19.8253 13.8267 20.25 12 20.25C10.1733 20.25 8.55649 19.8253 7.42236 19.1772C6.26701 18.517 5.75 17.7193 5.75 17Z" fill="CurrentColor"></path>
</svg>



            </div>
           <div class="column g-5">
             <strong class="font-1" style="color:greenyellow">Active</strong>
           
                <span>Account Status</span>
        
           </div>
        </div>
        </div>
        
        <div style="border:1px solid var(--primary)" class="w-full {{ $minutes <= 0 ? 'active' : '' }} claim-section max-w-500 br-10 column g-10 p-20">
            <div class="row align-center g-5">
                <span style="font-size:2rem;">🎁</span>
                <div class="column g-2">
                    <strong class="font-1">30-Minutes Claim</strong>
                    <div style="background:rgb(var(--rgt),0.1)" class="p-5 w-fit p-x-10 h-fit br-1000 row align-center g-5"><small>🔥Every 30 Minutes</small></div>

                </div>
            </div>
            <div style="background:var(--primary-01);border:1px solid var(--primary-02)" class="w-full p-x-20 p-10 br-1000 row align-center space-between g-10">
                <span>⌛NEXT IN</span>
                <strong class="font-1 countdown">00:00</strong>
                <span>✅Ready</span>
            </div>
            <div style="background:rgba(var(--rgt),0.1);" class="w-full p-x-20 p-10 br-1000 row justify-center align-center g-10">
             <span>🏆Reward</span>
                <strong class="font-1">+5 coins</strong>
            </div>
            <div onclick="MyFunc.LoginClaim(this,'{{ url('users/get/login/claim') }}')" class="w-full claim-btn br-1000 p-10 p-x-20 no-select row align-center justify-center bg-primary primary-text pointer">
                ✨Claim Now✨
            </div>
            <small style="color:var(--primary-05);text-align:center;">⚡Claim every 30 minutes &bull; resets every 30 minutes &bull; streak bonus griws</small>
        </div>

        {{-- referral link --}}
        <div style="border:1px solid var(--primary);background:rgba(var(--rgt),0.05)" class="w-full align-center br-10 p-10 g-10 column">
            
                <span class="font-1">Your Affiliate Link</span>
           
            <div class="column align-center w-full g-10">
              
                <div style="border:1px solid rgba(var(--rgt),0.1);font-family:monospace;" class="h-50 space-between bg ws-nowrap w-full br-10 align-center row p-10">
                    <span style="max-width:calc(100% - 40px);" class="ws-nowrap overflow-hidden flex flex-auto">{{ url('register?ref='.Auth::guard('users')->user()->username.'') }}</span>
                <div onclick="copy('{{ url('register?ref='.Auth::guard('users')->user()->username.'') }}')" class="h-full bg-inherit perfect-square c-primary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M200,32H163.74a47.92,47.92,0,0,0-71.48,0H56A16,16,0,0,0,40,48V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V48A16,16,0,0,0,200,32Zm-72,0a32,32,0,0,1,32,32H96A32,32,0,0,1,128,32Z"></path></svg>

                </div>
                </div>
                <div onclick="copy('{{ url('register?ref='.Auth::guard('users')->user()->username.'') }}')" class="w-full h-40 br-10 row align-center justify-center p-10 bg-primary primary-text">
                Copy Link
                </div>
            </div>
        </div>
        
        
          {{-- group links --}}
        <div style="border:1px solid rgba(var(--rgt),0.1);background:rgba(var(--rgt),0.05)" class="w-full align-center no-select br-10 p-10 g-10 column">
            
                <span class="font-1">Our official group links 👇</span>
                <span class="opacity-05 text-center">Click the buttons below to join our communities and socialize with other users.</span>
           
            <div class="row space-between align-center w-full g-10">
              
               
                <div onclick="window.open('{{ $social->whatsapp }}')" style="background:#4caf50;color:white;" class="w-half h-40 pointer br-5 row align-center justify-center p-10">
                Whatsapp Group
                </div>
                <div onclick="window.open('{{ $social->telegram }}')" style="background:rgb(2, 134, 134);color:white;" class="w-half pointer h-40 br-5 row align-center justify-center p-10">
              Telegram Group
                </div>
            </div>
        </div>
     </section>
 @endsection
@section('js')
   <script class="js">
    window.MyFunc = {
        Style : function(){
        let balance_row=document.querySelector('.balance-row');
        balance_row.addEventListener('scroll',function(){
           let balance_divs=balance_row.querySelectorAll('.balance-div');
           balance_divs.forEach((data)=>{
            if(data.getBoundingClientRect().left >= balance_row.getBoundingClientRect().left && data.getBoundingClientRect().right <= balance_row.getBoundingClientRect().right){
               document.querySelectorAll('.balance-dot').forEach((dots)=>{
                dots.classList.remove('active');
               });
            //    CreateNotify('success',data.innerText);
               document.querySelector('.balance-dot.' + data.dataset.dot).classList.add('active');
            }
           });
        });
            document.querySelectorAll('.balance-row').forEach((parent)=>{
               parent.querySelectorAll('.balance-div').forEach((child)=>{
                child.style.height=parent.getBoundingClientRect().height + 'px';
               })
            });
            //   alert((document.querySelector('.analytics').getBoundingClientRect.width) + 'px')
            document.querySelectorAll('.analytic').forEach((analytic)=>{
              analytic.style.height=(document.querySelector('.analytics').getBoundingClientRect().height) + 'px';
                analytic.style.width=(document.querySelector('.analytics').getBoundingClientRect().width / 3) + 'px'
            })
            document.querySelectorAll('main .quick-navs .quick-nav').forEach((nav)=>{
                let nav_height=(document.querySelector('main .quick-navs').getBoundingClientRect().width / document.querySelectorAll('main .quick-navs .quick-nav').length) + 'px';
                nav.style.width=nav_height;
            });

          

        },
        countdown : (mins,secs)=>{
          let minutes = mins;
let seconds = secs;

let timer = setInterval(() => {
    if (minutes === 0 && seconds === 0) {
        clearInterval(timer);
        document.querySelector('.claim-section').classList.add('active');
        document.querySelector('.countdown').innerHTML = '0:00';
        return;
    }
    
    if (seconds === 0) {
        minutes--;
        seconds = 59;
    } else {
        seconds--;
    }
    
    // Format with leading zero for seconds
    const formattedSeconds = seconds < 10 ? '0' + seconds : seconds;
    document.querySelector('.countdown').innerHTML = minutes + ':' + formattedSeconds;
}, 1000);
        },
        LoginClaim : async (element,url)=>{
            if(!element.dataset.text){
                element.dataset.text=element.innerHTML;
               
            }
             element.innerHTML='CLAIMING...';
                element.classList.add('disabled')
            let response=await fetch(url);
            if(response.ok){
                let data=await response.json();
                if(data.status == 'success'){
                document.querySelector('.dailyclaim_balance').innerHTML=data.balance + ' Coins';
                document.querySelector('.claim-section').classList.remove('active');
              
                if(timer){
                    clearInterval(timer);
                }
              spa(event,'{{ url()->current() }}')
                CreateNotify(data.status,data.message);
                }
                element.innerHTML=element.dataset.text;
                element.classList.remove('disabled');
            }

        }
    }
    MyFunc.Style()
    MyFunc.countdown({{ $minutes }},{{ $seconds }});
   </script>
@endsection