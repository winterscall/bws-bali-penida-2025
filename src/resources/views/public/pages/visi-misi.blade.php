@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">Visi dan Misi</h2>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen tkpsda-news-container">
  <div class="mx-auto mt-16 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">

    <!-- Main content -->
    <div class="p-4 sm:p-0 lg:flex-auto">

      <!-- Visi Misi -->
      <div class="mx-auto px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Visi</h1>
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8 lg:pt-6">
          <div class="space-y-6">
            <p class="text-base text-gray-900">
              "Terwujudnya kemanfaatan sumber daya air yang berkelanjutan untuk sebesar-besar kesejahteraan rakyat"
            </p>
          </div>
        </div>

        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Misi</h1>
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8 lg:pt-6">
          <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
            <li class="text-gray-400"><span class="text-gray-600">Mengkonservasi SDA secara berkelanjutan;</span></li>
            <li class="text-gray-400"><span class="text-gray-600">Mendayagunakan SDA secara adil serta memenuhi persyaratan kualitas dan kuantitas untuk berbagai kebutuhan masyarakat;</span></li>
            <li class="text-gray-400"><span class="text-gray-600">Mengendalikan daya rusak air;</span></li>
            <li class="text-gray-400"><span class="text-gray-600">Memberdayakan dan meningkatkan peran masyarakat dan Pemerintah dalam pengelolaan SDA;</span></li>
            <li class="text-gray-400"><span class="text-gray-600">Meningkatkan keterbukaan serta ketersediaan data dan informasi dalam pengelolaan SDA;</span></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Sidebar content -->
    <x-public.right-sidebar></x-public.right-sidebar>

  </div>
</div>
@endsection