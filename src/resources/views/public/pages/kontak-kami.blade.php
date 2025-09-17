@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">Kontak BWS Bali-Penida</h2>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen tkpsda-news-container">
  <div class="mx-auto mt-10 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
    <!-- Main content -->
    <div class="p-4 sm:p-0 lg:flex-auto">
      <div class="mx-auto px-4 pb-16 pt-4 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-4">

        <div class="lg:col-span-2 lg:pr-8 mb-4">
          <h4 class="text-xl font-bold tracking-tight text-gray-900 sm:text-xl">
          Jika anda melihat dan atau mendengar dugaan Penyuapan/Korupsi/Gratifikasi di Lingkungan BWS Bali-Penida, and apat melaporkan melalui: <a href="https://wispu.pu.go.id" class="text-blue-800 underline">wispu.pu.go.id</a>
          </h4>
        </div>

        <div class="lg:col-span-2 lg:pr-8">
          <h4 class="text-xl font-bold tracking-tight text-gray-900 sm:text-xl">
            Jika ada pertanyaan seputar pelayanan kami, layangkan pertanyaan anda pada kontak berikut ini.
          </h4>
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:pr-8 lg:pt-6">
          <div class="space-y-6">
            <p class="text-base text-gray-900">
              Balai Wilayah Sungai Bali-Penida <br>
              Jl. Kapten Tjok Agung Tresna No. Denpasar, Bali 80235 <br>
              (0361) 234953, 226769
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