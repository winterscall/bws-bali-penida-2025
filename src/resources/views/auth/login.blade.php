<!doctype html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('/bp-assets/') }}"
  data-template="vertical-menu-template-no-customizer"
  data-style="light">
  <head>
    <meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login | {{ config('app.name') }}</title>

    <meta name="description" content="" />

    @include('auth.auth-headscript')
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
          <!-- Login -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-6">
                <a href="{{ route('home') }}" class="app-brand-link">
                  <img src="{{ asset('assets-tw/img/logo-kom-d.png') }}" alt="{{ config('app.name') }} Logo" style="height: 75px;">
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-1">Selamat datang di Backpanel BWS Bali Penida! 👋</h4>
              <p class="mb-6">Masukan email dan password anda untuk memulai</p>

              @session('status')
              <div class="alert alert-solid-primary d-flex align-items-center" role="alert">
                <span class="alert-icon rounded">
                  <i class="ti ti-user"></i>
                </span>
                {{ $value }}
              </div>
              @endsession

              <form id="formAuthentication" class="mb-4" action="{{ route('login.check') }}" method="POST">
                @csrf
                
                @error('error')
                  <div class="mb-6">
                    <div class="alert alert-solid-danger d-flex align-items-center" role="alert">
                      <span class="alert-icon rounded">
                        <i class="ti ti-ban"></i>
                      </span>
                      {{ $message }}
                    </div>
                  </div>
                @enderror

                <div class="mb-6">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    placeholder="Masukan email anda"
                    autofocus />
                    @error('email') 
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge @error('password') is-invalid @enderror">
                    <input
                      type="password"
                      id="password"
                      class="form-control @error('password') is-invalid @enderror"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    @error('password') 
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="mb-6">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    @include('auth.auth-footscript')
  </body>
</html>
