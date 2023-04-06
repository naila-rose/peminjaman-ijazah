<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Peminjaman Ijazah | Universitas Brawijaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="images/UB.png" />
    <style>
        .image {height: 300px; padding-left: 80px; margin-top: -50px}
        .btn-primary {background-color:#453e79}
        .btn-primary:hover {background-color: #161942}
        .next-step
            {padding: 15px;
            border-radius: 7px;
            cursor: pointer;}
    </style>
</head>

<body>
    <div class="wrapper">
        <form action="/master" method="post" id="wizard">
            @csrf
            <!-- SECTION 1 -->
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
                        <div class="form-holder">
                            <img src="images/submit.png" alt="" class="image">
                        </div>
                        <br>
                        <p>Peminjaman berhasil</p>
            <br>
            <div class="form-group">
                <button class="next-step btn btn-primary font-size-h6" type="submit">Kembali</button>
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
