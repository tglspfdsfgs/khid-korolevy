<!DOCTYPE html>
<html lang="uk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? "Хід королеви - головна" }}</title>
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body>
        {{-- TODO: bind links to contoller actions --}}
        <x-header></x-header>
        <x-main-index></x-main-index>
        <x-footer></x-footer>
        @vite("resources/js/app.js")
    </body>
</html>
