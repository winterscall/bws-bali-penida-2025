@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">FAQ (Frequently Asked Questions)</h2>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen tkpsda-news-container">
  <div class="mx-auto mt-16 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">

    <!-- Main content -->
    <div class="p-4 sm:p-0 lg:flex-auto">
      <!-- FAQ -->
      <div class="mx-auto px-4 pb-16 pt-4 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:gap-x-8 lg:px-8 lg:pb-24">
        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Frequently Asked Questions</h1>
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8 lg:pt-6">
          <div class="space-y-6">
            <p class="text-sm text-gray-900">
              Berikut daftar pertanyaan yang paling sering diajukan kepada kami:
            </p>
          </div>
        </div>

        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-lg font-bold tracking-tight text-gray-900 sm:text-lg">Apakah Tugas dan Fungsi Direktorat Jenderal SDA?</h1>
        </div>

        <div class="py-2 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8">
          <div class="space-y-6">
            <p class="text-sm text-gray-900">
              Anda dapat membacanya di <a class="underline" href="http://sda.pu.go.id/pages/tugas_fungsi" target="_blank">sini</a>
            </p>
          </div>
        </div>

        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-lg font-bold tracking-tight text-gray-900 sm:text-lg">Apakah Rencana Strategis Direktorat Jenderal SDA tahun 2015-2019?</h1>
        </div>

        <div class="py-2 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8">
          <div class="space-y-6">
            <p class="text-sm text-gray-900">
              Anda dapat membacanya di <a class="underline" href="http://sda.pu.go.id/uploads/file/RENCANA_STRATEGIS_DITJEN_SDA_PUPR_2015-2019/" target="_blank">sini</a>
            </p>
          </div>
        </div>

        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-lg font-bold tracking-tight text-gray-900 sm:text-lg">Dimana saya dapat mengunduh peraturan perundang-undangan terkait SDA?</h1>
        </div>

        <div class="py-2 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8">
          <div class="space-y-6">
            <p class="text-sm text-gray-900">
              Anda dapat membacanya di <a class="underline" href="http://sda.pu.go.id/produk/newsmain_list.php?qs=peraturan" target="_blank">sini</a>
            </p>
          </div>
        </div>

        <div class="lg:col-span-2 lg:pr-8">
          <h1 class="text-lg font-bold tracking-tight text-gray-900 sm:text-lg">Dimana saya dapat mengunduh pola pengelolaan sumber daya air wilayah sungai SDA?</h1>
        </div>

        <div class="py-2 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8">
          <div class="space-y-6">
            <p class="text-sm text-gray-900">
              Anda dapat membacanya di <a class="underline" href="http://sda.pu.go.id/produk/newsmain_list.php?qs=Pola Wilayah Sungai" target="_blank">sini</a>
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