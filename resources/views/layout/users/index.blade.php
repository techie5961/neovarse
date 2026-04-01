<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png?v=1.1') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg?v=1.1') }}" />
<link rel="shortcut icon" href="{{ asset('favicon/favicon.ico?v=1.1') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png?v=1.1') }}" />
<link rel="manifest" href="{{ asset('favicon/site.webmanifest?v=1.1') }}" />
<link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.config('versions.vite_version').'') }}">
<link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}">
    <title>{{ config('app.name') }} | Users | @yield('title')</title>
    <style>
      :root{
        --primary-brighter:#cd9afd;
        --primary-bright:#ac57fc;
        --gradient:linear-gradient(to right,var(--primary-brighter),var(--primary-brighter));
        --gradient-text:white;
      
      }
      .nav-profile{
        background-color: var(--bg);
background-color: #cccccc;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 1200'%3E%3Cdefs%3E%3ClinearGradient id='a' x1='0' x2='0' y1='0' y2='100%25' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23f5f5f5'/%3E%3Cstop offset='0.02' stop-color='%23cccccc'/%3E%3Cstop offset='0.02' stop-color='%23c3c3c3'/%3E%3Cstop offset='0.032' stop-color='%23cccccc'/%3E%3Cstop offset='0.032' stop-color='%23bbbbbb'/%3E%3Cstop offset='0.056' stop-color='%23cccccc'/%3E%3Cstop offset='0.056' stop-color='%23c7c7c7'/%3E%3Cstop offset='0.07' stop-color='%23cccccc'/%3E%3Cstop offset='0.07' stop-color='%23a0a0a0'/%3E%3Cstop offset='0.1' stop-color='%23cccccc'/%3E%3Cstop offset='0.1' stop-color='%23e7e7e7'/%3E%3Cstop offset='0.126' stop-color='%23cccccc'/%3E%3Cstop offset='0.126' stop-color='%23bababa'/%3E%3Cstop offset='0.142' stop-color='%23cccccc'/%3E%3Cstop offset='0.142' stop-color='%23c8c8c8'/%3E%3Cstop offset='0.159' stop-color='%23cccccc'/%3E%3Cstop offset='0.159' stop-color='%23b0b0b0'/%3E%3Cstop offset='0.17' stop-color='%23cccccc'/%3E%3Cstop offset='0.17' stop-color='%23cdcdcd'/%3E%3Cstop offset='0.197' stop-color='%23cccccc'/%3E%3Cstop offset='0.197' stop-color='%23b5b5b5'/%3E%3Cstop offset='0.218' stop-color='%23cccccc'/%3E%3Cstop offset='0.218' stop-color='%23c7c7c7'/%3E%3Cstop offset='0.239' stop-color='%23cccccc'/%3E%3Cstop offset='0.239' stop-color='%23cecece'/%3E%3Cstop offset='0.254' stop-color='%23cccccc'/%3E%3Cstop offset='0.254' stop-color='%23cecece'/%3E%3Cstop offset='0.283' stop-color='%23cccccc'/%3E%3Cstop offset='0.283' stop-color='%23cccccc'/%3E%3Cstop offset='0.294' stop-color='%23cccccc'/%3E%3Cstop offset='0.294' stop-color='%23c9c9c9'/%3E%3Cstop offset='0.305' stop-color='%23cccccc'/%3E%3Cstop offset='0.305' stop-color='%234e4e4e'/%3E%3Cstop offset='0.332' stop-color='%23cccccc'/%3E%3Cstop offset='0.332' stop-color='%23909090'/%3E%3Cstop offset='0.346' stop-color='%23cccccc'/%3E%3Cstop offset='0.346' stop-color='%23c5c5c5'/%3E%3Cstop offset='0.362' stop-color='%23cccccc'/%3E%3Cstop offset='0.362' stop-color='%23979797'/%3E%3Cstop offset='0.381' stop-color='%23cccccc'/%3E%3Cstop offset='0.381' stop-color='%23c2c2c2'/%3E%3Cstop offset='0.415' stop-color='%23cccccc'/%3E%3Cstop offset='0.415' stop-color='%23a8a8a8'/%3E%3Cstop offset='0.428' stop-color='%23cccccc'/%3E%3Cstop offset='0.428' stop-color='%23525252'/%3E%3Cstop offset='0.442' stop-color='%23cccccc'/%3E%3Cstop offset='0.442' stop-color='%23c8c8c8'/%3E%3Cstop offset='0.456' stop-color='%23cccccc'/%3E%3Cstop offset='0.456' stop-color='%23a9a9a9'/%3E%3Cstop offset='0.498' stop-color='%23cccccc'/%3E%3Cstop offset='0.498' stop-color='%23dfdfdf'/%3E%3Cstop offset='0.511' stop-color='%23cccccc'/%3E%3Cstop offset='0.511' stop-color='%23cecece'/%3E%3Cstop offset='0.532' stop-color='%23cccccc'/%3E%3Cstop offset='0.532' stop-color='%23cecece'/%3E%3Cstop offset='0.541' stop-color='%23cccccc'/%3E%3Cstop offset='0.541' stop-color='%23bababa'/%3E%3Cstop offset='0.56' stop-color='%23cccccc'/%3E%3Cstop offset='0.56' stop-color='%23f0f0f0'/%3E%3Cstop offset='0.581' stop-color='%23cccccc'/%3E%3Cstop offset='0.581' stop-color='%23aaaaaa'/%3E%3Cstop offset='0.6' stop-color='%23cccccc'/%3E%3Cstop offset='0.6' stop-color='%23d7d7d7'/%3E%3Cstop offset='0.618' stop-color='%23cccccc'/%3E%3Cstop offset='0.618' stop-color='%23cacaca'/%3E%3Cstop offset='0.656' stop-color='%23cccccc'/%3E%3Cstop offset='0.656' stop-color='%23cccccc'/%3E%3Cstop offset='0.679' stop-color='%23cccccc'/%3E%3Cstop offset='0.679' stop-color='%23ababab'/%3E%3Cstop offset='0.689' stop-color='%23cccccc'/%3E%3Cstop offset='0.689' stop-color='%23d1d1d1'/%3E%3Cstop offset='0.720' stop-color='%23cccccc'/%3E%3Cstop offset='0.720' stop-color='%23bbbbbb'/%3E%3Cstop offset='0.734' stop-color='%23cccccc'/%3E%3Cstop offset='0.734' stop-color='%23cbcbcb'/%3E%3Cstop offset='0.748' stop-color='%23cccccc'/%3E%3Cstop offset='0.748' stop-color='%236b6b6b'/%3E%3Cstop offset='0.764' stop-color='%23cccccc'/%3E%3Cstop offset='0.764' stop-color='%23989898'/%3E%3Cstop offset='0.788' stop-color='%23cccccc'/%3E%3Cstop offset='0.788' stop-color='%23dcdcdc'/%3E%3Cstop offset='0.808' stop-color='%23cccccc'/%3E%3Cstop offset='0.808' stop-color='%238f8f8f'/%3E%3Cstop offset='0.831' stop-color='%23cccccc'/%3E%3Cstop offset='0.831' stop-color='%23cbcbcb'/%3E%3Cstop offset='0.856' stop-color='%23cccccc'/%3E%3Cstop offset='0.856' stop-color='%23dbdbdb'/%3E%3Cstop offset='0.872' stop-color='%23cccccc'/%3E%3Cstop offset='0.872' stop-color='%23c7c7c7'/%3E%3Cstop offset='0.894' stop-color='%23cccccc'/%3E%3Cstop offset='0.894' stop-color='%23c8c8c8'/%3E%3Cstop offset='0.914' stop-color='%23cccccc'/%3E%3Cstop offset='0.914' stop-color='%23c0c0c0'/%3E%3Cstop offset='0.942' stop-color='%23cccccc'/%3E%3Cstop offset='0.942' stop-color='%23cdcdcd'/%3E%3Cstop offset='0.957' stop-color='%23cccccc'/%3E%3Cstop offset='0.957' stop-color='%237f7f7f'/%3E%3Cstop offset='0.973' stop-color='%23cccccc'/%3E%3Cstop offset='0.973' stop-color='%23cdcdcd'/%3E%3Cstop offset='1' stop-color='%23cccccc'/%3E%3Cstop offset='1' stop-color='%23e6e6e6'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' x='0' y='0' width='100%25' height='100%25'/%3E%3C/svg%3E");
background-attachment: fixed;
background-size: cover;
color:black;
}
/* body{
  
   background-color: var(--bg);
  
 
} */
div.menu.active svg.menu.open{
    display:none;
}
  
div.menu svg.menu.close{
    display:none;
}
div.menu.active svg.menu.close{
    display:flex;
}
  body{
  background-color: var(--bg);
  color:var(--text);

  
  }
   .hero-title{
            font-size:2rem;
            font-weight:900;
            text-align: center;
            background:var(--gradient);
           color:transparent;
            background-clip:text;
            -webkit-background-clip: text;
        }
  .menu-icon{
   height:50px;
   width:50px;
   display:flex;
   flex-direction:column;
   align-items:center;
   justify-content:center;
   flex-shrink:0;
   background:rgba(var(--rgt),0.05);
   color:white;
   border-radius:5px;
   border:1px solid rgba(var(--rgt),0.1)
  }
  header{
    position:fixed;
    top:0;
    left:0;
    right:0;
    padding:10px;
    display:flex;
    flex-direction:row;
    align-items:center;
    justify-content:space-between;
    gap:10px;
    z-index:4000;
    background:var(--bg);
    border-bottom:1px solid rgba(var(--rgt),0.1)

  }
  .pc-footer-links{
    display:none !important;
  }
  .mobile-footer-links{
  display:grid;
  grid-template-columns: repeat(3,1fr);
  gap:5px;
  opacity:0.7
  
  }
 
  footer{
    border-top:1px solid var(--bg-lighter);
  }
  .payment-patners{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:10px;
    place-items:center;
  
  }
  .patner{
    background:var(--bg-light);
    border-radius:5px;
    padding:10px;
    width:fit-content !important;
  }
  section.nav{
    display:none;
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background: rgba(0,0,0,0.3);
    z-index:5000;
  
    
  }
section.nav.active{
  display:flex;
 
 

}
section.nav.active nav{
  animation:menu-animate 0.5s linear forwards;
 
}
@keyframes menu-animate{
  0%{
    transform:translateX(-100%);

  }
  100%{
    transform:translateX(0)
  }
}
section.nav nav{
  background:var(--bg);
  width:70%;
  border-right:1px solid rgba(var(--rgt),0.1);
  padding:20px;
  display:flex;
  flex-direction:column;
  gap:10px;
  transform: translateX(-100%);
   transition:all 0.5s ease !important;
   user-select:none;
}
section.nav nav a{
  font-size:1.3rem;
  font-weight:normal;
  
  
}
body:has(section.nav.active){
  overflow:hidden;
}
body{
  position: relative;
}
main{
  position:relative;
  z-index:200;
}
body::before{
  content:'';
  position:absolute;
  top:0;
  left:0;
  width:50%;
  aspect-ratio:1;
  background:var(--primary);
  filter:blur(100px);
  border-radius:50%;
  z-index:100;
}




   @media(min-width:800px){
   
    .pc-footer-links{
    display:grid !important;
    grid-template-columns: repeat(6,1fr);
    gap:10px;
    
  }

    .pc-footer-links a{
      padding:5px 20px;
      background:var(--bg-light) !important;
      border:1px solid var(--bg-lighter);
      display:flex;
      align-items:center;
      justify-content:center;
    

    }
    .payment-patners{
      padding-left:15vw;
      padding-right:15vw;
    }
    section.mobile-nav{
      display:none;
    }
    .pc-nav a{
      font-weight:normal;
      font-size:1rem;
      white-space: nowrap;
    }
   }
  
    
    </style>
    @yield('css')
</head>
@include('components.sections',[
  'action_loader' => true
])
<body class="overflow-hidden">
   <div class="pos-fixed c-white loader top-0 left-0 right-0 column justify-center bottom-0 z-index-9000 bg">
  <svg fill="currentColor" width="100" height="100" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9,9,0,0,1,12,21Z" transform="translate(12, 12) scale(0)"><animateTransform id="spinner_g88x" begin="0;spinner_yOmw.begin+0.6s" attributeName="transform" calcMode="spline" type="translate" dur="1.2s" values="12 12;0 0" keySplines=".52,.6,.25,.99"/><animateTransform begin="0;spinner_yOmw.begin+0.6s" attributeName="transform" calcMode="spline" additive="sum" type="scale" dur="1.2s" values="0;1" keySplines=".52,.6,.25,.99"/><animate begin="0;spinner_yOmw.begin+0.6s" attributeName="opacity" calcMode="spline" dur="1.2s" values="1;0" keySplines=".52,.6,.25,.99"/></path><path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9,9,0,0,1,12,21Z" transform="translate(12, 12) scale(0)"><animateTransform id="spinner_yOmw" begin="spinner_g88x.begin+0.6s" attributeName="transform" calcMode="spline" type="translate" dur="1.2s" values="12 12;0 0" keySplines=".52,.6,.25,.99"/><animateTransform begin="spinner_g88x.begin+0.6s" attributeName="transform" calcMode="spline" additive="sum" type="scale" dur="1.2s" values="0;1" keySplines=".52,.6,.25,.99"/><animate begin="spinner_g88x.begin+0.6s" attributeName="opacity" calcMode="spline" dur="1.2s" values="1;0" keySplines=".52,.6,.25,.99"/></path></svg>
</div>
 <header>
           <img  onclick="window.location.href='{{ url('/') }}'" src="{{ config('settings.site_logo') }}" alt="Logo" class="h-30 pc-pointer">
        
        {{-- MENU ICON --}}
        <div onclick="
       if(document.querySelector('section.nav').classList.contains('active')){
     
        document.querySelector('section.nav').classList.remove('active');
       
         
       }else{
       
        document.querySelector('section.nav').classList.add('active');
        
         
       }

            " class=" menu-icon menu">
          
         <svg class="menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H40a12,12,0,0,1,0-24H216A12,12,0,0,1,228,128ZM40,76H216a12,12,0,0,0,0-24H40a12,12,0,0,0,0,24ZM216,180H40a12,12,0,0,0,0,24H216a12,12,0,0,0,0-24Z"></path></svg>

   
        </div>
       
        {{-- PC NAV --}}
    <div class="row pc-nav m-left-auto mobile-display-none align-center g-10">
        {{-- NEW NAV LINK --}}
            <a class="w-full clip-10 br-10 bold p-10 font-1 w-full g-5 row align-center no-u c-white" href="{{ url('/') }}">
           

              <span class="m-top-auto">  Home</span>
            </a>
            {{-- NEW NAV LINK --}}
            <a href="{{ url('/about') }}" class="w-full clip-10 br-10 g-5 bold p-10 font-1 w-full row align-center no-u c-inherit">
             


              <span class="m-top-auto"> About Us</span>
            </a>
            {{-- NEW NAV LINK --}}
             <a href="{{ url('/coupon/checker') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
        



              <span class="m-top-auto">Verify {{ config('settings.coupon') }}</span>
            </a>
              <a href="{{ url('/terms') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
           

     
              <span class="m-top-auto"> Terms of Service</span>
            </a>
             <a href="{{ url('/coupon') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
            
                 



              <span class="m-top-auto"> Purchase {{ config('settings.coupon') }}</span>
            </a>
             <a href="{{ url('/streamers/top') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
            
                



              <span class="m-top-auto">Top Streamers</span>
            </a>
              <a href="{{ url('/earners/top') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
            
                



              <span class="m-top-auto">Top Earners</span>
            </a>
          @if (!Auth::guard('users')->check())
                <a href="{{ url('/login') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
            
                  

              <span class="m-top-auto"> Login</span>
            </a>
          @else
                <a href="{{ url('/users/dashboard') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
           
              <span class="m-top-auto"> Dashboard</span>
            </a>
          @endif
    </div>
    </header>
    {{-- MOBILE NAV --}}
     <section onclick="this.classList.remove('active');" class="nav mobile-nav">
        <nav onclick="event.stopPropagation()" class="c-white">
          {{-- NEW NAV LINK --}}
            <a class="w-full clip-10 br-10 bold p-10 font-1 w-full g-5 row align-center no-u c-white" href="{{ url('/') }}">
           
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M222.14,105.85l-80-80a20,20,0,0,0-28.28,0l-80,80A19.86,19.86,0,0,0,28,120v96a12,12,0,0,0,12,12h64a12,12,0,0,0,12-12V164h24v52a12,12,0,0,0,12,12h64a12,12,0,0,0,12-12V120A19.86,19.86,0,0,0,222.14,105.85ZM204,204H164V152a12,12,0,0,0-12-12H104a12,12,0,0,0-12,12v52H52V121.65l76-76,76,76Z"></path></svg>

              <span class="m-top-auto">  Home</span>
            </a>
            {{-- NEW NAV LINK --}}
            <a href="{{ url('/about') }}" class="w-full clip-10 br-10 g-5 bold p-10 font-1 w-full row align-center no-u c-inherit">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M108,84a16,16,0,1,1,16,16A16,16,0,0,1,108,84Zm128,44A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Zm-72,36.68V132a20,20,0,0,0-20-20,12,12,0,0,0-4,23.32V168a20,20,0,0,0,20,20,12,12,0,0,0,4-23.32Z"></path></svg>

              <span class="m-top-auto"> About Us</span>
            </a>
            {{-- NEW NAV LINK --}}
             <a href="{{ url('/coupon/checker') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
          
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,40V80a12,12,0,0,1-24,0V52H176a12,12,0,0,1,0-24h40A12,12,0,0,1,228,40ZM80,204H52V176a12,12,0,0,0-24,0v40a12,12,0,0,0,12,12H80a12,12,0,0,0,0-24Zm136-40a12,12,0,0,0-12,12v28H176a12,12,0,0,0,0,24h40a12,12,0,0,0,12-12V176A12,12,0,0,0,216,164ZM40,92A12,12,0,0,0,52,80V52H80a12,12,0,0,0,0-24H40A12,12,0,0,0,28,40V80A12,12,0,0,0,40,92ZM84,72h88a12,12,0,0,1,12,12v88a12,12,0,0,1-12,12H84a12,12,0,0,1-12-12V84A12,12,0,0,1,84,72Zm12,88h64V96H96Z"></path></svg>

              <span class="m-top-auto">Verify {{ config('settings.coupon') }}</span>
            </a>
              <a href="{{ url('/terms') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
           
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M246.14,113.86l-16-16a20,20,0,0,0-23.06-3.75l-45.2-45.2a20,20,0,0,0-3.74-23.06l-16-16a20,20,0,0,0-28.28,0l-64,64a20,20,0,0,0,0,28.28l16,16a20,20,0,0,0,23,3.79L29.36,181.38a32,32,0,0,0,45.26,45.26L134,167.21a20,20,0,0,0,3.81,22.94l16,16a20,20,0,0,0,28.29,0l64-64a20,20,0,0,0,0-28.29ZM80,98.34,69.64,88,128,29.65,138.34,40ZM57.64,209.67a8,8,0,0,1-11.31-11.32l59.52-59.52,11.31,11.32Zm92.7-60.29-43.72-43.72,39-39,43.72,43.72Zm17.65,37L157.65,176,216,117.66,226.34,128Z"></path></svg>

              <span class="m-top-auto">Terms of Service</span>
            </a>
             <a href="{{ url('/coupon') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
            
                

              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M100,36H56A20,20,0,0,0,36,56v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V56A20,20,0,0,0,100,36ZM96,96H60V60H96Zm4,40H56a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V156A20,20,0,0,0,100,136Zm-4,60H60V160H96ZM200,36H156a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V56A20,20,0,0,0,200,36Zm-4,60H160V60h36Zm-60,76V148a12,12,0,0,1,24,0v24a12,12,0,0,1-24,0Zm84-8a12,12,0,0,1-12,12H196v32a12,12,0,0,1-12,12H148a12,12,0,0,1,0-24h24V148a12,12,0,0,1,24,0v4h12A12,12,0,0,1,220,164Z"></path></svg>
              <span class="m-top-auto">{{ config('settings.coupon') }}</span>
            </a>
            <a href="{{ url('/streamers/top') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
            
             
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M212.92,17.71a7.89,7.89,0,0,0-6.86-1.46l-128,32A8,8,0,0,0,72,56V166.1A36,36,0,1,0,88,196V102.25l112-28V134.1A36,36,0,1,0,216,164V24A8,8,0,0,0,212.92,17.71Z"></path></svg>
               

              <span class="m-top-auto">Top Streamers</span>
            </a>
              <a href="{{ url('/earners/top') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
            
             
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>


              <span class="m-top-auto">Top Earners</span>
            </a>
          @if (!Auth::guard('users')->check())
                <a href="{{ url('/login') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
            
                   
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M184.49,119.51a12,12,0,0,1,0,17l-72,72a12,12,0,0,1-17-17L147,140H32a12,12,0,0,1,0-24H147L95.51,64.49a12,12,0,0,1,17-17ZM216,28a12,12,0,0,0-12,12V216a12,12,0,0,0,24,0V40A12,12,0,0,0,216,28Z"></path></svg>

              <span class="m-top-auto"> Login</span>
            </a>
          @else
                <a href="{{ url('/users/dashboard') }}" class="w-full clip-10 br-10 bold g-5 p-10 font-1 w-full row align-center no-u c-inherit">
          
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M78,36a42,42,0,1,0,42,42A42,42,0,0,0,78,36Zm0,60A18,18,0,1,1,96,78,18,18,0,0,1,78,96Zm100,24a42,42,0,1,0-42-42A42,42,0,0,0,178,120Zm0-60a18,18,0,1,1-18,18A18,18,0,0,1,178,60ZM78,136a42,42,0,1,0,42,42A42,42,0,0,0,78,136Zm0,60a18,18,0,1,1,18-18A18,18,0,0,1,78,196Zm142-18a12,12,0,0,1-12,12H190v18a12,12,0,0,1-24,0V190H148a12,12,0,0,1,0-24h18V148a12,12,0,0,1,24,0v18h18A12,12,0,0,1,220,178Z"></path></svg>

              <span class="m-top-auto"> Dashboard</span>
            </a>
          @endif
       
        </nav>
    </section>
    
    
    <main class="p-10 pc-x-padding c-inherit">
       
        @yield('main')
<section onclick="HidePopUp()" class="popup">
  <div onclick="event.stopPropagation()" style="background:white;color:black;" class="child">

  </div>
</section>
<section onclick="HideSlideUp()" class="slideup">
  <div onclick="event.stopPropagation()" class="child bg-secondary-dark">@yield('slideup_child')</div>
</section>
    </main>
   <footer class="w-full pc-align-center c-white bg p-10 column g-10">
   <img src="{{ config('settings.site_logo') }}" alt="" class="grid-full w-100 pc-m-x-auto">
   <span class="font-1 grid-full">
    Learn. Engage. Earn. -- The future of digital growth with {{ config('app.name') }}.
</span>
<div class="row align-center g-10">
  <div style="border:1px solid var(--primary);background:var(--primary-transparent)" class="h-30 circle perfect-square column align-center justify-center no-shrink">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm12,191.13V156h20a12,12,0,0,0,0-24H140V112a12,12,0,0,1,12-12h16a12,12,0,0,0,0-24H152a36,36,0,0,0-36,36v20H96a12,12,0,0,0,0,24h20v55.13a84,84,0,1,1,24,0Z"></path></svg>

  </div>
  <div style="border:1px solid var(--primary);background:var(--primary-transparent)" class="h-30 circle perfect-square column align-center justify-center no-shrink">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M251.09,67.41A12,12,0,0,0,240,60H211.82a52.73,52.73,0,0,0-43.67-24,50.85,50.85,0,0,0-36.6,14.85A51.87,51.87,0,0,0,116,88v.78c-36.83-11.57-66.38-40.9-66.7-41.23a12,12,0,0,0-20.47,7.38C22.52,125.1,53.48,162.72,70.89,178.05,56.4,192.83,36,200.68,35.8,200.76A12,12,0,0,0,30,218.66C32,221.55,43.44,236,80,236c72.25,0,132.7-55.26,139.6-126.63l28.88-28.88A12,12,0,0,0,251.09,67.41ZM199.52,95.52a11.93,11.93,0,0,0-3.49,7.72C192.14,164.23,141.18,212,80,212a90.78,90.78,0,0,1-12.49-.79C78,204.55,89.72,195.07,98,182.66a12,12,0,0,0-3.9-17c-.12-.07-12.33-7.49-23.43-24.42s-17.26-37-18.46-59.78C69.37,94.4,96,110.79,126,115.84A12,12,0,0,0,140,104V88a28,28,0,0,1,8.41-20.07A27.07,27.07,0,0,1,167.86,60a28.83,28.83,0,0,1,25.82,16.81,12,12,0,0,0,11,7.19H211Z"></path></svg>

  </div>
  <div style="border:1px solid var(--primary);background:var(--primary-transparent)" class="h-30 circle perfect-square column align-center justify-center no-shrink">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,72a24,24,0,1,1,24-24A24,24,0,0,1,128,152ZM176,20H80A60.07,60.07,0,0,0,20,80v96a60.07,60.07,0,0,0,60,60h96a60.07,60.07,0,0,0,60-60V80A60.07,60.07,0,0,0,176,20Zm36,156a36,36,0,0,1-36,36H80a36,36,0,0,1-36-36V80A36,36,0,0,1,80,44h96a36,36,0,0,1,36,36ZM196,76a16,16,0,1,1-16-16A16,16,0,0,1,196,76Z"></path></svg>

  </div>
   <div style="border:1px solid var(--primary);background:var(--primary-transparent)" class="h-30 circle perfect-square column align-center justify-center no-shrink">
 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M187.3,159.06A36.09,36.09,0,0,1,152,188a84.09,84.09,0,0,1-84-84A36.09,36.09,0,0,1,96.94,68.7,12,12,0,0,1,110,75.1l11.48,23a12,12,0,0,1-.75,12l-8.52,12.78a44.56,44.56,0,0,0,20.91,20.91l12.78-8.52a12,12,0,0,1,12-.75l23,11.48A12,12,0,0,1,187.3,159.06ZM236,128A108,108,0,0,1,78.77,224.15L46.34,235A20,20,0,0,1,21,209.66l10.81-32.43A108,108,0,1,1,236,128Zm-24,0A84,84,0,1,0,55.27,170.06a12,12,0,0,1,1,9.81l-9.93,29.79,29.79-9.93a12.1,12.1,0,0,1,3.8-.62,12,12,0,0,1,6,1.62A84,84,0,0,0,212,128Z"></path></svg>

  </div>
   <div style="border:1px solid var(--primary);background:var(--primary-transparent)" class="h-30 circle perfect-square column align-center justify-center no-shrink">
 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M231.49,23.16a13,13,0,0,0-13.23-2.26L15.6,100.21a18.22,18.22,0,0,0,3.12,34.86L68,144.74V200a20,20,0,0,0,34.4,13.88l22.67-23.51L162.35,223a20,20,0,0,0,32.7-10.54L235.67,35.91A13,13,0,0,0,231.49,23.16ZM139.41,77.52,77.22,122.09l-34.43-6.75ZM92,190.06V161.35l15,13.15Zm81.16,10.52L99.28,135.81,205.59,59.63Z"></path></svg>

  </div>
</div>

 <div class="mobile-footer-links g-5">
   

 <a href="{{ url('about') }}" class="no-u c-white">About Us</a>
 <a href="{{ url('vendors') }}" class="no-u c-white">Vendors</a>
 <a href="{{ url('terms') }}" class="no-u c-white">Terms of Service</a>
 <a href="{{ url('earners/top') }}" class="no-u c-white">Top Earners</a>
 <a href="{{ url('register') }}" class="no-u c-white">Get Started</a>
 <a href="{{ url('login') }}" class="no-u c-white">Sign In</a>
 
 </div>


 
</footer>

    <script src="{{ asset('vitecss/js/app.js?v='.config('versions.vite_version').'') }}"></script>
    <script class="js">
      window.addEventListener('load',()=>{
        try{
          // restyle
          document.querySelector('main').style.paddingTop=document.querySelector('header').getBoundingClientRect().height + 10 + 'px';
            document.querySelector('.loader').remove();
        document.querySelector('body').classList.remove('overflow-hidden');
        // document.querySelector('section.nav').style.top=document.querySelector('header').offsetHeight + 'px';
     
        }catch(error){
          alert(error.stack)
        }
       });

    </script>
    @yield('js')
</body>
</html>