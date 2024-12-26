<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('output.css')}}" rel="stylesheet">
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
    </style>
</head>
<body class="font-poppins text-black">
    {{-- <section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
        <nav class="mt-8 px-4 w-full flex items-center justify-between">
          <a href="{{route('dashboard.bookings')}}">
            <img src="{{asset('assets/icons/back.png')}}" alt="back">
          </a>
          <p class="text-center m-auto font-semibold">Trip Details</p>
          <div class="w-12"></div>
        </nav>
        <div class="flex flex-col gap-8">
          <div class="flex flex-col gap-3 px-4 ">
            <p class="font-semibold">Detail Trip</p>
            <div class="bg-white p-4 rounded-[26px] flex items-center gap-3">
              <div class="w-[72px] h-[72px] flex shrink-0 rounded-xl overflow-hidden">
                <img src="{{Storage::url($packageBooking->tour->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
              </div>
              <div class="flex flex-col gap-1">
                <p class="font-semibold text-sm tracking-035 leading-[22px]">{{$packageBooking->tour->name}}</p>
                <div class="flex gap-1 items-center">
                  <div class="w-4 h-4">
                    <img src="{{asset('assets/icons/calendar-grey.svg')}}" class="w-4 h-4" alt="icon">
                  </div>  
                  <span class="text-darkGrey text-sm tracking-035 leading-[22px]">{{$packageBooking->start_date->format('d, M, Y')}} - {{$packageBooking->end_date->format('d, M, Y')}}</span>
                </div>
                @if ($packageBooking->is_paid)
                    
                <div class="success-badge w-fit border border-[#60A5FA] p-[4px_8px] rounded-lg bg-[#EFF6FF] flex items-center justify-center">
                  <span class="text-xs leading-[22px] tracking-035 text-[#2563EB]">Success Paid</span>
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-3 px-4 ">
            <p class="font-semibold">Contact Details</p>
            <div class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-3">
              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                <p>Name</p>
                <p class="font-semibold">{{$packageBooking->customer->name}}</p>
              </div>
              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                <p>Email</p>
                <p class="font-semibold">{{$packageBooking->customer->email}}</p>
              </div>
              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                <p>Phone</p>
                <p class="font-semibold">{{$packageBooking->customer->phone_number}}</p>
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-3 px-4 ">
            <p class="font-semibold">Payment Summary</p>
            <div class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-3">
              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                <p>Sub Total</p>
                <p id="subtotal" class="font-semibold text-blue">Rp. {{number_format($packageBooking->sub_total, 0, '.' ,' ')}}</p>
              </div>
              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                <p>Insurance <span class="text-darkGrey">x<span id="total_quantity">{{$packageBooking->quantity}}</span></span></p>
                <p id="insurance" class="font-semibold text-blue">Rp. {{number_format($packageBooking->insurance, 0, '.' ,' ')}}</p>
              </div>
              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                <p>Tax 10%</p>
                <p id="tax" class="font-semibold text-blue">Rp. {{number_format($packageBooking->tax, 0, '.' ,' ')}}</p>
              </div>
              <hr>
              <div class="flex justify-between items-center text-sm tracking-035 leading-[22px] h-[55px]">
                <p>Total Payment</p>
                <p id="tax" class="font-semibold text-lg tracking-[0.6px]">Rp. {{number_format($packageBooking->total_amount, 0, '.' ,' ')}}</p>
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-3 px-4">
            <p class="font-semibold">Leave a Review</p>
            <form action="{{ route('package_tours.reviews.store', $packageBooking->tour->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="block text-sm">Rating (1-5):</label>
                    <select name="rating" id="rating" class="w-full p-2 border rounded">
                        <option value="1">1 - Poor</option>
                        <option value="2">2 - Fair</option>
                        <option value="3">3 - Good</option>
                        <option value="4">4 - Very Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="review" class="block text-sm">Review:</label>
                    <textarea name="review" id="review" rows="4" class="w-full p-2 border rounded" placeholder="Write your review..."></textarea>
                </div>
                <button type="submit" class="bg-blue text-white p-2 rounded">Submit Review</button>
            </form>
        </div>
        
          <div class="flex flex-col gap-3 px-4 ">
            <a href="home.html" class="p-[16px_24px] rounded-xl bg-blue w-full text-white text-center flex items-center justify-center gap-3  hover:bg-[#06C755] transition-all duration-300">
              <div class="w-6 h-6">
                <img src="{{asset('assets/icons/messages.svg')}}" alt="icon">
              </div>
              <span>Contact Travel Agent</span>
            </a>
          </div>
        </div>
        <div class="flex flex-col gap-3 px-4">
      </div>
    </section> --}}
    <section class="w-full h-[60vh] hero-img">
      <div class="w-full mx-auto border-b-[2px] border-l-[2px] border-r-[2px] border-white shadow-md rounded-b-[20px] items-center flex justify-center h-[100px]">
        <div class="w-[1300px]  h-full flex items-center justify-between">
            <!-- Logo Section -->
            <div class="w-[30%] flex  justify-start">
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
      <div class="h-max flex flex-col justify-center mt-[10vh]  max-w-[1300px] w-full mx-auto">
        <div class="">
          <h1 class="text-white w-[800px] text-[32px] font-semibold">Tour Booking Detail</h1>
          <p class="text-[18px] text-white">Happy Traveling</p>
        </div>
        <div class="w-full flex gap-5 mt-4 justify-between">
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
                  <p class="text-[16px] text-black">Rp. {{number_format($packageBooking->tour->price, 0, '.' ,' ')}}</p>
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
              <img src="{{Storage::url($packageBooking->tour->thumbnail)}}" class="w-full rounded-[20px] h-[200px] object-cover object-center" alt="thumbnail">
              <h1 class="text-[16px]">{{$packageBooking->tour->name}}</h1>
              <span class="text-darkGrey text-sm tracking-035 leading-[22px]">{{$packageBooking->start_date->format('d, M, Y')}} - {{$packageBooking->end_date->format('d, M, Y')}}</span>
              <p class="w-full text-[12px] text-justify text-black">
                {{$packageBooking->tour->about}}
              </p>
            </div>
            <div class="flex flex-col gap-3">
              <p class="font-medium text-[18px]">Leave a Review</p>
              <form action="{{ route('package_tours.reviews.store', $packageBooking->tour->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="block text-sm">Rating (1-5):</label>
                    <select name="rating" id="rating" class="w-full p-2 border rounded">
                        <option value="1">1 - Poor</option>
                        <option value="2">2 - Fair</option>
                        <option value="3">3 - Good</option>
                        <option value="4">4 - Very Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="review" class="block text-sm">Review:</label>
                    <textarea name="review" id="review" rows="4" class="w-full p-2 border rounded" placeholder="Write your review..."></textarea>
                </div>
                <button type="submit" class="bg-blue w-full text-white p-2 rounded">Submit Review</button>
            </form>
            </div>
            
          </div>
        </div>
      </div>
    </section>
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
  
  
    
</body>
</html>