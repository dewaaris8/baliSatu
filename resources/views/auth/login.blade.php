<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  @vite('resources/css/app.css')
</head>
<body class="font-poppins text-black">
  <div class="w-[100%] flex items-center justify-center h-[100vh]">
    <div class="w-[50%] p-[20px] h-full">
      <div class="w-full h-full relative rounded-[20px]">
        <div class="absolute w-[100%] h-[100%] flex items-end 
         justify-center p-[20px]">
        <div class="text-[20px] text-[#fff]">“Our company operates in the field of travel services. This company was founded in 2002. It was founded and managed by Mr. I Wayan Suana. This company is named Balisatu Holidays (Bahana Lintas Sahabat Utama) which means prioritizing friendship in running a business”</div>
        </div>
        <img src="{{asset('assets/login/login-bg.png')}}" class="w-[100%] h-[100%] object-cover rounded-[20px]" alt="background">
      </div>
    </div>
    <div class="w-[50%] flex flex-col items-center justify-center h-full bg-white">
      <div class="w-[80%] h-full flex flex-col gap-[50px] justify-center">
        <div class="">
          <a class="text-[18px]" href="">Back to Website</a>
        </div>
        <div class="">
          <h1 class="text-[34px] font-medium">Welcome!</h1>
          <p class="text-[20px]"><a class="font-semibold underline" href="{{route('register')}}">Create a free account </a>or login to start your holiday</p>
        </div>
        <div class="">
          <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full bg-white  gap-8 rounded-[22px] items-center">
            @csrf
            <div class="flex flex-col gap-[15px] w-full ">
              <div class="flex flex-col gap-1 w-full">
                <p class="font-semibold">Email</p>
                <div class="flex items-center gap-3 p-[20px_20px] rounded-[100px] border border-[#BFBFBF] focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/sms.svg" alt="icon">
                  </div>
                  <input type="email" class="appearance-none outline-none w-full text-sm rounded-[100px] placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Your email address" name="email">
                </div>
              </div>
              <div class="flex flex-col gap-1 w-full">
                <p class="font-semibold">Password</p>
                <div class="flex items-center gap-3 p-[20px_20px] rounded-[100px] border border-[#BFBFBF] focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/password-lock.svg" alt="icon">
                  </div>
                  <input type="password" class="appearance-none rounded-[100px] outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Enter your valid password" name="password">
                </div>
                <p class="w-full text-right mt-5 text-sm tracking-035 text-darkGrey"><a href="{{ route('register') }}" class="underline text-black font-semibold tracking-[0.6px]">Forget password?</a></p>
              </div>
            </div>
            <button type="submit" class="bg-[#4D73FF] p-[16px_24px] w-full rounded-[100px] text-center text-white font-semibold hover:bg-[#06C755] transition-all duration-300">Sign In</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
    {{-- <section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen">
        <div class="w-full min-h-screen flex flex-col items-center justify-center py-[46px] px-4 gap-8">
          <div class="w-[calc(100%-26px)] rounded-[20px] overflow-hidden relative">
            <img src="assets/backgrounds/Asset.png" class="w-full h-full object-contain" alt="background">
          </div>
          <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full bg-white p-[24px_16px] gap-8 rounded-[22px] items-center">
            @csrf
            <div class="flex flex-col gap-1 text-center">
              <h1 class="font-semibold text-2xl leading-[42px] ">Sign In</h1>
              <p class="text-sm leading-[25px] tracking-[0.6px] text-darkGrey">Welcome Back! Enter your valid data</p>
            </div>
            <div class="flex flex-col gap-[15px] w-full max-w-[311px]">
              <div class="flex flex-col gap-1 w-full">
                <p class="font-semibold">Email</p>
                <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/sms.svg" alt="icon">
                  </div>
                  <input type="email" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Your email address" name="email">
                </div>
              </div>
              <div class="flex flex-col gap-1 w-full">
                <p class="font-semibold">Password</p>
                <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/password-lock.svg" alt="icon">
                  </div>
                  <input type="password" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Enter your valid password" name="password">
                </div>
              </div>
            </div>
            <button type="submit" class="bg-[#4D73FF] p-[16px_24px] w-full max-w-[311px] rounded-[10px] text-center text-white font-semibold hover:bg-[#06C755] transition-all duration-300">Sign In</button>
            <p class="text-center text-sm tracking-035 text-darkGrey">Don’t have account? <a href="{{ route('register') }}" class="text-[#4D73FF] font-semibold tracking-[0.6px]">Sign Up</a></p>
          </form>
        </div>
    </section> --}}
</body>
</html>
