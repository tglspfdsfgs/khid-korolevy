<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? "INDEX PAGE" }}</title>
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body>
        <x-header></x-header>
        <main class="main">
            <div>#Main</div>
        </main>
        <footer class="footer">
            #Footer
        </footer>
        @vite("resources/js/app.js")
    </body>
</html>
