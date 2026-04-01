@extends('layout.users.app')
@section('title')
    Colors Game
@endsection
@section('css')
    <style class="css">
    body{
        overflow:hidden;
    }
    .cards.shuffling{
        animation:shuffling 0.5s linear infinite;
    }
    @keyframes shuffling{
        0%,50%,100%{
            transform:rotate(0deg);
        }
        25%{
            transform:rotate(5deg);
        }
        75%{
            transform: rotate(-5deg)
        }
    }
     .populate.shown .form{
            animation:opaq-in 0.5s ease forwards;
            
        }
        @keyframes opaq-in{
            0%{
                opacity:0;
                transform:scale(0.9)
            }
            100%{
                opacity:1;
                transform:scale(1);
            }
        }
        .cards.turned{
            transform:rotateY(180deg);
        }
    </style>
@endsection
@section('main')
    <section class="w-full body overflow-auto no-scrollbar p-10 pos-fixed z-index-5000 bg top-0 left-0 right-0 bottom-0 column">
       <div class="w-full head bg-inherit align-center space-between row g-10 pos-fixed top-0 left-0 right-0 z-index-1000 p-20">
        <div onclick="spa(event,'{{ url('users/games') }}')" class="w-30 h-30 bg-secondary-dark circle column pc-pointer justify-center">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.5303 5.46967C10.8232 5.76256 10.8232 6.23744 10.5303 6.53033L5.81066 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H5.81066L10.5303 17.4697C10.8232 17.7626 10.8232 18.2374 10.5303 18.5303C10.2374 18.8232 9.76256 18.8232 9.46967 18.5303L3.46967 12.5303C3.17678 12.2374 3.17678 11.7626 3.46967 11.4697L9.46967 5.46967C9.76256 5.17678 10.2374 5.17678 10.5303 5.46967Z" fill="CurrentColor"></path>
</svg>

        </div>
        <div class="w-fit br-1000 row align-center p-10 g-10 h-fit border-1 border-color-secondary bg-secondary-dark">
            <div class="row g-10 align-center">
                <div class="c-secondary"><svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M21.1009 8.00353C21.0442 7.99996 20.9825 7.99998 20.9186 8L20.9026 8.00001H18.3941C16.3264 8.00001 14.5572 9.62757 14.5572 11.75C14.5572 13.8724 16.3264 15.5 18.3941 15.5H20.9026L20.9186 15.5C20.9825 15.5 21.0442 15.5001 21.1009 15.4965C21.9408 15.4434 22.6835 14.7862 22.746 13.8682C22.7501 13.808 22.75 13.7431 22.75 13.683L22.75 13.6667V9.83334L22.75 9.81702C22.75 9.75688 22.7501 9.69199 22.746 9.6318C22.6835 8.71381 21.9408 8.05657 21.1009 8.00353ZM18.1717 12.75C18.704 12.75 19.1355 12.3023 19.1355 11.75C19.1355 11.1977 18.704 10.75 18.1717 10.75C17.6394 10.75 17.2078 11.1977 17.2078 11.75C17.2078 12.3023 17.6394 12.75 18.1717 12.75Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.9179 17C21.067 16.9961 21.1799 17.1342 21.1394 17.2778C20.9387 17.9902 20.62 18.5975 20.1088 19.1088C19.3604 19.8571 18.4114 20.1892 17.239 20.3469C16.0998 20.5 14.6442 20.5 12.8064 20.5H10.6936C8.85583 20.5 7.40019 20.5 6.26098 20.3469C5.08856 20.1892 4.13961 19.8571 3.39124 19.1088C2.64288 18.3604 2.31076 17.4114 2.15314 16.239C1.99997 15.0998 1.99998 13.6442 2 11.8064V11.6936C1.99998 9.85583 1.99997 8.40019 2.15314 7.26098C2.31076 6.08856 2.64288 5.13961 3.39124 4.39124C4.13961 3.64288 5.08856 3.31076 6.26098 3.15314C7.40019 2.99997 8.85582 2.99998 10.6936 3L12.8064 3C14.6442 2.99998 16.0998 2.99997 17.239 3.15314C18.4114 3.31076 19.3604 3.64288 20.1088 4.39124C20.62 4.90252 20.9386 5.50974 21.1394 6.22218C21.1799 6.36575 21.067 6.50387 20.9179 6.5L18.394 6.50001C15.5574 6.50001 13.0571 8.74091 13.0571 11.75C13.0571 14.7591 15.5574 17 18.394 17L20.9179 17ZM7 15.5C6.58579 15.5 6.25 15.1642 6.25 14.75V8.75C6.25 8.33579 6.58579 8 7 8C7.41421 8 7.75 8.33579 7.75 8.75V14.75C7.75 15.1642 7.41421 15.5 7 15.5Z" fill="CurrentColor"></path>
</svg>
</div>
<div class="deposit_balance">&#8358;{{ number_format(Auth::guard('users')->user()->deposit_balance,2) }}</div>
<div style="background: var(--secondary)" onclick="
            event.stopPropagation();
            document.querySelector('.populate').classList.remove('display-none');
             document.querySelector('.populate').classList.add('shown');
            document.body.classList.add('overflow-hidden')" class="p-5 no-select pointer p-x-10 br-1000 clip-1000">Deposit</div>
            </div>
        
        </div>
       </div>
        <strong style="font-weight: 900;font-size:2rem;" class="desc c-primary">Color Match Game</strong>
        <span>Match the correct color indicated by the box by clicking on the cards/boxes below</span>
       <div style="border:1px solid var(--secondary)" class="w-fit align-center column g-5 br-5  m-y-10 m-x-auto border-1 p-10 bg-secondary-dark">
        <div class="row w-full g-10 align-center">
          
            <div onclick="
            if( document.querySelector('input.amount').value / 2 < {{ ConvertCurrency(500,'NIGERIA',strtoupper(Auth::guard('users')->user()->country)) }}){
             document.querySelector('input.amount').value = {{ ConvertCurrency(500,'NIGERIA',strtoupper(Auth::guard('users')->user()->country)) }};
            }else{
             document.querySelector('input.amount').value = document.querySelector('input.amount').value / 2;
             
            }
              " style="background: var(--secondary)" class="h-40 no-select pointer perfect-square no-shrink br-5 column justify-center">-</div>
            <input type="number" value="{{ ConvertCurrency(500,'NIGERIA',strtoupper(Auth::guard('users')->user()->country)) }}" style="border:1px solid var(--secondary)" class="inp amount bg-black-transparent input h-40 w-100 br-5 border-1">
              <div onclick="
              document.querySelector('input.amount').value = document.querySelector('input.amount').value * 2;
              " style="background: var(--secondary)" class="h-40 no-select pointer perfect-square no-shrink br-5 column justify-center">+</div>
        </div>
        <strong>BET AMOUNT</strong>
       </div>
        <div class="row w-full m-top-20 align-center g-10">
           <span class="desc bold">Find the color</span>
            <div data-text="{{ $color[1] }}" class="min-w-100 color-box row justify-center w-fit br-5 bg-{{ $color[0] }} c-{{ $color[1] }} p-10 bold">
                {{ strtoupper($color[0]) }}
            </div>
        </div>
        <input type="hidden" name="color" class="c-black" value="{{ $color[0] }}">
        <div class="grid pc-grid-6 grid-3 w-full place-center p-20 g-20">
            
            @for ($i = 0; $i < 12; $i++)
            <div onclick="
            document.querySelectorAll('.cards').forEach((card)=>{
            card.classList.remove('clicked');
            card.classList.add('disabled');
            })
            this.classList.add('clicked');

           GetRequest(event,'{{ url('users/get/color/game/play/process?color=') }}' + document.querySelector('input[name=color]').value + '&amount=' + document.querySelector('input.amount').value,document.createElement('div'),MyFunc.Played);
            " style="font-size:2rem;transition:all ease 0.5s" class="w-full cards bold column justify-center perfect-square br-10 no-shrink bg-dim">
              <span>?</span>
            </div>
                
            @endfor
           
             
        </div>
         <div class="row g-10 justify-center w-full align-center m-x-auto">
                <div onclick="
                document.querySelectorAll('.cards').forEach((card)=>{
                card.classList.add('shuffling');
                });
                setTimeout(()=>{
                 document.querySelectorAll('.cards').forEach((card)=>{
                card.classList.remove('shuffling');
                });
                },1000)
                    " class="h-30 bg-primary primary-text bold column justify-center no-select pc-pointer br-5  min-w-100">
                    Shuffle Cards
                </div>
                  <div class="h-30 bg-primary primary-text bold column justify-center no-select pc-pointer br-5  min-w-100">
                    Games Center
                </div>
            </div>
    </section>
    @include('components.sections',[
        'populate' => true
    ])
@endsection
@section('js')
    <script class="js">
        window.MyFunc={
            StyleUp : function(){
                try {
                  //  alert(document.querySelector('.head').getBoundingClientRect().height)
                      document.querySelector('.body').style.paddingTop=document.querySelector('.head').getBoundingClientRect().height + 'px';
           
                } catch (error) {
                    alert(error.stack)
                }
               },
                Redeemed : function(response,event){
            let data=JSON.parse(response);
          
            document.querySelector('.prompt.' + data.status).innerHTML=(data.message).toUpperCase();
           document.querySelector('.prompt.' + data.status).classList.remove('display-none');
           if(data.status == 'success'){
            document.querySelector('.close-modal').onclick=function(){
                spa(event,'{{ url()->current() }}');
            }
           }else{
              document.querySelector('.close-modal').onclick=function(){
                document.querySelector('.populate').classList.add('display-none');
                 document.querySelector('.populate').classList.remove('shown');
            document.body.classList.remove('overflow-hidden')
            }
            
           }

           },
           Played : function(response,event){
          
           let data=JSON.parse(response);
           CreateNotify(data.status,data.message);
           if(data.status == 'success'){
             document.querySelector('.cards.clicked').classList.add('turned');
            document.querySelector('.cards.clicked').classList.forEach((cls)=>{
                if(cls.startsWith('bg-')){
                     document.querySelector('.cards.clicked').classList.remove(cls);
                }
                //  if(cls.startsWith('c-')){
                //      document.querySelector('.cards.clicked').classList.remove(cls);
                // }
            });
            document.querySelector('.cards.clicked').classList.add('bg-' + data.choice)
            document.querySelector('.cards.clicked').querySelector('span').classList.add('display-none');
           document.querySelector('.deposit_balance').innerHTML=`&#8358;${data.balance}`;
            //  document.querySelector('.cards.clicked').classList.add('c-' + data.choice_text)
          setTimeout(()=>{
              document.querySelector('.color-box').classList.remove('bg-' + document.querySelector('.color-box').innerText.toLowerCase());
           document.querySelector('.color-box').classList.remove('c-' + document.querySelector('.color-box').dataset.text); 
            document.querySelector('.color-box').classList.add('bg-' + data.color);
            document.querySelector('.color-box').classList.add('c-' + data.text_color);
            document.querySelector('.color-box').innerText=(data.color).toUpperCase();
            document.querySelector('.color-box').dataset.text=data.text_color;
            document.querySelector('input[name=color]').value = data.color;
             document.querySelector('.cards.clicked').classList.remove('turned');
              document.querySelector('.cards.clicked').classList.forEach((cls)=>{
                if(cls.startsWith('bg-')){
                     document.querySelector('.cards.clicked').classList.remove(cls);
                }
                //  if(cls.startsWith('c-')){
                //      document.querySelector('.cards.clicked').classList.remove(cls);
                // }
            });
             document.querySelector('.cards.clicked').classList.add('bg-dim');
              document.querySelector('.cards.clicked').querySelector('span').classList.remove('display-none');
             //document.querySelector('.cards.clicked').classList.add('c-white')
              document.querySelectorAll('.cards').forEach((card)=>{
         
            card.classList.remove('disabled');
            })
          },2000)
           
           }
            
           }
        }
        MyFunc.StyleUp();
    </script>
@endsection