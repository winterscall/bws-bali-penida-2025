@extends('backpanel.layouts.template')

@section('page_title')
  Tambah {{ $news_type->name }}
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.news.index', ['news_type' => $news_type]) }}">{{ $news_type->name }}</a>
      </li>
      <li class="breadcrumb-item active">Tambah {{ $news_type->name }}</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-12">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Tambah {{ $news_type->name }}</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.news.store', ['news_type' => $news_type]) }}" method="POST">
              @csrf
              <div class="mb-4">
                <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" value="{{ old('title') }}" placeholder="masukan judul" required />
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                  name="slug" value="{{ old('slug') }}" placeholder="masukan slug" required />
                @error('slug')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="excerpt" class="form-label">Isi Singkat <span class="text-danger">*</span></label>
                <textarea rows="4" class="form-control @error('excerpt') is-invalid @enderror" id="excerpt"
                  name="excerpt" placeholder="masukan isi singkat" required>{{ old('excerpt') }}</textarea>
                @error('excerpt')
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

@push('scripts')
<script>
  // generate slug from title
  const titleInput = document.getElementById('title');
  const slugInput = document.getElementById('slug');

  titleInput.addEventListener('input', function() {
    slugInput.value = this.value
      .toLowerCase()
      .replace(/\s+/g, '-') // replace spaces with -
      .replace(/[^\w\-]+/g, '') // remove all non-word chars
      .replace(/\-\-+/g, '-') // replace multiple - with single -
      .replace(/^-+/, '') // trim - from start
      .replace(/-+$/, ''); // trim - from end
  });
</script>
@endpush
