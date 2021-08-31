@extends('demo::layouts.master')

@section('content')
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
            <img src="{{ asset('storage/images/demo/images/logo.jpg') }}" height="80" alt="...">
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

    <section class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{ asset('storage/images/demo/images/Silestone-Kitchen-Bianco-Calacatta.jpg') }}" height="400" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{ asset('storage/images/demo/images/346611173095321vi0.jpg') }}" class="d-block w-100" height="400" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{ asset('storage/images/demo/images/1000x438 SVS NEW.jpg') }}" class="d-block w-100" height="400" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/demo/images/homepage2.jpg') }}" class="d-block w-100" height="400" alt="...">
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
    </section>

    <section class="container-xl">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <div class="list-group-item">Danh mục sản phẩm</div>
                    <div class="list-group-item">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('detail.show', 'duhal') }}">Đèn duhai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('detail.show', 'nhuatienphong') }}">Nhựa tiên phong</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('detail.show', 'viglacera') }}">Viglacera</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('detail.show', 'grandhomestonevina') }}">Đá GrandHome</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-9">
                <section>
                    <div class="row">
                        <div class="col">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm nổi bật</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <img src="{{ asset('storage/images/demo/images/kem505-8401.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('product.show', 'den-led') }}">Card title</a></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="{{ route('product.show', 'den-led') }}" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <img src="{{ asset('storage/images/demo/images/keb2-7389.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <img src="{{ asset('storage/images/demo/images/Den-led-am-tran-de-day-chong-choi-300x300.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <img src="{{ asset('storage/images/demo/images/VGC SVS PRO.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <div class="col">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm nổi bật</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/200" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/200" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/200" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/200" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <footer class="container-xl">
    <div class="row">
        <div class="col-3">
            <p>Công ty TNHH .....</p>
            <p>Địa chỉ .....</p>
            <p>Website .....</p>
            <p>Điện thoại .....</p>
        </div>
        <div class="col-5">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
        </div>
        </div>
    </footer>
</section>
@endsection
