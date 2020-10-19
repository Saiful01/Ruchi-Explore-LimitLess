<style>
    .carousel-item {
        height: 100vh;
        min-height: 300px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .carousel-caption {
        bottom: 270px;
    }

    .carousel-caption h5 {
        font-size: 45px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-top: 25px;
    }

    .carousel-caption p {
        width: 75%;
        margin: auto;
        font-size: 18px;
        line-height: 1.9;
    }

    .navbar-light .navbar-brand {
        color: #fff;
        font-size: 25px;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 2px;
    }

    .navbar-light .navbar-nav .active > .nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show > .nav-link {
        color: #fff;
    }

    .navbar-light .navbar-nav .nav-link {
        color: #fff;
    }

    .navbar-toggler {
        background: #fff;
    }

    .navbar-nav {
        text-align: center;
    }

    .nav-link {
        padding: .2rem 1rem;
    }

    .nav-link.active,.nav-link:focus{
        color: #fff;
    }

    .navbar-toggler {
        padding: 1px 5px;
        font-size: 18px;
        line-height: 0.3;
    }

    .navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
        color: #fff;
    }


</style>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="/template/img/slides/slide_home_1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    Slider One Item</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/template/img/slides/slide_home_2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    Slider One Item</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/template/img/slides/slide_home_3.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    Slider One Item</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
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
