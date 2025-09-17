@extends('backpanel.layouts.template')

@section('page_title')
  Ubah Headline Foto
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.news.index', ['news_type' => $news_type]) }}">{{ $news_type->name }}</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.news.show', ['news_type' => $news_type, 'news' => $news]) }}">Detail Berita</a>
      </li>
      <li class="breadcrumb-item active">Ubah Headline Foto</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-6">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Ubah Headline Foto</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.news.update_picture', ['news_type' => $news_type, 'news' => $news]) }}" method="POST">
              @csrf @method('PUT')
              <div class="mb-4">
                <label for="featured_image_path" class="form-label">Url <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('featured_image_path') is-invalid @enderror" id="featured_image_path"
                  name="featured_image_path" value="{{ old('featured_image_path', $news->featured_image_path) }}" placeholder="masukan url headline foto" required />
                @error('featured_image_path')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="featured_image_description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('featured_image_description') is-invalid @enderror" id="featured_image_description"
                  name="featured_image_description" value="{{ old('featured_image_description', $news->featured_image_description) }}" placeholder="masukan deskripsi foto" required />
                @error('featured_image_description')
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
