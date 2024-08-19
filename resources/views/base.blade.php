<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tasty | Restaurant </title>
   {{-- import '/build/assets/app-CS5BuN65.css'
    import '/build/assets/app-DzM03xgu.css'
    import '/build/assets/app-Fshv-TM3.css'--}}
    <link rel="stylesheet" href="/build/assets/app-CS5BuN65.css">
    <link rel="stylesheet" href="/build/assets/app-DzM03xgu.css">
    <link rel="stylesheet" href="/build/assets/app-Fshv-TM3.css">
    <script src="/build/assets/app-1eloeq7T.js" type="module"></script>
</head>
<body class="">
<div class="">
    <div class="row align-items-center border-bottom border-1 margin-5">
        <div class="col-lg-6 col-sm-12">
            <i class="bi bi-clock"></i>
            <span>Mon - Fri: 8am - 11pm, Sat: 8am - 12pm </span>
        </div>
        <div class="col-lg-6 col-sm-12 d-flex gap-2 py-2 justify-content-end">
            <a href="/about-us" class="text-black text-decoration-none border-end border-2 pe-2">About us</a>
            <a href="/contact-us" class="text-black text-decoration-none border-end border-2 pe-2">Contact Us</a>
            <a href="/login" class="text-black text-decoration-none">Login\Register</a>
        </div>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid margin-5 gap-5 py-2">
            <div class="navbar-brand text-center d-flex flex-column">
                <span class="text-primary fs-1 font-kalam">Tasty</span>
                <span class="fs-4  font-kalam">Foods</span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNav" class="collapse navbar-collapse">
                <ul class="navbar-nav gap-5 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/menu">Menu</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/order">Order Food</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Blog</a>
                    </li>
                </ul>
                <div class="d-flex gap-3 align-items-center">
                    <a href="/cart" class="text-black bi bi-cart-plus fs-4"></a>
                    <button class="btn btn-primary rounded-5">Order Line</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- banner -->
    <div class="d-flex flex-column align-items-center bg-body-tertiary py-2">
        <h1 class="font-kalam fs-1">Foods</h1>
        <nav>
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>

    <main class="container-fluid">
        @yield('content')
    </main>

    <footer class="bg-body-tertiary mt-3">
        <div class="margin-5 pb-3 border-2 border-bottom row align-items-center">
            <div class="col-lg-3 navbar-brand text-center d-flex flex-column">
                <span class="text-primary fs-1 font-kalam">Tasty</span>
                <span class="fs-4  font-kalam">Foods</span>
            </div>
            <form class="col-lg-9 d-flex align-items-center justify-content-between gap-3">
                <div class="lh-">
                    <h2 class="fw-bold fst-italic fs-4 text-nowrap">Subscription news</h2>
                    <p class="text-muted fs-6 text-nowrap">Subscribe to weekly newsletter</p>
                </div>
                <input type="text" placeholder="Enter you email address" class="form-control rounded-5">
                <button type="submit" class="btn btn-dark rounded-5">Subscribe</button>
            </form>
        </div>
        <div class="row  py-3 px-5" >
            <div class="col-lg-3 col-sm-6 mb-3">
                <p class="text-muted mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias corporis deserunt distinctio dolor facere fugit id impedit inventore iste itaque modi molestias odio pariatur, quasi repellat suscipit totam unde.
                </p>
                <div class="lh-1 mb-3">
                    <h5 class="fw-bold font-kalam">Book A Table</h5>
                    <p class="text-primary fw-bold">+1-555-157-171</p>
                </div>
                <div class="lh-1">
                    <h5 class="fw-bold font-kalam">Opening Hours</h5>
                    <p class="text-primary fw-bold">8 AM - 12 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-3">
                <h4 class="fw-bold font-kalam mb-3">Quick Links</h4>
                <div class="d-flex flex-column gap-2">
                    <a href="/about-us" class="text-black text-decoration-none ms-3">About us</a>
                    <a href="/menu" class="text-black text-decoration-none ms-3">Menu</a>
                    <a href="/testimonial" class="text-black text-decoration-none ms-3">Testimonial</a>
                    <a href="/blog" class="text-black text-decoration-none ms-3">Blog</a>
                    <a href="/contact-us" class="text-black text-decoration-none ms-3">Contact us</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-3">
                <h4 class="fw-bold font-kalam mb-3">Our Menu</h4>
                <div class="d-flex flex-column gap-2">
                    <a href="#" class="text-black text-decoration-none ms-3">Burgers</a>
                    <a href="#" class="text-black text-decoration-none ms-3">Desserts</a>
                    <a href="#" class="text-black text-decoration-none ms-3">Pizza</a>
                    <a href="#" class="text-black text-decoration-none ms-3">Pasta</a>
                    <a href="#" class="text-black text-decoration-none ms-3">Cold Drinks</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-3">
                <h4 class="fw-bold font-kalam mb-3">Get In Touch</h4>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex gap-3">
                        <div class="p-2 rounded-circle d-flex align-items-center justify-content-center text-white bg-primary" style="width: 32px; height: 32px"><i class="bi bi-geo-alt"></i> </div>
                        <div>
                            <p class="text-muted">3847 Hummingbrid way <br> Quincy, MA 0219</p>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="p-2 rounded-circle d-flex align-items-center justify-content-center text-white bg-primary" style="width: 32px; height: 32px"><i class="bi bi-telephone-inbound"></i> </div>
                        <div>
                            <p class="text-muted">+1-555-157-171</p>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="p-2 rounded-circle d-flex align-items-center justify-content-center text-white bg-primary" style="width: 32px; height: 32px"><i class="bi bi-envelope"></i> </div>
                        <div>
                            <p class="text-muted">tastyfood@contact.cm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex margin-5 justify-content-between bg-white py-3 border-top border-1">
            <span class="text-muted fs-10">Copyright 2024 Tasty Foods. All rights Reserved</span>
            <span class="text-muted fs-10">Privacy Policy | Terms of use</span>
        </div>
    </footer>

</div>

@yield('scripts')
</body>
</html>
