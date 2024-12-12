<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('output.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="font-poppins text-black">
    <section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
        <nav class="mt-8 px-4 w-full flex items-center justify-between">
          <a href="checkout.html">
            <img src="{{asset('assets//icons/back.png')}}" alt="back">
          </a>
          <p class="text-center m-auto font-semibold">Payment</p>
          <div class="w-12"></div>
        </nav>
        <button type="submit" id="pay-button" class="p-[16px_24px] rounded-xl bg-blue w-fit disabled:bg-[#BFBFBF] text-white hover:bg-[#06C755] transition-all duration-300" >Confirm</button>
    </section>

    <script src="{{asset('js/payment.js')}}"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $packageBooking->snap_token }}', {
          // Optional
          onSuccess: function(result){
            window.location.href = '{{route('front.checkout_success', $packageBooking->id)}}';
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
</body>
</html>