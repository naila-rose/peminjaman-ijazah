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
                                    <h3 class="card-title">Riwayat Peminjaman</h3>
                                    <button id="export" class="btn btn-primary"
                                        onclick="exportTableToCSV('riwayat-peminjaman.csv')"><i
                                            class="fas fa-file-export"></i></button>
                                    <div class="table-responsive">
                                        @if (Session::has('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                        <table id="table1" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Id Peminjam</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th>Fakultas</th>
                                                    <th>Program Studi</th>
                                                    <th>Tgl Pinjam</th>
                                                    <th>Tgl Kembali</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($student as $data)
                                                    <tr>
                                                        <td class="font-weight-bold">{{ $loop->iteration }}</td>
                                                        <td class="font-weight-bold">{{ $data->nim }}</td>
                                                        <td>{{ $data->nama }}</td>
                                                        <td>{{ $data->fakultas->fakultas }}</td>
                                                        <td>{{ $data->prodi->prodi }}</td>
                                                        <td>{{ $data->person->tgl_pinjam }}</td>
                                                        <td>{{ $data->person->tgl_kembali }}</td>
                                                        <td>
                                                            <a href="/student/{{ $data->id }}/edit" id="edit"
                                                                class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="/student/{{ $data->id }}" method="post"
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
