<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            {!! $topHeader->text !!}
        </div>

        <div class="social-links d-none d-md-flex">
            {!! $headerSocial->text !!}
        </div>
    </div>
</section>

<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1><a href="/"><img src="{{ asset("storage/images/$webLogo") }}" /></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
        {!! $menus !!}
        </nav><!-- .navbar -->
        </div>
</header>
