@extends('layout.users.app')
@section('title')
    Vendor Dashboard
@endsection
@section('css')
    <style class="css">
        .analytics{
            border:0.1px solid var(--secondary);
            position:relative;
            overflow: hidden;
        }
        .analytics .group{
            z-index:50;
        }
     .analytics::before{
            content:'';
            position:absolute;
            left:10%;
            top:10%;
            width:40%;
            height:40%;
            background:var(--primary);
            border-radius:50%;
            filter:blur(30px);
            z-index:10;
        }
         .analytics::after{
            content:'';
            position:absolute;
            right:10%;
            bottom:10%;
            width:20%;
            height:20%;
            background:var(--primary);
            border-radius:50%;
            filter:blur(20px);
            z-index:10;
        }
        .analytics.loop::before{
            content:'';
            position:absolute;
            left:10%;
            top:10%;
            width:40%;
            height:40%;
            background:var(--primary);
            border-radius:50%;
            filter:blur(50px);
            z-index:10;
        }
         .analytics.loop::after{
            content:'';
            position:absolute;
            right:10%;
            bottom:10%;
            width:20%;
            height:20%;
            background:var(--primary);
            border-radius:50%;
            filter:blur(50px);
            z-index:10;
        }
    </style>
@endsection
@section('main')
    <section class="w-full p-10 column g-10">
        <span style="font-size:2rem;font-family:luckiest guy;color:var(--primary)">Vendor Portal</span>
       <div onclick="spa(event,'{{ url('vendor/dashboard') }}')" class="bg-primary primary-text row no-select bold justify-center pointer text-center br-5 clip-5 m-left-auto w-fit p-10 h-50">
        SWITCH TO COUPON CODES
       </div>
        <div class="grid grid-2 pc-grid-4 g-10">
            <div style="backdrop-filter: blur(50px);" class="analytics w-full p-10 br-10">
                <div class="column text-center group w-full h-full justify-center g-10">
                    <strong class="desc">Total Vouchers</strong>
                    <span>{{ number_format($total_coupons) }}</span>
                </div>
            </div>
            <div style="backdrop-filter: blur(50px);" class="analytics w-full p-10 br-10">
                <div class="column text-center group w-full h-full justify-center g-10">
                    <strong class="desc">Active Vouchers</strong>
                    <span>{{ number_format($active_coupons) }}</span>
                </div>
            </div>
             <div style="backdrop-filter: blur(50px);" class="analytics w-full p-10 br-10">
                <div class="column text-center group w-full h-full justify-center g-10">
                    <strong class="desc">Redeemed Vouchers</strong>
                    <span>{{ number_format($redeemed_coupons) }}</span>
                </div>
            </div>
             <div style="backdrop-filter: blur(50px);" class="analytics w-full p-10 br-10">
                <div class="column text-center group w-full h-full justify-center g-10">
                    <strong class="desc">Total Value</strong>
                    <span>&#8358;{{ number_format($value,2) }}</span>
                </div>
            </div>
        </div>
        <span class="desc" style="font-family: titan one;color:var(--primary)">Voucher Codes</span>
        <div style="backdrop-filter: blur(10px)" class="w-full row c-green br-10 p-10 bg-green-transparent no-select align-center">
          
<span> ALL VOUCHER CODE SHOWN HERE ARE ALLOCATED TO YOUR ACCOUNT,UPON PAYMENT FOR VOUCHER CODE BY DOWNLINES,CONTACT ADMIN ON WHATSAPP TO GENERATE A VOUCHER CODE FOR YOU THEN COME BACK HERE TO COPY THE CODE AND SEND TO YOUR DOWNLINE.</span>
        </div>
        <div onclick="
        if(this.querySelector('.options').classList.contains('display-none')){
        this.querySelector('.options').classList.remove('display-none')
        }else{
        this.querySelector('.options').classList.add('display-none')
        }
        " class="w-fit pos-relative row align-center p-10 border-1 border-color-primary g-5 no-select m-left-auto">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M12 8.75C11.5858 8.75 11.25 8.41421 11.25 8V5C11.25 4.58579 11.5858 4.25 12 4.25C12.4142 4.25 12.75 4.58579 12.75 5V8C12.75 8.41421 12.4142 8.75 12 8.75Z" fill="CurrentColor"></path>
<path d="M4 12C2.89543 12 2 11.1046 2 10C2 8.89543 2.89543 8 4 8C5.10457 8 6 8.89543 6 10C6 11.1046 5.10457 12 4 12Z" fill="CurrentColor"></path>
<path d="M10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12Z" fill="CurrentColor"></path>
<path d="M18 14C18 12.8954 18.8954 12 20 12C21.1046 12 22 12.8954 22 14C22 15.1046 21.1046 16 20 16C18.8954 16 18 15.1046 18 14Z" fill="CurrentColor"></path>
<path d="M19.25 10C19.25 10.4142 19.5858 10.75 20 10.75C20.4142 10.75 20.75 10.4142 20.75 10V5C20.75 4.58579 20.4142 4.25 20 4.25C19.5858 4.25 19.25 4.58579 19.25 5V10Z" fill="CurrentColor"></path>
<path d="M4 13.25C3.58579 13.25 3.25 13.5858 3.25 14L3.25 19C3.25 19.4142 3.58579 19.75 4 19.75C4.41421 19.75 4.75 19.4142 4.75 19L4.75 14C4.75 13.5858 4.41421 13.25 4 13.25Z" fill="CurrentColor"></path>
<path d="M11.25 19C11.25 19.4142 11.5858 19.75 12 19.75C12.4142 19.75 12.75 19.4142 12.75 19V16C12.75 15.5858 12.4142 15.25 12 15.25C11.5858 15.25 11.25 15.5858 11.25 16V19Z" fill="CurrentColor"></path>
<path d="M20 19.75C19.5858 19.75 19.25 19.4142 19.25 19V18C19.25 17.5858 19.5858 17.25 20 17.25C20.4142 17.25 20.75 17.5858 20.75 18V19C20.75 19.4142 20.4142 19.75 20 19.75Z" fill="CurrentColor"></path>
<path d="M3.25 5C3.25 4.58579 3.58579 4.25 4 4.25C4.41421 4.25 4.75 4.58579 4.75 5V6C4.75 6.41421 4.41421 6.75 4 6.75C3.58579 6.75 3.25 6.41421 3.25 6L3.25 5Z" fill="CurrentColor"></path>
</svg>

            <span>FILTER</span>
            <div style="top:calc(100% + 10px)" class="pos-absolute options display-none z-index-1000 br-5  top-full right-0 bg-708090">
                <div style="border-left:5px solid transparent;border-right:5px solid transparent;border-bottom:5px solid #708090;position:absolute;bottom:100%;right:10px;" class="arrow"></div>
             <div onclick="spa(event,'{{ url('users/voucher/codes') }}')" class="row pointer overflow-hidden border-bottom-1 p-10 ws-nowrap align-center w-full space-between g-10">
                    <span>All Vouchers</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                </div>
                <div onclick="spa(event,'{{ url('users/voucher/codes?status=active') }}')" class="row pointer overflow-hidden border-bottom-1 p-10 ws-nowrap align-center w-full space-between g-10">
                    <span>Active Vouchers</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                </div>
                   <div onclick="spa(event,'{{ url('users/voucher/codes?status=redeemed') }}')" class="row pointer overflow-hidden p-10 ws-nowrap align-center w-full space-between g-10">
                    <span>Redeemed/Used Vouchers</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

                </div>
            </div>
        </div>
        <div class="grid pc-grid-2 w-full g-10">
            @if ($coupons->isEmpty())
                @include('components.sections',[
                    'null' => true,
                    'text' => 'No Voucher Found'
                ])
            @else
                @foreach ($coupons as $data)
                    <div class="w-full bg-secondary analytics loop column g-10 br-10 p-10">
                     <div class="column g-10 w-full">
                          <div class="row g-2 align-center w-full space-between">
                         <strong class="desc c-primary">{{ $data->code }}</strong>
                        <div onclick="copy('{{ $data->code }}')" class="c-white m-right-auto">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M20.0616 12.6473L20.5793 10.7154C21.1835 8.46034 21.4856 7.3328 21.2581 6.35703C21.0785 5.58657 20.6744 4.88668 20.097 4.34587C19.3657 3.66095 18.2381 3.35883 15.9831 2.75458C13.728 2.15033 12.6004 1.84821 11.6247 2.07573C10.8542 2.25537 10.1543 2.65945 9.61351 3.23687C9.02709 3.86298 8.72128 4.77957 8.26621 6.44561C8.18979 6.7254 8.10915 7.02633 8.02227 7.35057L8.02222 7.35077L7.50458 9.28263C6.90033 11.5377 6.59821 12.6652 6.82573 13.641C7.00537 14.4115 7.40945 15.1114 7.98687 15.6522C8.71815 16.3371 9.84569 16.6392 12.1008 17.2435L12.1008 17.2435C14.1334 17.7881 15.2499 18.0873 16.165 17.9744C16.2652 17.9621 16.3629 17.9448 16.4592 17.9223C17.2296 17.7427 17.9295 17.3386 18.4703 16.7612C19.1552 16.0299 19.4574 14.9024 20.0616 12.6473Z" fill="CurrentColor"></path>
<path d="M2.50458 14.715L3.02222 16.6469C3.62647 18.902 3.92859 20.0295 4.61351 20.7608C5.15432 21.3382 5.85421 21.7423 6.62466 21.9219C7.60044 22.1494 8.72798 21.8473 10.9831 21.2431C13.2381 20.6388 14.3657 20.3367 15.097 19.6518C15.1577 19.5949 15.2164 19.5363 15.2733 19.4761C14.9391 19.448 14.602 19.3942 14.2594 19.3261C13.5633 19.1877 12.7362 18.9661 11.758 18.704L11.6512 18.6753L11.6264 18.6687C10.5621 18.3835 9.67281 18.1448 8.96277 17.8883C8.21607 17.6185 7.5376 17.286 6.96148 16.7464C6.16753 16.0028 5.61193 15.0404 5.36491 13.9811C5.18567 13.2123 5.23691 12.4585 5.37666 11.6769C5.51058 10.928 5.75109 10.0305 6.03926 8.95515L6.03926 8.95514L6.57365 6.96077L6.59245 6.89062C4.6719 7.40799 3.66101 7.71408 2.98687 8.34548C2.40945 8.88629 2.00537 9.58617 1.82573 10.3566C1.59821 11.3324 1.90033 12.4599 2.50458 14.715Z" fill="CurrentColor"></path>
</svg>
                        </div>
                        @switch($data->status)
                            @case('active')
                                <div class="p-5 br-5 bg-green c-white no-select">{{ $data->status }}</div>
                                @break
                            @case('redeemed')
                                  <div class="p-5 br-5 bg-blue c-white no-select">{{ $data->status }}</div>
                                @break
                            @default
                             <div class="p-5 br-5 bg-blue c-white no-select">{{ $data->status }}</div>
                                  
                        @endswitch

                       </div>
                       <hr class="bg-primary gradient">
                       <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" fill="CurrentColor"></circle>
<ellipse cx="12" cy="17" rx="7" ry="4" fill="CurrentColor"></ellipse>
</svg>
<span>Used By:</span>

                        </div>
                        <span class="c-primary bold">{{ $data->used_by }}</span>
                       </div>
                       
                         <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                         <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.0002 2.75C11.0217 2.75 10.1873 3.37503 9.87803 4.24993C9.73999 4.64047 9.3115 4.84517 8.92096 4.70713C8.53043 4.56909 8.32573 4.1406 8.46377 3.75007C8.97821 2.29459 10.3662 1.25 12.0002 1.25C13.6341 1.25 15.0222 2.29459 15.5366 3.75007C15.6747 4.1406 15.47 4.56909 15.0794 4.70713C14.6889 4.84517 14.2604 4.64047 14.1224 4.24993C13.8131 3.37503 12.9787 2.75 12.0002 2.75Z" fill="CurrentColor"></path>
<path d="M14 12.5H10C9.72386 12.5 9.5 12.7239 9.5 13V15.1615C9.5 15.3659 9.62448 15.5498 9.8143 15.6257L10.5144 15.9058C11.4681 16.2872 12.5319 16.2872 13.4856 15.9058L14.1857 15.6257C14.3755 15.5498 14.5 15.3659 14.5 15.1615V13C14.5 12.7239 14.2761 12.5 14 12.5Z" fill="CurrentColor"></path>
<path d="M8.01076 15.3691L3.00586 13.8677C3.03595 16.9822 3.21789 19.8505 4.31792 20.8283C5.63593 21.9998 7.75726 21.9998 11.9999 21.9998C16.2425 21.9998 18.3639 21.9998 19.6819 20.8283C20.7819 19.8505 20.9638 16.9822 20.9939 13.8677L15.9892 15.3691C15.913 16.1018 15.4372 16.7407 14.7428 17.0184L14.0426 17.2985C12.7314 17.823 11.2686 17.823 9.95735 17.2985L9.25722 17.0184C8.5628 16.7407 8.08702 16.1018 8.01076 15.3691Z" fill="CurrentColor"></path>
<path d="M7.60893 5H16.3911C18.8412 5 20.0663 5 20.8934 5.67298C21.0524 5.80233 21.1977 5.94762 21.327 6.10659C22 6.9337 22 8.15877 22 10.6089C22 11.2307 22 11.5415 21.8492 11.784C21.8199 11.8312 21.7866 11.8759 21.7498 11.9176C21.5609 12.1317 21.2631 12.2211 20.6676 12.3997L16 13.8V13C16 11.8954 15.1046 11 14 11H10C8.89543 11 8 11.8954 8 13V13.8L3.3324 12.3997C2.7369 12.2211 2.43915 12.1317 2.25021 11.9176C2.21341 11.8759 2.18015 11.8312 2.15078 11.784C2 11.5415 2 11.2307 2 10.6089C2 8.15877 2 6.9337 2.67298 6.10659C2.80233 5.94763 2.94763 5.80233 3.10659 5.67298C3.9337 5 5.15877 5 7.60893 5Z" fill="CurrentColor"></path>
</svg>



<span>Voucher Value:</span>

                        </div>
                        <span class="c-primary bold">&#8358;{{ number_format($data->value,2) }}</span>
                       </div>
                       
                         <div class="row w-full align-center g-5">
                        <div class="row align-center g-2">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 2C11.25 1.58579 11.5858 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12C1.25 11.5858 1.58579 11.25 2 11.25C2.41421 11.25 2.75 11.5858 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75C11.5858 2.75 11.25 2.41421 11.25 2ZM12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V12.25H16C16.4142 12.25 16.75 12.5858 16.75 13C16.75 13.4142 16.4142 13.75 16 13.75H12C11.5858 13.75 11.25 13.4142 11.25 13V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M9.09958 2.39754C9.24874 2.78396 9.05641 3.21814 8.66999 3.36731C8.52855 3.42191 8.38879 3.47988 8.2508 3.54114C7.87221 3.70921 7.42906 3.53856 7.261 3.15997C7.09293 2.78139 7.26358 2.33824 7.64217 2.17017C7.80267 2.09892 7.96526 2.03147 8.1298 1.96795C8.51623 1.81878 8.95041 2.01112 9.09958 2.39754ZM5.6477 4.24026C5.93337 4.54021 5.92178 5.01495 5.62183 5.30061C5.51216 5.40506 5.40505 5.51216 5.30061 5.62183C5.01495 5.92178 4.54021 5.93337 4.24026 5.6477C3.94031 5.36204 3.92873 4.88731 4.21439 4.58736C4.33566 4.46003 4.46002 4.33566 4.58736 4.21439C4.88731 3.92873 5.36204 3.94031 5.6477 4.24026ZM3.15997 7.261C3.53856 7.42907 3.70921 7.87222 3.54114 8.2508C3.47988 8.38879 3.42191 8.52855 3.36731 8.66999C3.21814 9.05641 2.78396 9.24874 2.39754 9.09958C2.01112 8.95041 1.81878 8.51623 1.96795 8.12981C2.03147 7.96526 2.09892 7.80267 2.17017 7.64217C2.33824 7.26358 2.78139 7.09293 3.15997 7.261Z" fill="CurrentColor"></path>
</svg>


<span>Generated:</span>

                        </div>
                        <span class="c-primary bold">{{ $data->frame }}</span>
                       </div>
                     </div>
                    </div>
                @endforeach
                @if ($coupons->currentPage() >= 1)
                   @include('components.sections',[
                    'paginate' => true,
                    'data' => $coupons 
                   ]) 
                @endif
            @endif
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
    </script>
@endsection