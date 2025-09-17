@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">{{ $news_type->name }}</h2>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen px-2 sm:px-28 tkpsda-news-container">
  <div class="mt-16 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">

    <!-- Main content -->
    <div class="p-4 sm:p-0 mb-16 space-y-2 lg:flex-auto lg:mb-16">

      <?php
      foreach ($beritas as $berita) :
      ?>
        <div class="mx-auto items-start gap-x-8 gap-y-6 px-4 py-2 sm:py-4 lg:flex">
          <div class="gap-4 sm:gap-6 lg:gap-8">
            <a href="{{ route('berita.show', ['slug' => $berita->slug]) }}">
              <img src="{{ $berita->featured_image_path }}" alt="{{ $berita->featured_image_path }}" class="rounded-lg bg-gray-100 shadow-lg max-w-xs">
            </a>
          </div>
          <div class="mt-3 lg:mt-0">
            <a href="{{ route('berita.show', ['slug' => $berita->slug]) }}">
              <h2 class="text-lg font-bold tracking-tight text-gray-900 sm:text-xl">{{ $berita->title }}</h2>
            </a>
            <div class="mt-2 flex items-center gap-x-4">
              <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">
                <i class="fa-regular fa-calendar mr-2"></i> {{ Carbon\Carbon::parse($berita->published_at)->format('d-m-Y') }}
              </h4>
            </div>
            <a href="{{ route('berita.show', ['slug' => $berita->slug]) }}">
              <p class="mt-4 text-gray-500">
                {{ $berita->excerpt }} ...
              </p>
            </a>
          </div>
        </div>

      <?php
      endforeach;
      ?>

      <div class="text-center sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div class="mx-auto">
          <nav class="isolate inline-flex -space-x-px rounded-md shadow-lg" aria-label="Pagination">
            {{ $beritas->links() }}
          </nav>
        </div>
      </div>

    </div>

    <!-- Sidebar content -->
    <x-public.right-sidebar></x-public.right-sidebar>

  </div>
</div>
@endsection