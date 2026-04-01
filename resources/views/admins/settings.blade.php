@extends('layout.admins.app')
@section('title')
    Site Settings
@endsection
@section('main')
    <section class="column w-full p-10 g-10">
         <form action="{{ url('admins/post/social/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="w-full p-10 g-5 column bg-white box-shadow br-10">
            <div class="row g-5 align-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="var(--bg-secondary)" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.5487 21.5277L10.7988 21.1053C11.1996 20.4282 11.3999 20.0897 11.7191 19.9009C12.0383 19.712 12.4547 19.6987 13.2874 19.6721C14.0682 19.6471 14.593 19.579 15.0417 19.3931C15.9864 19.0018 16.7369 18.2513 17.1282 17.3066C17.4217 16.5981 17.4217 15.6999 17.4217 13.9035V13.1324C17.4217 10.6083 17.4217 9.34622 16.8536 8.4191C16.5357 7.90033 16.0995 7.46416 15.5807 7.14626C14.6536 6.57813 13.3916 6.57812 10.8675 6.57812H8.55422C6.03013 6.57812 4.76808 6.57813 3.84097 7.14626C3.3222 7.46416 2.88604 7.90033 2.56813 8.4191C2 9.34622 2 10.6083 2 13.1324V13.9035C2 15.6999 2 16.5981 2.29348 17.3066C2.68478 18.2513 3.43533 19.0018 4.38002 19.3931C4.82871 19.579 5.35348 19.6471 6.13427 19.6721C6.96698 19.6987 7.38334 19.712 7.70253 19.9009C8.02172 20.0897 8.2221 20.4282 8.62285 21.1053L8.87291 21.5277C9.24547 22.1572 10.1762 22.1572 10.5487 21.5277ZM13.0843 14.289C13.6167 14.289 14.0482 13.8574 14.0482 13.3251C14.0482 12.7928 13.6167 12.3613 13.0843 12.3613C12.552 12.3613 12.1205 12.7928 12.1205 13.3251C12.1205 13.8574 12.552 14.289 13.0843 14.289ZM10.6747 13.3251C10.6747 13.8574 10.2432 14.289 9.71084 14.289C9.17852 14.289 8.74699 13.8574 8.74699 13.3251C8.74699 12.7928 9.17852 12.3613 9.71084 12.3613C10.2432 12.3613 10.6747 12.7928 10.6747 13.3251ZM6.33735 14.289C6.86967 14.289 7.30121 13.8574 7.30121 13.3251C7.30121 12.7928 6.86967 12.3613 6.33735 12.3613C5.80503 12.3613 5.37349 12.7928 5.37349 13.3251C5.37349 13.8574 5.80503 14.289 6.33735 14.289Z" fill="var(--bg-secondary)"></path>
<path d="M15.1696 2C16.3214 1.99999 17.2372 1.99999 17.9717 2.06982C18.7249 2.14143 19.3617 2.29154 19.9289 2.63915C20.5125 2.9968 21.0032 3.48748 21.3608 4.0711C21.7085 4.63836 21.8586 5.27514 21.9302 6.02829C22 6.76279 22 7.67871 22 8.83039V9.61699C22 10.4367 22 11.0886 21.9639 11.6173C21.927 12.1581 21.85 12.6226 21.6698 13.0575C21.2296 14.1202 20.3853 14.9646 19.3225 15.4048C19.2959 15.4158 19.2692 15.4265 19.2423 15.4367C19.114 15.4858 19.0042 15.5278 18.9077 15.5591C18.9217 15.0903 18.9217 14.5563 18.9217 13.9537V13.0614C18.9217 11.8598 18.9217 10.8532 18.8439 10.0349C18.7625 9.17817 18.5853 8.37421 18.1325 7.63536C17.6909 6.91475 17.0851 6.30889 16.3645 5.8673C15.6256 5.41453 14.8217 5.23733 13.9649 5.15588C13.1466 5.07807 12.14 5.07809 10.9384 5.07812H8.48326C7.66717 5.0781 6.94105 5.07809 6.30276 5.10245C6.3325 4.9994 6.37324 4.88128 6.42106 4.74264C6.5024 4.50682 6.60519 4.28381 6.73554 4.0711C7.09318 3.48748 7.58386 2.9968 8.16748 2.63915C8.73473 2.29154 9.37152 2.14143 10.1247 2.06982C10.8592 1.99999 11.775 1.99999 12.9268 2H15.1696Z" fill="var(--bg-secondary)"></path>
</svg>
  <span class="desc bold c-bg-secondary ws-nowrap">Social Settings</span>
                
            </div>
            <hr>
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="input">
            <label for="">Whatsapp Group/Channel Link</label>
            <div class="cont w-full h-50 br-10 border-1 border-color-silver bg-dim">
                <input value="{{ $social->whatsapp ?? '' }}" type="url" placeholder="E.g https://wa.me/your-whatsapp-group" name="whatsapp"  class="inp required input h-full w-full no-border bg-transparent br-10">
            </div>
             <label for="">Telegram Group/Channel Link</label>
            <div class="cont w-full h-50 br-10 border-1 border-color-silver bg-dim">
                <input value="{{ $social->telegram ?? '' }}" type="url" placeholder="E.g https://t.me/your-telegram-group" name="telegram"  class="inp required input h-full w-full no-border bg-transparent br-10">
            </div>
             <label for="">Forex Trading Group Link</label>
            <div class="cont w-full h-50 br-10 border-1 border-color-silver bg-dim">
                <input value="{{ $social->forex->group ?? '' }}" type="url" placeholder="E.g https://t.me/your-forex-trading-group-link" name="trading_group"  class="inp required input h-full w-full no-border bg-transparent br-10">
            </div>
              <label for="">Trading Link</label>
            <div class="cont w-full h-50 br-10 border-1 border-color-silver bg-dim">
                <input value="{{ $social->forex->link ?? '' }}" type="url" placeholder="E.g https://t.me/your-forex-trading-link" name="trading_link"  class="inp required input h-full w-full no-border bg-transparent br-10">
            </div>
            <label for="">Site Notification</label>
            <div class="cont w-full border-1 border-color-silver br-10 clip-10 h-200 bg-dim">
                <textarea placeholder="Type Site notification here ...." name="notification" id="" cols="30" rows="10" class="inp input w-full h-full border-none placeholder-bold bold bg-dim br-10">{{ $social->notification ?? '' }}</textarea>
            </div>
            <button class="post bg-secondary secondary-text"><span>Update Social Settings</span></button>
        </form>
        <form action="{{ url('admins/post/general/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="w-full p-10 g-5 column bg-white box-shadow br-10">
            <div class="row g-5 align-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--bg-secondary)" viewBox="0 0 256 256"><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path></svg>
                <span class="desc bold c-bg-secondary ws-nowrap">General Settings</span>
                
            </div>
            <hr>
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="input">
            <label for="">Spin & Win Minimum Reward</label>
            <div class="cont w-full h-50 br-10 border-1 border-color-silver bg-dim">
                <input value="{{ $general->spin_minimum ?? 0 }}" type="number" placeholder="E.g 500" name="spin_minimum"  class="inp required input h-full w-full no-border bg-transparent br-10">
            </div>
             <label for="">Spin & Win Maximum Reward</label>
            <div class="cont w-full h-50 br-10 border-1 border-color-silver bg-dim">
                <input value="{{ $general->spin_maximum ?? 0 }}" type="number" placeholder="E.g 1500" name="spin_maximum"  class="inp required input h-full w-full no-border bg-transparent br-10">
            </div>
            <button class="post bg-secondary secondary-text"><span>Update General Settings</span></button>
        </form>
          <form action="{{ url('admins/post/finance/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="w-full p-10 g-5 column bg-white box-shadow br-10">
            <div class="row g-5 align-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--bg-secondary)" viewBox="0 0 256 256"><path d="M224,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Zm0,16V88H32V64Zm0,128H32V104H224v88Zm-16-24a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h32A8,8,0,0,1,208,168Zm-64,0a8,8,0,0,1-8,8H120a8,8,0,0,1,0-16h16A8,8,0,0,1,144,168Z"></path></svg>
               <span class="desc bold c-bg-secondary ws-nowrap">Finance Settings</span>
                
            </div>
            <hr>
              <label for="">Airtime Portal</label>
           <div class="w-full p-10 column g-5 bg-secondary-light br-10 border-1 border-color-bg">
            <div class="row space-between g-10 align-center w-full">
                <strong class="desc c-bg">Airtime Portal</strong>
                <div class="toggle {{ ($finance->vtu->airtime ?? 'active') == 'open' ? 'active' : '' }}"><div onclick="
                if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                document.querySelector('input[name=airtime_portal]').value='closed';
                }else{
                this.closest('.toggle').classList.add('active');
             document.querySelector('input[name=airtime_portal]').value='open';
                }
                " class="child"></div></div>
            </div>
            <input type="hidden" class="input" value="{{ $finance->vtu->airtime ?? 'active' }}" name="airtime_portal">
        
          
           </div>
            <label for="">Data Portal</label>
           <div class="w-full p-10 column g-5 bg-secondary-light br-10 border-1 border-color-bg">
            <div class="row space-between g-10 align-center w-full">
                <strong class="desc c-bg">Data Portal</strong>
                <div class="toggle {{ ($finance->vtu->data ?? 'active') == 'open' ? 'active' : '' }}"><div onclick="
                if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                document.querySelector('input[name=data_portal]').value='closed';
                }else{
                this.closest('.toggle').classList.add('active');
             document.querySelector('input[name=data_portal]').value='open';
                }
                " class="child"></div></div>
            </div>
            <input type="hidden" class="input" value="{{ $finance->vtu->data ?? 'active' }}" name="data_portal">
        
          
           </div>
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="input">
            <label for="">Activities Wallet</label>
           <div class="w-full p-10 column g-5 bg-secondary-light br-10 border-1 border-color-bg">
            <div class="row space-between g-10 align-center w-full">
                <strong class="desc c-bg">Withdrawal Portal</strong>
                <div class="toggle {{ $finance->wallets->activities->portal == 'open' ? 'active' : '' }}"><div onclick="
                if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                document.querySelector('input[name=activities_withdrawal_portal]').value='closed';
                }else{
                this.closest('.toggle').classList.add('active');
             document.querySelector('input[name=activities_withdrawal_portal]').value='open';
                }
                " class="child"></div></div>
            </div>
            <input type="hidden" class="input" value="{{ $finance->wallets->activities->portal ?? 'active' }}" name="activities_withdrawal_portal">
            <label for="" class="text-dim m-top-5">Minimum Withdrawal</label>
            <div class="cont  br-10 clip-10 overflow-hidden w-full h-50 br-10 border-1 border-color-silver bg-white">
                <input  readonly style="background:rgb(187, 182, 182);color:white;" value="{{ $finance->wallets->activities->minimum ?? 0 }}" type="number" placeholder="E.g 500" name="activities_minimum_withdrawal"  class="inp required input h-full w-full no-border bg-transparent br-5">
            </div>
           </div>
            <label for="">Affiliate Wallet</label>
           <div class="w-full p-10 column g-5 bg-secondary-light br-10 border-1 border-color-bg">
            <div class="row space-between g-10 align-center w-full">
                <strong class="desc c-bg">Withdrawal Portal</strong>
                <div class="toggle {{ $finance->wallets->affiliate->portal == 'open' ? 'active' : '' }}"><div onclick="
                if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                 document.querySelector('input[name=affiliate_withdrawal_portal]').value='closed';
                }else{
                this.closest('.toggle').classList.add('active');
             document.querySelector('input[name=affiliate_withdrawal_portal]').value='open';
                }
                " class="child"></div></div>
            </div>
            <input type="hidden" value="{{ $finance->wallets->activities->portal ?? 'active' }}" class="input" name="affiliate_withdrawal_portal">
            <label for="" class="text-dim m-top-5">Minimum Withdrawal</label>
            <div class="cont w-full h-50 br-10 clip-10 overflow-hidden border-1 border-color-silver bg-white">
                <input readonly style="background:rgb(187, 182, 182);color:white;" value="{{ $finance->wallets->affiliate->minimum ?? 0 }}" type="number" placeholder="E.g 500" name="affiliate_minimum_withdrawal"  class="inp required input h-full w-full no-border bg-transparent br-5">
            </div>
           </div>
            <label for="">Games Wallet</label>
           <div class="w-full p-10 column g-5 bg-secondary-light br-10 border-1 border-color-bg">
            <div class="row space-between g-10 align-center w-full">
                <strong class="desc c-bg">Withdrawal Portal</strong>
                <div class="toggle {{ $finance->wallets->games->portal == 'open' ? 'active' : '' }}"><div onclick="
                if(this.closest('.toggle').classList.contains('active')){
                this.closest('.toggle').classList.remove('active');
                 document.querySelector('input[name=games_withdrawal_portal]').value='closed';
                }else{
                this.closest('.toggle').classList.add('active');
             document.querySelector('input[name=games_withdrawal_portal]').value='open';
                }
                " class="child"></div></div>
            </div>
            <input type="hidden" value="{{ $finance->wallets->games->portal ?? 'active' }}" class="input" name="games_withdrawal_portal">
            <label for="" class="text-dim m-top-5">Minimum Withdrawal</label>
            <div class="cont w-full h-50 br-10 clip-10 overflow-hidden border-1 border-color-silver bg-white">
                <input value="{{ $finance->wallets->games->minimum ?? 0 }}" type="number" placeholder="E.g 500" name="games_minimum_withdrawal"  class="inp required input h-full w-full no-border bg-transparent br-5">
            </div>
           </div>
          
           
            <button class="post bg-secondary secondary-text"><span>Update Finance Settings</span></button>
        </form>
    </section>
@endsection