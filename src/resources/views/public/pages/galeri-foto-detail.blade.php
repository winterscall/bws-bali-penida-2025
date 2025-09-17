@extends('public.layouts.layout')

@section('content')
<!-- Main Banner -->
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-36 w-screen">
  <img src="{{ asset('assets-tw/img/banner2.jpg') }}" alt="" class="absolute inset-0 z-5 h-full w-full object-cover object-right md:object-center">
  <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-3xl relative z-20">Foto Kegiatan {{ $album->name }}</h2>
      <p class="text-gray-200 text-2xl relative z-20 mt-2">Kumpulan foto kegiatan BWS Bali-Penida</p>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="bg-white w-screen">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto py-10 sm:py-16 lg:max-w-none lg:py-32">
      <p class="text-2xl tracking-tight leading-loose font-light">
        <span class="font-extrabold">{{ $album->name }}</span>
      </p>
      <div class="space-y-12 gap-4 grid grid-cols-1 lg:grid-cols-4 lg:gap-x-6 lg:space-y-0">
        <!-- Gallery Page Start Here -->
        @foreach ($photos as $media)
          <figure class="text-center">
            <a href="#{{ $media->path_media }}">
              <img src="{{ $media->thumb_url }}" alt="{{ $media->name }}" class="tkpsda-shadow">
              <span class="text-base font-semibold">{{ $media->name }}</span>
            </a>
            <div class="lightbox" id="{{ $media->path_media }}">
              <img src="{{ $media->path_url }}" alt="{{ $media->name }}">
              <a href="#_" class="btn-close">&times;</a>
            </div>
          </figure>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

@push('css')
<style>
  figure {
    margin: 0;
    padding: 0;
  }

  @media (max-width: 756px) {
    .gallery {
      display: block;
    }
  }

  @media (min-width: 757px) {
    .gallery {
      display: grid;
    }
  }

  .container {
    width: 100%;
    height: 100%;
  }

  .wrap {
    max-width: 960px;
    width: 100%;
    margin: 0 auto;
  }

  .gallery {
    grid-template-columns: repeat(8, 1fr);
    grid-template-rows: repeat(8, 5vw);
    grid-gap: 15px;
    width: 100%;
    padding-top: 60px;
  }

  .gallery__item--1 {
    grid-column-start: 1;
    grid-column-end: 3;
    grid-row-start: 1;
    grid-row-end: 3;
  }

  .gallery__item--2 {
    grid-column-start: 3;
    grid-column-end: 5;
    grid-row-start: 1;
    grid-row-end: 3;
  }

  .gallery__item--3 {
    grid-column-start: 5;
    grid-column-end: 9;
    grid-row-start: 1;
    grid-row-end: 6;
  }

  .gallery__item--4 {
    grid-column-start: 1;
    grid-column-end: 5;
    grid-row-start: 3;
    grid-row-end: 6;
  }

  .gallery__item--5 {
    grid-column-start: 1;
    grid-column-end: 5;
    grid-row-start: 6;
    grid-row-end: 9;
  }

  .gallery__item--6 {
    grid-column-start: 5;
    grid-column-end: 9;
    grid-row-start: 6;
    grid-row-end: 9;
  }

  .gallery__img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .4s linear;
  }

  .gallery__item {
    overflow: hidden;
  }

  .gallery__item>a {
    display: block;
    width: 100%;
    height: 100%;
  }

  .gallery__img:hover {
    opacity: .5;
    transition: .4s linear;
    transform: scale(1.2);
  }

  .lightbox {
    position: fixed;
    z-index: 999;
    height: 0;
    width: 0;
    text-align: center;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    opacity: 0;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
  }

  .lightbox img {
    max-width: 50%;
    height: auto;
    margin: 0 auto;
    opacity: 0;
  }

  .lightbox:target {
    outline: none;
    width: 100%;
    height: 100%;
    opacity: 1 !important;

  }

  .lightbox:target img {
    opacity: 1;
    transition: opacity 0.6s;
    transition: opacity 0.6s;
  }

  .btn-close {
    font-size: 32px;
    display: block;
    margin: 0 auto;
    max-width: 200px;
    width: 100%;
    padding: 0 20px;
    color: white;
    font-weight: bold;
    text-decoration: none;
    height: auto;
  }
</style>
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/js/lightbox.min.js" integrity="sha512-KbRFbjA5bwNan6DvPl1ODUolvTTZ/vckssnFhka5cG80JVa5zSlRPCr055xSgU/q6oMIGhZWLhcbgIC0fyw3RQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush