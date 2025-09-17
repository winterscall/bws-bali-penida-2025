@extends('backpanel.layouts.template')

@section('page_title')
  Detail Album
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
@endpush

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
                <a href="{{ route('backpanel.albums.medias.create', ['album' => $album, 'type' => 'photo']) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i> Tambah Foto</a>
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
              @can('create', ['App\Models\Gallery\GalleryMedia', $album])
                <a href="{{ route('backpanel.albums.medias.create', ['album' => $album, 'type' => 'video']) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i> Tambah Video</a>
              @endcan
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
@endsection