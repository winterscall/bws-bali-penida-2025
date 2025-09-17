@extends('public.layouts.layout')

@section('content')
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">Video Kegiatan</h2>
      <p class="text-gray-200 text-2xl relative z-20 mt-2">Kumpulan video kegiatan BWS Bali-Penida</p>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto py-16 sm:py-24 lg:max-w-none lg:py-32">
      <div class="space-y-12 gap-4 grid grid-cols-1 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">

        @foreach ($videos as $vid)
          <div class="group relative rounded-lg shadow-lg">
            <div class="relative h-80 w-full overflow-hidden rounded-t-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
              <a href="{{ $vid->path_media }}">
                <img src="{{ $vid->thumb_url }}" alt="Thumb {{ $vid->nama_media }}" class="h-full w-full object-cover object-center">
              </a>
            </div>
            <h3 class="pt-5 px-5 text-sm text-gray-500">
              <a href="{{ $vid->path_media }}">
                <span class="absolute inset-0"></span><i class="fa-regular fa-calendar mr-2"></i>
                {{ $vid->album->published_at }}
              </a>
            </h3>
            <a href="{{ $vid->path_media }}">
              <p class="pb-5 px-5 mt-1 text-base font-semibold text-gray-900">{{ $vid->name }}</p>
            </a>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection