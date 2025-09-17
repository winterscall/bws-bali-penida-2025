<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="px-0 nav-item nav-link me-xl-4" href="javascript:void(0)">
      <i class="ti ti-menu-2 ti-md"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <ul class="flex-row navbar-nav align-items-center ms-auto">
      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="p-0 nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt class="rounded-circle" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="mt-0 dropdown-item" href="pages-account-settings-account.html">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">
                  <div class="avatar avatar-online">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt class="rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                  <small class="text-muted">Admin</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="my-1 dropdown-divider mx-n2"></div>
          </li>
          <li>
            <div class="px-2 pt-2 pb-1 d-grid">
              <a class="btn btn-sm btn-danger d-flex" href="{{ route('logout') }}" target="_blank">
                <small class="align-middle">Logout</small>
                <i class="ti ti-logout ms-2 ti-14px"></i>
              </a>
            </div>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>

<!-- Breadcrumb -->
<nav class="container-xxl flex-wrap pt-4">
  <ol class="breadcrumb mb-0">
    @yield('breadcrumb')
  </ol>
</nav>
<!-- /Breadcrumb -->
