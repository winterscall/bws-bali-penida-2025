@extends('backpanel.layouts.template')

@section('page_title')
  Tambah Postingan Media Sosial
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.media.social.index') }}">Postingan Media Sosial</a>
      </li>
      <li class="breadcrumb-item active">Tambah Postingan Media Sosial</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-6">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Tambah Postingan Media Sosial</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.media.social.store') }}" method="POST">
              @csrf
              <div class="mb-4">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                  name="name" value="{{ old('name') }}" placeholder="masukan judul" required />
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="script" class="form-label">Script <span class="text-danger">*</span></label>
                <textarea rows="5" class="form-control @error('script') is-invalid @enderror" id="script"
                  name="script" placeholder="masukan script" required>{{ old('script') }}</textarea>
                @error('script')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="published_at" class="form-label">Tanggal Publish<span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at"
                  name="published_at" value="{{ old('published_at') }}" placeholder="DD/MM/YYYY" required />
                @error('published_at')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <button class="btn btn-primary float-end">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('bp-assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endpush

@push('js')
  <script src="{{ asset('bp-assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
@endpush

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#published_at').flatpickr({
        dateFormat: "d/m/Y",
      });
    })
  </script>
@endpush

