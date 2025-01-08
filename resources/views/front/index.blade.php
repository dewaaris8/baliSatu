@extends('front.layouts.app')

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

@section('content')
    {{-- <section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
        <nav class="mt-8 px-4 w-full flex items-center justify-between">
          <div class="flex items-center gap-3">
            @auth    
            <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008]">
              <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover object-center" alt="photo">
            </div>
            <div class="flex flex-col gap-1">
              <p class="text-xs tracking-035">Welcome!</p>
              <p class="font-semibold">{{Auth::user()->name}}</p>
            </div>
            @endauth
            @guest
            <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008]">
                <img src="assets/photos/pfp.png" class="w-full h-full object-cover object-center" alt="photo">
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-xs tracking-035">Welcome!</p>
                <p class="font-semibold"><a href="{{ route('login') }}">Login Sekarang</a></p>
              </div>
            @endguest
          </div>
          <a href="">
            <div class="w-12 h-12 rounded-full bg-white overflow-hidden flex shrink-0 items-center justify-center shadow-[6px_8px_20px_0_#00000008]">
              <img src="assets/icons/bell.svg" alt="icon">
            </div>
          </a>
        </nav>
        <h1 class="font-semibold text-2xl leading-[36px] text-center">Explore New<br>Experience with Us</h1>
        <div id="categories" class="flex flex-col gap-3">
          <h2 class="font-semibold px-4">Categories</h2>

          <div class="main-carousel buttons-container">
            <a href="category.html" class="group px-2 first-of-type:pl-4 last-of-type:pr-4">
              <div class="p-3 flex items-center gap-2 rounded-[10px] border border-[#4D73FF] group-hover:bg-[#4D73FF] transition-all duration-300">
                <div class="w-6 h-6 flex shrink-0">
                  <img src="assets/icons/umbrella.svg" alt="icon">
                </div>
                <span class="text-sm tracking-[0.35px] text-[#4D73FF] group-hover:text-white transition-all duration-300">Beach</span>
              </div>
            </a>
           
          </div>
        </div>
        <div id="recommendations" class="flex flex-col gap-3">
          <h2 class="font-semibold px-4">Trip Recommendation</h2>
          <div class="main-carousel card-container">

            @forelse ($package_tours as $tour )
            <a href="{{route('front.details', $tour->slug)}}" class="group px-2 first-of-type:pl-4 last-of-type:pr-4">
              <div class="w-[288px] p-4 flex flex-col gap-3 rounded-[26px] bg-white shadow-[6px_8px_20px_0_#00000008]">
                <div class="w-full h-[330px] rounded-xl flex shrink-0 overflow-hidden">
                  <img src="{{Storage::url($tour->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnails">
                </div>
                <div class="flex justify-between gap-2">
                  <div class="flex flex-col gap-1">
                    <p class="font-semibold two-lines">{{$tour->name}}</p>
                    <div class="flex items-center gap-1">
                      <div class="w-4 h-4 flex shrink-0">
                        <img src="assets/icons/location-map.svg" alt="icon">
                      </div>
                      <span class="text-sm text-darkGrey tracking-035">{{$tour->location}}</span>
                    </div>
                  </div>
                  <div class="flex flex-col gap-1 text-right">
                    <p class="text-sm leading-[21px]">
                      <span class="font-semibold text-[#4D73FF] text-nowrap">Rp. {{number_format($tour->price, 0, ',', '.')}}</span><br>
                      <span class="text-darkGrey">/{{$tour->days}}days</span>
                    </p>
                    <div class="flex items-center gap-1 justify-end">
                      <div class="w-4 h-4 flex shrink-0">
                        <img src="assets/icons/Star.svg" alt="icon">
                      </div>
                      <span class="font-semibold text-sm leading-[21px]">4.8</span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            @empty
            <p>No tours found</p>
            @endforelse

          </div>
        </div>
        <div id="discover" class="px-4">
          <div class="w-full h-[130px] flex flex-col gap-[10px] rounded-[22px] items-center overflow-hidden relative">
            <img src="assets/backgrounds/Banner.png" class="w-full h-full object-cover object-center" alt="background">
            <div class="absolute z-10 flex flex-col gap-[10px] transform -translate-y-1/2 top-1/2 left-4">
              <p class="text-white font-semibold">Discover the<br>Beauty of Japan</p>
              <a href="" class="bg-[#4D73FF] p-[8px_24px] rounded-[10px] text-white font-semibold text-xs w-fit">Discover</a>
            </div>
          </div>
        </div>
        <div id="explore" class="flex flex-col px-4 gap-3">
          <h2 class="font-semibold">More to Explore</h2>
            @forelse ($package_tours as $tour )
            <a href="{{route('front.details', $tour->slug)}}" class="card">
                <div class="bg-white p-4 flex flex-col gap-3 rounded-[26px] shadow-[6px_8px_20px_0_#00000008]">
                <div class="w-full h-full aspect-[311/150] rounded-xl overflow-hidden">
                    <img src="{{Storage::url($tour->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                </div>
                <div class="flex justify-between gap-2">
                    <div class="flex flex-col gap-1">
                    <p class="font-semibold two-lines">{{$tour->name}}</p>
                    <div class="flex items-center gap-1">
                        <div class="w-4 h-4 flex shrink-0">
                        <img src="assets/icons/location-map.svg" alt="icon">
                        </div>
                        <span class="text-sm text-darkGrey tracking-035">{{$tour->location}}</span>
                    </div>
                    </div>
                    <div class="flex flex-col gap-1 text-right">
                    <p class="text-sm leading-[21px]">
                        <span class="font-semibold text-[#4D73FF] text-nowrap">Rp. {{number_format($tour->price, 0, ',', '.')}}</span><br>
                        <span class="text-darkGrey">/{{$tour->days}}days</span>
                    </p>
                    <div class="flex items-center gap-1 justify-end">
                        <div class="w-4 h-4 flex shrink-0">
                        <img src="assets/icons/Star.svg" alt="icon">
                        </div>
                        <span class="font-semibold text-sm leading-[21px]">4.8</span>
                    </div>
                    </div>
                </div>
                </div>
            </a>
            @empty
            <p>No tours found</p>
            @endforelse
          
        </div>
        <div class="navigation-bar fixed bottom-0 z-50 max-w-[640px] w-full h-[85px] bg-white rounded-t-[25px] flex items-center justify-evenly py-[45px]">
          <a href="" class="menu">
            <div class="flex flex-col justify-center w-fit gap-1">
              <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                <img src="assets/icons/home.svg" alt="icon">             
              </div>
              <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Home</p>
            </div>
          </a>
          <a href="" class="menu opacity-25">
            <div class="flex flex-col justify-center w-fit gap-1">
              <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                <img src="assets/icons/search.svg" alt="icon">            
              </div>
              <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Search</p>
            </div>
          </a>
          <a href="schedule.html" class="menu opacity-25">
            <div class="flex flex-col justify-center w-fit gap-1">
              <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                <img src="assets/icons/calendar-blue.svg" alt="icon">              
              </div>
              <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Schedule</p>
            </div>
          </a>
          <a href="" class="menu opacity-25">
            <div class="flex flex-col justify-center w-fit gap-1">
              <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                <img src="assets/icons/user-flat.svg" alt="icon">               
              </div>
              <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Profile</p>
            </div>
          </a>
        </div>
    </section> --}}
    
    {{-- her0 --}}
    <section class="w-full h-screen hero-img">
      <div class="w-full mx-auto border-b-[2px] border-l-[2px] border-r-[2px] border-white shadow-md rounded-b-[20px] flex items-center justify-center h-[100px]">
        <div class="w-full max-w-[80%] lg:max-w-[1300px] h-full flex items-center justify-between">
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
      
      <div class="h-[calc(100vh-100px)] flex flex-col justify-center lg:items-start md:items-start items-center md:max-w-[80%]  lg:max-w-[1300px] w-full mx-auto">
        <h1 class="text-white lg:w-[800px] w-[100%] text-center lg:text-start md:text-start md:w-[100%] lg:text-[60px] md:text-[60px] text-[30px] font-semibold">Let’s Explore 
          Heaven Together</h1>
          <a href="{{ route('front.travel') }}">
            <div class="flex items-center mt-4 border-[2px] border-white w-max p-[20px] mx-auto rounded-[30px] text-[18px] font-semibold text-white justify-center">Explore More</div>
          </a>
      </div>
    </section>
    <section class="w-full lg:max-w-[1300px] md:max-w-[1300px] mx-auto mt-[100px] gap-[20px] flex flex-col h-max">
      <div class="lg:max-w-[1300px] md:max-w-[80%] flex lg:flex-row flex-col md:flex-row lg:items-center md:items-center items-center lg:justify-between md:justify-between w-full mx-auto">
        <div class="flex flex-col">
          <p class="text-gray-500 text-[12px]">CHOOSE YOUR ADVENTURE</p>
          <h1 class="text-black text-[36px] font-semibold">Travel Made for You</h1>
        </div>
        <div class="text-gray-500 text-[18px] lg:text-start md:text-start  text-justify lg:w-[500px] md:w-[500px] w-[80%]">
          From beach retreats to cultural explorations, our travel categories offer something for every traveler. Discover your perfect getaway and let us bring your dream vacation to life!
        </div>
      </div>
      <div class="lg:w-full w-[80%] mx-auto gap-5 items-center flex-col flex lg:flex-row justify-center lg:space-x-4">
        @foreach ($categories as $category)
        <div class="lg:flex-1 relative w-full lg:h-[500px] h-[200px] rounded-[20px] bg-black group">
          <div class="absolute group-hover:opacity-0 ease-in-out duration-300 top-0 left-0 rounded-[20px] flex items-center justify-center w-full h-full bg-black opacity-50">
          </div>
          <h1 class="text-white group-hover:text-[#3dbeeb] absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 font-medium text-[30px] z-50">
            {{$category->name}}
          </h1>
          <img class="w-full lg:h-full h-[200px] object-cover rounded-[20px]" src="{{Storage::url($category->icon)}}" alt="">
        </div>
        
        @endforeach
      </div>      
    </section>
    <section class="w-full max-w-[1300px] mx-auto mt-[100px] gap-[20px] flex flex-col h-max">
      <div class="lg:max-w-[1300px] lg:w-full w-[80%] md:max-w-[80%] flex items-center justify-between mx-auto">
        <div class="flex flex-col">
          <p class="text-gray-500 text-[12px]">PICTURES OF OUR TRAVEL</p>
          <h1 class="text-black text-[36px] font-semibold">Our Gallery</h1>
        </div>
      </div>
      <div class="lg:w-full md:w-[80%] w-[80%] gap-5 lg:gap-0 md:gap-0 mx-auto md:mx-auto flex lg:flex-row md:flex-row flex-col lg:justify-between md:justify-between md:space-x-4 lg:space-x-4">
          <div class="flex-1 h-[250px] rounded-[20px] bg-black overflow-hidden">
            <img src="{{asset('assets/hero/home5.jpg')}}" class="w-[100%] h-[200px] lg:w-full md:w-full lg:h-full md:h-full object-cover" alt="">
          </div>
          <div class="flex-1 h-[250px] rounded-[20px] overflow-hidden bg-black">
            <img src="{{asset('assets/hero/home2.jpg')}}" class="w-[100%] h-[200px] lg:w-full md:w-full lg:h-full md:h-full object-cover" alt="">
          </div>
      </div>      
      <div class="lg:w-full md:w-[80%] w-[80%] md:mx-auto flex md:flex-row lg:flex-row flex-col mx-auto lg:justify-between md:justify-between space-x-4">
          <div class="flex-1 h-[250px] rounded-[20px] overflow-hidden bg-black">
            <img src="{{asset('assets/hero/home4.jpg')}}" class="w-full h-full object-fill" alt="">
          </div>
          <div class="flex-1 h-[250px] rounded-[20px] overflow-hidden bg-black">
            <img src="{{asset('assets/hero/home1.jpg')}}" class="w-full hidden lg:block md:block mb-10 h-full object-right-bottom object-cover" alt="">
          </div>
          <div class="flex-1 h-[250px] rounded-[20px] bg-black overflow-hidden">
            <img src="{{asset('assets/hero/hom3.jpg')}}" class="w-full hidden lg:block md:block h-full object-cover" alt="">
          </div>
      </div>      
    </section>
    <section class="w-full max-w-[1300px] mx-auto mt-[100px] gap-[20px] flex flex-col h-max px-4">
      <div class="lg:max-w-[1300px] md:w-[80%] md:mx-auto flex items-center justify-between lg:w-full mx-auto">
        <div class="flex w-full flex-col">
          <p class="text-gray-500 text-center text-[12px] sm:text-[14px]">EXPLORE POPULAR PACKAGE</p>
          <h1 class="text-black text-center text-[28px] sm:text-[36px] font-semibold">
            What we offer is an unforgettable<br class="hidden sm:block"> journey and experience
          </h1>
        </div>
      </div>
      <div class="lg:w-full md:w-[80%] md:mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($package_tours as $tour)
        <div class="flex-1 h-max rounded-[20px] bg-white shadow-md p-4">
          <!-- Thumbnail -->
          <img 
            class="w-full h-[300px] sm:h-[400px] lg:h-[500px] object-cover rounded-[20px]" 
            src="{{ Storage::url($tour->thumbnail) }}" 
            alt="{{ $tour->name }}"
          >
          <!-- Tour Name -->
          <h1 class="text-black text-[20px] sm:text-[24px] font-semibold mt-4">{{ $tour->name }}</h1>
          <!-- Tour Details -->
          <div class="flex flex-wrap justify-between gap-2 mt-2">
            <div class="flex gap-[10px]">
              <div>
                <p class="text-[12px] sm:text-[14px]">
                  <i class="fa-solid mr-2 fa-location-dot" style="color: #3dbeeb;"></i>
                  {{ $tour->location }}
                </p>
              </div>
              <div>
                <p class="text-[12px] sm:text-[14px]">
                  <i class="fa-solid fa-umbrella-beach mr-2" style="color: #3dbeeb;"></i>
                  {{ $tour->category->name }}
                </p>
              </div>
              <div>
                <p class="text-[12px] sm:text-[14px]">
                  <i class="fa-solid fa-calendar mr-2" style="color: #3dbeeb;"></i>
                  {{ $tour->days }} Days, {{ $tour->days - 1 }} Nights
                </p>
              </div>
            </div>
            <!-- Average Rating -->
            <div class="flex items-center gap-2">
              @if($tour->average_rating)
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                class="w-4 h-4 sm:w-5 sm:h-5" 
                viewBox="0 0 24 24" 
                fill="#FFD700"
              >
                <path 
                  d="M12 17.27L18.18 21l-1.64-7.19L21 9.24l-7.19-.61L12 2 10.19 8.63 3 9.24l5.46 4.57L6.82 21 12 17.27z" 
                />
              </svg>
              <p class="text-[12px] sm:text-[14px]">{{ number_format($tour->average_rating, 1) }}</p>
              @else
              <p class="text-[12px] sm:text-[14px] text-gray-500">No reviews</p>
              @endif
            </div>
          </div>
          <!-- Price and Button -->
          <div class="flex justify-between mt-5 items-center">
            <div class="text-[12px] sm:text-[14px]">
              Rp.{{ $tour->price }} /Packs
            </div>
            <div>
              <a href="{{route('front.details', $tour->slug)}}">
                <div class="w-max py-[10px] px-[20px] border-[1px] border-[#3dbeeb] bg-[#3dbeeb] text-white rounded-[20px] text-[12px] sm:text-[14px]">
                  Book Now
                </div>
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>
    
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
  
  <script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });
  </script>
  <script>
    // Handle button click to toggle dropdown
    document.getElementById('dropdownButton').addEventListener('click', function (e) {
        e.stopPropagation(); // Prevent click from bubbling up
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function () {
        const dropdownMenu = document.getElementById('dropdownMenu');
        if (!dropdownMenu.classList.contains('hidden')) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
@endsection

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{asset('js/flickity-slider.js')}}"></script>
    <script src="{{asset('js/two-lines-text.js')}}"></script>
    <script src="{{asset('js/dropdownmenu.js')}}"></script>
    
</body>
</html>