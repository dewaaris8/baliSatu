<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('output.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  @vite('resources/css/app.css')
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
</head>
<body class="font-poppins text-black">
    {{-- <section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
        <nav class="mt-8 px-4 w-full flex items-center justify-between">
          <a href="payment.html">
            <img src="{{asset('assets/icons/back.png')}}" alt="back">
          </a>
          <p class="text-center m-auto font-semibold">Schedule</p>
          <div class="w-12"></div>
        </nav>
        <div class="flex flex-col gap-3 px-4">
          <p class="font-semibold">My Packages</p>
          @forelse (Auth::user()->bookings as $booking )
          <a href="{{route('dashboard.booking_details', $booking->id)}}" class="card">
            <div class="bg-white p-4 rounded-[26px] flex items-center gap-4">
              <p class="text-center text-sm leading-[22px] tracking-035"><span class="font-semibold text-2xl">{{$booking->start_date->format('d')}}</span> <br> {{$booking->start_date->format('M')}} <br>{{$booking->start_date->format('Y')}}</p>
              <div class="flex items-center gap-4">
                <div class="w-[92px] h-[92px] flex shrink-0 rounded-xl overflow-hidden">
                  <img src="{{Storage::url($booking->tour->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                </div>
                <div class="flex flex-col gap-1">
                  <p class="font-semibold text-sm tracking-035 leading-[22px]">{{$booking->tour->name}}</p>
                  <p class="text-sm leading-[22px] tracking-035 text-darkGrey">{{$booking->tour->days}} | {{$booking->quantity}} packs</p>
                  @if ($booking->is_paid)    
                  <div class="success-badge w-fit border border-[#60A5FA] p-[4px_8px] rounded-lg bg-[#EFF6FF] flex items-center justify-center">
                    <span class="text-xs leading-[22px] tracking-035 text-[#2563EB]">Success Paid</span>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </a>
          @empty
          <p>No bookings found</p>
          @endforelse
          
          
        </div>
        <div class="navigation-bar fixed bottom-0 z-50 max-w-[640px] w-full h-[85px] bg-white rounded-t-[25px] flex items-center justify-evenly py-[45px]">
          <a href="home.html" class="menu opacity-25">
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
          <a href="" class="menu">
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
    {{-- <div class="w-full bg-[#15192d] mx-auto border-[1px] border-[#6666662d] shadow-md rounded-b-[20px] items-center flex justify-center h-[100px]">
      <div class="w-[1300px] h-full flex items-center justify-between">
          <!-- Logo Section -->
          <div class="w-[30%] flex justify-start">
              <img class="w-[60px] h-[60px] object-cover" src="{{asset('assets/logos/balisatulogo.png')}}" alt=""> 
            </div>
  
          <!-- Navigation Links -->
          <div class="w-max text-white flex justify-center gap-[30px]">
            <a href="{{ route('front.index') }}">Home</a>
            <a href="{{route('front.travel')}}">Travel</a>
            <a href="{{ route('front.about-us') }}">About Us</a>
            <a href="{{route ('front.contact-us') }}">Contact Us</a>
            <a href="{{route ('dashboard.bookings') }}">My Bookings</a>
          </div>
  
          <!-- User Section -->
          <div class="w-[30%] gap-[10px] justify-end flex">
              @if(auth()->check())
                  <!-- If Logged In: Display User Name -->
                  <div class="px-[20px] py-[10px] flex items-center rounded-[20px] border-[1px] text-[#3dbeeb] font-medium border-[#fff]">
                      Welcome, {{ auth()->user()->name }}!
                  </div>
              @else
                  <!-- If Not Logged In: Display Login and Register Buttons -->
                  <a href="{{ route('login') }}" class="px-[20px] py-[10px] flex items-center rounded-[20px] border-[1px] bg-[#3dbeeb] text-[white] border-[#fff]">
                      Login
                  </a>
                  <a href="{{ route('register') }}" class="px-[20px] py-[10px] flex items-center rounded-[20px] text-[#3dbeeb] border-[1px] border-[#3dbeeb]">
                      Register
                  </a>
              @endif
          </div>
      </div>
    </div> --}}
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
    <section class="w-full max-w-[80%] lg:max-w-[1300px] mx-auto mt-[100px] gap-[20px] flex flex-col">
      <div class="w-full flex items-center justify-between">
        <div class="">
            <h1 class="lg:text-[36px] md:text-[36px] text-[25px] font-medium">All Your Tour Package</h1>
          <P class="text-gray-500 text-[12px]">Check Your Schedule Here</P>
        </div>
        <div class="">
            <h1 class="lg:text-[20px] md:text-[20px] text-[18px] font-medium">Hi, Welcome </h1>
          <P class="text-[#3dbeeb] text-[20px]"><span class="text-black"></span>{{Auth::user()->name}}</P>
        </div>
      </div>
      <hr>
      @php
    // Filter the bookings where is_paid is true and paginate them
        $paginatedBookings = Auth::user()
            ->bookings()
            ->where('is_paid', true) // Query Builder method
            ->paginate(5); // 5 items per page
      @endphp

<div class="w-full gap-[20px] flex flex-col">
    @forelse ($paginatedBookings as $booking)
        <div class="w-full rounded-[20px]">
            <a href="{{ route('dashboard.booking_details', $booking->id) }}" class="card">
                <div class="w-full flex justify-between bg-[#F9FAFC] text-[12px] py-[10px] px-[20px] rounded-t-[10px]">
                    {{ auth()->user()->name }}
                    <div class="">
                        Click Here Check Your Booking Details
                    </div>
                </div>
                <div class="w-full flex justify-between bg-[#15192d] text-white text-[11px] lg:text-[18px] md:text-[16px]  py-[20px] px-[20px] rounded-b-[10px]">
                    <div class="">
                        {{ $loop->iteration + ($paginatedBookings->currentPage() - 1) * $paginatedBookings->perPage() }}. {{ auth()->user()->name }}
                    </div> 
                    <div class="text-left w-max">
                        {{ $booking->tour->name }}
                    </div>  
                    <div class="hidden md:block lg:block">
                        <p>{{ $booking->tour->days }} days | {{ $booking->quantity }} packs</p>
                    </div>  
                    <div class="hidden md:block lg:block">
                        Rp. {{ number_format($booking->total_amount, 0, '.', ' ') }}
                    </div>  
                    <div class="">
                        <div class="success-badge w-fit border border-[#60A5FA] p-[4px_8px] rounded-lg bg-[#EFF6FF] flex items-center justify-center">
                            <span class="text-xs leading-[22px] tracking-035 text-[#2563EB]">Success Paid</span>
                        </div>
                    </div>  
                </div>  
            </a>
        </div>
    @empty
        <p>No bookings found</p>
    @endforelse

    <!-- Pagination Links -->
    <div class="mt-4 flex flex-col sm:flex-row pb-14 justify-between items-center w-full">
      <!-- Data Summary -->
      <div class="text-gray-600 text-sm mb-2 sm:mb-0">
          Showing 
          <span class="font-semibold text-gray-800">
              {{ $paginatedBookings->firstItem() }}
          </span> 
          to 
          <span class="font-semibold text-gray-800">
              {{ $paginatedBookings->lastItem() }}
          </span> 
          of 
          <span class="font-semibold text-gray-800">
              {{ $paginatedBookings->total() }}
          </span> 
          entries
      </div>
  
      <!-- Pagination Controls -->
      <div class="flex justify-between items-center w-full sm:w-auto">
          <!-- Previous Button -->
          <div>
              @if ($paginatedBookings->onFirstPage())
                  <span class="text-gray-400 cursor-not-allowed px-4 py-2 border border-gray-200 rounded-md">
                      Previous
                  </span>
              @else
                  <a href="{{ $paginatedBookings->previousPageUrl() }}" class="text-gray-800 px-4 py-2 border border-gray-200 rounded-md hover:bg-gray-100 transition duration-300">
                      Previous
                  </a>
              @endif
          </div>
  
          <!-- Pagination Links -->
          <div class="flex space-x-2 mx-4">
              @foreach ($paginatedBookings->links()->elements[0] as $page => $url)
                  @if ($page == $paginatedBookings->currentPage())
                      <span class="px-4 py-2 border border-gray-800 text-white bg-gray-800 rounded-md">
                          {{ $page }}
                      </span>
                  @else
                      <a href="{{ $url }}" class="px-4 py-2 border border-gray-200 text-gray-800 rounded-md hover:bg-gray-100 transition duration-300">
                          {{ $page }}
                      </a>
                  @endif
              @endforeach
          </div>
  
          <!-- Next Button -->
          <div>
              @if ($paginatedBookings->hasMorePages())
                  <a href="{{ $paginatedBookings->nextPageUrl() }}" class="text-gray-800 px-4 py-2 border border-gray-200 rounded-md hover:bg-gray-100 transition duration-300">
                      Next
                  </a>
              @else
                  <span class="text-gray-400 cursor-not-allowed px-4 py-2 border border-gray-200 rounded-md">
                      Next
                  </span>
              @endif
          </div>
      </div>
  </div>
  
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
<script src="{{asset('js/dropdownmenu.js')}}"></script>
<script src="{{asset('js/responsivenavbar.js')}}"></script>
</body>
</html>