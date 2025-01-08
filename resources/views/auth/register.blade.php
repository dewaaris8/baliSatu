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
  <div class="w-[100%] flex items-start justify-center h-[100vh]">
    <div class="w-[50%] hidden lg:block p-[20px] h-[100vh] left-0 fixed">
      <div class="w-full h-full relative rounded-[20px]">
        <div class="absolute w-[100%] h-[100%] flex items-end 
         justify-center p-[20px]">
        <div class="text-[20px] text-[#fff]">“Our company operates in the field of travel services. This company was founded in 2002. It was founded and managed by Mr. I Wayan Suana. This company is named Balisatu Holidays (Bahana Lintas Sahabat Utama) which means prioritizing friendship in running a business”</div>
        </div>
        <img src="{{asset('assets/login/login-bg.png')}}" class="w-[100%] h-[100%] object-cover rounded-[20px]" alt="background">
      </div>
    </div>
    <div class="lg:w-[50%] w-full absolute right-0  flex flex-col items-center justify-center h-max bg-white">
      <div class="w-[80%] h-full py-16 flex flex-col gap-[50px] justify-center">
        <div class="">
          <h1 class="text-[34px] font-medium">Welcome!</h1>
          <p class="text-[20px]">Already have an account? <a class="font-semibold underline" href="{{route('login')}}">Login here to start your holiday</a></p>
        </div>
        <div class="">
          <form method="POST" action="{{ route('register') }}" class="flex flex-col w-full bg-white  gap-8 rounded-[22px] items-center">
            @csrf
            <div class="flex flex-col gap-[15px] w-full ">
              <div class="flex flex-col gap-1 w-full">
                <p class="font-semibold">Name</p>
                <div class="flex items-center gap-3 p-[20px_20px] rounded-[100px] border border-[#BFBFBF] focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/user.svg" alt="icon">
                  </div>
                  <input type="text" class="appearance-none outline-none w-full text-sm rounded-[100px] placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Enter Your name" name="name">
                </div>
                @error('name')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
              <div class="flex flex-col gap-1 w-full">
                <p class="font-semibold">Email</p>
                <div class="flex items-center gap-3 p-[20px_20px] rounded-[100px] border border-[#BFBFBF] focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/sms.svg" alt="icon">
                  </div>
                  <input type="email" name="email" class="appearance-none outline-none w-full text-sm rounded-[100px] placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Your email address">
                </div>
                @error('email')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
              <div class="flex flex-col gap-1 w-full">
                <p class="font-semibold">Phone Number</p>
                <div class="flex items-center gap-3 p-[20px_20px] rounded-[100px] border border-[#BFBFBF] focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/telephone.svg" alt="icon">
                  </div>
                  <input type="number" name="phone_number" class="appearance-none outline-none w-full text-sm rounded-[100px] placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Enter Your Phone Number" >
                </div>
                @error('phone_number')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
              </div>
              <div class="flex flex-col gap-1 w-full">
                <p class="font-semibold">Password</p>
                <div class="flex items-center gap-3 p-[20px_20px] rounded-[100px] border border-[#BFBFBF] focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/password-lock.svg" alt="icon">
                  </div>
                  <input type="password"
                  name="password" class="appearance-none rounded-[100px] outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Enter your valid password" >
                </div>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
              </div>
              <div class="flex flex-col gap-1 w-full">
                <p class="font-semibold">Password Confirmation</p>
                <div class="flex items-center gap-3 p-[20px_20px] rounded-[100px] border border-[#BFBFBF] focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/password-lock.svg" alt="icon">
                  </div>
                  <input type="password"
                  name="password_confirmation" class="appearance-none rounded-[100px] outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Enter your valid password" >
                </div>
              </div>
            </div>
            <button type="submit" class="bg-[#4D73FF] p-[16px_24px] w-full rounded-[100px] text-center text-white font-semibold hover:bg-[#06C755] transition-all duration-300">Sign In</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>
