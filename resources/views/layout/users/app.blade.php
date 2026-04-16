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
<link rel="stylesheet" class="mode_css" href="{{ $mode_link }}{{ config('versions.vite_version') }}">
    <title>{{ config('app.name') }} | Users | @yield('title')</title>
    <style>
      
      .nav-profile{
        background-color:inherit;


}
 body{
  
   background-color: var(--bg);

  
}
header{
  border-bottom:1px solid rgba(var(--rgt),0.1);
  background:var(--bg) !important;
  display:flex !important;
  flex-direction: row !important;
  align-items:center !important;
  justify-content: space-between !important;
  padding:10px !important;

}
.nav{
  background:var(--bg);
  border-right:1px solid rgba(var(--rgt),0.1)
  
}
nav .nav{
  scrollbar-width: none;
  -webkit-scrollbar-width:none;
  padding:0 !important;
  
}
.nav *{
  color:rgba(var(--rgt),0.8) !important;
}


*{
  scrollbar-width: none !important;
   -webkit-scrollbar-width:none;
}
.nav-link{
  border-radius: 0 !important;
  clip-path:inset(0 round 0) !important;
  gap:10px !important;
}
a.searchable:hover{
  background:rgba(var(--rgt),0.05);
  border:1px solid rgba(var(--rgt),0.1);
}
footer{
  background:var(--bg) !important;
  position:fixed;
  bottom:0;
  left:0;
  right:0;
  border-top:1px solid rgba(var(--rgt),0.1)
  
}
footer .child{
  display:grid;
  grid-template-columns: repeat(4,1fr);
  padding:5px;
  gap:5px;
  

}
footer .child .f-links{
  width:100%;
  border-radius:1000px;
  transition: all 0.5s ease ;
  
}
footer .child .f-links.active{
 color:var(--primary-light)
  
}
.menu-icon{
  height:40px;
  width:40px;
  border-radius:50%;


}

.icon-group{
  color:inherit;
}


  header{
        left:30% !important;
      }
      .profile-icon,.currency-icon{
        position:relative;
        height:100%;
        display:flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width:fit-content;
      }
      .profile-links,.currency-links{
        position:absolute;
        left:50%;
        transform:translateX(-50%);
        /* padding:10px; */
        width:fit-content;
        background:var(--bg);
        border:1px solid rgba(var(--rgt),0.1);
        /* top:61px; */
        border-radius:5px;
        overflow:hidden;
        display:none;

      }
      .profile-links.active,.currency-links.active{
        display:flex;
        flex-direction:column;
      }
      .section-group{
        border:1px solid rgba(var(--rgt),0.1) !important;
        background:rgba(var(--rgt),0.02) !important;
        padding:20px !important;
        border-radius:20px !important;

      }
      .cont{
        border-radius:10px !important;
      }
      form label{
        opacity:0.7 !important;
      }
      button.post{
        height:50px !important;
      }
      .section-group form .cont{
        background:var(--bg) !important;
      }
      .main-border{
        border:1px solid rgba(var(--rgt),0.1) !important;
        
      }
      .main-border-bg{
        background:rgba(var(--rgt),0.02) !important;
      }
      .c-primary-light{
        color:var(--primary-light);
      }
      .status{
        font-size:0.8rem;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        padding:4px 14px !important;
      }
      .status.green{
        border:1px solid rgba(0,255,0,1) !important;
        background:1px solid rgba(0,255,0,0.1) !important;
        color:rgba(0,255,0,1) !important;

      }
      .status.red{
        border:1px solid rgba(255,0,0,1) !important;
        background:1px solid rgba(255,0,0,0.1) !important;
        color:rgba(255,0,0,1) !important;

      }
      .status.gold{
        border:1px solid rgb(255, 208, 0) !important;
        background:1px solid rgba(255,208,0,0.1) !important;
        color:rgba(255,208,0,1) !important;

      }
      .mode-switch{
        width:50px;
        height:30px;
        background:rgb(var(--rgt),0.2);
        border-radius:1000px;
        overflow: hidden;
        padding:5px;
      }
      .mode-switch .child{
        display: flex;
        align-items:center;
        justify-content:center;

        height:100%;
        aspect-ratio:1;
        background:rgb(var(--rgt));
        border-radius:50%;
        transition:all 0.5s ease;
        color:rgb(var(--rgb),0.7);
      }
      .mode-switch.active{
        background:#4caf50;
      }
      .mode-switch.active .child{
        transform: translateX(20px)
      }
      .mode-switch span{
        display:none;
      }
      .mode-switch span.dark{
        display:flex;
      }
       .mode-switch.active span.dark{
        display:none;
      }
       .mode-switch.active span.light{
        display:flex;
      }
   

      @media(min-width:800px){
        nav{
            width:30%;
           
        }
        nav section.nav{
            width:100%;
            border-right:1px solid var(--bg);
        }
        main,footer,header{
            width:calc(100% - 30%) !important;
           
            margin-left:30%;
        }
      }
    
    </style>
    @yield('css')
</head>
@include('components.sections',[
  'action_loader' => true
])
<body class="overflow-hidden">
  <img src="{{ asset('logos/black-logo.png') }}" alt="" class="dark-logo display-none">
  <img src="{{ asset('logos/white-logo.png') }}" alt="" class="white-logo display-none">
    <div class="pos-fixed c-white loader top-0 left-0 right-0 column justify-center bottom-0 z-index-9000 bg">
  <svg fill="currentColor" width="100" height="100" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9,9,0,0,1,12,21Z" transform="translate(12, 12) scale(0)"><animateTransform id="spinner_g88x" begin="0;spinner_yOmw.begin+0.6s" attributeName="transform" calcMode="spline" type="translate" dur="1.2s" values="12 12;0 0" keySplines=".52,.6,.25,.99"/><animateTransform begin="0;spinner_yOmw.begin+0.6s" attributeName="transform" calcMode="spline" additive="sum" type="scale" dur="1.2s" values="0;1" keySplines=".52,.6,.25,.99"/><animate begin="0;spinner_yOmw.begin+0.6s" attributeName="opacity" calcMode="spline" dur="1.2s" values="1;0" keySplines=".52,.6,.25,.99"/></path><path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9,9,0,0,1,12,21Z" transform="translate(12, 12) scale(0)"><animateTransform id="spinner_yOmw" begin="spinner_g88x.begin+0.6s" attributeName="transform" calcMode="spline" type="translate" dur="1.2s" values="12 12;0 0" keySplines=".52,.6,.25,.99"/><animateTransform begin="spinner_g88x.begin+0.6s" attributeName="transform" calcMode="spline" additive="sum" type="scale" dur="1.2s" values="0;1" keySplines=".52,.6,.25,.99"/><animate begin="spinner_g88x.begin+0.6s" attributeName="opacity" calcMode="spline" dur="1.2s" values="1;0" keySplines=".52,.6,.25,.99"/></path></svg>
</div>
  <header style="z-index:3000" class="pos-sticky average c-white bg p-10 top-0 left-0 right-0 bottom-0 row align-center g-10">
       
        <img src="{{ $logo }}" alt="Logo" class="h-30 logo pc-pointer" onclick="window.location.href='{{ url('/') }}'">
      
        <div class="row m-left-auto g-10 align-center">

  <div class="row profile-icon align-center g-10">
          <div onclick="
          if(this.closest('.profile-icon').querySelector('.profile-links').classList.contains('active')){
          this.closest('.profile-icon').querySelector('.profile-links').classList.remove('active');
          }else{
          this.closest('.profile-icon').querySelector('.profile-links').classList.add('active');
          }
            " class="no-shrink h-40 w-40 primary-text no-select perfect-square p-10 br-10 column align-center justify-center bg-primary">
                {{ strtoupper(substr(Auth::guard('users')->user()->name,0,2)) }}
            </div>
            {{-- PROFILE LINKS --}}
           <div class="profile-links c-text">
            <div onclick="this.closest('.profile-icon').querySelector('.profile-links').classList.remove('active');spa(event,'{{ url('users/account/settings') }}')" style="border-bottom:1px solid rgba(var(--rgt),0.1)" class="row no-select pointer align-center w-full g-10 p-10">
              <span>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M232,116H219.22A91.1,91.1,0,0,0,213,92.79l11.08-6.4a12,12,0,1,0-12-20.78L201,72a92.85,92.85,0,0,0-17-17l6.41-11.11a12,12,0,1,0-20.78-12L163.21,43A91.1,91.1,0,0,0,140,36.78V24a12,12,0,0,0-24,0V36.78A91.1,91.1,0,0,0,92.79,43l-6.4-11.08a12,12,0,0,0-20.78,12L72,55A92.85,92.85,0,0,0,55,72L43.93,65.61a12,12,0,0,0-12,20.78L43,92.79A91.1,91.1,0,0,0,36.78,116H24a12,12,0,0,0,0,24H36.78A91.1,91.1,0,0,0,43,163.21l-11.08,6.4a12,12,0,1,0,12,20.78L55,184a92.85,92.85,0,0,0,17,17l-6.41,11.11a12,12,0,1,0,20.78,12L92.79,213A91.1,91.1,0,0,0,116,219.22V232a12,12,0,0,0,24,0V219.22A91.1,91.1,0,0,0,163.21,213l6.4,11.08a12,12,0,0,0,20.78-12L184,201a92.85,92.85,0,0,0,17-17l11.11,6.41a12,12,0,1,0,12-20.78L213,163.21A91.1,91.1,0,0,0,219.22,140H232a12,12,0,0,0,0-24ZM128,60a68.1,68.1,0,0,1,66.92,56h-60l-30-52A67.61,67.61,0,0,1,128,60ZM60,128A67.9,67.9,0,0,1,84.16,76.07l30,51.93-30,51.93A67.9,67.9,0,0,1,60,128Zm68,68a67.61,67.61,0,0,1-23.07-4l30-52h60A68.1,68.1,0,0,1,128,196Z"></path></svg>



              </span>
              <span class="ws-nowrap">Account Settings</span>
            </div>
             <div onclick="this.closest('.profile-icon').querySelector('.profile-links').classList.remove('active');spa(event,'{{ url('users/security/settings') }}')" style="border-bottom:1px solid rgba(var(--rgt),0.1)" class="row no-select pointer align-center w-full g-10 p-10">
              <span>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,36H48A20,20,0,0,0,28,56v56c0,54.29,26.32,87.22,48.4,105.29,23.71,19.39,47.44,26,48.44,26.29a12.1,12.1,0,0,0,6.32,0c1-.28,24.73-6.9,48.44-26.29,22.08-18.07,48.4-51,48.4-105.29V56A20,20,0,0,0,208,36Zm-4,76c0,1.34,0,2.68-.06,4H140V60h64ZM52,60h64v56H52.06c0-1.32-.06-2.66-.06-4Zm3,80h61v74.29a127,127,0,0,1-25.09-16.14C72.22,182.61,60.2,163.13,55,140Zm110.1,58.15A127,127,0,0,1,140,214.29V140h61C195.8,163.13,183.78,182.61,165.09,198.15Z"></path></svg>



              </span>
              <span class="ws-nowrap">Security Settings</span>
            </div>
             <div onclick="this.closest('.profile-icon').querySelector('.profile-links').classList.remove('active');window.location.href='{{ url('users/logout') }}'" class="row no-select pointer c-red align-center w-full g-10 p-10">
              <span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5303 12.5303C15.8232 12.2374 15.8232 11.7626 15.5303 11.4697L13.0303 8.96967C12.7374 8.67678 12.2626 8.67678 11.9697 8.96967C11.6768 9.26256 11.6768 9.73744 11.9697 10.0303L13.1893 11.25H6C5.58579 11.25 5.25 11.5858 5.25 12C5.25 12.4142 5.58579 12.75 6 12.75H13.1893L11.9697 13.9697C11.6768 14.2626 11.6768 14.7374 11.9697 15.0303C12.2626 15.3232 12.7374 15.3232 13.0303 15.0303L15.5303 12.5303Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M13.9451 1.25H15.0549C16.4225 1.24998 17.5248 1.24996 18.3918 1.36652C19.2919 1.48754 20.0497 1.74643 20.6517 2.34835C21.2536 2.95027 21.5125 3.70814 21.6335 4.60825C21.75 5.47522 21.75 6.57754 21.75 7.94513V16.0549C21.75 17.4225 21.75 18.5248 21.6335 19.3918C21.5125 20.2919 21.2536 21.0497 20.6517 21.6517C20.0497 22.2536 19.2919 22.5125 18.3918 22.6335C17.5248 22.75 16.4225 22.75 15.0549 22.75H13.9451C12.5775 22.75 11.4752 22.75 10.6083 22.6335C9.70814 22.5125 8.95027 22.2536 8.34835 21.6517C7.94855 21.2518 7.70008 20.7832 7.54283 20.2498C6.59156 20.2486 5.79901 20.2381 5.15689 20.1518C4.39294 20.0491 3.7306 19.8268 3.20191 19.2981C2.67321 18.7694 2.45093 18.1071 2.34822 17.3431C2.24996 16.6123 2.24998 15.6865 2.25 14.5537V9.44631C2.24998 8.31349 2.24996 7.38774 2.34822 6.65689C2.45093 5.89294 2.67321 5.2306 3.20191 4.7019C3.7306 4.17321 4.39294 3.95093 5.15689 3.84822C5.79901 3.76189 6.59156 3.75142 7.54283 3.75017C7.70008 3.21677 7.94855 2.74816 8.34835 2.34835C8.95027 1.74643 9.70814 1.48754 10.6083 1.36652C11.4752 1.24996 12.5775 1.24998 13.9451 1.25ZM7.25 16.0549C7.24999 17.1048 7.24997 17.9983 7.30271 18.7491C6.46829 18.7459 5.84797 18.7312 5.35676 18.6652C4.75914 18.5848 4.46611 18.441 4.26257 18.2374C4.05903 18.0339 3.91519 17.7409 3.83484 17.1432C3.7516 16.5241 3.75 15.6997 3.75 14.5V9.5C3.75 8.30029 3.7516 7.47595 3.83484 6.85676C3.91519 6.25914 4.05903 5.9661 4.26257 5.76256C4.46611 5.55902 4.75914 5.41519 5.35676 5.33484C5.84797 5.2688 6.46829 5.25415 7.30271 5.25091C7.24997 6.00167 7.24999 6.89522 7.25 7.94512L7.25 8C7.25 8.41422 7.58579 8.75 8 8.75C8.41422 8.75 8.75 8.41422 8.75 8C8.75 6.56459 8.7516 5.56347 8.85315 4.80812C8.9518 4.07435 9.13225 3.68577 9.40901 3.40901C9.68578 3.13225 10.0743 2.9518 10.8081 2.85315C11.5635 2.75159 12.5646 2.75 14 2.75H15C16.4354 2.75 17.4365 2.75159 18.1919 2.85315C18.9257 2.9518 19.3142 3.13225 19.591 3.40901C19.8678 3.68577 20.0482 4.07435 20.1469 4.80812C20.2484 5.56347 20.25 6.56459 20.25 8V16C20.25 17.4354 20.2484 18.4365 20.1469 19.1919C20.0482 19.9257 19.8678 20.3142 19.591 20.591C19.3142 20.8678 18.9257 21.0482 18.1919 21.1469C17.4365 21.2484 16.4354 21.25 15 21.25H14C12.5646 21.25 11.5635 21.2484 10.8081 21.1469C10.0743 21.0482 9.68578 20.8678 9.40901 20.591C9.13225 20.3142 8.9518 19.9257 8.85315 19.1919C8.7516 18.4365 8.75 17.4354 8.75 16C8.75 15.5858 8.41422 15.25 8 15.25C7.58579 15.25 7.25 15.5858 7.25 16L7.25 16.0549Z" fill="CurrentColor"></path>
</svg>


              </span>
              <span>Logout</span>
            </div>
           </div>
      </div>


        <div class="row display-none currency-icon align-center g-10">
          <div onclick="
          if(this.closest('.currency-icon').querySelector('.currency-links').classList.contains('active')){
          this.closest('.currency-icon').querySelector('.currency-links').classList.remove('active');
          }else{
          this.closest('.currency-icon').querySelector('.currency-links').classList.add('active');
          }
            " class="no-shrink no-select perfect-square p-10 br-10 column align-center justify-center">
              <div class="row align-center g-5"><span>USD</span>
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216.49,104.49l-80,80a12,12,0,0,1-17,0l-80-80a12,12,0,0,1,17-17L128,159l71.51-71.52a12,12,0,0,1,17,17Z"></path></svg>

              </span>
            </div>
            </div>
            {{-- PROFILE LINKS --}}
           <div class="currency-links c-text">
            <div onclick="this.closest('.profile-icon').querySelector('.profile-links').classList.remove('active');spa(event,'{{ url('users/account/settings') }}')" style="border-bottom:1px solid rgba(var(--rgt),0.1)" class="row no-select pointer align-center w-full g-10 p-10">
              <span>
               $
              </span>
              <span class="ws-nowrap">USD</span>
            </div>
             <div onclick="this.closest('.profile-icon').querySelector('.profile-links').classList.remove('active');spa(event,'{{ url('users/security/settings') }}')" style="border-bottom:1px solid rgba(var(--rgt),0.1)" class="row no-select pointer align-center w-full g-10 p-10">
              <span>
             ₦
              </span>
              <span class="ws-nowrap">NGN</span>
            </div>
            
           </div>
      </div>



        </div>
    


       
      {{-- mode switch --}}
     <div data-link="{{ url('users/get/site/mode/process?link=') }}" onclick="SwitchMode(this,'{{ asset('vitecss/css/light.css?v='.config('versions.vite_version').'') }}','{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}')" class="mode-switch {{ str_contains($mode_link,'light.css') ? 'active' : '' }}">
      <div class="child">
        <span class="dark">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M160,206.4a8,8,0,0,1-4.36,7.13A94.93,94.93,0,0,1,112,224a96,96,0,0,1,0-192,94.93,94.93,0,0,1,43.64,10.47,8,8,0,0,1,0,14.25,80,80,0,0,0,0,142.56A8,8,0,0,1,160,206.4Zm91.17-85.75-26.5-11.43-2.31-29.84a8,8,0,0,0-14.14-4.47L189.63,97.42l-27.71-6.85a8,8,0,0,0-8.81,11.82L168.18,128l-15.07,25.61a8,8,0,0,0,8.81,11.82l27.71-6.85,18.59,22.51a8,8,0,0,0,14.14-4.47l2.31-29.84,26.5-11.43a8,8,0,0,0,0-14.7Z"></path></svg>

        </span>
        <span class="light">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M120,40V32a8,8,0,0,1,16,0v8a8,8,0,0,1-16,0Zm8,24a64,64,0,1,0,64,64A64.07,64.07,0,0,0,128,64ZM58.34,69.66A8,8,0,0,0,69.66,58.34l-8-8A8,8,0,0,0,50.34,61.66Zm0,116.68-8,8a8,8,0,0,0,11.32,11.32l8-8a8,8,0,0,0-11.32-11.32ZM192,72a8,8,0,0,0,5.66-2.34l8-8a8,8,0,0,0-11.32-11.32l-8,8A8,8,0,0,0,192,72Zm5.66,114.34a8,8,0,0,0-11.32,11.32l8,8a8,8,0,0,0,11.32-11.32ZM40,120H32a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Zm88,88a8,8,0,0,0-8,8v8a8,8,0,0,0,16,0v-8A8,8,0,0,0,128,208Zm96-88h-8a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Z"></path></svg>
        </span>
      </div>
     </div>
        <div onclick="
            document.querySelector('nav').classList.remove('mobile-display-none');
             document.querySelector('nav section.nav').classList.add('animation-trans-in-from-left');
             document.body.classList.add('overflow-hidden');
            

            " class="h-40 c-text w-40 column pc-display-none justify-center circle p-10 menu-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H40a12,12,0,0,1,0-24H216A12,12,0,0,1,228,128ZM40,76H216a12,12,0,0,0,0-24H40a12,12,0,0,0,0,24ZM216,180H40a12,12,0,0,0,0,24H216a12,12,0,0,0,0-24Z"></path></svg>

   
        </div>
        </header>


    {{-- NAV SECTION POSITIONED FIXED WITH TRANSPARENT BACKGROUND--}}
    <nav style="z-index:4000" onclick="
    this.querySelector('section.nav').classList.remove('animation-trans-in-from-left');
    this.classList.add('mobile-display-none');
    document.body.classList.remove('overflow-hidden');
  
    " class="pos-fixed mobile-display-none border-right-1 border-color-dim high top-0 left-0 right-0 bottom-0 bg-black-transparent average">
        {{-- NAV CHILD SECTION --}}
        <section onclick="event.stopPropagation()" class="nav transition-ease-half overflow-auto column h-full w-semi-full">
            {{-- NAV PROFILE SECTION --}}
          <div style="border-bottom:1px solid rgba(var(--rgt),0.1)" class="nav-profile z-index-1000 pos-sticky stick-top w-full row align-center space-between g-10 p-20">
             {{-- logo --}}
            <img src="{{ $logo }}" alt="" class="w-half">
             {{-- close --}}
             <span onclick="
              this.closest('nav').querySelector('section.nav').classList.remove('animation-trans-in-from-left');
    this.closest('nav').classList.add('mobile-display-none');
    document.body.classList.remove('overflow-hidden');
             " style="font-size:2rem;" class="bold no-select">&times;</span>
            </div>

            {{-- nav links group --}}
            <div class="nav-links flex-auto p-20 bg-inherit w-full column">
              {{-- NEW NAV LINK --}}
                <a class="p-10 nav-link searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/dashboard') }}');
                  this.closest('nav').classList.add('mobile-display-none');  
                   document.body.classList.remove('overflow-hidden');
                  document.body.classList.remove('overflow-hidden');
                  ">
                  {{-- icon --}}
                   <div class="icon-group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M100,36H56A20,20,0,0,0,36,56v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V56A20,20,0,0,0,100,36ZM96,96H60V60H96ZM200,36H156a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V56A20,20,0,0,0,200,36Zm-4,60H160V60h36Zm-96,40H56a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V156A20,20,0,0,0,100,136Zm-4,60H60V160H96Zm104-60H156a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V156A20,20,0,0,0,200,136Zm-4,60H160V160h36Z"></path></svg>

                   </div>


                    Dashboard
                 </a>
               @if (Auth::guard('users')->user()->type == 'vendor')
                    {{-- NEW NAV LINK --}}
                <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/vendor/dashboard') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  document.body.classList.remove('overflow-hidden');
                  ">
                  <div class="icon-group">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M100,36H56A20,20,0,0,0,36,56v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V56A20,20,0,0,0,100,36ZM96,96H60V60H96Zm4,40H56a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V156A20,20,0,0,0,100,136Zm-4,60H60V160H96ZM200,36H156a20,20,0,0,0-20,20v44a20,20,0,0,0,20,20h44a20,20,0,0,0,20-20V56A20,20,0,0,0,200,36Zm-4,60H160V60h36Zm-60,76V148a12,12,0,0,1,24,0v24a12,12,0,0,1-24,0Zm84-8a12,12,0,0,1-12,12H196v32a12,12,0,0,1-12,12H148a12,12,0,0,1,0-24h24V148a12,12,0,0,1,24,0v4h12A12,12,0,0,1,220,164Z"></path></svg>


                   </div>


                  {{ config('settings.vendors') }} Dashboard
                  </a> 
               @endif
              
                 {{-- NEW NAV LINK --}}
                 <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/recharge') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  document.body.classList.remove('overflow-hidden');
                  ">
                 <div class="icon-group">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M224,44H32A20,20,0,0,0,12,64V192a20,20,0,0,0,20,20H224a20,20,0,0,0,20-20V64A20,20,0,0,0,224,44Zm-4,24V88H36V68ZM36,188V112H220v76Zm172-24a12,12,0,0,1-12,12H164a12,12,0,0,1,0-24h32A12,12,0,0,1,208,164Zm-68,0a12,12,0,0,1-12,12H116a12,12,0,0,1,0-24h12A12,12,0,0,1,140,164Z"></path></svg>


                   </div>

                   Fund game wallet
                </a>

                  {{-- NEW NAV LINK --}}
                 <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/tasks') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  document.body.classList.remove('overflow-hidden');
                  ">
                 <div class="icon-group">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,28H188V24a12,12,0,0,0-24,0v4H92V24a12,12,0,0,0-24,0v4H48A20,20,0,0,0,28,48V208a20,20,0,0,0,20,20H208a20,20,0,0,0,20-20V48A20,20,0,0,0,208,28ZM68,52a12,12,0,0,0,24,0h72a12,12,0,0,0,24,0h16V76H52V52ZM52,204V100H204V204Zm120.49-84.49a12,12,0,0,1,0,17l-48,48a12,12,0,0,1-17,0l-24-24a12,12,0,0,1,17-17L116,159l39.51-39.52A12,12,0,0,1,172.49,119.51Z"></path></svg>


                   </div>

                   Tasks
                </a>

                   {{-- NEW NAV LINK --}}
                 <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/neo/chat') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  document.body.classList.remove('overflow-hidden');
                  ">
                 <div class="icon-group">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M84,100A12,12,0,0,1,96,88h64a12,12,0,0,1,0,24H96A12,12,0,0,1,84,100Zm12,52h64a12,12,0,0,0,0-24H96a12,12,0,0,0,0,24ZM236,56V184a20,20,0,0,1-20,20H157.89l-12.52,21.92a20,20,0,0,1-34.74,0L98.11,204H40a20,20,0,0,1-20-20V56A20,20,0,0,1,40,36H216A20,20,0,0,1,236,56Zm-24,4H44V180h61.07a12,12,0,0,1,10.42,6.05L128,207.94l12.51-21.89A12,12,0,0,1,150.93,180H212Z"></path></svg>

                  

                   </div>

                   Neo Chat
                </a>
                  {{-- NEW NAV LINK --}}
                 <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/neo/stream') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  document.body.classList.remove('overflow-hidden');
                  ">
                 <div class="icon-group">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M215.38,14.54a12,12,0,0,0-10.29-2.18l-128,32A12,12,0,0,0,68,56V159.35A40,40,0,1,0,92,196V113.37l104-26v40A40,40,0,1,0,220,164V24A12,12,0,0,0,215.38,14.54ZM52,212a16,16,0,1,1,16-16A16,16,0,0,1,52,212ZM92,88.63V65.37l104-26V62.63ZM180,180a16,16,0,1,1,16-16A16,16,0,0,1,180,180Z"></path></svg>

                  

                   </div>

                   Neo Stream
                </a>

                   {{-- NEW NAV LINK --}}
                 <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/neo/translate') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  document.body.classList.remove('overflow-hidden');
                  ">
                 <div class="icon-group">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M250.73,210.63l-56-112a12,12,0,0,0-21.46,0l-20.52,41A84.2,84.2,0,0,1,114,126.22,107.48,107.48,0,0,0,139.33,68H160a12,12,0,0,0,0-24H108V32a12,12,0,0,0-24,0V44H32a12,12,0,0,0,0,24h83.13A83.69,83.69,0,0,1,96,110.35,84,84,0,0,1,83.6,91a12,12,0,1,0-21.81,10A107.55,107.55,0,0,0,78,126.24,83.54,83.54,0,0,1,32,140a12,12,0,0,0,0,24,107.47,107.47,0,0,0,64-21.07,108.4,108.4,0,0,0,45.39,19.44l-24.13,48.26a12,12,0,1,0,21.46,10.73L151.41,196h65.17l12.68,25.36a12,12,0,1,0,21.47-10.73ZM163.41,172,184,130.83,204.58,172Z"></path></svg>

                  

                   </div>

                   Neo Translate
                </a>

                  {{-- NEW NAV LINK --}}
                 <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  window.location.href='{{ url('users/neo/game') }}';
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  document.body.classList.remove('overflow-hidden');
                  ">
                 <div class="icon-group">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M176,116H152a12,12,0,0,1,0-24h24a12,12,0,0,1,0,24ZM104,92h-4V88a12,12,0,0,0-24,0v4H72a12,12,0,0,0,0,24h4v4a12,12,0,0,0,24,0v-4h4a12,12,0,0,0,0-24ZM244.76,202.94a40,40,0,0,1-61,5.35,7,7,0,0,1-.53-.56L144.67,164H111.33L72.81,207.73c-.17.19-.35.38-.53.56A40,40,0,0,1,4.62,173.05a1.18,1.18,0,0,1,0-.2L21,88.79A63.88,63.88,0,0,1,83.88,36H172a64.08,64.08,0,0,1,62.93,52.48,1.8,1.8,0,0,1,0,.19l16.36,84.17a1.77,1.77,0,0,1,0,.2A39.74,39.74,0,0,1,244.76,202.94ZM172,140a40,40,0,0,0,0-80H83.89A39.9,39.9,0,0,0,44.62,93.06a1.55,1.55,0,0,0,0,.21l-16.34,84a16,16,0,0,0,13,18.44,16.07,16.07,0,0,0,13.86-4.21L96.9,144.07a12,12,0,0,1,9-4.07Zm55.76,37.31-7-35.95a63.84,63.84,0,0,1-44.27,22.46l24.41,27.72a16,16,0,0,0,26.85-14.23Z"></path></svg>

                  

                   </div>

                   Neo Game
                </a>

                   {{-- NEW NAV LINK --}}
                 <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/skill/aquisition') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  document.body.classList.remove('overflow-hidden');
                  ">
                 <div class="icon-group">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M249.8,85.49l-116-64a12,12,0,0,0-11.6,0l-116,64a12,12,0,0,0,0,21l21.8,12v47.76a19.89,19.89,0,0,0,5.09,13.32C46.63,194.7,77,220,128,220a136.88,136.88,0,0,0,40-5.75V240a12,12,0,0,0,24,0V204.12a119.53,119.53,0,0,0,30.91-24.51A19.89,19.89,0,0,0,228,166.29V118.53l21.8-12a12,12,0,0,0,0-21ZM128,45.71,219.16,96,186,114.3a1.88,1.88,0,0,1-.18-.12l-52-28.69a12,12,0,0,0-11.6,21l39,21.49L128,146.3,36.84,96ZM128,196c-40.42,0-64.65-19.07-76-31.27v-33l70.2,38.74a12,12,0,0,0,11.6,0L168,151.64v37.23A110.46,110.46,0,0,1,128,196Zm76-31.27a93.21,93.21,0,0,1-12,10.81V138.39l12-6.62Z"></path></svg>


                   </div>

                   Neo Skill
                </a>
              
             
               
                {{-- NEW NAV LINK --}}
                 <a class="p-10 searchable nav-link pointer align-center clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/bank/add') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  ">
              <div class="icon-group">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M224,44H32A20,20,0,0,0,12,64V192a20,20,0,0,0,20,20H224a20,20,0,0,0,20-20V64A20,20,0,0,0,224,44Zm-4,24V88H36V68ZM36,188V112H220v76Zm172-24a12,12,0,0,1-12,12H164a12,12,0,0,1,0-24h32A12,12,0,0,1,208,164Zm-68,0a12,12,0,0,1-12,12H116a12,12,0,0,1,0-24h12A12,12,0,0,1,140,164Z"></path></svg>



                   </div>
                   Bank Settings
                 </a>
                 {{-- NEW NAV LINK --}}

                  <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/withdraw') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  ">
                 <div class="icon-group">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,144v64a12,12,0,0,1-12,12H40a12,12,0,0,1-12-12V144a12,12,0,0,1,24,0v52H204V144a12,12,0,0,1,24,0ZM96.49,80.49,116,61v83a12,12,0,0,0,24,0V61l19.51,19.52a12,12,0,1,0,17-17l-40-40a12,12,0,0,0-17,0l-40,40a12,12,0,1,0,17,17Z"></path></svg>




                   </div>
                 Place Withdrawal
                 </a>
                 {{-- NEW NAV LINK --}}
                <a class="p-10 align-center searchable nav-link pointer clip-10 w-full row g-5 no-u secondary-text"  onclick="
                  spa(event,'{{ url('users/transactions') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  ">
                     <div class="icon-group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H128a12,12,0,0,1,0-24h88A12,12,0,0,1,228,128ZM128,76h88a12,12,0,0,0,0-24H128a12,12,0,0,0,0,24Zm88,104H128a12,12,0,0,0,0,24h88a12,12,0,0,0,0-24ZM79.51,39.51,56,63l-7.51-7.52a12,12,0,0,0-17,17l16,16a12,12,0,0,0,17,0l32-32a12,12,0,0,0-17-17Zm0,64L56,127l-7.51-7.52a12,12,0,1,0-17,17l16,16a12,12,0,0,0,17,0l32-32a12,12,0,0,0-17-17Zm0,64L56,191l-7.51-7.52a12,12,0,1,0-17,17l16,16a12,12,0,0,0,17,0l32-32a12,12,0,0,0-17-17Z"></path></svg>




                   </div>


                    Transactions
                </a>
                
              
                 {{-- NEW NAV LINK --}}
                    <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="
                  spa(event,'{{ url('users/team') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  ">
                   <div class="icon-group">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C9.37665 1.25 7.25 3.37665 7.25 6C7.25 8.62335 9.37665 10.75 12 10.75C14.6234 10.75 16.75 8.62335 16.75 6C16.75 3.37665 14.6234 1.25 12 1.25ZM8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6C15.25 7.79493 13.7949 9.25 12 9.25C10.2051 9.25 8.75 7.79493 8.75 6Z" fill="CurrentColor"></path>
<path d="M18 3.25C17.5858 3.25 17.25 3.58579 17.25 4C17.25 4.41421 17.5858 4.75 18 4.75C19.3765 4.75 20.25 5.65573 20.25 6.5C20.25 7.34427 19.3765 8.25 18 8.25C17.5858 8.25 17.25 8.58579 17.25 9C17.25 9.41421 17.5858 9.75 18 9.75C19.9372 9.75 21.75 8.41715 21.75 6.5C21.75 4.58285 19.9372 3.25 18 3.25Z" fill="CurrentColor"></path>
<path d="M6.75 4C6.75 3.58579 6.41421 3.25 6 3.25C4.06278 3.25 2.25 4.58285 2.25 6.5C2.25 8.41715 4.06278 9.75 6 9.75C6.41421 9.75 6.75 9.41421 6.75 9C6.75 8.58579 6.41421 8.25 6 8.25C4.62351 8.25 3.75 7.34427 3.75 6.5C3.75 5.65573 4.62351 4.75 6 4.75C6.41421 4.75 6.75 4.41421 6.75 4Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.25C10.2157 12.25 8.56645 12.7308 7.34133 13.5475C6.12146 14.3608 5.25 15.5666 5.25 17C5.25 18.4334 6.12146 19.6392 7.34133 20.4525C8.56645 21.2692 10.2157 21.75 12 21.75C13.7843 21.75 15.4335 21.2692 16.6587 20.4525C17.8785 19.6392 18.75 18.4334 18.75 17C18.75 15.5666 17.8785 14.3608 16.6587 13.5475C15.4335 12.7308 13.7843 12.25 12 12.25ZM6.75 17C6.75 16.2242 7.22169 15.4301 8.17338 14.7956C9.11984 14.1646 10.4706 13.75 12 13.75C13.5294 13.75 14.8802 14.1646 15.8266 14.7956C16.7783 15.4301 17.25 16.2242 17.25 17C17.25 17.7758 16.7783 18.5699 15.8266 19.2044C14.8802 19.8354 13.5294 20.25 12 20.25C10.4706 20.25 9.11984 19.8354 8.17338 19.2044C7.22169 18.5699 6.75 17.7758 6.75 17Z" fill="CurrentColor"></path>
<path d="M19.2674 13.8393C19.3561 13.4347 19.7561 13.1787 20.1607 13.2674C21.1225 13.4783 21.9893 13.8593 22.6328 14.3859C23.2758 14.912 23.75 15.6352 23.75 16.5C23.75 17.3648 23.2758 18.088 22.6328 18.6141C21.9893 19.1407 21.1225 19.5217 20.1607 19.7326C19.7561 19.8213 19.3561 19.5653 19.2674 19.1607C19.1787 18.7561 19.4347 18.3561 19.8393 18.2674C20.6317 18.0936 21.2649 17.7952 21.6829 17.4532C22.1014 17.1108 22.25 16.7763 22.25 16.5C22.25 16.2237 22.1014 15.8892 21.6829 15.5468C21.2649 15.2048 20.6317 14.9064 19.8393 14.7326C19.4347 14.6439 19.1787 14.2439 19.2674 13.8393Z" fill="CurrentColor"></path>
<path d="M3.83935 13.2674C4.24395 13.1787 4.64387 13.4347 4.73259 13.8393C4.82132 14.2439 4.56525 14.6439 4.16065 14.7326C3.36829 14.9064 2.73505 15.2048 2.31712 15.5468C1.89863 15.8892 1.75 16.2237 1.75 16.5C1.75 16.7763 1.89863 17.1108 2.31712 17.4532C2.73505 17.7952 3.36829 18.0936 4.16065 18.2674C4.56525 18.3561 4.82132 18.7561 4.73259 19.1607C4.64387 19.5653 4.24395 19.8213 3.83935 19.7326C2.87746 19.5217 2.0107 19.1407 1.36719 18.6141C0.724248 18.088 0.25 17.3648 0.25 16.5C0.25 15.6352 0.724248 14.912 1.36719 14.3859C2.0107 13.8593 2.87746 13.4783 3.83935 13.2674Z" fill="CurrentColor"></path>
</svg>




                   </div>


                My Downlines
                 </a>


                      {{-- NEW NAV LINK --}}
                    <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u c-white" onclick="window.location.href='{{ url('users/forex/trading') }}'">
                   <div class="icon-group">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M236,208a12,12,0,0,1-12,12H32a12,12,0,0,1-12-12V48a12,12,0,0,1,24,0v99l43.51-43.52a12,12,0,0,1,17,0L128,127l43-43H160a12,12,0,0,1,0-24h40a12,12,0,0,1,12,12v40a12,12,0,0,1-24,0V101l-51.51,51.52a12,12,0,0,1-17,0L96,129,44,181v15H224A12,12,0,0,1,236,208Z"></path></svg>
           




                   </div>


               Forex Trading
                 </a>


                 {{-- NEW NAV LINK --}}
              
                 
              
               
               
                 
                 
                 <a class="p-10 searchable nav-link align-center pointer clip-10 w-full row g-5 no-u secondary-text"  onclick="
                  spa(event,'{{ url('users/account/settings') }}');
                  this.closest('nav').classList.add('mobile-display-none');   document.body.classList.remove('overflow-hidden');
                  ">
                      <div class="icon-group">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,76a52,52,0,1,0,52,52A52.06,52.06,0,0,0,128,76Zm0,80a28,28,0,1,1,28-28A28,28,0,0,1,128,156Zm113.86-49.57A12,12,0,0,0,236,98.34L208.21,82.49l-.11-31.31a12,12,0,0,0-4.25-9.12,116,116,0,0,0-38-21.41,12,12,0,0,0-9.68.89L128,37.27,99.83,21.53a12,12,0,0,0-9.7-.9,116.06,116.06,0,0,0-38,21.47,12,12,0,0,0-4.24,9.1l-.14,31.34L20,98.35a12,12,0,0,0-5.85,8.11,110.7,110.7,0,0,0,0,43.11A12,12,0,0,0,20,157.66l27.82,15.85.11,31.31a12,12,0,0,0,4.25,9.12,116,116,0,0,0,38,21.41,12,12,0,0,0,9.68-.89L128,218.73l28.14,15.74a12,12,0,0,0,9.7.9,116.06,116.06,0,0,0,38-21.47,12,12,0,0,0,4.24-9.1l.14-31.34,27.81-15.81a12,12,0,0,0,5.85-8.11A110.7,110.7,0,0,0,241.86,106.43Zm-22.63,33.18-26.88,15.28a11.94,11.94,0,0,0-4.55,4.59c-.54,1-1.11,1.93-1.7,2.88a12,12,0,0,0-1.83,6.31L184.13,199a91.83,91.83,0,0,1-21.07,11.87l-27.15-15.19a12,12,0,0,0-5.86-1.53h-.29c-1.14,0-2.3,0-3.44,0a12.08,12.08,0,0,0-6.14,1.51L93,210.82A92.27,92.27,0,0,1,71.88,199l-.11-30.24a12,12,0,0,0-1.83-6.32c-.58-.94-1.16-1.91-1.7-2.88A11.92,11.92,0,0,0,63.7,155L36.8,139.63a86.53,86.53,0,0,1,0-23.24l26.88-15.28a12,12,0,0,0,4.55-4.58c.54-1,1.11-1.94,1.7-2.89a12,12,0,0,0,1.83-6.31L71.87,57A91.83,91.83,0,0,1,92.94,45.17l27.15,15.19a11.92,11.92,0,0,0,6.15,1.52c1.14,0,2.3,0,3.44,0a12.08,12.08,0,0,0,6.14-1.51L163,45.18A92.27,92.27,0,0,1,184.12,57l.11,30.24a12,12,0,0,0,1.83,6.32c.58.94,1.16,1.91,1.7,2.88A11.92,11.92,0,0,0,192.3,101l26.9,15.33A86.53,86.53,0,0,1,219.23,139.61Z"></path></svg>






                   </div>

                      Settings
                 </a>
                 {{-- NEW NAV LINK --}}
                




                 
                 

                 <a class="p-10 w-full bg-red pointer clip-10 pos-sticky justify-center m-top-auto stick-bottom w-full row g-5 no-u c-white" href="{{ url('users/logout') }}">
               


                  Logout
                 </a>


            </div>

        </section>
    </nav>
    <main>
       
        @yield('main')
<section onclick="HidePopUp()" class="popup">
  <div onclick="event.stopPropagation()" class="child bg">
    @yield('popup')
  </div>
</section>
<section onclick="HideSlideUp()" class="slideup">
  <div onclick="event.stopPropagation()" class="child bg">@yield('slideup_child')</div>
</section>
    </main>
    {{-- footer --}}
    <footer style="z-index:3000;">
      {{-- footer child --}}
   <div class="child">
    {{-- home --}}
     <div onclick="
     let f_links=document.querySelectorAll('footer .f-links');
   f_links.forEach((data)=>{
   data.classList.remove('active')
   });
   this.classList.add('active');

    spa(event,'{{ url('users/dashboard') }}')" class="column f-links home-nav g-2 pc-pointer align-center p-10 br-1000 clip-1000">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M222.14,105.85l-80-80a20,20,0,0,0-28.28,0l-80,80A19.86,19.86,0,0,0,28,120v96a12,12,0,0,0,12,12H216a12,12,0,0,0,12-12V120A19.86,19.86,0,0,0,222.14,105.85ZM204,204H52V121.65l76-76,76,76Z"></path></svg>

<span>Home</span>


   </div>
   {{-- tasks --}}
   <div onclick="
   try{
   let f_links=document.querySelectorAll('footer .f-links');
   f_links.forEach((data)=>{
   data.classList.remove('active')
   });
   this.classList.add('active');

    
   
    spa(event,'{{ url('users/tasks') }}')
   }catch(error){
   CreateNotify('error',error.stack);
   }
    " class="column pc-pointer f-links w-full g-2 p-5 align-center">
    <div class="icon transition-ease-full w-full br-1000 column justify-center p-2">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228.75,100.05c-3.52-3.67-7.15-7.46-8.34-10.33-1.06-2.56-1.14-7.83-1.21-12.47-.15-10-.34-22.44-9.18-31.27s-21.27-9-31.27-9.18c-4.64-.07-9.91-.15-12.47-1.21-2.87-1.19-6.66-4.82-10.33-8.34C148.87,20.46,140.05,12,128,12s-20.87,8.46-27.95,15.25c-3.67,3.52-7.46,7.15-10.33,8.34-2.56,1.06-7.83,1.14-12.47,1.21C67.25,37,54.81,37.14,46,46S37,67.25,36.8,77.25c-.07,4.64-.15,9.91-1.21,12.47-1.19,2.87-4.82,6.66-8.34,10.33C20.46,107.13,12,116,12,128S20.46,148.87,27.25,156c3.52,3.67,7.15,7.46,8.34,10.33,1.06,2.56,1.14,7.83,1.21,12.47.15,10,.34,22.44,9.18,31.27s21.27,9,31.27,9.18c4.64.07,9.91.15,12.47,1.21,2.87,1.19,6.66,4.82,10.33,8.34C107.13,235.54,116,244,128,244s20.87-8.46,27.95-15.25c3.67-3.52,7.46-7.15,10.33-8.34,2.56-1.06,7.83-1.14,12.47-1.21,10-.15,22.44-.34,31.27-9.18s9-21.27,9.18-31.27c.07-4.64.15-9.91,1.21-12.47,1.19-2.87,4.82-6.66,8.34-10.33C235.54,148.87,244,140.05,244,128S235.54,107.13,228.75,100.05Zm-17.32,39.29c-4.82,5-10.28,10.72-13.19,17.76-2.82,6.8-2.93,14.16-3,21.29-.08,5.36-.19,12.71-2.15,14.66s-9.3,2.07-14.66,2.15c-7.13.11-14.49.22-21.29,3-7,2.91-12.73,8.37-17.76,13.19C135.78,214.84,130.4,220,128,220s-7.78-5.16-11.34-8.57c-5-4.82-10.72-10.28-17.76-13.19-6.8-2.82-14.16-2.93-21.29-3-5.36-.08-12.71-.19-14.66-2.15s-2.07-9.3-2.15-14.66c-.11-7.13-.22-14.49-3-21.29-2.91-7-8.37-12.73-13.19-17.76C41.16,135.78,36,130.4,36,128s5.16-7.78,8.57-11.34c4.82-5,10.28-10.72,13.19-17.76,2.82-6.8,2.93-14.16,3-21.29C60.88,72.25,61,64.9,63,63s9.3-2.07,14.66-2.15c7.13-.11,14.49-.22,21.29-3,7-2.91,12.73-8.37,17.76-13.19C120.22,41.16,125.6,36,128,36s7.78,5.16,11.34,8.57c5,4.82,10.72,10.28,17.76,13.19,6.8,2.82,14.16,2.93,21.29,3,5.36.08,12.71.19,14.66,2.15s2.07,9.3,2.15,14.66c.11,7.13.22,14.49,3,21.29,2.91,7,8.37,12.73,13.19,17.76,3.41,3.56,8.57,8.94,8.57,11.34S214.84,135.78,211.43,139.34ZM176.49,95.51a12,12,0,0,1,0,17l-56,56a12,12,0,0,1-17,0l-24-24a12,12,0,1,1,17-17L112,143l47.51-47.52A12,12,0,0,1,176.49,95.51Z"></path></svg>



   </div>
    <span class="transition-ease-full">Tasks</span>
   </div>
   {{-- withdraw --}}
   <div onclick="
   try{
   let f_links=document.querySelectorAll('footer .f-links');
  f_links.forEach((data)=>{
   data.classList.remove('active')
   });
   this.classList.add('active');

    spa(event,'{{ url('users/withdraw') }}')
   }catch(error){
   CreateNotify('error',error.stack);
   }
    " class="column f-links pc-pointer w-full p-5 g-2 align-center">
    <div class="icon transition-ease-full w-full br-1000 column justify-center p-2">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,144v64a12,12,0,0,1-12,12H40a12,12,0,0,1-12-12V144a12,12,0,0,1,24,0v52H204V144a12,12,0,0,1,24,0ZM96.49,80.49,116,61v83a12,12,0,0,0,24,0V61l19.51,19.52a12,12,0,1,0,17-17l-40-40a12,12,0,0,0-17,0l-40,40a12,12,0,1,0,17,17Z"></path></svg>



    </div>
    <span class="transition-ease-full">Withdraw</span>
   </div>
   
   {{-- team --}}
    <div onclick="
   try{
   let f_links=document.querySelectorAll('footer .f-links');
   f_links.forEach((data)=>{
   data.classList.remove('active')
   });
   this.classList.add('active');

    spa(event,'{{ url('users/team') }}');
   }catch(error){
   CreateNotify('error',error.stack);
   }
    " class="column f-links pc-pointer w-full p-5 g-2 align-center">
  <div class="icon transition-ease-full w-full br-1000 column justify-center p-2">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C9.37665 1.25 7.25 3.37665 7.25 6C7.25 8.62335 9.37665 10.75 12 10.75C14.6234 10.75 16.75 8.62335 16.75 6C16.75 3.37665 14.6234 1.25 12 1.25ZM8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6C15.25 7.79493 13.7949 9.25 12 9.25C10.2051 9.25 8.75 7.79493 8.75 6Z" fill="CurrentColor"></path>
<path d="M18 3.25C17.5858 3.25 17.25 3.58579 17.25 4C17.25 4.41421 17.5858 4.75 18 4.75C19.3765 4.75 20.25 5.65573 20.25 6.5C20.25 7.34427 19.3765 8.25 18 8.25C17.5858 8.25 17.25 8.58579 17.25 9C17.25 9.41421 17.5858 9.75 18 9.75C19.9372 9.75 21.75 8.41715 21.75 6.5C21.75 4.58285 19.9372 3.25 18 3.25Z" fill="CurrentColor"></path>
<path d="M6.75 4C6.75 3.58579 6.41421 3.25 6 3.25C4.06278 3.25 2.25 4.58285 2.25 6.5C2.25 8.41715 4.06278 9.75 6 9.75C6.41421 9.75 6.75 9.41421 6.75 9C6.75 8.58579 6.41421 8.25 6 8.25C4.62351 8.25 3.75 7.34427 3.75 6.5C3.75 5.65573 4.62351 4.75 6 4.75C6.41421 4.75 6.75 4.41421 6.75 4Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.25C10.2157 12.25 8.56645 12.7308 7.34133 13.5475C6.12146 14.3608 5.25 15.5666 5.25 17C5.25 18.4334 6.12146 19.6392 7.34133 20.4525C8.56645 21.2692 10.2157 21.75 12 21.75C13.7843 21.75 15.4335 21.2692 16.6587 20.4525C17.8785 19.6392 18.75 18.4334 18.75 17C18.75 15.5666 17.8785 14.3608 16.6587 13.5475C15.4335 12.7308 13.7843 12.25 12 12.25ZM6.75 17C6.75 16.2242 7.22169 15.4301 8.17338 14.7956C9.11984 14.1646 10.4706 13.75 12 13.75C13.5294 13.75 14.8802 14.1646 15.8266 14.7956C16.7783 15.4301 17.25 16.2242 17.25 17C17.25 17.7758 16.7783 18.5699 15.8266 19.2044C14.8802 19.8354 13.5294 20.25 12 20.25C10.4706 20.25 9.11984 19.8354 8.17338 19.2044C7.22169 18.5699 6.75 17.7758 6.75 17Z" fill="CurrentColor"></path>
<path d="M19.2674 13.8393C19.3561 13.4347 19.7561 13.1787 20.1607 13.2674C21.1225 13.4783 21.9893 13.8593 22.6328 14.3859C23.2758 14.912 23.75 15.6352 23.75 16.5C23.75 17.3648 23.2758 18.088 22.6328 18.6141C21.9893 19.1407 21.1225 19.5217 20.1607 19.7326C19.7561 19.8213 19.3561 19.5653 19.2674 19.1607C19.1787 18.7561 19.4347 18.3561 19.8393 18.2674C20.6317 18.0936 21.2649 17.7952 21.6829 17.4532C22.1014 17.1108 22.25 16.7763 22.25 16.5C22.25 16.2237 22.1014 15.8892 21.6829 15.5468C21.2649 15.2048 20.6317 14.9064 19.8393 14.7326C19.4347 14.6439 19.1787 14.2439 19.2674 13.8393Z" fill="CurrentColor"></path>
<path d="M3.83935 13.2674C4.24395 13.1787 4.64387 13.4347 4.73259 13.8393C4.82132 14.2439 4.56525 14.6439 4.16065 14.7326C3.36829 14.9064 2.73505 15.2048 2.31712 15.5468C1.89863 15.8892 1.75 16.2237 1.75 16.5C1.75 16.7763 1.89863 17.1108 2.31712 17.4532C2.73505 17.7952 3.36829 18.0936 4.16065 18.2674C4.56525 18.3561 4.82132 18.7561 4.73259 19.1607C4.64387 19.5653 4.24395 19.8213 3.83935 19.7326C2.87746 19.5217 2.0107 19.1407 1.36719 18.6141C0.724248 18.088 0.25 17.3648 0.25 16.5C0.25 15.6352 0.724248 14.912 1.36719 14.3859C2.0107 13.8593 2.87746 13.4783 3.83935 13.2674Z" fill="CurrentColor"></path>
</svg>


  </div>
      <span class="transition-ease-full">Team</span>
   </div>
    
   </div>
   
    </footer>

    <script src="{{ asset('vitecss/js/app.js?v='.config('versions.vite_version').'') }}"></script>
    <script>
      async function SwitchMode(element,light_link,dark_link){
       try{
         if(element.classList.contains('active')){
           element.classList.remove('active');
          // let link=document.createElement('link');
          // link.href=light_link;
          // link.rel='stylesheet';
          // link.classList.add('mode_css');
          document.querySelector('link.mode_css').href=dark_link;
      
          let response=await fetch( element.dataset.link + dark_link);
          
         
        }else{
          element.classList.add('active');
          // let link=document.createElement('link');
          // link.href=dark_link;
          // link.rel='stylesheget';
          // link.classList.add('mode_css');
          document.querySelector('link.mode_css').href=light_link;
           let response=await fetch( element.dataset.link + light_link);
           
        }
       }catch(error){
        alert(error.stack)
       }
      }
window.onload=function(){
        document.querySelector('.loader').remove();
        document.querySelector('body').classList.remove('overflow-hidden');
       
  let max_bottom=document.querySelector('footer').getBoundingClientRect().bottom;
  document.querySelector('main').style.paddingBottom=max_bottom - document.querySelector('.home-nav').getBoundingClientRect().top + 'px'; 
//  alert(document.querySelector('header').getBoundingClientRect().bottom + 'px')
  document.querySelector('.profile-links').style.top=(document.querySelector('.profile-icon').getBoundingClientRect().height + 15) + 'px';
   document.querySelector('.currency-links').style.top=(document.querySelector('.currency-icon').getBoundingClientRect().height + 15) + 'px';
 
  // document.querySelector('main').style.paddingBottom=document.querySelector('footer').offsetHeight + 'px';
}
    </script>
    @yield('js')
</body>
</html>