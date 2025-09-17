@extends('backpanel.layouts.template')

@section('page_title')
  Publish Berita
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
      <li class="breadcrumb-item active">Publish Berita</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-12">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Publish Berita</h5>
          </div>
          <div class="card-body">
            <form id="form" action="{{ route('backpanel.news.update_publish', ['news_type' => $news_type, 'news' => $news]) }}" method="POST">
              @csrf @method('PUT')
              <div class="mb-4">
                <label for="published_at" class="form-label">Tanggal Publish<span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at"
                  name="published_at" value="{{ old('published_at') }}" placeholder="DD/MM/YYYY" required />
                @error('published_at')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <button class="btn btn-primary float-end">Submit</button>
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
