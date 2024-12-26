<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    @vite('resources/css/app.css') <!-- Ensure Tailwind CSS is loaded -->
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Let’s Get In Touch.</h2>
        <p class="text-gray-600 mb-6">Reach out to us anytime at <strong>hello@gmail.com</strong>.</p>
        
        <!-- Display Success Message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Contact Form -->
        <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-600">First Name</label>
                    <input type="text" name="first_name" placeholder="Enter Your First Name" 
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-600">Last Name</label>
                    <input type="text" name="last_name" placeholder="Enter Your Last Name" 
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Email Address</label>
                <input type="email" name="email" placeholder="Enter Your Email Address" 
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Phone Number</label>
                <input type="text" name="phone" placeholder="Enter Your Phone Number" 
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Message</label>
                <textarea name="message" placeholder="Enter Your Message Here" rows="4"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            <button type="submit" 
                class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600">
                Submit Form
            </button>
        </form>
    </div>
</body>
</html>
