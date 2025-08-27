@extends("layouts.app")

@section("title", $title)

@php
    /** fallback vars */
    $isResponsive ??= true;
    $unresponsiveSize ??= " ";
@endphp

@section("header")
    <x-layout.header :is-responsive="$isResponsive" :unresponsive-size='$unresponsiveSize' />
@endsection

@section("page")
    <div class='{{ ($isResponsive ? " " : " $unresponsiveSize mx-auto") . " bg-bottom-right bg-size-[30%] bg-no-repeat " }}'
        style="background-image: url('{{ Vite::asset("resources/images/corner-image.png") }}')">
        <x-dynamic-component :component="$page" :data="$data ?? null" :paginator="$paginator ?? null" :is-responsive="$isResponsive" :unresponsive-size='$unresponsiveSize' />
    </div>
@endsection

@section("footer")
    <x-layout.footer :is-responsive="$isResponsive" :unresponsive-size='$unresponsiveSize' />
@endsection
