<!DOCTYPE html>
<?php $enable_dark_mode = $get_landing_language->enable_dark_mode ?? '0';?>
<html lang="{{ get_current_lang() }}" class="<?php if($enable_dark_mode=='1') echo 'dark'?>">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Primary Meta Tags -->
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="@yield('meta_author')">

    <!-- Google -->
    <meta name="copyright" content="@yield('meta_author')"/>
    <meta name="application-name" content="{{config('app.name')}}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:title" content="@yield('meta_title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}"/>
    <meta property="og:image" content="@yield('meta_image')">
    <meta property="og:image:width" content="@yield('meta_image_width')" />
    <meta property="og:image:height" content="@yield('meta_image_height')" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{url('/')}}">
    <meta property="twitter:title" content="@yield('meta_title')">
    <meta property="twitter:description" content="@yield('meta_description')">
    <meta property="twitter:image" content="@yield('meta_image')">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{config('app.favicon')}}" type="image/svg"/>

    <!--====== CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cdn/css/all.min.css')}}"/>
    <link href="{{asset('/assets/landing/tailwind/style.css')}}" rel="stylesheet">
    {{-- you can include bs5 here : /assets/landing/bs5/bs5.css --}}
    <link href="{{asset('/assets/landing/custom.css')}}" rel="stylesheet">
    
    
    @include('include.landing-variables')
    @stack('styles-header')
    @stack('scripts-header')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/66419e509a809f19fb3027c0/1hto54ri1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  </head>
  <body class="dark:bg-dark" dir="{{config('app.localeDirection')}}">
    <!-- ===== Header Start ===== -->
    <header class="header absolute top-0 left-0 w-full">
      <div class="flex w-full flex-wrap px-5 lg:flex-nowrap lg:items-center lg:px-5 xl:px-10 2xl:px-20">
        <div class="relative z-[99] max-w-[250px] lg:w-full xl:max-w-[350px]">
          <a href="{{route('home')}}" class="inline-block">
            <img src="{{config('app.logo_alt')}}" alt="logo" class="hidden h-[50px] dark:block" />
            <img src="{{config('app.logo')}}" alt="logo" class="h-[70px] dark:hidden" />
          </a>
        </div>
        <?php $current_route = Route::getCurrentRoute()->uri();?>
        <div class="menu-wrapper fixed top-0 left-0 z-50 h-screen w-full justify-center bg-white p-5 dark:bg-dark lg:visible lg:static lg:flex lg:h-auto lg:justify-start lg:bg-transparent lg:p-0 lg:opacity-100 dark:lg:bg-transparent">
          <div class="w-full self-center">
            <nav>
              <ul class="navbar flex flex-col items-center justify-center space-y-5 text-center lg:flex-row lg:justify-start lg:space-x-10 lg:space-y-0">
                  @if($disable_landing_page=='0')
                  <li>
                    <a href="{{route('home')}}" class="menu-scroll inline-flex items-center justify-center text-center font-heading text-base text-dark-text hover:text-primary dark:hover:text-white"> {{__("Home")}} </a>
                  </li>
                
                  <!--{{-- @if($current_route=='/')-->
                  <!--<li>-->
                  <!--  <a href="#features" class="menu-scroll inline-flex items-center justify-center text-center font-heading text-base text-dark-text hover:text-primary dark:hover:text-white"> {{__("Features")}} </a>-->
                  <!--</li>-->
                  <!--@endif --}}-->
                    <li>
                    <a href="#features" class="menu-scroll inline-flex items-center justify-center text-center font-heading text-base text-dark-text hover:text-primary dark:hover:text-white"> Features </a>
                  </li>
                  <li>
                    <a href="{{route('pricing-plan')}}" class="menu-scroll inline-flex items-center justify-center text-center font-heading text-base text-dark-text hover:text-primary dark:hover:text-white"> {{__("Pricing")}} </a>
                  </li>
                  @if(config('app.is_demo')=='1')
                  <li>
                    <a href="{{$get_landing_language->links_docs_url ?? route('docs')}}" class="menu-scroll inline-flex items-center justify-center text-center font-heading text-base text-dark-text hover:text-primary dark:hover:text-white"> {{__("Documentation")}} </a>
                  </li>
                  @endif
                  @endif
              </ul>
            </nav>
          </div>
          <div class="absolute bottom-0 left-0 flex w-full items-center justify-between space-x-5 self-end p-5 lg:static lg:w-auto lg:self-center lg:p-0">
            <a href="{{route('login')}}" class="w-full whitespace-nowrap rounded bg-primary py-3 px-6 text-center font-heading text-white hover:bg-opacity-90 lg:w-auto"> <?php if(Auth::user()) echo __('Dashboard'); else echo __('Sign In');?> </a>
          </div>

        </div>

        <div class="absolute top-1/2 right-5 z-50 flex -translate-y-1/2 items-center lg:static lg:translate-y-0">
          <button class="menu-toggler relative z-50 text-dark dark:text-white lg:hidden">
            <svg width="28" height="28" viewBox="0 0 28 28" class="cross hidden fill-current">
              <path d="M14.0002 11.8226L21.6228 4.20001L23.8002 6.37745L16.1776 14L23.8002 21.6226L21.6228 23.8L14.0002 16.1774L6.37763 23.8L4.2002 21.6226L11.8228 14L4.2002 6.37745L6.37763 4.20001L14.0002 11.8226Z" />
            </svg>
            <svg width="22" height="22" viewBox="0 0 22 22" class="menu fill-current">
              <path d="M2.75 3.66666H19.25V5.49999H2.75V3.66666ZM2.75 10.0833H19.25V11.9167H2.75V10.0833ZM2.75 16.5H19.25V18.3333H2.75V16.5Z" />
            </svg>
          </button>
        </div>

      </div>
    </header>
    <!-- ===== Header End ===== -->

    @yield('content')



    <!-- ===== Footer Start ===== -->
    <footer class="pt-14 sm:pt-20 lg:pt-[130px]" data-wow-delay=".2s">
      <div class="px-4 xl:container">
        <div class="-mx-4 flex flex-wrap">
          <div class="w-full px-4 sm:w-1/2 md:w-5/12 lg:w-5/12 xl:w-3/12">
            <div class="mb-20 max-w-[330px]">
              <a href="{{route('home')}}" class="mb-6 inline-block">
                <img src="{{config('app.logo_alt')}}" alt="logo" class="hidden h-[50px] dark:block" />
                <img src="{{config('app.logo')}}" alt="logo" class="h-[50px] dark:hidden" />
              </a>
              <p class="mb-10 text-base text-dark-text"> {{__("Enhance content creation with AcrDigital Media's AI platform. Simplify processes, boost creativity, and engage effortlessly. Get started now!")}} </p>
              <div class="flex items-center space-x-5">
                @if(isset($get_landing_language->company_telegram_channel) && !empty($get_landing_language->company_telegram_channel))
                    <a href="{{$get_landing_language->company_telegram_channel}}" target="_BLANK" name="social-link" aria-label="social-link" class="text-dark-text hover:text-primary dark:hover:text-white">
                        <i class="fas fa-paper-plane small"></i>
                    </a>
                @endif

                @if(isset($get_landing_language->company_fb_page) && !empty($get_landing_language->company_fb_page))
                  <a href="{{$get_landing_language->company_fb_page}}" target="_BLANK" name="social-link" aria-label="social-link" class="text-dark-text hover:text-primary dark:hover:text-white">
                    <i class="fab fa-facebook-square"></i>
                  </a>
                @endif

                @if(isset($get_landing_language->company_youtube_channel) && !empty($get_landing_language->company_youtube_channel))
                <a href="{{$get_landing_language->company_youtube_channel}}" target="_BLANK" name="social-link" aria-label="social-link" class="text-dark-text hover:text-primary dark:hover:text-white">
                  <i class="fab fa-youtube small"></i>
                </a>
                @endif

                @if(isset($get_landing_language->company_twitter_account) && !empty($get_landing_language->company_twitter_account))
                <a href="{{$get_landing_language->company_twitter_account}}" target="_BLANK" name="social-link" aria-label="social-link" class="text-dark-text hover:text-primary dark:hover:text-white">
                  <i class="fab fa-twitter"></i>
                </a>
                @endif

                @if(isset($get_landing_language->company_instagram_account) && !empty($get_landing_language->company_instagram_account))
                <a href="{{$get_landing_language->company_instagram_account}}" target="_BLANK" name="social-link" aria-label="social-link" class="text-dark-text hover:text-primary dark:hover:text-white">
                  <i class="fab fa-instagram"></i>
                </a>
                @endif

                @if(isset($get_landing_language->company_linkedin_channel) && !empty($get_landing_language->company_linkedin_channel))
                <a href="{{$get_landing_language->company_linkedin_channel}}" target="_BLANK" name="social-link" aria-label="social-link" class="text-dark-text hover:text-primary dark:hover:text-white">
                  <i class="fab fa-linkedin"></i>
                </a>
                @endif
               
<a href="https://www.f6s.com/acr-digital-media-llc">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="20"
      height="20"
      viewBox="0 0 64 64"
      version="1.1"
      style="margin-top: -5px"
    >
      <title>F6S-logo</title>
      <desc>Created with Sketch.</desc>
      <defs></defs>
      <g
        style="fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1"
        transform="scale(0.08)"
      >
        <g>
          <path
            d="M 400,0 C 179.086,0 0,179.086 0,400 0,620.914 179.086,800 400,800 620.914,800 800,620.914 800,400 800,179.086 620.914,0 400,0 Z"
            style="fill: #4b6df8"
          ></path>
          <polygon
            points="156.901,180.139 289.76,180.139 293.734,180.139 293.734,184.113 293.734,233.935 293.734,237.909 289.76,237.909 210.697,237.909 210.697,362.821 256.545,362.821 260.519,362.821 260.519,366.795 260.519,416.617 260.519,420.591 256.545,420.591 210.697,420.591 210.697,615.905 210.697,619.879 206.723,619.879 156.901,619.879 152.927,619.879 152.927,615.905 152.927,184.113 152.927,180.139 "
            style="fill: #ffffff"
          ></polygon>
          <path
            d="m 372.428,237.909 v 124.912 h 68.517 c 16.582,0 31.127,14.476 31.127,30.977 v 194.721 c 0,16.705 -14.545,31.359 -31.127,31.359 h -95.027 c -16.59,0 -31.143,-14.289 -31.143,-30.578 V 212.296 c 0,-16.829 14.448,-32.156 30.313,-32.156 h 95.858 c 16.582,0 31.127,14.468 31.127,30.961 v 72.657 3.974 h -3.974 -49.822 -3.974 v -3.974 -45.849 z m 0.016,182.68 v 141.519 h 41.875 V 420.589 Z"
            style="fill: #ffffff"
          ></path>
          <path
            d="m 647.073,283.74 v 3.974 h -3.974 -49.822 -3.974 v -3.974 -45.849 h -41.875 v 124.913 l 69.116,0.016 c 16.441,0 30.529,19.672 30.529,35.777 v 189.705 c 0,16.812 -14.266,31.558 -30.529,31.558 h -92.918 c -16.254,0 -30.512,-14.367 -30.512,-30.744 v -106.004 -3.966 l 3.966,-0.007 46.368,-0.083 3.981,-0.007 v 3.981 79.063 h 41.875 V 420.574 l -65.706,0.016 c -16.239,0 -30.484,-14.553 -30.484,-31.143 V 211.282 c 0,-16.599 14.258,-31.16 30.512,-31.16 h 92.918 c 16.263,0 30.529,14.561 30.529,31.16 z"
            style="fill: #ffffff"
          ></path>
        </g>
      </g>
    </svg>
  </a>
              <a href="https://www.crunchbase.com/organization/acrdigital-media"
    ><svg
      xmlns="http://www.w3.org/2000/svg"
      id="Layer_1"
      data-name="Layer 1"
      viewBox="0 0 64 64.000002"
      width="20"
      height="20"
      style="margin-top: -5px; fill: #ffffff"
    >
      <title>logo_crunchbase</title>
      <path
        style="
          clip-rule: evenodd;
          fill: #4b6df8;
          fill-opacity: 1;
          fill-rule: evenodd;
          stroke-width: 0.10474632;
          stroke-linejoin: round;
          stroke-miterlimit: 1.41400003;
        "
        d="m 64.000001,8.0000025 c 0,-4.41736 -3.58264,-8 -8,-8 H 7.9999985 c -4.41736,0 -8,3.58264 -8,8 V 55.999997 c 0,4.41736 3.58264,8 8,8 H 56.000001 c 4.41736,0 8,-3.58264 8,-8 z"
      ></path>
      <g
        transform="matrix(2.3849106,0,0,2.3849106,-9.5449499,-43.547318)"
        style="fill: #ffffff"
      >
        <path
          style="fill: #ffffff; fill-opacity: 1; stroke-width: 0.57408553"
          d="m 13.939838,33.65836 a 2.9622812,2.9622812 0 1 1 0.03444,-2.439863 h 2.296342 a 5.1667696,5.1667696 0 1 0 0,2.439863 h -2.296342 z"
        ></path>
        <path
          style="fill: #ffffff; fill-opacity: 1; stroke-width: 0.57408553"
          d="m 23.510509,27.257306 h -0.378897 a 5.0978793,5.0978793 0 0 0 -2.525976,0.889833 v -5.752337 h -2.095412 v 14.794184 h 2.106894 v -0.539641 a 5.1667696,5.1667696 0 1 0 2.893391,-9.392039 z m 2.962281,5.534185 v 0.09185 a 2.9393178,2.9393178 0 0 1 -0.08037,0.361674 v 0 a 2.933577,2.933577 0 0 1 -0.143521,0.373156 v 0.04593 a 2.9795038,2.9795038 0 0 1 -2.072449,1.624662 v 0 l -0.281302,0.04593 h -0.06315 a 2.9163544,2.9163544 0 0 1 -0.321488,0 v 0 a 2.9622812,2.9622812 0 0 1 -0.40186,-0.02871 H 23.0168 a 2.933577,2.933577 0 0 1 -0.752052,-0.229634 h -0.05741 a 2.9737629,2.9737629 0 0 1 -0.66594,-0.447787 v 0 a 2.9909855,2.9909855 0 0 1 -0.522417,-0.625753 v 0 a 2.9622812,2.9622812 0 0 1 -0.189449,-0.367414 v 0 a 2.9450587,2.9450587 0 0 1 0.03445,-2.439864 v 0 a 2.9680221,2.9680221 0 0 1 2.376714,-1.68207 2.933577,2.933577 0 0 1 0.304265,0 v 0 a 2.9680221,2.9680221 0 0 1 2.927836,2.881909 v 0 a 2.9565404,2.9565404 0 0 1 0,0.396119 z"
        ></path>
      </g>
    </svg>
  </a>

              </div>
            </div>
          </div>
          <!-- -citation links-->
<!--          <div-->
<!--  style="-->
<!--    margin-top: 85px;-->
<!--    padding: 0px 15px;-->
<!--    display: flex;-->
<!--    flex-direction: column;-->
<!--    row-gap: 25px;-->
<!--  "-->
<!-->-->
<!--  <a href="https://www.f6s.com/acr-digital-media-llc">-->
<!--    <svg-->
<!--      xmlns="http://www.w3.org/2000/svg"-->
<!--      width="40"-->
<!--      height="40"-->
<!--      viewBox="0 0 64 64"-->
<!--      version="1.1"-->
<!--      style="margin-top: -5px"-->
<!--    >-->
<!--      <title>F6S-logo</title>-->
<!--      <desc>Created with Sketch.</desc>-->
<!--      <defs></defs>-->
<!--      <g-->
<!--        style="fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1"-->
<!--        transform="scale(0.08)"-->
<!--      >-->
<!--        <g>-->
<!--          <path-->
<!--            d="M 400,0 C 179.086,0 0,179.086 0,400 0,620.914 179.086,800 400,800 620.914,800 800,620.914 800,400 800,179.086 620.914,0 400,0 Z"-->
<!--            style="fill: #4b6df8"-->
<!--          ></path>-->
<!--          <polygon-->
<!--            points="156.901,180.139 289.76,180.139 293.734,180.139 293.734,184.113 293.734,233.935 293.734,237.909 289.76,237.909 210.697,237.909 210.697,362.821 256.545,362.821 260.519,362.821 260.519,366.795 260.519,416.617 260.519,420.591 256.545,420.591 210.697,420.591 210.697,615.905 210.697,619.879 206.723,619.879 156.901,619.879 152.927,619.879 152.927,615.905 152.927,184.113 152.927,180.139 "-->
<!--            style="fill: #ffffff"-->
<!--          ></polygon>-->
<!--          <path-->
<!--            d="m 372.428,237.909 v 124.912 h 68.517 c 16.582,0 31.127,14.476 31.127,30.977 v 194.721 c 0,16.705 -14.545,31.359 -31.127,31.359 h -95.027 c -16.59,0 -31.143,-14.289 -31.143,-30.578 V 212.296 c 0,-16.829 14.448,-32.156 30.313,-32.156 h 95.858 c 16.582,0 31.127,14.468 31.127,30.961 v 72.657 3.974 h -3.974 -49.822 -3.974 v -3.974 -45.849 z m 0.016,182.68 v 141.519 h 41.875 V 420.589 Z"-->
<!--            style="fill: #ffffff"-->
<!--          ></path>-->
<!--          <path-->
<!--            d="m 647.073,283.74 v 3.974 h -3.974 -49.822 -3.974 v -3.974 -45.849 h -41.875 v 124.913 l 69.116,0.016 c 16.441,0 30.529,19.672 30.529,35.777 v 189.705 c 0,16.812 -14.266,31.558 -30.529,31.558 h -92.918 c -16.254,0 -30.512,-14.367 -30.512,-30.744 v -106.004 -3.966 l 3.966,-0.007 46.368,-0.083 3.981,-0.007 v 3.981 79.063 h 41.875 V 420.574 l -65.706,0.016 c -16.239,0 -30.484,-14.553 -30.484,-31.143 V 211.282 c 0,-16.599 14.258,-31.16 30.512,-31.16 h 92.918 c 16.263,0 30.529,14.561 30.529,31.16 z"-->
<!--            style="fill: #ffffff"-->
<!--          ></path>-->
<!--        </g>-->
<!--      </g>-->
<!--    </svg>-->
<!--  </a>-->
<!--  <a href="https://www.crunchbase.com/organization/acrdigital-media"-->
<!--    ><svg-->
<!--      xmlns="http://www.w3.org/2000/svg"-->
<!--      id="Layer_1"-->
<!--      data-name="Layer 1"-->
<!--      viewBox="0 0 64 64.000002"-->
<!--      width="40"-->
<!--      height="40"-->
<!--      style="margin-top: -5px; fill: #ffffff"-->
<!--    >-->
<!--      <title>logo_crunchbase</title>-->
<!--      <path-->
<!--        style="-->
<!--          clip-rule: evenodd;-->
<!--          fill: #4b6df8;-->
<!--          fill-opacity: 1;-->
<!--          fill-rule: evenodd;-->
<!--          stroke-width: 0.10474632;-->
<!--          stroke-linejoin: round;-->
<!--          stroke-miterlimit: 1.41400003;-->
<!--        "-->
<!--        d="m 64.000001,8.0000025 c 0,-4.41736 -3.58264,-8 -8,-8 H 7.9999985 c -4.41736,0 -8,3.58264 -8,8 V 55.999997 c 0,4.41736 3.58264,8 8,8 H 56.000001 c 4.41736,0 8,-3.58264 8,-8 z"-->
<!--      ></path>-->
<!--      <g-->
<!--        transform="matrix(2.3849106,0,0,2.3849106,-9.5449499,-43.547318)"-->
<!--        style="fill: #ffffff"-->
<!--      >-->
<!--        <path-->
<!--          style="fill: #ffffff; fill-opacity: 1; stroke-width: 0.57408553"-->
<!--          d="m 13.939838,33.65836 a 2.9622812,2.9622812 0 1 1 0.03444,-2.439863 h 2.296342 a 5.1667696,5.1667696 0 1 0 0,2.439863 h -2.296342 z"-->
<!--        ></path>-->
<!--        <path-->
<!--          style="fill: #ffffff; fill-opacity: 1; stroke-width: 0.57408553"-->
<!--          d="m 23.510509,27.257306 h -0.378897 a 5.0978793,5.0978793 0 0 0 -2.525976,0.889833 v -5.752337 h -2.095412 v 14.794184 h 2.106894 v -0.539641 a 5.1667696,5.1667696 0 1 0 2.893391,-9.392039 z m 2.962281,5.534185 v 0.09185 a 2.9393178,2.9393178 0 0 1 -0.08037,0.361674 v 0 a 2.933577,2.933577 0 0 1 -0.143521,0.373156 v 0.04593 a 2.9795038,2.9795038 0 0 1 -2.072449,1.624662 v 0 l -0.281302,0.04593 h -0.06315 a 2.9163544,2.9163544 0 0 1 -0.321488,0 v 0 a 2.9622812,2.9622812 0 0 1 -0.40186,-0.02871 H 23.0168 a 2.933577,2.933577 0 0 1 -0.752052,-0.229634 h -0.05741 a 2.9737629,2.9737629 0 0 1 -0.66594,-0.447787 v 0 a 2.9909855,2.9909855 0 0 1 -0.522417,-0.625753 v 0 a 2.9622812,2.9622812 0 0 1 -0.189449,-0.367414 v 0 a 2.9450587,2.9450587 0 0 1 0.03445,-2.439864 v 0 a 2.9680221,2.9680221 0 0 1 2.376714,-1.68207 2.933577,2.933577 0 0 1 0.304265,0 v 0 a 2.9680221,2.9680221 0 0 1 2.927836,2.881909 v 0 a 2.9565404,2.9565404 0 0 1 0,0.396119 z"-->
<!--        ></path>-->
<!--      </g>-->
<!--    </svg>-->
<!--  </a>-->
<!--</div>-->

          <!---->
          <div class="w-1/2 px-4 md:w-2/12 lg:w-2/12 xl:w-2/12">
            <div class="mb-20">
              <h3 class="mb-9 font-heading text-2xl font-medium text-dark dark:text-white"> {{__("Quick")}} </h3>
              <ul class="space-y-4">
                <li>
                  <a href="{{route('home')}}"  class="font-heading text-base text-dark-text hover:text-primary dark:hover:text-white">{{__('Home')}}</a>
                </li>                
                <li>
                  <a href="{{route('register')}}"  class="font-heading text-base text-dark-text hover:text-primary dark:hover:text-white">{{__('Sign Up')}}</a>
                </li>
                <li>
                  <a href="{{route('pricing-plan')}}"  class="font-heading text-base text-dark-text hover:text-primary dark:hover:text-white">{{__('Pricing')}}</a>
                </li>
                <?php $company_support_url = $get_landing_language->company_support_url ?? ''; ?>
                @if(!empty($company_support_url))
                <li>
                  <a href="{{$company_support_url}}"  class="font-heading text-base text-dark-text hover:text-primary dark:hover:text-white">{{__('Support')}}</a>
                </li>
                @endif
              </ul>
            </div>
          </div>
          <div class="w-1/2 px-4 md:w-3/12 lg:w-3/12 xl:w-2/12">
            <div class="mb-20">
              <h3 class="mb-9 font-heading text-2xl font-medium text-dark dark:text-white"> {{__("Legal")}} </h3>
              <ul class="space-y-4">
                <li>
                  <a href="{{route('policy-privacy')}}"  class="font-heading text-base text-dark-text hover:text-primary dark:hover:text-white">{{__('Privacy Policy')}}</a>
                </li>
                <li>
                  <a href="{{route('policy-terms')}}"  class="font-heading text-base text-dark-text hover:text-primary dark:hover:text-white">{{__('Terms of Service')}}</a>
                </li>
                <li>
                    <a href="{{route('policy-gdpr')}}"  class="font-heading text-base text-dark-text hover:text-primary dark:hover:text-white">{{__('GDPR Policy')}}</a>
                </li>
                <li>
                  <a href="{{route('policy-refund')}}"  class="font-heading text-base text-dark-text hover:text-primary dark:hover:text-white">{{__('Refund Policy')}}</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="w-full px-4 sm:w-1/2 md:w-5/12 lg:w-4/12 xl:w-3/12">
            <div class="mb-20">
              <h3 class="mb-9 font-heading text-2xl font-medium text-dark dark:text-white"> {{__("Get in touch")}} </h3>
              <div class="space-y-7">
                <?php $company_email = $get_landing_language->company_email??''?>
                <?php $company_address = $get_landing_language->company_address??''?>
                @if(!empty($company_email))
                <div>
                  <p class="font-heading text-base text-dark-text"> {{__("Send us Email")}} </p>
                  <a href="mailto:{{$company_email??''}}" class="font-heading text-base text-dark hover:text-primary dark:text-white dark:hover:text-primary"> {{$company_email??''}} </a>
                </div>
                @endif
                @if(!empty($company_address))
                <div>
                  <p class="font-heading text-base text-dark-text"> {{__('Address')}} </p>
                  <p class="font-heading text-base text-dark dark:text-white">
                    {!! display_landing_content($company_address) !!}
                  </p>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="dark:border-[#2E333D] md:border-t">
          <div class="-mx-4 flex flex-wrap py-5 md:py-7">
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
              <div>
                <p class="text-center font-heading text-base text-dark-text lg:text-left"> © {{date('Y')}} {{config('app.name')}}. {{__('All rights reserved')}} </p>
              </div>
            </div>
            <!--<div class="w-full px-4 md:w-1/2 lg:w-2/3 flex" style="justify-content:space-around;">-->
            <!--    <a href="https://www.crunchbase.com/organization/acrdigital-media" target="_blank" class="flex mr-4" style="justify-content:center; align-items:center; gap:5px;">-->
            <!--        <img src="{{ asset('/assets/images/crunchbase.svg')}}" alt="crunchbase" style="height:35px;"/>-->
            <!--        <p class="text-center font-heading text-base text-dark-text lg:text-left">-->
            <!--        Crunchbase-->
            <!--        </p>-->
            <!--    </a>-->
            <!--    <a href="https://www.f6s.com/acrdigital-media-pvt-ltd" target="_blank" class="flex mr-4" style="justify-content:center; align-items:center; gap:5px;">-->
            <!--        <img src="{{ asset('/assets/images/f6s.svg')}}" alt="f6s" style="height:35px;"/>-->
            <!--        <p class="text-center font-heading text-base text-dark-text lg:text-left">-->
            <!--        F6S-->
            <!--        </p>-->
            <!--    </a>-->
            <!--</div>-->
          </div>
        </div>
      </div>
    </footer>
    <!-- ===== Footer End  ===== -->
    <!-- ====== Back To Top Start ===== -->
    <a href="javascript:void(0)" class="hover:shadow-signUp back-to-top fixed bottom-8 right-8 left-auto z-[999] hidden h-10 w-10 items-center justify-center rounded-sm bg-primary text-white shadow-md transition">
      <span class="mt-[6px] h-3 w-3 rotate-45 border-t border-l border-white"></span>
    </a>
    <!-- ====== Back To Top End ===== -->


    @stack('styles-footer')
    <script defer src="{{asset('/assets/landing/tailwind/bundle.js')}}"></script>
    @if(isset($get_analytics_code) && !empty($get_analytics_code))
        @include('include.analytics')
    @endif
    @stack('scripts-footer')

  </body>
</html>

@yield('modal')
