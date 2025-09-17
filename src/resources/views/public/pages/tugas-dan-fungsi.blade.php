@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">Tugas dan Fungsi</h2>
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
          <div class="space-y-6">
            <p class="text-base text-gray-900 text-justify">
              Balai Wilayah Sungai mempunyai tugas melaksanakan pengelolaan sumber daya air di wilayah sungai yang meliputi penyusunan program, pelaksanaan konstruksi, operasi dan pemeliharaan dalam rangka konservasi dan pendayagunaan sumber daya air dan pengendalian daya rusak air pada sungai, pantai, bendungan, danau, situ, embung, dan tampungan air lainnya, irigasi, rawa, tambak, air tanah, dan air baku serta pengelolaan drainase utama perkotaan
            </p>
          </div>
        </div>

        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Fungsi</h1>
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8 lg:pt-6">
          <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Penyusunan pola pengelolaan sumber daya air dan rencana pengelolaan sumber daya air pada wilayah sungai.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Penyusunan program pengelolaan sumber daya air dan rencana kegiatan pengelolaan sumber daya air pada wilayah sungai.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pemantauan dan evaluasi penyelenggaraan atau penerapan pola pengelolaan sumber daya air dan rencana pengelolaan sumber daya air.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Penyusunan studi kelayakan dan perencanaan teknis, desain, dan pengembangan sumber daya air.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pelaksanaan pengadaan barang dan jasa sesuai dengan ketentuan peraturan perundang-undangan.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pelaksanaan penerapan sistem manajemen keselamatan dan kesehatan kerja.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pengelolaan sumber daya air yang meliputi konservasi sumber daya air, pendayagunaan sumber daya air, dan pengendalian daya rusak air pada wilayah sungai.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pengelolaan drainase utama perkotaan.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pengelolaan sistem hidrologi.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pengelolaan sistem informasi sumber daya air.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pelaksanaan operasi dan pemeliharaan sumber daya air pada wilayah sungai.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pelaksanaan pemberian bimbingan teknis pengelolaan sumber daya air yang menjadi kewenangan provinsi dan kabupaten/kota.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Penyusunan dan penyiapan rekomendasi teknis dalam pemberian izin penggunaan sumber daya air pada wilayah sungai.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Penyusunan saran teknis untuk pengalihan alur sungai dan pemanfaatan bekas sungai.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Penyusunan dan pelaksanaan kajian penetapan garis sempandan sungai, garis sempadan danau, garis sempadan situ, dan garis sempadan jaringan irigasi.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pemberdayaan masyarakat dalam pengelolaan sumber daya air.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Fasilitasi kegiatan tim koordinasi pengelolaan sumber daya air pada wilayah sungai.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pelaksanaan penyusunan laporan akuntansi keuangan dan akuntansi barang milik negara selaku unit akuntansi wilayah.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pelaksanaan pemungutan, penerimaan, dan penggunaan biaya jasa pengelolaan sumber daya air sesuai dengan ketentuan peraturan perundang-undangan.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pelaksanaan urusan tata usaha dan rumah tangga Balai serta komunikasi publik.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Penyusunan perjanjian kinerja dan laporan kinerja Balai.</span></li>
            <li class="text-gray-400"><span class="text-gray-600 text-justify">Pelaksanaan pemantauan dan pengawasan penggunaan sumber daya air dan penyidikan tindak pidana bidang sumber daya air.</span></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Sidebar content -->
    <x-public.right-sidebar></x-public.right-sidebar>

  </div>
</div>
@endsection