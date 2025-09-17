@extends('backpanel.layouts.template')

@section('page_title')
  Detail {{ $news_type->name }}
@endsection

@use('App\Models\SiteMenu')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Headline Foto</h5>
          </div>
          <div class="card-body">
            @if ($news->featured_image_path)
              <img src="{{ $news->featured_image_path }}" alt="{{ $news->featured_image_description }}" class="img-fluid mb-3">
            @else
              <p class="text-muted">Tidak ada foto yang tersedia.</p>
            @endif
            <p class="text-muted">{{ $news->featured_image_description }}</p>
          </div>
          <div class="card-footer d-flex flex-row-reverse">
            @can('update', $news)
              <a href="{{ route('backpanel.news.edit_picture', ['news_type' => $news_type, 'news' => $news]) }}" class="btn btn-outline-secondary"><i class="fas fa-edit me-2"></i> Edit Foto</a>
            @endcan
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Detail Berita
              @if($news->published_at)
                <span class="badge ms-4 bg-label-success">Published: {{ $news->published_at->format('d M Y') }}</span>
              @else
                <span class="badge ms-4 bg-label-danger">Draft</span>
              @endif
            </h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">{{ $news->title }}</h6>
            <p class="card-text">{{ $news->excerpt }}</p>
          </div>
          <div class="card-footer d-flex flex-row-reverse">
            @can('update', $news)
              <a href="{{ route('backpanel.news.edit', ['news_type' => $news_type, 'news' => $news]) }}" class="btn btn-outline-secondary"><i class="fas fa-edit me-2"></i> Edit Berita</a>
            @endcan
            @can('publish', $news)
              <a href="{{ route('backpanel.news.publish', ['news_type' => $news_type, 'news' => $news]) }}" class="btn me-2 btn-outline-primary"><i class="fas fa-check me-2"></i> Publish Berita</a>
            @endcan
            @can('unpublish', $news)
              <a href="{{ route('backpanel.news.unpublish', ['news_type' => $news_type, 'news' => $news]) }}" class="btn me-2 btn-outline-danger" onclick="return confirm('apakah anda yakin ingin unpublish berita ini?');"><i class="fas fa-cancel me-2"></i> Unpublish Berita</a>
            @endcan
            <a href="{{ route('backpanel.news.edit', ['news_type' => $news_type, 'news' => $news]) }}" class="btn me-2 btn-outline-info"><i class="fas fa-eye me-2"></i> Lihat Berita</a>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Konten Berita</h5>
          </div>
          <div class="card-body">
            {!! $news->content !!}
          </div>
          <div class="card-footer d-flex flex-row-reverse">
            @can('update', $news)
              <a href="{{ route('backpanel.news.edit_content', ['news_type' => $news_type, 'news' => $news]) }}" class="btn btn-outline-secondary"><i class="fas fa-edit me-2"></i> Edit Konten</a>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection