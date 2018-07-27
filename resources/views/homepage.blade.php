@extends('layouts.frontend-template')
@section('content')
    <!-- FULLPAGE -->
    <link href="{{ asset("public/frontend/lib/fullpage/css/jquery.fullpage.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- OWL CAROUSEL -->
    <link href="{{ asset("public/frontend/lib/owl-carousel/css/owl.carousel.min.css")}}" rel="stylesheet" type="text/css" />

    <div id="homepage" ng-controller="HomepageController">

        <div id="fullpage">
            <div class="section" id="slider">
                <div id="top-slider" class="carousel slide" data-ride="carousel">

                    <ul class="slide-control">
                        <li data-target="#top-slider" data-slide-to="0">
                            <div class="inner">
                                <div class="icon">
                                    <i class="fa fa-2x fa-plus" aria-hidden="false"></i>
                                </div>
                                <div class="title">
                                    <h4>the future of loft living</h4>
                                </div>
                            </div>
                        </li>
                        <li data-target="#top-slider" data-slide-to="1">
                            <div class="inner">
                                <div class="icon">
                                    <i class="fa fa-2x fa-plus" aria-hidden="false"></i>
                                </div>
                                <div class="title">
                                    <h4>the future of loft living</h4>
                                </div>
                            </div>
                        </li>
                        <li data-target="#top-slider" data-slide-to="1">
                            <div class="inner">
                                <div class="icon">
                                    <i class="fa fa-2x fa-plus" aria-hidden="false"></i>
                                </div>
                                <div class="title">
                                    <h4>the future of loft living</h4>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="mask">
                                <img src="{{ asset('public/frontend/img/demo-top-slider-1.jpg') }}" alt="slide">
                            </div>
                            <div class="carousel-caption">
                                <h1 class="heading light">
                                    the future of loft living
                                </h1>
                                <p class="paragraph light">
                                    Nunc odio magna, ultricies sed orci id, ullamcorper consequat arcu. Maecenas fermentum, nibh vitae ornare tempor, orci libero bibendum odio, eget ultrices magna diam ac nulla. Praesent facilisis ex in mi interdum euismod. Quisque volutpat augue volutpat ligula lacinia, et dapibus nibh porttitor. Sed pharetra quis purus eu tempor. Sed bibendum ligula in ullamcorper feugiat. Vestibulum in tortor vel augue eleifend porta eu pulvinar nisl. Nam ac arcu ex.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mask">
                                <img src="{{ asset('public/frontend/img/demo-top-slider-2.jpg') }}" alt="slide">
                            </div>
                            <div class="carousel-caption">
                                <h1 class="heading light">
                                    the future of loft living
                                </h1>
                                <p class="paragraph light">
                                    Nunc odio magna, ultricies sed orci id, ullamcorper consequat arcu. Maecenas fermentum, nibh vitae ornare tempor, orci libero bibendum odio, eget ultrices magna diam ac nulla. Praesent facilisis ex in mi interdum euismod. Quisque volutpat augue volutpat ligula lacinia, et dapibus nibh porttitor. Sed pharetra quis purus eu tempor. Sed bibendum ligula in ullamcorper feugiat. Vestibulum in tortor vel augue eleifend porta eu pulvinar nisl. Nam ac arcu ex.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="section" id="about">
                <div class="title-side">
                    <h1>About Us</h1>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="left col-sm-4 col-xs-12">
                            <div class="head">
                                <h1 class="heading">Về chúng tôi</h1>
                            </div>
                            <div class="body">
                                <p class="paragraph">Artelier 31 ra đời là sự kết tinh giữa Bedekor VN (TP HCM) và Công ty cổ phần Homecons (Hanoi).</p>
                                <ol>
                                    <li>
                                        <a href="{{ url('gioi-thieu#tong-quan') }}" target="_self">Tổng quan</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('gioi-thieu#tam-nhin-chien-luoc-su-menh') }}" target="_self">Tầm nhìn & Sứ mệnh</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('gioi-thieu#khach-hang-cua-chung-toi') }}" target="_self">Khách hàng của chúng tôi</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="foot">
                                <a href="{{ url('gioi-thieu') }}" class="btn btn-primary" role="button" target="_self">
                                    Khám phá ngay
                                </a>
                            </div>
                        </div>
                        <div class="right col-sm-8 hidden-xs">
                            <div class="mask wow fadeInUp" id="image-top">
                                <img src="{{ asset('public/frontend/img/demo-about-1.jpg') }}" alt="image about 1">
                            </div>
                            <div class="mask wow fadeInUp" id="image-bottom">
                                <img src="{{ asset('public/frontend/img/demo-about-2.jpg') }}" alt="image about 2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section" id="product">
                <div class="title-side visible-xs">
                    <h1>Sản phẩm</h1>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="left col-sm-6 col-xs-12 hidden-xs">
                            <div id="slider-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">

                                    <div class="item"  ng-class="{active : $index === 0}" ng-repeat="library in libraries">
                                        <div class="mask">
                                            <img src="{{ asset('storage/app/library') }}<% '/' + library.slug + '/' + library.image %>" alt="image about 1">
                                        </div>
                                        <div class="carousel-caption">
                                            <h4 class="sub-heading light">Product</h4>

                                            <h1 class="heading light"><% library.title %></h1>


                                            <a href="{{ url('/san-pham/chi-tiet') }}<% '/' + library.slug  %>" class="btn btn-default" role="button" target="_self" >View detail</a>
                                        </div>
                                    </div>

                                  

                                </div>

                            </div>
                        </div>
                        <div class="right col-sm-6 col-xs-12">
                            <ul class="slide-control">

                                <li data-target="#slider-product" data-slide-to="<% $index %>" ng-repeat="library in libraries">
                                    <div class="inner">
                                        <div class="icon">
                                            <i class="fa fa-plus fa-2x" aria-hidden="false"></i>
                                        </div>
                                        <div class="title">
                                            <h4><% library.title %></h4>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <i class="fa fa-plus fa-2x" aria-hidden="false"></i>
                                        </div>
                                        <div class="title">
                                            <h4>Sản phẩm khác</h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="section" id="trends" style="background-image: url('{{ asset('public/frontend/img/demo-trends.jpg') }}');">
                <div class="container">
                    <div class="heading hidden-xs">
                        <h1 class="heading light">Xu hướng</h1>
                    </div>

                    <div class="title-side visible-xs">
                        <h1>Xu hướng</h1>
                    </div>

                    <div class="row">

                        <div class="item col-sm-2 col-xs-4" ng-repeat="categoryTrend in categoryTrendForHomePage">
                            <div class="inner">

                                <a href="{{ url('xu-huong') }}<% '/' + categoryTrend.slug %>"  target="_self">

                                    <div class="icon">
                                        <i class="fa fa-plus fa-2x" aria-hidden="false"></i>
                                    </div>
                                    <div class="title">
                                        <h4><% categoryTrend.title %></h4>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="item col-sm-2 col-xs-4">
                            <div class="inner">

                                <a href="{{ url('xu-huong') }}" target="_self">

                                    <div class="icon">
                                        <i class="fa fa-plus fa-2x" aria-hidden="false"></i>
                                    </div>
                                    <div class="title">
                                        <h4>Xem thêm</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TEMPORARY DELETE -->
            <!--
            <div class="section" id="creative">
                <div class="title-side">
                    <h1>Creative</h1>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="left col-sm-8 col-xs-12 wow fadeInUp">
                            <div class="mask">
                                <img src="{{ asset ('public/frontend/img/creative-image.png') }}" alt="image creative section">
                            </div>
                        </div>

                        <div class="right col-sm-4 col-xs-12 wow fadeInRight">
                            <div class="head">
                                <h1 class="heading">Góc sáng tạo</h1>
                            </div>
                            <div class="body">
                                <p>Vivamus gravida arcu tortor, a auctor velit mattis non. Vivamus tristique faucibus pellentesque. Nulla at porta lorem. Aliquam elit diam, facilisis at elementum viverra, auctor a risus. Suspendisse nisi quam, mollis at turpis eu, dignissim condimentum massa. Donec vulputate ipsum eu velit vulputate, a viverra nibh sagittis. Sed quam est, semper laoreet viverra ut, facilisis vel nibh. In hac habitasse platea dictumst. Duis viverra arcu sit amet efficitur convallis. Nunc vestibulum faucibus erat, ut molestie lacus rhoncus ut. Ut mattis nisl nec metus placerat, ac consequat orci elementum. Nunc ut tortor auctor, molestie mauris vel, tristique erat.</p>
                            </div>
                            <div class="foot">
                                <a href="{{ url('') }}" class="btn btn-primary" role="button">
                                    Khám phá ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            -->

            <div class="section" id="news">
                <div class="title-side">
                    <h1>Tin tức</h1>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="left col-sm-4 hidden-xs wow fadeInLeft">
                            <div class="" id="cover">
                                <div class="mask">
                                    <img src="{{ asset('public/frontend/img/demo-news-1.jpg') }}" alt="image news cover">

                                    <h1 class="heading light">Tin tức</h1>
                                </div>
                            </div>

                            <a href="{{ url('tin-tuc') }}" class="btn btn-primary" role="button" target="_self">
                                Xem tất cả tin tức
                            </a>

                        </div>

                        <div class="right col-sm-8 col-xs-12">
                            <div class="row">

                                <data-owl-carousel class="owl-carousel" data-options="owlOptions">
                                    <div owl-carousel-item="" class="item wow fadeInUp" ng-repeat="item in blog">
                                        <div class="inner">
                                            <div class="mask">
                                                <img src="{{ asset('public/frontend/img/demo-news-2.jpg') }}" alt="image news">
                                            </div>

                                            <h2 class="post-heading dark"><% item.title %></h2>
                                            <p class="description hidden-xs"><% item.description %></p>
                                            <a href="{{ url('tin-tuc/chi-tiet') }}<% '/' + item.slug %>" class="btn btn-outline" role="button" target="_self">
                                                Xem chi tiết
                                            </a>
                                        </div>
                                    </div>
                                </data-owl-carousel>

                                <!--
                                <div class="item col-sm-6 col-xs-12 wow fadeInUp" ng-repeat="item in blog">
                                    <div class="inner">
                                        <div class="mask">
                                            <img src="{{ asset('public/frontend/img/demo-news-2.jpg') }}" alt="image news">
                                        </div>

                                        <h2 class="post-heading dark"><% item.title %></h2>
                                        <p class="description hidden-xs"><% item.description %></p>
                                        <a href="{{ url('tin-tuc/chi-tiet') }}<% '/' + item.slug %>" class="btn btn-outline" role="button" target="_self">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="section" id="contact">
                <div class="title-side">
                    <h1>Contact Us</h1>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="map col-xs-12" ng-bind-html="map">
                        </div>
                        <div class="left col-sm-4 hidden-xs">
                            <h2>Ghé thăm chúng tôi</h2>
                            <b>Trụ sở chính</b>
                            <p><% address %></p>

                            <h2>Liên lạc với chúng tôi ngay</h2>
                            <b>TEL</b>
                            <br>
                            <a href="tel:(+84) 024 6656 8899"><% phone %></a>
                            <br>
                            <b>Email</b>
                            <br>
                            <a href="mailto:contact@atelier31.vn"><% email %></a>
                        </div>

                        <div class="right col-sm-8 col-xs-12">
                            <h2>Gửi tin nhắn cho chúng tôi</h2>

                            <form>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputName" placeholder="Tên đầy đủ của bạn (*)">
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputEmail" placeholder="Email của bạn (*)">
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <textarea class="form-control" rows="3" placeholder="Viết một cái gì đó cho chúng tôi..."></textarea>
                                    </div>
                                    <div class="form-group col-sm-3 col-xs-6">
                                        <button class="btn btn-primary" type="submit">Gửi tin nhắn</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset ("public/frontend/lib/fullpage/js/jquery.fullpage.min.js") }}"></script>
    <script src="{{ asset ("public/frontend/lib/owl-carousel/js/owl.carousel.min.js") }}"></script>
    <script>
        $('#fullpage').fullpage({
            scrollBar: true
        });
    </script>

    <!-- Animate CSS -->
    <link href="{{ asset("public/frontend/lib/animate/animate.min.css")}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset ("public/frontend/lib/wow/wow.js") }}"></script>
    <script>
        new WOW().init();
    </script>

    <script src="{{ asset ("public/frontend/app/controllers/homepage.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/controllers/modal.js") }}"></script>


@endsection
