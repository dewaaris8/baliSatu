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
    </div>  --}}
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
        {{-- <div class="overflow-hidden rounded-lg h-max" id="embla">
          <div class="flex touch-pan-y">
            @foreach ($latestPhotos as $photo )
            <div class="lg:flex-[0_0_66%]  h-[421px] pr-4">
              <a href="{{Storage::url($photo->photo)}}" class="">
                <img src="{{Storage::url($photo->photo)}}" class="rounded-lg object-cover h-full w-full" alt="thumbnail">
              </a>
            </div>  
            @endforeach
          </div>
        </div> --}}
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
              {{-- <div class="w-full flex justify-between">
                <div class="flex justify-center flex-col">
                  <h3 class="text-[#000000] opacity-[50%] text-[12px]">price</h3>
                  <div class="text-[20px] font-medium">Rp. 1200k <span class="text-[#000000] opacity-[50%] text-[12px]">/ person</span></div>
                </div>
                <div class="flex justify-center items-center">
                  <a href="">
                    <div class="rounded-[20px] bg-[#0077FF] text-[14px] font-medium text-[#fff] py-[20px] px-[30px]">Booking Now</div>
                  </a>
                </div>
              </div> --}}
            </div>
        
            <!-- Right Section -->
            <div class="lg:w-[33%] w-full border-[1px] border-[#0000002d] flex gap-[10px] rounded-[20px] flex-col p-[20px]">
              {{-- <h1 class="text-[20px] text-[#fdb304] font-medium mb-2">Reviews and Rating</h1>
              <div class="flex text-yellow-500">
                
                @for ($i = 1; $i <= 5; $i++)
                    @if($i <= $averageRating)
                        <!-- Filled Star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 .587l3.668 7.431 8.2 1.19-5.934 5.787 1.4 8.178L12 18.897 4.666 23.173l1.4-8.178L0 9.208l8.2-1.19z"/>
                        </svg>
                    @else
                        <!-- Outline Star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 .587l3.668 7.431 8.2 1.19-5.934 5.787 1.4 8.178L12 18.897 4.666 23.173l1.4-8.178L0 9.208l8.2-1.19z"/>
                        </svg>
                    @endif
                @endfor
                <div class="mx-4 flex flex-col gap-3 bg-white p-[16px_24px] rounded-[22px]">
                  <h2 class="font-semibold">Testimonial</h2>
                  <div class="flex flex-col gap-1">
                    <div class="flex items-center justify-between gap-2">
                      <div class="flex items-center gap-1">
                        <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008]">
                          <img src="{{asset('assets/photos/pfp2.png')}}" class="w-full h-full object-cover object-center" alt="photo">
                        </div>
                        <div class="flex flex-col gap-1">
                          <p class="font-bold text-sm leading-[22px] tracking-035">James Sullivan</p>
                          <p class="text-darkGrey text-xs leading-[20px] tracking-035">1 week ago</p>
                        </div>
                      </div>
                      <div class="flex gap-1 items-center">
                        <img src="{{asset('assets/icons/Star.svg')}}" alt="icon">
                        <img src="{{asset('assets/icons/Star.svg')}}" alt="icon">
                        <img src="{{asset('assets/icons/Star.svg')}}" alt="icon">
                        <img src="{{asset('assets/icons/Star.svg')}}" alt="icon">
                        <img src="{{asset('assets/icons/Star.svg')}}" alt="icon">
                      </div>
                    </div>
                    <p class="text-sm leading-[22px] tracking-035 text-darkGrey">The view was good, also I really love the weather. It’s very warm and good for healing</p>
                  </div>
                  <hr>
                  <div class="flex gap-4">
                    <div class="flex flex-col gap-3">
                      <p class="font-semibold">2.547 <span class="font-normal text-sm leading-[22px] tracking-035 text-darkGrey">Reviews</span></p>
                      <div class="flex items-center">
                        <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008] -ml-2 first-of-type:-ml-1">
                          <img src="{{asset('assets/photos/pfp2.png')}}" class="w-full h-full object-cover object-center" alt="photo">
                        </div>
                        <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008] -ml-2 first-of-type:-ml-1">
                          <img src="{{asset('assets/photos/pfp3.png')}}" class="w-full h-full object-cover object-center" alt="photo">
                        </div>
                        <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008] -ml-2 first-of-type:-ml-1">
                          <img src="{{asset('assets/photos/pfp4.png')}}" class="w-full h-full object-cover object-center" alt="photo">
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col gap-3">
                      <p class="font-semibold">Photo & Video</p>
                      <div class="flex gap-1">
                        <div class="w-12 h-12 flex shrink-0 rounded-lg overflow-hidden relative">
                          <img src="{{asset('assets/thumbnails/nusa-penida.jpg')}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                        </div>
                        <div class="w-12 h-12 flex shrink-0 rounded-lg overflow-hidden relative">
                          <img src="{{asset('assets/thumbnails/raja.jpg')}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                        </div>
                        <div class="w-12 h-12 flex shrink-0 rounded-lg overflow-hidden relative">
                          <img src="{{asset('assets/thumbnails/santorini.jpg')}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                          <div class="w-12 h-12 flex items-center justify-center bg-[#1c273080] absolute">
                            <span class="font-semibold text-white">101+</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="" class="flex items-center justify-between py-2 text-blue">
                    <span class="font-semibold text-sm leading-[22px] tracking-035">Read 2.546 more review</span>
                    <div>
                      <img src="{{asset('assets/icons/arrow-circle-right.svg')}}" alt="icon">
                    </div>
                  </a>
                </div> --}}
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
                      {{-- <div>
                          <label for="quantity" class="block text-sm font-medium text-gray-700">Number of Packages</label>
                          <input 
                              type="number" 
                              id="quantity" 
                              name="quantity" 
                              class="w-full border border-gray-300 rounded-md p-2 mt-1" 
                              min="1" 
                              required 
                          />
                      </div> --}}
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
                        {{-- <label class="block text-sm font-medium text-gray-700">User Details</label>
                        @if(auth()->check())
                            <p class="text-gray-800 font-medium">
                                {{ Auth::user()->name }} <br>
                                {{ Auth::user()->email }}
                            </p>
                        @else
                            <p class="text-gray-500 font-medium">
                                You are not logged in.
                            </p>
                        @endif --}}
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

            
    
  </body>
  </html>