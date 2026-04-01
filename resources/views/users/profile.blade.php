@extends('layout.users.app')
@section('title')
  @yield('page_title') Settings
@endsection
@section('css')
    <style class="css">
     .action-btn{
        max-height:40px;
        width:fit-content;
        padding:10px 30px;
        border:1px solid rgba(var(--rgt),0.1);
        border-radius:1000px;
        display:flex;
        flex-direction: row;
        align-items:center;
        justify-content:center;
        user-select: none;
       
     }
     .action-btn.active{
        border:none;
        background:var(--primary-light);
        color:var(--primary-text);
        pointer-events: none;
     }
    </style>
    @yield('page_css')
@endsection
@section('main')
  <section class="w-full g-10 p-20 column">
    {{-- profile details --}}
    <div style="border:1px solid var(--primary-light)" class="w-full br-20 p-20 row g-10">
        {{-- photo --}}
        <div class="no-shrink h-70 w-70 primary-text no-select perfect-square p-10 br-10 column align-center justify-center bg-primary">
                {{ strtoupper(substr(Auth::guard('users')->user()->name,0,2)) }}
            </div>
            <div class="column g-5">
                <strong class="desc">{{ ucwords(Auth::guard('users')->user()->name) }}</strong>
                <span class="opacity-07">{{ Auth::guard('users')->user()->email }}</span>
                <div class="row w-fit g-10">
                    <div class="column g-2">
                    <strong class="font-1 c-primary-light">{{ ucfirst(Auth::guard('users')->user()->username) }}</strong>
                  <small class="opacity-07">Username</small>
                </div>
                  <div class="column g-2">
                    <strong class="font-1 c-primary-light">{{ ucfirst(json_decode(Auth::guard('users')->user()->package)->name ?? 'null') }}</strong>
                  <small class="opacity-07">Plan</small>
                </div>
                </div>
            </div>
    </div>
    {{-- action buttons --}}
    <div class="w-full row p-10 align-center g-10 overflow-auto">
        <div onclick="spa(event,'{{ url('users/account/settings') }}')" class="action-btn {{ $type == 'account' ? 'active' : '' }}">Account</div>
        <div onclick="spa(event,'{{ url('users/bank/details') }}')" class="action-btn {{ $type == 'bank' ? 'active' : '' }}">Bank</div>
        <div onclick="spa(event,'{{ url('users/security/settings') }}')" class="action-btn {{ $type == 'security' ? 'active' : '' }}">Security</div>
    
      </div>
   @yield('form')
  </section>
@endsection
@section('js')
    @yield('page_js')
@endsection