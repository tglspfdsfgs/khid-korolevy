@extends("layouts.app")

@section("title", $title)

@section("page")
    <div class="bg-bottom-right bg-size-[30%] bg-no-repeat" style="background-image: url('/storage/corner-image.png')">
        @include($page)
    </div>
@endsection
