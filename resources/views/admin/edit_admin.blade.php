@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Admin</h4>
                    {{-- <form class="forms-sample" form action="/student/{{ $student->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') --}}

                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama"
                                name="nama" value="">
                            @error('nama')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Password</label>
                            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Password"
                                value="" name="password">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="membershipRadios1" value="Superadmin">
                                            {{-- @if ($student['person']['status'] == 'Tervalidasi') checked @endif> --}}
                                        Superadmin
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="membershipRadios2" value="Admin">
                                            {{-- @if ($student['person']['status'] == 'Pending') checked @endif> --}}
                                        Admin
                                    </label>
                                </div>
                            </div>
                            @error('status')
                                <div class="text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" href="kelola_admin">Update</button>
                        <button class="btn btn-light" href="kelola_admin">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
