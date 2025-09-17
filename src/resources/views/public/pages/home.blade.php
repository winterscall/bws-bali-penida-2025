@extends('public.layouts.layout')

@section('content')
  <!-- Slider main container -->
  <!-- Swiper -->
  <div class="w-screen">
    <div class="swiper mySwiper mx-auto">
      <div class="swiper-wrapper">
        @foreach ($slider as $slide)
          <div class="swiper-slide swiper1-slide">
            <img src="{{ $slide->path_url }}" alt="{{ $slide->name }}">
            <div class="slide-title">{{ $slide->name }}</div>
          </div>
        @endforeach
      </div>
      <div class="swiper-button-next swiper-custom_style"></div>
      <div class="swiper-button-prev swiper-custom_style"></div>
      <div class="swiper-pagination swiper-custom_style"></div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="bg-white w-screen">
    <div class="mx-auto max-w-7xl">
      <div class="mx-auto lg:mx-0 lg:flex lg:max-w-none" style="margin-top: 80px;">

        <!-- Main content -->
        <div class="p-4 sm:p-0 lg:flex-auto">

          <!-- Articles | Berita Balai -->
          @if (count($balai) > 0)
            <p class="px-4 text-2xl tracking-tight leading-loose font-light">
              <span class="font-extrabold">Berita</span>Terkini
            </p>
          @endif
          <ul role="list" class="grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
            @foreach ($balai as $b)
              <li class="flex gap-x-3">
                <div class="mx-4 my-4 lg:my-8">
                  <div class="max-w-sm rounded rounded-ee-3xl overflow-hidden border-b-4 border-yellow-400">
                    <a href="{{ route('berita.show', ['slug' => $b->slug]) }}">
                      <img class="w-full" src="{{ $b->featured_image_path }}" alt="{{ $b->title }}">
                    </a>
                  </div>
                  <div class="max-w-sm p-2">
                    <article>
                      <a href="{{ route('berita.show', ['slug' => $b->slug]) }}">
                        <h2 class="font-sans font-bold text-xl">{{ $b->title }}</h2>
                      </a>
                      <div class="flex flex-row items-stretch mt-3">
                        <div class="flex flex-col basis-1/6 self-start items-center mr-2 mt-1">
                          <time
                            class="font-bold text-gray-400 text-3xl py-2 border-t border-x border-yellow-400 px-1">{{ $b->published_at->format('d') }}</time>
                          <div
                            class="flex items-center justify-center bg-yellow-400 w-full border-b border-x border-yellow-400 px-1">
                            <p class="text-white">{{ $b->published_at->format('M') }}</p>
                          </div>
                        </div>
                        <div class="basis-5/6">
                          <p class="line-clamp-5">
                            {{ $b->excerpt }}
                          </p>
                          <a href="{{ route('berita.show', ['slug' => $b->slug]) }}"
                            class="leading-relaxed underline decoration-2 decoration-sky-500 text-sky-500">
                            Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>

          <!-- Articles | Berita SDA -->
          @if (count($sda) > 0)
            <p class="px-4 text-2xl tracking-tight leading-loose font-light">
              <span class="font-extrabold">Berita</span>SDA
            </p>
          @endif
          <ul role="list" class="grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
            @foreach ($sda as $b)
              <li class="flex gap-x-3">
                <div class="mx-4 my-4 lg:my-8">
                  <div class="max-w-sm rounded rounded-ee-3xl overflow-hidden border-b-4 border-yellow-400">
                    <a href="{{ route('berita.show', ['slug' => $b->slug]) }}">
                      <img class="w-full" src="{{ $b->featured_image_path }}" alt="{{ $b->title }}">
                    </a>
                  </div>
                  <div class="max-w-sm p-2">
                    <article>
                      <a href="{{ route('berita.show', ['slug' => $b->slug]) }}">
                        <h2 class="font-sans font-bold text-xl">{{ $b->title }}</h2>
                      </a>
                      <div class="flex flex-row items-stretch mt-3">
                        <div class="flex flex-col basis-1/6 self-start items-center mr-2 mt-1">
                          <time
                            class="font-bold text-gray-400 text-3xl py-2 border-t border-x border-yellow-400 px-1">{{ $b->published_at->format('d') }}</time>
                          <div
                            class="flex items-center justify-center bg-yellow-400 w-full border-b border-x border-yellow-400 px-1">
                            <p class="text-white">{{ $b->published_at->format('M') }}</p>
                          </div>
                        </div>
                        <div class="basis-5/6">
                          <p class="line-clamp-5">
                            {{ $b->excerpt }}
                          </p>
                          <a href="{{ route('berita.show', ['slug' => $b->slug]) }}"
                            class="leading-relaxed underline decoration-2 decoration-sky-500 text-sky-500">
                            Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>

        <!-- Sidebar content -->
        <div class="mt-2 px-4 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0 lg:px-0">
          <div class="mx-auto max-w-7xl px-4 sm:px-6">

            <!-- Social Media -->
            <div class="mx-auto max-w-2xl py-2 sm:py-2 lg:max-w-none">
              <p class="text-2xl tracking-tight leading-loose font-light">
                <span class="font-extrabold">Media</span>Sosial
              </p>

              <div class="mt-6 space-y-12 lg:space-y-0">
                <div class="group relative">
                @foreach ($social as $slide)
                  {!! $slide->script !!}
                @endforeach
                </div>
              </div>
            </div>

            <!-- Media Digital -->
            <div class="mx-auto max-w-2xl py-2 sm:py-2 lg:max-w-none">
            @if (count($digital) > 0)
              <p class="text-2xl tracking-tight leading-loose font-light">
                <span class="font-extrabold">Media</span>Digital
              </p>
            @endif
              <div class="swiper mySwiper3 swiper-digital mt-6">
                <div class="swiper-wrapper">
                @foreach ($digital as $slide)
                  <div class="swiper-slide">
                    <a href="{{ $slide->attach_url }}" data-lightbox="media-digital"
                      data-title="{{ $slide->title }}" target="_blank">
                      <img src="{{ $slide->cover_url }}" alt="{{ $slide->title }}">
                    </a>
                  </div>
                @endforeach
                </div>
                <div class="swiper-button-next swiper-custom_style"></div>
                <div class="swiper-button-prev swiper-custom_style"></div>
                <div class="swiper-pagination swiper-custom_style"></div>
              </div>
            </div>

            <!-- Video -->
            <div class="mx-auto max-w-2xl mt-3 py-2 sm:py-2 lg:max-w-none">
              <?php
            if (count($video) > 0) :
            ?>
              <p class="text-2xl tracking-tight leading-loose font-light">
                <span class="font-extrabold">Video</span>
              </p>
              <?php
            endif;
            ?>

              <div class="swiper mySwiper2 swiper-video mt-6">
                <div class="swiper-wrapper">
                  <?php
                foreach ($video as $videox) :
                ?>
                  <div class="swiper-slide">
                    <iframe style="width: 100%; height: 320px;"
                      src="https://www.youtube.com/embed/<?= explode('v=', $videox->path_media)[1] ?>" frameborder="0"
                      allowfullscreen></iframe>
                  </div>
                  <?php
                endforeach;
                ?>
                </div>
                <div class="swiper-button-next swiper-custom_style"></div>
                <div class="swiper-button-prev swiper-custom_style"></div>
                <div class="swiper-pagination swiper-custom_style"></div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Banner Image -->
  <div class="w-screen mt-16">
    {{-- <section class="mx-auto relative isolate overflow-hidden bg-white">
    <?php if ($this->backdrop->where('active', 1)->first()) : ?>
      <img src="<?= base_url('homeassets/backdrop/' . $this->backdrop->where('active', 1)->first()->path) ?>" alt="Banner">
    <?php endif; ?>
  </section> --}}
  </div>
@endsection

@push('css')
  <style>
    .swiper-video {
      height: 320px !important;
    }

    .swiper-digital {
      height: 320px !important;
    }

    .swiper-slide-video {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      width: 100%;
      height: 100%;
    }

    .swiper-custom_style {
      color: #ffffff;
    }

    .swiper-pagination-bullet {
      background-color: #3B3B3B !important;
      padding: 8px;
    }

    .swiper-pagination-bullet-active {
      background-color: white !important;
      padding: 8px;
    }

    .tkpsda-backdrop {
      height: 500px;
      width: 100%;
      object-fit: cover;
    }

    /* Media query for mobile devices */
    @media screen and (max-width: 640px) {
      .tkpsda-backdrop {
        height: 100px;
      }
    }
  </style>
@endpush
