@extends('backpanel.layouts.template')

@section('page_title')
  Tambah Instansi terkait
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.website_settings.backlinks.index') }}">Instansi terkait</a>
      </li>
      <li class="breadcrumb-item active">Tambah Instansi terkait</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-6">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Tambah Instansi terkait</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.website_settings.backlinks.store') }}" method="POST">
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
                <label for="url" class="form-label">URL <span class="text-danger">*</span></label>
                <input type="url" class="form-control @error('url') is-invalid @enderror" id="url"
                  name="url" value="{{ old('url') }}" placeholder="masukan URL" required />
                @error('url')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="index" class="form-label">Index (urut dari terkecil) <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('index') is-invalid @enderror" id="index"
                  name="index" value="{{ old('index', 1) }}" placeholder="masukan index" required />
                @error('index')
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
