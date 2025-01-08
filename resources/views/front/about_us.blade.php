@extends('front.layouts.app')

@section('content')

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

<div class="w-full bg-[#15192d] mx-auto border-[1px] border-[#6666662d] shadow-md rounded-b-[20px] items-center flex justify-center h-[100px]">
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
</div>
<div class="w-[80%] lg:w-full lg:max-w-[1300px] flex flex-wrap lg:flex-nowrap items-center mx-auto py-[50px] px-4 lg:px-0">
  <!-- Left Content -->
  <div class="flex flex-col gap-[20px] lg:w-1/2">
    <!-- Section Title -->
    <h5 class="text-gray-500 text-[14px] md:text-[16px]">About Bali Satu</h5>
    <h1 class="text-[24px] md:text-[28px] lg:text-[32px] font-medium lg:w-[800px]">
      We are Bali Satu Holidays, a trusted travel partner with a passion for friendship and unforgettable journeys.
    </h1>
    <!-- Description Text -->
    <div class="flex flex-col gap-[20px] text-[14px] md:text-[16px] lg:w-[700px]">
      <p>
        Our company operates in the field of travel services. This company was founded in 2002. It was founded and managed
        by Mr. I Wayan Suana. This company is named Balisatu Holidays (Bahana Lintas Sahabat Utama) which means prioritizing
        friendship in running a business. Our company also has official licenses that have been approved by the government.
      </p>
      <p>
        Balisatu has been present as a travel agent in Bali since 2002, until now we still exist and that is proof of our
        professionalism in the field of tourism and special travel services.
      </p>
      <p>
        We collaborate with several international schools from Jakarta and surrounding areas, and now we have become regular
        clients who always use our company’s services on their tours. Not only that, our company is also often used by
        several government agencies or companies to carry out their travel activities.
      </p>
    </div>
    <!-- Contact Us Button -->
    <div>
      <a href="#contact" class="border-[1px] w-max p-[10px] bg-[#3dbeeb] text-white rounded-[20px]">
        Contact Us
      </a>
    </div>
  </div>

  <!-- Right Content (Image) -->
  <div class="flex lg:w-1/2 h-full w-full items-center justify-center mt-8 lg:mt-0">
    <img src="{{asset('assets/hero/logoini.png')}}" alt="Bali Satu Logo" class="w-[250px] md:w-[300px] lg:w-[400px] h-auto">
  </div>
</div>

  <section class="w-full bg-footer h-[450px] mx-auto gap-[20px] flex flex-col">
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
            <a href="{{ route('front.contact-us') }}" class="text-[20px] text-white">Contact Us</a>
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