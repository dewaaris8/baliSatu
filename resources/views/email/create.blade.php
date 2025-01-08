<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <h1>Contact Us</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('email.send') }}" method="POST">
        @csrf
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
            @error('first_name') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
            @error('first_name') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            @error('last_name') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required>{{ old('message') }}</textarea>
            @error('message') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
