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
    <section class="w-full h-max flex">
      <div class="w-[50%] lg:flex justify-center items-center hidden h-[100vh] lg:fixed bg-[#3dbeeb]">
        <img src="{{asset('assets//backgrounds/Success-Illustration.png')}}" class="w-[60%] h-[60%] object-contain" alt="background">
      </div>
      <div class="w-[100%] flex  h-[100vh]">
        <div class="w-full h-max fixed bottom-0 z-50 flex items-center justify-center">
          {{-- <div class="navigation-bar max-w-[640px] w-full h-[85px] bg-black rounded-t-[25px] flex items-center justify-between px-6 shadow-[-6px_-8px_20px_0_#00000008]">
            <div class="flex flex-col justify-center gap-1">
              <p class="text-white text-sm tracking-035 leading-[22px]">Total Payment</p>
              <p id="grandtotal" class="text-[#EED202] font-semibold text-lg leading-[26px] tracking-[0.6px]">Rp. {{number_format($packageBooking->total_amount, 0, '.' ,' ')}}</p>
            </div>
            <button type="submit" id="pay-button" class="p-[16px_24px] rounded-xl 
            bg-blue w-fit disabled:bg-[#BFBFBF] text-white hover:bg-[#06C755] transition-all duration-300" >Confirm</button>
          </div> --}}
        </div>
        <div class="w-[50%] hidden lg:flex h-full"></div>
        <div class="lg:w-[50%] w-full h-max">
          <section id="content" class="bg-white w-[80%] lg:w-[60%] mx-auto min-h-screen flex flex-col gap-8 pb-[120px]">
            <nav class="mt-8 px-4 w-full flex items-center justify-between">
              <a href="javascript:history.back()">
                <img src="{{ asset('assets/icons/back.png') }}" alt="Back">
            </a>
            
            
              {{-- <p class="text-center m-auto font-semibold">Payment</p> --}}
              <div class="w-12"></div>
            </nav>
            <div class="flex flex-col gap-8">
              <div class="flex flex-col gap-3 px-4 ">
                <h1 class="font-semibold text0p[] text-2xl">Final Step, make the payment</h1>
                <p class="text-darkGrey text-[14px]">To finalize your order, kindly complete your payment using the payment methods we provide. </p>
                <p class="font-semibold">Detail Trip</p>
                <div class="bg-white rounded-[26px] flex flex-col items-center gap-3">
                  <div class="w-[100%] h-[200px] flex shrink-0 rounded-xl overflow-hidden">
                    <img src="{{Storage::url($packageBooking->tour->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                  </div>
                  <div class="flex w-full flex-col gap-1">
                    <p class="font-semibold text-xl tracking-035 leading-[22px]">{{$packageBooking->tour->name}}</p>
                    <div class="flex gap-1 items-center">
                      <div class="w-4 h-4">
                        <img src="{{asset('assets//icons/calendar-grey.svg')}}" class="w-4 h-4" alt="icon">
                      </div>
                      <span class="text-darkGrey text-sm tracking-035 leading-[22px]">{{$packageBooking->start_date->format('M d Y')}} - {{$packageBooking->end_date->format('M d Y')}}</span>
                    </div>
                    <p class="font-semibold text-sm tracking-035 leading-[22px]">Quantity : {{$packageBooking->quantity}}</p>
                  </div>
                </div>
              </div>
              <div class="flex flex-col gap-3 px-4 ">
                <p class="font-semibold">Contact Details</p>
                <div class="bg-white p-[0px_0px] rounded-[26px] flex flex-col gap-4">
                  <div class="flex flex-col gap-1">
                    <p class="text-darkGrey text-sm tracking-035 leading-[22px]">User Name</p>
                    <div class="flex items-center gap-2">
                      {{-- <div class="w-[35px] h-[25px] flex shrink-0 overflow-hidden">
                        <img src="{{Storage::url($packageBooking->bank->logo)}}" class="w-full h-full object-contain object-center" alt="logo">
                      </div> --}}
                      <span class="text-sm tracking-035 leading-[22px]">{{$packageBooking->customer->name}}</span>
                    </div>
                  </div>
                  <div class="flex flex-col gap-1">
                    <p class="text-darkGrey text-sm tracking-035 leading-[22px]">User Email</p>
                    <div class="flex items-center gap-2">
                      {{-- <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                        <img src="{{asset('assets//icons/bank.svg')}}" class="w-full h-full object-contain object-center" alt="logo">
                      </div> --}}
                      <span class="text-sm tracking-035 leading-[22px]">{{$packageBooking->customer->email}}</span>
                    </div>
                  </div>
                  <div class="flex flex-col gap-1">
                    <p class="text-darkGrey text-sm tracking-035 leading-[22px]">User Number</p>
                    <div class="flex items-center gap-2">
                      {{-- <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                        <img src="{{asset('assets//icons/moneys.svg')}}" class="w-full h-full object-contain object-center" alt="logo">
                      </div> --}}
                      <span id="bank-number" class="text-sm tracking-035 leading-[22px]" data-value="7342333056">{{$packageBooking->customer->phone_number}}</span>
                    </div>
                  </div>
                  <hr>
                  <div class="flex flex-col gap-1">
                    <p class="text-darkGrey text-sm tracking-035 leading-[22px]">Total Payment</p>
                    <div class="flex items-center justify-between">
                      <span id="total-payment" class="font-semibold text-lg tracking-[0.6px] leading-[26px]" data-value="2500000">Rp. {{number_format($packageBooking->total_amount, 0, '.' ,' ')}}</span>
                    </div>
                  </div>
                  <div >
                      <button class="w-full bg-[#3dbeeb] flex items-center  justify-center p-[16px_24px] rounded-xl text-white" id="pay-button">Confirm</button>
                  </div>
                </div>
              </div>
              <div class="flex flex-col gap-3 px-4 ">
                {{-- <div class="w-full h-[88px] bg-blue overflow-hidden flex items-center shrink-0 mx-auto rounded-2xl relative">
                  <img src="{{asset('assets//backgrounds/reward-left.png')}}" class="object-contain h-full" alt="rewards">
                  <div class="flex flex-col -ml-[38px] relative z-10">
                    <p class="text-sm leading-[22px] tracking-035 text-white">Claim Your Reward</p>
                    <p class="text-xs leading-[22px] tracking-035 text-white">Checkout today and get reward!</p>
                  </div>
                  <img src="{{asset('assets//backgrounds/reward-right.png')}}" class="absolute w-[73px] h-[53px] top-0 right-0" alt="rewards">
                </div> --}}
              </div>
              
            </div>
        </section>
        </div>
      </div>
    </section>
    <script src="{{asset('js/payment.js')}}"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $packageBooking->snap_token }}', {
          onSuccess: function(result){
            window.location.href = '{{route('front.checkout_success', $packageBooking->id)}}';
          },
          onPending: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onError: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
</body>
</html>