<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('backpanel.dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{ asset('assets-tw/img/logo-kom-b.png') }}" height="17" />
      </span>
      <span class="app-brand-text demo menu-text fw-bold" style="font-size: 14pt;">BWS Bali-Penida</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="align-middle ti menu-toggle-icon d-none d-xl-block"></i>
      <i class="align-middle ti ti-x d-block d-xl-none ti-md"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="py-1 menu-inner">

    <!-- Main Menu -->
    <li class="menu-header small">
      <span class="menu-header-text">Main Menu</span>
    </li>
    <li class="menu-item {{ request()->routeIs('backpanel.dashboard') ? 'active open' : '' }}">
      <a href="{{ route('backpanel.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <li class="menu-header small">
      <span class="menu-header-text">Administratif</span>
    </li>
    <li class="menu-item {{ request()->routeIs('backpanel.users.*') ? 'active open' : '' }}">
      <a href="{{ route('backpanel.users.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div>Pengguna</div>
      </a>
    </li>

    <li class="menu-header small">
      <span class="menu-header-text">Pengaturan Website</span>
    </li>
    <li class="menu-item {{ request()->routeIs('backpanel.website_settings.home_sliders.*') ? 'active open' : '' }}">
      <a href="{{ route('backpanel.website_settings.hero_sliders.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-slideshow"></i>
        <div>Slider Beranda</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('backpanel.website_settings.backlinks.*') ? 'active open' : '' }}">
      <a href="{{ route('backpanel.website_settings.backlinks.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-link"></i>
        <div>Instansi Terkait</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('backpanel.website_settings.site_menus.*') ? 'active open' : '' }}">
      <a href="{{ route('backpanel.website_settings.site_menus.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-list"></i>
        <div>Menu</div>
      </a>
    </li>

    <li class="menu-header small">
      <span class="menu-header-text">Berita</span>
    </li>
    <li class="menu-item {{ request()->routeIs('backpanel.news_types.*') ? 'active open' : '' }}">
      <a href="{{ route('backpanel.news_types.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-news"></i>
        <div>Tipe</div>
      </a>
    </li>
    @use('App\Models\News\NewsType')
    @foreach (NewsType::all() as $news_type)
      <li class="menu-item {{ request()->is('backpanel/news/' . $news_type->id) ? 'active open' : '' }}">
        <a href="{{ route('backpanel.news.index', ['news_type' => $news_type->id]) }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-news"></i>
          <div>{{ $news_type->name }}</div>
        </a>
      </li>
    @endforeach

    <li class="menu-header small">
      <span class="menu-header-text">Galeri</span>
    </li>
    <li class="menu-item {{ request()->routeIs('backpanel.albums.*') ? 'active open' : '' }}">
      <a href="{{ route('backpanel.albums.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-library-photo"></i>
        <div>Album</div>
      </a>
    </li>

    <li class="menu-header small">
      <span class="menu-header-text">Media</span>
    </li>
    <li class="menu-item {{ request()->routeIs('backpanel.media.social.*') ? 'active open' : '' }}">
      <a href="{{ route('backpanel.media.social.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-news"></i>
        <div>Sosial</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('backpanel.media.digital.*') ? 'active open' : '' }}">
      <a href="{{ route('backpanel.media.digital.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-news"></i>
        <div>Digital</div>
      </a>
    </li>
  </ul>
</aside>
