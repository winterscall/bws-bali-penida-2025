@extends('backpanel.layouts.template')

@section('page_title')
  Tambah Pengguna
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.users.index') }}">Pengguna</a>
      </li>
      <li class="breadcrumb-item active">Tambah Pengguna</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-8">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Tambah Pengguna</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.users.store') }}" method="POST">
              @csrf
              
              <div class="mb-4">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name') }}" 
                       placeholder="Masukan nama lengkap" required />
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mb-4">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email') }}" 
                       placeholder="user@example.com" required />
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mb-4">
                <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                <select class="form-select @error('role') is-invalid @enderror" 
                        id="role" name="role" required>
                  <option value="">Pilih Role</option>
                  @foreach(\App\Enums\RolesEnum::cases() as $role)
                    <option value="{{ $role->value }}" {{ old('role') === $role->value ? 'selected' : '' }}>
                      {{ $role->label() }}
                    </option>
                  @endforeach
                </select>
                @error('role')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mb-4">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       id="password" name="password" placeholder="Masukan password" required />
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Password minimal 8 karakter</small>
              </div>
              
              <div class="mb-4">
                <label for="password_confirmation" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                       id="password_confirmation" name="password_confirmation" 
                       placeholder="Konfirmasi password" required />
                @error('password_confirmation')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="d-flex justify-content-between">
                <a href="{{ route('backpanel.users.index') }}" class="btn btn-outline-secondary">
                  <i class="ti ti-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                  <i class="ti ti-check me-1"></i> Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h6 class="mb-0">Informasi</h6>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              <li class="mb-2">
                <i class="ti ti-info-circle text-primary me-2"></i>
                <small>Semua field dengan tanda <span class="text-danger">*</span> wajib diisi</small>
              </li>
              <li class="mb-2">
                <i class="ti ti-lock text-warning me-2"></i>
                <small>Password minimal 8 karakter</small>
              </li>
              <li class="mb-2">
                <i class="ti ti-mail text-info me-2"></i>
                <small>Email harus unik dan valid</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection