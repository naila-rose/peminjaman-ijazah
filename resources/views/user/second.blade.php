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
	</head>
	<body>
		<div class="wrapper">
            <form action="" id="wizard">

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
									<input type="text" placeholder="Nama" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									<input type="text" placeholder="Nomor Telepon" class="form-control">
								</div>
							</div>
							<div class="form-row">
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
							</div>
							<div class="checkbox-circle mt-24">
								<label>
									<input type="checkbox" ><a href="#">Sudah melampirkan surat kuasa?</a>
									<span class="checkmark"></span>
								</label>
							</div>
							<br>
							<div class="form-group">
								<a class="next-step btn btn-primary font-size-h6" href="tri">Selanjutnya</a>
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
		<!-- Template created and distributed by Colorlib -->
</body>
</html>
