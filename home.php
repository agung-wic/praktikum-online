<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<style>
    body {
        background-color: #e4e5e9;
        margin-bottom: 70px;
    }

    .kotak {
        background-color: #f6f6f6;
        padding: 15px;
        width: 90%;
        margin: auto;
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
        box-shadow: 4px 4px 5px 3px rgba(0, 0, 0, 0.2);
    }

    .carousel-item {
        height: 65vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #c2c2c2;">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Modul</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Keluar</a></li>
            </ul>
        </div>
        </div>
    </nav>

    <div class="kotak mt-5">
        <!-- Page Heading -->
        <h3 class="my-4">Selamat Datang di Praktikum Fisika Dasar</h3>

        <!-- Header Carousel -->
        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active"
                        style="background-image: url('https://source.unsplash.com/RCAhiGJsUUE/1920x1080')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="display-4">First Slide</h3>
                            <p class="lead">This is a description for the first slide.</p>
                        </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item"
                        style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1920x1080')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="display-4">Second Slide</h3>
                            <p class="lead">This is a description for the second slide.</p>
                        </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item"
                        style="background-image: url('https://source.unsplash.com/O7fzqFEfLlo/1920x1080')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="display-4">Third Slide</h3>
                            <p class="lead">This is a description for the third slide.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <section class="py-5">
            <div class="container">
                <h4 class="font-weight-light">Pengumuman</h4>
                <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus totam obcaecati
                    repudiandae reprehenderit consectetur eligendi adipisci eveniet ipsam minus harum, dolore sapiente
                    sint voluptas quaerat fugit nesciunt saepe, ab velit!</p>
            </div>
        </section>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>