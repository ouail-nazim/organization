{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}


@extends('layouts.app')
@section('content')
<!-- component -->

<div class="min-w-screen min-h-screen bg-gray-500 flex items-center p-5 lg:p-20 overflow-hidden relative">
    <div class="flex-1 min-h-full min-w-full rounded-3xl bg-white shadow-xl p-4 lg:p-8 text-gray-800 relative md:flex items-center text-center md:text-left">
        <div class="w-full md:w-1/2">
            <div class="mb-10 md:mb-20 text-gray-600 font-light">
                <p class="text-gray-700 text-5xl py-2">404</p>
                <h1 class="font-black uppercase text-3xl lg:text-5xl text-yellow-500 mb-10">You seem to be lost!</h1>
                <p>The page you're looking for isn't available.</p>
                <p>Try searching again or use the Go Back button below.</p>
            </div>
            <div class="mb-20 md:mb-0">
                <button onclick="history.back()" class="text-lg font-light outline-none focus:outline-none transform transition-all hover:scale-110 text-yellow-500 hover:text-yellow-600"><i class="mdi mdi-arrow-left mr-2"></i>Go Back</button>
            </div>
        </div>
        <div class="w-full md:w-1/2 text-center">
            <img src="{{asset("images/404err.svg")}}" alt="">
        </div>
    </div>
    <div class="w-64 md:w-96 h-96 md:h-full bg-blue-200 bg-opacity-30 absolute -top-64 md:-top-96 right-20 md:right-32 rounded-full pointer-events-none -rotate-45 transform"></div>
    <div class="w-96 h-full bg-yellow-200 bg-opacity-20 absolute -bottom-96 right-64 rounded-full pointer-events-none -rotate-45 transform"></div>
</div>

@endsection