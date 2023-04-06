@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Admin</h4>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputName1" placeholder="Nama"
                                value="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Password</label>
                            <input type="text" class="form-control" name="password" id="exampleInputCity1" placeholder="Password" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-2">
                                <div class="form-check" required>
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="membershipRadios1" value="Superadmin">
                                        Superadmin
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="membershipRadios2" value="Admin">
                                        Admin
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" href="kelola_admin">Submit</button>
                        <button class="btn btn-light" href="kelola_admin">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
