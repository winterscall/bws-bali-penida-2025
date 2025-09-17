@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">Wilayah Administrasi</h2>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen tkpsda-news-container">
  <div class="mx-auto mt-16 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">

    <!-- Main content -->
    <!-- Struktur Organisasi -->
    <div class="mx-auto mt-6 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:px-8">
      <div class="aspect-h-4 aspect-w-3 overflow-hidden rounded-lg lg:block">
        <img src="{{ asset('assets-tw/img/wilayah.png') }}" alt="BWS Banner Image" class="h-full w-full object-cover object-center">
      </div>
      <div class="mx-auto px-4 pb-16 pt-2 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:gap-x-8 lg:px-8 lg:pb-24">
        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8">
          <div class="space-y-6">
            <p class="text-base text-gray-900">
              Berdasarkan Permen PUPR nomor 4/prt/m/2015 Tentang Kriteria dan Penetapan Wilayah Sungai, Wilayah Sungai Bali-Penida merupakan Wilayah Sungai Strategis Nasional, terdiri dari 391 DAS.
            </p>
            <p class="text-base text-gray-900">
              Wilayah Administratif : Prov. Bali, terdiri dari 8 Kabupaten (Jembrana, Tabanan,Badung,Gianyar, Klungkung, Bangli, Karangasem. Buleleng) dan 1 Kota Denpasar.
            </p>

            <ul role="list" class="list-disc space-y-2 pl-4 text-base">
              <li class="text-gray-400"><span class="text-gray-900">Luas DAS : 5.636,66 km²</span></li>
              <li class="text-gray-400"><span class="text-gray-900">Panjang Sungai : 2.776,09 km</span></li>
              <li class="text-gray-400"><span class="text-gray-900">Tipe Sungai</span>
                <ul role="list" class="list-disc space-y-2 pl-4 text-base">
                  <li class="text-black"><span class="text-gray-900">Pharennial (Aliran menerus sepanjang tahun) : 162 Sungai</span></li>
                  <li class="text-black"><span class="text-gray-900">Intermitten (Aliran terjadi pada saat musim hujan) : 153 Sungai</span></li>
                  <li class="text-black"><span class="text-gray-900">Ephemeral (Aliran hanya saat hujan terjadi) : 76 Sungai</span></li>
                </ul>
              </li>
              <li class="text-gray-400"><span class="text-gray-900">Dalam Kab/Kota : 315 DAS</span></li>
              <li class="text-gray-400"><span class="text-gray-900">Lintas Kab/Kota : 76 DAS</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar content -->
    <x-public.right-sidebar></x-public.right-sidebar>

  </div>
</div>
@endsection