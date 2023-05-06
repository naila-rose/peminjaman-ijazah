@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Peminjam</h4>
                    <form class="forms-sample" form action="/student/{{ $student->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="exampleInputNIM1">NIM</label>
                            <input type="text" class="form-control" id="exampleInputNIM1" placeholder="NIM"
                                value="{{ $student['nim'] }}" name="nim" disabled>
                            @error('nim')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama"
                                name="nama" value="{{ $student['nama'] }}">
                            @error('nama')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Fakultas</label>
                            <select class="js-example-basic-single w-100" name="id_fakultas">
                                <option value="{{ $student['fakultas']['id'] }}">{{ $student['fakultas']['fakultas'] }}
                                </option>
                            </select>
                            @error('id_fakultas')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <select class="js-example-basic-single w-100" name="id_prodi">
                                <option value="{{ $student['prodi']['id'] }}">{{ $student['prodi']['prodi'] }}</option>
                            </select>
                            @error('id_prodi')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Jenis Kelamin</label>
                            <select class="js-example-basic-single w-100" id="exampleSelectGender" name="gender">
                                <option @if ($student['gender'] == 'L') selected value="{{ $student['gender'] }}" @endif>
                                    L
                                </option>
                                <option @if ($student['gender'] == 'P') value="{{ $student['gender'] }}" selected @endif>
                                    P
                                </option>
                            </select>
                            @error('gender')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Alamat"
                                value="{{ $student['alamat'] }}" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="no_ijazah">Nomor Ijazah</label>
                            <input type="number" class="form-control" name="no_ijazah" id="no_ijazah" min="000000000000000"
                                placeholder="Nomor Ijazah" required value="{{ $student['no_ijazah'] }}">
                            @error('no_ijazah')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Peminjam</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Peminjam"
                                value="{{ $student['person']['nama_peminjam'] }}" name="nama_peminjam">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNomor2">Nomor Telepon Peminjam</label>
                            <input type="text" class="form-control" id="exampleInputNomor2"
                                placeholder="Nomor Telepon Peminjam" value="{{ $student['person']['no_telp'] }}"
                                name="no_telp">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control" name="tgl_pinjam"
                                value="{{ $student['person']['tgl_pinjam'] }}" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Kembali</label>
                            <input class="form-control" type="date" name="tgl_kembali"
                                value="{{ $student['person']['tgl_kembali'] }}" />
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-center">
                                <img src="{{ Storage::url('public/uploads/images/' . $student->person->image) }}"
                                    style="max-height: 500px">
                            </div>
                            <label for="image">Upload Gambar Mahasiswa</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" name="image" disabled
                                    placeholder="Upload File">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @error('image')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Upload File <span class="text-danger">*Jika diperlukan</span></label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" name="file" disabled
                                    placeholder="Upload File" value="{{ $student->person->file }}">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @error('file')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Tipe Pengambilan</label>
                            <div class="form-group">
                                {{-- @php dd($student->person->type);
                                @endphp --}}
                                <select class="form-control" name="type">
                                    <option value="">Pilih Salah Satu</option>
                                    <option value="pinjam"
                                        @if ($student->person->type  == 'pinjam' || old('type') == 'pinjam') selected @endif>
                                            Pinjam
                                    </option>
                                    <option value="ambil"
                                        @if ($student->person->type  == 'ambil' || old('type') == 'ambil') selected @endif>
                                            Ambil
                                    </option>
                                </select>
                                @error('type')
                                    <span class="text-danger">*{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="membershipRadios1" value="Tervalidasi"
                                            @if ($student['person']['status'] == 'Tervalidasi') checked @endif>
                                        Tervalidasi
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="membershipRadios2" value="Pending"
                                            @if ($student['person']['status'] == 'Pending') checked @endif>
                                        Pending
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="membershipRadios2" value="Tidak Tervalidasi"
                                            @if ($student['person']['status'] == 'Tidak Tervalidasi') checked @endif>
                                        Tidak Tervalidasi
                                    </label>
                                </div>
                            </div>
                            @error('status')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Keterangan</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="ket">{{ $student['person']['ket'] }}</textarea>
                            @error('ket')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" href="student">Update</button>
                        <a href="/student">
                            <button type="button" class="btn btn-light">Cancel</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
