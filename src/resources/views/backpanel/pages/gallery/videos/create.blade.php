@extends('backpanel.layouts.template')

@section('page_title')
  Tambah Video
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.albums.index') }}">Album Galeri</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.albums.show', ['album' => $album]) }}">Album Galeri</a>
      </li>
      <li class="breadcrumb-item active">Tambah Video</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-6">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Tambah Video</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.albums.videos.store', ['album' => $album]) }}" method="POST">
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
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                  name="url" value="{{ old('url') }}" placeholder="masukan url" required />
                @error('url')
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