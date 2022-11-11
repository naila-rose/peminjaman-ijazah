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
    
	<body onload="configure();">

		<div class="wrapper">
            <form action="" id="wizard">

				<!-- SECTION 3 -->
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
							<p>Photo</p>
                            <div class="container">
                                <div id="my_camera"></div>
                                <div id="results" style="visibility: hidden; position: absolute;">

                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group">
                                        <button class="file-upload-browse btn btn-primary font-size-h6" type="button" onclick = "saveSnap();">Ambil Gambar</button>
                                    </div>
							    </div>
                            </div>

                            <script type="text/javascript" src="/js/webcam.min.js">
                            </script>
                            <script type="text/javascript">
                                function configure(){
                                    Webcam.set({
                                         width: 400,
                                         height: 300,
                                         image_format: 'jpeg',
                                         jpeg_quality: 90
                                    });
                                    Webcam.attach('#my_camera');
                                }

                                function saveSnap(){
                                    Webcam.snap(function(data_url){
                                        document.getElementById('results').innerHTML =
                                            '<img id = "webcam" src = "'+data_url+'">';
                                    });
                                    Webcam.reset();

                                    var base64image = document.getElementById("webcam").src;
                                    Webcam.upload(base64image, 'function', function(code,text){
                                        alert('Save Successfully')
                                        // document.location.href = "image.php"
                                    });
                                }
                            </script>
							<br>
							<div class="form-group">
								<button class="next-step btn btn-primary font-size-h6">Kirim</button>
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
