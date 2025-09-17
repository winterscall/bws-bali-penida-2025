<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite('resources/css/app.css')
  <script src="https://kit.fontawesome.com/112297eada.js" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>
  <div class="container w-screen">

    <!-- Logo section -->
    <div class="bg-sky-800 px-2 lg:px-20 py-2 w-screen">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <div class="grid grid-cols-2 gap-4">

        </div>
        <div class="grid grid-cols-3 gap-4 pt-2">
          <a href="https://www.youtube.com/channel/UCPd3bIgpDb8rsSqn8KVwbYQ"><i
              class="fa-brands fa-youtube text-white"></i></a>
          <a href="https://twitter.com/bwsbalipenida"><i class="fa-brands fa-twitter text-white"></i></a>
          <a href="https://www.instagram.com/bwsbalipenida/"><i class="fa-brands fa-instagram text-white"></i></a>
        </div>
      </div>
    </div>

    <!-- Main navigation container -->
    <nav class="bg-white w-screen border-b border-gray-200 sticky top-0 z-10 shadow-md">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">
        <div class="flex flex-row items-center h-20">
          <a href="{{ route('home') }}" class="flex-shrink-0 hidden lg:block">
            <img src="{{ asset('assets-tw/img/logo-pu-baru.jpeg') }}" class="h-16 mr-5 hidden lg:block"
              alt="Logo" />
          </a>
          <a href="{{ route('home') }}" class="flex-shrink-0 block lg:hidden">
            <img src="{{ asset('assets-tw/img/logo-kom-a.png') }}" class="h-10 mr-5 block lg:hidden" alt="Logo" />
          </a>
          <div class="hidden lg:flex flex-col">
            <p class="text-lg leading-none uppercase font-bold mb-1">Balai wilayah sungai bali-penida</p>
            <p class="text-base leading-none font-semibold mb-1">Direktorat Jenderal Sumber Daya Air</p>
            <p class="text-base leading-none font-semibold" style="letter-spacing: -.03em;">Kementerian Pekerjaan Umum
            </p>
          </div>
        </div>
        <button data-collapse-toggle="navbar-multi-level" type="button"
          class="inline-flex items-center w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
          aria-controls="navbar-multi-level" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
          <ul
            class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
            <li>
              <a href="{{ route('home') }}"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0"
                aria-current="page">
                Beranda
              </a>
            </li>

            <li>
              <button id="dropdownNavbarLink" data-dropdown-toggle="profilBalai"
                class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-700 border-b border-gray-100 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                Profil
                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
                </svg>
              </button>
              <!-- Dropdown menu -->
              <div id="profilBalai"
                class="tkpsda-mob-menu-profile z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="{{ route('profil.visi_misi') }}" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
                  </li>
                  <li>
                    <a href="{{ route('profil.tugas_dan_fungsi') }}" class="block px-4 py-2 hover:bg-gray-100">Tugas &
                      Fungsi</a>
                  </li>
                  <li aria-labelledby="dropdownNavbarLink">
                    <button id="doubleDropdownButton" data-dropdown-toggle="organisasi"
                      data-dropdown-placement="right-start" type="button"
                      class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100">
                      Organisasi
                      <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 4 4 4-4" />
                      </svg>
                    </button>
                    <div id="organisasi" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                      <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                        <li><a class="block px-4 py-2 hover:bg-gray-100"
                            href="{{ route('profil.organisasi.seksi_op') }}">Subbagian Umum dan Tata Usaha</a></li>
                        <li><a class="block px-4 py-2 hover:bg-gray-100"
                            href="{{ route('profil.organisasi.seksi_op') }}">Seksi Keterpaduan Pembangunan Infrastruktur
                            Sumber Daya Air</a></li>
                        <li><a class="block px-4 py-2 hover:bg-gray-100"
                            href="{{ route('profil.organisasi.seksi_op') }}">Seksi Pelaksanaan</a></li>
                        <li><a class="block px-4 py-2 hover:bg-gray-100"
                            href="{{ route('profil.organisasi.seksi_op') }}">Seksi Operasi dan Pemeliharaan</a></li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a href="{{ route('profil.wilayah_administrasi') }}"
                      class="block px-4 py-2 hover:bg-gray-100">Wilayah Administrasi</a>
                  </li>
                  <li>
                    <a href="{{ route('profil.struktur_organisasi') }}"
                      class="block px-4 py-2 hover:bg-gray-100">Struktur Organisasi</a>
                  </li>
                  <li>
                    <a href="{{ route('profil.informasi_kantor') }}"
                      class="block px-4 py-2 hover:bg-gray-100">Informasi Lokasi Kantor</a>
                  </li>
                  {{-- <li>
                    <a href="{{ route('profil.faq') }}" class="block px-4 py-2 hover:bg-gray-100">FAQ</a>
                  </li> --}}
                </ul>
              </div>
            </li>

            @use('App\Models\SiteMenu')
            @if ($siteMenus = SiteMenu::where('type', 'layanan')->orderBy('index', 'asc')->get())
              <li>
                <button id="dropdownNavbarLink" data-dropdown-toggle="layanan"
                  class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                  Layanan
                  <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4" />
                  </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="layanan"
                  class="tkpsda-mob-menu-public z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                  <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                    @foreach ($siteMenus as $me)
                      @if (count($me->children) > 0)
                        <li aria-labelledby="dropdownNavbarLink">
                          <button id="doubleDropdownButton" data-dropdown-toggle="{{ $me->title }}"
                            data-dropdown-placement="right-start" type="button"
                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100">
                            {{ $me->title }}
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                              fill="none" viewBox="0 0 10 6">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                          </button>
                          <div id="{{ $me->title }}"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                              @foreach ($me->children->sortBy('title') as $child)
                                <x-public.menu-item :menu="$me" />
                              @endforeach
                            </ul>
                          </div>
                        </li>
                      @else
                        <x-public.menu-item :menu="$me" />
                      @endif
                    @endforeach
                  </ul>
                </div>
              </li>
            @endif

            @if ($siteMenus = SiteMenu::where('type', 'informasi_publik')->orderBy('index', 'asc')->get())
              <li>
                <button id="dropdownNavbarLink" data-dropdown-toggle="informasi_publik"
                  class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                  Informasi Publik
                  <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4" />
                  </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="informasi_publik"
                  class="tkpsda-mob-menu-public z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                  <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                    @foreach ($siteMenus as $me)
                      @if (count($me->children) > 0)
                        <li aria-labelledby="dropdownNavbarLink">
                          <button id="doubleDropdownButton" data-dropdown-toggle="{{ $me->title }}"
                            data-dropdown-placement="right-start" type="button"
                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100">
                            {{ $me->title }}
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                              fill="none" viewBox="0 0 10 6">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                          </button>
                          <div id="{{ $me->title }}"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                              @foreach ($me->children->sortBy('title') as $child)
                                <x-public.menu-item :menu="$me" />
                              @endforeach
                            </ul>
                          </div>
                        </li>
                      @else
                        <x-public.menu-item :menu="$me" />
                      @endif
                    @endforeach
                    <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('tkpsda') }}">TKPSDA</a></li>
                  </ul>
                </div>
              </li>
            @endif

            @use('App\Models\News\NewsType')
            <li>
              <button id="dropdownNavbarLink" data-dropdown-toggle="publikasi"
                class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                Publikasi
                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
                </svg>
              </button>
              <!-- Dropdown menu -->
              <div id="publikasi"
                class="tkpsda-mob-menu-public z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                  <li aria-labelledby="dropdownNavbarLink">
                    <button id="doubleDropdownButton" data-dropdown-toggle="berita"
                      data-dropdown-placement="right-start" type="button"
                      class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100">
                      Berita
                      <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 4 4 4-4" />
                      </svg>
                    </button>
                    <div id="berita" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                      <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                        @foreach (NewsType::all() as $tipe)
                          <li>
                            <a href="{{ route('berita.index', ['slug' => $tipe->slug]) }}"
                              class="block px-4 py-2 hover:bg-gray-100">
                              {{ $tipe->name }}
                            </a>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                  <li aria-labelledby="dropdownNavbarLink">
                    <button id="doubleDropdownButton" data-dropdown-toggle="galeri"
                      data-dropdown-placement="right-start" type="button"
                      class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100">
                      Galeri
                      <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 4 4 4-4" />
                      </svg>
                    </button>
                    <div id="galeri" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                      <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                        <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('galeri.foto') }}">Foto</a>
                        </li>
                        <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('galeri.video') }}">Video</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  {{-- <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('home') }}">TKPSDA</a></li> --}}
                </ul>
              </div>
            </li>

            <li>
              <a href="{{ route('kontak') }}"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">
                Kontak
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="border-t-4 border-yellow-300 h-1"></div>
    </nav>

    {{-- body --}}
    @yield('content')

    <!-- Footer -->
    <div class="relative isolate overflow-hidden bg-gray-900 py-10 sm:py-16 w-screen footer-overlay tkpsda-footer">
      <img src="{{ asset('assets-tw/img/bg-footer.jpeg') }}" alt="footer image"
        class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-8 gap-y-16 lg:grid-cols-3">
          <div class="mx-auto flex max-w-xs flex-col gap-y-4 z-10">
            <div class="border-b-2 border-yellow-300">
              <p class="text-2xl tracking-tight leading-loose font-light text-white">Kontak Kami</p>
            </div>
            <p class="line-clamp-5 p-2 text-white">
              REKOMTEK BWS Bali-Penida <br>
              Jl. Kapten Tjok Agung Tresna No. Denpasar, Bali 80235
              <br>
              <i class="fa-solid fa-phone"></i> (+62) 851-7958-9571
            </p>
            <div class="flex flex-col">
              {{-- <img src="{{ asset('assets-tw/img/pusda2.png') }}" alt="pusda" class="h-12 max-w-fit mb-3">
              <img src="{{ asset('assets-tw/img/logo-pu2.png') }}" alt="pu" class="h-12 max-w-fit mb-3"> --}}
            </div>
          </div>
          <div class="mx-auto flex max-w-xs flex-col gap-y-4 z-10">
            <div class="border-b-2 border-yellow-300">
              <p class="text-2xl tracking-tight leading-loose font-light text-white">Instansi Terkait</p>
            </div>
            <ul class="text-white p-2">
              @use('App\Models\Backlink')
              @foreach (Backlink::all() as $backlink)
                <li>
                  <a href="<?= $backlink->url ?>" target="_blank"
                    rel="noopener noreferrer"><?= $backlink->name ?></a>
                </li>
              @endforeach
            </ul>
          </div>
          <div class="mx-auto flex max-w-xs flex-col gap-y-4 z-10">
            <div class="border-b-2 border-yellow-300">
              <p class="text-2xl tracking-tight leading-loose font-light text-white">Info Pengunjung</p>
            </div>
            <a href="https://www.freecounterstat.com" title="free website counter" class="mt-2">
              <img src="https://counter8.stat.ovh/private/freecounterstat.php?c=74qp2ax3yyms5ub9e4fs2t4ddl3k8sd3"
                border="0" title="free website counter" alt="free website counter">
            </a>
            <div class="mt-4">
              <a href="https://www.lapor.go.id/">
                <img src="https://www.lapor.go.id/themes/lapor/assets/images/logo.png" />
              </a>
            </div>
          </div>
        </dl>
      </div>
    </div>
    <div
      class="relative isolate flex items-center gap-x-6 overflow-hidden bg-blue-900 px-6 py-2.5 sm:px-3.5 sm:before:flex-1 w-screen">
      <div class="flex flex-wrap items-center text-center gap-x-4 gap-y-2">
        <p class="text-sm leading-6 text-white p-2">
          <strong class="font-semibold">&copy; Copyrights 2025. Balai Wilayah Sungai Bali-Penida.</strong>
        </p>
      </div>
      <div class="flex flex-1 justify-end">
      </div>
    </div>

  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    var swiper2 = new Swiper(".mySwiper2", {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });

    var swiper3 = new Swiper(".mySwiper3", {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });
  </script>

  @stack('js')
  @stack('scripts')
</body>

</html>
