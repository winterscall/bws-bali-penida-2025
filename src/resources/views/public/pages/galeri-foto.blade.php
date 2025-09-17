@extends('public.layouts.layout')

@section('content')
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">Album Kegiatan</h2>
      <p class="text-gray-200 text-2xl relative z-20 mt-2">Album kumpulan foto kegiatan BWS Bali-Penida</p>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto py-16 sm:py-24 lg:max-w-none lg:py-32">
      <div class="space-y-12 gap-8 grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
        @foreach($albums as $al)
          @php
            $headmedia = $al->media->first();
          @endphp

          <div class="group relative">
            <!-- post -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 rounded-lg shadow-lg">

              <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                @if ($headmedia)
                  <img class="h-full w-full object-cover object-center" src="{{ $headmedia->thumb_url }}" id="imgalbum" alt="{{ $al->name }}">
                @else
                  <img class="h-full w-full object-cover object-center" src="https://placehold.co/600x400?text=No Image" class="imgalbum" alt="Media Image">
                @endif
              </div>

              <div class="gellary-informations p-5">
                <ul>
                  <li>
                    <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"> </i> {{ $al->published_at }}</span>
                    <a href="#"><i class="fa fa-file-image-o" aria-hidden="true"></i> {{ count($al->media) }}</a>
                    <br>
                    <span>
                      <a class="mt-1" style="font-size: 16px; font-weight: bold; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" href="{{ route('galeri.foto_detail', $al->id) }}">
                        {{ $al->name }}
                      </a>
                    </span>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /post -->
          </div>
        @endforeach
      </div>

      <div class="flex flex-col p-2 mt-8">
        {{ $albums->links() }}
      </div>
    </div>
  </div>
</div>
@endsection