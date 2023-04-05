<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Peminjaman Ijazah | Universitas Brawijaya</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
		<link rel="shortcut icon" href="images/UB.png" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
	<body>
		<div class="wrapper">
            <form action="/third" method="POST" id="wizard">
				@csrf
				<!-- SECTION 2 -->
                <h2></h2>

                <section>
                    <div class="inner">
						<div class="image-holder">
							<img src="images/BRONE.png" alt="">
						</div>
						<div class="form-content">
							<div class="form-header">
								<h3>PEMINJAMAN IJAZAH</h3>
							</div>
							<p>Upload Data Peminjaman</p>
							<div class="form-row">
								<div class="form-holder w-100">
									<input type="text" placeholder="Nama" class="form-control" name="nama_peminjam">
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									<input type="text" placeholder="Nomor Telepon" class="form-control" name="no_telp">
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="hubungan" id="yang_bersangkutan" value="Yang Bersangkutan">
										<label class="form-check-label" for="yang_bersangkutan">
											Yang Bersangkutan
										</label>
									  </div>
								</div>
								<div class="col">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="hubungan" id="keluarga_teman" value="Anggota Keluarga/Teman">
										<label class="form-check-label" for="keluarga_teman">
										  Anggota Keluarga/Teman
										</label>
									  </div>
								</div>
							</div>
							{{-- <div class="form-row">
								<div class="select">
									<div class="form-holder">
										<div class="select-control">Hubungan</div>
										<i class="zmdi zmdi-caret-down"></i>
									</div>
									<ul class="dropdown">
										<li rel="Anggota Keluarga / Teman">Anggota Keluarga / Teman</li>
										<li rel="Yang bersangkutan">Yang bersangkutan</li>
									</ul>
								</div>
								<div class="form-holder"></div>
							</div> --}}
							<br>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="surat_kuasa" id="surat_kuasa">
								<label class="form-check-label" for="surat_kuasa">
								  Sudah melampirkan Surat Kuasa?
								</label>
							  </div>
							<br>
							<style>
								.btn-primary {background-color:#453e79}
								.btn-primary:hover {background-color: #161942}
								.next-step
									{padding: 15px;
									border-radius: 7px;
									cursor: pointer;}
							</style>
							<div class="form-group">
								<button type="submit" class="next-step btn btn-primary font-size-h6">Selanjutnya</button>
							</div>
						</div>
					</div>
                </section>
            </form>
		</div>

		<!-- JQUERY -->
		<script src="js/jquery-3.3.1.min.js"></script>

		<!-- JQUERY STEP -->
		<script src="js/jquery.steps.js"></script>
        <script src="js/main.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>
