@extends('backpanel.layouts.template')

@section('page_title')
  Ubah Konten
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
      <li class="breadcrumb-item active">Ubah Konten</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-12">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Ubah Konten</h5>
          </div>
          <div class="card-body">
            <form id="form" action="{{ route('backpanel.news.update_content', ['news_type' => $news_type, 'news' => $news]) }}" method="POST">
              @csrf @method('PUT')
              <div class="mb-4">
                <div id="content-editor">
                  {!! old('content', $news->content) !!}
                </div>
                <input type="hidden" class="form-control @error('content') is-invalid @enderror" id="content"
                  name="content" value="{{ old('content') }}" required />
                @error('content')
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

@push('css')
  <link rel="stylesheet" href="{{ asset('bp-assets/vendor/libs/quill/typography.css') }}" />
  <link rel="stylesheet" href="{{ asset('bp-assets/vendor/libs/quill/katex.css') }}" />
  <link rel="stylesheet" href="{{ asset('bp-assets/vendor/libs/quill/editor.css') }}" />
@endpush

@push('js')
  <script src="{{ asset('bp-assets/vendor/libs/quill/katex.js') }}"></script>
  <script src="{{ asset('bp-assets/vendor/libs/quill/quill.js') }}"></script>
@endpush

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#form').on('submit', function(e){
        e.preventDefault();
        var myEditor = document.querySelector('#content-editor')
        var html = myEditor.children[0].innerHTML

        $("#content").val(html);
        this.submit();
      });

      const fullToolbar = [
        [{
            font: []
          },
          {
            size: []
          }
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [{
            color: []
          },
          {
            background: []
          }
        ],
        [{
            script: 'super'
          },
          {
            script: 'sub'
          }
        ],
        [{
            header: '1'
          },
          {
            header: '2'
          },
          'blockquote',
          'code-block'
        ],
        [{
            list: 'ordered'
          },
          {
            list: 'bullet'
          },
          {
            indent: '-1'
          },
          {
            indent: '+1'
          }
        ],
        [{
          direction: 'rtl'
        }],
        ['link', 'image', 'video', 'formula'],
        ['clean']
      ];
      const fullEditor = new Quill('#content-editor', {
        bounds: '#content-editor',
        placeholder: 'Type Something...',
        modules: {
          formula: true,
          toolbar: fullToolbar
        },
        theme: 'snow'
      });
    })
  </script>
@endpush
