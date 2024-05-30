<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen w-full bg-gray-100 dark:bg-slate-200">
            <div class="mx-auto max-w-md pt-7 relative h-screen">
                <img class="object-cover rounded-full h-24 w-24 mx-auto"
                    src="https://avatars.githubusercontent.com/u/67477516?v=4" alt="Kenn Kibadi Picture" />
                <div class="px-6 py-4 text-white">
                    <div class="flex flex-col">
                        <div class="font-bold text-xl text-center text-slate-800 hover:cursor-pointer">
                            {{ '@' . $links->name }}</div>
                        <p class="text-sm text-center text-slate-800">{{ $links->bio }}</p>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div x-data class="flex flex-col mx-auto text-mirage-500">
                    @foreach ($links->links as $item)
                        <a href="{{ $item->link }}" @click="handleClick" target="__blank"
                            data-link-id="{{ $item->id }}"
                            class="w-80 sm:w-96 mx-auto bg-sky-300 text-center text-xl font-bold py-3 border-2 border-black shadow-style1 hover:shadow-none transition-all hover:translate-x-1 hover:translate-y-1">{{ $item->name }}
                            </h4>
                        </a>
                    @endforeach

                </div>
                <!-- Footer -->
                <div class="text-slate-800 text-xs text-center bottom-6 absolute w-full">Built by <a href="#"
                        target="__blank" class="border-b-yellow-500 border-b-2">Bio Link</a></div>
            </div>
        </div>
        <script>
            function handleClick(e) {
                let csrf = document.querySelector('meta[name="csrf-token"]').content;
                let link = e.target.href
                let id = e.target.dataset.linkId
                fetch(`http://127.0.0.1:8000/visit/${id}`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            'Accept': "application/json",
                            'X-CSRF-TOKEN': csrf
                        },
                        data: JSON.stringify({
                            id: 1
                        })
                    })
                    .then(() => {
                        console.log("Form successfully submitted.");
                    })
                    .catch(() => {
                        console.log("Something went wrong.");
                    });
            }
        </script>
    </body>

</html>
