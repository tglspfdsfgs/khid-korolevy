@extends("layouts.app")

@section("title", $title)

@section("header")
    <x-layout.header :is-responsive="$isResponsive ?? false" />
@endsection

@section("page")
    <div class="bg-bottom-right bg-size-[30%] bg-no-repeat"
        style="background-image: url('{{ Vite::asset("resources/images/corner-image.png") }}')">
        @include($page)
    </div>
@endsection

@section("footer")
    <x-layout.footer />
@endsection
