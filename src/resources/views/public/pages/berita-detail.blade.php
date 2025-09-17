@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">{{ $news->title }}</h2>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen px-2 sm:px-28 tkpsda-news-container">
  <div class="mt-16 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
    
    <!-- Main content -->
    <div class="p-4 sm:p-0 lg:flex-auto">

      <div class="mt-6 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:px-8">
        <div class="aspect-h-4 aspect-w-3 overflow-hidden rounded-lg lg:block tkpsda-shadow">
          <img src="{{ $news->featured_image_path }}" alt="{{ $news->title }}" class="h-full w-full object-cover object-center">
        </div>
        <small>Foto: <?= $news->featured_image_description ?></small>
      </div>

      <div class="px-4 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:gap-x-8 lg:px-8 lg:pb-24">
        <div class="lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8">
          <div class="space-y-6">
            <p class="text-base text-gray-900">
              <?= $news->content ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar content -->
    <x-public.right-sidebar></x-public.right-sidebar>

  </div>
</div>
@endsection