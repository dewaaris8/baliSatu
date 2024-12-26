<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('output.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  @vite('resources/css/app.css')
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
    <div class="w-full bg-[#15192d] mx-auto border-[1px] border-[#6666662d] shadow-md rounded-b-[20px] items-center flex justify-center h-[100px]">
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
    <section class="w-full max-w-[1300px] mx-auto mt-[100px] gap-[20px] flex flex-col">
      <div class="w-full flex items-center justify-between">
        <div class="">
            <h1 class="text-[36px] font-medium">All Your Tour Package</h1>
          <P class="text-gray-500 text-[12px]">Check Your Schedule Here</P>
        </div>
        <div class="">
            <h1 class="text-[20px] font-medium">Hi, Welcome </h1>
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
                <div class="w-full bg-[#F9FAFC] text-[12px] py-[10px] px-[20px] rounded-t-[10px]">
                    {{ auth()->user()->name }}
                </div>
                <div class="w-full flex justify-between bg-[#15192d] text-white py-[20px] px-[20px] rounded-b-[10px]">
                    <div class="">
                        {{ $loop->iteration + ($paginatedBookings->currentPage() - 1) * $paginatedBookings->perPage() }}. {{ auth()->user()->name }}
                    </div> 
                    <div class="text-left w-max">
                        {{ $booking->tour->name }}
                    </div>  
                    <div class="">
                        <p>{{ $booking->tour->days }} days | {{ $booking->quantity }} packs</p>
                    </div>  
                    <div class="">
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
    <div class="mt-4 flex justify-center">
        {{ $paginatedBookings->links() }} <!-- Laravel's built-in pagination links -->
    </div>
</div>

    </section>
</body>
</html>