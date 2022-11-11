@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Peminjam</h4>
                    <form class="forms-sample" form action="students" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputNIM1">NIM</label>
                            <input type="text" class="form-control" id="exampleInputNIM1" placeholder="NIM"
                                value="{{ $student['nim'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama"
                                value="{{ $student['nama'] }}">
                        </div>
                        <div class="form-group">
                            <label>Fakultas</label>
                            <select class="js-example-basic-single w-100">
                                <option value="">{{ $student['fakultas']['fakultas'] }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <select class="js-example-basic-single w-100">
                                <option value="">{{ $student['prodi']['prodi'] }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Jenis Kelamin</label>
                            <select class="js-example-basic-single w-100" id="exampleSelectGender">
                                <option @if ($student['gender'] == 'L') selected @endif>
                                    Laki-laki
                                </option>
                                <option @if ($student['gender'] == 'P') selected @endif>
                                    Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Alamat"
                                value="{{ $student['alamat'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Peminjam</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Peminjam"
                                value="{{ $student['person']['nama_peminjam'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNomor2">Nomor Telepon Peminjam</label>
                            <input type="text" class="form-control" id="exampleInputNomor2"
                                placeholder="Nomor Telepon Peminjam" value="{{ $student['person']['no_telp'] }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control" value="{{ $student['person']['tgl_pinjam'] }}" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Kembali</label>
                            <input class="form-control" type="date" value="{{ $student['person']['tgl_kembali'] }}" />
                        </div>
                        <div class="form-group">
                            <label>Upload File</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" name="image" disabled
                                    placeholder="Upload File">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        {{-- <div class="my-3 d-flex">
                            <img src="{{ asset('storage/image/'.$student->image) }}" alt="" width="200px">
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios"
                                            id="membershipRadios1" value="Tervalidasi"
                                            @if ($student['person']['status'] == 'Tervalidasi') checked @endif>
                                        Tervalidasi
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios"
                                            id="membershipRadios2" value="Pending"
                                            @if ($student['person']['status'] == 'Pending') checked @endif>
                                        Pending
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios"
                                            id="membershipRadios2" value="Tidak Tervalidasi"
                                            @if ($student['person']['status'] == 'Tidak Tervalidasi') checked @endif>
                                        Tidak Tervalidasi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Keterangan</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4">{{ $student['person']['ket'] }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" href="student">Update</button>
                        <button class="btn btn-light" href="student">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
