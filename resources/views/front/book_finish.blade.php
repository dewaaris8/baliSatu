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
    <section id="content" class="w-full mx-auto bg-[#3dbeeb] min-h-screen">
        <div class="w-full min-h-screen flex flex-col items-center justify-center py-[46px] px-[28px] gap-8">
          <div class="flex flex-col gap-2 items-center text-center w-[319px] mx-auto">
            <img src="{{asset('assets/backgrounds/Success-Illustration.png')}}" class="w-full h-full" alt="background"> 
          </div>
          <div class="flex flex-col gap-2 items-center text-center w-[319px] mx-auto">
            <p class="font-semibold text-[24px] leading-[36px] text-white">Transaction Success</p>
            <p class="text-white">Ready to go! don't forget to check<br>your trip on Schedule Page</p>
          </div>
          <a href="{{route('dashboard.bookings')}}" class="p-[16px_24px] rounded-xl bg-white w-[400px] text-center font-semibold text-blue hover:bg-[#06C755] hover:text-white transition-all duration-300">Check Schedule Page</a>
        </div>
    </section>
</body>
</html>