<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
        <!-- Styles -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <style>
            .container-xl {
                max-width: 1200px;
            }
        </style>
    </head>
<body>
    <section class="container-fluid">
        <header class="container-xl">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 d-flex align-items-center">
                    Công ty TNHH ....
                </div>
                <div class="col d-flex align-items-center">
                    <div class="box-info d-flex justify-content-between w-100">
                        <div class="box-image"><i class="bi bi-clock"></i></div>
                        <div class="box-text">Giờ mở cửa</div>
                    </div>
                </div>
                <div class="col d-flex align-items-center">
                    <div class="box-info d-flex justify-content-between w-100">
                        <div class="box-image"><i class="bi bi-clock"></i></div>
                        <div class="box-text">Hotline</div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand sr-only" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img src="{{ asset('images/logo.jpg') }}" height="80" alt="...">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sản phẩm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('detail.show', 'duhal') }}">Đèn duhai</a>
                        <a class="dropdown-item" href="{{ route('detail.show', 'nhuatienphong') }}">Nhựa tiên phong</a>
                        <a class="dropdown-item" href="{{ route('detail.show', 'viglacera') }}">Viglacera</a>
                        <a class="dropdown-item" href="{{ route('detail.show', 'grandhomestonevina') }}">Đá GrandHome</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Du an</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bảo hành</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </nav>
        </header>

        <section class="container-xl">
            <div class="d-flex justify-content-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Đèn duhai</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đèn led</li>
                    </ol>
                </nav>
            </div>
        </section>

        <section class="container-xl">
            <div class="row">
                <div class="col-5">
                    <img src="{{ asset('images/kem505-8401.jpg') }}" class="img-thumbnail" />
                </div>
                <div class="col-7">
                    <section class="row">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Bóng Led Bulb</h3>
                                <div class="row">
                                    <div class="col">
                                        <p>Công suất:</p>	
                                        <p>Điện áp hoạt động:</p>	
                                        <p>Nhiệt độ màu:</p>	
                                        <p>Quang thông:</p>	
                                    </div>
                                    <div class="col">
                                        <p>9W</p>
                                        <p>220V/50-60Hz</p>
                                        <p>(3000 - 6500) + RGB</p>
                                        <p>810 lm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <section class="row">
                <ul class="nav nav-tabs nav-pills nav-fill w-100" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>Placeholder content for the tab panel. This one relates to the home tab. Takes you miles high, so high, 'cause she’s got that one international smile. There's a stranger in my bed, there's a pounding in my head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of anything. Suiting up for my crowning battle. Used to steal your parents' liquor and climb to the roof. Tone, tan fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess that I forgot I had a choice.</p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <p>Placeholder content for the tab panel. This one relates to the profile tab. You got the finest architecture. Passport stamps, she's cosmopolitan. Fine, fresh, fierce, we got it on lock. Never planned that one day I'd be losing you. She eats your heart out. Your kiss is cosmic, every move is magic. I mean the ones, I mean like she's the one. Greetings loved ones let's take a journey. Just own the night like the 4th of July! But you'd rather get wasted.</p>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <p>Placeholder content for the tab panel. This one relates to the contact tab. Her love is like a drug. All my girls vintage Chanel baby. Got a motel and built a fort out of sheets. 'Cause she's the muse and the artist. (This is how we do) So you wanna play with magic. So just be sure before you give it all to me. I'm walking, I'm walking on air (tonight). Skip the talk, heard it all, time to walk the walk. Catch her if you can. Stinging like a bee I earned my stripes.</p>
                    </div>
                </div>
            </section>
        </section>

        <footer class="container-xl" style="height: 80px;">
            <div class="d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-link active" href="/">Trang chủ</a>
                    <a class="nav-link" href="#">Tin tức</a>
                    <a class="nav-link" href="#">Liên hệ</a>
                    </div>
                </div>
            </nav>
            </div>
            
        </footer>
    </section>
        
    </body>
</html>
