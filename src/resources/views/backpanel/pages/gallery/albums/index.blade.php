@extends('backpanel.layouts.template')

@section('page_title')
  Album
@endsection

@use('App\Models\SiteMenu')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Daftar Album</h5>
            <div class="card-header-elements ms-auto">
              <div class="btn-group">
                @can('create', App\Models\Gallery\GalleryAlbum::class)
                  <a href="{{ route('backpanel.albums.create') }}" class="btn btn-primary btn-sm">
                  <i class="ti ti-plus"></i> Tambah Album
                </a>
                @endcan
              </div>
            </div>
          </div>
          <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="table">
              <thead>
                <tr>
                  <th width="20">#</th>
                  <th>Nama</th>
                  <th>Tgl Publish</th>
                  <th width="20" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $row)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->published_at?->format('d/m/Y') ?? '-' }}</td>
                    <td>
                      <div class="btn-group" role="group">
                        @can('view', $row)
                        <a href="{{ route('backpanel.albums.show', ['album' => $row]) }}"
                          class="btn btn-sm btn-outline-secondary"><i class="ti ti-eye"></i></a>
                        @endcan
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('bp-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
  <link rel="stylesheet"
    href="{{ asset('bp-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
@endpush

@push('js')
  <script src="{{ asset('bp-assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endpush

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#table').DataTable({
        language: {
          emptyTable: "Tidak ada data",
          zeroRecords: "Data tidak ditemukan"
        }
      });
    });
  </script>
@endpush
