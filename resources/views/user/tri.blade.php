<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Peminjaman & Pengambilan Ijazah | Universitas Brawijaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="images/UB.png" />

    {{-- asset webcam --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results {
            padding: 20px;
            border: 1px solid;
            background: #ccc;
        }

        .btn-primary {
            background-color: #453e79
        }

        .btn-primary:hover {
            background-color: #161942
        }

        .next-step {
            padding: 15px;
            border-radius: 7px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- SECTION 3 -->
        <form method="POST" action="{{ route('webcam.capture') }}" id="wizard">
            @csrf

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

                            @error('image')
                                <div class="alert alert-danger font-weight-bold" role="alert">{{ $message }}</div>
                            @enderror

                            <div class="row">
                                <div class="col-md-6">
                                    <div id="my_camera"></div>
                                    <br />
                                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                    <input type="hidden" name="image" class="image-tag">
                                </div>
                                <div class="col-md-6">
                                    <div id="results">Your captured image will appear here...</div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <br />
                                    <button class="next-step btn btn-primary font-size-h6">Submit</button>
                                </div>
                            </div>

                        </div>

                        <script language="JavaScript">
                            Webcam.set({
                                width: 300,
                                height: 200,
                                image_format: 'jpeg',
                                jpeg_quality: 90
                            });

                            Webcam.attach('#my_camera');

                            function take_snapshot() {
                                Webcam.snap(function(data_uri) {
                                    $(".image-tag").val(data_uri);
                                    document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                                });
                            }
                        </script>
                        <br>
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
    <script>
        $(function() {
            var el = document.getElementsByClassName('{1}')[0];
            el.style.display = "none";
        });
    </script>
    <!-- Template created and distributed by Colorlib -->
</body>
</html>
