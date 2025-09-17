@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">Tugas dan Fungsi TKPSDA</h2>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen tkpsda-news-container">
  <div class="mx-auto mt-16 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">

    <!-- Main content -->
    <div class="p-4 sm:p-0 lg:flex-auto">

      <!-- Tugas Fungsi -->
      <div class="mx-auto px-4 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:gap-x-8 lg:px-8 lg:pb-24">
        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Tugas</h1>
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8 lg:pt-6">
          <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pembahasan rancangan pola dan rancangan rencana pengelolaan sumber daya air pada Wilayah Sungai Bali-Penida guna perumusan bahan pertimbangan untuk penetapan pola dan rencana pengelolaan sumber daya air</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pembahasan rancangan program dan rancangan rencana kegiatan pengelolaan sumber daya air pada Wilayah Sungai Bali-Penida guna perumusan bahan pertimbangan untuk penetapan program dan rencana kegiatan sumber daya air</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pembahasan usulan rencana alokasi air dari setiap sumber air pada Wilayah Sungai Bali-Penida guna perumusan bahan pertimbangan untuk penetapan rencana alokasi air</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pembahasan rencana pengelolaan sistem informasi hidrologi, hidrometeorologi, dan hidrogeologi pada Wilayah Sungai Bali-Penida untuk mencapai keterpaduan pengelolaan sistem informasi</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">pembahasan rancangan pendayagunaan kelembagaan pengelolaan sumber daya air pada Wilayah Sungai Bali- Penida</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pemberian pertimbangan kepada Menteri mengenai pelaksanaan pengelolaan sumber daya air pada Wilayah Sungai Bali-Penida</span></li>
          </ul>
        </div>

        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Fungsi</h1>
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8 lg:pt-6">
          <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Konsultasi dengan pihak terkait yang diperlukan guna keterpaduan dalam pengelolaan sumber daya air pada Wilayah Sungai Bali-Penida serta tercapainya kesepahaman antarsektor, antarwilayah, dan antarpemilik kepentingan</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pengintegrasian dan penyelarasankepentingan antarsektor, antarwilayah, serta antarpemilik kepentingan dalam pengelolaan sumber daya air pada Wilayah Sungai Bali-Penida</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Kegiatan pemantauan dan evaluasi pelaksanaan program dan rencana kegiatan pengelolaan sumber daya air pada Wilayah Sungai Bali-Penida</span></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Sidebar content -->
    <x-public.right-sidebar></x-public.right-sidebar>

  </div>
</div>
@endsection