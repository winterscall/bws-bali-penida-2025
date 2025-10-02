@extends('backpanel.layouts.template')

@section('page_title')
  Detail Album
@endsection

@use('App\Models\SiteMenu')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Detail Album
              @if($album->published_at)
                <span class="badge ms-4 bg-label-success">Published: {{ $album->published_at->format('d M Y') }}</span>
              @else
                <span class="badge ms-4 bg-label-danger">Draft</span>
              @endif
            </h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">{{ $album->name }}</h6>
            <p class="card-text">{{ $album->description }}</p>
          </div>
          <div class="card-footer d-flex flex-row-reverse">
            @can('update', $album)
              <a href="{{ route('backpanel.albums.edit', ['album' => $album]) }}" class="btn btn-outline-secondary"><i class="fas fa-edit me-2"></i> Edit Album</a>
            @endcan
            @can('publish', $album)
              <a href="{{ route('backpanel.albums.publish', ['album' => $album]) }}" class="btn me-2 btn-outline-primary"><i class="fas fa-check me-2"></i> Publish Album</a>
            @endcan
            @can('unpublish', $album)
              <a href="{{ route('backpanel.albums.unpublish', ['album' => $album]) }}" class="btn me-2 btn-outline-danger" onclick="return confirm('apakah anda yakin ingin unpublish album ini?');"><i class="fas fa-cancel me-2"></i> Unpublish Album</a>
            @endcan
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Foto</h5>
            <div class="d-flex gap-1 ms-auto">
              @can('create', ['App\Models\Gallery\GalleryMedia', $album])
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadPhotoModal">
                  <i class="fas fa-plus me-1"></i> Tambah Foto
                </button>
              @endcan
            </div>
          </div>
          <div class="card-body">
            <div class="row g-3">
              @forelse($photos as $media)
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="card h-100 position-relative photo-card">
                    <img src="{{ $media->thumb_url }}" class="card-img-top" alt="{{ $media->title }}" style="height: 200px; object-fit: cover;">
                    {{-- <div class="card-body">
                      <h6 class="card-title">{{ $media->title }}</h6>
                      <p class="card-text small text-muted">{{ Str::limit($media->description, 60) }}</p>
                    </div> --}}
                    <div class="photo-card-overlay">
                      <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ $media->path_url }}" class="btn btn-sm btn-warning" target="_blank">
                          <i class="fas fa-eye"></i>
                        </a>
                        @can('delete', $media)
                          <form action="{{ route('backpanel.albums.photos.destroy', ['album' => $album, 'photo' => $media]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                        @endcan
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <div class="col-12">
                  <div class="alert alert-info">
                    Belum ada foto dalam album ini.
                  </div>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-6">
        <div class="card">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Video</h5>
            <div class="d-flex gap-1 ms-auto">
              {{-- @can('create', ['App\Models\Gallery\GalleryMedia', $album])
                <a href="{{ route('backpanel.albums.medias.create', ['album' => $album, 'type' => 'video']) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i> Tambah Video</a>
              @endcan --}}
            </div>
          </div>
          <div class="card-body">
            <div class="row g-3">
              @forelse($videos as $media)
                <div class="col-12 col-sm-6">
                  <div class="card h-100 position-relative photo-card">
                    <img src="{{ $media->thumb_url }}" class="card-img-top" alt="{{ $media->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                      <p class="card-text small">{{ Str::limit($media->name, 50) }}</p>
                    </div>
                    <div class="photo-card-overlay">
                      <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ $media->path_url }}" class="btn btn-sm btn-warning" target="_blank">
                          <i class="fas fa-eye"></i>
                        </a>
                        @can('update', $media)
                          <a href="{{ route('backpanel.albums.medias.edit', ['album' => $album, 'media' => $media]) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-edit"></i>
                          </a>
                        @endcan
                        @can('delete', $media)
                          <form action="{{ route('backpanel.albums.medias.destroy', ['album' => $album, 'media' => $media]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                        @endcan
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <div class="col-12">
                  <div class="alert alert-info">
                    Belum ada video dalam album ini.
                  </div>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Upload Photo Modal -->
  <div class="modal fade" id="uploadPhotoModal" tabindex="-1" aria-labelledby="uploadPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadPhotoModalLabel">Upload Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('backpanel.albums.photos.upload', ['album' => $album]) }}" class="dropzone" id="photo-dropzone">
            @csrf
            <input type="hidden" name="type" value="photo">
            <div class="dz-message" data-dz-message>
              <div class="text-center">
                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                <h5>Drag & drop foto di sini atau klik untuk memilih</h5>
                <p class="text-muted">Mendukung format: JPG, PNG, GIF (Max: 10MB per file)</p>
              </div>
            </div>
          </form>
          <div class="mt-3">
            <div class="alert alert-info" id="upload-status" style="display: none;">
              <span id="upload-message"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="start-upload" style="display: none;">Mulai Upload</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('css')
<style>
  .photo-card {
    transition: all 0.3s ease;
    overflow: hidden;
  }
  
  .photo-card:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  }
  
  .photo-card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  
  .photo-card:hover .photo-card-overlay {
    opacity: 1;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  // Wait for Dropzone to load and disable auto discover
  document.addEventListener('DOMContentLoaded', function() {
    if (typeof Dropzone === 'undefined') {
      console.error('Dropzone library failed to load');
      return;
    }
    Dropzone.autoDiscover = false;

    // Initialize Dropzone
    const photoDropzone = new Dropzone('#photo-dropzone', {
      url: '{{ route('backpanel.albums.photos.upload', ['album' => $album]) }}',
      method: 'POST',
      paramName: 'file',
      maxFilesize: 10, // MB
      acceptedFiles: 'image/*',
      addRemoveLinks: true,
      parallelUploads: 5,
      uploadMultiple: false,
      autoProcessQueue: false,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      init: function() {
        const dropzone = this;
        const startUploadBtn = document.getElementById('start-upload');
        const uploadStatus = document.getElementById('upload-status');
        const uploadMessage = document.getElementById('upload-message');
        
        let totalFiles = 0;
        let uploadedFiles = 0;
        let failedFiles = 0;

        // Show upload button when files are added
        this.on('addedfile', function(file) {
          totalFiles++;
          startUploadBtn.style.display = 'inline-block';
        });

        // Hide upload button and reset counters when all files are removed
        this.on('removedfile', function(file) {
          totalFiles--;
          if (totalFiles === 0) {
            startUploadBtn.style.display = 'none';
            uploadStatus.style.display = 'none';
            uploadedFiles = 0;
            failedFiles = 0;
          }
        });

        // Handle successful uploads
        this.on('success', function(file, response) {
          uploadedFiles++;
          updateUploadStatus();
          
          // Add the new photo to the gallery grid
          if (response.media) {
            addPhotoToGrid(response.media);
          }
        });

        // Handle failed uploads
        this.on('error', function(file, errorMessage) {
          failedFiles++;
          updateUploadStatus();
          console.error('Upload failed:', errorMessage);
        });

        // Handle upload completion
        this.on('queuecomplete', function() {
          setTimeout(() => {
            if (failedFiles === 0) {
              // Close modal if all uploads successful
              const modal = bootstrap.Modal.getInstance(document.getElementById('uploadPhotoModal'));
              modal.hide();
              
              // Reset dropzone
              dropzone.removeAllFiles();
              totalFiles = 0;
              uploadedFiles = 0;
              failedFiles = 0;
              startUploadBtn.style.display = 'none';
              uploadStatus.style.display = 'none';
            }
          }, 2000);
        });

        // Start upload button click handler
        startUploadBtn.addEventListener('click', function() {
          uploadedFiles = 0;
          failedFiles = 0;
          dropzone.processQueue();
          this.disabled = true;
          this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Mengupload...';
        });

        function updateUploadStatus() {
          uploadStatus.style.display = 'block';
          const processed = uploadedFiles + failedFiles;
          
          if (processed < totalFiles) {
            uploadStatus.className = 'alert alert-info';
            uploadMessage.textContent = `Mengupload... ${processed}/${totalFiles} selesai`;
          } else {
            if (failedFiles === 0) {
              uploadStatus.className = 'alert alert-success';
              uploadMessage.textContent = `Berhasil mengupload ${uploadedFiles} foto!`;
            } else {
              uploadStatus.className = 'alert alert-warning';
              uploadMessage.textContent = `Upload selesai: ${uploadedFiles} berhasil, ${failedFiles} gagal`;
            }
            
            // Re-enable upload button
            startUploadBtn.disabled = false;
            startUploadBtn.innerHTML = 'Mulai Upload';
          }
        }

        function addPhotoToGrid(media) {
          const photosContainer = document.querySelector('.col-md-6:first-of-type .row.g-3');
          const emptyAlert = photosContainer.querySelector('.alert-info');
          
          // Remove "no photos" message if it exists
          if (emptyAlert) {
            emptyAlert.parentElement.remove();
          }

          // Create new photo card
          const photoCard = document.createElement('div');
          photoCard.className = 'col-12 col-sm-6 col-md-4';
          photoCard.innerHTML = `
            <div class="card h-100 position-relative photo-card">
              <img src="${media.thumb_url}" class="card-img-top" alt="${media.title}" style="height: 200px; object-fit: cover;">
              <div class="photo-card-overlay">
                <div class="d-flex gap-2 justify-content-center">
                  <a href="${media.path_url}" class="btn btn-sm btn-warning" target="_blank">
                    <i class="fas fa-eye"></i>
                  </a>
                  <form action="/backpanel/albums/{{ $album->id }}/medias/${media.id}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          `;
          
          photosContainer.appendChild(photoCard);
        }
      }
    });

    // Reset modal when it's closed
    document.getElementById('uploadPhotoModal').addEventListener('hidden.bs.modal', function() {
      photoDropzone.removeAllFiles();
      document.getElementById('start-upload').style.display = 'none';
      document.getElementById('upload-status').style.display = 'none';
    });
  });
</script>
@endpush