@extends('backpanel.layouts.template')

@section('page_title')
  Instansi Terkait
@endsection

@use('App\Models\SiteMenu')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Daftar Instansi Terkait</h5>
            <div class="card-header-elements ms-auto">
              <div class="btn-group">
                <a href="{{ route('backpanel.website_settings.backlinks.create') }}" class="btn btn-primary btn-sm">
                  <i class="ti ti-plus"></i> Tambah Instansi Terkait
                </a>
              </div>
            </div>
          </div>
          <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="table">
              <thead>
                <tr>
                  <th width="20">#</th>
                  <th>Index</th>
                  <th>Nama</th>
                  <th>URL</th>
                  <th width="100" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $row)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->index }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->url}}</td>
                    <td>
                      <form action="{{ route('backpanel.website_settings.backlinks.destroy', ['backlink' => $row]) }}"
                        method="POST">
                        @csrf @method('DELETE')
                        <div class="btn-group" role="group">
                          <a href="{{ route('backpanel.website_settings.backlinks.edit', ['backlink' => $row]) }}"
                            class="btn btn-sm btn-outline-secondary"><i class="ti ti-pencil"></i></a>
                          <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('apakah anda ingin menghapus data ini?')"><i
                              class="ti ti-trash"></i></button>
                        </div>
                      </form>
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
