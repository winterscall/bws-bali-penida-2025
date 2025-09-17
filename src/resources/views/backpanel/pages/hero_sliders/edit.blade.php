@extends('backpanel.layouts.template')

@section('page_title')
  Tambah Slider Beranda
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.website_settings.hero_sliders.index') }}">Slider Beranda</a>
      </li>
      <li class="breadcrumb-item active">Tambah Slider Beranda</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-6">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Tambah Slider Beranda</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.website_settings.hero_sliders.update', ['hero_slider' => $hero_slider]) }}" method="POST" enctype="multipart/form-data">
              @csrf @method('PUT')
              <div class="mb-4">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                  name="name" value="{{ old('name', $hero_slider->name) }}" placeholder="masukan judul" required />
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="index" class="form-label">Index (urut dari terkecil) <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('index') is-invalid @enderror" id="index"
                  name="index" value="{{ old('index', $hero_slider->index) }}" placeholder="masukan index" required />
                @error('index')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                  name="file" value="{{ old('file') }}" placeholder="masukan file" />
                @error('file')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small>abaikan jika tidak merubah file</small>
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
