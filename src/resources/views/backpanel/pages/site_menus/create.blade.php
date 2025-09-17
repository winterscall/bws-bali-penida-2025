@extends('backpanel.layouts.template')

@section('page_title')
  Tambah Menu
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.website_settings.site_menus.index') }}">Menu</a>
      </li>
      <li class="breadcrumb-item active">Tambah Menu</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-6">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Tambah Menu</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.website_settings.site_menus.store') }}" method="POST">
              @csrf
              <div class="mb-4">
                <label for="type" class="form-label">Tipe <span class="text-danger">*</span></label>
                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                  <option value="" hidden disabled>Pilih Tipe</option>
                  @foreach ($types as $key => $value)
                    <option value="{{ $key }}" {{ old('type') == $key ? 'selected' : '' }}>
                      {{ $value }}
                    </option>
                  @endforeach
                </select>
                @error('type')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="parent_id" class="form-label">Parent <span class="text-danger">*</span></label>
                <select class="form-select @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                  <option value="">Tanpa Parent</option>
                  @foreach ($parents as $row)
                    <option value="{{ $row->id }}" {{ old('parent_id') == $row->id ? 'selected' : '' }}>
                      {{ $row->title }}
                    </option>
                  @endforeach
                </select>
                @error('parent_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" value="{{ old('title') }}" placeholder="masukan judul" required />
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="link_type" class="form-label">Jenis Link <span class="text-danger">*</span></label>
                <select class="form-select @error('link_type') is-invalid @enderror" id="link_type" name="link_type" required>
                  <option value="" hidden disabled>Pilih Jenis Link</option>
                  @foreach ($link_types as $key => $value)
                    <option value="{{ $key }}" {{ old('link_type') == $key ? 'selected' : '' }}>
                      {{ $value }}
                    </option>
                  @endforeach
                </select>
                @error('link_type')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-4 d-none" id="external_url_container">
                <label for="external_url" class="form-label">URL External <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('external_url') is-invalid @enderror" id="external_url"
                  name="external_url" value="{{ old('external_url') }}" placeholder="masukan URL external" />
                @error('external_url')
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

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#link_type').change(function() {
        toggleExternalUrlField();
      });

      toggleExternalUrlField();
    });

    function toggleExternalUrlField() {
      const linkType = $('#link_type').val();
      if (linkType === 'external_url') {
        $('#external_url_container').removeClass('d-none');
        $('#external_url').attr('required', true);
      } else {
        $('#external_url_container').addClass('d-none');
        $('#external_url').removeAttr('required');
      };
    }
  </script>
@endpush
