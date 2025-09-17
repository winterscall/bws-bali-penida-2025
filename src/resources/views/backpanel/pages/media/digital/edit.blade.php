@extends('backpanel.layouts.template')

@section('page_title')
  Ubah Postingan Media Digital
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.media.social.index') }}">Postingan Media Digital</a>
      </li>
      <li class="breadcrumb-item active">Ubah Postingan Media Digital</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-6">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Ubah Postingan Media Digital</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.media.digital.update', ['digital_media' => $digital_media]) }}" method="POST" enctype="multipart/form-data">
              @csrf @method('PUT')
              <div class="mb-4">
                <label for="title" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" value="{{ old('title', $digital_media->title) }}" placeholder="masukan judul" required />
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mb-4">
                <label for="cover_file" class="form-label">Cover File</label>
                <input type="file" class="form-control @error('cover_file') is-invalid @enderror" id="cover_file"
                  name="cover_file" />
                @error('cover_file')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small>abaikan jika tidak merubah file</small>
              </div>
              
              <!-- Radio Button for Media Type -->
              <div class="mb-4">
                <label class="form-label">Jenis Media <span class="text-danger">*</span></label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="media_type" id="media_type_none" value="none" @checked($digital_media->type === 'none')>
                  <label class="form-check-label" for="media_type_none">
                    Tidak Ada
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="media_type" id="media_type_attachment" value="attachment" @checked($digital_media->type === 'attachment')>
                  <label class="form-check-label" for="media_type_attachment">
                    File Attachment
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="media_type" id="media_type_url" value="url" @checked($digital_media->type === 'url')>
                  <label class="form-check-label" for="media_type_url">
                    URL
                  </label>
                </div>
                @error('media_type')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
              
              <!-- Attachment Field (hidden by default) -->
              <div class="mb-4" id="attachment_field" style="display: none;">
                <label for="attachment_file" class="form-label">File Dokumen</label>
                <input type="file" class="form-control @error('attachment_file') is-invalid @enderror" id="attachment_file"
                  name="attachment_file" />
                @error('attachment_file')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small>abaikan jika tidak merubah file</small>
              </div>
              
              <!-- URL Field (hidden by default) -->
              <div class="mb-4" id="url_field" style="display: none;">
                <label for="media_url" class="form-label">URL <span class="text-danger">*</span></label>
                <input type="url" class="form-control @error('media_url') is-invalid @enderror" id="media_url"
                  name="media_url" value="{{ old('media_url', $digital_media->url) }}" placeholder="https://example.com" />
                @error('media_url')
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
  document.addEventListener('DOMContentLoaded', function() {
    const noneRadio = document.getElementById('media_type_none');
    const attachmentRadio = document.getElementById('media_type_attachment');
    const urlRadio = document.getElementById('media_type_url');
    const attachmentField = document.getElementById('attachment_field');
    const urlField = document.getElementById('url_field');
    const attachmentFileInput = document.getElementById('attachment_file');
    const mediaUrlInput = document.getElementById('media_url');
    
    function toggleFields() {
      // Hide all fields first
      attachmentField.style.display = 'none';
      urlField.style.display = 'none';
      
      // Remove required attributes
      attachmentFileInput.removeAttribute('required');
      mediaUrlInput.removeAttribute('required');
      
      // Show relevant field based on selection
      if (attachmentRadio.checked) {
        attachmentField.style.display = 'block';
        // attachmentFileInput.setAttribute('required', '');
      } else if (urlRadio.checked) {
        urlField.style.display = 'block';
        mediaUrlInput.setAttribute('required', '');
      }
      // When noneRadio is checked, both fields remain hidden
    }
    
    // Initial toggle based on default selection
    toggleFields();
    
    // Toggle on radio button change
    noneRadio.addEventListener('change', toggleFields);
    attachmentRadio.addEventListener('change', toggleFields);
    urlRadio.addEventListener('change', toggleFields);
  });
</script>
@endpush
