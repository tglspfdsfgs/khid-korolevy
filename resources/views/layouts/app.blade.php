<!DOCTYPE html>
<html lang="uk">
    <head>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Хід королеви - @yield("title")</title>
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body>
        <x-layout.header />
        @yield("page")
        <x-layout.footer />
        @vite("resources/js/app.js")
    </body>
</html>
