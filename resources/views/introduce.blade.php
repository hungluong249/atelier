@extends('layouts.frontend-template')
@section('content')

    <style>
        header.header{
            position: static;
        }

        footer.footer{
            display: block !important;
        }
    </style>

    <section id="about" ng-controller="IntroduceController">
        <section class="cover">
            <div class="mask">
                <img src="https://images.unsplash.com/photo-1532275131641-b10b20ba84af?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=cc74bf344f9b65c3e30b2c86f7368139&auto=format&fit=crop&w=1350&q=80" alt="about cover">

                <div class="overlay"></div>
                <div class="container">
                    <h1 class="heading light">
                        Về chúng tôi
                    </h1>
                </div>
            </div>
        </section>

        <section class="section-header">
            <div class="container-fluid">
                <div class="container header">

                </div>
                <div class="introduce">
                    <div class="container">
                        <div class="row">
                            <div class="left col-sm-6 col-xs-12">
                                <h4 class="sub-heading">
                                    Đội ngũ sáng lập Aterlier 31 là những Kiến trúc sư, Kỹ sư, Giám đốc quản lý dự án và Chuyên gia Giám sát thi công với nhiều năm kinh nghiệm và luôn tràn đầy nhiệt huyết, sáng tạo. Với chúng tôi, Hoàn thành và Hoàn hảo luôn là hai khái niệm gắn liền.
                                </h4>
                            </div>

                            <div class="right col-sm-6 col-xs-12">
                                <p class="paragraph">Là sự kết hợp vững chãi của đơn vị sản xuất sản phẩm décor nội thất và trang bị showroom chất lượng uy tín bậc nhất tại TP HCM và đơn vị thi công hoàn thiện với các chuẩn mực khắt khe bậc nhất Hà thành Homecons, Aterlier 31 là lựa chọn của rất nhiều chủ đầu tư là tổ chức lớn và cá nhân, với các công trình điển hình nằm tại các dự án sang trọng bậc nhất hai miền như Vinhomes Golden River BaSon, Vinhomes Central Park, Khu biệt thự Thảo Điền, Vinhomes Riversides Sài Đồng, Vinhomes The Harmony, Vinhomes Green Bay, Penstudio Tây Hồ, T&T Riverview...các trung tâm thương mại lớn lớn như Vincom, Lotte, Takashimaya...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-body">
            <div class="container">
                <div class="row">
                    <div class="left col-md-8 col-xs-12" id="about-content">
                        <div class="wrapper" id="<% introduce.slug %>" ng-repeat="introduce in introduces">
                            <div class="head">
                                <h2 class="post-heading dark bigger">
                                    <% introduce.title %>
                                </h2>
                            </div>
                            <div class="body">
                                <article>
                                    <img ng-src="{{ asset('storage/app') }}<% '/' + introduce.image %>" alt="about cover">

                                    <p ng-bind-html="$sce.trustAsHtml(introduce.content)"></p>
                                </article>
                            </div>
                        </div>
                    </div>

                    <div class="right col-md-4 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Về chúng tôi
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item"  ng-repeat="introduce in introduces">
                                    <a href="#<% introduce.slug %>">
                                        <% introduce.title %>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script src="{{ asset ("public/frontend/app/controllers/introduce.js") }}"></script>
    <script>
        $(window).scroll(function(){


            var windowWidth = $(window).width();

            if(windowWidth > 992){
                if($(window).scrollTop() > 130){
                    $('.section-body .right').addClass('active')
                }
                if($(window).scrollTop() < 130){
                    $('.section-body .right').removeClass('active')
                }
            }
        })
    </script>
@endsection