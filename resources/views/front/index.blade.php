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
      <div class="w-full mx-auto border-b-[2px] border-l-[2px] border-r-[2px] border-white shadow-md rounded-b-[20px] items-center flex justify-center h-[100px]">
        <div class="w-[1300px] h-full flex items-center justify-between">
            <!-- Logo Section -->
            <div class="w-[30%] flex justify-start">
                <img class="w-[60px] h-[60px] object-cover" src="{{asset('assets/logos/balisatulogo.png')}}" alt=""> 
              </div>
    
            <!-- Navigation Links -->
            <div class="w-[30%] text-white flex justify-center gap-[30px]">
                <a href="{{ route('front.index') }}">Home</a>
                <a href="">Travel</a>
                <a href="{{ route('front.about-us') }}">About Us</a>
                <a href="">Contact Us</a>
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
      </div>
      <div class="h-[calc(100vh-100px)] flex flex-col justify-center  max-w-[1300px] w-full mx-auto">
        <h1 class="text-white w-[800px] text-[60px] font-semibold">Let’s Explore 
          Heaven Together</h1>
          <a href="">
            <div class="flex items-center mt-4 border-[2px] border-white w-max p-[20px] rounded-[30px] text-[18px] font-semibold text-white justify-center">Explore More</div>
          </a>
      </div>
    </section>
    <section class="w-full max-w-[1300px] mx-auto mt-[100px] gap-[20px] flex flex-col h-max">
      <div class="max-w-[1300px] flex items-center justify-between w-full mx-auto">
        <div class="flex flex-col">
          <p class="text-gray-500 text-[12px]">CHOOSE YOUR ADVENTURE</p>
          <h1 class="text-black text-[36px] font-semibold">Travel Made for You</h1>
        </div>
        <div class="text-gray-500 text-[18px] w-[500px]">
          From beach retreats to cultural explorations, our travel categories offer something for every traveler. Discover your perfect getaway and let us bring your dream vacation to life!
        </div>
      </div>
      <div class="w-full flex justify-between space-x-4">
        @foreach ($categories as $category)
          <div class="flex-1 h-[500px] rounded-[20px] bg-black"><img class="w-full h-full object-cover rounded-[20px]" src="{{Storage::url($category->icon)}}" alt=""></div>
        @endforeach
        
      </div>      
    </section>
    <section class="w-full max-w-[1300px] mx-auto mt-[100px] gap-[20px] flex flex-col h-max">
      <div class="max-w-[1300px] flex items-center justify-between w-full mx-auto">
        <div class="flex flex-col">
          <p class="text-gray-500 text-[12px]">PICTURES OF OUR TRAVEL</p>
          <h1 class="text-black text-[36px] font-semibold">Our Gallery</h1>
        </div>
      </div>
      <div class="w-full flex justify-between space-x-4">
          <div class="flex-1 h-[250px] rounded-[20px] bg-black"></div>
          <div class="flex-1 h-[250px] rounded-[20px] bg-black"></div>
      </div>      
      <div class="w-full flex justify-between space-x-4">
          <div class="flex-1 h-[250px] rounded-[20px] bg-black"></div>
          <div class="flex-1 h-[250px] rounded-[20px] bg-black"></div>
          <div class="flex-1 h-[250px] rounded-[20px] bg-black"></div>
      </div>      
    </section>
    <section class="w-full max-w-[1300px] mx-auto mt-[100px] gap-[20px] flex flex-col h-max">
      <div class="max-w-[1300px] flex items-center justify-between w-full mx-auto">
          <div class="flex w-full flex-col">
              <p class="text-gray-500 text-center text-[12px]">EXPLORE POPULAR PACKAGE</p>
              <h1 class="text-black text-center text-[36px] font-semibold">
                  What we offer is an unforgettable<br>journey and experience
              </h1>
          </div>
      </div>
      <div class="w-full flex justify-between space-x-4">
          @foreach ($package_tours as $tour)
              <div class="flex-1 h-max rounded-[20px]">
                  <!-- Thumbnail -->
                  <img 
                      class="w-full h-[500px] object-cover rounded-[20px]" 
                      src="{{ Storage::url($tour->thumbnail) }}" 
                      alt="{{ $tour->name }}"
                  >
                  <!-- Tour Name -->
                  <h1 class="text-black text-[24px] font-semibold">{{ $tour->name }}</h1>
                  <!-- Tour Details -->
                  <div class="flex justify-between">
                      <div class="flex gap-[10px]">
                          <div>
                              <p class="text-[14px]">
                                  <i class="fa-solid mr-2 fa-location-dot" style="color: #3dbeeb;"></i>
                                  {{ $tour->location }}
                              </p>
                          </div>
                          <div>
                              <p class="text-[14px]">
                                  <i class="fa-solid fa-umbrella-beach mr-2" style="color: #3dbeeb;"></i>
                                  {{ $tour->category->name }}
                              </p>
                          </div>
                          <div>
                              <p class="text-[14px]">
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
                                  class="w-5 h-5" 
                                  viewBox="0 0 24 24" 
                                  fill="#FFD700"
                              >
                                  <path 
                                      d="M12 17.27L18.18 21l-1.64-7.19L21 9.24l-7.19-.61L12 2 10.19 8.63 3 9.24l5.46 4.57L6.82 21 12 17.27z" 
                                  />
                              </svg>
                              <p class="text-[14px]">{{ number_format($tour->average_rating, 1) }}</p>
                          @else
                              <p class="text-[14px] text-gray-500">No reviews</p>
                          @endif
                      </div>
                  </div>
                  <div class="flex justify-between mt-5 items-center">
                    <div class="">
                      Rp.{{ $tour->price }} /Packs
                    </div>
                    <div class="">
                      <a href="{{route('front.details', $tour->slug)}}"><div class="w-max py-[10px] px-[20px] border-[1px] border-[#3dbeeb] bg-[#3dbeeb] text-white rounded-[20px]">Book Now</div></a>
                    </div>
                  </div>
              </div>
          @endforeach
      </div>
  </section>
  <section class="w-full bg-footer h-[450px] mx-auto mt-[100px] gap-[20px] flex flex-col">
    <div class="max-w-[1300px] flex items-center justify-between w-full mx-auto">
      <div class="w-full flex justify-between space-x-4">
        <div class="flex-1 mt-8 text-white text-[36px]">
          <h1 class="">Lets’s Connect With Us</h1>
          <a href=""><u>balisatu@gmail.com</u></a>
        </div>
        <div class="text-right flex-col justify-end mt-8">
          <div class="">
            <a href="" class="text-[20px] text-white">About Us</a>
          </div>
          <div class="">
            <a href="" class="text-[20px] text-white">Contact Us</a>
          </div>
          <div class="">
            <a href="" class="text-[20px] text-white">Instagram</a>
          </div>
          <div class="">
            <a href="" class="text-[20px] text-white">Facebook</a>
          </div>
          
        </div>
    </div>      
    </div>
  </section>
  
@endsection

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{asset('js/flickity-slider.js')}}"></script>
    <script src="{{asset('js/two-lines-text.js')}}"></script>
</body>
</html>