@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Daftar Admin</h3>
                                    <a href="/admin/create" id="plus" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <div class="table-responsive">
                                        @if (Session::has('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                        <table id="table1" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employees as $employee)
                                                    <tr>
                                                        <td class="font-weight-bold">{{ $loop->iteration }}</td>
                                                        <td class="font-weight-bold">{{ $employee->nama_pegawai }}</td>
                                                        <td>
                                                            <a href="/admin/{{ $employee->id }}/edit" id="edit"
                                                                class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="/admin/{{ $employee->id }}" method="post"
                                                                class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger" id="hapus"
                                                                    onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                                                                    <i class="fas fa-trash"></i></button>
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
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
