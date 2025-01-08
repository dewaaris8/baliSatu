<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="{{asset('output.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    @vite('resources/css/app.css')
</head>
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
<body class="font-poppins">
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
    <section class="max-w-[80%] lg:max-w-[1300px] mt-[100px] mx-auto">
        <div class="w-full">
            <h4>Reach Out To Us</h4>
            <h1 class="lg:text-[32px] md:text-[32px] text-[25px] font-medium">We’d love to hear from you.</h1>
            <h4>Or just reach out manually to balisatu@gmail.com</h4>
        </div>
    </section>

    <section class="max-w-[80%] lg:max-w-[1300px] mt-[100px] mx-auto">
        <div class="w-full flex lg:flex-row gap-5 flex-col justify-between">
            <div class="flex-1  flex-col gap-2">
                <div class="w-[75px] h-[75px] bg-[#15192d] flex items-center justify-center rounded-full">
                    <i class="fa-solid fa-envelope fa-lg" style="color: #3dbeeb;"></i>
                </div>
                <h1 class="lg:text-[28px] mt-[15px] md:text-[28x] text-[25px] font-medium">Email Support</h1>
                <h4 class="text-[18px]">Our team can respond in real time.</h4>
                <h4 class="text-[18px] text-[#3dbeeb] font-medium"><a href="https://mail.google.com/mail/u/0/">balisatu@gmail.com</a></h4>
            </div>
            <div class="flex-1  flex-col gap-2">
                <div class="w-[75px] h-[75px] bg-[#15192d] flex items-center justify-center rounded-full">
                    <i class="fa-solid fa-location-dot fa-lg" style="color: #3dbeeb;"></i>
                </div>
                <h1 class="lg:text-[28px] mt-[15px] md:text-[28px] text-[25px] font-medium">Visit Our Office</h1>
                <h4 class="text-[18px]">Visit our location in real life.</h4>
                <h4 class="text-[18px] text-[#3dbeeb] font-medium"><a href="https://maps.app.goo.gl/AkKPNrUcRJcmbChW9">Jl. Tukad Balian No. 1Renon, Denpasar, Bali </a></h4>
            </div>
            <div class="flex-1 flex-col gap-2">
                <div class="w-[75px] h-[75px] bg-[#15192d] flex items-center justify-center rounded-full">
                    <i class="fa-solid fa-phone fa-lg" style="color: #3dbeeb;"></i>
                </div>
                <h1 class="lg:text-[28px] mt-[15px] md:text-[28px] text-[25px] font-medium">Call Us Directly</h1>
                <h4 class="text-[18px]">Available during working hours.</h4>
                <h4 class="text-[18px] text-[#3dbeeb] font-medium"><a href="https://api.whatsapp.com/send/?phone=6285324666777&text&type=phone_number&app_absent=0">+62 853-2466-6777</a></h4>
            </div>
        </div>
    </section>
    <section class="w-full bg-footer h-[300px] mx-auto mt-[120px] gap-[20p18 flex flex-col">
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
</body>
</html>
