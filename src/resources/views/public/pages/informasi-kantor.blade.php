@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">Informasi Lokasi Kantor</h2>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen tkpsda-news-container">
  <div class="mx-auto mt-16 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">

    <!-- Main content -->
    <div class="p-4 sm:p-0 lg:flex-auto">
      <div class="mx-auto px-4 pb-16 pt-2 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:gap-x-8 lg:px-8 lg:pb-24">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7888.5086330853555!2d115.229796!3d-8.667347!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2408daa3c6c29%3A0xda41c15e056f1403!2sBalai%20Wilayah%20Sungai%20Bali-Penida!5e0!3m2!1sid!2sid!4v1688417793656!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>

    <!-- Sidebar content -->
    <x-public.right-sidebar></x-public.right-sidebar>

  </div>
</div>
@endsection