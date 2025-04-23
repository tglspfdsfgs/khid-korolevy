<!DOCTYPE html>
<html lang="uk">
    <head>
        <link rel="icon" type="image/x-icon" href="./favicon.ico">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Хід королеви - {{ $title }} </title>
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body>
        {{-- TODO: bind links to contoller actions --}}
        <x-layout.header />
        <x-pages.index />
        <x-layout.footer />
        @vite("resources/js/app.js")
    </body>
</html>
