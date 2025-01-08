<div>
    @if (session()->has('success'))
        <div class="w-full bg-green-500 text-white rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
    <div class="w-full bg-red-500 text-white rounded-lg">
        {{ session('error') }}
    </div>
    @endif
    <form wire:submit.prevent="submit" method="POST">
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" wire:model="name">
            @error('name')
                {{$message}}
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" wire:model="email">
            @error('email')
                {{$message}}
            @enderror
        </div>

        <div>
            <label for="message">Message</label>
            <textarea id="message" wire:model="message"></textarea>
            @error('message')
                {{$message}}
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>
</div>
