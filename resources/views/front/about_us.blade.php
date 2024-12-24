@extends('front.layouts.app')

@section('content')

<div class=" w-full mx-auto border-[1px] border-[#6666662d] shadow-md rounded-b-[20px] items-center flex justify-center h-[120px]">
    <div class="w-[100%] mx-auto max-w-[1300px] min-w-[700px] h-full flex items-center justify-between">
      <div class="w-[30%] flex justify-start">Bali Satu Holidays</div>
      <div class="w-[30%] flex justify-center gap-[30px]">
        <a href="">Home</a>
        <a href="">About Us</a>
        <a href="">Contact Us</a>
      </div>
      <div class="w-[30%] gap-[10px] justify-end flex">
        <div class="px-[20px] py-[10px] flex items-center rounded-[20px] border-[1px] border-[#6666662d]">Login</div>
        <div class="px-[20px] py-[10px] flex items-center rounded-[20px] border-[1px] border-[#6666662d]">Register</div>
      </div>
    </div>
  </div>

  <div class="w-[1300px] flex mx-auto py-[50px] ">
    <div class="flex flex-col gap-[20px]">
        <h5 class="">About Bali Satu</h5>
        <h1 class="text-[32px] font-medium w-[800px]">We are Bali Satu Holidays, a trusted travel partner with a passion for friendship and unforgettable journeys.</h1>
        <div class="flex flex-col gap-[20px] text-[16px] w-[700px]">
            <p>Our company operates in the field of travel services. This company was founded in 2002. It was founded and managed by Mr. I Wayan Suana. This company is named Balisatu Holidays (Bahana Lintas Sahabat Utama) which means prioritizing friendship in running a business. Our company also has official licenses that have been approved by the government.</p>
            <p>Balisatu has been present as a travel agent in Bali since 2002, until now we still exist and that is proof of our professionalism in the field of tourism and special travel services</p>
            <p>We collaborate with several international schools from Jakarta and surrounding areas, and now we have become regular clients who always use our company’s services on their tours. Not only that, our company is also often used by several government agencies or companies to carry out their travel activities.</p>
        </div>
    </div>
  </div>
    
@endsection

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{asset('js/flickity-slider.js')}}"></script>
    <script src="{{asset('js/two-lines-text.js')}}"></script>
</body>
</html>