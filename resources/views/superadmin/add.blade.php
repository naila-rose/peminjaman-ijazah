@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Admin</h4>
                    <form class="forms-sample" action="/admin" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama_pegawai" id="nama"
                                placeholder="Nama Pegawai" value="{{ old('nama_pegawai') ?? '' }}" required>
                            @error('nama_pegawai')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="text" class="form-control" name="password" id="pass"
                                placeholder="Nama Pegawai" value="{{ old('password') ?? '' }}" required>
                            @error('password')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="/admin">
                            <button type="button" class="btn btn-light">Cancel</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
