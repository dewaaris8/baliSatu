<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('output.css')}}" rel="stylesheet">
  <link style="width: 100%; height: 100%; object-fit: cover;" rel="icon" href="{{ asset('assets/logos/balisatulogo.png') }}" type="image/x-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
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

    .star-rating input:checked ~ label svg,
    .star-rating label:hover svg,
    .star-rating label:hover ~ label svg {
        fill: #fbbf24; /* Change to your desired star color */
        stroke: #fbbf24;
    }

    .star-rating input:checked + label svg {
        fill: #fbbf24; /* Change to your desired star color */
        stroke: #fbbf24;
    }
    </style>
</head>
<body class="font-poppins text-black">
    <section class="w-full h-[60vh] hero-img">
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
      <div class="h-max flex flex-col justify-center mt-[10vh] max-w-[80%] lg:max-w-[1300px] w-full mx-auto">
        <div class="">
          <h1 class="text-white w-[800px] text-[32px] font-semibold">Tour Booking Detail</h1>
          <p class="text-[18px] text-white">Happy Traveling</p>
        </div>
        <div class="w-full flex gap-5 lg:flex-row flex-col mt-4 justify-between">
          <div class="flex-[50%] h-max overflow-hidden  bg-white shadow-md rounded-[20px] ">
            <div class="w-full flex bg-[#FAB404] gap-[30px] items-center p-[20px] ">
              <div class="flex h-[70px] w-[80px] rounded-[100px] items-center justify-center bg-[#3DC0EC]">
                <i class="fa-solid fa-wallet text-[25px] text-white"></i>
              </div>
              <div class="flex w-full flex-col  items-start justify-center ">
                <h1 class="text-white text-[20px] font-semibold">Status Payment Success!</h1>
                <p class="text-[16px] text-white">Your order has been successfully paid. Thank you for your purchase!</p>
              </div>
            </div>
            <div class="text-[18px] p-[20px]">
              <h1>Booking Details</h1>
              <div class="w-full mt-4 rounded-[20px] flex p-[20px] flex-col gap-[20px] justify-center h-max border-[1px] border-gray-300">
                <div class="w-full flex justify-between">
                  <p class="text-[16px] text-gray-500">Name</p>
                  <p class="text-[16px] text-black">{{$packageBooking->customer->name}}</p>
                </div>
                <div class="w-full flex justify-between">
                  <p class="text-[16px] text-gray-500">Quantity</p>
                  <p class="text-[16px] text-black">{{$packageBooking->quantity}}</p>
                </div>
                <div class="w-full flex justify-between">
                  <p class="text-[16px] text-gray-500">Price</p>
                  <p class="text-[16px] text-black"> {{ optional($packageBooking->tour)->price ? 'Rp. ' . number_format($packageBooking->tour->price, 0, '.', ' ') : 'Tour Deleted' }}</p>
                </div>
                <div class="w-full flex justify-between">
                  <p class="text-[16px] text-gray-500">Sub Total</p>
                  <p class="text-[16px] text-black">Rp. {{number_format($packageBooking->sub_total, 0, '.' ,' ')}}</p>
                </div>
                <div class="w-full flex justify-between">
                  <p class="text-[16px] text-gray-500">Total Payment (price, tax, insurance) </p>
                  <p class="text-[16px] text-black">Rp. {{number_format($packageBooking->total_amount, 0, '.' ,' ')}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="flex-[30%] flex flex-col gap-[20px] mb-5 h-max bg-white p-[20px] shadow-md rounded-[20px] ">
            <h1 class="text-[18px] font-medium">Package Tour Details</h1>
            <div class="w-full h-max flex flex-col gap-[10px] overflow-hidden">
              @if (optional($packageBooking->tour)->thumbnail)
                  <img src="{{ Storage::url($packageBooking->tour->thumbnail) }}" 
                      class="w-full rounded-[20px] h-[200px] object-cover object-center" 
                      alt="thumbnail">
              @else
                  <div class="w-full h-[200px] flex items-center justify-center bg-gray-200 rounded-[20px] text-gray-600 text-[18px] font-semibold">
                      Tour Deleted
                  </div>
              @endif
              <h1 class="text-[16px]">{{optional($packageBooking->tour)->name ?? 'tour deleted'}}</h1>
              <span class="text-darkGrey text-sm tracking-035 leading-[22px]">{{$packageBooking->start_date->format('d, M, Y')}} - {{$packageBooking->end_date->format('d, M, Y')}}</span>
              <p class="w-full text-[12px] text-justify text-black">
                {{optional($packageBooking->tour)->about ?? 'tour deleted'}}
              </p>
            </div>
            <div class="flex flex-col gap-4 p-6 bg-white rounded-lg shadow-md">
              <p class="font-medium text-xl text-gray-800">Leave a Review</p>
          
              @if ($packageBooking->tour)
                  <form action="{{ route('package_tours.reviews.store', $packageBooking->tour->id) }}" method="POST">
                      @csrf
                      <!-- Star Rating -->
                      <div class="mb-4">
                          <label class="block text-sm font-medium text-gray-700 mb-2">Rating (1-5):</label>
                          <div class="flex space-x-1">
                              <div class="star-rating flex">
                                  @for ($i = 5; $i >= 1; $i--)
                                      <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden" />
                                      <label for="star{{ $i }}" class="cursor-pointer text-gray-300 hover:text-yellow-400 transition-colors">
                                          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                          </svg>
                                      </label>
                                  @endfor
                              </div>
                          </div>
                      </div>
          
                      <!-- Review Textarea -->
                      <div class="mb-4">
                          <label for="review" class="block text-sm font-medium text-gray-700 mb-2">Review:</label>
                          <textarea
                              name="review"
                              id="review"
                              rows="4"
                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                              placeholder="Write your review..."
                          ></textarea>
                          <div class="text-sm text-gray-500 mt-1 text-right">Max 500 characters</div>
                      </div>
          
                      <!-- Submit Button -->
                      <button
                          type="submit"
                          class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all"
                      >
                          Submit Review
                      </button>
                  </form>
              @else
                  <div class="w-full p-4 bg-gray-100 text-center rounded-lg text-gray-600 text-lg font-semibold">
                      Tour Deleted
                  </div>
              @endif
          </div>
          
          
          <!-- SweetAlert Script for Notifications -->
          @if(session('success'))
              <script>
                  document.addEventListener('DOMContentLoaded', function() {
                      Swal.fire({
                          icon: 'success',
                          title: 'Success!',
                          text: '{{ session('success') }}',
                          confirmButtonText: 'OK'
                      });
                  });
              </script>
          @endif
          
          @if(session('error'))
              <script>
                  document.addEventListener('DOMContentLoaded', function() {
                      Swal.fire({
                          icon: 'error',
                          title: 'Error!',
                          text: '{{ session('error') }}',
                          confirmButtonText: 'OK'
                      });
                  });
              </script>
          @endif
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/dropdownmenu.js')}}"></script>
    <script src="{{asset('js/responsivenavbar.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          const stars = document.querySelectorAll("#rating-stars .star");
          const ratingInput = document.getElementById("rating");
  
          if (!ratingInput) {
              console.error("Hidden rating input not found!");
              return;
          }
  
          if (stars.length === 0) {
              console.error("No star elements found!");
              return;
          }
  
          stars.forEach((star) => {
              star.addEventListener("click", function () {
                  const selectedRating = this.getAttribute("data-value");
                  
                  if (!selectedRating) {
                      console.error("Star does not have a data-value attribute.");
                      return;
                  }
  
                  // Update the hidden input value
                  ratingInput.value = selectedRating;
                  console.log("Selected rating:", selectedRating);
  
                  // Highlight the selected stars and reset the others
                  stars.forEach((s) => {
                      const starValue = parseInt(s.getAttribute("data-value"), 10);
                      if (starValue <= selectedRating) {
                          s.classList.add("text-yellow-400");
                          s.classList.remove("text-gray-400");
                      } else {
                          s.classList.add("text-gray-400");
                          s.classList.remove("text-yellow-400");
                      }
                  });
              });
          });
      });
  </script>
  <script>
    document.querySelectorAll('.star-rating input').forEach((input) => {
        input.addEventListener('change', (e) => {
            const selectedRating = e.target.value;
            console.log(`Selected rating: ${selectedRating}`);
        });
    });
  </script>
  
  
    
</body>
</html>