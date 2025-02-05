@extends('front.layouts.app')

<style>
  .hero-img {
      background-image: url('{{ asset('assets/hero/hero.png') }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
  }

  .bg-footer {
      background-image: url('{{ asset('assets/hero/footer.png') }}');
      background-size: cover;
      background-position: center;
  }
</style>

@section('content')
    {{-- Hero Section --}}
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
                            <button id="dropdownButton" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-[#3dbeeb] dark:text-[#3dbeeb] bg-[#15192d] hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                @auth
                                    <div>{{ Auth::user()->name }}</div>
                                @endauth
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                            <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 text-[#3dbeeb] dark:text-[#3dbeeb] bg-[#15192d] border border-gray-200 dark:border-gray-700 rounded-md shadow-lg hidden">
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                        <a href="{{ route('register') }}" class="px-[15px] py-[8px] sm:px-[20px] sm:py-[10px] lg:flex items-center rounded-[20px] text-[#3dbeeb] border-[1px] border-[#3dbeeb]">
                            Register
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="h-[calc(100vh-100px)] flex flex-col justify-center max-w-[80%] lg:max-w-[1300px] w-full mx-auto">
            <h1 class="text-white w-full text-center lg:text-[60px] text-[30px] font-semibold mb-8">
                Let’s Explore Heaven Together
            </h1>

            <!-- Search Bar -->
            <form action="{{ route('front.travel') }}" method="GET" class="w-full bg-white rounded-[20px] p-4 shadow-lg flex flex-col lg:flex-row gap-4 items-center">
                <!-- Search Input -->
                <div class="relative flex-1 w-full lg:w-auto">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search tours..." 
                        class="w-full px-4 py-3 border-[1px] border-gray-300 rounded-[20px] focus:outline-none focus:border-[#3dbeeb] focus:ring-1 focus:ring-[#3dbeeb] transition-all"
                        value="{{ request('search') }}"
                    >
                    <i class="fa-solid fa-magnifying-glass absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>

                <!-- Category Filter -->
                <div class="relative flex-1 w-full lg:w-auto">
                    <select 
                        name="category" 
                        class="w-full px-4 py-3 border-[1px] border-gray-300 rounded-[20px] focus:outline-none focus:border-[#3dbeeb] focus:ring-1 focus:ring-[#3dbeeb] transition-all appearance-none"
                    >
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full lg:w-auto px-6 py-3 bg-[#3dbeeb] text-white rounded-[20px] hover:bg-[#2fa8d1] transition-all focus:outline-none focus:ring-2 focus:ring-[#3dbeeb] focus:ring-offset-2"
                >
                    Search
                </button>
            </form>
        </div>
    </section>

    <!-- Tours Listing Section -->
    <section class="lg:w-[1300px] w-[80%] mt-[100px] mx-auto">
        <!-- Search and Filter Form -->
        @if (request('search') || request('category'))
            <h2 class="text-xl font-semibold text-gray-800 mb-4">
                Results for 
                @if (request('search'))
                    "{{ request('search') }}"
                @endif
                @if (request('search') && request('category'))
                    in 
                @endif
                @if (request('category'))
                    "{{ $categories->find(request('category'))->name ?? 'Unknown Category' }}" Category
                @endif
            </h2>
        @endif
        
        <!-- Tours Listing -->
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($package_tours as $tour)
                <div class="flex-1 lg:h-[700px] h-max rounded-[20px] bg-white shadow-md p-4">
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24" fill="#FFD700">
                                    <path d="M12 17.27L18.18 21l-1.64-7.19L21 9.24l-7.19-.61L12 2 10.19 8.63 3 9.24l5.46 4.57L6.82 21 12 17.27z" />
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
                            <a href="{{ route('front.details', $tour->slug) }}">
                                <div class="w-max py-[10px] px-[20px] border-[1px] border-[#3dbeeb] bg-[#3dbeeb] text-white rounded-[20px] text-[12px] sm:text-[14px]">
                                    Book Now
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $package_tours->links() }}
        </div>
    </section>

    <!-- Footer Section -->
    <section class="w-full bg-footer h-[300px] mx-auto mt-[100px] gap-[20px] flex flex-col">
        <div class="lg:max-w-[1300px] md:w-[80%] flex-col lg:flex-row flex items-center justify-between lg:w-full mx-auto">
            <div class="w-full flex flex-col lg:flex-row lg:justify-between space-x-4">
                <div class="flex-1 mt-8 text-white text-[36px]">
                    <h1 class="">Let’s Connect With Us</h1>
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

    <!-- Scripts -->
    <script src="{{ asset('js/dropdownmenu.js') }}"></script>
    <script src="{{ asset('js/responsivenavbar.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/flickity-slider.js') }}"></script>
    <script src="{{ asset('js/two-lines-text.js') }}"></script>
@endsection