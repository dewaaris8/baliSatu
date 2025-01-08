
    document.getElementById('dropdownButton').addEventListener('click', function () {
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden');
    });

    // Optional: Close the dropdown when clicking outside
    document.addEventListener('click', function (event) {
        const button = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        if (!button.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });