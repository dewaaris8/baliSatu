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
                <p class="font-semibold">Email</p>
                <div class="flex items-center gap-3 p-[20px_20px] rounded-[100px] border border-[#BFBFBF] focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="w-4 h-4 flex shrink-0">
                    <img src="assets/icons/sms.svg" alt="icon">
                  </div>
                  <input type="email" class="appearance-none outline-none w-full text-sm rounded-[100px] placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Your email address" name="email">
                </div>
              </div>
              <div class="mt-4">
                <x-input-label for="avatar" :value="__('avatar')" />
                <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" :value="old('avatar')" required autocomplete="avatar" />
                <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
            </div>
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
</body>
</html>


<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- phone number -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('phone_number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="number" name="phone_number" :value="old('phone_number')" required autocomplete="phone_number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- avatar -->
        <div class="mt-4">
            <x-input-label for="avatar" :value="__('avatar')" />
            <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" :value="old('avatar')" required autocomplete="avatar" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
