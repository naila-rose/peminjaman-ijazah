@extends('layouts.main')
@section('content')
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Dashboard</h3>
                  <h4 class="font-weight-normal mb-0">Selamat datang kembali</h4>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <h5><span id="tanggalwaktu"></span></h5>
                    <script>
                      var tw = new Date();
                      if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
                      else (a=tw.getTime());
                      tw.setTime(a);
                      var tahun= tw.getFullYear ();
                      var hari= tw.getDay ();
                      var bulan= tw.getMonth ();
                      var tanggal= tw.getDate ();
                      var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
                      var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                      document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
                    </script>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card card-white">
                <div class="card-people mt-0">
                  <img src="images/dashboard/photo.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div id="main">
                        <main>
                          <div class="temp">
                            <div class="label">
                              <sup id="marker"></sup>
                              <h1 id="name" class="font-weight-bold"></h1>
                              <sub id="country"></sub>
                            </div>

                            <h1 id="temp"></h1>
                            <span id="description"
                                  ><i class="fas fa-cloud"></i> <span id="desc"></span
                            ></span>
                          </div>
                        </main>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Jumlah Peminjam</p>
                      <h1>250</h1>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Jumlah Tervalidasi</p>
                      <h1>180</h1>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Jumlah Belum Tervalidasi</p>
                      <h1>100</h1>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Jumlah Gagal Validasi</p>
                      <h1>40</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Daftar Peminjam</p>
                  <button id="export" class="btn btn-primary" onclick="exportTableToCSV('peminjaman-ijazah.csv')"><i class="fas fa-file-export"></i></button>
                  <button id="plus" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                  <div class="table-responsive">
                    <table id="table1" class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Id Peminjam</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Fakultas</th>
                          <th>Program Studi</th>
                          <th>Status</th>
                          <th>Tgl Pinjam</th>
                          <th>Tgl Kembali</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="font-weight-bold">3</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Andin</td>
                          <td>Matematika dan Ilmu Alam</td>
                          <td>Kimia</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                          <td>09/20/2022</td>
                          <td>09/30/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">4</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Pandu</td>
                          <td>Kedokteran</td>
                          <td>Kedokteran Gigi</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                          <td>09/20/2022</td>
                          <td>09/30/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">5</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Putri</td>
                          <td>Pertanian</td>
                          <td>Agroteknologi</td>
                          <td class="font-weight-medium"><div class="badge badge-danger">Tidak Tervalidasi</div></td>
                          <td>09/20/2022</td>
                          <td>09/30/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">6</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Aji</td>
                          <td>Ilmu Komputer</td>
                          <td>Teknik Informatika</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                          <td>09/10/2022</td>
                          <td>09/21/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">8</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Adit</td>
                          <td>Perikanan dan Ilmu Kelautan</td>
                          <td>Ilmu Kelautan</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                          <td>10/10/2022</td>
                          <td>10/20/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">10</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Emil</td>
                          <td>Teknologi Pertanian</td>
                          <td>Teknologi Pertanian</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                          <td>10/05/2022</td>
                          <td>10/10/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">13</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Caroline</td>
                          <td>Hukum</td>
                          <td>Ilmu Hukum</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                          <td>10/12/2022</td>
                          <td>10/20/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">14</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Basuki</td>
                          <td>Ekonomi Bisnis</td>
                          <td>Akutansi</td>
                          <td class="font-weight-medium"><div class="badge badge-danger">Tidak Tervalidasi</div></td>
                          <td>10/05/2022</td>
                          <td>10/10/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">16</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Angelo</td>
                          <td>Kedokteran</td>
                          <td>Kedokteran</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                          <td>10/16/2022</td>
                          <td>10/25/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">17</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Tata</td>
                          <td>Pertanian</td>
                          <td>Manajemen Sumberdaya Pertanian</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                          <td>10/20/2022</td>
                          <td>10/27/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">18</td>
                          <td class="font-weight-bold">203140914111054</td>
                          <td>Siti</td>
                          <td>Matematika dan Ilmu Alam</td>
                          <td>Fisika</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                          <td>10/20/2022</td>
                          <td>10/26/2022</td>
                          <td>
                            <button id="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            <button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
