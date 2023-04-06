@extends('layouts.main')
@section('content')

    <!-- Modal Delete -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                {{-- <div class="modal-body">
                    Yakin akan dihapus ?
                    <form action="/student-destroy/{{ $student->id_peminjam }}" method="post" id="delete_form"/>
                    @csrf
                    @method('delete')
                    <input type="hidden" name="delete_id" id="delete_id_p" />
                </div> --}}
                <div class="modal-footer">
                    <input type="submit" name="delete" id="delete" value="Delete" class="btn btn-danger" />
                    </form>
                    <button type="button" href="/kelola_admin" data-dismiss="modal" class="btn">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete Sukses -->
    <div class="modal fade" id="sukses_hapus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Data telah dihapus
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn">Tutup</button>
                </div>
            </div>
        </div>
    </div>
  @endsection
