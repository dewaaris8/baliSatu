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
                <a href="{{ route('front.travel') }}">Travel</a>
                <a href="{{ route('front.about-us') }}">About Us</a>
                <a href="{{ route('front.contact-us') }}">Contact Us</a>
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
        <h1 class="text-white w-full text-center text-[60px] font-semibold">Let’s Explore 
          Heaven Together</h1>
            <form action="{{ route('front.travel') }}" method="GET" class="w-full rounded-[20px] flex justify-between items-center">
                <!-- Search Input -->
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search tours..." 
                    class="border-[1px] border-gray-300 rounded-[20px] py-[20px] w-[60%]"
                    value="{{ request('search') }}"
                >
        
                <!-- Category Filter -->
                <select 
                    name="category" 
                    class="border-[1px] border-gray-300 rounded-[20px] py-[20px] w-[30%]"
                >
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option 
                            value="{{ $category->id }}" 
                            {{ request('category') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
        
                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="py-[20px] w-[10%] px-[20px] bg-[#3dbeeb] text-white rounded-[20px]"
                >
                    Search
                </button>
            </form>
          
      </div>
    </section>
    <section class="w-[1300px] mt-8 mx-auto">
        <!-- Search and Filter Form -->
        
    
        <!-- Tours Listing -->
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
    
        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $package_tours->links() }}
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