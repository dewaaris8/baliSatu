@extends('front.layouts.app')
<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
@section('content')

<style>
  .hero-img {
      background-image: url('{{asset('assets/hero/hero.png')}}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
  }

  .bg-footer {
      background-image: url('{{asset('assets/hero/footer.png')}}');
      background-size: cover;
      background-position: center;
  }
  </style>
<div class="w-full mx-auto bg-[#15192d] border-b-[2px] border-l-[2px] border-r-[2px] border-white shadow-md rounded-b-[20px] flex items-center justify-center h-[100px]">
  <div class="w-full max-w-[80%] lg:max-w-[1300px] h-full flex items-center justify-between ">
    <!-- Logo Section -->
    <div class="w-[30%] flex justify-start items-center">
      <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] object-cover" src="{{ asset('assets/logos/balisatulogo.png') }}" alt="Bali Satu Logo">
    </div>

    <!-- Navigation Links -->
    <div class="hidden lg:flex w-max text-white items-center gap-[20px]">
      <a href="{{ route('front.index') }}" class="hover:text-[#3dbeeb] transition">Home</a>
      <a href="{{ route('front.travel') }}" class="hover:text-[#3dbeeb] transition">Travel</a>
      <a href="{{ route('front.about-us') }}" class="hover:text-[#3dbeeb] transition">About Us</a>
      <a href="{{ route('front.contact-us') }}" class="hover:text-[#3dbeeb] transition">Contact Us</a>
      <a href="{{ route('dashboard.bookings') }}" class="hover:text-[#3dbeeb] transition">My Bookings</a>
    </div>

    <!-- User Section -->
    <div class="w-[30%] flex justify-end items-center gap-[10px]">
      @if(auth()->check())
      <!-- If Logged In: Display User Name -->
      <div class="hidden sm:flex lg:block md:hidden sm:items-center sm:ms-6 relative">
        <!-- Button -->
        <button id="dropdownButton" 
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-[#3dbeeb] dark:text-[#3dbeeb] bg-[#15192d]    hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
            @auth
            <div>{{ Auth::user()->name }}</div>
            @endauth
    
            <div class="ms-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" 
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" 
                        clip-rule="evenodd" />
                </svg>
            </div>
        </button>
    
        <!-- Dropdown Menu -->
        <div id="dropdownMenu" 
            class="absolute right-0 mt-2 w-48 text-[#3dbeeb] dark:text-[#3dbeeb] bg-[#15192d] border border-gray-200 dark:border-gray-700 rounded-md shadow-lg hidden">
            <a href="{{ route('logout') }}" 
               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
      @else
      <!-- If Not Logged In: Display Login and Register Buttons -->
      <a href="{{ route('login') }}" class="hidden px-[15px] py-[8px] sm:px-[20px] sm:py-[10px] lg:flex items-center rounded-[20px] bg-[#3dbeeb] text-white border-[1px] border-[#fff]">
        Login
      </a>
      <a href="{{ route('register') }}" class="hidden px-[15px] py-[8px] sm:px-[20px] sm:py-[10px] lg:flex items-center rounded-[20px] text-[#3dbeeb] border-[1px] border-[#3dbeeb]">
        Register
      </a>
      @endif
    </div>

    <!-- Mobile Navigation Toggle -->
    <div class="lg:hidden flex items-center text-white">
      <button id="menu-toggle" class="p-2 focus:outline-none">
        <i class="fa-solid fa-bars text-[20px]"></i>
      </button>
    </div>
  </div>

  <!-- Mobile Navigation Menu -->
  <div id="mobile-menu" class="lg:hidden hidden flex-col bg-gray-800 text-white w-full absolute top-[100px] left-0 py-4 space-y-2">
    <a href="{{ route('front.index') }}" class="block px-4 py-2 hover:text-[#3dbeeb] transition">Home</a>
    <a href="{{ route('front.travel') }}" class="block px-4 py-2 hover:text-[#3dbeeb] transition">Travel</a>
    <a href="{{ route('front.about-us') }}" class="block px-4 py-2 hover:text-[#3dbeeb] transition">About Us</a>
    <a href="{{ route('front.contact-us') }}" class="block px-4 py-2 hover:text-[#3dbeeb] transition">Contact Us</a>
    <a href="{{ route('dashboard.bookings') }}" class="block px-4 py-2 hover:text-[#3dbeeb] transition">My Bookings</a>
    
    <div class="w-full flex gap-2">
      @if(auth()->check())
      <!-- If Logged In: Display User Name -->
      <div class="flex flex-col">
        <div class="mx-[10px] sm:flex px-[15px] py-[8px] sm:px-[20px] sm:py-[10px] items-center rounded-[20px] border-[1px] text-[#3dbeeb] font-medium border-[#fff]">
          Welcome, {{ auth()->user()->name }}!
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-[10px]">
            @csrf
            <button class="ml-[15px]" type="submit">Log Out</button>
        </form>
      </div>
      
      @else
      <!-- If Not Logged In: Display Login and Register Buttons -->
      <a href="{{ route('login') }}" class="mx-[10px] px-[15px] py-[8px] sm:px-[20px] sm:py-[10px] lg:flex items-center rounded-[20px] bg-[#3dbeeb] text-white border-[1px] border-[#fff]">
        Login
      </a>
      <a href="{{ route('register') }}" class=" px-[15px] py-[8px] sm:px-[20px] sm:py-[10px] lg:flex items-center rounded-[20px] text-[#3dbeeb] border-[1px] border-[#3dbeeb]">
        Register
      </a>
      @endif
    </div>
  </div>
</div>

<div class="w-[80%] lg:w-full lg:max-w-[1300px] flex flex-wrap lg:flex-nowrap items-center mx-auto py-[50px] px-4 lg:px-0">
  <!-- Left Content -->
  <div class="flex flex-col gap-[20px] lg:w-1/2">
    <!-- Section Title -->
    <h5 class="text-gray-500 text-[14px] md:text-[16px]">About Bali Satu</h5>
    <h1 class="text-[24px] md:text-[28px] lg:text-[32px] font-medium lg:w-[800px]">
      We are Bali Satu Holidays, a trusted travel partner with a passion for friendship and unforgettable journeys.
    </h1>
    <!-- Description Text -->
    <div class="flex flex-col gap-[20px] text-[14px] md:text-[16px] lg:w-[700px]">
      <p>
        Our company operates in the field of travel services. This company was founded in 2002. It was founded and managed
        by Mr. I Wayan Suana. This company is named Balisatu Holidays (Bahana Lintas Sahabat Utama) which means prioritizing
        friendship in running a business. Our company also has official licenses that have been approved by the government.
      </p>
      <p>
        Balisatu has been present as a travel agent in Bali since 2002, until now we still exist and that is proof of our
        professionalism in the field of tourism and special travel services.
      </p>
      <p>
        We collaborate with several international schools from Jakarta and surrounding areas, and now we have become regular
        clients who always use our company’s services on their tours. Not only that, our company is also often used by
        several government agencies or companies to carry out their travel activities.
      </p>
    </div>
    <!-- Contact Us Button -->
    <div class="mt-[10px]">
      <a href="https://api.whatsapp.com/send/?phone=6285324666777&text&type=phone_number&app_absent=0" class="border-[1px] w-max p-[10px] bg-[#3dbeeb] text-white rounded-[20px]">
        Contact Us 
      </a>
    </div>
  </div>

  <!-- Right Content (Image) -->
  <div class="flex lg:w-1/2 h-full w-full items-center justify-center mt-8 lg:mt-0">
    <img src="{{asset('assets/hero/logoini.png')}}" alt="Bali Satu Logo" class="w-[250px] md:w-[300px] lg:w-[400px] h-auto">
  </div>
</div>

<section class="w-full bg-footer h-[300px] mx-auto mt-[100px] gap-[20px] flex flex-col">
  <div class="lg:max-w-[1300px] md:w-[80%] flex-col lg:flex-row flex items-center justify-between lg:w-full mx-auto">
    <div class="w-full flex flex-col lg:flex-row lg:justify-between space-x-4">
      <div class="flex-1 mt-8 text-white text-[36px]">
        <h1 class="">Lets’s Connect With Us</h1>
        <a href="https://gmail.com/"><u>balisatu@gmail.com</u></a>
      </div>
      <div class="text-left lg:text-right md:text-right flex-col justify-end mt-8">
        <div class="">
          <a href="{{ route('front.about-us') }}" class="text-[20px] text-white">About Us</a>
        </div>
        <div class="">
          <a href="{{ route('front.contact-us') }}" class="text-[20px] text-white">Contact Us</a>
        </div>
        <div class="">
          <a href="https://www.instagram.com/balisatu_holidays/" class="text-[20px] text-white">Instagram</a>
        </div>
        <div class="">
          <a href="https://www.facebook.com/balisatuholidays" class="text-[20px] text-white">Facebook</a>
        </div>
        
      </div>
  </div>      
  </div>
</section>
<script src="{{asset('js/dropdownmenu.js')}}"></script>
<script src="{{asset('js/responsivenavbar.js')}}"></script>
@endsection

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{asset('js/flickity-slider.js')}}"></script>
    <script src="{{asset('js/two-lines-text.js')}}"></script>
</body>
</html>