<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("title")</title>
        @vite(["resources/css/app.css"])
    </head>
    <body>
        <section class="bg-base-200 h-screen">
            <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
                <div class="mx-auto max-w-screen-sm text-center">
                    <h1 class="text-base-content mb-4 text-7xl font-extrabold tracking-tight lg:text-9xl">
                        @yield("code")</h1>
                    <p class="text-base-content mb-4 text-3xl font-bold tracking-tight">
                        @yield("message")</p>
                    <a href="{{ route("index") }}" class="btn btn-soft inline-flex">На головну сторінку</a>
                </div>
            </div>
        </section>
    </body>
</html>
