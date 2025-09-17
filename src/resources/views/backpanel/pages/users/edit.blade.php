@extends('backpanel.layouts.template')

@section('page_title')
  Edit Pengguna
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb" class="layout-navbar-user navbar-nav align-items-center ms-0 ms-md-3 me-3 me-xl-0">
    <ol class="breadcrumb breadcrumb-style1 mb-0">
      <li class="breadcrumb-item">
        <a href="{{ route('backpanel.users.index') }}">Pengguna</a>
      </li>
      <li class="breadcrumb-item active">Edit Pengguna</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <div class="col-md-8">
        <div class="card mb-6">
          <div class="card-header header-elements">
            <h5 class="mb-0 me-2">Edit Pengguna: {{ $user->name }}</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backpanel.users.update', ['user' => $user]) }}" method="POST">
              @csrf
              @method('PUT')
              
              <div class="mb-4">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $user->name) }}" 
                       placeholder="Masukan nama lengkap" required />
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mb-4">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', $user->email) }}" 
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
                    <option value="{{ $role->value }}" 
                            {{ old('role', $user->role) === $role->value ? 'selected' : '' }}>
                      {{ $role->label() }}
                    </option>
                  @endforeach
                </select>
                @error('role')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <hr class="my-4">
              
              <h6 class="mb-3">Ubah Password (Opsional)</h6>
              <div class="mb-4">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" />
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Kosongkan jika tidak ingin mengubah password. Minimal 8 karakter jika diisi.</small>
              </div>
              
              <div class="mb-4">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                       id="password_confirmation" name="password_confirmation" 
                       placeholder="Konfirmasi password baru" />
                @error('password_confirmation')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="d-flex justify-content-between">
                <a href="{{ route('backpanel.users.index') }}" class="btn btn-outline-secondary">
                  <i class="ti ti-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                  <i class="ti ti-check me-1"></i> Update
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header">
            <h6 class="mb-0">Informasi Pengguna</h6>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              {{-- <li class="mb-2">
                <strong>ID:</strong> {{ $user->id }}
              </li> --}}
              <li class="mb-2">
                <strong>Dibuat:</strong> {{ $user->created_at->format('d M Y H:i') }}
              </li>
              <li class="mb-2">
                <strong>Terakhir Update:</strong> {{ $user->updated_at->format('d M Y H:i') }}
              </li>
              {{-- @if($user->email_verified_at)
                <li class="mb-2">
                  <strong>Email Verified:</strong> 
                  <span class="badge bg-success">Terverifikasi</span>
                </li>
              @else
                <li class="mb-2">
                  <strong>Email Verified:</strong> 
                  <span class="badge bg-warning">Belum Verifikasi</span>
                </li>
              @endif --}}
            </ul>
          </div>
        </div>
        
        <div class="card">
          <div class="card-header">
            <h6 class="mb-0">Catatan</h6>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              <li class="mb-2">
                <i class="ti ti-info-circle text-primary me-2"></i>
                <small>Semua field dengan tanda <span class="text-danger">*</span> wajib diisi</small>
              </li>
              <li class="mb-2">
                <i class="ti ti-lock text-warning me-2"></i>
                <small>Password hanya diubah jika field password diisi</small>
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