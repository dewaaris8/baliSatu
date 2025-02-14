<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('output.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  @vite('resources/css/app.css')
</head>
<body class="font-poppins text-black">
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
      <div class="lg:w-[1300px] w-[80%] flex flex-col gap-[30px] mx-auto py-[50px]">
        <!-- Header -->
        <div class="lg:text-[32px] md:text-[32px] text-[25px] font-medium">
          <h1>{{$packageTour->name}}</h1>
          <div class="flex gap-[20px] w-full">
            <div class="">
                <i></i>
                <p class="lg:text-[14px] md:text-[14px] text-[12px]"><i class="fa-solid mr-2 fa-location-dot" style="color: #3dbeeb;"></i>{{$packageTour->location}}</p>
            </div>
            <div class="flex items-center gap-2">
              @if($averageRating)
                  <!-- Star Icon and Average Rating -->
                  <svg 
                      xmlns="http://www.w3.org/2000/svg" 
                      class="w-5 h-5" 
                      viewBox="0 0 24 24" 
                      fill="#FFD700"
                  >
                      <path 
                          d="M12 17.27L18.18 21l-1.64-7.19L21 9.24l-7.19-.61L12 2 10.19 8.63 3 9.24l5.46 4.57L6.82 21 12 17.27z" 
                      />
                  </svg>
                  <p class="lg:text-[14px] md:text-[14px] text-[12px]">{{ $averageRating }}</p>
              @else
                  <!-- No Reviews Message -->
                  <p class="lg:text-[14px] md:text-[14px] text-[12px] text-gray-500">No reviews</p>
              @endif
          </div>
          
            <div class="">
                <i></i>
                <p class="lg:text-[14px] md:text-[14px] text-[12px]"><i class="fa-solid fa-umbrella-beach mr-2" style="color: #3dbeeb;"></i>{{$packageTour->category->name}}</p>
            </div>
            <div class="">
                <i></i>
                <p class="lg:text-[14px] md:text-[14px] text-[12px]"><i class="fa-solid  fa-calendar mr-2 " style="color: #3dbeeb;"></i>{{$packageTour->days }} Days, {{$packageTour->days - 1}} Nights</p>
            </div>
        </div>
        
          
        </div>
        
        <!-- Slider Container -->
        <div class="overflow-hidden rounded-lg h-max" id="embla">
          <div class="flex touch-pan-y">
              @foreach ($latestPhotos as $photo)
              <div class="flex-[0_0_80%] sm:flex-[0_0_70%] md:flex-[0_0_60%] lg:flex-[0_0_66%] h-[421px] pr-4">
                  <a href="{{ Storage::url($photo->photo) }}" class="">
                      <img src="{{ Storage::url($photo->photo) }}" 
                           class="rounded-lg object-cover w-full h-full" 
                           alt="thumbnail">
                  </a>
              </div>
              @endforeach
          </div>
      </div>
      
        <div class="w-full flex flex-col">
          <div class="lg:w-full w-[80] lg:justify-between  lg:flex-row flex-col flex">
            <!-- Left Section -->
            <div class="lg:w-[65%] w-full flex h-max gap-[20px] flex-col rounded-[20px]">
              <!-- Tabs -->
              <div class="w-full text-[16px] flex gap-[8px]">
                <div 
                  class="tab-button cursor-pointer  rounded-full text-[11px] lg:text-[15px] md:text-[15px] bg-[#3dbeeb] text-[#ffffff] flex justify-center items-center px-[20px] py-[10px]" 
                  data-tab="overview">
                  Overview
                </div>
                <div 
                  class="tab-button rounded-full cursor-pointer border-[1px] text-[11px] lg:text-[15px] md:text-[15px] border-[#3dbeeb] px-[20px] flex justify-center items-center py-[10px]" 
                  data-tab="included">
                  What's Included
                </div>
                <div 
                  class="tab-button rounded-full cursor-pointer border-[1px] text-[11px] lg:text-[15px] md:text-[15px] border-[#3dbeeb] px-[20px] flex justify-center items-center py-[10px]" 
                  data-tab="itinerary">
                  Itenerary
                </div>
              </div>
        
              <!-- Tab Content -->
              <div id="overview" class="tab-content">
                <h1 class="text-[20px] text-[#15192d] font-medium mb-2">Travel Description</h1>
                <p class="font-normal text-justify text-[14px]">
                  {{$packageTour->about}}
                </p>
              </div>
        
              <div id="included" class="tab-content hidden">
                <h1 class="text-[20px] font-medium mb-2">Inclusions & Exclusions</h1>
                <div class="flex gap-[50px]">
                  <!-- Left container for type 1 -->
                  <div class="w-[500px]">
                      <ul class="text-[14px]">
                          @foreach ($inclusions as $inclusion)
                              @if ($inclusion->type == 1)
                                  <li class="mb-3 flex items-center gap-2">
                                      <i class="fa-solid fa-check" style="color: #FFD43B;"></i>
                                      <span>{{ $inclusion->description }}</span>
                                  </li>
                              @endif
                          @endforeach
                      </ul>
                  </div>
                  
                  <!-- Right container for type 0 -->
                  <div class="w-[500px]">
                      <ul class="text-[14px]">
                          @foreach ($inclusions as $inclusion)
                              @if ($inclusion->type == 0)
                                  <li class="mb-3 flex items-center gap-2">
                                      <i class="fa-solid fa-xmark" style="color: #FFD43B;"></i>
                                      <span>{{ $inclusion->description }}</span>
                                  </li>
                              @endif
                          @endforeach
                      </ul>
                  </div>
              </div>
              
              </div>
        
              <div id="itinerary" class="tab-content hidden">
                <h1 class="text-[20px] font-medium mb-2">Your Travel Itinerary</h1>
                <p class="font-normal text-justify text-[14px]">Our carefully crafted itineraries are designed to provide you with an unforgettable experience. Each itinerary outlines the key destinations, activities, and timelines to ensure your trip is smooth, enjoyable, and packed with the best experiences. From scenic views to local culinary delights, each day of the tour is planned to offer a perfect balance of adventure, relaxation, and cultural exploration.</p>
                <div class="space-y-4 rounded-[10px]">
                  @foreach ($plans as $plan)
                      <div x-data="{ open: false }" class="bg-[#3dbeeb] border mt-[20px] rounded-[10px] shadow-md">
                          <!-- Dropdown Toggle -->
                          <button 
                              @click="open = !open" 
                              class="w-full text-left px-4 py-2 bg-[#3dbeeb] text-[#fff] hover:bg-gray-200 font-medium"
                          >
                             Day  {{ $plan->day }}</span> 
                          </button>
              
                          <!-- Dropdown Content with Animation -->
                          <div 
                              x-show="open" 
                              x-transition:enter="transition ease-out duration-300 transform"
                              x-transition:enter-start="opacity-0 -translate-y-2"
                              x-transition:enter-end="opacity-100 translate-y-0"
                              x-transition:leave="transition ease-in duration-200 transform"
                              x-transition:leave-start="opacity-100 translate-y-0"
                              x-transition:leave-end="opacity-0 -translate-y-2"
                              x-cloak 
                              class="px-4 py-2 bg-white border-t"
                          >
                              <p class="text-[14px]">{{ $plan->description }}</p>
                          </div>
                      </div>
                  @endforeach
              </div>
              
              
              </div>
              
              <div class="">
                <h1 class="text-[20px] text-[#15192d] font-medium mb-2">Travel Reviews</h1>

                @if($reviews->isEmpty())
                <p class="text-gray-500 text-center">No reviews available for this package yet.</p>
            @else
                @foreach($reviews as $review)
                    <div class="flex w-full">
                        <div class="review-item w-full bg-white p-6 mb-6 rounded-lg shadow-md border border-gray-300 hover:shadow-lg transition-shadow duration-300">
                            <!-- Header Section -->
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="font-semibold text-lg text-gray-800">{{ $review->user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $review->created_at->format('d M, Y') }}</p>
                                </div>
                                <div class="flex items-center">
                                    <span style="color: #FFD43B;" class=" text-lg">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </span>
                                    <p class="ml-2 text-sm text-gray-600">({{ $review->rating }} / 5)</p>
                                </div>
                            </div>
                            
                            <!-- Content Section -->
                            <p class="text-base text-gray-700 mb-4">{{ $review->review }}</p>
            
                            <!-- Footer Section -->
                            <div class="text-right">

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
              </div>
              <!-- Price and Booking -->
            </div>
        
            <!-- Right Section -->
            <div class="lg:w-[33%] w-full border-[1px] border-[#0000002d] flex gap-[10px] rounded-[20px] flex-col p-[20px]">
                <div class="w-[100%] flex gap-[10px] rounded-[20px] flex-col p-[20px] bg-white">
                  <h2 class="text-xl font-bold text-gray-800">Book Your Travel Package</h2>
                  <form method="POST"  action="{{route('front.book_store', $packageTour->slug)}}" class="flex flex-col gap-4">
                      @csrf
                      <!-- Trip Destination -->
                      <div>
                          <label for="destination" class="block text-sm font-medium text-gray-700">Trip Destination</label>
                          <input 
                              type="text" 
                              id="destination" 
                              value="{{ $packageTour->name }}" 
                              class="w-full border border-gray-300 rounded-md p-2 mt-1" 
                              readonly 
                          />
                      </div>
                      <!-- Start Date -->
                      <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input 
                            type="date" 
                            id="start_date" 
                            name="start_date" 
                            class="w-full border border-gray-300 rounded-md p-2 mt-1" 
                            required 
                            onchange="calculateEndDate()" 
                        />
                    </div>
                      <!-- End Date -->
                      <div>
                          <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                          <input 
                              type="text" 
                              id="end_date" 
                              class="w-full border border-gray-300 rounded-md p-2 mt-1 bg-gray-100" 
                              readonly 
                          />
                      </div>
                      <!-- Number of Packages -->
                      <div class="flex bg-black flex-col gap-3">
                        <div class="bg-white flex items-center gap-3">
                          <div class="w-[72px] h-[72px] flex shrink-0 rounded-xl overflow-hidden">
                            <img src="{{Storage::url($packageTour->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                          </div>
                          <div class="flex flex-col gap-1">
                            <p class="font-semibold text-sm tracking-035 leading-[22px]">{{$packageTour->name}}</p>
                            <div class="flex gap-1 items-center">
                              <div class="w-4 h-4">
                                <img src="{{asset('assets/icons/location-map.svg')}}" class="w-4 h-4" alt="icon">
                              </div>
                              <span class="text-darkGrey text-sm tracking-035 leading-[22px]">{{$packageTour->location}}</span>
                            </div>
                          </div>
                          <div class="flex flex-1 items-center justify-end gap-2">
                            <button type="button" id="remove-quantity"><img src="{{asset('assets/icons/minus-square.svg')}}" alt="icon"></button>
                            <p id="quantity" class="font-semibold text-sm">1</p>
                            <input type="hidden" name="quantity" id="quantity_input" value="1" />
                            <input type="hidden" name="packageTourPrice" id="packageTourPrice" value="{{$packageTour->price}}" />
                            <button type="button" id="add-quantity"><img src="{{asset('assets/icons/add-square.svg')}}" alt="icon"></button>
                          </div>
                        </div>
                      </div>
                      <!-- User Details -->
                      <div>
                        <div class="flex flex-col gap-3 ">
                          <p class="font-semibold">Contact Details</p>
                          <div class="w-full flex flex-col gap-3">
                            @if(auth()->check())
                              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                                <p>Name</p>
                                <p class="font-semibold">{{Auth::user()->name}}</p>
                              </div>
                              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                                <p>Email</p>
                                <p class="font-semibold">{{Auth::user()->email}}</p>
                              </div>
                              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                                <p>Phone</p>
                                <p class="font-semibold">+62 {{Auth::user()->phone_number}}</p>
                              </div>
                              @else
                            <p class="text-gray-500 font-medium">
                                You are not logged in.
                            </p>
                        @endif
                          </div>
                        </div>
                      </div>
                      <!-- Payment Summary -->
                      <div>
                          <label class="block text-sm font-medium text-gray-700">Payment Summary</label>
                          {{-- <p id="payment_summary" class="text-gray-800 font-medium">Total: $0.00</p> --}}
                          <div class="bg-white rounded-[26px] flex flex-col gap-3">
                            <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                              <p>Sub Total</p>
                              <p id="subtotal" class="font-semibold text-blue"></p>
                            </div>
                            <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                              <p>Insurance <span class="text-darkGrey">x<span id="total_quantity"></span></span></p>
                              <p id="insurance" class="font-semibold text-blue"></p>
                            </div>
                            <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                              <p>Tax 10%</p>
                              <p id="tax" class="font-semibold text-blue"></p>
                            </div>
                          </div>
                      </div>
                      <!-- Submit Button -->
                      <button 
                          type="submit" 
                          class=" bg-[#3dbeeb] text-white py-2 px-4 rounded-md hover:bg-indigo-700"
                      >
                          Book Now
                      </button>
                  </form>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>

    <!-- Container Utama -->
<!-- Container Utama -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>

    <script src="{{asset('js/details.js')}}"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        // Function to initialize Embla with specific alignment
        const initializeEmbla = (alignment) => {
          const emblaNode = document.querySelector('#embla');
          return EmblaCarousel(emblaNode, {
            align: alignment,
            loop: true,
            slidesToScroll: 1,
            dragFree: true,
          });
        };
    
        // Initial Embla setup
        let embla = initializeEmbla(window.matchMedia('(max-width: 640px)').matches ? 'start' : 'center');
    
        // Listen for screen size changes
        const mediaQuery = window.matchMedia('(max-width: 640px)');
        mediaQuery.addEventListener('change', (event) => {
          const newAlignment = event.matches ? 'start' : 'center';
          embla.destroy(); // Destroy the existing instance
          embla = initializeEmbla(newAlignment); // Reinitialize with new alignment
        });
      });
    </script>
    
            <script>
              // Tab functionality
              document.querySelectorAll('.tab-button').forEach(button => {
                button.addEventListener('click', () => {
                  // Remove active style from all buttons
                  document.querySelectorAll('.tab-button').forEach(btn => {
                    btn.classList.remove('bg-[#3dbeeb]', 'text-[#ffffff]');
                    btn.classList.add('border-[1px]', 'border-[#888888]', 'text-black');
                  });
            
                  // Add active style to clicked button
                  button.classList.add('bg-[#3dbeeb]', 'text-[#ffffff]');
                  button.classList.remove('border-[1px]', 'border-[#888888]', 'text-black');
            
                  // Hide all tab contents
                  document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                  });
            
                  // Show the content corresponding to the clicked button
                  const targetId = button.getAttribute('data-tab');
                  document.getElementById(targetId).classList.remove('hidden');
                });
              });

              function calculateEndDate() {
        const startDate = document.getElementById('start_date').value;
        const packageDays = {{ $packageTour->days }};
        if (startDate) {
            let endDate = new Date(startDate);
            endDate.setDate(endDate.getDate() + packageDays - 1); // Subtract 1 because it's inclusive
            document.getElementById('end_date').value = endDate.toISOString().split('T')[0];
        }
    }
            </script>
            <script src="{{asset('js/booking.js')}}"></script>
            <script>
              // Fungsi untuk mengatur tanggal minimum
              function setMinDate() {
                  const today = new Date();
                  const year = today.getFullYear();
                  const month = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
                  const day = String(today.getDate()).padStart(2, '0');
                  
                  const minDate = `${year}-${month}-${day}`;
                  document.getElementById('start_date').setAttribute('min', minDate);
              }
          
              // Jalankan fungsi saat halaman dimuat
              window.onload = setMinDate;
          </script>

            
    
  </body>
  </html>