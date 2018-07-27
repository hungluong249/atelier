<header class="header container-fluid dark">
    <div class="left col-sm-2 col-xs-2">
        <a href="{{ url('') }}" target="_self">
            <div class="logo"></div>
        </a>
    </div>

    <div class="center col-sm-8 col-xs-10">
        <a href="" class="btn-nav-expand" role="button" id="btn-nav-expand">
            <span class="nav-icon"></span>
        </a>
        <nav class="nav-main" id="nav-main">
            <ul>
                <li>
                    <a href="{{ url('gioi-thieu') }}" target="_self">
                        Về chúng tôi
                    </a>
                </li>
                <li>
                    <a href="{{ url('san-pham') }}" target="_self">
                        Sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{{ url('xu-huong') }}" target="_self">
                        Xu hướng
                    </a>
                </li>
                <!--
                <li>
                    <a href="{{ url('') }}" target="_self">
                        Góc sáng tạo
                    </a>
                </li>
                -->
                <li>
                    <a href="{{ url('tin-tuc') }}" target="_self">
                        Tin tức
                    </a>
                </li>
                <li>
                    <a class="outline" href="{{ url('') }}" target="_self">
                        Liên hệ
                    </a>
                </li>
                <li class="hidden-xs">
                    <div class="line"></div>
                </li>
                <li class="hidden-xs">
                    Hotline: <a href="tel:(+84) 024 6656 8899"><b>(+84) 024 6656 8899</b></a>
                </li>
            </ul>

            <ul class="visible-xs">
                <li>
                    <a href="{{ url('') }}" target="_self">
                        <i class="fa fa-search" aria-hidden="false"></i> Tìm kiếm
                    </a>
                </li>
                <!--
                <li>
                    <a href="{{ url('') }}" target="_self">
                        <i class="fa fa-user" aria-hidden="false"></i> Đăng nhập
                    </a>
                </li>
                <li>
                    <a href="{{ url('') }}" target="_self">
                        <i class="fa fa-shopping-cart" aria-hidden="false"></i> Giỏ hàng
                    </a>
                </li>
                -->
            </ul>

            <ul class="visible-xs">
                <li>
                    <a href="http://facebook.com" target="_blank">
                        <i class="fa fa-facebook-f" aria-hidden="false"></i> Facebook
                    </a>
                </li>
                <li>
                    <a href="http://pinterest.com" target="_blank">
                        <i class="fa fa-pinterest-p" aria-hidden="false"></i> Pinterest
                    </a>
                </li>
            </ul>

            <div class="info hidden">

                <b>Trụ sở chính</b>
                <p>31 Ngõ Giếng, Đông Các, Ô Chợ Dừa, Đống Đa, HN</p>

                <b>TEL</b>
                <p><a href="tel:(+84) 024 6656 8899">(+84) 024 6656 8899</a></p>

                <b>Email</b>
                <p><a href="mailto:contact@atelier31.vn">contact@atelier31.vn</a></p>
            </div>

        </nav>
    </div>

    <div class="right col-sm-2 hidden-xs">
        <nav class="nav-user">
            <ul>
                <li>
                    <a href="javascript:void(0);" target="_self" id="searchButton" ng-click="showSearch()">
                        <i class="fa fa-search" aria-hidden="false"></i> Tìm kiếm
                    </a>
                </li>
                <!--
                <li>
                    <a href="{{ url('') }}" target="_self">
                        <i class="fa fa-user" aria-hidden="false"></i> Đăng nhập
                    </a>
                </li>
                <li>
                    <a href="{{ url('') }}" target="_self">
                        <i class="fa fa-shopping-cart" aria-hidden="false"></i> Giỏ hàng
                    </a>
                </li>
                -->
            </ul>
        </nav>
    </div>
</header>

<div class="nav-side dark hidden-xs">
    <ul>
        <li>
            Theo dõi chúng tôi tại
        </li>
        <li>
            <div class="line"></div>
        </li>
        <li class="re-rotate">
            <a href="http://facebook.com" target="_blank">
                <i class="fa fa-2x fa-facebook-f" aria-hidden="false"></i>
            </a>
        </li>
        <li class="re-rotate">
            <a href="http://pinterest.com" target="_blank">
                <i class="fa fa-2x fa-pinterest-p" aria-hidden="false"></i>
            </a>
        </li>
    </ul>
</div>

<section class="search-section" id="search-section" ng-show="isVisible">
    <div class="container">
        <div class="row">
            <div class="col-xs-10" id="search-input">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Bạn đang tìm kiếm gì...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm!
                        </button>
                    </span>
                </div><!-- /input-group -->
            </div>
            <div class="col-xs-2" id="close-section">
                <button class="btn btn-outline" type="submit" ng-click="hideSearch()">
                    <i class="fa fa-close" aria-hidden="true"></i> Close
                </button>
            </div>
        </div>
    </div>
</section>